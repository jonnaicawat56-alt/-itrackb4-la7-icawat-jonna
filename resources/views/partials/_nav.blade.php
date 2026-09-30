
<nav class="nav mb-3">

<nav>

<a
    href="{{ route('products.index') }}"
    class="{{ request()->is('products*') ? 'active' : '' }}"
>
    Products
</a>

</nav>

</nav>

