
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
                //document.getElementById('edit-ing-category').value = triggerBtn.dataset.category || '';
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


//validate ingredients form

const ingredientName = document.getElementById('ing-name');
const ingredientMinStock = document.getElementById('ing-min-stock');
const ingredientNCurrentStock = document.getElementById('ing-current-stock');

const ingredientNameError = document.getElementById('ing-name-error');
const ingredientMinStockError = document.getElementById('ing-min-stock-error');
const ingredientNCurrentStockError = document.getElementById('ing-current-stock-error');

const addIngredientForm = document.getElementById('add-ingredient-form');


addIngredientForm.addEventListener('submit',(event)=>{
    event.preventDefault();
    
    let isValid = true;
    
    // Reset errors
    if (ingredientNameError) {
        ingredientNameError.textContent = '';
        ingredientNameError.classList.remove('visible');
    }
    if (ingredientMinStockError) {
        ingredientMinStockError.textContent = '';
        ingredientMinStockError.classList.remove('visible');
    }
    if (ingredientNCurrentStockError) {
        ingredientNCurrentStockError.textContent = '';
        ingredientNCurrentStockError.classList.remove('visible');
    }

    // Validate Name
    if (ingredientName && ingredientName.value.trim() === '') {
        if (ingredientNameError) {
            ingredientNameError.textContent = 'Ingredient name is required';
            ingredientNameError.classList.add('visible');
        }
        isValid = false;
    }

    // Validate Minimum Stock
    if (ingredientMinStock) {
        if (ingredientMinStock.value === '' || parseFloat(ingredientMinStock.value) < 0) {
            if (ingredientMinStockError) {
                ingredientMinStockError.textContent = 'Minimum stock cannot be negative';
                ingredientMinStockError.classList.add('visible');
            }
            isValid = false;
        }
    }

    // Validate Current Stock
    if (ingredientNCurrentStock) {
        if (ingredientNCurrentStock.value === '' || parseFloat(ingredientNCurrentStock.value) < 0) {
            if (ingredientNCurrentStockError) {
                ingredientNCurrentStockError.textContent = 'Current stock cannot be negative';
                ingredientNCurrentStockError.classList.add('visible');
            }
            isValid = false;
        }
    }

    // If valid, submit the form
    if (isValid) {
        addIngredientForm.submit();
    }
});

// validate edit ingredients form

const editIngredientForm = document.getElementById('edit-ingredient-form');
const editIngredientName = document.getElementById('edit-ing-name');
const editIngredientMinStock = document.getElementById('edit-ing-min-stock');
const editIngredientCurrentStock = document.getElementById('edit-ing-current-stock');

const editIngredientNameError = document.getElementById('edit-ing-name-error');
const editIngredientMinStockError = document.getElementById('edit-ing-min-stock-error');
const editIngredientCurrentStockError = document.getElementById('edit-ing-current-stock-error');

if (editIngredientForm) {
    editIngredientForm.addEventListener('submit', (event) => {
        event.preventDefault();
        
        let isValid = true;
        
        // Reset errors
        if (editIngredientNameError) {
            editIngredientNameError.textContent = '';
            editIngredientNameError.classList.remove('visible');
        }
        if (editIngredientMinStockError) {
            editIngredientMinStockError.textContent = '';
            editIngredientMinStockError.classList.remove('visible');
        }
        if (editIngredientCurrentStockError) {
            editIngredientCurrentStockError.textContent = '';
            editIngredientCurrentStockError.classList.remove('visible');
        }

        // Validate Name
        if (editIngredientName && editIngredientName.value.trim() === '') {
            if (editIngredientNameError) {
                editIngredientNameError.textContent = 'Ingredient name is required';
                editIngredientNameError.classList.add('visible');
            }
            isValid = false;
        }

        // Validate Minimum Stock
        if (editIngredientMinStock) {
            if (editIngredientMinStock.value === '' || parseFloat(editIngredientMinStock.value) < 0) {
                if (editIngredientMinStockError) {
                    editIngredientMinStockError.textContent = 'Minimum stock cannot be negative';
                    editIngredientMinStockError.classList.add('visible');
                }
                isValid = false;
            }
        }

        // Validate Current Stock
        if (editIngredientCurrentStock) {
            if (editIngredientCurrentStock.value === '' || parseFloat(editIngredientCurrentStock.value) < 0) {
                if (editIngredientCurrentStockError) {
                    editIngredientCurrentStockError.textContent = 'Current stock cannot be negative';
                    editIngredientCurrentStockError.classList.add('visible');
                }
                isValid = false;
            }
        }

        // If valid, submit the form
        if (isValid) {
            editIngredientForm.submit();
        }
    });
}
