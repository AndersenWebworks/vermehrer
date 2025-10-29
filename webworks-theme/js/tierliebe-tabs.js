/**
 * Tierliebe Tab Switcher
 * Version: 1.0
 * Description: Multi-level tab switching functionality
 */

(function($) {
    'use strict';

    // Tab Switcher Class
    class TierliebeTabSwitcher {
        constructor(container) {
            this.container = $(container);
            this.tabs = this.container.find('.tab-button');
            this.panels = this.container.find('.tab-panel');
            this.init();
        }

        init() {
            // Set first tab as active
            this.tabs.first().addClass('active');
            this.panels.first().addClass('active');

            // Bind click events
            this.tabs.on('click', (e) => this.switchTab(e));

            // Keyboard navigation
            this.tabs.on('keydown', (e) => this.handleKeyboard(e));
        }

        switchTab(e) {
            e.preventDefault();
            const clickedTab = $(e.currentTarget);
            const tabIndex = clickedTab.data('tab');

            // Remove active class from all tabs and panels
            this.tabs.removeClass('active');
            this.panels.removeClass('active');

            // Add active class to clicked tab and corresponding panel
            clickedTab.addClass('active');
            this.container.find(`.tab-panel[data-tab="${tabIndex}"]`).addClass('active');

            // Smooth scroll to content
            $('html, body').animate({
                scrollTop: this.container.offset().top - 100
            }, 300);
        }

        handleKeyboard(e) {
            const currentIndex = this.tabs.index($(e.currentTarget));
            let newIndex;

            switch(e.key) {
                case 'ArrowRight':
                case 'ArrowDown':
                    e.preventDefault();
                    newIndex = (currentIndex + 1) % this.tabs.length;
                    this.tabs.eq(newIndex).trigger('click').focus();
                    break;
                case 'ArrowLeft':
                case 'ArrowUp':
                    e.preventDefault();
                    newIndex = (currentIndex - 1 + this.tabs.length) % this.tabs.length;
                    this.tabs.eq(newIndex).trigger('click').focus();
                    break;
                case 'Home':
                    e.preventDefault();
                    this.tabs.first().trigger('click').focus();
                    break;
                case 'End':
                    e.preventDefault();
                    this.tabs.last().trigger('click').focus();
                    break;
            }
        }
    }

    // Initialize all tab containers on page load
    $(document).ready(function() {
        // Mobile Menu Toggle
        $('.mobile-menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-nav').toggleClass('active');
            $('body').toggleClass('menu-open');
        });

        // Mobile Submenu Toggle
        $('.nav-links .has-children > a').on('click', function(e) {
            if ($(window).width() <= 968) {
                e.preventDefault();
                $(this).parent().toggleClass('open');
            }
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header').length && $('.main-nav').hasClass('active')) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-nav').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });

        // Close menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 968) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-nav').removeClass('active');
                $('body').removeClass('menu-open');
                $('.nav-links .has-children').removeClass('open');
            }
        });


        $('.tierliebe-tabs').each(function() {
            new TierliebeTabSwitcher(this);
        });

        // Main Tabs (Wissen Page)
        $('.tab-btn').on('click', function() {
            const tab = $(this).data('tab');

            $('.tab-btn').removeClass('active');
            $(this).addClass('active');

            $('.tab-content').removeClass('active');
            $('#tab-' + tab).addClass('active');
        });

        // Sub-Tabs (Geschlechter)
        $('.sub-tab-btn').on('click', function() {
            const subtab = $(this).data('subtab');

            $('.sub-tab-btn').removeClass('active');
            $(this).addClass('active');

            $('.sub-tab-content').removeClass('active');
            $('#subtab-' + subtab).addClass('active');
        });
    });

    // Make class globally available
    window.TierliebeTabSwitcher = TierliebeTabSwitcher;

})(jQuery);
