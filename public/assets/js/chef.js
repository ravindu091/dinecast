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
