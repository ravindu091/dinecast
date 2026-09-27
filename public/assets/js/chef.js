/* Chef Specific JS */

function addRecipeLine(containerId = 'recipe-lines') {
  const container = document.getElementById(containerId);
  const ingredientOptions = document.querySelector('#recipe-lines select[name="ingredient_id[]"]').innerHTML;
  const line = document.createElement('div');
  line.className = 'recipe-line';
  line.style.cssText = 'display:grid;grid-template-columns:1fr 80px 80px 80px 28px;gap:8px;align-items:center;';
  line.innerHTML = `
    <select name="ingredient_id[]" required>
      <option value="">Ingredient</option>
      ${ingredientOptions}
    </select>
    <input name="quantity_per_guest[]" type="number" min="0.001" step="0.001" placeholder="Qty" required>
    <select name="uom[]" required>
      <option>g</option>
      <option>kg</option>
      <option>ml</option>
      <option>L</option>
      <option>pcs</option>
    </select>
    <input name="wastage_percent[]" type="number" min="0" max="100" step="0.01" placeholder="Waste %">
    <button type="button" class="remove-recipe-line" aria-label="Remove ingredient">✕</button>
  `;
  container.appendChild(line);
}

document.addEventListener('click', function (event) {
  if (event.target.classList.contains('remove-recipe-line')) {
    const container = event.target.closest('[id$="recipe-lines"]');
    const lines = container.querySelectorAll('.recipe-line');
    if (lines.length > 1) {
      event.target.closest('.recipe-line').remove();
    }
  }
});

function openEditRecipe(recipeId) {
  const recipe = (window.recipeData || []).find((item) => Number(item.id) === Number(recipeId));
  if (!recipe) {
    return;
  }

  const form = document.getElementById('edit-recipe-form');
  const menuItem = document.getElementById('edit-recipe-menu-item');
  const lines = document.getElementById('edit-recipe-lines');

  form.action = window.recipeUpdateUrl + recipe.id;
  menuItem.value = recipe.menu_item_id;
  lines.innerHTML = '';

  (recipe.lines || []).forEach((line) => {
    addRecipeLine('edit-recipe-lines');
    const row = lines.lastElementChild;
    row.querySelector('[name="ingredient_id[]"]').value = line.ingredient_id;
    row.querySelector('[name="quantity_per_guest[]"]').value = line.quantity_per_guest;
    row.querySelector('[name="uom[]"]').value = line.uom;
    row.querySelector('[name="wastage_percent[]"]').value = line.wastage_percent;
  });

  if (!lines.children.length) {
    addRecipeLine('edit-recipe-lines');
  }

  toggleModal('modal-edit-recipe');
}

/* -----------------------------------------------
   MENU EDIT / DELETE DIALOGS
   Each row's Edit and Delete buttons carry the
   menu's saved values as data attributes.
   These copy them into the dialog before opening it.
   ----------------------------------------------- */
function openEditMenu(trigger) {
  const d = trigger.dataset;
  const type = document.getElementById('edit-menu-type');

  document.getElementById('edit-menu-form').action = window.menuUrl + 'update/' + d.id;
  document.getElementById('edit-menu-name').value = d.name;
  type.value = d.type;
  //a type that is not on the list (e.g. "Test") has no option, so the Chef must choose one
  if (type.value !== d.type) {
    type.value = '';
  }
  document.getElementById('edit-menu-status').value = d.status;
  document.getElementById('edit-menu-description').value = d.description;
  toggleModal('modal-edit-menu');
}

function openDeleteMenu(trigger) {
  //a menu with dishes can't be deleted (the server refuses too), so explain instead of asking
  const hasDishes = Number(trigger.dataset.items) > 0;

  document.getElementById('delete-menu-form').action = window.menuUrl + 'delete/' + trigger.dataset.id;
  document.querySelectorAll('.delete-menu-name').forEach(function (el) {
    el.textContent = trigger.dataset.name;
  });
  document.getElementById('delete-menu-confirm').hidden = hasDishes;
  document.getElementById('delete-menu-blocked').hidden = !hasDishes;
  //.btn sets its own display, which overrides the hidden attribute, so hide it through style
  document.getElementById('delete-menu-submit').style.display = hasDishes ? 'none' : '';
  document.getElementById('delete-menu-cancel').textContent = hasDishes ? 'Close' : 'Cancel';
  toggleModal('modal-delete-menu');
}
