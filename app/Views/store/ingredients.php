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
                <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
              </td>
            </tr>

          <?php endforeach; ?>


        </tbody>
      </table>
    </div>

  </div>

  <!-- ================================================
             ADD INGREDIENT POPUP
             ================================================ -->
  <div class="pm-overlay" id="add-ingredient-overlay">
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
</section>