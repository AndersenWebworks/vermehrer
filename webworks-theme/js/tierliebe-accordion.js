/**
 * Tierliebe Accordion
 * Version: 1.0
 * Description: Smooth accordion functionality for collapsible content
 */

(function($) {
    'use strict';

    // Accordion Class
    class TierliebeAccordion {
        constructor(container) {
            this.container = $(container);
            this.items = this.container.find('.accordion-item');
            this.headers = this.container.find('.accordion-header');
            this.allowMultiple = this.container.data('allow-multiple') || false;
            this.init();
        }

        init() {
            // Close all items by default
            this.items.each(function() {
                $(this).find('.accordion-content').hide();
            });

            // Open first item if specified
            if (this.container.data('open-first')) {
                this.items.first().addClass('active');
                this.items.first().find('.accordion-content').show();
            }

            // Bind click events
            this.headers.on('click', (e) => this.toggle(e));

            // Keyboard navigation
            this.headers.on('keydown', (e) => this.handleKeyboard(e));
        }

        toggle(e) {
            e.preventDefault();
            const header = $(e.currentTarget);
            const item = header.closest('.accordion-item');
            const content = item.find('.accordion-content');
            const isActive = item.hasClass('active');

            // Close all items if not allowing multiple
            if (!this.allowMultiple && !isActive) {
                this.items.removeClass('active');
                this.items.find('.accordion-content').slideUp(300);
            }

            // Toggle current item
            if (isActive) {
                item.removeClass('active');
                content.slideUp(300);
            } else {
                item.addClass('active');
                content.slideDown(300);
            }
        }

        handleKeyboard(e) {
            const currentHeader = $(e.currentTarget);
            const currentIndex = this.headers.index(currentHeader);
            let newIndex;

            switch(e.key) {
                case 'Enter':
                case ' ':
                    e.preventDefault();
                    currentHeader.trigger('click');
                    break;
                case 'ArrowDown':
                    e.preventDefault();
                    newIndex = (currentIndex + 1) % this.headers.length;
                    this.headers.eq(newIndex).focus();
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    newIndex = (currentIndex - 1 + this.headers.length) % this.headers.length;
                    this.headers.eq(newIndex).focus();
                    break;
                case 'Home':
                    e.preventDefault();
                    this.headers.first().focus();
                    break;
                case 'End':
                    e.preventDefault();
                    this.headers.last().focus();
                    break;
            }
        }

        // Public method to open specific item
        openItem(index) {
            const item = this.items.eq(index);
            if (item.length) {
                if (!this.allowMultiple) {
                    this.items.removeClass('active');
                    this.items.find('.accordion-content').slideUp(300);
                }
                item.addClass('active');
                item.find('.accordion-content').slideDown(300);
            }
        }

        // Public method to close all items
        closeAll() {
            this.items.removeClass('active');
            this.items.find('.accordion-content').slideUp(300);
        }
    }

    // Initialize all accordion containers on page load
    $(document).ready(function() {
        $('.tierliebe-accordion').each(function() {
            new TierliebeAccordion(this);
        });
    });

    // Make class globally available
    window.TierliebeAccordion = TierliebeAccordion;

})(jQuery);
