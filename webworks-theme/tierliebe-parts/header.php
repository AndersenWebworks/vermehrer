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
        <a href="<?php echo home_url('/'); ?>" class="logo">
            <span class="logo-icon">🐾</span> Tierliebe-Check
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" aria-label="Menü öffnen">
            <span class="hamburger"></span>
            <span class="hamburger"></span>
            <span class="hamburger"></span>
        </button>

        <nav class="main-nav main-nav-desktop">
            <ul class="nav-links">
                <li><a href="<?php echo home_url('/tierliebe-start'); ?>">🏠 Start</a></li>
                <li class="has-children">
                    <a href="#">💡 Beratung</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo home_url('/tierliebe-test'); ?>">✨ Bin ich bereit?</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-mythen'); ?>">💭 Mythen & Irrtümer</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">🐕 Tiere</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo home_url('/tierliebe-hunde'); ?>">🐶 Hunde</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-katzen'); ?>">🐱 Katzen</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-kleintiere'); ?>">🐰 Kleintiere</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-exoten'); ?>">🦎 Vögel & Exoten</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">❤️ Verantwortung</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo home_url('/tierliebe-adoption'); ?>">🤝 Adoption</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-qualzucht'); ?>">⚠️ Qualzucht</a></li>
                        <li><a href="<?php echo home_url('/tierliebe-wissen'); ?>">📚 Wissen</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo home_url('/tierliebe-kontakt'); ?>">📧 Kontakt</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Mobile Menu (outside header for proper z-index stacking) -->
<nav class="main-nav main-nav-mobile">
    <ul class="nav-links">
        <li><a href="<?php echo home_url('/tierliebe-start'); ?>">🏠 Start</a></li>
        <li class="has-children">
            <a href="#">💡 Beratung</a>
            <ul class="sub-menu">
                <li><a href="<?php echo home_url('/tierliebe-test'); ?>">✨ Bin ich bereit?</a></li>
                <li><a href="<?php echo home_url('/tierliebe-mythen'); ?>">💭 Mythen & Irrtümer</a></li>
            </ul>
        </li>
        <li class="has-children">
            <a href="#">🐕 Tiere</a>
            <ul class="sub-menu">
                <li><a href="<?php echo home_url('/tierliebe-hunde'); ?>">🐶 Hunde</a></li>
                <li><a href="<?php echo home_url('/tierliebe-katzen'); ?>">🐱 Katzen</a></li>
                <li><a href="<?php echo home_url('/tierliebe-kleintiere'); ?>">🐰 Kleintiere</a></li>
                <li><a href="<?php echo home_url('/tierliebe-exoten'); ?>">🦎 Vögel & Exoten</a></li>
            </ul>
        </li>
        <li class="has-children">
            <a href="#">❤️ Verantwortung</a>
            <ul class="sub-menu">
                <li><a href="<?php echo home_url('/tierliebe-adoption'); ?>">🤝 Adoption</a></li>
                <li><a href="<?php echo home_url('/tierliebe-qualzucht'); ?>">⚠️ Qualzucht</a></li>
                <li><a href="<?php echo home_url('/tierliebe-wissen'); ?>">📚 Wissen</a></li>
            </ul>
        </li>
        <li><a href="<?php echo home_url('/tierliebe-kontakt'); ?>">📧 Kontakt</a></li>
    </ul>
</nav>
