/**
 * Global Scroll Reveal System
 *
 * Left side elements animate in from the LEFT  (translateX(-60px) -> 0)
 * Right side elements animate in from the RIGHT (translateX(60px)  -> 0)
 * Center / Full-width elements animate with fade-up (translateY(50px) -> 0)
 *
 * All animations trigger ONCE when entering the viewport, and stay
 * visible permanently (never hidden or re-triggered on scroll back).
 */

function initScrollReveal() {
    try {
        const screenWidth = window.innerWidth || document.documentElement.clientWidth || 1200;

        // 1. Process 2-column split containers (first col from left, second col from right)
        document.querySelectorAll('[data-scroll-reveal-split], .reveal-split').forEach((container) => {
            const children = Array.from(container.children).filter((child) => child.nodeType === 1);
            if (children.length >= 2) {
                if (!children[0].hasAttribute('data-scroll-reveal')) {
                    children[0].setAttribute('data-scroll-reveal', 'from-left');
                }
                if (!children[1].hasAttribute('data-scroll-reveal')) {
                    children[1].setAttribute('data-scroll-reveal', 'from-right');
                }
            }
        });

        // 2. Auto-detect position for any element with empty or 'auto' data-scroll-reveal
        const allAutoReveals = document.querySelectorAll('[data-scroll-reveal]');
        allAutoReveals.forEach((el) => {
            const val = el.getAttribute('data-scroll-reveal');
            if (!val || val === '' || val === 'auto') {
                const rect = el.getBoundingClientRect();
                const elCenterX = rect.left + rect.width / 2;
                const screenCenterX = screenWidth / 2;

                // If narrower than 80% screen width and off to one side
                if (rect.width < screenWidth * 0.8) {
                    if (elCenterX < screenCenterX - 30) {
                        el.setAttribute('data-scroll-reveal', 'from-left');
                    } else if (elCenterX > screenCenterX + 30) {
                        el.setAttribute('data-scroll-reveal', 'from-right');
                    } else {
                        el.setAttribute('data-scroll-reveal', 'fade-up');
                    }
                } else {
                    el.setAttribute('data-scroll-reveal', 'fade-up');
                }
            }
        });

        // 3. Collect all reveal targets
        const revealElements = document.querySelectorAll(
            '[data-scroll-reveal], .reveal-on-scroll, .reveal-left, .reveal-right, .reveal-up, .reveal-down, .reveal-zoom'
        );

        if (!revealElements.length) return;

        // 4. Fail-safe: if IntersectionObserver is not supported, reveal all immediately
        if (!('IntersectionObserver' in window)) {
            revealElements.forEach((el) => el.classList.add('is-revealed'));
            return;
        }

        // 5. Create IntersectionObserver to trigger animation once
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    const el = entry.target;
                    const delay = el.dataset.scrollDelay || el.getAttribute('data-delay');

                    if (delay) {
                        el.style.transitionDelay = `${delay}ms`;
                    }

                    el.classList.add('is-revealed');

                    // Stop observing: plays ONLY ONCE on scroll and never disappears on scroll back
                    observer.unobserve(el);
                });
            },
            {
                threshold: 0.1,
                rootMargin: '0px 0px -30px 0px',
            }
        );

        const vh = window.innerHeight || document.documentElement.clientHeight || 800;

        revealElements.forEach((el) => {
            // If element is already in current viewport on initial page load, reveal immediately
            const rect = el.getBoundingClientRect();
            if (rect.top < vh && rect.bottom > 0) {
                const delay = el.dataset.scrollDelay || el.getAttribute('data-delay');
                if (delay) {
                    el.style.transitionDelay = `${delay}ms`;
                }
                el.classList.add('is-revealed');
            } else {
                observer.observe(el);
            }
        });
    } catch (e) {
        console.error('Scroll reveal init error:', e);
        // Fail-safe: make sure everything is visible if any unexpected error occurs
        document.querySelectorAll('[data-scroll-reveal], .reveal-on-scroll, .reveal-left, .reveal-right, .reveal-up, .reveal-down, .reveal-zoom').forEach((el) => {
            el.classList.add('is-revealed');
        });
    }
}

// Execute whether DOM is still loading or already loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollReveal);
} else {
    initScrollReveal();
}
