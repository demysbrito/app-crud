@extends('layouts.master')
@section('content')


<h1>ProdutosX</h1>

<div class="bg-white m-4 px-4 py-4">
    <span><i class="bi bi-search me-2"></i></span>Pesquisar produto
    <hr>
    <div class="row row-cos-6">
        <div class="col-10">
            <label for="produto_nome" class="form-label">Nome</label>
            <input id="produto_nome" type="text" class="form-control text-uppercase">
        </div>
    </div>
    
</div>



<div class="bg-white m-4 px-4 py-2">
    <div>
        @if(session()->has('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <span>Relação de Produtos</span>
    <hr>
    <a class="btn btn-primary" href="{{route('product.create')}}" role="button">Cadastrar</a>
    <div class="container mt-5">
        <table id="products_table" class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Qtd</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Condição</th>
                <th scope="col" style="text-align: center;">Ação</th>
                <th scope="col" style="text-align: center;"></th>
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
    </div>
</div>
<script>
    function abrirNovaAba(url) {
        window.open(url, '_blank');
    }
</script>
<a id="gerar" class="btn btn-secondary" onclick="abrirNovaAba('{{route('product.report')}}')" role="button">Gerar PDF</a>

</script>
{{-- <script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script> --}}

@endsection    
