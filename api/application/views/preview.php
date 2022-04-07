<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['header']) && $_GET['header']=="true"){
	header("Content-Type: text/plain");
}

$mes = ['JANEIRO','FEVEREIRO','MARÇO','ABRIL','MAIO','JUNHO','JULHO','AGOSTO','SETEMBRO','OUTUBRO','NOVEMBRO','DEZEMBRO'];

$spacer30  = "<table cellpadding='0' cellspacing='0' border='0' align='center' style=border-collapse: collapse; height: 30px; mso-table-lspace: 0pt; mso-table-rspace: 0pt'>";
$spacer30 .= "<tr>";
$spacer30 .= "<td valign='top' style='border-collapse: collapse'>";
$spacer30 .= "<img src='https://emailingindra.indra.es/archivos/1/6324_blank.png' width='560' height='30' style='-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none'>";
$spacer30 .= "</td>";
$spacer30 .= "</tr>";
$spacer30 .= "</table>";

$spacer15  = "<table cellpadding='0' cellspacing='0' border='0' align='center' style=border-collapse: collapse; height: 15px; mso-table-lspace: 0pt; mso-table-rspace: 0pt'>";
$spacer15 .= "<tr>";
$spacer15 .= "<td valign='top' style='border-collapse: collapse'>";
$spacer15 .= "<img src='https://emailingindra.indra.es/archivos/1/6324_blank.png' width='560' height='15' style='-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none'>";
$spacer15 .= "</td>";
$spacer15 .= "</tr>";
$spacer15 .= "</table>";

if(isset($editions) && count($editions)>0){
	foreach($editions as $edition){
		$edicao = $edition->edicao;
		$mes = $edition->mes;
	}
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>CONECTE-SE</title>
</head>
<body style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #ccc; margin: 0; padding: 0; width: 100%">
	<table cellpadding="0" cellspacing="0" border="0" class="background" style="background: #ccc; border-collapse: collapse; line-height: 100% !important; margin: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 0; width: 100%">
		<tr>
			<td valign="top" style="border-collapse: collapse">

				<table cellpadding="0" cellspacing="0" border="0" align="center" class="container" style="background: #fff; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 600px">
					<tr>
						<td valign="top" style="border-collapse: collapse">
							<!-- HEADER -->
							<table cellpadding="0" cellspacing="0" border="0" align="center" class="header" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
								<tr>
									<td valign="top" style="border: none; border-collapse: collapse; width: 600px">
										<img src="https://emailingindra.indra.es/archivos/1/6330_header2.png" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none">
									</td>
								</tr>
							</table>
							<!-- FIM HEADER -->
							<!-- DATA  -->
							<table cellpadding="0" cellspacing="0" border="0" align="center" class="data" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 560px">
								<tr>
									<td valign="top" style="border-collapse: collapse; vertical-align: top">
										<p style="color: #98999b; font-family: Arial, sans-serif; font-size: 12px; font-weight: bold; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0; text-align: right"><?php echo $mes;?> - <?php echo $edicao; ?>ª EDIÇÃO</p>
									</td>
								</tr>
							</table>
							<!-- FIM DATA -->

							<?php echo $spacer15; ?>

							<?php 
							if(isset($destaque) && count($destaque)>0):?>
							<?php foreach($destaque as $destacar):?>	
							<table cellpadding="0" cellspacing="0" border="0" align="center" class="header" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
								<tr>
									<td valign="top" style="border: none; border-collapse: collapse; width: 600px">
									<?php if(isset($destacar->link) && strlen($destacar->link)>0):?>
										<a class="txt-rosa" target="_blank" href="<?php echo $destacar->link; ?>" style="color: #e92076; font-weight: bold; text-decoration: none">
										<img src="<?php echo $destacar->imagem; ?>" width="600" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none; width:600px;">
										</a>
										<?php else: ?>
											<img src="<?php echo $destacar->imagem; ?>" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none">
										<?php endif?>
									</td>
								</tr>
							</table>
							
							<table cellpadding="" cellspacing="20" border="0" align="center" class="noticia" style="border-bottom: 2px dotted #ccc; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 560px">
											<tr>
												<td valign="top" style="border-collapse: collapse; padding: 15px;  vertical-align: top">
													<h2 style="display:none; color: #e92076; font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 130%; margin: 0; margin-bottom: 15px; padding: 0; text-transform: uppercase">
														<?php if(isset($destacar->link) && strlen($destacar->link)>0):?>
														<a class="txt-rosa" target="_blank" href="<?php echo $destacar->link; ?>" style="color: #e92076; font-weight: bold; text-decoration: none">
															<?php echo $destacar->titulo; ?>															
														</a>
														<?php else: ?>
															<?php echo $destacar->titulo; ?>															
														<?php endif?>
													</h2>
													<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0">
														<?php echo nl2br($destacar->descricao); ?>
													</p>
													<?php 
													if(isset($destacar->link) && strlen($destacar->link)>0):?>
													<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0">
														<a class="txt-rosa" target="_blank" href="<?php echo $destacar->link; ?>" style="color: #e92076; font-weight: bold; text-decoration: none">
															Saiba +
														</a>
													</p>
													<?php endif?>
												</td>
											</tr>
											<tr>
												<td style="border-collapse: collapse; vertical-align: top">
													<img src="https://emailingindra.indra.es/archivos/1/6324_blank.png" width="560" height="1" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none">
												</td>
											</tr>
										</table>
							<?php endforeach;?>
							<?php endif; ?>
							<?php 
							if(isset($disclaimer) && count($disclaimer)>0 && count($destaque)==0):?>
							<?php foreach($disclaimer as $texto):?>	
							<!-- DISCLAIMER -->
							<table cellpadding="" cellspacing="20" border="0" align="center" class="noticia" style="border-bottom: 2px dotted #ccc; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 560px">
								<tr>
									<td style="border-collapse: collapse; padding: 15px; vertical-align: top">
										<h2 class="" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 130%; margin: 0; margin-bottom: 15px; padding: 0; text-transform: uppercase"><?php echo $texto->titulo; ?>	</h2>
										<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0"><?php echo $texto->descricao; ?>	</p>
									</td>
								</tr>
							</table>
							<!--END DISCLAIMER -->
							<?php 
							endforeach; 
							endif;
							?>

							<?php echo $spacer30; ?>
							<!-- INICIO CONTEUDO -->
							<table cellpadding="0" cellspacing="0" border="0" align="center" id="sumario" class="content" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 560px">
								<tr>
									<td valign="top" style="border-collapse: collapse; vertical-align: top">
									<!-- LOOP DE NOTÍCIAS -->

										<?php foreach($articles as $article):?>	

										<table cellpadding="" cellspacing="20" border="0" align="center" class="noticia" style="border-bottom: 2px dotted #ccc; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 560px">
											<tr>
												<td width="180" valign="top" style="border-collapse: collapse; vertical-align: top; width: 180px" class="thumbnail">
													<img width="150" src="<?php echo $article->imagem; ?>" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none; width: 150px;">
												</td>
												<td valign="top" style="border-collapse: collapse; vertical-align: top">
													<h2 style="color: #e92076; font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 130%; margin: 0; margin-bottom: 15px; padding: 0; text-transform: uppercase">
														<?php if(isset($article->link) && strlen($article->link)>0):?>
														<a class="txt-rosa" target="_blank" href="<?php echo $article->link; ?>" style="color: #e92076; font-weight: bold; text-decoration: none">
															<?php echo $article->titulo; ?>															
														</a>
														<?php else: ?>
															<?php echo $article->titulo; ?>															
														<?php endif?>
													</h2>
													<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0">
														<?php echo nl2br($article->descricao); ?>
													</p>
													<?php 
													if(isset($article->link) && strlen($article->link)>0):?>
													<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: 10px; padding: 0">
														<a class="txt-rosa" target="_blank" href="<?php echo $article->link; ?>" style="color: #e92076; font-weight: bold; text-decoration: none">
															Saiba +
														</a>
													</p>
													<?php endif?>
												</td>
											</tr>
											<tr>
												<td style="border-collapse: collapse; vertical-align: top">
													<img src="https://emailingindra.indra.es/archivos/1/6324_blank.png" width="180" height="30" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none">
												</td>
												<td style="border-collapse: collapse; vertical-align: top">
													<img src="https://emailingindra.indra.es/archivos/1/6324_blank.png" width="380" height="30" style="-ms-interpolation-mode: bicubic; display: block; outline: none; text-decoration: none">
												</td>
											</tr>
										</table>

										<?php echo $spacer30; ?>

										<?php endforeach;?>

										<table cellpadding="0" cellspacing="0" border="0" align="center" class="expediente" style="background-color: #98999b; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%">
											<tr>
												<td style="background-color: #98999b; border-collapse: collapse">
													<table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; vertical-align: top; width: 560px">
														<tr>
															<td style="background-color: #98999b; border-collapse: collapse; padding: 20px; vertical-align: top" width="350">
																<h3 style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold; line-height: 130%; margin: 0; padding: 0; text-transform: uppercase">EXPEDIENTE</h3>
																<p style="font-family: Arial, sans-serif; font-size: 9px; line-height: 150%; margin: 0; margin-bottom: 0; padding: 0; text-align: left; vertical-align: top"><strong style="text-transform: uppercase">Coordenação:</strong> Fabiana Rosa</p>
																<p style="font-family: Arial, sans-serif; font-size: 9px; line-height: 150%; margin: 0; margin-bottom: 0; padding: 0; text-align: left; vertical-align: top"><strong style="text-transform: uppercase">Edição:</strong> Fernanda Bocchiglieri e Erik Silva</p>
																<p style="font-family: Arial, sans-serif; font-size: 9px; line-height: 150%; margin: 0; margin-bottom: 0; padding: 0; text-align: left; vertical-align: top"><strong style="text-transform: uppercase">Design:</strong> Fernando Di Masi</p>
															</td>
															<td style="background-color: #98999b; border-collapse: collapse; padding: 20px; vertical-align: top" width="210">
																<h3 style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold; line-height: 130%; margin: 0; padding: 0; text-transform: uppercase">CONTATO</h3>
																<p style="font-family: Arial, sans-serif; font-size: 9px; line-height: 150%; margin: 0; margin-bottom: 0; padding: 0; text-align: left; vertical-align: top"><a href="mailto:communitybrasil@indracompany.com&subject=[CONECTE-SE] <?php echo $mes ?> - <?php echo $edicao ?>ª edição" style="color: #000; font-weight: normal; text-decoration: none">communitybrasil@indracompany.com</a></p>
															</td>
														</tr>
														<tr>
															<td colspan="2" style="background-color: #98999b; border-collapse: collapse; padding: 20px"><p class="txt-uppercase txt-center" style="font-family: Arial, sans-serif; font-size: 9px; line-height: 150%; margin: 0; margin-bottom: 0; padding: 0; text-align: center !important; text-transform: uppercase; vertical-align: top">Este informativo é de uso exclusivamente interno.</p>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>

										<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer" style="border-collapse: collapse; margin: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 0; width: 600px">
											<tr>
												<td class="rosa" valign="top" style="background-color: #63656a; border-collapse: collapse; color: #fff; font-family: Arial, sans-serif; font-size: 10px; font-weight: bold; margin: 0; padding: 0; text-align: center; vertical-align: middle">
													<p style="font-family: Arial, sans-serif; font-size: 12px; line-height: 150%; margin: 0; margin-bottom: :0; padding: 0"><?php echo date('Y'); ?> - <a href="http://www.indracompany.com" style="color: white; font-weight: bold; text-decoration: none">indracompany.com</a></p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>