/**
 * Tierliebe Desktop Menu Enhancement
 * Adds hover delay for better dropdown usability
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    class TiebliebeDesktopMenu {
        constructor() {
            this.menuItems = $('.main-nav-desktop .nav-links > li');
            this.hoverDelay = 200; // ms delay before closing
            this.openDelay = 150;  // ms delay before opening
            this.timers = new Map();

            this.init();
        }

        init() {
            // Only apply on desktop
            if (window.innerWidth <= 968) return;

            this.menuItems.each((index, item) => {
                const $item = $(item);
                const $submenu = $item.find('.sub-menu, .uk-nav-sub');

                if ($submenu.length) {
                    // Mouse enter on parent li
                    $item.on('mouseenter', () => {
                        this.clearTimer($item);
                        this.openSubmenu($item, $submenu);
                    });

                    // Mouse leave on parent li
                    $item.on('mouseleave', () => {
                        this.clearTimer($item);
                        this.scheduleClose($item, $submenu);
                    });

                    // Mouse enter on submenu keeps it open
                    $submenu.on('mouseenter', () => {
                        this.clearTimer($item);
                    });

                    // Mouse leave on submenu schedules close
                    $submenu.on('mouseleave', () => {
                        this.scheduleClose($item, $submenu);
                    });
                }
            });

            // Re-init on window resize
            $(window).on('resize', () => {
                if (window.innerWidth > 968) {
                    this.closeAllSubmenus();
                }
            });
        }

        openSubmenu($item, $submenu) {
            const timerId = setTimeout(() => {
                $submenu.css({
                    'display': 'block',
                    'opacity': '1',
                    'transform': 'translateY(0)',
                    'pointer-events': 'auto'
                });
                $item.addClass('menu-open');
            }, this.openDelay);

            this.timers.set($item, timerId);
        }

        scheduleClose($item, $submenu) {
            const timerId = setTimeout(() => {
                $submenu.css({
                    'opacity': '0',
                    'transform': 'translateY(-10px)',
                    'pointer-events': 'none'
                });

                setTimeout(() => {
                    $submenu.css('display', 'none');
                }, 200);

                $item.removeClass('menu-open');
            }, this.hoverDelay);

            this.timers.set($item, timerId);
        }

        clearTimer($item) {
            if (this.timers.has($item)) {
                clearTimeout(this.timers.get($item));
                this.timers.delete($item);
            }
        }

        closeAllSubmenus() {
            this.menuItems.each((index, item) => {
                const $item = $(item);
                const $submenu = $item.find('.sub-menu, .uk-nav-sub');

                this.clearTimer($item);
                $submenu.css({
                    'display': 'none',
                    'opacity': '0',
                    'transform': 'translateY(-10px)',
                    'pointer-events': 'none'
                });
                $item.removeClass('menu-open');
            });
        }
    }

    // Initialize on document ready
    $(document).ready(function() {
        new TiebliebeDesktopMenu();
    });

})(jQuery);
