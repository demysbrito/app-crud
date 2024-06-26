<!DOCTYPE html>
<html>
<head>
    <title>Webcam Capture</title>
    <!-- Adicione os estilos do WebcamJS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilos para o modal */
        .modal {
            display: none; /* Inicia escondido */
            position: fixed; /* Permite sobrepor o conteúdo */
            z-index: 1; /* Posição na frente de outros elementos */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Adiciona barra de rolagem se necessário */
            background-color: rgb(0,0,0); /* Cor de fundo escura */
            background-color: rgba(0,0,0,0.9); /* Cor de fundo escura com transparência */
        }

        .modal-content {
            margin: auto;
            display: flex;
            width: 100%; /* Largura do modal */
            max-width: 720px; /* Largura máxima do modal */
            background-color: #fefefe; /* Cor de fundo do modal */
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            align-items: center;
        }

        .close {
            color: #b10909;
            float: right;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos para os quadrados de exibição */
        .container {
            display: flex;
        }
        .square {
            width: 320px; /* Largura dos quadrados */
            height: 240px; /* Altura dos quadrados */
            margin-right: 10px; /* Espaçamento entre os quadrados */
            background-color: rgb(2, 62, 82); /* Cor de fundo apenas para visualização */
            border: 1px solid #000; /* Borda preta de 1px para visualização */
            box-sizing: border-box; /* Para incluir a borda no cálculo do tamanho */
        }
    </style>
</head>
<body>
    <!-- Botão para abrir o modal -->
    <div class="text-center py-5">
        <button onclick="openModal()" class="btn btn-primary">Abrir Câmera</button>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            {{-- <span class="close" onclick="closeModal()">&times;</span> --}}
            <span class="close" onclick="closeModal()">Fechar</span>
            <div class="row">
                <!-- Exibição da webcam -->
                <div id="camera" class="square"></div>
                <!-- Preview da imagem capturada -->
                <div id="preview" class="square"></div>
            </div>

            <div class="row py-3">
                <div class="p-2">
                    <!-- Botão para capturar imagem -->
                    <button type="button" onclick="take_snapshot()" class="btn btn-success py-2">Capturar Imagem</button>
                </div>
                <div class="p-2">
                    <!-- Formulário para enviar a imagem capturada -->
                    <form id="formImagem" action="{{ route('salvar.imagem') }}" method="POST" style="text-align: center; display: none;">
                        @csrf
                        <!-- Input para enviar a imagem capturada -->
                        <input type="hidden" name="imagem" id="imagem" class="image-tag">
                        <!-- Botão para enviar -->
                        <button type="submit" class="btn btn-primary py-2">Salvar Imagem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Importe a biblioteca do WebcamJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script>
        // Configurações para o WebcamJS
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        // Função para abrir o modal e iniciar a câmera
        function openModal() {
            document.getElementById('myModal').style.display = "block";
            Webcam.attach('#camera'); // Inicia a captura da webcam
        }

        // Função para fechar o modal e parar a câmera
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
            Webcam.reset(); // Para a captura da webcam
            // Limpa o preview da imagem ao fechar o modal
            document.getElementById('preview').innerHTML = '';
            // Oculta o formulário ao fechar o modal
            document.getElementById('formImagem').style.display = 'none';
        }

        // Função para capturar e mostrar preview da imagem
        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                var img = document.createElement('img');
                img.src = data_uri;
                img.style.width = '100%';
                document.getElementById('preview').innerHTML = '';
                document.getElementById('preview').appendChild(img);

                // Define o valor do input para enviar ao servidor
                document.getElementById('imagem').value = data_uri;

                // Exibe o formulário dentro do modal após capturar a imagem
                document.getElementById('formImagem').style.display = 'block';
            });
        }
    </script>
    <!-- jQuery e Bootstrap JS (coloque no final do body para melhor performance) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


{{-- <!DOCTYPE html>
<html>
<head>
    <title>Webcam Capture</title>
    <!-- Adicione os estilos do WebcamJS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.css" rel="stylesheet">
    <style>
        /* Estilos para o modal */
        .modal {
            display: none; /* Inicia escondido */
            position: fixed; /* Permite sobrepor o conteúdo */
            z-index: 1; /* Posição na frente de outros elementos */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Adiciona barra de rolagem se necessário */
            background-color: rgb(0,0,0); /* Cor de fundo escura */
            background-color: rgba(0,0,0,0.9); /* Cor de fundo escura com transparência */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%; /* Largura do modal */
            max-width: 600px; /* Largura máxima do modal */
            background-color: #fefefe; /* Cor de fundo do modal */
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos para os quadrados de exibição */
        .container {
            display: flex;
        }
        .square {
            width: 320px; /* Largura dos quadrados */
            height: 240px; /* Altura dos quadrados */
            margin-right: 10px; /* Espaçamento entre os quadrados */
            background-color: lightblue; /* Cor de fundo apenas para visualização */
            border: 1px solid #000; /* Borda preta de 1px para visualização */
            box-sizing: border-box; /* Para incluir a borda no cálculo do tamanho */
        }
    </style>
</head>
<body>
    <!-- Botão para abrir o modal -->
    <button onclick="openModal()" class="btn btn-primary">Abrir Câmera</button>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <!-- Exibição da webcam -->
            <div id="camera" class="square"></div>
            <!-- Preview da imagem capturada -->
            <div id="preview" class="square"></div>

            <!-- Botões dentro do modal -->
            <div style="text-align: center;">
                <!-- Botão para capturar imagem -->
                <button type="button" onclick="take_snapshot()" class="btn btn-success">Capturar Imagem</button>
                <!-- Botão para fechar o modal sem salvar -->
                <button type="button" onclick="closeModal()" class="btn btn-danger">Fechar</button>
            </div>
        </div>

    </div>

    <!-- Importe a biblioteca do WebcamJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script>
        // Configurações para o WebcamJS
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        // Função para abrir o modal e iniciar a câmera
        function openModal() {
            document.getElementById('myModal').style.display = "block";
            Webcam.attach('#camera'); // Inicia a captura da webcam
        }

        // Função para fechar o modal e parar a câmera
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
            Webcam.reset(); // Para a captura da webcam
        }

        // Função para capturar e mostrar preview da imagem
        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                var img = document.createElement('img');
                img.src = data_uri;
                img.style.width = '100%';
                document.getElementById('preview').innerHTML = '';
                document.getElementById('preview').appendChild(img);

                // Define o valor do input para enviar ao servidor
                document.getElementById('imagem').value = data_uri;
            });
        }
    </script>

    <!-- Formulário para enviar a imagem capturada -->
    <form id="formImagem" action="{{ route('salvar.imagem') }}" method="POST" style="display: none;">
        @csrf
        <!-- Input para enviar a imagem capturada -->
        <input type="hidden" name="imagem" id="imagem" class="image-tag">
        <!-- Botão para enviar -->
        <button type="submit" class="btn btn-primary">Salvar Imagem</button>
    </form>

</body>
</html>

 --}}


{{-- <!DOCTYPE html>
<html>
<head>
    <title>Webcam Capture</title>
    <!-- Adicione os estilos do WebcamJS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.css" rel="stylesheet">
    <style>
        #preview {
            border: 1px solid #ccc;
        }
    </style>
    <style>
        .container {
            display: flex;
        }
        .square {
            width: 640px;
            height: 480px;
            background-color: lightblue; /* Cor de fundo apenas para visualização */
            border: 1px solid #000; /* Borda preta de 1px para visualização */
            box-sizing: border-box; /* Para incluir a borda no cálculo do tamanho */
            
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="square" id="camera">
            <!-- Exibição da webcam -->
        </div>
        <div class="square" id="preview"></div>
    </div>


    <!-- Importe a biblioteca do WebcamJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script>
        // Configurações para o WebcamJS
        Webcam.set({
            width: 640,
            height: 480,
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#camera');

        // Função para capturar e mostrar preview da imagem
        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                var img = document.createElement('img');
                img.src = data_uri;
                // img.style.width = '25%';
                document.getElementById('preview').innerHTML = '';
                document.getElementById('preview').appendChild(img);

                // Define o valor do input para enviar ao servidor
                document.getElementById('imagem').value = data_uri;
            });
        }
    </script>

    <!-- Formulário para enviar a imagem capturada -->
    <form action="{{ route('salvar.imagem') }}" method="POST">
        @csrf
        <!-- Input para enviar a imagem capturada -->
        <input type="hidden" name="imagem" id="imagem" class="image-tag">
        <!-- Botão para capturar imagem -->
        <button type="button" onclick="take_snapshot()" class="btn btn-success">Capturar Imagem</button>
        <!-- Botão para enviar -->
        <button type="submit" class="btn btn-primary">Salvar Imagem</button>
    </form>

</body>
</html> --}}