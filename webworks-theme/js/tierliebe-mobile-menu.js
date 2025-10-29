/**
 * Tierliebe Mobile Menu
 * Handles mobile navigation toggle and submenu expansion
 * Version: 2.0.0 - Refactored & Optimized
 */

(function($) {
    'use strict';

    // Prevent multiple initializations
    if (window.TierliebeMobileMenuInitialized) {
        return;
    }

    class TierliebeMobileMenu {
        constructor() {
            this.menuToggle = $('.mobile-menu-toggle');
            this.mainNav = $('.main-nav-mobile');
            this.body = $('body');
            this.hasChildrenLinks = $('.main-nav-mobile .nav-links .has-children > a');
            this.isAnimating = false;
            this.backdrop = null;

            // Validate elements exist
            if (!this.menuToggle.length || !this.mainNav.length) {
                console.warn('TierliebeMobileMenu: Required elements not found');
                return;
            }

            this.init();
        }

        init() {
            // Toggle mobile menu
            this.menuToggle.on('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.toggleMenu();
            });

            // Handle submenu clicks on mobile
            this.hasChildrenLinks.on('click', (e) => {
                if (window.innerWidth <= 968) {
                    e.preventDefault();
                    this.toggleSubmenu($(e.currentTarget).parent());
                }
            });

            // Close menu when clicking outside
            $(document).on('click.tierliebeMobileMenu', (e) => {
                if (this.mainNav.hasClass('active') &&
                    !$(e.target).closest('.main-nav-mobile, .mobile-menu-toggle').length) {
                    this.closeMenu();
                }
            });

            // Close menu on escape key
            $(document).on('keydown.tierliebeMobileMenu', (e) => {
                if (e.key === 'Escape' && this.mainNav.hasClass('active')) {
                    this.closeMenu();
                }
            });

            // Handle window resize
            $(window).on('resize.tierliebeMobileMenu', () => {
                if (window.innerWidth > 968 && this.mainNav.hasClass('active')) {
                    this.closeMenu();
                }
            });
        }

        toggleMenu() {
            if (this.isAnimating) return;

            if (this.menuToggle.hasClass('active')) {
                this.closeMenu();
            } else {
                this.openMenu();
            }
        }

        openMenu() {
            if (this.isAnimating) return;
            this.isAnimating = true;

            // Add active classes
            this.mainNav.addClass('active');
            this.menuToggle.addClass('active');
            this.body.addClass('menu-open');

            // Update ARIA attributes
            this.menuToggle.attr('aria-label', 'Menü schließen');
            this.menuToggle.attr('aria-expanded', 'true');

            // Create backdrop
            this.createBackdrop();

            // Prevent body scroll
            this.body.css('overflow', 'hidden');

            // Focus first menu item for accessibility
            setTimeout(() => {
                this.mainNav.find('.nav-links > li:first-child > a').focus();
                this.isAnimating = false;
            }, 400);
        }

        closeMenu() {
            if (this.isAnimating) return;
            this.isAnimating = true;

            // Remove active classes
            this.mainNav.removeClass('active');
            this.menuToggle.removeClass('active');
            this.body.removeClass('menu-open');

            // Update ARIA attributes
            this.menuToggle.attr('aria-label', 'Menü öffnen');
            this.menuToggle.attr('aria-expanded', 'false');

            // Remove backdrop
            this.removeBackdrop();

            // Re-enable body scroll
            this.body.css('overflow', '');

            // Close all submenus
            $('.main-nav-mobile .nav-links .has-children').removeClass('open');

            // Return focus to toggle button
            this.menuToggle.focus();

            setTimeout(() => {
                this.isAnimating = false;
            }, 400);
        }

        toggleSubmenu($parent) {
            const isOpen = $parent.hasClass('open');
            const $parentLink = $parent.find('> a');

            // Close all other submenus (accordion behavior)
            $('.main-nav-mobile .nav-links .has-children').not($parent).removeClass('open');
            $('.main-nav-mobile .nav-links .has-children').not($parent).find('> a').attr('aria-expanded', 'false');

            // Toggle current submenu
            if (isOpen) {
                $parent.removeClass('open');
                $parentLink.attr('aria-expanded', 'false');
            } else {
                $parent.addClass('open');
                $parentLink.attr('aria-expanded', 'true');
            }
        }

        createBackdrop() {
            if (!$('#mobile-menu-backdrop').length) {
                this.backdrop = $('<div id="mobile-menu-backdrop"></div>');
                this.backdrop.appendTo('body');

                // Trigger reflow for transition
                this.backdrop[0].offsetHeight;
                this.backdrop.addClass('active');

                // Click handler
                this.backdrop.on('click', () => this.closeMenu());
            }
        }

        removeBackdrop() {
            const backdrop = $('#mobile-menu-backdrop');
            if (backdrop.length) {
                backdrop.removeClass('active');
                setTimeout(() => backdrop.remove(), 300);
            }
        }

        // Public method to destroy instance
        destroy() {
            $(document).off('.tierliebeMobileMenu');
            $(window).off('.tierliebeMobileMenu');
            this.removeBackdrop();
            this.closeMenu();
        }
    }

    // Initialize on document ready
    $(document).ready(function() {
        window.TierliebeMobileMenuInstance = new TierliebeMobileMenu();
        window.TierliebeMobileMenuInitialized = true;
    });

    // Make class globally available
    window.TierliebeMobileMenu = TierliebeMobileMenu;

})(jQuery);
