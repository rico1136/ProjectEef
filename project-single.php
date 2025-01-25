<?php
if (isset($projectData)) {
    $pageTitle = $projectData['name'];
    $images = $projectData['images'];

    // Set the locale to Dutch
setlocale(LC_TIME, 'nl_NL.UTF-8'); 

// Parse the start and end dates
$startDate = $projectData['startDate'];
$endDate = $projectData['endDate'];

// Convert them to DateTime objects
$startDateTime = new DateTime($startDate);
$endDateTime = new DateTime($endDate);

// Format the dates in the desired Dutch format
$startDateFormatted = strftime('%d %B %Y', $startDateTime->getTimestamp());
$endDateFormatted = strftime('%d %B %Y', $endDateTime->getTimestamp());
}
include('Components/header.php');
include('Components/navmenu.php');
?>


<div class="hero-2 overlay" style="background-image: url(<?php echo $images[0] ?>);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto ">
                <h1 class="mb-5 text-center"><span><?php echo $pageTitle ?></span></h1>
                <div class="intro-desc text-left">
                    <div class="line"></div>
                    <p><?php echo $projectData['description']  ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sec-4 section bg-light">
    <div class="container">

        <div class="mb-5">
            <h2 class="heading mb-5 text-center"><?php echo $pageTitle ?></h2>
        </div>
        <div class="testimonial-slide-center-wrap" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-slide-center testimonial-center" id="testimonial-center">
                <?php foreach ($images as $image): ?>
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="testimonial-item-inner" data-micromodal-trigger="modal-1">
                                <img src="<?php echo $image ?>" alt="Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div id="testimonial-nav">
                <span class="prev" data-controls="prev"><span class="icon-chevron-left"></span></span>

                <span class="next" data-controls="next"><span class="icon-chevron-right"></span></span>
            </div>
        </div>
    </div>
</div>
<div class="text-center mb-5">

    <div class="row">
        <div class="col-sm-3 border-left">
            <span class="text-black-50 d-block">Project Jaar:</span> <?php echo $projectData['year'] ?>
        </div>
        <div class="col-sm-3 border-left">
            <span class="text-black-50 d-block">Opdrachtgever:</span> <?php echo $projectData['client'] ?>
        </div>
        <div class="col-sm-3 border-left">
            <span class="text-black-50 d-block">Begin:</span> <?php echo $startDateFormatted ?>
        </div>
        <div class="col-sm-3 border-left">
            <span class="text-black-50 d-block">Eind:</span> <?php echo $endDateFormatted ?>
        </div>
    </div>
</div>
</div>
</div>
<?php include('Components/footer.php'); ?>
