<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo doctype('html5'); ?>
<head>
	<meta charset="utf-8">
	<title>Conecte.se</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#disclaimer").click(function(){
				$("#form-group-titulo").show();
				$("#link").hide();
				$("#url-imagem").hide();
				$("#descricao").show();
			});

			$("#destaque").click(function(){
				$("#form-group-titulo").hide();
				$("#link").show();
				$("#url-imagem").show();
				$("#descricao").show();
			});

			$("#noticia").click(function(){
				$("#form-group-titulo").show();
				$("#link").show();
				$("#url-imagem").show();
				$("#descricao").show();
			});
		});
	</script>
</head>
<body>
	<div class="container-fluid">