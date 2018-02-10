<!DOCTYPE html>
<html>
<head>
    <title>Amazon Web Service - S3</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/aws.css')}}">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Amazon Web Service - S3</a>
        </div>
      </div>
    </nav>
    <div class="container">
        <img id="imagem" class="img-rounded" src="{{ url('img/amazon.jpg') }}">
        <div class="page-header text-center">
            <h1>Upload e Download de Arquivos</h1>
        </div>
        <br>
        @yield('conteudo')
    </div>
</body>
</html>