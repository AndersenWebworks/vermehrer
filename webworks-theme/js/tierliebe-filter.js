/**
 * Tierliebe Filter
 * Version: 1.3
 * Description: Filter functionality for myth cards and other filterable content
 * Changelog v1.3: CSS-only smooth fade transitions, no complex animations
 */

(function($) {
    'use strict';

    // Filter Class
    class TierliebeFilter {
        constructor(container) {
            this.container = $(container);
            this.filterButtons = this.container.find('.filter-button');
            this.filterItems = this.container.find('.filter-item');
            this.currentFilter = 'all';
            this.init();
        }

        init() {
            // Set first button as active
            this.filterButtons.first().addClass('active');

            // Bind click events
            this.filterButtons.on('click', (e) => this.filter(e));

            // Count items per category
            this.updateCounts();
        }

        filter(e) {
            e.preventDefault();
            const button = $(e.currentTarget);
            const filterValue = button.data('filter');

            // Update active state
            this.filterButtons.removeClass('active');
            button.addClass('active');

            // Store current filter
            this.currentFilter = filterValue;

            // Filter items
            if (filterValue === 'all') {
                this.filterItems.fadeIn(300).addClass('visible');
            } else {
                this.filterItems.each(function() {
                    const item = $(this);
                    const categories = item.data('categories') || '';
                    const categoryArray = categories.toString().split(',').map(c => c.trim());

                    if (categoryArray.includes(filterValue)) {
                        item.fadeIn(300).addClass('visible');
                    } else {
                        item.fadeOut(300).removeClass('visible');
                    }
                });
            }

            // Smooth scroll to content
            $('html, body').animate({
                scrollTop: this.container.find('.filter-grid').offset().top - 100
            }, 300);
        }

        updateCounts() {
            this.filterButtons.each((index, button) => {
                const $button = $(button);
                const filterValue = $button.data('filter');
                let count = 0;

                if (filterValue === 'all') {
                    count = this.filterItems.length;
                } else {
                    this.filterItems.each(function() {
                        const categories = $(this).data('categories') || '';
                        const categoryArray = categories.toString().split(',').map(c => c.trim());
                        if (categoryArray.includes(filterValue)) {
                            count++;
                        }
                    });
                }

                // Add count badge if specified
                if ($button.data('show-count')) {
                    const countBadge = `<span class="filter-count">${count}</span>`;
                    $button.append(countBadge);
                }
            });
        }

        // Public method to set filter programmatically
        setFilter(filterValue) {
            const button = this.filterButtons.filter(`[data-filter="${filterValue}"]`);
            if (button.length) {
                button.trigger('click');
            }
        }

        // Public method to get current filter
        getCurrentFilter() {
            return this.currentFilter;
        }
    }

    // Initialize all filter containers on page load
    $(document).ready(function() {
        $('.tierliebe-filter').each(function() {
            new TierliebeFilter(this);
        });

        // Mythen Page Filter (smooth CSS-only animation)
        $('.filter-btn').on('click', function() {
            const filter = $(this).data('filter');

            // Update active state
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            const $cards = $('.mythos-card');

            // Fade out all cards first
            $cards.addClass('filter-hiding');

            // Wait for fade out, then switch visibility
            setTimeout(function() {
                if (filter === 'all') {
                    $cards.removeClass('filter-hidden').removeClass('filter-hiding');
                } else {
                    $cards.each(function() {
                        const $card = $(this);
                        const category = $card.data('category');

                        if (category === filter || category === 'all') {
                            $card.removeClass('filter-hidden').removeClass('filter-hiding');
                        } else {
                            $card.addClass('filter-hidden').removeClass('filter-hiding');
                        }
                    });
                }
            }, 350);
        });
    });

    // Make class globally available
    window.TierliebeFilter = TierliebeFilter;

})(jQuery);
