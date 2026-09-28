/* ===============================================
   STORE MANAGER — store.js
   Open/close mechanics delegated to PopupManager
   (popup.js). This file handles only content-
   specific logic for each popup.
   =============================================== */

document.addEventListener('DOMContentLoaded', () => {
  initIngredientToolbar();
  initInventoryToolbar();
  initBatchPopup();
  initIssuePopup();
  initWastePopup();
  initAddStockPopup();
  initMsrPopup();
  initAddIngredientPopup();
  initTabs();
});

/* ------------------------------------------------
   ADD INGREDIENT POPUP
   ------------------------------------------------ */
function initAddIngredientPopup() {
  const OVERLAY_ID = 'add-ingredient-overlay';

  PopupManager.register(OVERLAY_ID, {
    onOpen(overlay) {
      // Reset form on every open
      const form = overlay.querySelector('#add-ingredient-form');
      if (form) form.reset();
      // Reset UOM badges
      const badge = overlay.querySelector('#ing-uom-badge');
      const badgeCurr = overlay.querySelector('#ing-uom-badge-curr');
      if (badge) badge.textContent = 'unit';
      if (badgeCurr) badgeCurr.textContent = 'unit';
    },
    onClose() {}
  });

  // Keep the UOM badges in sync with the selected unit
  const uomSelect = document.getElementById('ing-uom');
  const uomBadge  = document.getElementById('ing-uom-badge');
  const uomBadgeCurr = document.getElementById('ing-uom-badge-curr');
  
  if (uomSelect) {
    uomSelect.addEventListener('change', () => {
      const val = uomSelect.value || 'unit';
      if (uomBadge) uomBadge.textContent = val;
      if (uomBadgeCurr) uomBadgeCurr.textContent = val;
    });
  }

  // Status radio — no manual class needed (:has() drives it via CSS)
  // Fallback for older browsers: reflect checked state via data attribute
  const radioGroup = document.querySelector('#add-ingredient-overlay .pm-radio-group');
  if (radioGroup) {
    radioGroup.addEventListener('change', () => {
      radioGroup.querySelectorAll('.pm-radio-opt').forEach(opt => {
        const radio = opt.querySelector('input[type="radio"]');
        opt.toggleAttribute('data-checked', !!(radio && radio.checked));
      });
    });
  }
}


/* ------------------------------------------------
   TABS
   ------------------------------------------------ */
function initTabs() {
  document.querySelectorAll('.tab-group').forEach(group => {
    const tabs = group.querySelectorAll('.tabs .tab');
    const panes = group.querySelectorAll('.tab-pane');

    tabs.forEach((tab, index) => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        panes.forEach(p => {
          p.classList.remove('active');
          p.style.display = 'none';
        });
        tab.classList.add('active');
        if (panes[index]) {
          panes[index].classList.add('active');
          panes[index].style.display = 'block';
        }
      });
    });
  });
}

/* ------------------------------------------------
   INGREDIENT TOOLBAR
   ------------------------------------------------ */
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

/* ------------------------------------------------
   INVENTORY TOOLBAR
   ------------------------------------------------ */
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

/* ================================================
   BATCH DETAILS POPUP
   ================================================ */
function initBatchPopup() {
  // Register data-fill hook with PopupManager
  PopupManager.register('batch-popup-overlay', {
    onOpen(overlay, triggerEl) {
      const row = triggerEl?.closest
        ? triggerEl.closest('.inventory-data-row')
        : null;
      if (!row) return;

      // Remember the active row so Issue popup can use it
      document._issuePopupRow = row;

      const name      = row.dataset.name     || '—';
      const batchId   = row.dataset.batch    || '—';
      const received  = row.dataset.received || '—';
      const qty       = row.dataset.quantity || '—';
      const expiry    = row.dataset.expiry   || '—';
      const remaining = parseInt(row.dataset.remaining, 10);
      const supplier  = row.dataset.supplier || '—';
      const category  = row.dataset.category || '—';

      document.getElementById('popup-batch-id').textContent   = batchId;
      document.getElementById('popup-ingredient').textContent  = name;
      document.getElementById('popup-category').textContent    = category;
      document.getElementById('popup-supplier').textContent    = supplier;
      document.getElementById('popup-received').textContent    = received;
      document.getElementById('popup-qty').textContent         = qty;

      const badge = document.getElementById('popup-expiry-badge');
      badge.className = 'popup-expiry-badge';

      if (isNaN(remaining) || remaining <= 3) {
        badge.classList.add('expired');
        badge.textContent = `Expired · ${expiry}`;
      } else if (remaining <= 7) {
        badge.classList.add('expiring');
        badge.textContent = `Expiring Soon · ${remaining} Days Left (${expiry})`;
      } else {
        badge.classList.add('optimal');
        badge.textContent = `Good · ${remaining} Days Left (${expiry})`;
      }
    }
  });

  // Row click → open Batch Details popup
  document.querySelectorAll('.inventory-data-row').forEach(row => {
    row.style.cursor = 'pointer';
    row.addEventListener('click', (e) => {
      if (e.target.closest('.inventory-actions')) return;
      document._issuePopupRow = row;
      PopupManager.open('batch-popup-overlay', row);
    });
  });
}

/* ================================================
   ISSUE TO KITCHEN POPUP
   ================================================ */

/** Parse a qty string like "28 kg", "500 g", "15 trays"
 *  Returns { value: number, unit: string }
 */
function parseQty(qtyStr) {
  const match = String(qtyStr).match(/^([0-9]+(?:\.[0-9]+)?)\s*(.*)$/);
  if (!match) return { value: 0, unit: '' };
  return { value: parseFloat(match[1]), unit: match[2].trim() };
}

function initIssuePopup() {
  const overlay   = document.getElementById('issue-popup-overlay');
  const confirmBtn = document.getElementById('issue-confirm');
  const input     = document.getElementById('issue-qty-input');
  const decBtn    = document.getElementById('issue-decrement');
  const incBtn    = document.getElementById('issue-increment');
  const presetsDiv = document.getElementById('issue-presets');
  const unitEl    = document.getElementById('issue-unit');
  const remaining = document.getElementById('issue-remaining-value');

  if (!overlay) return;

  let maxQty = 0;
  let unitStr = 'kg';
  let step = 0.5;

  // Register onOpen hook — fills header, resets qty
  PopupManager.register('issue-popup-overlay', {
    onOpen(overlay, triggerEl) {
      // triggerEl may be a [data-issue] button, a row, or the "Issue to Kitchen" footer btn
      const row = triggerEl?.closest?.('.inventory-data-row') ?? document._issuePopupRow;
      if (!row) return;
      document._issuePopupRow = row;

      const name = row.dataset.name || '—';
      const batch = row.dataset.batch || '—';
      const qty = row.dataset.quantity || '0 kg';
      const parsed = parseQty(qty);

      maxQty  = parsed.value;
      unitStr = parsed.unit || 'kg';
      step    = unitStr === 'g' ? 50 : 0.5;

      document.getElementById('issue-batch-id').textContent        = batch;
      document.getElementById('popup-batch-id') && null; // batch detail uses same id — skip
      document.getElementById('issue-ingredient-name').textContent  = name;
      document.getElementById('issue-available').textContent        = qty;
      if (unitEl) unitEl.textContent = unitStr;

      input.value = 0;
      input.max   = maxQty;
      input.step  = step;

      buildPresets(maxQty, unitStr);
      updateRemaining();
    }
  });

  // Open from [data-issue] row action buttons
  document.querySelectorAll('[data-issue]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const row = btn.closest('.inventory-data-row');
      if (!row) return;
      document._issuePopupRow = row;
      PopupManager.open('issue-popup-overlay', btn);
    });
  });

  /* -- Stepper -- */
  decBtn?.addEventListener('click', () => {
    input.value = Math.max(0, +(parseFloat(input.value) - step).toFixed(2));
    updateRemaining();
  });

  incBtn?.addEventListener('click', () => {
    input.value = Math.min(maxQty, +(parseFloat(input.value) + step).toFixed(2));
    updateRemaining();
  });

  input?.addEventListener('input', () => {
    let v = parseFloat(input.value) || 0;
    if (v < 0) { input.value = 0; v = 0; }
    if (v > maxQty) { input.value = maxQty; v = maxQty; }
    updateRemaining();
  });

  /* -- Confirm -- */
  confirmBtn?.addEventListener('click', () => {
    const qty  = parseFloat(input.value) || 0;
    const name  = document.getElementById('issue-ingredient-name').textContent;
    const batch = document.getElementById('issue-batch-id').textContent;
    if (qty <= 0) return;
    PopupManager.close('issue-popup-overlay');
    showToast(`✓ ${qty} ${unitStr} of ${name} (${batch}) issued to Kitchen successfully!`);
  });

  /* -- Helpers -- */
  function buildPresets(max, unit) {
    presetsDiv.querySelectorAll('.issue-preset-btn').forEach(b => b.remove());
    const candidates = [
      { label: `${fmt(max * 0.25)} ${unit}`, value: max * 0.25 },
      { label: `${fmt(max * 0.5)} ${unit}`,  value: max * 0.5  },
      { label: `${fmt(max * 0.75)} ${unit}`, value: max * 0.75 },
      { label: `Max (${fmt(max)} ${unit})`,  value: max        },
    ].filter((p, i, arr) => {
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
    const val  = Math.min(Math.max(parseFloat(input.value) || 0, 0), maxQty);
    const left = +(maxQty - val).toFixed(2);
    remaining.textContent = `${fmt(left)} ${unitStr} remaining`;
    remaining.className   = 'issue-remaining-value';

    const pct = maxQty > 0 ? left / maxQty : 1;
    if (pct <= 0)   remaining.classList.add('danger');
    else if (pct <= 0.2) remaining.classList.add('warn');

    const cur = +(parseFloat(input.value) || 0).toFixed(2);
    presetsDiv.querySelectorAll('.issue-preset-btn').forEach(b => {
      b.classList.toggle('active', +(parseFloat(b.dataset.val)).toFixed(2) === cur);
    });

    if (confirmBtn) confirmBtn.disabled = val <= 0;
  }

  function fmt(n) { const r = +n.toFixed(2); return String(r); }
}

/* ================================================
   LOG WASTE & DISCARD POPUP
   ================================================ */
function initWastePopup() {
  const overlay    = document.getElementById('waste-popup-overlay');
  const confirmBtn = document.getElementById('waste-confirm');
  const qtyInput   = document.getElementById('waste-qty-input');
  const unitEl     = document.getElementById('waste-unit');
  const fullBtn    = document.getElementById('waste-full-btn');
  const reasonSel  = document.getElementById('waste-reason');
  const notesArea  = document.getElementById('waste-notes');

  if (!overlay) return;

  let maxQty = 0;
  let unitStr = 'kg';

  // Register onOpen hook
  PopupManager.register('waste-popup-overlay', {
    onOpen(overlay, triggerEl) {
      const row = triggerEl?.closest('.inventory-data-row');
      if (!row) return;

      const name  = row.dataset.name     || '—';
      const batch = row.dataset.batch    || '—';
      const qty   = row.dataset.quantity || '0 kg';
      const parsed = parseQty(qty);

      maxQty  = parsed.value;
      unitStr = parsed.unit || 'kg';

      document.getElementById('waste-batch-id').textContent        = batch;
      document.getElementById('waste-ingredient-name').textContent  = name;
      document.getElementById('waste-available').textContent        = qty;
      if (unitEl) unitEl.textContent = unitStr;
      if (fullBtn) fullBtn.textContent = `Full Batch (${qty})`;

      qtyInput.value = 0;
      qtyInput.max   = maxQty;
      reasonSel.value = '';
      notesArea.value = '';
      if (confirmBtn) confirmBtn.disabled = true;
    }
  });

  // Open from Waste action buttons
  document.querySelectorAll('.inventory-action-waste').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const row = btn.closest('.inventory-data-row');
      if (!row) return;
      PopupManager.open('waste-popup-overlay', btn);
    });
  });

  // Full Batch shortcut
  fullBtn?.addEventListener('click', () => {
    qtyInput.value = maxQty;
    validate();
  });

  function validate() {
    const qty    = parseFloat(qtyInput.value) || 0;
    const reason = reasonSel.value;
    const notes  = notesArea.value.trim();
    if (confirmBtn) confirmBtn.disabled = qty <= 0 || !reason || !notes;
  }

  qtyInput?.addEventListener('input', () => {
    let v = parseFloat(qtyInput.value) || 0;
    if (v < 0)       { qtyInput.value = 0;      v = 0; }
    if (v > maxQty)  { qtyInput.value = maxQty; v = maxQty; }
    validate();
  });
  reasonSel?.addEventListener('change', validate);
  notesArea?.addEventListener('input',  validate);

  confirmBtn?.addEventListener('click', () => {
    const qty   = parseFloat(qtyInput.value) || 0;
    const name  = document.getElementById('waste-ingredient-name').textContent;
    const batch = document.getElementById('waste-batch-id').textContent;
    if (qty <= 0) return;
    PopupManager.close('waste-popup-overlay');
    showToast(`⚠ ${qty} ${unitStr} of ${name} (${batch}) logged as waste and discarded.`);
  });
}

/* ================================================
   ADD STOCK POPUP
   ================================================ */
function initAddStockPopup() {
  const overlay    = document.getElementById('addstock-overlay');
  const triggerBtn = document.getElementById('add-stock-btn');
  const confirmBtn = document.getElementById('addstock-confirm');

  if (!overlay || !triggerBtn) return;

  const quickBtns    = document.querySelectorAll('.addstock-quick-btn');
  const searchInput  = document.getElementById('addstock-search');
  const categorySel  = document.getElementById('addstock-category');
  const supplierInput = document.getElementById('addstock-supplier');
  const batchInput   = document.getElementById('addstock-batch');
  const receivedInput = document.getElementById('addstock-received');
  const qtyInput     = document.getElementById('addstock-qty');
  const costInput    = document.getElementById('addstock-cost');
  const expiryInput  = document.getElementById('addstock-expiry');
  const uomSel       = document.getElementById('addstock-uom');

  // Register onOpen hook — resets + prefills form
  PopupManager.register('addstock-overlay', {
    onOpen() {
      batchInput.value    = 'B-' + Math.floor(100 + Math.random() * 900);
      receivedInput.value = new Date().toISOString().split('T')[0];
      searchInput.value   = '';
      supplierInput.value = '';
      qtyInput.value      = '';
      costInput.value     = '';
      expiryInput.value   = '';
      categorySel.value   = '';
      quickBtns.forEach(btn => btn.classList.remove('active'));
    }
  });

  // Trigger button opens via PopupManager
  triggerBtn.addEventListener('click', () => PopupManager.open('addstock-overlay'));

  // Quick select chips
  quickBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      quickBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      searchInput.value  = btn.dataset.ingredient;
      categorySel.value  = btn.dataset.category;
    });
  });

  // Confirm
  confirmBtn?.addEventListener('click', () => {
    const ingName = searchInput.value || 'Unknown Ingredient';
    const qty     = parseFloat(qtyInput.value) || 0;
    const uom     = uomSel.value;

    if (qty <= 0) { showToast('Please enter a valid quantity.'); return; }
    PopupManager.close('addstock-overlay');
    showToast(`✓ Added ${qty}${uom} of ${ingName} to stock.`);
  });
}

/* ================================================
   MANUAL STOCK RECEIVING (MSR) POPUP
   ================================================ */
function initMsrPopup() {
  const tbody     = document.getElementById('msr-tbody');
  const addBtn    = document.getElementById('msr-btn-add');
  const countLabel = document.getElementById('msr-count');

  if (!tbody || !addBtn || !countLabel) return;

  function updateCount() {
    const count = tbody.querySelectorAll('tr').length;
    countLabel.textContent = `${count} Item${count !== 1 ? 's' : ''} Listed`;
  }

  // Add Row
  addBtn.addEventListener('click', () => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>
        <select class="msr-input">
          <option>Select Ingredient...</option>
          <option>Chicken Breast</option>
          <option>Fresh Tomatoes</option>
          <option>Jasmine Rice</option>
        </select>
      </td>
      <td><input type="text" class="msr-input" placeholder="Batch ID"></td>
      <td><input type="number" class="msr-input" placeholder="0"></td>
      <td>
        <select class="msr-input">
          <option>kg</option>
          <option>L</option>
          <option>units</option>
        </select>
      </td>
      <td><input type="date" class="msr-input"></td>
      <td style="text-align: center;">
        <button type="button" class="msr-remove-btn" style="background:none; border:none; color:#ef4444; cursor:pointer;" title="Remove row">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </button>
      </td>
    `;
    tbody.appendChild(tr);
    updateCount();
  });

  // Remove Row (event delegation)
  tbody.addEventListener('click', (e) => {
    const removeBtn = e.target.closest('.msr-remove-btn');
    if (removeBtn) {
      removeBtn.closest('tr')?.remove();
      updateCount();
    }
  });

  updateCount();
}
// --- PR Dashboard Filtering ---
document.addEventListener('DOMContentLoaded', () => {
    const filterTabs = document.querySelectorAll('.pr-filter-tab');
    const prCards = document.querySelectorAll('.pr-card');

    if (filterTabs.length > 0 && prCards.length > 0) {
        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');

                // Get the filter value
                const filterValue = tab.getAttribute('data-filter');

                // Filter cards
                prCards.forEach(card => {
                    const cardStatus = card.getAttribute('data-status');
                    if (filterValue === 'all' || cardStatus === filterValue) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});
