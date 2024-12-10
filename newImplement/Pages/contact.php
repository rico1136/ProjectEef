<?php 
$pageTitle = "Home"; 
include('Components/header.php'); 

// Load JSON content
$content = json_decode(file_get_contents('Pages/contact.json'), true);


?>
<body>

<?php include('Components/navmenu.php'); ?>

<div class="hero-2 overlay" style="background-image: url('images/StrandZomer/Strandzomer1.png');">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5 mx-auto ">
				<h1 class="mb-5 text-center"><span>Contact mij</span></h1>


				<div class="intro-desc text-left">
					<div class="line"></div>
					<p></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="containerContact">
	<div class="container">
		<div class="content">
			<div class="left-side">
				<div class="address details">
					<i class="fas fa-map-marker-alt"></i>
					<div class="topic">Gevestigd</div>
					<div class="text-one">Kudelstaart</div>
				</div>
				<div class="phone details">
					<i class="fas fa-phone-alt"></i>
					<div class="topic">Bel mij op</div>
					<div class="text-one"><a href="tel:0615628540">(+31) 6 15628540</a></div>
					<!--
                                        <div class="text-two">+0096 3434 5678</div>
                    -->
				</div>
				<div class="email details">
					<i class="fas fa-envelope"></i>
					<div class="topic">Email</div>
					<div class="text-one"><a href="mailto:contact@projecteef.nl">contact@projecteef.nl</a> </p></div>
				</div>
			</div>
			<div class="right-side">
				<div class="topic-text">Stuur mij een aanvraag</div>
				<a class="button" href="mailto:contact@projecteef.nl?subject=Informatie%20Aanvraag&body=Hii%20Projecteef%2C%0A%0AHierbij%20wil%20ik%20graag%20informatie%20aanvragen%20over%3A%20%0A-%09Interieurontwerp%20gehele%20woning%0A-%09Interieurontwerp%20woonkamer%20(keuken)%0A-%09Interieurontwerp%20badkamer%0A-%09Stijladvies%0A-%09Kleur-en%20materiaaladvies%0A-%09Verlichtingsadvies%0A-%09Uitvoering%20%0A-%09Anders%3A%20%E2%80%A6.%0A(verwijder%20wat%20niet%20van%20toepassing%20is)%0A%0AAanvullende%20informatie%20aanvraag%3A%20%E2%80%A6.%0A%0AIk%20ben%20bereikbaar%20via%20dit%20emailadres%20of%20op%20dit%20telefoonnummer%3A%20%E2%80%A6.%0A%0AMet%20vriendelijke%20groet%2C%0A%E2%80%A6.">Mail mij</a>
			</div>
		</div>
	</div>
</div>

<?php 
include('Components/footer.php'); 
?>
