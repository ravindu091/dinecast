/* Procurement Specific JS */

/* -----------------------------------------------
   SIDEBAR NAVIGATION
   Shows one section at a time and updates the
   topbar title to match the selected nav item.
   ----------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {
  const links    = document.querySelectorAll('.nav-link[data-section]');
  const sections = document.querySelectorAll('.content .section');
  const title    = document.querySelector('.topbar-left h1');

  links.forEach(link => {
    link.addEventListener('click', () => {
      links.forEach(l => l.classList.remove('active'));
      sections.forEach(s => s.classList.remove('active'));

      link.classList.add('active');
      const target = document.getElementById(link.dataset.section);
      if (target) target.classList.add('active');
      if (title && link.dataset.title) title.textContent = link.dataset.title;

      window.scrollTo(0, 0);
    });
  });
});
