<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Store Manager Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/store.css">
</head>
<body>
<div class="dash">

  <!-- ====================================================
       SIDEBAR
       ==================================================== -->
  <aside class="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Main Menu</div>
    <nav>
      <div class="nav-link active" data-section="sec-home" data-title="Store Manager Dashboard">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
          </svg>
        </span>
        <span class="nav-label">Home</span>
      </div>

      <div class="nav-link" data-section="sec-ingredients" data-title="Ingredients">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2a10 10 0 0 1 10 10H2A10 10 0 0 1 12 2z"/>
            <path d="M12 12v10M5.2 16.5l13.6-9M18.8 16.5L5.2 7.5"/>
          </svg>
        </span>
        <span class="nav-label">Ingredients</span>
      </div>

      <div class="nav-link" data-section="sec-inventory" data-title="Inventory">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
          </svg>
        </span>
        <span class="nav-label">Inventory</span>
      </div>

      <div class="nav-link" data-section="sec-purchase-orders" data-title="Purchase Orders">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
            <polyline points="10 9 9 9 8 9"/>
          </svg>
        </span>
        <span class="nav-label">Purchase Orders</span>
      </div>

      <div class="nav-link" data-section="sec-receive" data-title="Receive Stock">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="8 17 12 21 16 17"/>
            <line x1="12" y1="12" x2="12" y2="21"/>
            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"/>
          </svg>
        </span>
        <span class="nav-label">Receive Stock</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar">NK</div>
        <div>
          <div class="sb-user-name">Nadeesha Kumari</div>
          <div class="sb-user-role">Store Manager</div>
        </div>
      </div>
      <div class="sb-logout" onclick="logout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        Logout
      </div>
    </div>
  </aside>

  <!-- ====================================================
       MAIN AREA
       ==================================================== -->
  <div class="main-area">

    <header class="topbar">
      <div class="topbar-left">
        <h1>Store Manager Dashboard</h1>
        <p>Welcome back, Nadeesha!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn" title="Notifications">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
          </svg>
        </button>
      </div>
    </header>

    <main class="content">

      <!-- ================================================
           HOME SECTION
           ================================================ -->
      <section id="sec-home" class="section active">

        <div class="welcome">
          <div class="welcome-txt">
            <h2>Welcome back, Nadeesha!</h2>
            <p>Here's a snapshot of your store today.</p>
            <div class="user-id">ID: DC-STR-11 &nbsp;·&nbsp; Store Manager</div>
          </div>
          <div class="welcome-illo">🏪</div>
        </div>

        <!-- KPI Stats -->
        <div class="stats">
          <div class="stat c-blue">
            <div class="stat-ico">🧂</div>
            <div class="stat-val">1,284</div>
            <div class="stat-lbl">Total Ingredient Lines</div>
          </div>
          <div class="stat c-red">
            <div class="stat-ico">⬇️</div>
            <div class="stat-val">12</div>
            <div class="stat-lbl">Below Minimum Stock</div>
          </div>
          <div class="stat c-orange">
            <div class="stat-ico">⏰</div>
            <div class="stat-val">8</div>
            <div class="stat-lbl">Near Expiry (7 days)</div>
          </div>
          <div class="stat c-green">
            <div class="stat-ico">📦</div>
            <div class="stat-val">6</div>
            <div class="stat-lbl">Pending Purchase Orders</div>
          </div>
        </div>

        <!-- Grid: Low Stock Alerts + Quick Links -->
        <div class="grid-2">

          <!-- Low Stock Alerts -->
          <div class="card">
            <div class="card-hdr">
              <div>
                <h3>🔴 Low Stock Alerts</h3>
                <p>Items requiring immediate attention</p>
              </div>
              <button class="btn btn-outline btn-sm" onclick="document.querySelector('[data-section=sec-inventory]').click()">View Inventory</button>
            </div>
            <div class="stock-alerts">
              <div class="stock-alert">
                <div class="stock-alert-ico">🐟</div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Fresh Salmon Fillet</div>
                  <div class="stock-alert-desc">Current: 2.5 kg &nbsp;·&nbsp; Minimum: 10 kg</div>
                </div>
                <div class="stock-shortfall">-7.5 kg</div>
              </div>
              <div class="stock-alert">
                <div class="stock-alert-ico">🧈</div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Unsalted Butter</div>
                  <div class="stock-alert-desc">Current: 0.8 kg &nbsp;·&nbsp; Minimum: 5 kg</div>
                </div>
                <div class="stock-shortfall">-4.2 kg</div>
              </div>
              <div class="stock-alert">
                <div class="stock-alert-ico">🌿</div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Fresh Curry Leaves</div>
                  <div class="stock-alert-desc">Current: 50 g &nbsp;·&nbsp; Minimum: 500 g</div>
                </div>
                <div class="stock-shortfall">-450 g</div>
              </div>
              <div class="stock-alert warn">
                <div class="stock-alert-ico">🥩</div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Lamb (Bone-in)</div>
                  <div class="stock-alert-desc">Current: 4 kg &nbsp;·&nbsp; Minimum: 6 kg</div>
                </div>
                <div class="stock-shortfall">-2 kg</div>
              </div>
              <div class="stock-alert warn">
                <div class="stock-alert-ico">🧄</div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Garlic (Peeled)</div>
                  <div class="stock-alert-desc">Current: 300 g &nbsp;·&nbsp; Minimum: 1 kg</div>
                </div>
                <div class="stock-shortfall">-700 g</div>
              </div>
            </div>
          </div>

          <!-- Quick Links -->
          <div class="card">
            <div class="card-hdr"><h3>Quick Actions</h3></div>
            <div class="quick-links">
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-receive]').click()">
                <div class="ql-icon" style="background:var(--success-bg);">📥</div>
                <div>
                  <div class="ql-title">Receive Stock</div>
                  <div class="ql-sub">Log incoming deliveries</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-ingredients]').click()">
                <div class="ql-icon" style="background:var(--info-bg);">🧂</div>
                <div>
                  <div class="ql-title">Ingredients</div>
                  <div class="ql-sub">View all ingredient records</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-inventory]').click()">
                <div class="ql-icon" style="background:var(--warning-bg);">📦</div>
                <div>
                  <div class="ql-title">Inventory</div>
                  <div class="ql-sub">View batches &amp; expiry dates</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-purchase-orders]').click()">
                <div class="ql-icon" style="background:var(--purple-bg);">📋</div>
                <div>
                  <div class="ql-title">Purchase Orders</div>
                  <div class="ql-sub">Review approved PRs</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
            </div>

            <!-- Near Expiry -->
            <div style="margin-top:18px;">
              <div style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;color:var(--t3);margin-bottom:12px;">⏰ Near Expiry (Within 7 Days)</div>
              <div style="display:flex;flex-direction:column;gap:8px;">
                <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--warning-bg);border-radius:8px;">
                  <div style="font-size:13px;font-weight:600;color:var(--t1);">Coconut Milk (Batch B-042)</div>
                  <span class="badge bg-orange">Exp: 14 Aug</span>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--warning-bg);border-radius:8px;">
                  <div style="font-size:13px;font-weight:600;color:var(--t1);">Sour Cream (Batch B-039)</div>
                  <span class="badge bg-orange">Exp: 15 Aug</span>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--danger-bg);border-radius:8px;">
                  <div style="font-size:13px;font-weight:600;color:var(--t1);">Fresh Prawns (Batch B-046)</div>
                  <span class="badge bg-red">Exp: 13 Aug</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- ================================================
           INGREDIENTS SECTION
           ================================================ -->
      <section id="sec-ingredients" class="section">
        <div class="sec-hdr">
          <h2>Ingredients</h2>
          <button class="btn btn-primary" onclick="toggleModal('model-overlay-ingredient')">+ Add Ingredient</button>
        </div>
          
        <!-- Add ingredient form -->
        <div class="modal-overlay" id="model-overlay-ingredient" onclick="if(event.target ===this)toggleModal('model-overlay-ingredient')">
            <div class="modal">
              <div class="modal-hdr">
                <h3>Add new Ingredient</h3>
                <button class="modal-close" onclick="toggleModal('model-overlay-ingredient')">✕</button>
              </div>
              <form action="">
                <div class="form-grid">
                  <div class="form-grp">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="eg. Basmathi Samba" required>
                  </div>
                  <div class="form-grp">
                    <label for="unit-of-measure">Unit of Measure</label>
                    <select name="unit-of-measure" id="uom">
                      <?php
                          require_once __DIR__ . '/../Model/Ingredient/Unit.php';

                          $unit = new Unit();
                          $units = $unit->getAll();

                          foreach ($units as $u) {
                              echo '<option value="' . $u['id'] . '">' . $u['name'] . '</option>';
                          }
                      ?>
                    </select>
                  </div>
                  <div class="form-grp">
                    <label for="unit-price">price</label>
                    <input type="number" name="price" id="price" placeholder="100.00" required>
                  </div>
                  <div class="form-grp">
                    <label for="stock-level">Min Stock level</label>
                    <input type="number" name="min-stock-level" id="min-stock-level" placeholder="12.00" required>
                  </div>
                  <div class="form-grp">
                    <label for="status">Status</label>
                    <div class="row-form">
                      <label class="radio-option">
                        <input type="radio" name="status" id="active-status" value="active">
                        <span>Active</span>
                      </label>
                      <label class="radio-option">
                        <input type="radio" name="status" id="deactivate-status" value="inactive">
                        <span>Deactivate</span>
                      </label>
                    </div>
                  </div>
                  <br>
                  <div class="form-grp form-full">
                    <label for="Notes">Notes</label>
                    <textarea name="notes" id="notes" class="form-full"></textarea>
                  </div>
                </div>
                <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Ingredient</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-user')">Cancel</button>
                </div>
              </form>
            </div>
        </div>
        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">🧂</div><div class="stat-val">1,284</div><div class="stat-lbl">Total Ingredient Lines</div></div>
          <div class="stat c-red"><div class="stat-ico">⬇️</div><div class="stat-val">12</div><div class="stat-lbl">Below Minimum</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">1,264</div><div class="stat-lbl">In Stock (Normal)</div></div>
        </div>

        <!-- Filter bar -->
        <div class="filter-bar">
          <input type="text" placeholder="Search ingredients..." style="padding:9px 14px;border:1.5px solid var(--border);border-radius:var(--r-sm);font-size:14px;font-family:inherit;outline:none;flex:1;max-width:340px;transition:border 0.18s;" onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
          <button class="btn btn-outline btn-sm" data-toggle-filter="filter-ing">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
            Filter
          </button>
        </div>
        <div class="filter-popup" id="filter-ing">
          <div class="filter-ttl">Filter by Status</div>
          <div class="filter-opts">
            <label class="filter-opt"><input type="checkbox" checked> All</label>
            <label class="filter-opt"><input type="checkbox"> Below Minimum</label>
            <label class="filter-opt"><input type="checkbox"> Near Expiry</label>
            <label class="filter-opt"><input type="checkbox"> Out of Stock</label>
          </div>
          <div class="filter-ttl" style="margin-top:12px;">Filter by Category</div>
          <div class="filter-opts">
            <label class="filter-opt"><input type="checkbox" checked> All Categories</label>
            <label class="filter-opt"><input type="checkbox"> Meat &amp; Seafood</label>
            <label class="filter-opt"><input type="checkbox"> Dairy</label>
            <label class="filter-opt"><input type="checkbox"> Vegetables</label>
            <label class="filter-opt"><input type="checkbox"> Spices &amp; Herbs</label>
            <label class="filter-opt"><input type="checkbox"> Dry Goods</label>
          </div>
          <span class="clear-link">Clear all filters</span>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Ingredients</h3><span style="font-size:12px;color:var(--t3);">Showing 1–10 of 1,284</span></div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr>
                  <th>Ingredient</th><th>Category</th><th>UOM</th>
                  <th>Min Stock</th><th>Current Stock</th><th>Status</th><th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tbl-main">Fresh Salmon Fillet</td><td>Meat &amp; Seafood</td><td>kg</td>
                  <td>10</td><td style="color:var(--danger);font-weight:700;">2.5</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Unsalted Butter</td><td>Dairy</td><td>kg</td>
                  <td>5</td><td style="color:var(--danger);font-weight:700;">0.8</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Chicken (Whole)</td><td>Meat &amp; Seafood</td><td>kg</td>
                  <td>20</td><td>35.5</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Basmati Rice</td><td>Dry Goods</td><td>kg</td>
                  <td>50</td><td>88</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Fresh Curry Leaves</td><td>Spices &amp; Herbs</td><td>g</td>
                  <td>500</td><td style="color:var(--danger);font-weight:700;">50</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Coconut Milk (Canned)</td><td>Dry Goods</td><td>L</td>
                  <td>10</td><td>14</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Romaine Lettuce</td><td>Vegetables</td><td>kg</td>
                  <td>5</td><td>3.2</td>
                  <td><span class="badge bg-orange">Low</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Dark Chocolate (70%)</td><td>Dry Goods</td><td>kg</td>
                  <td>3</td><td>6.5</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Lamb Shoulder (Bone-in)</td><td>Meat &amp; Seafood</td><td>kg</td>
                  <td>6</td><td style="color:var(--warning);font-weight:700;">4</td>
                  <td><span class="badge bg-orange">Low</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Garlic (Peeled)</td><td>Spices &amp; Herbs</td><td>g</td>
                  <td>1000</td><td style="color:var(--danger);font-weight:700;">300</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
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
      </section>

      <!-- ================================================
           INVENTORY SECTION
           ================================================ -->
      <section id="sec-inventory" class="section">
        <div class="sec-hdr"><h2>Inventory</h2></div>

        <!-- Inner Tabs -->
        <div class="tab-group">
          <div class="tabs">
            <button class="tab active">Active Batches</button>
            <button class="tab">Used-Up / Expired</button>
          </div>

          <!-- ===== TAB 1: Active ===== -->
          <div class="tab-pane active">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr">
                <h3>Active Inventory Batches</h3>
                <span style="font-size:12px;color:var(--t3);">Click ▶ to view batch details</span>
              </div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr><th></th><th>Ingredient</th><th>Batch No.</th><th>Received</th><th>Qty Remaining</th><th>Expiry Date</th><th>Status</th></tr>
                  </thead>
                  <tbody>
                    <!-- Row 1 + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-1" onclick="toggleExpandRow(this,'exp-row-1')">▶</button></td>
                      <td class="tbl-main">Chicken (Whole)</td>
                      <td><span class="tbl-id">B-041</span></td>
                      <td>10/08/2026</td>
                      <td><strong>35.5 kg</strong></td>
                      <td>17/08/2026</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-1">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-041</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Lakmal &amp; Sons Poultry</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0891</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 850/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">40 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">4.5 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">35.5 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 2 + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-2" onclick="toggleExpandRow(this,'exp-row-2')">▶</button></td>
                      <td class="tbl-main">Basmati Rice</td>
                      <td><span class="tbl-id">B-038</span></td>
                      <td>08/08/2026</td>
                      <td><strong>88 kg</strong></td>
                      <td>08/02/2027</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-2">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-038</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Ceylon Agro Exports</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0872</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 280/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">100 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">12 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">88 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 3 (near expiry) + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-3" onclick="toggleExpandRow(this,'exp-row-3')">▶</button></td>
                      <td class="tbl-main">Coconut Milk (Canned)</td>
                      <td><span class="tbl-id">B-042</span></td>
                      <td>05/08/2026</td>
                      <td><strong>14 L</strong></td>
                      <td style="color:var(--warning);font-weight:700;">14/08/2026</td>
                      <td><span class="badge bg-orange">Near Expiry</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-3">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-042</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Araliya Foods</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0850</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 120/L</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">20 L</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">6 L</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--warning);">14 L</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 4 (critical expiry) -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-4" onclick="toggleExpandRow(this,'exp-row-4')">▶</button></td>
                      <td class="tbl-main">Fresh Prawns</td>
                      <td><span class="tbl-id">B-046</span></td>
                      <td>11/08/2026</td>
                      <td><strong>8 kg</strong></td>
                      <td style="color:var(--danger);font-weight:700;">13/08/2026</td>
                      <td><span class="badge bg-red">Expires Soon</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-4">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-046</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Negombo Sea Foods</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0904</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 1,200/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">8 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">0 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--danger);">8 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-5" onclick="toggleExpandRow(this,'exp-row-5')">▶</button></td>
                      <td class="tbl-main">Dark Chocolate (70%)</td>
                      <td><span class="tbl-id">B-033</span></td>
                      <td>01/08/2026</td>
                      <td><strong>6.5 kg</strong></td>
                      <td>01/02/2027</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-5">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-033</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Global Imports Ltd</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0821</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 2,200/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">8 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">1.5 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">6.5 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- ===== TAB 2: Used-Up / Expired ===== -->
          <div class="tab-pane">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Used-Up &amp; Expired Batches</h3></div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr><th>Ingredient</th><th>Batch No.</th><th>Received</th><th>Original Qty</th><th>Closed On</th><th>Reason</th></tr>
                  </thead>
                  <tbody>
                    <tr><td class="tbl-main">Sour Cream</td><td><span class="tbl-id">B-028</span></td><td>22/07/2026</td><td>5 kg</td><td>05/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Fresh Basil</td><td><span class="tbl-id">B-029</span></td><td>24/07/2026</td><td>200 g</td><td>06/08/2026</td><td><span class="badge bg-red">Expired</span></td></tr>
                    <tr><td class="tbl-main">Heavy Cream</td><td><span class="tbl-id">B-030</span></td><td>25/07/2026</td><td>3 L</td><td>08/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Egg Noodles</td><td><span class="tbl-id">B-031</span></td><td>26/07/2026</td><td>4 kg</td><td>09/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Parmesan Cheese</td><td><span class="tbl-id">B-032</span></td><td>28/07/2026</td><td>2 kg</td><td>10/08/2026</td><td><span class="badge bg-red">Expired</span></td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- /tab-group -->
      </section>

      <!-- ================================================
           PURCHASE ORDERS SECTION
           ================================================ -->
      <section id="sec-purchase-orders" class="section">
        <div class="sec-hdr"><h2>Purchase Orders</h2></div>

        <div class="stats">
          <div class="stat c-orange"><div class="stat-ico">📋</div><div class="stat-val">6</div><div class="stat-lbl">Pending Delivery</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">3</div><div class="stat-lbl">Received This Week</div></div>
          <div class="stat c-blue"><div class="stat-ico">💰</div><div class="stat-val" style="font-size:20px;">Rs. 284K</div><div class="stat-lbl">Total Value (This Month)</div></div>
        </div>

        <div class="card">
          <div class="card-hdr">
            <h3>All Purchase Orders</h3>
            <p style="font-size:12px;color:var(--t3);">Generated from approved Purchase Requisitions</p>
          </div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr><th>PO Ref</th><th>PR Ref</th><th>Supplier</th><th>Items</th><th>Total Value</th><th>Expected Delivery</th><th>Status</th><th>Actions</th></tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="pr-ref">PO-0018</span></td>
                  <td><span class="tbl-id">PR-0043</span></td>
                  <td>Negombo Sea Foods</td>
                  <td style="font-size:13px;color:var(--t2);">Salmon, Prawns</td>
                  <td style="font-weight:700;">Rs. 48,500</td>
                  <td>14/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act">Receive</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PO-0019</span></td>
                  <td><span class="tbl-id">PR-0046</span></td>
                  <td>Lakmal &amp; Sons Poultry</td>
                  <td style="font-size:13px;color:var(--t2);">Chicken, Lamb</td>
                  <td style="font-weight:700;">Rs. 72,200</td>
                  <td>13/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act">Receive</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PO-0020</span></td>
                  <td><span class="tbl-id">PR-0047</span></td>
                  <td>Ceylon Agro Exports</td>
                  <td style="font-size:13px;color:var(--t2);">Rice, Spices, Dry Goods</td>
                  <td style="font-weight:700;">Rs. 34,800</td>
                  <td>15/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act">Receive</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PO-0017</span></td>
                  <td><span class="tbl-id">PR-0042</span></td>
                  <td>Araliya Foods</td>
                  <td style="font-size:13px;color:var(--t2);">Coconut Milk, Herbs</td>
                  <td style="font-weight:700;">Rs. 12,400</td>
                  <td>10/08/2026</td>
                  <td><span class="badge bg-green">Received</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PO-0016</span></td>
                  <td><span class="tbl-id">PR-0041</span></td>
                  <td>Global Imports Ltd</td>
                  <td style="font-size:13px;color:var(--t2);">Chocolate, Dairy</td>
                  <td style="font-weight:700;">Rs. 28,600</td>
                  <td>08/08/2026</td>
                  <td><span class="badge bg-green">Received</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ================================================
           RECEIVE STOCK SECTION
           ================================================ -->
      <section id="sec-receive" class="section">
        <div class="sec-hdr"><h2>Receive Stock</h2></div>

        <div class="card">
          <div class="card-hdr">
            <div>
              <h3>📥 Log Incoming Delivery</h3>
              <p style="font-size:12px;color:var(--t3);margin-top:3px;">Use this form to receive stock against a Purchase Order or ad-hoc delivery.</p>
            </div>
          </div>

          <form onsubmit="submitReceiveStock(event)">
            <div class="form-grid">

              <div class="form-grp">
                <label>Purchase Order (Optional)</label>
                <select id="rs-po">
                  <option value="">— Select PO (if applicable) —</option>
                  <option>PO-0018 &nbsp;·&nbsp; Negombo Sea Foods</option>
                  <option>PO-0019 &nbsp;·&nbsp; Lakmal &amp; Sons Poultry</option>
                  <option>PO-0020 &nbsp;·&nbsp; Ceylon Agro Exports</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Ingredient *</label>
                <select id="rs-ingredient" required>
                  <option value="">— Select Ingredient —</option>
                  <option>Fresh Salmon Fillet</option>
                  <option>Unsalted Butter</option>
                  <option>Chicken (Whole)</option>
                  <option>Basmati Rice</option>
                  <option>Fresh Curry Leaves</option>
                  <option>Coconut Milk (Canned)</option>
                  <option>Dark Chocolate (70%)</option>
                  <option>Lamb Shoulder (Bone-in)</option>
                  <option>Garlic (Peeled)</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Quantity Received *</label>
                <input type="number" id="rs-qty" placeholder="e.g. 25" step="0.01" min="0.01" required>
              </div>

              <div class="form-grp">
                <label>Unit of Measure</label>
                <select id="rs-uom">
                  <option>kg</option>
                  <option>g</option>
                  <option>L</option>
                  <option>ml</option>
                  <option>units</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Batch Number *</label>
                <input type="text" id="rs-batch" placeholder="e.g. B-047" required>
              </div>

              <div class="form-grp">
                <label>Expiry Date</label>
                <input type="date" id="rs-expiry">
              </div>

              <div class="form-grp">
                <label>Supplier Name *</label>
                <input type="text" id="rs-supplier" placeholder="e.g. Negombo Sea Foods" required>
              </div>

              <div class="form-grp">
                <label>Invoice Number</label>
                <input type="text" id="rs-invoice" placeholder="e.g. INV-2026-0910">
              </div>

              <div class="form-grp">
                <label>Unit Cost (Rs.)</label>
                <input type="number" id="rs-cost" placeholder="e.g. 850.00" step="0.01" min="0">
              </div>

              <div class="form-grp">
                <label>Received Date *</label>
                <input type="date" id="rs-date" required>
              </div>

              <div class="form-grp form-full">
                <label>Remarks / Notes</label>
                <textarea id="rs-notes" placeholder="Any special notes about this delivery (e.g. partial shipment, quality issues…)"></textarea>
              </div>

            </div>

            <div style="display:flex;gap:12px;margin-top:6px;">
              <button type="submit" class="btn btn-primary">✓ Save Delivery</button>
              <button type="reset" class="btn btn-outline">✕ Clear Form</button>
            </div>
          </form>
        </div>

        <!-- Recent deliveries -->
        <div class="card">
          <div class="card-hdr"><h3>Recent Deliveries</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr><th>Ingredient</th><th>Batch</th><th>Qty</th><th>Supplier</th><th>Received On</th><th>By</th></tr>
              </thead>
              <tbody>
                <tr><td class="tbl-main">Fresh Prawns</td><td><span class="tbl-id">B-046</span></td><td>8 kg</td><td>Negombo Sea Foods</td><td>11/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Chicken (Whole)</td><td><span class="tbl-id">B-041</span></td><td>40 kg</td><td>Lakmal &amp; Sons Poultry</td><td>10/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Coconut Milk</td><td><span class="tbl-id">B-042</span></td><td>20 L</td><td>Araliya Foods</td><td>05/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Basmati Rice</td><td><span class="tbl-id">B-038</span></td><td>100 kg</td><td>Ceylon Agro Exports</td><td>08/08/2026</td><td>Nadeesha K.</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

    </main>
  </div><!-- /main-area -->
</div><!-- /dash -->

<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/store.js"></script>
</body>
</html>
