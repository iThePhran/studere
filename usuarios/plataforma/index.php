
<?php
include_once "../../includes/seguro.php";
include_once "../../includes/conectar.php";
include_once "includes/actualzar_estado_de_clases.php";
include_once "includes/coneccionbdclases.php";
$hola=$_SESSION['email'];
$query="SELECT * FROM usuario WHERE email='$hola' ";
$consulta=consultarSQL($query);
$a=mysqli_fetch_assoc($consulta);
$alumno=$a['Nombre'].$a['Apellido']." ".$a['Email'];

$query="SELECT * FROM clases WHERE Alumno='$alumno' ORDER BY fecha_fin DESC";
$consulta32=consultarSQL($query);

$fecha_hoy= date("Y-m-d"); //fecha de hoy
$resultado=mysqli_fetch_assoc($consulta32);
if(!isset($_COOKIE['contador']))
{ 
  // Caduca en un año   
  setcookie('contador', 0 , time() + 365 * 24 * 60 * 60); 
  $mensaje = 'Número de visitas: ' . $_COOKIE['contador']; 
} 
else 
{ 
  // Caduca en un año 
  setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60); 
  $mensaje = 'Bienvenido a Plataforma Studere'; 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Studere.uy</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Somos una plataforma de Estudios Online dónde puedes obtener apoyo para terminar los e´xamenes o directamente el año completo">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/ico" href="../../images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/animate.css">
<!-- <link rel="stylesheet" type="text/css" href="../../styles/about.css"> -->
<link rel="stylesheet" type="text/css" href="../../styles/courses.css">
<link rel="stylesheet" type="text/css" href="../../styles/courses_responsive.css">

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">  
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Bienvenido : <?php  echo $a['Nombre']." ".$a['Apellido']; ?> </div></li>
									
									
								</ul>
								
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
        <div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="../../index.php">
									<div class="logo_text">Alumno <span><?php echo $a['Nombre']; ?></span></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									
									<li><a href="../../index.php">Inicio</a></li>
									<li><a href="../../miscursos.php">Mis Cursos</a></li>
									<li><a href="../../perfil.php">Editar Perfil</a></li>
									<li><div class="top_bar_login ml-auto">
									<a href="../../../../logout.php?tk=<?php echo $_SESSION['token']?>">Cerrar Sesion</a></div>
								</li>
								</ul>
																
								<!-- Hamburger -->

								
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
					
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		
		<nav class="menu_nav">
			
			<ul class="menu_mm">
				<li class="menu_mm"><a href="../../index.php">Inicio</a></li>
				<li class="menu_mm"><a href="#">Mis Cursos</a></li>
				<li class="menu_mm"><a href="../../perfil.php">Editar Perfil</a></li>
	  			<li class="menu_mm"><a href="../../../../logout.php?tk=<?php echo $_SESSION['token']?>">Cerrar Sesión</a></li>
			</ul>
			
			<div></div>

		</nav>
	</div>
	

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
							<input type="search" class="courses_search_input" placeholder="Buscar Clase o Tema" required="required">
							<select id="courses_search_select" class="courses_search_select courses_search_input">
								<option>Todas las Categorias</option>
								<option>1° Bachillerato</option>
								<option>2° Bachillerato</option>
								<option>3° Bachillerato</option>
							</select>
							<button action="submit" class="courses_search_button ml-auto">Buscar Ahora</button>
						</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Buscar Clases" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="../../index.php">Inicio</a></li>
				<li class="menu_mm"><a href="../../miscursos.php">Mis Cursos</a></li>
				<li class="menu_mm"><a href="../../perfil.php">Editar Perfil</a></li>
				<li><div class="top_bar_login ml-auto">
									<a href="../../../../logout.php?tk=<?php echo $_SESSION['token']?>">Cerrar Sesion</a></div>
								</li>
				
			</ul>
		</nav>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="../../index.php">Inicio</a></li>
								<li>Clases de 1°ero Bachillerato</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<!-- Courses -->
	
	<div class="courses">
		<div class="container">
			<div class="row">
			
				<!-- Courses Main Content -->
				<div class="col-lg-10">
					<div class="courses_search_container">
                    <form action="#" id="courses_search_form" method="post" autocomplete="off" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
							<input type="search" class="courses_search_input" name="palabra" placeholder="Buscar Clase o Tema" required="required">
							<select id="courses_search_select" name="seleccion"class="courses_search_select courses_search_input">
									
									<option selected="selected" value="historia">Historia</option>
									<option value="matematica">Matemática</option>
									<option value="matematica1">Matemática</option>
									<option value="fisica">Física</option>
									<option value="derecho">Derecho</option> 
									<option value="quimica">Química</option>
									<option value="geografia">Geografía</option>
									<option value="ingles">Inglés</option>
                                    <option value="espanol">Id.Español</option>
									<option value="visual">Ed.Visual</option>
									<option value="musical">Ed.Musical</option>
									<option value="biologia">Biología</option>
                                    <option value="literatura">Literatura</option>
                                    <option value="civica">Ed.Cívica</option> 
									
								
							</select>
							<button action="submit" class="courses_search_button ml-auto">Buscar Ahora</button>
						</form>
		 				<?php 
						if(isset($_POST['palabra'])){

							
							
							require_once "./clases/bachillerato/buscador.php";

							echo "</tbody>
                            </table>
                            <br>
                            <br>
                            </div>";
							
						}
						
						
						?>
						
					</div>

					

					<div class="courses_container">
						<div class="row courses_row">

						
							
							<!-- aqui van los cursos -->
							
							<div class="col-lg-6 course_col">
						<div class="course">
							<div class="course_image"><img src="images/blog_2.jpg" alt=""></div>
							<div class="course_body">
								<h3 class="course_title"><a href="./clases/ciclo_basico/index.php">Ciclo Básico</a></h3>
								<div class="course_teacher">1°ero - 2°do - 3°ero</div>
								<div class="course_text">
									<p>Todas Las Materias de Ciclo Básico</p>
									<li>Activo</li>
								</div>
							</div>
							<div class="course_footer">
								<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
									<div class="course_info">
										<i class="fa fa-graduation-cap" aria-hidden="true"></i>
										<span>197 Estudiantes</span>
									</div>
									<div class="course_info">
										<i class="fa fa-star" aria-hidden="true"></i>
										<span>5 Estrellas</span>
									</div>
									<div class="course_price ml-auto"></div>
								</div>
							</div>
						</div>
					</div>
	
					<!-- Course -->
					
					<div class="col-lg-6 course_col">
						<div class="course">
							<div class="course_image" ><img src="images/video.jpg"></div>
							<div class="course_body">
								<h3 class="course_title"><a href="./clases/bachillerato/index.php">Bachilleratos</a></h3>
								<div class="course_teacher">4°to  -  5°to  -  6°to</div>
								<div class="course_text">
									<p>Todas las Materias de Bachilleratos</p>
										<li>Activo</li>
										
											
								</div>
							</div>
							<div class="course_footer">
								<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
									<div class="course_info">
										<i class="fa fa-graduation-cap" aria-hidden="true"></i>
										<span>236 Estudiantes</span>
									</div>
									<div class="course_info">
										<i class="fa fa-star" aria-hidden="true"></i>
										<span>5 Estrellas</span>
									</div>
									<div class="course_price ml-auto"></div>
								</div>
							</div>
						</div>
					</div>
                            
                            <!-- fin cursos -->

						</div>
						
					</div>
				</div>

				<!-- Courses Sidebar -->
				<div class="col-lg-2">
					<div class="sidebar">
						
						<!-- Categories -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">ALERTA !!!</div>
							<br>
							<div class="tags_list">
								<li>Estamos Realizando tareas de mantenimiento hasta el martes 09 de Junio</li>
								<!-- <ul>
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Matemática</a></li>
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Física</a></li>
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Química</a></li>
									<li><a href="materias/historia/historia.php">Historia</a></li>
                                    <li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Inglés</a></li>
                                    <li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Id.Español</a></li>
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Ed.Visual</a></li>
									
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Biología</a></li>
                                    <li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Literatura</a></li>
                                    
									<li><a href="#" onclick="alert('Disculpa actualmente esta deshabilitado pero pronto estará disponilbe')">Biología</a></li>
								</ul> -->
							</div>
						</div>

						<!-- Latest Course -->
						<!-- <iframe src="https://www.mercadopago.com.uy/descuentos?campaign_id=59410&show_legals_link=true&dont_show_legals=true&iframe=true" width="100%" height="400" seamless="" frameborder="0" scrolling="no"></iframe>
					

						
						<div class="sidebar_section">
							<div class="sidebar_section_title">Etiquetas</div>
							<div class="sidebar_tags">
								<ul class="tags_list">
									<li><a href="#">Aprender</a></li>
									<li><a href="#">Examen</a></li>
									<li><a href="#">Parcial</a></li>
									<li><a href="#">ideas</a></li>
									<li><a href="#">4°Año</a></li>
									<li><a href="#">Ejercicios</a></li>
								</ul>
							</div>
						</div> -->

						<!-- Banner -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
								<div class="sidebar_banner_background" style="background-image:url(../../images/banner_1.jpg)"></div>
								<div class="sidebar_banner_overlay"></div>
								<div class="sidebar_banner_content">
									<div class="banner_title">Libro Gratis</div>
									<div class="banner_button"><a href="#">Descargar Ahora</a></div>
						</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="../../images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">Prepara tus Exámenes ! ! !</div>
							<div class="newsletter_subtitle">Tienes los Profesores a tu disposición para evacuar dudas y obtener ayuda. VideoConferencias, Chat, Emails, Videos, Documentos, Presentaciones, etc...</div>
						</div>

						<!-- Newsletter Form -->
						

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<?php require ('./includes/footer.php'); ?>
	</footer>
</div>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../../plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="../../js/courses.js"></script>


</body>
</html>