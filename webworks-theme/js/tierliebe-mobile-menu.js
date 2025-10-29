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

            console.log('=== TierliebeMobileMenu Debug ===');
            console.log('Toggle button found:', this.menuToggle.length);
            console.log('Toggle button element:', this.menuToggle[0]);
            console.log('Mobile nav found:', this.mainNav.length);

            this.init();
        }

        init() {
            // Toggle mobile menu
            this.menuToggle.on('click', (e) => {
                console.log('=== Toggle Button Clicked ===');
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
            console.log('toggleMenu called, menu active:', this.menuToggle.hasClass('active'));
            if (this.menuToggle.hasClass('active')) {
                console.log('Closing menu');
                this.closeMenu();
            } else {
                console.log('Opening menu');
                this.openMenu();
            }
        }

        openMenu() {
            console.log('=== openMenu() called ===');
            this.mainNav.addClass('active');
            this.menuToggle.addClass('active');
            this.body.addClass('menu-open');
            this.menuToggle.attr('aria-label', 'Menü schließen');
            this.menuToggle.attr('aria-expanded', 'true');

            console.log('Toggle has active class:', this.menuToggle.hasClass('active'));
            console.log('Toggle classes:', this.menuToggle.attr('class'));

            // Force right position via native DOM API
            this.mainNav[0].style.setProperty('right', '0px', 'important');

            // Create backdrop element (::before pseudo-element not working)
            if (!$('#mobile-menu-backdrop').length) {
                $('<div id="mobile-menu-backdrop"></div>').css({
                    'position': 'fixed',
                    'top': '0',
                    'left': '0',
                    'right': '0',
                    'bottom': '0',
                    'background': 'rgba(0, 0, 0, 0.5)',
                    'backdrop-filter': 'blur(4px)',
                    'z-index': '9998',
                    'opacity': '0',
                    'transition': 'opacity 0.3s ease'
                }).appendTo('body');

                setTimeout(() => $('#mobile-menu-backdrop').css('opacity', '1'), 10);
                $('#mobile-menu-backdrop').on('click', () => this.closeMenu());
            }

            // Prevent body scroll when menu is open
            this.body.css('overflow', 'hidden');

            // Focus first menu item for accessibility
            setTimeout(() => {
                this.mainNav.find('.nav-links > li:first-child > a').focus();
            }, 400);
        }

        closeMenu() {
            console.log('=== closeMenu() called ===');
            this.isAnimating = true;

            this.mainNav.removeClass('active');
            this.menuToggle.removeClass('active');
            this.body.removeClass('menu-open');
            this.menuToggle.attr('aria-label', 'Menü öffnen');
            this.menuToggle.attr('aria-expanded', 'false');

            console.log('Toggle has active class after remove:', this.menuToggle.hasClass('active'));

            // Force right position back via native DOM
            this.mainNav[0].style.removeProperty('right');

            // Remove backdrop
            const backdrop = $('#mobile-menu-backdrop');
            if (backdrop.length) {
                backdrop.css('opacity', '0');
                setTimeout(() => backdrop.remove(), 300);
            }

            // Re-enable body scroll
            this.body.css('overflow', '');

            // Close all submenus
            $('.main-nav-mobile .nav-links .has-children').removeClass('open');

            // Return focus to toggle button
            this.menuToggle.focus();

            setTimeout(() => {
                this.isAnimating = false;
            }, 300);
        }

        toggleSubmenu($parent) {
            const isOpen = $parent.hasClass('open');
            const $parentLink = $parent.find('> a');

            // Close all other submenus
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
    }

    // Initialize on document ready
    $(document).ready(function() {
        new TierliebeMobileMenu();
    });

})(jQuery);
