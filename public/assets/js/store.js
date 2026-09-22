/* ===============================================
   RECEIVE STOCK FORM SUBMIT (Store)
   =============================================== */
document.addEventListener('DOMContentLoaded', () => {
  initIngredientToolbar();
  initInventoryToolbar();
  initBatchPopup();
  initIssuePopup();
  initWastePopup();
  initAddStockPopup();
});

function initIngredientToolbar() {
  const search = document.getElementById('ingredient-search');
  const category = document.getElementById('category-filter');
  const status = document.getElementById('status-filter');
  const exportButton = document.querySelector('[data-export-ingredients]');
  const table = document.querySelector('#sec-ingredients table');

  if (!search || !category || !status || !table) return;

  const rows = [...table.querySelectorAll('tbody tr')];
  const count = document.querySelector('#sec-ingredients .pagination > span');

  const applyFilters = () => {
    const query = search.value.trim().toLowerCase();
    let visibleRows = 0;

    rows.forEach(row => {
      const matchesSearch = row.textContent.toLowerCase().includes(query);
      const matchesCategory = category.value === 'all' || row.dataset.category === category.value;
      const matchesStatus = status.value === 'all' || row.dataset.status === status.value;
      const visible = matchesSearch && matchesCategory && matchesStatus;

      row.hidden = !visible;
      if (visible) visibleRows += 1;
    });

    if (count) {
      count.textContent = `Showing ${visibleRows} of ${rows.length} ingredients`;
    }
  };

  search.addEventListener('input', applyFilters);
  category.addEventListener('change', applyFilters);
  status.addEventListener('change', applyFilters);
  exportButton?.addEventListener('click', () => exportIngredients(rows));
}

function exportIngredients(rows) {
  const visibleRows = rows.filter(row => !row.hidden);
  const header = ['Ingredient', 'Category', 'UOM', 'Min Stock', 'Current Stock', 'Status'];
  const data = visibleRows.map(row => [...row.querySelectorAll('td')].slice(0, 6).map(cell => cell.textContent.trim()));
  const csv = [header, ...data]
    .map(row => row.map(value => `"${value.replace(/"/g, '""')}"`).join(','))
    .join('\n');
  const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
  const url = URL.createObjectURL(blob);
  const link = document.createElement('a');

  link.href = url;
  link.download = 'ingredients.csv';
  link.click();
  URL.revokeObjectURL(url);
}

function initInventoryToolbar() {
  const section = document.getElementById('sec-inventory');
  const search = document.getElementById('inventory-search');
  const statusButton = document.getElementById('status-dropdown-btn');
  const statusMenu = document.getElementById('status-dropdown-menu');
  const statusLabel = document.getElementById('status-selected-label');
  const statusIcon = document.getElementById('status-dropdown-icon');
  const sort = document.getElementById('inventory-sort');
  const table = section?.querySelector('.tab-pane.active table');

  if (!section || !search || !statusButton || !statusMenu || !statusLabel || !sort || !table) return;

  const body = table.querySelector('tbody');
  const rows = [...body.querySelectorAll('.inventory-data-row')];

  const applyFilters = () => {
    const query = search.value.trim().toLowerCase();
    const selectedStatus = statusButton.dataset.value || 'all';

    rows.forEach(row => {
      const detail = document.getElementById(row.dataset.detailRow);
      const searchableText = `${row.textContent} ${detail?.textContent || ''}`.toLowerCase();
      const visible = (!query || searchableText.includes(query)) &&
        (selectedStatus === 'all' || row.dataset.status === selectedStatus);

      row.hidden = !visible;
      if (detail) detail.hidden = !visible;
      if (!visible && detail) detail.classList.remove('open');
    });
  };

  const sortRows = () => {
    const direction = sort.value === 'stock' ? -1 : 1;
    const key = sort.value === 'stock' ? 'stock' : sort.value === 'received' ? 'received' : 'expiry';

    [...rows]
      .sort((left, right) => {
        const leftValue = key === 'stock' ? Number(left.dataset[key]) : left.dataset[key];
        const rightValue = key === 'stock' ? Number(right.dataset[key]) : right.dataset[key];
        return leftValue > rightValue ? direction : leftValue < rightValue ? -direction : 0;
      })
      .forEach(row => {
        body.append(row);
        const detail = document.getElementById(row.dataset.detailRow);
        if (detail) body.append(detail);
      });
  };

  search.addEventListener('input', applyFilters);
  sort.addEventListener('change', sortRows);
  statusButton.addEventListener('click', () => {
    const isOpen = !statusMenu.hidden;
    statusMenu.hidden = isOpen;
    statusButton.setAttribute('aria-expanded', String(!isOpen));
    statusIcon?.classList.toggle('open', !isOpen);
  });

  statusMenu.querySelectorAll('.status-option').forEach(option => {
    option.addEventListener('click', () => {
      statusButton.dataset.value = option.dataset.value;
      statusLabel.textContent = option.textContent.trim().replace('✓', '').trim();
      statusMenu.querySelectorAll('.status-option').forEach(item => {
        const selected = item === option;
        item.classList.toggle('active', selected);
        const check = item.querySelector('span');
        if (check) check.hidden = !selected;
      });
      statusMenu.hidden = true;
      statusButton.setAttribute('aria-expanded', 'false');
      statusIcon?.classList.remove('open');
      applyFilters();
    });
  });

  document.addEventListener('click', event => {
    if (!statusButton.contains(event.target) && !statusMenu.contains(event.target)) {
      statusMenu.hidden = true;
      statusButton.setAttribute('aria-expanded', 'false');
      statusIcon?.classList.remove('open');
    }
  });
}

function submitReceiveStock(event) {
  event.preventDefault();
  showToast('✓ Stock received and inventory updated successfully!');
  event.target.reset();
}

/* ================================================
   BATCH DETAILS POPUP
   ================================================ */
function initBatchPopup() {
  const overlay  = document.getElementById('batch-popup-overlay');
  const closeBtn = document.getElementById('batch-popup-close');

  if (!overlay || !closeBtn) return;

  // Open: click anywhere on an inventory data row
  document.querySelectorAll('.inventory-data-row').forEach(row => {
    row.style.cursor = 'pointer';
    row.addEventListener('click', (e) => {
      // Don't open if user clicked an action button inside the row
      if (e.target.closest('.inventory-actions')) return;
      openBatchPopup(row);
    });
  });

  // Close: × button
  closeBtn.addEventListener('click', closeBatchPopup);

  // Close: click on backdrop
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closeBatchPopup();
  });

  // Close: Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('open')) {
      closeBatchPopup();
    }
  });
}

function openBatchPopup(row) {
  const overlay = document.getElementById('batch-popup-overlay');

  const name       = row.dataset.name      || '—';
  const batchId    = row.dataset.batch     || '—';
  const received   = row.dataset.received  || '—';
  const qty        = row.dataset.quantity  || '—';
  const expiry     = row.dataset.expiry    || '—';
  const remaining  = parseInt(row.dataset.remaining, 10);
  const supplier   = row.dataset.supplier  || '—';
  const category   = row.dataset.category  || '—';

  // Fill fields
  document.getElementById('popup-batch-id').textContent    = batchId;
  document.getElementById('popup-ingredient').textContent  = name;
  document.getElementById('popup-category').textContent    = category;
  document.getElementById('popup-supplier').textContent    = supplier;
  document.getElementById('popup-received').textContent    = received;
  document.getElementById('popup-qty').textContent         = qty;

  // Expiry badge
  const badge = document.getElementById('popup-expiry-badge');
  badge.className = 'popup-expiry-badge';

  if (isNaN(remaining) || remaining < 0) {
    badge.classList.add('expired');
    badge.textContent = `Expired · ${expiry}`;
  } else if (remaining <= 3) {
    badge.classList.add('expired');
    badge.textContent = `Expired · ${expiry}`;
  } else if (remaining <= 7) {
    badge.classList.add('expiring');
    badge.textContent = `Expiring Soon · ${remaining} Days Left (${expiry})`;
  } else {
    badge.classList.add('optimal');
    badge.textContent = `Good · ${remaining} Days Left (${expiry})`;
  }

  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeBatchPopup() {
  const overlay = document.getElementById('batch-popup-overlay');
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}

/* ================================================
   ISSUE TO KITCHEN POPUP
   ================================================ */

/** Parse a qty string like "28 kg", "18 L", "500 g", "15 trays"
 *  Returns { value: number, unit: string }
 */
function parseQty(qtyStr) {
  const match = String(qtyStr).match(/^([0-9]+(?:\.[0-9]+)?)\s*(.*)$/);
  if (!match) return { value: 0, unit: '' };
  return { value: parseFloat(match[1]), unit: match[2].trim() };
}

function initIssuePopup() {
  const overlay    = document.getElementById('issue-popup-overlay');
  const closeBtn   = document.getElementById('issue-popup-close');
  const cancelBtn  = document.getElementById('issue-cancel');
  const confirmBtn = document.getElementById('issue-confirm');
  const input      = document.getElementById('issue-qty-input');
  const decBtn     = document.getElementById('issue-decrement');
  const incBtn     = document.getElementById('issue-increment');
  const presetsDiv = document.getElementById('issue-presets');
  const unitEl     = document.getElementById('issue-unit');
  const remaining  = document.getElementById('issue-remaining-value');

  if (!overlay) return;

  let maxQty = 0;
  let unitStr = 'kg';
  let step = 0.5;

  // Open from any Issue button [data-issue]
  document.querySelectorAll('[data-issue]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const row = btn.closest('.inventory-data-row');
      if (!row) return;
      openIssuePopup(row);
    });
  });

  // Also wire "Issue to Kitchen" button inside existing batch popup footer
  const footerIssueBtn = document.querySelector('.popup-btn-issue');
  if (footerIssueBtn) {
    footerIssueBtn.addEventListener('click', () => {
      // Find the currently highlighted row (last opened popup row)
      const row = document._issuePopupRow;
      if (row) {
        closeBatchPopup();
        openIssuePopup(row);
      }
    });
  }

  // Track the active row when batch popup opens
  document.querySelectorAll('.inventory-data-row').forEach(row => {
    row.addEventListener('click', () => { document._issuePopupRow = row; });
  });

  function openIssuePopup(row) {
    const name   = row.dataset.name     || '—';
    const batch  = row.dataset.batch    || '—';
    const qty    = row.dataset.quantity || '0 kg';
    const parsed = parseQty(qty);

    maxQty  = parsed.value;
    unitStr = parsed.unit || 'kg';
    step    = unitStr === 'g' ? 50 : unitStr === 'L' ? 0.5 : 0.5;

    // Header
    document.getElementById('issue-batch-id').textContent      = batch;
    document.getElementById('issue-ingredient-name').textContent = name;
    document.getElementById('issue-available').textContent     = qty;
    if (unitEl) unitEl.textContent = unitStr;

    // Reset qty
    input.value = 0;
    input.max   = maxQty;
    input.step  = step;

    // Build presets (25 %, 50 %, 75 %, Max)
    buildPresets(maxQty, unitStr);
    updateRemaining();

    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    setTimeout(() => input.focus(), 80);
  }

  function buildPresets(max, unit) {
    // Remove old preset buttons but keep the label
    presetsDiv.querySelectorAll('.issue-preset-btn').forEach(b => b.remove());

    const candidates = [
      { label: `${fmt(max * 0.25)} ${unit}`, value: max * 0.25 },
      { label: `${fmt(max * 0.5)} ${unit}`,  value: max * 0.5  },
      { label: `${fmt(max * 0.75)} ${unit}`, value: max * 0.75 },
      { label: `Max (${fmt(max)} ${unit})`,  value: max        },
    ].filter((p, i, arr) => {
      // Deduplicate by rounded value
      const v = +p.value.toFixed(2);
      return arr.findIndex(x => +(x.value.toFixed(2)) === v) === i;
    });

    candidates.forEach(preset => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'issue-preset-btn';
      btn.textContent = preset.label;
      btn.dataset.val = preset.value;
      btn.addEventListener('click', () => {
        input.value = +preset.value.toFixed(2);
        setActivePreset(btn);
        updateRemaining();
      });
      presetsDiv.appendChild(btn);
    });
  }

  function setActivePreset(activeBtn) {
    presetsDiv.querySelectorAll('.issue-preset-btn').forEach(b => b.classList.remove('active'));
    if (activeBtn) activeBtn.classList.add('active');
  }

  function updateRemaining() {
    const val = Math.min(Math.max(parseFloat(input.value) || 0, 0), maxQty);
    const left = +(maxQty - val).toFixed(2);

    remaining.textContent = `${fmt(left)} ${unitStr} remaining`;
    remaining.className   = 'issue-remaining-value';

    const pct = maxQty > 0 ? left / maxQty : 1;
    if (pct <= 0)        remaining.classList.add('danger');
    else if (pct <= 0.2) remaining.classList.add('warn');

    // Sync active preset
    const cur = +(parseFloat(input.value) || 0).toFixed(2);
    presetsDiv.querySelectorAll('.issue-preset-btn').forEach(b => {
      b.classList.toggle('active', +(parseFloat(b.dataset.val)).toFixed(2) === cur);
    });

    confirmBtn.disabled = val <= 0;
  }

  function fmt(n) {
    const r = +n.toFixed(2);
    return r % 1 === 0 ? String(r) : String(r);
  }

  // Stepper
  decBtn.addEventListener('click', () => {
    const cur = parseFloat(input.value) || 0;
    input.value = Math.max(0, +(cur - step).toFixed(2));
    updateRemaining();
  });

  incBtn.addEventListener('click', () => {
    const cur = parseFloat(input.value) || 0;
    input.value = Math.min(maxQty, +(cur + step).toFixed(2));
    updateRemaining();
  });

  input.addEventListener('input', () => {
    let v = parseFloat(input.value) || 0;
    if (v < 0) { input.value = 0; v = 0; }
    if (v > maxQty) { input.value = maxQty; v = maxQty; }
    updateRemaining();
  });

  // Close
  function closeIssuePopup() {
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  closeBtn.addEventListener('click', closeIssuePopup);
  cancelBtn.addEventListener('click', closeIssuePopup);
  overlay.addEventListener('click', (e) => { if (e.target === overlay) closeIssuePopup(); });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('open')) closeIssuePopup();
  });

  // Confirm
  confirmBtn.addEventListener('click', () => {
    const qty  = parseFloat(input.value) || 0;
    const name = document.getElementById('issue-ingredient-name').textContent;
    const batch = document.getElementById('issue-batch-id').textContent;
    if (qty <= 0) return;
    closeIssuePopup();
    showToast(`✓ ${qty} ${unitStr} of ${name} (${batch}) issued to Kitchen successfully!`);
  });
}

/* ================================================
   LOG WASTE & DISCARD POPUP
   ================================================ */
function initWastePopup() {
  const overlay    = document.getElementById('waste-popup-overlay');
  const closeBtn   = document.getElementById('waste-popup-close');
  const cancelBtn  = document.getElementById('waste-cancel');
  const confirmBtn = document.getElementById('waste-confirm');
  const qtyInput   = document.getElementById('waste-qty-input');
  const unitEl     = document.getElementById('waste-unit');
  const fullBtn    = document.getElementById('waste-full-btn');
  const reasonSel  = document.getElementById('waste-reason');
  const notesArea  = document.getElementById('waste-notes');

  if (!overlay) return;

  let maxQty  = 0;
  let unitStr = 'kg';

  // Open from any Waste button
  document.querySelectorAll('.inventory-action-waste').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const row = btn.closest('.inventory-data-row');
      if (!row) return;
      openWastePopup(row);
    });
  });

  function openWastePopup(row) {
    const name   = row.dataset.name     || '—';
    const batch  = row.dataset.batch    || '—';
    const qty    = row.dataset.quantity || '0 kg';
    const parsed = parseQty(qty);

    maxQty  = parsed.value;
    unitStr = parsed.unit || 'kg';

    // Populate header
    document.getElementById('waste-batch-id').textContent        = batch;
    document.getElementById('waste-ingredient-name').textContent  = name;
    document.getElementById('waste-available').textContent        = qty;
    if (unitEl) unitEl.textContent = unitStr;

    // Update Full Batch button label
    if (fullBtn) fullBtn.textContent = `Full Batch (${qty})`;

    // Reset form
    qtyInput.value  = 0;
    qtyInput.max    = maxQty;
    reasonSel.value = '';
    notesArea.value = '';
    confirmBtn.disabled = true;

    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    setTimeout(() => qtyInput.focus(), 80);
  }

  // Full Batch shortcut
  fullBtn.addEventListener('click', () => {
    qtyInput.value = maxQty;
    validate();
  });

  // Validate on any change
  function validate() {
    const qty    = parseFloat(qtyInput.value) || 0;
    const reason = reasonSel.value;
    const notes  = notesArea.value.trim();
    confirmBtn.disabled = qty <= 0 || !reason || !notes;
  }

  qtyInput.addEventListener('input', () => {
    let v = parseFloat(qtyInput.value) || 0;
    if (v < 0)      { qtyInput.value = 0;      v = 0; }
    if (v > maxQty) { qtyInput.value = maxQty; v = maxQty; }
    validate();
  });

  reasonSel.addEventListener('change', validate);
  notesArea.addEventListener('input', validate);

  // Close handlers
  function closeWastePopup() {
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  closeBtn.addEventListener('click', closeWastePopup);
  cancelBtn.addEventListener('click', closeWastePopup);
  overlay.addEventListener('click', (e) => { if (e.target === overlay) closeWastePopup(); });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('open')) closeWastePopup();
  });

  // Confirm
  confirmBtn.addEventListener('click', () => {
    const qty   = parseFloat(qtyInput.value) || 0;
    const name  = document.getElementById('waste-ingredient-name').textContent;
    const batch = document.getElementById('waste-batch-id').textContent;
    if (qty <= 0) return;
    closeWastePopup();
    showToast(`⚠ ${qty} ${unitStr} of ${name} (${batch}) logged as waste and discarded.`);
  });
}

/* ================================================
   ADD STOCK POPUP
   ================================================ */
function initAddStockPopup() {
  const overlay = document.getElementById('addstock-overlay');
  const triggerBtn = document.getElementById('add-stock-btn');
  const closeBtn = document.getElementById('addstock-close');
  const cancelBtn = document.getElementById('addstock-cancel');
  const confirmBtn = document.getElementById('addstock-confirm');

  if (!overlay || !triggerBtn) return;

  const quickBtns = document.querySelectorAll('.addstock-quick-btn');
  const searchInput = document.getElementById('addstock-search');
  const categorySel = document.getElementById('addstock-category');
  const supplierInput = document.getElementById('addstock-supplier');
  const batchInput = document.getElementById('addstock-batch');
  const receivedInput = document.getElementById('addstock-received');
  const qtyInput = document.getElementById('addstock-qty');
  const costInput = document.getElementById('addstock-cost');
  const expiryInput = document.getElementById('addstock-expiry');
  const uomSel = document.getElementById('addstock-uom');

  // Open handler
  function openPopup() {
    // Generate a random batch ID for demo
    const randomBatch = 'B-' + Math.floor(100 + Math.random() * 900);
    batchInput.value = randomBatch;

    // Set today's date as default received date
    const today = new Date().toISOString().split('T')[0];
    receivedInput.value = today;

    // Clear fields
    searchInput.value = '';
    supplierInput.value = '';
    qtyInput.value = '';
    costInput.value = '';
    expiryInput.value = '';
    categorySel.value = '';

    // Reset quick buttons
    quickBtns.forEach(btn => btn.classList.remove('active'));

    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  // Close handler
  function closePopup() {
    overlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  triggerBtn.addEventListener('click', openPopup);
  closeBtn.addEventListener('click', closePopup);
  cancelBtn.addEventListener('click', closePopup);

  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closePopup();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('active')) {
      closePopup();
    }
  });

  // Quick select logic
  quickBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      quickBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      searchInput.value = btn.dataset.ingredient;
      categorySel.value = btn.dataset.category;
    });
  });

  // Confirm logic
  confirmBtn.addEventListener('click', () => {
    const ingName = searchInput.value || 'Unknown Ingredient';
    const qty = parseFloat(qtyInput.value) || 0;
    const uom = uomSel.value;
    
    if (qty <= 0) {
      showToast('Please enter a valid quantity.');
      return;
    }
    
    closePopup();
    showToast(`✓ Added ${qty}${uom} of ${ingName} to stock.`);
  });
}
