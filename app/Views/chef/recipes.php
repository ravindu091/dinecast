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