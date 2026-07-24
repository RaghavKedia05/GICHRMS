(function (window, document) {
    'use strict';

    class ProductTour {
        constructor(options) {
            this.options = options || {};
            this.steps = (this.options.steps || []).slice();
            this.index = 0;
            this.running = false;
            this.replay = false;
            this.target = null;
            this.openedSidebar = false;
            this.originalBodyOverflow = '';
            this.onKeyDown = this.onKeyDown.bind(this);
            this.onResize = this.onResize.bind(this);
            this.onRouteChange = this.onRouteChange.bind(this);
            this.build();
        }

        build() {
            this.overlay = document.createElement('div');
            this.overlay.className = 'product-tour-overlay';
            this.overlay.hidden = true;

            this.spotlight = document.createElement('div');
            this.spotlight.className = 'product-tour-spotlight';
            this.spotlight.hidden = true;
            this.spotlight.setAttribute('aria-hidden', 'true');

            this.tooltip = document.createElement('section');
            this.tooltip.className = 'product-tour-tooltip product-tour-enter';
            this.tooltip.hidden = true;
            this.tooltip.setAttribute('role', 'dialog');
            this.tooltip.setAttribute('aria-modal', 'true');
            this.tooltip.setAttribute('aria-labelledby', 'product-tour-title');
            this.tooltip.innerHTML =
                '<span class="product-tour-progress"></span>' +
                '<h2 id="product-tour-title"></h2>' +
                '<p id="product-tour-description"></p>' +
                '<div class="product-tour-actions">' +
                    '<button type="button" class="product-tour-button product-tour-skip">Skip Tour</button>' +
                    '<div class="product-tour-buttons">' +
                        '<button type="button" class="product-tour-button product-tour-back">Back</button>' +
                        '<button type="button" class="product-tour-button product-tour-next">Next</button>' +
                    '</div>' +
                '</div>' +
                '<div class="product-tour-sr-only" aria-live="polite"></div>';

            document.body.append(this.overlay, this.spotlight, this.tooltip);
            this.progress = this.tooltip.querySelector('.product-tour-progress');
            this.title = this.tooltip.querySelector('h2');
            this.description = this.tooltip.querySelector('p');
            this.liveRegion = this.tooltip.querySelector('[aria-live]');
            this.backButton = this.tooltip.querySelector('.product-tour-back');
            this.nextButton = this.tooltip.querySelector('.product-tour-next');
            this.skipButton = this.tooltip.querySelector('.product-tour-skip');

            this.backButton.addEventListener('click', () => this.back());
            this.nextButton.addEventListener('click', () => this.next());
            this.skipButton.addEventListener('click', () => this.close(true));
        }

        start(replay) {
            if (this.running) return;
            this.replay = Boolean(replay);
            this.index = 0;
            this.running = true;
            this.originalBodyOverflow = document.body.style.overflow;
            document.body.style.overflow = 'hidden';
            this.overlay.hidden = false;
            this.tooltip.hidden = false;
            document.addEventListener('keydown', this.onKeyDown);
            window.addEventListener('resize', this.onResize);
            window.addEventListener('popstate', this.onRouteChange);
            window.addEventListener('hashchange', this.onRouteChange);
            this.showCurrent(false);
            requestAnimationFrame(() => this.tooltip.classList.remove('product-tour-enter'));
        }

        visibleSteps() {
            return this.steps.filter(step => !step.selector || this.findVisible(step.selector));
        }

        findVisible(selector) {
            const element = document.querySelector(selector);
            if (!element) return null;
            const style = window.getComputedStyle(element);
            const rect = element.getBoundingClientRect();
            return style.display !== 'none' && style.visibility !== 'hidden' && rect.width > 0 && rect.height > 0 ? element : null;
        }

        showCurrent(animate) {
            const steps = this.visibleSteps();
            if (!steps.length) return this.close(false);
            this.index = Math.max(0, Math.min(this.index, steps.length - 1));
            const step = steps[this.index];
            this.prepareElement(step);
            this.target = step.selector ? this.findVisible(step.selector) : null;

            this.title.textContent = step.title;
            this.description.textContent = step.description;
            this.progress.textContent = (this.index + 1) + ' of ' + steps.length;
            this.backButton.hidden = this.index === 0;
            this.nextButton.textContent = this.index === steps.length - 1 ? 'Get Started' : 'Next';
            this.liveRegion.textContent = 'Step ' + (this.index + 1) + ' of ' + steps.length + ': ' + step.title;

            if (this.target) {
                this.overlay.style.background = 'transparent';
                this.spotlight.hidden = false;
                this.target.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'nearest' });
            } else {
                this.overlay.style.background = 'rgba(15, 23, 42, .66)';
                this.spotlight.hidden = true;
            }

            window.setTimeout(() => this.position(animate), step.open === 'sidebar' ? 330 : 120);
        }

        prepareElement(step) {
            const sidebar = document.getElementById('sidebar');
            if (!sidebar || window.innerWidth >= 1024) return;
            if (step.open === 'sidebar') {
                sidebar.classList.add('translate-x-0');
                this.openedSidebar = true;
            } else if (this.openedSidebar) {
                sidebar.classList.remove('translate-x-0');
                this.openedSidebar = false;
            }
        }

        position(animate) {
            if (!this.running) return;
            if (!animate) {
                this.spotlight.style.transition = 'none';
                this.tooltip.style.transition = 'none';
            }

            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight;
            const tooltipWidth = this.tooltip.offsetWidth;
            const tooltipHeight = this.tooltip.offsetHeight;
            const margin = 16;
            const gap = 18;
            let left;
            let top;

            if (!this.target) {
                left = Math.max(margin, (viewportWidth - tooltipWidth) / 2);
                top = Math.max(margin, (viewportHeight - tooltipHeight) / 2);
            } else {
                const rect = this.target.getBoundingClientRect();
                const padding = 7;
                const spotLeft = Math.max(5, rect.left - padding);
                const spotTop = Math.max(5, rect.top - padding);
                const spotRight = Math.min(viewportWidth - 5, rect.right + padding);
                const spotBottom = Math.min(viewportHeight - 5, rect.bottom + padding);
                Object.assign(this.spotlight.style, {
                    left: spotLeft + 'px', top: spotTop + 'px',
                    width: Math.max(20, spotRight - spotLeft) + 'px',
                    height: Math.max(20, spotBottom - spotTop) + 'px'
                });

                const spaces = { right: viewportWidth - rect.right, left: rect.left, bottom: viewportHeight - rect.bottom, top: rect.top };
                if (spaces.right >= tooltipWidth + gap) {
                    left = rect.right + gap;
                    top = Math.max(margin, Math.min(rect.top, viewportHeight - tooltipHeight - margin));
                } else if (spaces.left >= tooltipWidth + gap) {
                    left = rect.left - tooltipWidth - gap;
                    top = Math.max(margin, Math.min(rect.top, viewportHeight - tooltipHeight - margin));
                } else if (spaces.bottom >= tooltipHeight + gap) {
                    left = Math.max(margin, Math.min(rect.left, viewportWidth - tooltipWidth - margin));
                    top = rect.bottom + gap;
                } else if (spaces.top >= tooltipHeight + gap) {
                    left = Math.max(margin, Math.min(rect.left, viewportWidth - tooltipWidth - margin));
                    top = rect.top - tooltipHeight - gap;
                } else {
                    left = Math.max(margin, (viewportWidth - tooltipWidth) / 2);
                    top = Math.max(margin, viewportHeight - tooltipHeight - margin);
                }
            }

            this.tooltip.style.left = Math.max(margin, Math.min(left, viewportWidth - tooltipWidth - margin)) + 'px';
            this.tooltip.style.top = Math.max(margin, Math.min(top, viewportHeight - tooltipHeight - margin)) + 'px';
            if (!animate) requestAnimationFrame(() => {
                this.spotlight.style.transition = '';
                this.tooltip.style.transition = '';
            });
            this.nextButton.focus({ preventScroll: true });
        }

        next() {
            const lastIndex = this.visibleSteps().length - 1;
            if (this.index >= lastIndex) return this.close(false);
            this.index++;
            this.showCurrent(true);
        }

        back() {
            if (this.index < 1) return;
            this.index--;
            this.showCurrent(true);
        }

        async close(skipped) {
            if (!this.running) return;
            const shouldComplete = !this.replay;
            this.running = false;
            this.tooltip.classList.add('product-tour-enter');
            this.restorePage();
            window.setTimeout(() => {
                this.overlay.hidden = true;
                this.spotlight.hidden = true;
                this.tooltip.hidden = true;
            }, 220);
            if (shouldComplete && typeof this.options.onComplete === 'function') {
                await this.options.onComplete({ skipped: Boolean(skipped) });
            }
        }

        restorePage() {
            const sidebar = document.getElementById('sidebar');
            if (this.openedSidebar && sidebar) sidebar.classList.remove('translate-x-0');
            this.openedSidebar = false;
            document.body.style.overflow = this.originalBodyOverflow;
            document.removeEventListener('keydown', this.onKeyDown);
            window.removeEventListener('resize', this.onResize);
            window.removeEventListener('popstate', this.onRouteChange);
            window.removeEventListener('hashchange', this.onRouteChange);
            const replayButton = document.getElementById('replayProductTour');
            if (replayButton) replayButton.focus({ preventScroll: true });
        }

        onKeyDown(event) {
            if (!this.running) return;
            if (event.key === 'ArrowRight' || event.key === 'Enter') { event.preventDefault(); this.next(); }
            if (event.key === 'ArrowLeft') { event.preventDefault(); this.back(); }
            if (event.key === 'Escape') { event.preventDefault(); this.close(true); }
        }

        onResize() { window.requestAnimationFrame(() => this.position(false)); }
        onRouteChange() { this.close(true); }
    }

    window.ProductTour = ProductTour;
})(window, document);
