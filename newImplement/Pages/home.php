<?php 
$pageTitle = "Home"; 
include('Components/header.php'); 

// Load JSON content
$content = json_decode(file_get_contents('Pages/home.json'), true);

// Access specific content
$hero = $content['heroSection'];
$about = $content['aboutSection'];
$projects = $content['projectsSection'];
$methodology = $content['methodologySection'];
$accordion = $content['accordionSections'];
?>

<body>

<?php include('Components/navmenu.php'); ?>

<div class="hero-2 overlay" style="background-image: url('<?php echo $hero['backgroundImage']; ?>');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto">
                <h1 class="mb-5"><span><?php echo $hero['welcomeText']; ?></span> <span class="d-block"><?php echo $hero['projectTitle']; ?></span></h1>
                <div class="intro-desc">
                    <div class="line"></div>
                    <p><?php echo $hero['introText']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-1">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-5">
                <h2 class="heading"><?php echo $about['title']; ?></h2>
                <p><?php echo $about['content']; ?></p>
            </div>
            <div class="col-lg-2" style="max-height: 100%;">
                <img src="images/OverEef/FotoEvy.jpeg" alt="Image" class="img-fluid img-r">
            </div>
        </div>
    </div>
</div>

<div class="section sec-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="heading"><?php echo $projects['title']; ?></h2>
            </div>
            <div class="col-lg-4">
                <p><?php echo $projects['description']; ?></p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Project Cards (Example) -->
            <!-- Dynamically generated based on your project data -->
        </div>
    </div>
</div>

<div class="sec-3 section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2 class="heading"><?php echo $methodology['title']; ?></h2>
                <p><?php echo $methodology['content']; ?></p>
            </div>

            <div class="col-lg-6 ms-auto">
                <div class="accordion accordion-flush accordion-1" id="accordionFlushExample">
                    <?php foreach ($accordion as $section): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading<?php echo $section['title']; ?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $section['title']; ?>" aria-expanded="true" aria-controls="flush-collapse<?php echo $section['title']; ?>">
                                <?php echo $section['title']; ?>
                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo $section['title']; ?>" class="accordion-collapse collapse show" aria-labelledby="flush-heading<?php echo $section['title']; ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row justify-content-between">
                                    <div class="col-md-4">
                                        <img src="<?php echo $section['image']; ?>" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $section['content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('Components/footer.php'); 
?>
