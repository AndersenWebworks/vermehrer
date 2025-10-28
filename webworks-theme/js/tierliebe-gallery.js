/**
 * Tierliebe Gallery/Slideshow
 * Version: 1.0
 * Description: Image gallery and slideshow functionality for breed examples
 */

(function($) {
    'use strict';

    // Gallery Class
    class TierliebeGallery {
        constructor(container) {
            this.container = $(container);
            this.slides = this.container.find('.gallery-slide');
            this.currentIndex = 0;
            this.autoplay = this.container.data('autoplay') || false;
            this.autoplaySpeed = this.container.data('autoplay-speed') || 5000;
            this.autoplayTimer = null;
            this.init();
        }

        init() {
            // Hide all slides except first
            this.slides.hide();
            this.slides.first().show().addClass('active');

            // Create navigation
            this.createNavigation();

            // Create dots/indicators
            this.createDots();

            // Bind swipe events for touch devices
            this.bindSwipeEvents();

            // Start autoplay if enabled
            if (this.autoplay) {
                this.startAutoplay();
            }

            // Pause autoplay on hover
            this.container.on('mouseenter', () => this.pauseAutoplay());
            this.container.on('mouseleave', () => {
                if (this.autoplay) this.startAutoplay();
            });
        }

        createNavigation() {
            const prevButton = $('<button class="gallery-nav gallery-prev" aria-label="Previous slide">‹</button>');
            const nextButton = $('<button class="gallery-nav gallery-next" aria-label="Next slide">›</button>');

            prevButton.on('click', () => this.prev());
            nextButton.on('click', () => this.next());

            this.container.append(prevButton, nextButton);
        }

        createDots() {
            const dotsContainer = $('<div class="gallery-dots"></div>');

            this.slides.each((index) => {
                const dot = $(`<button class="gallery-dot" data-index="${index}" aria-label="Go to slide ${index + 1}"></button>`);
                if (index === 0) dot.addClass('active');

                dot.on('click', () => this.goTo(index));
                dotsContainer.append(dot);
            });

            this.container.append(dotsContainer);
            this.dots = dotsContainer.find('.gallery-dot');
        }

        next() {
            this.goTo((this.currentIndex + 1) % this.slides.length);
        }

        prev() {
            this.goTo((this.currentIndex - 1 + this.slides.length) % this.slides.length);
        }

        goTo(index) {
            if (index === this.currentIndex) return;

            const currentSlide = this.slides.eq(this.currentIndex);
            const nextSlide = this.slides.eq(index);

            // Update active states
            this.slides.removeClass('active');
            this.dots.removeClass('active');

            // Fade transition
            currentSlide.fadeOut(300, function() {
                nextSlide.fadeIn(300).addClass('active');
            });

            this.dots.eq(index).addClass('active');
            this.currentIndex = index;

            // Reset autoplay timer
            if (this.autoplay) {
                this.pauseAutoplay();
                this.startAutoplay();
            }
        }

        startAutoplay() {
            this.autoplayTimer = setInterval(() => {
                this.next();
            }, this.autoplaySpeed);
        }

        pauseAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        }

        bindSwipeEvents() {
            let touchStartX = 0;
            let touchEndX = 0;

            this.container.on('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            this.container.on('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe(touchStartX, touchEndX);
            });
        }

        handleSwipe(startX, endX) {
            const swipeThreshold = 50;
            const diff = startX - endX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next
                    this.next();
                } else {
                    // Swipe right - prev
                    this.prev();
                }
            }
        }

        // Public method to destroy gallery
        destroy() {
            this.pauseAutoplay();
            this.container.find('.gallery-nav, .gallery-dots').remove();
            this.slides.show().removeClass('active');
        }
    }

    // Initialize all gallery containers on page load
    $(document).ready(function() {
        $('.tierliebe-gallery').each(function() {
            new TierliebeGallery(this);
        });
    });

    // Make class globally available
    window.TierliebeGallery = TierliebeGallery;

})(jQuery);
