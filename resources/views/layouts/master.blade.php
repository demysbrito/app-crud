<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Controle de Portarias</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Adicione os estilos do WebcamJS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
        
    </head>
<body>
    <div>
        @include('layouts.navbar')
    </div>
    <div id="content" class="mx-auto p-5">

    @yield('content')

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script>
    // TABELA PRODUCTS  
    var products_table = $('#products_table').DataTable({
        // Tradução
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/pt-BR.json',
        },
        columnDefs: [
            {target: 0, visible: true},
            {target: 6, orderable: false},
            {target: 7, orderable: false},
        ],
        fixedHeader: {
            header:true,
            footer: true,
        },
        // Remover controles padrão
        layout: {
            topEnd: null
        },
    
    });

    $('#produto_nome').on('keyup', function() {
        products_table.column(1).search(this.value).draw();
    })
    // TABELA PRODUCTS END    
</script>
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
    Webcam.attach('#camera');
</script>

</body>


</html>