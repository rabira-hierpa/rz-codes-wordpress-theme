/**
 * Dark/light theme toggle (matches Gatsby ThemeContext: localStorage key "theme", class "dark" on <html>).
 */
(function () {
  var STORAGE_KEY = 'theme';

  function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');
    var btn = document.getElementById('theme-toggle');
    if (!btn) return;
    btn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
    btn.setAttribute('title', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
    btn.innerHTML =
      theme === 'light'
        ? '<svg xmlns="http://www.w3.org/2000/svg" class="theme-toggle__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>'
        : '<svg xmlns="http://www.w3.org/2000/svg" class="theme-toggle__icon theme-toggle__icon--sun" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>';
  }

  function initTheme() {
    var saved = localStorage.getItem(STORAGE_KEY);
    var theme;
    if (saved === 'dark' || saved === 'light') {
      theme = saved;
    } else {
      theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    applyTheme(theme);
  }

  function toggleTheme() {
    var next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
    localStorage.setItem(STORAGE_KEY, next);
    applyTheme(next);
  }

  initTheme();

  document.addEventListener('DOMContentLoaded', function () {
    var saved = localStorage.getItem(STORAGE_KEY);
    var theme =
      saved === 'dark' || saved === 'light'
        ? saved
        : document.documentElement.classList.contains('dark')
          ? 'dark'
          : 'light';
    applyTheme(theme);
    var btn = document.getElementById('theme-toggle');
    if (btn) btn.addEventListener('click', toggleTheme);
  });
})();
