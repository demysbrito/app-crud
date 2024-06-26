<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Imagem</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <center>
        <h1>Imagem Capturada</h1>
        <img src="{{ asset($imagem->caminho) }}" alt="Imagem Capturada">
    <center>
        <div class="py-5">

            <a class="btn btn-success" href="{{route('inicio')}}"  role="button">Voltar</a>
        </div>


     <!-- jQuery e Bootstrap JS (coloque no final do body para melhor performance) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>        
</body>
</html>
