/**
 * Tierliebe Keyboard Navigation
 * Adds arrow key navigation for desktop menu
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    class TiebliebeKeyboardNav {
        constructor() {
            this.navLinks = $('.main-nav-desktop .nav-links');
            this.topLevelItems = this.navLinks.find('> li');
            this.currentIndex = -1;
            this.currentSubmenuIndex = -1;
            this.isInSubmenu = false;

            this.init();
        }

        init() {
            // Only on desktop
            if (window.innerWidth <= 968) return;

            // Listen to keyboard events on navigation
            $(document).on('keydown', (e) => {
                // Only handle if focus is on navigation
                if (!$(e.target).closest('.main-nav-desktop').length) return;

                switch(e.key) {
                    case 'ArrowRight':
                        e.preventDefault();
                        this.navigateRight();
                        break;
                    case 'ArrowLeft':
                        e.preventDefault();
                        this.navigateLeft();
                        break;
                    case 'ArrowDown':
                        e.preventDefault();
                        this.navigateDown();
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        this.navigateUp();
                        break;
                    case 'Enter':
                    case ' ':
                        e.preventDefault();
                        this.activateItem();
                        break;
                    case 'Escape':
                        e.preventDefault();
                        this.closeAllMenus();
                        break;
                }
            });

            // Focus first item on Tab into navigation
            this.topLevelItems.first().find('> a').on('focus', () => {
                if (this.currentIndex === -1) {
                    this.currentIndex = 0;
                }
            });
        }

        navigateRight() {
            if (this.isInSubmenu) return;

            this.currentIndex = (this.currentIndex + 1) % this.topLevelItems.length;
            this.focusCurrentItem();
            this.currentSubmenuIndex = -1;
        }

        navigateLeft() {
            if (this.isInSubmenu) return;

            this.currentIndex = this.currentIndex - 1;
            if (this.currentIndex < 0) {
                this.currentIndex = this.topLevelItems.length - 1;
            }
            this.focusCurrentItem();
            this.currentSubmenuIndex = -1;
        }

        navigateDown() {
            const $currentItem = $(this.topLevelItems[this.currentIndex]);
            const $submenu = $currentItem.find('.sub-menu, .uk-nav-sub');

            if ($submenu.length && !this.isInSubmenu) {
                // Enter submenu
                this.isInSubmenu = true;
                this.currentSubmenuIndex = 0;
                $currentItem.addClass('menu-open');
                $submenu.find('li').eq(0).find('a').focus();
            } else if (this.isInSubmenu) {
                // Navigate within submenu
                const $submenuItems = $submenu.find('li');
                this.currentSubmenuIndex = (this.currentSubmenuIndex + 1) % $submenuItems.length;
                $submenuItems.eq(this.currentSubmenuIndex).find('a').focus();
            }
        }

        navigateUp() {
            if (!this.isInSubmenu) return;

            const $currentItem = $(this.topLevelItems[this.currentIndex]);
            const $submenu = $currentItem.find('.sub-menu, .uk-nav-sub');
            const $submenuItems = $submenu.find('li');

            this.currentSubmenuIndex--;

            if (this.currentSubmenuIndex < 0) {
                // Exit submenu
                this.isInSubmenu = false;
                this.currentSubmenuIndex = -1;
                $currentItem.removeClass('menu-open');
                this.focusCurrentItem();
            } else {
                $submenuItems.eq(this.currentSubmenuIndex).find('a').focus();
            }
        }

        activateItem() {
            if (this.isInSubmenu) {
                const $currentItem = $(this.topLevelItems[this.currentIndex]);
                const $submenu = $currentItem.find('.sub-menu, .uk-nav-sub');
                const $link = $submenu.find('li').eq(this.currentSubmenuIndex).find('a');

                if ($link.length) {
                    window.location.href = $link.attr('href');
                }
            } else if (this.currentIndex >= 0) {
                const $link = $(this.topLevelItems[this.currentIndex]).find('> a');
                const $submenu = $(this.topLevelItems[this.currentIndex]).find('.sub-menu, .uk-nav-sub');

                if ($submenu.length) {
                    // Open submenu
                    this.isInSubmenu = true;
                    this.currentSubmenuIndex = 0;
                    $(this.topLevelItems[this.currentIndex]).addClass('menu-open');
                    $submenu.find('li').eq(0).find('a').focus();
                } else if ($link.length) {
                    window.location.href = $link.attr('href');
                }
            }
        }

        focusCurrentItem() {
            if (this.currentIndex >= 0 && this.currentIndex < this.topLevelItems.length) {
                $(this.topLevelItems[this.currentIndex]).find('> a').focus();
            }
        }

        closeAllMenus() {
            this.topLevelItems.removeClass('menu-open');
            this.isInSubmenu = false;
            this.currentSubmenuIndex = -1;

            if (this.currentIndex >= 0) {
                this.focusCurrentItem();
            }
        }
    }

    // Initialize on document ready
    $(document).ready(function() {
        new TiebliebeKeyboardNav();
    });

})(jQuery);
