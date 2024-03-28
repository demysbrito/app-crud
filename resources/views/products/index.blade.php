@extends('layouts.master')
@section('content')

<h1>Produtos</h1>
<a class="btn btn-primary" href="{{route('product.create')}}" role="button">Cadastrar</a>

<!-- Mensagem de confirmação -->
@if (session()->has('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Qtd</th>
        <th scope="col">Preço</th>
        <th scope="col">Descrição</th>
        <th scope="col">Condição</th>
        <th scope="col" colspan="2" style="text-align: center;">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>{{'R$ ' . number_format($product->price, 2, ',', '.')}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->condition}}</td>
            <td style="text-align: right;"><a class="btn btn-warning" href="{{route('product.edit', ['product' => $product])}}"  role="button">Editar</a></td>
            <td>
                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Excluir" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

{{-- Paginação do laravel --}}
{{-- {{ $products->links() }} --}}

</script>
<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script>

@endsection    
