<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    private function getProducts()
    {
        $path = storage_path('app/products.json');

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);

        return json_decode($json, true);
    }

    private function saveProducts(array $products)
    {
        $path = storage_path('app/products.json');

        file_put_contents(
            $path,
            json_encode($products, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $products = $this->getProducts();

        $name = $request->query('name');
        $stock = $request->query('stock');

        if ($name) {
            $products = array_filter($products, function ($product) use ($name) {
                return stripos($product['name'], $name) !== false;
            });
        }

        if ($stock !== null && $stock !== '') {
            $products = array_filter($products, function ($product) use ($stock) {
                return $product['stock'] >= $stock;
            });
        }

        return view('products.index', compact(
            'products',
            'name',
            'stock'
        ));
    }

    public function show($id)
    {
        $products = $this->getProducts();

        $product = collect($products)->firstWhere('id', (int) $id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }

    public function featured()
    {
        $products = $this->getProducts();

        $products = array_filter($products, function ($product) {
            return $product['stock'] >= 20;
        });

        return view('products.featured', compact('products'));
    }



    public function create()
    {
        return view('products.create');
    }



    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|in:0,10,15,18,20,25,30',
        ]);

        $products = $this->getProducts();
        $newId = 1;

        if (!empty($products)) {
            $ids = array_column($products, 'id');

            $newId = max($ids) + 1;
        }

        $products[] = [
            'id' => $newId,
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ];

        $this->saveProducts($products);
        return redirect()
            ->route('products.index')
            ->with('success', 'Product added successfully!');
    }



    public function filter($stock = null)
    {
        $products = $this->getProducts();

        if ($stock !== null) {
            $products = array_filter($products, function ($product) use ($stock) {
                return $product['stock'] >= $stock;
            });
        }

        return view('products.filter', compact('products', 'stock'));
    }
}
