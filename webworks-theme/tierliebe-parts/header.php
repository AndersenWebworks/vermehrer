<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Tierliebe Header Partial -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Fredoka:wght@400;500;600&family=Caveat:wght@600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Floating Decorations -->
<div class="float-decoration" style="font-size: 8rem;">🐾</div>
<div class="float-decoration" style="font-size: 6rem;">❤️</div>
<div class="float-decoration" style="font-size: 7rem;">🐾</div>
<div class="float-decoration" style="font-size: 5rem;">💕</div>

<!-- Header -->
<header class="header">
    <div class="header-content">
        <a href="<?php echo home_url('/tierliebe-start'); ?>" class="logo">
            <span class="logo-icon">🐾</span> Tierliebe-Check
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="<?php echo home_url('/tierliebe-start'); ?>">Start</a></li>
                <li><a href="<?php echo home_url('/tierliebe-tiere'); ?>">Tiere</a></li>
                <li><a href="<?php echo home_url('/tierliebe-mythen'); ?>">Mythen</a></li>
                <li><a href="<?php echo home_url('/tierliebe-test'); ?>">Test</a></li>
            </ul>
        </nav>
    </div>
</header>
