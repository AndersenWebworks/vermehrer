/**
 * Tierliebe Mobile Navigation
 * Version: 1.0.0
 * Description: Handles mobile menu toggle, overlay, and submenu interaction
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileNav);
    } else {
        initMobileNav();
    }

    function initMobileNav() {
        const menuToggle = document.getElementById('mobileMenuToggle');
        const mainNav = document.getElementById('mainNav');
        const overlay = document.getElementById('mobileMenuOverlay');
        const submenuParents = document.querySelectorAll('.nav-links li.has-children > a');

        if (!menuToggle || !mainNav || !overlay) {
            console.warn('Tierliebe Mobile Nav: Required elements not found');
            return;
        }

        // Toggle mobile menu
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });

        // Close menu when clicking overlay
        overlay.addEventListener('click', function() {
            closeMenu();
        });

        // Handle submenu toggles on mobile
        submenuParents.forEach(function(link) {
            link.addEventListener('click', function(e) {
                // Only prevent default on mobile (when menu is active)
                if (mainNav.classList.contains('active')) {
                    e.preventDefault();
                    const parentLi = this.parentElement;

                    // Toggle mobile-open class
                    parentLi.classList.toggle('mobile-open');

                    // Close other open submenus (optional - accordion style)
                    const siblings = Array.from(parentLi.parentElement.children);
                    siblings.forEach(function(sibling) {
                        if (sibling !== parentLi && sibling.classList.contains('has-children')) {
                            sibling.classList.remove('mobile-open');
                        }
                    });
                }
            });
        });

        // Close menu when clicking a link (not submenu parent)
        const navLinks = document.querySelectorAll('.nav-links a');
        navLinks.forEach(function(link) {
            // Skip submenu parent links
            if (!link.parentElement.classList.contains('has-children') ||
                link.parentElement.querySelector('.sub-menu') === null) {
                link.addEventListener('click', function() {
                    closeMenu();
                });
            }
        });

        // Close submenu links too
        const submenuLinks = document.querySelectorAll('.nav-links .sub-menu a');
        submenuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        // Close menu on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNav.classList.contains('active')) {
                closeMenu();
            }
        });

        // Prevent body scroll when menu is open
        function toggleBodyScroll(disable) {
            if (disable) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        function toggleMenu() {
            const isActive = mainNav.classList.contains('active');

            if (isActive) {
                closeMenu();
            } else {
                openMenu();
            }
        }

        function openMenu() {
            mainNav.classList.add('active');
            overlay.classList.add('active');
            menuToggle.classList.add('active');
            menuToggle.setAttribute('aria-expanded', 'true');
            menuToggle.setAttribute('aria-label', 'Menü schließen');
            toggleBodyScroll(true);
        }

        function closeMenu() {
            mainNav.classList.remove('active');
            overlay.classList.remove('active');
            menuToggle.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Menü öffnen');

            // Close all open submenus
            document.querySelectorAll('.nav-links li.mobile-open').forEach(function(item) {
                item.classList.remove('mobile-open');
            });

            toggleBodyScroll(false);
        }

        // Handle window resize - close menu if resized above mobile breakpoint
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 968 && mainNav.classList.contains('active')) {
                    closeMenu();
                }
            }, 250);
        });
    }
})();
