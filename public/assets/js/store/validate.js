
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to update badges when UOM changes in the edit form
    const uomSelect = document.getElementById('edit-ing-uom');
    if (uomSelect) {
        uomSelect.addEventListener('change', function() {
            const uom = this.options[this.selectedIndex].text;
            document.getElementById('edit-ing-uom-badge').textContent = uom;
            document.getElementById('edit-ing-uom-badge-curr').textContent = uom;
        });
    }
    
    // Register the Edit popup with PopupManager
    if (typeof PopupManager !== 'undefined') {
        PopupManager.register('edit-ingredient-overlay', {
            onOpen: function(overlay, triggerBtn) {
                if (!triggerBtn) return;
                
                // Populate the form fields
                document.getElementById('edit-ing-id').value = triggerBtn.dataset.id || '';
                document.getElementById('edit-ing-name').value = triggerBtn.dataset.name || '';
                document.getElementById('edit-ing-category').value = triggerBtn.dataset.category || '';
                document.getElementById('edit-ing-uom').value = triggerBtn.dataset.uom || '';
                document.getElementById('edit-ing-min-stock').value = triggerBtn.dataset.min || '';
                document.getElementById('edit-ing-current-stock').value = triggerBtn.dataset.current || '';
                document.getElementById('edit-ing-desc').value = triggerBtn.dataset.desc || '';
                
                // Handle status radio buttons
                const status = String(triggerBtn.dataset.status || 'active').trim().toLowerCase();
                const activeRadio = document.getElementById('edit-status-active');
                const inactiveRadio = document.getElementById('edit-status-inactive');
                
                if (activeRadio && inactiveRadio) {
                    const activeOpt = activeRadio.closest('.pm-radio-opt');
                    const inactiveOpt = inactiveRadio.closest('.pm-radio-opt');

                    if (status === 'active') {
                        activeRadio.checked = true;
                        if (activeOpt) activeOpt.setAttribute('data-checked', '');
                        if (inactiveOpt) inactiveOpt.removeAttribute('data-checked');
                    } else {
                        inactiveRadio.checked = true;
                        if (inactiveOpt) inactiveOpt.setAttribute('data-checked', '');
                        if (activeOpt) activeOpt.removeAttribute('data-checked');
                    }
                }
                
                // Handle uom badges
                const uom = triggerBtn.dataset.uom || 'unit';
                document.getElementById('edit-ing-uom-badge').textContent = uom;
                document.getElementById('edit-ing-uom-badge-curr').textContent = uom;
            }
        });

        // Register the Delete popup with PopupManager
        PopupManager.register('delete-ingredient-overlay', {
            onOpen: function(overlay, triggerBtn) {
                if (!triggerBtn) return;
                
                // Populate the delete confirmation fields
                document.getElementById('delete-ing-id').value = triggerBtn.dataset.id || '';
                
                const name = triggerBtn.dataset.name || '';
                document.getElementById('delete-ing-name').textContent = name;
                
                const category = triggerBtn.dataset.category || 'Unknown';
                document.getElementById('delete-ing-category').textContent = category;
                
                const current = triggerBtn.dataset.current || '0';
                const uom = triggerBtn.dataset.uom || '';
                document.getElementById('delete-ing-current').textContent = current + ' ' + uom;
                
                const min = triggerBtn.dataset.min || '0';
                document.getElementById('delete-ing-min').textContent = min + ' ' + uom;
            }
        });
    }
});