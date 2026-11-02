document.addEventListener('DOMContentLoaded', () => {
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  const toggleButton = document.querySelector('.mobile-menu-toggle');
  const nav = document.querySelector('.nav-links');

  if (toggleButton && nav) {
    toggleButton.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('is-open');
      toggleButton.setAttribute('aria-expanded', String(isOpen));
    });
  }
});
