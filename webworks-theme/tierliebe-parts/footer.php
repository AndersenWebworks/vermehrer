<!-- Footer -->
<!-- Tierliebe Footer Partial -->
<?php
// Load global footer content from WordPress options
$footer_content = get_tierliebe_footer();
?>
<footer class="footer" data-edit-context="footer">
    <div class="footer-content">
        <div class="editable" data-key="footer-text">
            <?php echo wp_kses_post($footer_content['footer-text'] ?? 'Jeder unnötige Ausdruck dieser Seite kostet Ressourcen, zerstört Lebensräume und belastet das Klima.'); ?>
        </div>
        <div class="editable" data-key="footer-signatur" style="margin-top: 15px; font-size: 0.95rem; opacity: 0.8;">
            <?php echo wp_kses_post($footer_content['footer-signatur'] ?? 'Mit 💕 für alle Tiere gemacht'); ?>
        </div>
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

// Mobile menu handling is in tierliebe-mobile-menu.js
</script>

<?php wp_footer(); ?>
</body>
</html>
