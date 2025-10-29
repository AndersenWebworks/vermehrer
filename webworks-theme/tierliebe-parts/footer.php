<!-- Footer -->
<!-- Tierliebe Footer Partial -->
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

// Mobile menu handling is in tierliebe-mobile-menu.js
</script>

<?php wp_footer(); ?>
</body>
</html>
