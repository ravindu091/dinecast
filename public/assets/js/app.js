// Base URL injected from PHP view; fallback for direct file access
const BASE_URL = window.BASE_URL || '/dinecast';

document.addEventListener('DOMContentLoaded', () => {

  initInnerTabs();
  initFilters();
  setCurrentDate();
});


/* -----------------------------------------------
   INNER TABS  (e.g. Inventory Active / Used-up)
   ----------------------------------------------- */
function initInnerTabs() {
  document.querySelectorAll('.tab-group').forEach(group => {
    const tabs  = group.querySelectorAll('.tab');
    const panes = group.querySelectorAll('.tab-pane');

    tabs.forEach((tab, i) => {
      tab.addEventListener('click', () => {
        tabs.forEach(t  => t.classList.remove('active'));
        panes.forEach(p => p.classList.remove('active'));
        tab.classList.add('active');
        if (panes[i]) panes[i].classList.add('active');
      });
    });
  });
}

/* -----------------------------------------------
   FILTER PANEL TOGGLE
   ----------------------------------------------- */
function initFilters() {
  document.querySelectorAll('[data-toggle-filter]').forEach(btn => {
    btn.addEventListener('click', () => {
      const panel = document.getElementById(btn.dataset.toggleFilter);
      if (panel) panel.classList.toggle('open');
    });
  });
}

/* -----------------------------------------------
   EXPANDABLE TABLE ROWS  (Inventory)
   ----------------------------------------------- */
function toggleExpandRow(btn, rowId) {
  const row   = document.getElementById(rowId);
  if (!row) return;
  const isOpen = row.classList.contains('open');
  row.classList.toggle('open');
  btn.classList.toggle('open');
  btn.textContent = isOpen ? '▶' : '▼';
}

/* -----------------------------------------------
   MODALS & FORMS
   ----------------------------------------------- */
function toggleModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.classList.toggle('open');
}

function submitForm(event, toastMsg) {
  event.preventDefault();
  if (toastMsg) showToast(toastMsg);
  const form = event.target;
  const modal = form.closest('.modal-overlay');
  if (modal) modal.classList.remove('open');
  form.reset();
}



/* -----------------------------------------------
   TOAST NOTIFICATION
   ----------------------------------------------- */
function showToast(message, type = 'success') {
  document.querySelector('.dc-toast')?.remove();

  const toast = document.createElement('div');
  toast.className = 'dc-toast';
  toast.textContent = message;

  const bg = type === 'success' ? 'var(--primary)' : 'var(--danger)';
  toast.style.cssText = `
    position:fixed; bottom:28px; right:28px;
    background:${bg}; color:white;
    padding:12px 22px; border-radius:10px;
    font-size:14px; font-weight:600;
    font-family:'Inter',sans-serif;
    box-shadow:0 6px 24px rgba(0,0,0,0.18);
    z-index:9999; animation:slideUpToast 0.28s ease;
  `;
  document.body.appendChild(toast);

  if (!document.getElementById('dc-toast-style')) {
    const s = document.createElement('style');
    s.id = 'dc-toast-style';
    s.textContent = `@keyframes slideUpToast{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}`;
    document.head.appendChild(s);
  }

  setTimeout(() => toast.remove(), 3200);
}

/* -----------------------------------------------
   DATE CHIP
   ----------------------------------------------- */
function setCurrentDate() {
  document.querySelectorAll('.date-chip').forEach(el => {
    el.textContent = new Date().toLocaleDateString('en-US', {
      weekday: 'short', year: 'numeric', month: 'short', day: 'numeric'
    });
  });
}

/* -----------------------------------------------
   LOGOUT
   ----------------------------------------------- */
function logout() {
  window.location.href = BASE_URL + '/';
}

