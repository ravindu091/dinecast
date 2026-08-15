/* ===============================================
   ATTENDANCE INLINE FORM (Kitchen)
   =============================================== */
function openAttendanceForm(eventName, registered) {
  const form = document.getElementById('attendance-inline-form');
  if (!form) return;
  form.classList.add('open');

  const evEl  = form.querySelector('.att-event');
  const regEl = form.querySelector('.att-registered');
  if (evEl)  evEl.textContent  = eventName;
  if (regEl) regEl.textContent = registered;

  form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function saveAttendance() {
  const input      = document.getElementById('actual-count');
  const regEl      = document.querySelector('.att-registered');
  if (!input?.value) { input.style.borderColor = 'var(--danger)'; return; }

  const actual     = parseInt(input.value);
  const registered = parseInt(regEl?.textContent || 0);
  const variance   = registered > 0
    ? (((actual - registered) / registered) * 100).toFixed(1)
    : 0;

  showToast(`✓ Attendance saved! Variance: ${variance > 0 ? '+' : ''}${variance}%`);
  document.getElementById('attendance-inline-form').classList.remove('open');
  input.value = '';
}
