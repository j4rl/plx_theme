(function () {
  var config = window.plxTheme || {};
  var root = document.documentElement;
  var header = document.querySelector('.site-header');
  var toggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('.primary-nav');
  var layers = document.querySelectorAll('.parallax-layer');
  var mobile = window.matchMedia('(max-width: 820px)');

  if (config.smoothScroll === false) {
    root.style.scrollBehavior = 'auto';
  }

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }

  if (nav) {
    var submenuParents = nav.querySelectorAll('.menu-item-has-children');

    function closeSiblingSubmenus(currentItem) {
      submenuParents.forEach(function (item) {
        if (item !== currentItem) {
          item.classList.remove('is-open');
          var siblingLink = item.querySelector(':scope > a');
          if (siblingLink) {
            siblingLink.setAttribute('aria-expanded', 'false');
          }
        }
      });
    }

    submenuParents.forEach(function (item) {
      var link = item.querySelector(':scope > a');
      if (!link) {
        return;
      }

      link.setAttribute('aria-haspopup', 'true');
      link.setAttribute('aria-expanded', 'false');

      link.addEventListener('click', function (event) {
        var isOpen = item.classList.contains('is-open');

        if (!isOpen) {
          event.preventDefault();
          closeSiblingSubmenus(item);
          item.classList.add('is-open');
          link.setAttribute('aria-expanded', 'true');
          return;
        }

        item.classList.remove('is-open');
        link.setAttribute('aria-expanded', 'false');
      });
    });

    document.addEventListener('click', function (event) {
      if (nav.contains(event.target)) {
        return;
      }

      submenuParents.forEach(function (item) {
        item.classList.remove('is-open');
        var link = item.querySelector(':scope > a');
        if (link) {
          link.setAttribute('aria-expanded', 'false');
        }
      });
    });
  }

  function updateHeader() {
    if (!header || config.stickyHeader === false) {
      return;
    }
    if (window.scrollY > 16) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
  }

  function parallaxEnabled() {
    if (config.parallaxEnabled === false) {
      return false;
    }
    if (config.disableMobile && mobile.matches) {
      return false;
    }
    return true;
  }

  function renderParallax() {
    if (!layers.length) {
      return;
    }

    if (!parallaxEnabled()) {
      layers.forEach(function (layer) {
        layer.style.transform = 'translate3d(0, 0, 0)';
      });
      return;
    }

    var y = window.scrollY || window.pageYOffset;
    var speed = Number(config.speed || 0.24);

    layers.forEach(function (layer) {
      var depth = Number(layer.getAttribute('data-depth') || speed);
      layer.style.transform = 'translate3d(0, ' + (y * depth).toFixed(2) + 'px, 0)';
    });
  }

  var ticking = false;

  function onScroll() {
    updateHeader();
    if (ticking) {
      return;
    }
    ticking = true;
    window.requestAnimationFrame(function () {
      renderParallax();
      ticking = false;
    });
  }

  updateHeader();
  renderParallax();

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', renderParallax);
  mobile.addEventListener('change', renderParallax);
}());
