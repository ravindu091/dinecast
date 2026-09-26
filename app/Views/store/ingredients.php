<?php if (!empty($_SESSION['message'])): ?>

  <script>
    console.log("message function read");
    showToast(<?= json_encode($_SESSION['message']) ?>, <?= json_encode($_SESSION['message-type']) ?>);
  </script>
  <?php
  unset($_SESSION['message'], $_SESSION['message-type']);
endif;
?>

<section id="sec-ingredients" class="section active">
  <div class="sec-hdr">
    <h2>Ingredients</h2>
    <p>Manage specifications, safety pars, supplier links, and live inventory allocations.</p>
  </div>

  <div class="stats metric-stats">
    <article class="metric-card metric-card-blue">
      <div class="metric-value"><?= htmlspecialchars($ingredientCount) ?></div>
      <div class="metric-label">Total Ingredient SKUs</div>
      <div class="metric-footer">
        <span>Across 6 food<br>categories</span>
        <strong>+14 this<br>month</strong>
      </div>
    </article>
    <article class="metric-card metric-card-red">
      <div class="metric-value"><?= htmlspecialchars($lowStockCount['bellowMin']) ?></div>
      <div class="metric-label">Below Minimum Safety Par</div>
      <div class="metric-footer">
        <span><?= htmlspecialchars($lowStockCount['redZone']) ?> in Critical Red zone</span>
        <strong>Resolve Now</strong>
      </div>
    </article>
    <article class="metric-card metric-card-orange">
      <div class="metric-value">8</div>
      <div class="metric-label">Near Expiration Batches</div>
      <div class="metric-footer">
        <span>Oldest: Fresh Prawns<br>(3d)</span>
        <strong>Review<br>FIFO</strong>
      </div>
    </article>
    <article class="metric-card metric-card-green">
      <div class="metric-value">$42,850</div>
      <div class="metric-label">Total Holding Asset Value</div>
      <div class="metric-footer">
        <span>Daily shrinkage rate</span>
        <strong>&lt; 0.4%</strong>
      </div>
    </article>
  </div>

  <div class="ingredient-toolbar">
    <label class="ingredient-search">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        aria-hidden="true">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.35-4.35" />
      </svg>
      <input id="ingredient-search" type="search" placeholder="Search ingredient name, SKU, zone, or supplier..."
        autocomplete="off">
    </label>
    <div class="ingredient-filters">
      <select id="category-filter" aria-label="Filter by category">
        <option value="all">All Categories</option>
        <option value="Meat &amp; Seafood">Proteins &amp; Seafood</option>
        <option value="Dairy">Dairy &amp; Eggs</option>
        <option value="Vegetables">Produce &amp; Herbs</option>
        <option value="Spices &amp; Herbs">Dry Goods &amp; Spices</option>
        <option value="Dry Goods">Dry Goods &amp; Spices</option>
      </select>
      <select id="status-filter" aria-label="Filter by stock status">
        <option value="all">All Statuses</option>
        <option value="low">Low / Critical Par</option>
        <option value="optimal">Optimal Par</option>
      </select>
      <button class="btn btn-outline toolbar-btn" type="button" data-export-ingredients>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          aria-hidden="true">
          <path d="M4 16v1a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-1m-4-4-4 4-4-4m4 4V4" />
        </svg>
        <span>Export CSV</span>
      </button>
      <button class="btn btn-primary toolbar-btn" type="button" id="btn-add-ingredient"
        data-popup-target="add-ingredient-overlay">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          aria-hidden="true">
          <path d="M12 4v16m8-8H4" />
        </svg>
        <span>Add Ingredient</span>
      </button>
    </div>
  </div>

  <div class="card">
    <div class="card-hdr">
      <h3>All Ingredients</h3><span style="font-size:12px;color:var(--t3);">Showing 1–10 of 1,284</span>
    </div>
    <div class="tbl-wrap">
      <table>
        <thead>
          <tr data-category="Meat &amp; Seafood" data-status="low">
            <th>Ingredient</th>
            <th>Category</th>
            <th>UOM</th>
            <th>Min Stock</th>
            <th>Current Stock</th>
            <th>Stock Level</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php

          
          foreach ($ingredients as $item): ?>

            <tr data-category="<?= htmlspecialchars($item['category']) ?>" data-status="low">
              <td class="tbl-main"><?= htmlspecialchars($item['name']) ?></td>
              <td><?= htmlspecialchars($item['category']) ?></td>
              <td><?= htmlspecialchars($item['unitName']) ?></td>
              <td><?= htmlspecialchars($item['minimum']) ?></td>
              <td><?= htmlspecialchars($item['currentStock']) ?></td>
              <?php $level = getStockLevel($item['currentStock'],$item['minimum']) ?>
              <td><span class="badge <?= htmlspecialchars($level['class']) ?>"><?= htmlspecialchars($level['text']) ?></span></td>
              <td>
                <span class="badge <?= $item['status'] === 'active' ? 'badge-green' : 'badge-gray' ?>" style="text-transform: capitalize;">
                  <?= htmlspecialchars($item['status']) ?>
                </span>
              </td>
              <td>
                <div class="acts">
                  <span class="act edit-btn" 
                    data-popup-target="edit-ingredient-overlay"
                    data-id="<?= htmlspecialchars($item['id']) ?>"
                    data-name="<?= htmlspecialchars($item['name']) ?>"
                    data-category="<?= htmlspecialchars($item['category']) ?>"
                    data-uom="<?= htmlspecialchars($item['unitName']) ?>"
                    data-min="<?= htmlspecialchars($item['minimum']) ?>"
                    data-current="<?= htmlspecialchars($item['currentStock']) ?>"
                    data-status="<?= htmlspecialchars($item['status']) ?>"
                    data-desc="<?= htmlspecialchars($item['description']) ?>"
                  >Edit</span>
                  <span class="act del delete-btn"
                    data-popup-target="delete-ingredient-overlay"
                    data-id="<?= htmlspecialchars($item['id']) ?>"
                    data-name="<?= htmlspecialchars($item['name']) ?>"
                    data-category="<?= htmlspecialchars($item['category']) ?>"
                    data-uom="<?= htmlspecialchars($item['unitName']) ?>"
                    data-min="<?= htmlspecialchars($item['minimum']) ?>"
                    data-current="<?= htmlspecialchars($item['currentStock']) ?>"
                  >Delete</span>
                </div>
              </td>
            </tr>

          <?php endforeach; ?>


        </tbody>
      </table>
    </div>

  </div>

  <!-- Add Ingredient Popup Window -->
  <div class="pm-overlay" id="add-ingredient-overlay">
    <div class="pm-modal pm-modal--md">

      <!-- Header -->
      <div class="pm-header">
        <div class="pm-header-left">
          <div class="pm-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M12 20h9" />
              <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z" />
            </svg>
          </div>
          <div>
            <h2 class="pm-title">Add New Ingredient</h2>
            <p class="pm-subtitle">Create a new ingredient for the <a href="#" class="pm-subtitle-link">inventory
                catalogue</a>.</p>
          </div>
        </div>
        <button type="button" class="pm-close" aria-label="Close">&times;</button>
      </div>

      <form action="<?= BASE_URL ?>/ingredient/create" method="post" name="add-ingredient-form" id="add-ingredient-form"
        autocomplete="off">
        <!-- Body -->
        <div class="pm-body">

          <!-- Ingredient Name -->
          <div class="pm-field">
            <label class="pm-label" for="ing-name">Ingredient Name <span class="pm-required">*</span></label>
            <input class="pm-input" type="text" id="ing-name" name="name" placeholder="Chicken Breast" required>
          </div>

          <!-- Category + Unit of Measure -->
          <div class="pm-row-2">
            <div class="pm-field">
              <label class="pm-label" for="ing-category">Category <span class="pm-required">*</span></label>
              <div class="pm-select-wrap">
                <select class="pm-select" id="ing-category" name="category" required>
                  <option value="" disabled selected>Select category</option>
                  <option value="meat">Meat &amp; Poultry</option>
                  <option value="seafood">Seafood</option>
                  <option value="dairy">Dairy &amp; Eggs</option>
                  <option value="produce">Produce &amp; Herbs</option>
                  <option value="dry-goods">Dry Goods &amp; Spices</option>
                  <option value="beverages">Beverages</option>
                  <option value="other">Other</option>
                </select>
                <svg class="pm-select-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2.5">
                  <polyline points="6 9 12 15 18 9" />
                </svg>
              </div>
            </div>
            <div class="pm-field">
              <label class="pm-label" for="ing-uom">Unit of Measure <span class="pm-required">*</span></label>
              <div class="pm-select-wrap">
                <select class="pm-select" id="ing-uom" name="uom" required>
                  <option value="" disabled selected>Select unit</option>
                  <option value="kg">Kilogram (kg)</option>
                  <option value="g">Gram (g)</option>
                  <option value="L">Litre (L)</option>
                  <option value="mL">Millilitre (mL)</option>
                  <option value="pcs">Pieces (pcs)</option>
                  <option value="box">Box</option>
                  <option value="can">Can</option>
                </select>
                <svg class="pm-select-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2.5">
                  <polyline points="6 9 12 15 18 9" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Stock Levels -->
          <div class="pm-row-2">
            <div class="pm-field">
              <label class="pm-label" for="ing-min-stock">Minimum Stock Level <span class="pm-required">*</span></label>
              <div class="pm-input-addon-wrap">
                <input class="pm-input pm-input--addon" type="number" id="ing-min-stock" name="min_stock"
                  placeholder="0.00" min="0" step="0.01" required>
                <span class="pm-input-addon" id="ing-uom-badge">unit</span>
              </div>
            </div>
            <div class="pm-field">
              <label class="pm-label" for="ing-current-stock">Current Stock <span class="pm-required">*</span></label>
              <div class="pm-input-addon-wrap">
                <input class="pm-input pm-input--addon" type="number" id="ing-current-stock" name="current_stock"
                  placeholder="0.00" min="0" step="0.01" required>
                <span class="pm-input-addon" id="ing-uom-badge-curr">unit</span>
              </div>
            </div>
          </div>

          <!-- Status Toggle -->
          <div class="pm-status-block">
            <div class="pm-status-info">
              <span class="pm-label">Status</span>
              <span class="pm-status-hint">Enable immediately for kitchen requisition &amp; inventory tracking</span>
            </div>
            <div class="pm-radio-group" role="group" aria-label="Ingredient status">
              <label class="pm-radio-opt">
                <input type="radio" name="status" value="active" checked>
                <span class="pm-radio-circle"></span>
                Active
              </label>
              <label class="pm-radio-opt">
                <input type="radio" name="status" value="inactive">
                <span class="pm-radio-circle"></span>
                Inactive
              </label>
            </div>
          </div>

          <!-- Description (optional) -->
          <div class="pm-field">
            <label class="pm-label" for="ing-desc">Description <span class="pm-optional">(Optional)</span></label>
            <textarea class="pm-textarea" id="ing-desc" name="description" rows="3"
              placeholder="Fresh boneless, skinless chicken breast fillets for main course preparations."></textarea>
          </div>

        </div><!-- /pm-body -->

        <!-- Footer -->
        <div class="pm-footer pm-footer--between">
          <button type="button" class="pm-btn pm-btn--cancel" data-popup-close>Cancel</button>
          <button type="submit" class="pm-btn pm-btn--confirm" id="add-ingredient-submit">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M12 4v16m8-8H4" />
            </svg>
            Add Ingredient
          </button>
        </div>
      </form>

    </div>
  </div>

  <!-- Edit Ingredient Popup Window -->
  <div class="pm-overlay" id="edit-ingredient-overlay">
    <div class="pm-modal pm-modal--md">

      <!-- Header -->
      <div class="pm-header">
        <div class="pm-header-left">
          <div class="pm-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M12 4v16m8-8H4" />
            </svg>
          </div>
          <div>
            <h2 class="pm-title">Edit Ingredient</h2>
            <p class="pm-subtitle">Edit the existing Ingredient</p>
          </div>
        </div>
        <button type="button" class="pm-close" aria-label="Close">&times;</button>
      </div>

      <form action="<?= BASE_URL ?>/ingredient/edit" method="post" name="edit-ingredient-form" id="edit-ingredient-form"
        autocomplete="off">
        <input type="hidden" name="id" id="edit-ing-id">
        <!-- Body -->
        <div class="pm-body">

          <!-- Ingredient Name -->
          <div class="pm-field">
            <label class="pm-label" for="edit-ing-name">Ingredient Name <span class="pm-required">*</span></label>
            <input class="pm-input" type="text" id="edit-ing-name" name="name" placeholder="Chicken Breast" required>
          </div>

          <!-- Category + Unit of Measure -->
          <div class="pm-row-2">
            <div class="pm-field">
              <label class="pm-label" for="edit-ing-category">Category <span class="pm-required">*</span></label>
              <div class="pm-select-wrap">
                <select class="pm-select" id="edit-ing-category" name="category" required>
                  <option value="" disabled selected>Select category</option>
                  <option value="meat">Meat &amp; Poultry</option>
                  <option value="seafood">Seafood</option>
                  <option value="dairy">Dairy &amp; Eggs</option>
                  <option value="produce">Produce &amp; Herbs</option>
                  <option value="dry-goods">Dry Goods &amp; Spices</option>
                  <option value="beverages">Beverages</option>
                  <option value="other">Other</option>
                </select>
                <svg class="pm-select-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2.5">
                  <polyline points="6 9 12 15 18 9" />
                </svg>
              </div>
            </div>
            <div class="pm-field">
              <label class="pm-label" for="edit-ing-uom">Unit of Measure <span class="pm-required">*</span></label>
              <div class="pm-select-wrap">
                <select class="pm-select" id="edit-ing-uom" name="uom" required>
                  <option value="" disabled selected>Select unit</option>
                  <option value="kg">Kilogram (kg)</option>
                  <option value="g">Gram (g)</option>
                  <option value="L">Litre (L)</option>
                  <option value="mL">Millilitre (mL)</option>
                  <option value="pcs">Pieces (pcs)</option>
                  <option value="box">Box</option>
                  <option value="can">Can</option>
                </select>
                <svg class="pm-select-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2.5">
                  <polyline points="6 9 12 15 18 9" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Stock Levels -->
          <div class="pm-row-2">
            <div class="pm-field">
              <label class="pm-label" for="edit-ing-min-stock">Minimum Stock Level <span class="pm-required">*</span></label>
              <div class="pm-input-addon-wrap">
                <input class="pm-input pm-input--addon" type="number" id="edit-ing-min-stock" name="min_stock"
                  placeholder="0.00" min="0" step="0.01" required>
                <span class="pm-input-addon" id="edit-ing-uom-badge">unit</span>
              </div>
            </div>
            <div class="pm-field">
              <label class="pm-label" for="edit-ing-current-stock">Current Stock <span class="pm-required">*</span></label>
              <div class="pm-input-addon-wrap">
                <input class="pm-input pm-input--addon" type="number" id="edit-ing-current-stock" name="current_stock"
                  placeholder="0.00" min="0" step="0.01" required>
                <span class="pm-input-addon" id="edit-ing-uom-badge-curr">unit</span>
              </div>
            </div>
          </div>

          <!-- Status Toggle -->
          <div class="pm-status-block">
            <div class="pm-status-info">
              <span class="pm-label">Status</span>
              <span class="pm-status-hint">Enable immediately for kitchen requisition &amp; inventory tracking</span>
            </div>
            <div class="pm-radio-group" role="group" aria-label="Ingredient status">
              <label class="pm-radio-opt">
                <input type="radio" name="status" value="active" id="edit-status-active" checked>
                <span class="pm-radio-circle"></span>
                Active
              </label>
              <label class="pm-radio-opt">
                <input type="radio" name="status" value="inactive" id="edit-status-inactive">
                <span class="pm-radio-circle"></span>
                Inactive
              </label>
            </div>
          </div>

          <!-- Description (optional) -->
          <div class="pm-field">
            <label class="pm-label" for="edit-ing-desc">Description <span class="pm-optional">(Optional)</span></label>
            <textarea class="pm-textarea" id="edit-ing-desc" name="description" rows="3"
              placeholder="Fresh boneless, skinless chicken breast fillets for main course preparations."></textarea>
          </div>

        </div><!-- /pm-body -->

        <!-- Footer -->
        <div class="pm-footer pm-footer--between">
          <button type="button" class="pm-btn pm-btn--cancel" data-popup-close>Cancel</button>
          <button type="submit" class="pm-btn pm-btn--confirm" id="edit-ingredient-submit">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M12 4v16m8-8H4" />
            </svg>
            Update Ingredient
          </button>
        </div>
      </form>

    </div>
  </div>

  <!-- Delete Ingredient Popup Window -->
  <div class="pm-overlay" id="delete-ingredient-overlay">
    <div class="pm-modal pm-modal--md">
      <!-- Header -->
      <div class="pm-header">
        <div class="pm-header-left">
          <div class="pm-icon" style="background-color: #fff1f2; color: #e11d48;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 6h18"></path>
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
          </div>
          <div>
            <h2 class="pm-title">Delete Ingredient</h2>
            <p class="pm-subtitle" style="max-width: 320px;">Are you sure you want to delete this ingredient record? This action cannot be undone.</p>
          </div>
        </div>
        <button type="button" class="pm-close" aria-label="Close">&times;</button>
      </div>

      <form action="<?= BASE_URL ?>/ingredient/delete" method="post" id="delete-ingredient-form">
        <input type="hidden" name="id" id="delete-ing-id">
        <!-- Body -->
        <div class="pm-body">
          <div style="border: 1px solid var(--border); border-radius: 8px; padding: 16px; background-color: var(--surface);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <strong id="delete-ing-name" style="font-size: 15px; color: var(--text-main);">Fresh Salmon Fillet</strong>
              <span id="delete-ing-category" style="font-size: 12px; font-weight: 500; color: #2563eb; background-color: #eff6ff; padding: 4px 8px; border-radius: 4px;">Proteins &amp; Seafood</span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px; margin-bottom: 16px; color: var(--text-sub);">
              <span>Current Inventory:</span>
              <span>
                <strong style="color: var(--text-main);" id="delete-ing-current">2.5 kg</strong> / 
                Par: <span id="delete-ing-min">10.0 kg</span>
              </span>
            </div>

            <div style="background-color: #fffbeb; border: 1px solid #fef3c7; border-radius: 6px; padding: 12px; display: flex; gap: 10px; color: #b45309; font-size: 13px; line-height: 1.5;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
              </svg>
              <div>
                Deleting will unlink this ingredient from <strong style="color: #92400e;">4 active banquet recipes</strong> and historical batch logs. Active purchase orders will be flagged.
              </div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="pm-footer pm-footer--between">
          <button type="button" class="pm-btn pm-btn--cancel" data-popup-close style="flex: 1; justify-content: center; border-radius: 8px;">Cancel</button>
          <button type="submit" class="pm-btn" style="flex: 1; justify-content: center; background-color: #e11d48; color: white; border: none; border-radius: 8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;">
              <path d="M3 6h18"></path>
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
            </svg>
            Delete Ingredient
          </button>
        </div>
      </form>
    </div>
  </div>
</section>