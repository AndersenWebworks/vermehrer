/**
 * Tierliebe Mobile Menu
 * Handles mobile navigation toggle and submenu expansion
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    class TierliebeMobileMenu {
        constructor() {
            this.menuToggle = $('.mobile-menu-toggle');
            this.mainNav = $('.main-nav-mobile');
            this.body = $('body');
            this.hasChildrenLinks = $('.main-nav-mobile .nav-links .has-children > a');

            console.log('TierliebeMobileMenu initialized');
            console.log('Toggle button found:', this.menuToggle.length);
            console.log('Mobile nav found:', this.mainNav.length);

            this.init();
        }

        init() {
            // Toggle mobile menu
            this.menuToggle.on('click', (e) => {
                e.preventDefault();
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
            $(document).on('click', (e) => {
                if (this.mainNav.hasClass('active') &&
                    !$(e.target).closest('.main-nav-mobile, .mobile-menu-toggle').length) {
                    this.closeMenu();
                }
            });

            // Close menu on escape key
            $(document).on('keydown', (e) => {
                if (e.key === 'Escape' && this.mainNav.hasClass('active')) {
                    this.closeMenu();
                }
            });

            // Handle window resize
            $(window).on('resize', () => {
                if (window.innerWidth > 968 && this.mainNav.hasClass('active')) {
                    this.closeMenu();
                }
            });
        }

        toggleMenu() {
            if (this.mainNav.hasClass('active')) {
                this.closeMenu();
            } else {
                this.openMenu();
            }
        }

        openMenu() {
            console.log('openMenu called');
            console.log('Before - nav has active:', this.mainNav.hasClass('active'));

            this.mainNav.addClass('active');
            this.menuToggle.addClass('active');
            this.body.addClass('menu-open');
            this.menuToggle.attr('aria-label', 'Menü schließen');

            // Force right position via native DOM API (bypassing jQuery)
            this.mainNav[0].style.setProperty('right', '0px', 'important');

            console.log('After setProperty - right position:', this.mainNav.css('right'));
            console.log('Computed style:', window.getComputedStyle(this.mainNav[0]).right);

            // Prevent body scroll when menu is open
            this.body.css('overflow', 'hidden');
        }

        closeMenu() {
            this.mainNav.removeClass('active');
            this.menuToggle.removeClass('active');
            this.body.removeClass('menu-open');
            this.menuToggle.attr('aria-label', 'Menü öffnen');

            // Force right position back via native DOM
            this.mainNav[0].style.removeProperty('right');

            // Re-enable body scroll
            this.body.css('overflow', '');

            // Close all submenus
            $('.main-nav-mobile .nav-links .has-children').removeClass('open');
        }

        toggleSubmenu($parent) {
            const isOpen = $parent.hasClass('open');

            // Close all other submenus
            $('.main-nav-mobile .nav-links .has-children').not($parent).removeClass('open');

            // Toggle current submenu
            if (isOpen) {
                $parent.removeClass('open');
            } else {
                $parent.addClass('open');
            }
        }
    }

    // Initialize on document ready
    $(document).ready(function() {
        new TierliebeMobileMenu();
    });

})(jQuery);
