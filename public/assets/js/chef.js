/* Chef Specific JS */

function addRecipeLine() {
  const container = document.getElementById('recipe-lines');
  const line = document.createElement('div');
  line.style.cssText = 'display:grid;grid-template-columns:1fr 80px 80px 80px 28px;gap:8px;align-items:center;';
  line.innerHTML = `
    <select>
      <option>Fresh Salmon Fillet</option>
      <option>Chicken (Whole)</option>
      <option>Basmati Rice</option>
      <option>Garlic (Peeled)</option>
    </select>
    <input type="number" placeholder="Qty" step="0.01">
    <select>
      <option>g</option>
      <option>kg</option>
      <option>ml</option>
      <option>L</option>
      <option>pcs</option>
    </select>
    <input type="number" placeholder="Waste%" step="1" max="50">
    <button type="button" style="background:var(--danger-bg);color:var(--danger);border:none;border-radius:6px;cursor:pointer;padding:4px 8px;" onclick="this.closest('div').remove()">✕</button>
  `;
  container.appendChild(line);
}
