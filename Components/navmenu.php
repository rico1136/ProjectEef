<?php
// Get the current URL path
$currentPage = basename($_SERVER['REQUEST_URI']);

$currentPage = str_replace($base_path, '', $currentPage);
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
            <a href="index" class="logo m-0 float-start">project eef<span class="text-primary">.</span> </a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-start">
                <li class="<?php echo ($currentPage == '') ? 'active' : ''; ?>"><a href="<?php echo $base_path ?>/">Home</a></li>
                <li class="<?php echo (strpos($currentPage, '/projects') !== false) ? 'active' : ''; ?>"><a href="/projects">Projects</a></li>
                <li class="<?php echo (strpos($currentPage, '/contact') !== false) ? 'active' : ''; ?>"><a href="/contact">Contact</a></li>
                </ul>
            <a href="#" class="burger ml-auto float-end site-menu-toggle light js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
    </div>
</nav>