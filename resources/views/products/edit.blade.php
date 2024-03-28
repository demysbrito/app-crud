@extends('layouts.master')
@section('content')

    <h1>Editar um produto</h1>
    
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{route('product.update', ['product' => $product])}}"> 
    @csrf
    @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{$product->name}}">
        </div>
        <div class="row mb-3">
            <div class="col mb-3">
                <label for="qty" class="form-label">Quantidade</label>
                <input type="number" name="qty" placeholder="Quantidade" class="form-control" value="{{$product->qty}}">
            </div>
            <div class="col mb-3">
                <label for="price" class="form-label">Preço</label>
                <!-- <input type="text" class="form-control" name="price" > -->
                <input type="text" class="form-control" id="price" name="price" value="{{'R$ ' . number_format($product->price, 2, ',', '.')}}">
            </div>
            <div class="col mb-3">
                <label for="condition" class="form-label">Condição</label>
                <select class="form-select" aria-label="Condição" name="condition">
                    <option value="novo" {{$product->condition == "novo" ? 'selected' : ''}}>Novo</option>
                    <option value="usado" {{$product->condition == "usado" ? 'selected' : ''}}>Usado</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{$product->description}}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <script>
        $(function() {
            $('#price').maskMoney({
                prefix:'R$',
                thousands:'.',
                decimal:','
            });
        })
    </script>

@endsection  