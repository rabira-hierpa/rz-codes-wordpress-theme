/**
 * Single post: mobile TOC toggle, active TOC link on scroll.
 */
(function () {
  var toc = document.getElementById('post-toc-nav');
  var toggle = document.getElementById('post-toc-toggle');
  var panel = document.getElementById('post-toc-panel');
  var list = document.getElementById('post-toc-list');
  if (!list || !toc) return;

  var links = list.querySelectorAll('a.post-toc__link[href^="#"]');
  var sections = [];
  links.forEach(function (a) {
    var id = decodeURIComponent(a.getAttribute('href').slice(1));
    var el = document.getElementById(id);
    if (el) sections.push({ a: a, el: el });
  });

  if (toggle && panel) {
    toggle.addEventListener('click', function () {
      var open = panel.classList.toggle('is-open');
      toc.classList.toggle('is-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  if (!sections.length || !('IntersectionObserver' in window)) return;

  function setActive(id) {
    sections.forEach(function (s) {
      var on = s.el.id === id;
      s.a.classList.toggle('is-active', on);
      if (on) s.a.setAttribute('aria-current', 'location');
      else s.a.removeAttribute('aria-current');
    });
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          setActive(entry.target.id);
        }
      });
    },
    {
      rootMargin: '-15% 0px -60% 0px',
      threshold: 0,
    }
  );

  sections.forEach(function (s) {
    observer.observe(s.el);
  });

  /* Deep link on load */
  if (window.location.hash) {
    var target = document.getElementById(window.location.hash.slice(1));
    if (target) setTimeout(function () { setActive(target.id); }, 0);
  }
})();
