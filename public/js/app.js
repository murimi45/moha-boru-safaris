/**
 * Moha Boru Safaris — front-end interactions
 * Vanilla JavaScript only. No jQuery.
 * Organized by feature so each block can be reused/extracted independently.
 */
(function () {
  'use strict';

  /* ------------------------------------------------------------------
   * 1. Page loader — brief, elegant, removes itself once DOM is ready
   * ------------------------------------------------------------------ */
  var hideLoader = function () {
    var loader = document.getElementById('mb-loader');
    if (!loader || loader.classList.contains('is-hidden')) return;
    loader.classList.add('is-hidden');
  };
  window.addEventListener('load', function () {
    setTimeout(hideLoader, 350);
  });
  // Safety: never leave the veil up if `load` is delayed (slow images, etc.)
  setTimeout(hideLoader, 2500);

  /* ------------------------------------------------------------------
   * 2. Sticky navbar: transparent-over-hero -> solid on scroll
   * ------------------------------------------------------------------ */
  var navbar = document.querySelector('.mb-navbar');
  if (navbar) {
    var setNavState = function () {
      if (window.scrollY > 40) {
        navbar.classList.add('is-scrolled');
      } else {
        navbar.classList.remove('is-scrolled');
      }
    };
    setNavState();
    window.addEventListener('scroll', setNavState, { passive: true });

    // Mobile menu toggle
    var toggle = document.querySelector('.nav-toggle');
    var mobileMenu = document.querySelector('.mb-mobile-menu');
    if (toggle && mobileMenu) {
      var setMenuOpen = function (isOpen) {
        mobileMenu.classList.toggle('is-open', isOpen);
        navbar.classList.toggle('menu-open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        toggle.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
        document.body.style.overflow = isOpen ? 'hidden' : '';
        if (isOpen) {
          mobileMenu.removeAttribute('hidden');
        } else {
          // Keep hidden after transition so it never paints over the scrolled navbar
          window.setTimeout(function () {
            if (!mobileMenu.classList.contains('is-open')) {
              mobileMenu.setAttribute('hidden', '');
            }
          }, 400);
        }
      };

      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        setMenuOpen(!mobileMenu.classList.contains('is-open'));
      });
      // Close on link click
      mobileMenu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
          setMenuOpen(false);
        });
      });
      // Close on Escape
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
          setMenuOpen(false);
        }
      });
    }
  }

  /* ------------------------------------------------------------------
   * 3. Scroll reveal — IntersectionObserver driven fade/slide/scale
   *    Applies to any element with [data-reveal]
   * ------------------------------------------------------------------ */
  var revealEls = document.querySelectorAll('[data-reveal], .horizon-divider, .mb-underline');
  if ('IntersectionObserver' in window && revealEls.length) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach(function (el) { revealObserver.observe(el); });
  } else {
    // Fallback: reveal everything immediately
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ------------------------------------------------------------------
   * 4. Animated statistic counters — triggers once when in view
   * ------------------------------------------------------------------ */
  var counters = document.querySelectorAll('[data-counter]');
  if (counters.length) {
    var animateCounter = function (el) {
      var target = parseFloat(el.getAttribute('data-counter'));
      var suffix = el.getAttribute('data-suffix') || '';
      var duration = 1600;
      var startTime = null;

      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
        var value = Math.floor(eased * target);
        el.textContent = value.toLocaleString() + suffix;
        if (progress < 1) {
          window.requestAnimationFrame(step);
        } else {
          el.textContent = target.toLocaleString() + suffix;
        }
      }
      window.requestAnimationFrame(step);
    };

    if ('IntersectionObserver' in window) {
      var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });
      counters.forEach(function (el) { counterObserver.observe(el); });
    } else {
      counters.forEach(animateCounter);
    }
  }

  /* ------------------------------------------------------------------
   * 5. Testimonial slider — minimal, dot-controlled, no dependencies
   * ------------------------------------------------------------------ */
  var tSlider = document.querySelector('[data-testimonial-slider]');
  if (tSlider) {
    var slides = tSlider.querySelectorAll('[data-t-slide]');
    var dotsWrap = tSlider.querySelector('[data-t-dots]');
    var current = 0;
    var timer = null;

    if (dotsWrap) {
      slides.forEach(function (_, i) {
        var dot = document.createElement('button');
        dot.className = 't-dot' + (i === 0 ? ' active' : '');
        dot.type = 'button';
        dot.setAttribute('aria-label', 'Show testimonial ' + (i + 1));
        dot.addEventListener('click', function () { goTo(i); resetTimer(); });
        dotsWrap.appendChild(dot);
      });
    }

    function goTo(index) {
      slides[current].classList.remove('is-active');
      if (dotsWrap) dotsWrap.children[current].classList.remove('active');
      current = (index + slides.length) % slides.length;
      slides[current].classList.add('is-active');
      if (dotsWrap) dotsWrap.children[current].classList.add('active');
    }

    function resetTimer() {
      if (timer) clearInterval(timer);
      timer = setInterval(function () { goTo(current + 1); }, 6000);
    }

    if (slides.length) {
      slides[0].classList.add('is-active');
      resetTimer();
    }
  }

  /* ------------------------------------------------------------------
   * 6. Subtle hero parallax on scroll (transform only — cheap & smooth)
   * ------------------------------------------------------------------ */
  var heroMedia = document.querySelector('.hero-media');
  if (heroMedia && window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
    window.addEventListener('scroll', function () {
      var y = window.scrollY;
      if (y < window.innerHeight) {
        heroMedia.style.transform = 'scale(1.08) translateY(' + (y * 0.12) + 'px)';
      }
    }, { passive: true });
  }

  /* ------------------------------------------------------------------
   * 6b. Pill quick-filters (no page reload)
   *     Used by the Destinations index (region) and the Gallery (category).
   *     Buttons sit in a bar and carry the filter value; targets carry a
   *     matching data attribute. A value of "all" clears the filter.
   * ------------------------------------------------------------------ */
  function initPillFilter(options) {
    var bar = document.querySelector(options.bar);
    if (!bar) return;

    var buttons = bar.querySelectorAll('[' + options.buttonAttr + ']');
    var targets = document.querySelectorAll('[' + options.targetAttr + ']');
    var emptyState = options.emptyState ? document.querySelector(options.emptyState) : null;

    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        var value = btn.getAttribute(options.buttonAttr);
        var visible = 0;

        targets.forEach(function (target) {
          var match = value === 'all' || target.getAttribute(options.targetAttr) === value;
          target.style.display = match ? '' : 'none';
          if (match) visible++;
        });

        if (emptyState) emptyState.classList.toggle('is-active', visible === 0);
      });
    });
  }

  initPillFilter({
    bar: '[data-region-filter-bar]',
    buttonAttr: 'data-region-filter',
    targetAttr: 'data-region'
  });

  initPillFilter({
    bar: '[data-gallery-filter-bar]',
    buttonAttr: 'data-gallery-filter',
    targetAttr: 'data-category',
    emptyState: '[data-gallery-empty-state]'
  });

  /* ------------------------------------------------------------------
   * 6c. Safari Packages — filter by destination, duration & budget
   *     Selects carry [data-pkg-filter="destination|duration|budget"],
   *     cards carry matching data-destination / data-duration / data-budget.
   * ------------------------------------------------------------------ */
  var pkgFilterBar = document.querySelector('[data-pkg-filter-bar]');
  if (pkgFilterBar) {
    var pkgSelects = pkgFilterBar.querySelectorAll('[data-pkg-filter]');
    var pkgCards = document.querySelectorAll('[data-pkg-card]');
    var pkgEmptyState = document.querySelector('[data-pkg-empty-state]');
    var pkgResetBtn = pkgFilterBar.querySelector('[data-pkg-filter-reset]');

    function applyPkgFilters() {
      var filters = {};
      pkgSelects.forEach(function (select) {
        filters[select.getAttribute('data-pkg-filter')] = select.value;
      });

      var visibleCount = 0;
      pkgCards.forEach(function (card) {
        var matches = Object.keys(filters).every(function (key) {
          return filters[key] === 'all' || card.getAttribute('data-' + key) === filters[key];
        });
        card.style.display = matches ? '' : 'none';
        if (matches) visibleCount++;
      });

      if (pkgEmptyState) pkgEmptyState.classList.toggle('is-active', visibleCount === 0);
    }

    pkgSelects.forEach(function (select) {
      select.addEventListener('change', applyPkgFilters);
    });

    if (pkgResetBtn) {
      pkgResetBtn.addEventListener('click', function () {
        pkgSelects.forEach(function (select) { select.value = 'all'; });
        applyPkgFilters();
      });
    }
  }

  /* ------------------------------------------------------------------
   * 7. Newsletter form — front-end validation stub (wired to Laravel
   *    route via form action; this just prevents empty submits & gives
   *    inline feedback without a page reload where JS is available)
   * ------------------------------------------------------------------ */
  var newsletterForm = document.querySelector('[data-newsletter-form]');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function (e) {
      var emailInput = newsletterForm.querySelector('input[type="email"]');
      var feedback = newsletterForm.parentElement.querySelector('[data-newsletter-feedback]');
      if (emailInput && !emailInput.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        e.preventDefault();
        if (feedback) {
          feedback.textContent = 'Please enter a valid email address.';
          feedback.classList.add('text-warning');
        }
      }
    });
  }

  /* ------------------------------------------------------------------
   * 8. Lightbox — full-size viewer for any [data-lightbox] tile.
   *    Tiles sharing the same attribute value browse together with the
   *    arrow controls; tiles hidden by a filter are skipped.
   * ------------------------------------------------------------------ */
  var lightboxLinks = Array.prototype.slice.call(document.querySelectorAll('[data-lightbox]'));
  if (lightboxLinks.length) {
    var overlay = document.createElement('div');
    overlay.className = 'mb-lightbox';
    overlay.setAttribute('role', 'dialog');
    overlay.setAttribute('aria-modal', 'true');
    overlay.setAttribute('aria-label', 'Image viewer');
    overlay.innerHTML =
      '<button type="button" class="mb-lightbox-btn mb-lightbox-close" aria-label="Close viewer"><i class="bi bi-x-lg"></i></button>' +
      '<button type="button" class="mb-lightbox-btn mb-lightbox-prev" aria-label="Previous image"><i class="bi bi-chevron-left"></i></button>' +
      '<button type="button" class="mb-lightbox-btn mb-lightbox-next" aria-label="Next image"><i class="bi bi-chevron-right"></i></button>' +
      '<figure class="mb-lightbox-figure">' +
        '<img alt="">' +
        '<figcaption class="mb-lightbox-caption"></figcaption>' +
      '</figure>' +
      '<span class="mb-lightbox-counter"></span>';
    document.body.appendChild(overlay);

    var lbImage = overlay.querySelector('img');
    var lbCaption = overlay.querySelector('.mb-lightbox-caption');
    var lbCounter = overlay.querySelector('.mb-lightbox-counter');
    var lbPrev = overlay.querySelector('.mb-lightbox-prev');
    var lbNext = overlay.querySelector('.mb-lightbox-next');
    var lbClose = overlay.querySelector('.mb-lightbox-close');

    var lbGroup = [];
    var lbIndex = 0;
    var lbLastFocused = null;

    function lbShow(i) {
      lbIndex = (i + lbGroup.length) % lbGroup.length;
      var link = lbGroup[lbIndex];
      var caption = link.getAttribute('data-caption') || '';

      lbImage.src = link.getAttribute('href');
      lbImage.alt = caption;
      lbCaption.textContent = caption;
      lbCaption.style.display = caption ? '' : 'none';

      var multiple = lbGroup.length > 1;
      lbCounter.textContent = multiple ? (lbIndex + 1) + ' / ' + lbGroup.length : '';
      lbPrev.style.display = multiple ? '' : 'none';
      lbNext.style.display = multiple ? '' : 'none';
    }

    function lbOpen(link) {
      var name = link.getAttribute('data-lightbox');
      lbGroup = lightboxLinks.filter(function (el) {
        // offsetParent is null for tiles hidden by an active filter
        return el.getAttribute('data-lightbox') === name && el.offsetParent !== null;
      });
      if (!lbGroup.length) lbGroup = [link];

      lbLastFocused = document.activeElement;
      lbShow(lbGroup.indexOf(link));
      overlay.classList.add('is-open');
      document.body.style.overflow = 'hidden';
      lbClose.focus();
    }

    function lbCloseViewer() {
      overlay.classList.remove('is-open');
      document.body.style.overflow = '';
      if (lbLastFocused) lbLastFocused.focus();
    }

    lightboxLinks.forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        lbOpen(link);
      });
    });

    lbClose.addEventListener('click', lbCloseViewer);
    lbPrev.addEventListener('click', function () { lbShow(lbIndex - 1); });
    lbNext.addEventListener('click', function () { lbShow(lbIndex + 1); });
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) lbCloseViewer();
    });

    document.addEventListener('keydown', function (e) {
      if (!overlay.classList.contains('is-open')) return;
      if (e.key === 'Escape') lbCloseViewer();
      if (lbGroup.length < 2) return;
      if (e.key === 'ArrowLeft') lbShow(lbIndex - 1);
      if (e.key === 'ArrowRight') lbShow(lbIndex + 1);
    });
  }
})();