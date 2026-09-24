<section id="sec-ingredients" class="section active">
  <div class="sec-hdr">
    <h2>Ingredients</h2>
    <p>Manage specifications, safety pars, supplier links, and live inventory allocations.</p>
  </div>

  <div class="stats metric-stats">
    <article class="metric-card metric-card-blue">
      <div class="metric-value">1,284</div>
      <div class="metric-label">Total Ingredient SKUs</div>
      <div class="metric-footer">
        <span>Across 6 food<br>categories</span>
        <strong>+14 this<br>month</strong>
      </div>
    </article>
    <article class="metric-card metric-card-red">
      <div class="metric-value">12</div>
      <div class="metric-label">Below Minimum Safety Par</div>
      <div class="metric-footer">
        <span>5 in Critical Red zone</span>
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
      <button class="btn btn-primary toolbar-btn" type="button" data-popup-target="add-ingredient-popup">
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
          <tr data-category="Dairy" data-status="low">
            <td class="tbl-main">Fresh Salmon Fillet</td>
            <td>Meat &amp; Seafood</td>
            <td>kg</td>
            <td>10</td>
            <td style="color:var(--danger);font-weight:700;">2.5</td>
            <td><span class="badge bg-red">Below Min</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Meat &amp; Seafood" data-status="optimal">
            <td class="tbl-main">Unsalted Butter</td>
            <td>Dairy</td>
            <td>kg</td>
            <td>5</td>
            <td style="color:var(--danger);font-weight:700;">0.8</td>
            <td><span class="badge bg-red">Below Min</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Dry Goods" data-status="optimal">
            <td class="tbl-main">Chicken (Whole)</td>
            <td>Meat &amp; Seafood</td>
            <td>kg</td>
            <td>20</td>
            <td>35.5</td>
            <td><span class="badge bg-green">In Stock</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Spices &amp; Herbs" data-status="low">
            <td class="tbl-main">Basmati Rice</td>
            <td>Dry Goods</td>
            <td>kg</td>
            <td>50</td>
            <td>88</td>
            <td><span class="badge bg-green">In Stock</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Dry Goods" data-status="optimal">
            <td class="tbl-main">Fresh Curry Leaves</td>
            <td>Spices &amp; Herbs</td>
            <td>g</td>
            <td>500</td>
            <td style="color:var(--danger);font-weight:700;">50</td>
            <td><span class="badge bg-red">Below Min</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Vegetables" data-status="low">
            <td class="tbl-main">Coconut Milk (Canned)</td>
            <td>Dry Goods</td>
            <td>L</td>
            <td>10</td>
            <td>14</td>
            <td><span class="badge bg-green">In Stock</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Dry Goods" data-status="optimal">
            <td class="tbl-main">Romaine Lettuce</td>
            <td>Vegetables</td>
            <td>kg</td>
            <td>5</td>
            <td>3.2</td>
            <td><span class="badge bg-orange">Low</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Meat &amp; Seafood" data-status="low">
            <td class="tbl-main">Dark Chocolate (70%)</td>
            <td>Dry Goods</td>
            <td>kg</td>
            <td>3</td>
            <td>6.5</td>
            <td><span class="badge bg-green">In Stock</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr data-category="Spices &amp; Herbs" data-status="low">
            <td class="tbl-main">Lamb Shoulder (Bone-in)</td>
            <td>Meat &amp; Seafood</td>
            <td>kg</td>
            <td>6</td>
            <td style="color:var(--warning);font-weight:700;">4</td>
            <td><span class="badge bg-orange">Low</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
          <tr>
            <td class="tbl-main">Garlic (Peeled)</td>
            <td>Spices &amp; Herbs</td>
            <td>g</td>
            <td>1000</td>
            <td style="color:var(--danger);font-weight:700;">300</td>
            <td><span class="badge bg-red">Below Min</span></td>
            <td>
              <div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="pagination">
      <span>Showing 1–10 of 1,284 ingredients</span>
      <div class="page-btns">
        <button class="page-btn">‹</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">…</button>
        <button class="page-btn">129</button>
        <button class="page-btn">›</button>
      </div>
    </div>
  </div>

  <div class="pm-overlay" id="add-ingredient-popup">
    <div class="pm-modal pm-modal--md">
      <!-- Header -->

      <div class="pm-header">
        <div class="pm-header-left">
          <div class="pm-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              aria-hidden="true">
              <path d="M12 4v16m8-8H4" />
            </svg>
          </div>
          <div>
            <h1 class="pm-title">Add New Ingredient</h1>
            <p class="pm-subtitle">Create new ingredient for the catelog</p>
          </div>
        </div>
        <button class="pm-close">✕</button>

      </div>
      <!-- Body -->
       <form action="<?= $baseUrl ?>/store/ingredient/create" method="POST">
      <div class="pm-body">
        
        <!-- Ingredient Name -->
        <div class="pm-field">
          <label class="pm-label" for="ing-name">Ingredient Name <span class="pm-required">*</span></label>
          <input class="pm-input" type="text" id="ing-name" name="name" placeholder="e.g. Chicken Breast" autocomplete="off" />
        </div>

        <!-- Category + Unit of Measure -->
        <div class="pm-row">
          <div class="pm-field">
            <label class="pm-label" for="ing-category">Category <span class="pm-required">*</span></label>
            <select class="pm-select" id="ing-category" name="category">
              <option value="" disabled selected>Select category</option>
              <option value="meat">Meat &amp; Poultry</option>
              <option value="seafood">Seafood</option>
              <option value="dairy">Dairy</option>
              <option value="vegetables">Vegetables</option>
              <option value="fruits">Fruits</option>
              <option value="grains">Grains &amp; Cereals</option>
              <option value="spices">Spices &amp; Herbs</option>
              <option value="oils">Oils &amp; Fats</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="pm-field">
            <label class="pm-label" for="ing-unit">Unit of Measure <span class="pm-required">*</span></label>
            <select class="pm-select" id="ing-unit" name="unit">
              <option value="" disabled selected>Select unit</option>
              <option value="kg">Kilogram (kg)</option>
              <option value="g">Gram (g)</option>
              <option value="l">Litre (L)</option>
              <option value="ml">Millilitre (mL)</option>
              <option value="pcs">Pieces (pcs)</option>
              <option value="dozen">Dozen</option>
            </select>
          </div>
        </div>

        <!-- Minimum Stock Level -->
        <div class="pm-field">
          <label class="pm-label" for="ing-min-stock">Minimum Stock Level <span class="pm-required">*</span></label>
          <div class="pm-input-group">
            <input class="pm-input" type="number" id="ing-min-stock" name="min_stock" placeholder="0.00" min="0" step="0.01" />
            <span class="pm-input-addon" id="ing-unit-badge">kg</span>
          </div>
        </div>

        <!-- Status -->
        <div class="pm-field">
          <div class="pm-status-toggle">
            <div class="pm-status-left">
              <span class="pm-status-text">Status</span>
              <span class="pm-status-hint">Enable immediately for kitchen requisition &amp; inventory tracking</span>
            </div>
            <div class="pm-toggle-group">
              <label class="pm-toggle-opt">
                <input type="radio" name="ing-status" value="active" checked />
                <span>Active</span>
              </label>
              <label class="pm-toggle-opt">
                <input type="radio" name="ing-status" value="inactive" />
                <span>Inactive</span>
              </label>
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="pm-field">
          <label class="pm-label" for="ing-description">Description <span class="pm-optional">(Optional)</span></label>
          <textarea class="pm-textarea" id="ing-description" name="description" rows="3"
            placeholder="e.g. Fresh boneless, skinless chicken breast fillets for main course preparations."></textarea>
        </div>

      </div><!-- /.pm-body -->

      <!-- Footer -->
      <div class="pm-footer pm-footer--end">
        <button class="pm-btn pm-btn--cancel" data-popup-close type="button">Cancel</button>
        <button class="pm-btn pm-btn--confirm" type="submit">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M12 4v16m8-8H4"/></svg>
          Add Ingredient
        </button>
      </div>
      </form>
    </div>
  </div>
</section>