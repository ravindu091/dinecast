/* Admin Specific JS */
function openUpdateUser(button) {
  document.getElementById('update-user-id').value = button.dataset.id || '';
  document.getElementById('update-full-name').value = button.dataset.fullName || '';
  document.getElementById('update-username').value = button.dataset.username || '';
  document.getElementById('update-email').value = button.dataset.email || '';
  document.getElementById('update-role').value = button.dataset.role || '';
  toggleModal('modal-update-user');
}
