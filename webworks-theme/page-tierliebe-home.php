<?php
/**
 * Template Name: Tierliebe - Start
 * Template Post Type: page
 * Description: Startseite für Tierliebe-Portal
 * Version: 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
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

<!-- CONTENT STARTS HERE -->
<!-- Wird befüllt mit VM-Content Sektion 1 + 2 -->

<section class="section">
    <div class="section-header">
        <h2 class="section-title">🏠 Startseite</h2>
        <p class="section-subtitle">Content wird in Phase 2 eingefügt</p>
    </div>
</section>

<!-- CONTENT ENDS HERE -->

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <h3>🌍 Denk an die Tiere, Wälder & das Klima</h3>
        <p>Jeder unnötige Ausdruck dieser Seite kostet Ressourcen, zerstört Lebensräume und belastet das Klima.</p>
        <p style="margin-top: 30px; padding-top: 30px; border-top: 3px solid var(--cute-mint);">
            &copy; <?php echo date('Y'); ?> Annemarie Andersen | <a href="https://www.annemarie-andersen.de">annemarie-andersen.de</a>
        </p>
        <p style="margin-top: 15px; font-size: 0.95rem; opacity: 0.8;">
            Mit 💕 für alle Tiere gemacht
        </p>
    </div>
</footer>

<!-- Scroll to Top -->
<button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
    <span>↑</span>
</button>

<script>
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Scroll to Top Button Visibility
window.addEventListener('scroll', function() {
    const scrollTop = document.getElementById('scrollTop');
    if (window.pageYOffset > 400) {
        scrollTop.classList.add('visible');
    } else {
        scrollTop.classList.remove('visible');
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
