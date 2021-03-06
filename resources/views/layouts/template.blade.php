<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js">
<!--<![endif]-->
<head>
	<title>Lecro</title>
	<link rel="manifest" href="manifest.json">
	<!-- Metas Controle -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<html lang="pt-br">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Value">
	<link rel="icon" sizes="192x192" href="assets/img/icone.png">
	<!-- Metas Site -->
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Agência VALUE - www.agenciavalue.com" />
	<meta name="robots" content="index, follow" />
	<!-- Metas Facebook -->
	<meta property="og:title" content="" />
	<meta property="og:url" content="" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<!-- Folhas de Estilo -->
	<link rel="stylesheet" href="{{ url('css/application.css') }}">
	<link rel="stylesheet" href="{{ url('fonts/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/custom.css') }}">
	<script src="{{ url('js/jquery-1.12.3.min.js') }}"></script>
</head>
<body>
	<menu>
		<div class="conteudo">
			<a href="{{ url('') }}"><img class="logo" src="{{ url('img/logobranco.png') }}" alt=""></a>
			<ul>
				<li><a href="{{  url('') }}">Kanbans</a></li>
				<li><a href="">Meus dados</a></li>
				<li><a href="{{  url('logout') }}">Sair</a></li>
			</ul>
		</div>
	</menu>
	<section id="kanbans">
		<div class="conteudo">
			@yield('content')
		</div>
	</section>
	<!-- Scripts -->

	<script src="{{ url('js/main.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>


