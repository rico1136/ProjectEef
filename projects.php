<?php
$pageTitle = "Projects";

include('Components/header.php');

?>
<link rel="stylesheet" href="css/customStyle.css">

<?php
include('Components/navmenu.php');

$json = file_get_contents('projects.json');

// Check if the file was read successfully
if ($json === false) {
    error_log("Data is null", 0);

    return;
}

// Decode the JSON file
$json_data = json_decode($json, true);

// Check if the JSON was decoded successfully
if ($json_data === null) {
    error_log("Data is null", 0);
    return;
}

if (isset($json_data['projects'])) {
    $projects = $json_data['projects'];
}

?>


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="site-navigation">
				<a href="home" class="logo m-0 float-start">project eef<span class="text-primary">.</span> </a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-start">
					<li><a href="home">Home</a></li>
					<!--<li><a href="about">Over eef</a></li>-->
					<!--<li><a href="services">Werkwijze</a></li>-->
					<li class="active"><a href="projects">Projecten </a></li>
					<li><a href="contact">Contact</a></li>
				</ul>



				<a href="#" class="burger ml-auto float-end site-menu-toggle light js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
					<span></span>
				</a>
				<ul class="site-menu float-end d-none d-md-block">
					<li><a href="#" class="d-flex align-items-center text-white h2 fw-bold"><span class="icon-phone me-2"></span> <span>(+31) 6 15628540</span></a></li>
				</ul>

			</div>
		</div>
	</nav>

	<div class="hero-2 overlay" style="background-image: url('images/Vaneman/2.jpg');">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 mx-auto ">
					<h1 class="mb-5 text-center"><span>Mijn projecten</span></h1>
					<div class="intro-desc text-left">
						<div class="line"></div>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="section sec-5">
		<div class="container">
			<div class="row mb-5">
				
				<ul class="col-lg-6 project-menu">
					<li class="All active">Alle projecten</li>
					<li class="Interieurontwerp">Interieurontwerp</li>
					<!--<li class="Visualisatie">Visualisatie</li>-->
				</ul>
			</div>

			<div class="projecten row g-4">
                <?php foreach ($projects as $project): ?>

				<div class="<?php $project['type'] ?> Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-<?php echo $project['id'] ?>">
							<img src="<?php echo $project['images'][0] ?>" alt="Image" class="img-fluid">
							<div class="contents">
								<h3><?php echo $project['name'] ?></h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
                <?php endforeach; ?>
<!--
                <div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Renault">
							<img src="images/Renault/RenaultNieuwendijk.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>Renault Nieuwendijk</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Houseboat">
							<img src="images/Houseboat/woonkamer 1.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>Houseboat</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Strandhuis">
							<img src="images/Strandhuis/keuken 1.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>Cadzand at sea</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Vaneman">
							<img src="images/Vaneman/2.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>Customized by Vaneman</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Starterwoning">
							<img src="images/Starterwoning/Keuken.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>Starterwoning</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="Interieurontwerp col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="single-portfolio">
						<a href="Project-Strandzomer">
							<img src="images/StrandZomer/Strandzomer2.png" alt="Image" class="img-fluid">
							<div class="contents">
								<h3>StrandZomer</h3>
								<div class="cat"></div>
							</div>
						</a>
					</div>
				</div>-->
				
				
				
				
				
				

				
			</div>
		</div>
	</div>
<?php include('Components/footer.php'); ?>
