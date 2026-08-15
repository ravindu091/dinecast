<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Chef Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/chef.css">
</head>
<body>
<div class="dash">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Kitchen</div>
    <nav>
      <div class="nav-link active" data-section="sec-home" data-title="Chef Dashboard">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
        <span class="nav-label">Home</span>
      </div>
      <div class="nav-link" data-section="sec-menus" data-title="Menus">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="2"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg></span>
        <span class="nav-label">Menus</span>
      </div>
      <div class="nav-link" data-section="sec-recipes" data-title="Recipes">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 0 1 10 10H2A10 10 0 0 1 12 2z"/><path d="M2 12h20M12 2v10"/></svg></span>
        <span class="nav-label">Recipes</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar" style="background:var(--warning-bg);color:var(--warning);">CS</div>
        <div>
          <div class="sb-user-name">Chef Sudath</div>
          <div class="sb-user-role">Chef</div>
        </div>
      </div>
      <div class="sb-logout" onclick="logout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Logout
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main-area">
    <header class="topbar">
      <div class="topbar-left">
        <h1>Chef Dashboard</h1>
        <p>Manage menus and recipes</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></button>
      </div>
    </header>

    <main class="content">

      <!-- HOME -->
      <section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>What would you like to work on?</h2>
            <p>Logged in as Chef Sudath. Manage your menus and recipes below.</p>
            <div class="user-id">ID: DC-CHF-42 &nbsp;·&nbsp; Chef</div>
          </div>
          <div class="welcome-illo">👨‍🍳</div>
        </div>

        <!-- Big Action Cards (as shown in wireframe) -->
        <div class="action-cards">
          <div class="action-card" onclick="document.querySelector('[data-section=sec-menus]').click()">
            <div class="ac-icon">🍽️</div>
            <div class="ac-title">Menus</div>
            <div class="ac-badge">12 active menus</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-recipes]').click()">
            <div class="ac-icon">📖</div>
            <div class="ac-title">Recipes</div>
            <div class="ac-badge warn">3 menu items missing recipes</div>
          </div>
        </div>

        <!-- Stats -->
        <div class="stats" style="margin-top:0;">
          <div class="stat c-green"><div class="stat-ico">🍽️</div><div class="stat-val">4</div><div class="stat-lbl">Active Menus</div></div>
          <div class="stat c-blue"><div class="stat-ico">📖</div><div class="stat-val">10</div><div class="stat-lbl">Total Recipes</div></div>
          <div class="stat c-orange"><div class="stat-ico">⚠️</div><div class="stat-val">2</div><div class="stat-lbl">Menus Without Recipe</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">2</div><div class="stat-lbl">Items Still Missing One</div></div>
        </div>
      </section>

      <!-- MENUS -->
      <section id="sec-menus" class="section">
        <div class="sec-hdr">
          <h2>Menus</h2>
          <button class="btn btn-primary" onclick="toggleModal('modal-add-menu')">+ New Menu</button>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Menus</h3><span style="font-size:12px;color:var(--t3);">12 menus total</span></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Menu Name</th><th>Type</th><th>Items</th><th>Recipes Complete</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td class="tbl-main">Wedding Banquet Menu A</td>
                  <td style="color:var(--t2);font-size:13px;">Wedding</td>
                  <td>8</td>
                  <td><span class="badge bg-green">8 / 8</span></td>
                  <td><span class="badge bg-green">Active</span></td>
                  <td><div class="acts"><span class="act" onclick="document.querySelector('[data-section=sec-recipes]').click()">View Recipes</span><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Corporate Lunch Set</td>
                  <td style="color:var(--t2);font-size:13px;">Corporate</td>
                  <td>5</td>
                  <td><span class="badge bg-green">5 / 5</span></td>
                  <td><span class="badge bg-green">Active</span></td>
                  <td><div class="acts"><span class="act" onclick="document.querySelector('[data-section=sec-recipes]').click()">View Recipes</span><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Festive Dinner Buffet</td>
                  <td style="color:var(--t2);font-size:13px;">Festive</td>
                  <td>12</td>
                  <td><span class="badge bg-orange">10 / 12</span></td>
                  <td><span class="badge bg-green">Active</span></td>
                  <td><div class="acts"><span class="act" onclick="document.querySelector('[data-section=sec-recipes]').click()">View Recipes</span><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Cocktail Party Bites</td>
                  <td style="color:var(--t2);font-size:13px;">Cocktail</td>
                  <td>6</td>
                  <td><span class="badge bg-red">4 / 6</span></td>
                  <td><span class="badge bg-green">Active</span></td>
                  <td><div class="acts"><span class="act" onclick="document.querySelector('[data-section=sec-recipes]').click()">View Recipes</span><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr>
                  <td class="tbl-main">Simple Seminar Pack</td>
                  <td style="color:var(--t2);font-size:13px;">Seminar</td>
                  <td>4</td>
                  <td><span class="badge bg-green">4 / 4</span></td>
                  <td><span class="badge bg-gray">Inactive</span></td>
                  <td><div class="acts"><span class="act" onclick="document.querySelector('[data-section=sec-recipes]').click()">View Recipes</span><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add Menu Modal -->
        <div class="modal-overlay" id="modal-add-menu" onclick="if(event.target===this)toggleModal('modal-add-menu')">
          <div class="modal">
            <div class="modal-hdr"><h3>Create New Menu</h3><button class="modal-close" onclick="toggleModal('modal-add-menu')">✕</button></div>
            <form onsubmit="submitForm(event,'Menu created!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Menu Name *</label><input type="text" placeholder="e.g. Wedding Banquet Deluxe" required></div>
                <div class="form-grp"><label>Menu Type</label><select><option>Wedding</option><option>Corporate</option><option>Festive</option><option>Seminar</option><option>Birthday</option><option>Cocktail</option><option>Other</option></select></div>
                <div class="form-grp"><label>Status</label><select><option>Active</option><option>Inactive</option></select></div>
                <div class="form-grp form-full"><label>Description</label><textarea placeholder="Describe this menu…"></textarea></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Menu</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-menu')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- RECIPES -->
      <section id="sec-recipes" class="section">
        <div class="sec-hdr">
          <h2>Recipes</h2>
          <button class="btn btn-primary" onclick="toggleModal('modal-add-recipe')">+ New Recipe</button>
        </div>

        <!-- Filter by menu -->
        <div class="filter-bar">
          <select style="padding:9px 14px;border:1.5px solid var(--border);border-radius:var(--r-sm);font-size:14px;font-family:inherit;outline:none;min-width:240px;">
            <option>All Menus</option>
            <option>Wedding Banquet Menu A</option>
            <option>Corporate Lunch Set</option>
            <option>Festive Dinner Buffet</option>
            <option>Cocktail Party Bites</option>
          </select>
        </div>

        <div class="tab-group">
          <div class="tabs">
            <button class="tab active">All Recipes</button>
            <button class="tab">Missing Recipes</button>
          </div>

          <div class="tab-pane active">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Recipe List</h3><span style="font-size:12px;color:var(--t3);">Click ▶ to view ingredients</span></div>
              <div class="tbl-wrap">
                <table>
                  <thead><tr><th></th><th>Menu Item</th><th>Menu</th><th>Ingredients</th><th>Per Guest (est.)</th><th>Actions</th></tr></thead>
                  <tbody>
                    <tr>
                      <td><button class="expand-btn" onclick="toggleExpandRow(this,'rec-row-1')">▶</button></td>
                      <td class="tbl-main">Grilled Chicken</td>
                      <td style="font-size:13px;color:var(--t2);">Wedding Banquet Menu A</td>
                      <td>5</td>
                      <td>Rs. 180</td>
                      <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                    </tr>
                    <tr class="expand-row" id="rec-row-1">
                      <td colspan="6">
                        <div class="expand-inner">
                          <div class="expand-lbl">Ingredients per guest — Grilled Chicken</div>
                          <div class="tbl-wrap" style="margin:0;">
                            <table>
                              <thead><tr><th>Ingredient</th><th>Qty per Guest</th><th>UOM</th><th>Wastage Factor</th><th>Adjusted Qty</th></tr></thead>
                              <tbody>
                                <tr><td>Chicken (Whole)</td><td>250</td><td>g</td><td>12%</td><td>280 g</td></tr>
                                <tr><td>Garlic (Peeled)</td><td>5</td><td>g</td><td>5%</td><td>5.25 g</td></tr>
                                <tr><td>Lemon</td><td>0.25</td><td>pcs</td><td>3%</td><td>0.26 pcs</td></tr>
                                <tr><td>Olive Oil</td><td>15</td><td>ml</td><td>3%</td><td>15.5 ml</td></tr>
                                <tr><td>Mixed Herbs</td><td>3</td><td>g</td><td>5%</td><td>3.15 g</td></tr>
                              </tbody>
                            </table>
                          </div>
                          <button class="btn btn-outline btn-sm" style="margin-top:10px;" onclick="toggleModal('modal-add-recipe')">+ Add Ingredient Line</button>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><button class="expand-btn" onclick="toggleExpandRow(this,'rec-row-2')">▶</button></td>
                      <td class="tbl-main">Basmati Rice</td>
                      <td style="font-size:13px;color:var(--t2);">Wedding Banquet Menu A</td>
                      <td>3</td>
                      <td>Rs. 40</td>
                      <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                    </tr>
                    <tr class="expand-row" id="rec-row-2">
                      <td colspan="6">
                        <div class="expand-inner">
                          <div class="expand-lbl">Ingredients per guest — Basmati Rice</div>
                          <div class="tbl-wrap" style="margin:0;">
                            <table>
                              <thead><tr><th>Ingredient</th><th>Qty per Guest</th><th>UOM</th><th>Wastage Factor</th><th>Adjusted Qty</th></tr></thead>
                              <tbody>
                                <tr><td>Basmati Rice</td><td>200</td><td>g</td><td>3%</td><td>206 g</td></tr>
                                <tr><td>Coconut Milk</td><td>50</td><td>ml</td><td>3%</td><td>51.5 ml</td></tr>
                                <tr><td>Fresh Curry Leaves</td><td>2</td><td>g</td><td>5%</td><td>2.1 g</td></tr>
                              </tbody>
                            </table>
                          </div>
                          <button class="btn btn-outline btn-sm" style="margin-top:10px;" onclick="toggleModal('modal-add-recipe')">+ Add Ingredient Line</button>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><button class="expand-btn" onclick="toggleExpandRow(this,'rec-row-3')">▶</button></td>
                      <td class="tbl-main">Prawn Cocktail</td>
                      <td style="font-size:13px;color:var(--t2);">Cocktail Party Bites</td>
                      <td>4</td>
                      <td>Rs. 320</td>
                      <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                    </tr>
                    <tr class="expand-row" id="rec-row-3">
                      <td colspan="6">
                        <div class="expand-inner">
                          <div class="expand-lbl">Ingredients per guest — Prawn Cocktail</div>
                          <div class="tbl-wrap" style="margin:0;">
                            <table>
                              <thead><tr><th>Ingredient</th><th>Qty per Guest</th><th>UOM</th><th>Wastage Factor</th><th>Adjusted Qty</th></tr></thead>
                              <tbody>
                                <tr><td>Fresh Prawns</td><td>80</td><td>g</td><td>12%</td><td>89.6 g</td></tr>
                                <tr><td>Heavy Cream</td><td>20</td><td>ml</td><td>5%</td><td>21 ml</td></tr>
                                <tr><td>Lemon</td><td>0.1</td><td>pcs</td><td>3%</td><td>0.10 pcs</td></tr>
                                <tr><td>Parmesan Cheese</td><td>15</td><td>g</td><td>8%</td><td>16.2 g</td></tr>
                              </tbody>
                            </table>
                          </div>
                          <button class="btn btn-outline btn-sm" style="margin-top:10px;" onclick="toggleModal('modal-add-recipe')">+ Add Ingredient Line</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="tab-pane">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Menu Items Missing Recipes</h3></div>
              <div class="tbl-wrap">
                <table>
                  <thead><tr><th>Menu Item</th><th>Menu</th><th>Action</th></tr></thead>
                  <tbody>
                    <tr><td class="tbl-main">Chocolate Mousse</td><td style="font-size:13px;color:var(--t2);">Festive Dinner Buffet</td><td><button class="btn btn-primary btn-sm" onclick="toggleModal('modal-add-recipe')">Create Recipe</button></td></tr>
                    <tr><td class="tbl-main">Vegetable Spring Roll</td><td style="font-size:13px;color:var(--t2);">Festive Dinner Buffet</td><td><button class="btn btn-primary btn-sm" onclick="toggleModal('modal-add-recipe')">Create Recipe</button></td></tr>
                    <tr><td class="tbl-main">Bruschetta Bites</td><td style="font-size:13px;color:var(--t2);">Cocktail Party Bites</td><td><button class="btn btn-primary btn-sm" onclick="toggleModal('modal-add-recipe')">Create Recipe</button></td></tr>
                    <tr><td class="tbl-main">Cheese &amp; Crackers Platter</td><td style="font-size:13px;color:var(--t2);">Cocktail Party Bites</td><td><button class="btn btn-primary btn-sm" onclick="toggleModal('modal-add-recipe')">Create Recipe</button></td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Add Recipe Modal -->
        <div class="modal-overlay" id="modal-add-recipe" onclick="if(event.target===this)toggleModal('modal-add-recipe')">
          <div class="modal">
            <div class="modal-hdr"><h3>Add / Edit Recipe</h3><button class="modal-close" onclick="toggleModal('modal-add-recipe')">✕</button></div>
            <form onsubmit="submitForm(event,'Recipe saved!')">
              <div class="form-grid">
                <div class="form-grp"><label>Menu *</label><select required><option>Wedding Banquet Menu A</option><option>Cocktail Party Bites</option><option>Festive Dinner Buffet</option></select></div>
                <div class="form-grp"><label>Menu Item *</label><input type="text" placeholder="e.g. Grilled Chicken" required></div>
              </div>
              <div style="margin:12px 0;font-size:13px;font-weight:700;color:var(--t1);">Ingredient Lines</div>
              <div style="display:flex;flex-direction:column;gap:8px;" id="recipe-lines">
                <div style="display:grid;grid-template-columns:1fr 80px 80px 80px 28px;gap:8px;align-items:center;">
                  <select><option>Fresh Salmon Fillet</option><option>Chicken (Whole)</option><option>Basmati Rice</option><option>Garlic (Peeled)</option></select>
                  <input type="number" placeholder="Qty" step="0.01">
                  <select><option>g</option><option>kg</option><option>ml</option><option>L</option><option>pcs</option></select>
                  <input type="number" placeholder="Waste%" step="1" max="50">
                  <button type="button" style="background:var(--danger-bg);color:var(--danger);border:none;border-radius:6px;cursor:pointer;padding:4px 8px;" onclick="this.closest('div').remove()">✕</button>
                </div>
              </div>
              <button type="button" class="btn btn-outline btn-sm" style="margin-top:10px;" onclick="addRecipeLine()">+ Add Ingredient</button>
              <div style="display:flex;gap:10px;margin-top:16px;">
                <button type="submit" class="btn btn-primary">Save Recipe</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-recipe')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/chef.js"></script>

</body>
</html>
