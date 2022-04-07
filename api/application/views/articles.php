<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mes = "";
$lastEdition="";
?>
<div class="row">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a target="_blank" href="<?php echo base_url() ?>articles/preview/">PREVIEW</a></li>
	        <li><a target="_blank" href="<?php echo base_url() ?>articles/preview?header=true">HTML</a> </li>
	        <li><a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>logout">LOGOUT</a> </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
<div class="row myheader">
	<div class="col-md-12">
		<h1><a href="/">Conecte.se</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-md-8">

	<?php if(isset($destaque)&&count($destaque)>0): ?>
	<div class="panel panel-default">
		<div class="panel-heading">Banner / Destaque</div>
		<div class="panel-body">
		<table class="table table-bordered article-table table-destaque" cellspacing="0" cellpadding="0">
			<tr>
				<th>Edição/Mes</th>
				<th>Imagem</th>
				<th>Título</th>
				<th>Link</th>
				<th>Descrição</th>
				<!--th>Editar</th-->
				<th>Apagar</th>
			</tr>
			<?php
			
			
				$html =""; 
				foreach ($destaque as $destacar) {
					$html .= "<tr>";
					$html .= "<td>" . $destacar->edicao . "ª/" . $destacar->mes . "</td>";
					$html .= "<td><img src='" . $destacar->imagem . "' width='100'></td>";
					$html .= "<td>" . $destacar->titulo . "</td>";
					$html .= "<td><a href='" . $destacar->link . "'>" . substr($destacar->link,0,20) . "... </a></td>";
					$html .= "<td>" . $destacar->descricao . "</td>";
					//$html .= "<td><a href='/editar/'" . $article->idArticle . ">editar</a></td>";
					$html .= "<td align='center'><a class='btn btn-danger' href='" . base_url() . "articles/apagar/" . $destacar->idArticle . "' style='font-size:16px; text-align:center;'><span class='glyphicon glyphicon-trash'></span></a></td>";
					$html .= "</tr>";
				}
				echo $html;
			?>
		</table>
		</div>
		</div>
		<?php endif; ?>

		<?php if(isset($disclaimer)&&count($disclaimer)>0): ?>
	<div class="panel panel-default">
		<div class="panel-heading">Disclaimer</div>
		<div class="panel-body">
		<table class="table table-bordered article-table table-disclaimer" cellspacing="0" cellpadding="0">
			<tr>
				<th>Edição/Mes</th>
				<th>Título</th>
				<th>Link</th>
				<th>Descrição</th>
				<!--th>Editar</th-->
				<th>Apagar</th>
			</tr>
			<?php
			
			
				$html =""; 
				foreach ($disclaimer as $texto) {
					$html .= "<tr>";
					$html .= "<td>" . $texto->edicao . "ª/" . $texto->mes . "</td>";
					$html .= "<td>" . $texto->titulo . "</td>";
					$html .= "<td><a href='" . $texto->link . "'>" . substr($texto->link,0,20) . "... </a></td>";
					$html .= "<td>" . $texto->descricao . "</td>";
					//$html .= "<td><a href='/editar/'" . $article->idArticle . ">editar</a></td>";
					$html .= "<td align='center'><a class='btn btn-danger' href='" . base_url() . "articles/apagar/" . $texto->idArticle . "' style='font-size:16px; text-align:center;'><spn class='glyphicon glyphicon-trash'></span></a></td>";
					$html .= "</tr>";
				}
				echo $html;
			?>
		</table>
		</div>
		</div>
		<?php endif; ?>


		<div class="panel panel-default">
		<div class="panel-heading">Lista de Artigos</div>
		<div class="panel-body">
		<table class="table table-bordered article-table table-artigos" cellspacing="0" cellpadding="0">
			<tr>
				<th>Edição/Mes</th>
				<th>Imagem</th>
				<th>Título</th>
				<th>Link</th>
				<th>Descrição</th>
				<!--th>Editar</th-->
				<th>Apagar</th>
			</tr>
			<?php
			
			if(isset($articles)&&count($articles)>0){
				$html =""; 
				foreach ($articles as $article) {
					$html .= "<tr>";
					$html .= "<td>" . $article->edicao . "ª/" . $article->mes . "</td>";
					$html .= "<td><img src='" . $article->imagem . "' width='100'></td>";
					$html .= "<td>" . $article->titulo . "</td>";
					$html .= "<td><a href='" . $article->link . "'>" . substr($article->link,0,20) . "... </a></td>";
					$html .= "<td>" . $article->descricao . "</td>";
					//$html .= "<td><a href='/editar/'" . $article->idArticle . ">editar</a></td>";
					$html .= "<td align='center'><a class='btn btn-danger' href='" . base_url() . "articles/apagar/" . $article->idArticle . "' style='font-size:16px; text-align:center;'><span class='glyphicon glyphicon-trash'></span></a></td>";
					$html .= "</tr>";
				}
				echo $html;
			} else {
				echo "<tr><td colspan='6'>Não existem artigos cadastrados.</td></tr>";
			}
			?>

		</table></div>
</div>

		
	</div>
	<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">Adicionar Artigos</div>
		<div class="panel-body">
		<form method="post">
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php 
						foreach($editions as $edition){
							 $lastEdition = $edition->edicao;
							 $mes = $edition->mes;
						}?>
						<label for="edicao">Edição</label>
						<input type="text" class="form-control input-sm" id="edicao" name="edicao" placeholder="edicao" value="<?php echo $lastEdition; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="edicao">Mês</label>
						<input type="text" class="form-control input-sm" id="mes" name="mes" placeholder="mes" value="<?php echo $mes; ?>">
					</div>
				</div>
			</div>
			<div class="form-group" id="form-group-titulo">
				<input type="text" class="form-control input-sm" id="titulo" name="titulo" placeholder="TÍTULO">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-sm" id="link" name="link" placeholder="LINK DA NOTÍCIA">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-sm" id="url-imagem" name="url-imagem" placeholder="URL IMAGEM">
			</div>
			<div class="form-group">
				<textarea class="form-control input-sm" id="descricao" name="descricao" placeholder="DESCRIÇÃO"></textarea>
			</div>
			<div class="radio">
		    	<label>
		      		<input name="tipo" type="radio" value="noticia" id="noticia"> Notícia
		    	</label>
		  	</div>
		  	<div class="radio">
		    	<label>
		      		<input name="tipo" type="radio" value="destaque" id="destaque"> Destaque
		    	</label>
		  	</div>
		  	<div class="radio">
		    	<label>
		      		<input name="tipo" type="radio" value="disclaimer" id="disclaimer"> Disclaimer<br><small>(Se houver alguma notícia destaque, o disclaimer não será exibido)</small>
		    	</label>
		  	</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Adicionar</button>
			</div>
		</form>
		</div>
</div>

	</div>
</div>
