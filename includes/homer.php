<?php
include ("plugins/menu/class_menu.php");
include ("plugins/param/class_param.php");
require_once ("plugins/sesionusuario/class_sesionusuario.php");
$menu = new menu();
$param = new param();
$param->makeParam();
$params=$param->getParam();
//echo $params["Catalogo Pdf"][0][1];
?>
<div id="page">
	<!--header-->
	<div id="header">
		<!--nav1 menu-->
		<div id="nav1">
		</div>
		<!--/nav1 menu-->
		<!-- logo-->
		<div class="logo">
			<a href="index.php">
			<img width="280" height="87" alt="logo" src="images/Logo.png">
			</a>
		</div>
		<!-- /logo-->
		<!--RSS-->
		<div class="rss">
			<h2>
			<!-- <a href="contactenos.html" class="big">-->
			<b>HERRAMIENTAS ONLINE</b> PARA LA EVALUACIÓN Y DESARROLLO DE SU
			<b>CAPITAL HUMANO</b>
			<!-- </a>-->
			</h2>
			<br/>

			<h2>
			<small>
				<span>Tel: (571) 4762444</span>
				<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<a href="mailto:comercial@hbp.net.co">
				<span>comercial@hbp.net.co</span>
				</a>
				<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<span>Bogotá Colombia</span>
			</small>
			</h2>
		</div>
		<!--/RSS-->
		<div class="clr">
		</div>
		<!--/searchform -->
		<!--topnav menu-->
		<div class="topnav">
			<? $menu -> getMenu();
 ?>
			<div class="botonespdf">
				<a target="_blank" href="galeria/parametros_hbp/<?=$params["Catalogo Pdf"][0][1]?>">
				<img width="140" height="39" alt="Descargue catalogo en pdf" src="images/botonpdf.png">
				</a>
				<a href="index.php?page=pruebagratis">
				<img width="96" height="39" alt="Descargue catalogo en pdf" src="images/botongratis.png">
				</a>
			</div>
		</div>
		<!--/topnav menu-->
		<div class="clr">
		</div>
		<?if(count($_GET)==0 || $_GET[page]=="Inicio"){?>
		<div class="slider">
			<div id="coin-slider">
				<div id="nav_wrapper">
					<a href="#">
					<img src="images/slide1.jpg" width="960" height="268" alt="slide1" />
					</a>
					<a href="#">
					<img src="images/slide2.jpg"  width="960" height="268" alt="slide2" />
					</a>
					<a href="#">
					<img src="images/slide3.jpg"  width="960" height="268" alt="slide3" />
					</a>
					<a href="#">
					<img src="images/slide4.jpg"  width="960" height="268" alt="slide3" />
					</a>
				</div>
			</div>
			<div class="clr">
			</div>
		</div>
		<?}
		  else
		  { ?>
			<div class="titulos">
          		<h2><?=$appObj->nombre?></h2>
      			<div class="clr"></div>
    		</div>
			<?
		  }
		?>
		<!--slider -->
		<div class="clr">
		</div>
	</div>
	<!--/header -->
	<div id="columns">
		<div class="index">
			<div class="index_left">
				<?php
					$plug = $appObj -> modulo;
				
					require_once ("./plugins/" . $plug . "/class_" . $plug . ".php");
				
					//INSTANCIAMOS LA CLASE SEGUN EL REQUEST
				
					@$plugin = new $plug();
				
					$plugin -> parsePublic();
					
					if($_REQUEST[page]=="Nosotros"){
						include ("plugins/nosotros/class_nosotros.php");
						$nosotros = new nosotros();
						$nosotros->getNosotrosForm();
					}
				?>
			</div>
			<div class="index_right">

				<div id="rightcol">
					<?php
						$sesionusuario = new sesionusuario(); 
						$sesionusuario->sesionuser(); 
					?>
					<div class="aviso">
						<div class="banner">
							<a href="index.php?page=<?=$params["Promocion del mes"][0][3]?>" title="<?=$params["Promocion del mes"][0][0]?>" target="<?=$params["Promocion del mes"][0][2]?>">
							<img src="galeria/parametros_hbp/<?=$params["Promocion del mes"][0][1]?>" alt="<?=$params["Promocion del mes"][0][0]?>" width="230" height="133" />
							</a>
						</div>
						<div class="clr">
						</div>
					</div>
					<div class="botongratis">
						<a href="index.php?page=pruebagratis" target="_self">
						<img width="230" height="87" alt="Solicite su prueba gratis" src="images/boton.jpg">
						</a>
						<div class="clr">
						</div>
						<!--/content -->

						<div class="box ads">
							<div class="wtitle">
								<h2>Servicios HBP</h2>
							</div>
							<div class="content">
								<?
									$totalServicio=count($params["Servicios"]);
									if($totalServicio>0){										
										echo "<ul class=\"\">";										
										for($s=0;$s<$totalServicio;$s++){
											echo "<li>
													<a href=\"index.php?page=".$params["Servicios"][$s][3]."\" class=\"active\" rel=\"tabs_archive\">".$params["Servicios"][$s][0]."</a>
												  </li>";
										}
										echo "</ul>";
									}
								 ?>								
								<!-- Start Meta --><!-- End Meta -->
							</div>
							<!--/content -->
						</div>
					</div>
					<!--/box -->
					<div class="clr">
					</div>
					<!--/box -->
				</div>
			</div>
			<div class="clr">
			</div>
		</div>
	</div>
	<!--/columns -->
	<div class="clr">
	</div>
</div>

<div id="page_bottom">
<?php
echo $param->getFooter();
?>
</div>