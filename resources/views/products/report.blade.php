<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
    </style>
    
</head>
<body>
    <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images\logo-gov-pa.png')))}}" width="100px">



    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Qtd</th>
            <th scope="col">Preço</th>
            <th scope="col">Descrição</th>
            <th scope="col">Condição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->qty}}</td>
                <td>{{'R$ ' . number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->condition}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>