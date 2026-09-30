<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'My Product')
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }


        
        .header {
            background-color: #212529;
            color: white;
            padding: 25px 80px;
        }

        .header h1 {
            margin: 0 0 15px 0;
            font-size: 32px;
        }

        .nav {
            display: flex;
            gap: 5px;
        }

        .nav a {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border: 1px solid #555;
            border-radius: 4px;
            font-size: 14px;
        }

        .nav a:hover {
            background-color: #444;
        }



        .container {
            width: 85%;
            margin: 30px auto;
        }


        .success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }



        .btn {
            display: inline-block;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #198754;
            color: white;
        }

        .btn-primary:hover {
            background-color: #157347;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5c636a;
        }




        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 9px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #86b7fe;
        }

        .error {
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }



        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        td a {
            color: #0d6efd;
            text-decoration: underline;
        }


        .filter-section {
            margin-bottom: 15px;
        }

        .filter-section strong {
            margin-right: 5px;
        }


        h2 {
            margin-bottom: 15px;
        }

    </style>

</head>


<body>


    <div class="header">

        <h1>My Product</h1>

        <div class="nav">

            <a href="{{ route('products.index') }}">
                All Products
            </a>

            <a href="{{ route('products.filter') }}">
                Filter Products
            </a>

            <a href="{{ route('products.featured') }}">
                Featured Product
            </a>

        </div>

    </div>


    <div class="container">


        @if (session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif


        @yield('content')


    </div>


</body>

</html>
