@extends('layouts.master')
@section('content')

<h1>Cadastrar um produto</h1>
    
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{route('product.store')}}">
    @csrf
    @method('post')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="row mb-3">
            <div class="mb-3 col-2">
                <label for="qty" class="form-label">Quantidade</label>
                <input type="number" name="qty" class="form-control">
            </div>
            <div class="mb-3 col-3">
                <label for="price" class="form-label">Preço</label>
                <!-- <input type="text" class="form-control" name="price" > -->
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="col mb-3">
                <label for="condition" class="form-label">Condição</label>
                <select class="form-select" aria-label="Condição" name="condition"> 
                    <option value="novo">Novo</option>
                    <option value="usado">Usado</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

<script>
    $(function() {
        $('#price').maskMoney({
            prefix:'R$ ',
            thousands:'.',
            decimal:','
        });
    })
</script>

@endsection