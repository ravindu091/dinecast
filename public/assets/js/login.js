/* ===============================================
   LOGIN — route by role keyword in username
   =============================================== */
function handleLogin() {
  const user = document.getElementById('login-user')?.value?.trim();
  const pass = document.getElementById('login-pass')?.value?.trim();

  if (!user) { highlightInput('login-user'); return; }
  if (!pass) { highlightInput('login-pass'); return; }

  const u = user.toLowerCase();
  if (u.includes('admin')){
    window.location.href = BASE_URL + '/admin';
  }
  else if (u.includes('chef')){
    window.location.href = BASE_URL + '/chef';
  }
  else if (u.includes('kitchen') || u.includes('km') || u.includes('sudath')){
    window.location.href = BASE_URL + '/kitchen';
  }
  else if (u.includes('store') || u.includes('nadeesha')){
    window.location.href = BASE_URL + '/store';
  }
  else if (u.includes('procure') || u.includes('pm')){
    window.location.href = BASE_URL + '/procurement';
  }
  else if (u.includes('ceo') || u.includes('amara')){
    window.location.href = BASE_URL + '/ceo';
  }
  else{
    window.location.href = BASE_URL + '/kitchen';
  }
}

function highlightInput(id) {
  const el = document.getElementById(id);
  if (!el) return;
  el.style.borderColor = 'var(--danger)';
  el.focus();
  el.addEventListener('input', () => (el.style.borderColor = ''), { once: true });
}

/* Enter key on login form */
document.addEventListener('keydown', e => {
  if (e.key === 'Enter' && document.querySelector('.btn-login')) handleLogin();
});
