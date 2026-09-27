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

          <!-- RECIPE LIST TABLE-->
          <div class="tab-pane active">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Recipe List</h3><span style="font-size:12px;color:var(--t3);">Click ▶ to view ingredients</span></div>
              <div class="tbl-wrap">
                <table>
                  <thead><tr><th></th><th>Menu Item</th><th>Menu</th><th>Ingredients</th><th>Per Guest (est.)</th><th>Actions</th></tr></thead>
                  <tbody>
                    <?php foreach ($recipes as $recipe): ?>
                    <tr>
                      <td><button class="expand-btn" onclick="toggleExpandRow(this,'recipe-row-<?= (int) $recipe['id'] ?>')">▶</button></td>
                      <td class="tbl-main"><?= htmlspecialchars($recipe['menu_item_name']) ?></td>
                      <td style="font-size:13px;color:var(--t2);"><?= htmlspecialchars($recipe['menu_name']) ?></td>
                      <td><?= (int) $recipe['ingredient_count'] ?></td>
                      <td>-</td>
                      <td>
                        <div class="acts">
                          <button type="button" class="act" onclick="openEditRecipe(<?= (int) $recipe['id'] ?>)">Edit</button>
                          <form method="post" action="<?= $baseUrl ?>/chef/recipes/delete/<?= (int) $recipe['id'] ?>" style="display:inline;">
                            <button type="submit" class="act del" style="border:0;background:none;padding:0;">Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    <tr class="expand-row" id="recipe-row-<?= (int) $recipe['id'] ?>">
                      <td colspan="6">
                        <div class="expand-inner">
                          <div class="expand-lbl">Ingredients per guest — <?= htmlspecialchars($recipe['menu_item_name']) ?></div>
                          <div class="tbl-wrap" style="margin:0;">
                            <table>
                              <thead><tr><th>Ingredient</th><th>Qty per Guest</th><th>UOM</th><th>Wastage Factor</th><th>Adjusted Qty</th></tr></thead>
                              <tbody>
                                <?php foreach ($recipe['lines'] as $line): ?>
                                <tr>
                                  <td><?= htmlspecialchars($line['ingredient_name']) ?></td>
                                  <td><?= htmlspecialchars($line['quantity_per_guest']) ?></td>
                                  <td><?= htmlspecialchars($line['uom']) ?></td>
                                  <td><?= htmlspecialchars($line['wastage_percent']) ?>%</td>
                                  <td><?= htmlspecialchars(number_format((float) $line['quantity_per_guest'] * (1 + ((float) $line['wastage_percent'] / 100)), 3, '.', '')) ?> <?= htmlspecialchars($line['uom']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Menu Items Missing Recipes TABLE -->
          <div class="tab-pane">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Menu Items Missing Recipes</h3></div>
              <div class="tbl-wrap">
                <table>
                  <thead><tr><th>Menu Item</th><th>Menu</th><th>Action</th></tr></thead>
                  <tbody>
                    <?php foreach ($missingRecipes as $missingRecipe): ?>
                    <tr>
                      <td class="tbl-main"><?= htmlspecialchars($missingRecipe['menu_item_name']) ?></td>
                      <td style="font-size:13px;color:var(--t2);"><?= htmlspecialchars($missingRecipe['menu_name']) ?></td>
                      <td>
                        <button class="btn btn-primary btn-sm" onclick="toggleModal('modal-add-recipe')">Create Recipe</button>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Add Recipe Modal -->
        <div class="modal-overlay" id="modal-add-recipe" onclick="if(event.target===this)toggleModal('modal-add-recipe')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Add Recipe</h3>
              <button type="button" class="modal-close" onclick="toggleModal('modal-add-recipe')">✕</button>
            </div>

            <form method="post" action="<?= $baseUrl ?>/chef/recipes/create">
              <div class="form-grid">
                <div class="form-grp form-full">
                  <label for="recipe-menu-item">Menu Item *</label>
                  <select id="recipe-menu-item" name="menu_item_id" required>
                    <option value="">Select a menu item</option>
                    <?php foreach (($menuItems ?? []) as $menuItem): ?>
                      <option value="<?= (int) $menuItem['id'] ?>">
                        <?= htmlspecialchars($menuItem['menu_name'] . ' - ' . $menuItem['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div style="margin:12px 0;font-size:13px;font-weight:700;color:var(--t1);">Ingredients per guest</div>
              <div id="recipe-lines" style="display:flex;flex-direction:column;gap:8px;">
                <div class="recipe-line" style="display:grid;grid-template-columns:1fr 80px 80px 80px 28px;gap:8px;align-items:center;">
                  <select name="ingredient_id[]" required>
                    <option value="">Ingredient</option>
                    <?php foreach (($ingredients ?? []) as $ingredient): ?>
                      <option value="<?= (int) $ingredient['id'] ?>">
                        <?= htmlspecialchars($ingredient['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <input name="quantity_per_guest[]" type="number" min="0.001" step="0.001" placeholder="Qty" required>
                  <select name="uom[]" required>
                    <option value="g">g</option>
                    <option value="kg">kg</option>
                    <option value="ml">ml</option>
                    <option value="L">L</option>
                    <option value="pcs">pcs</option>
                  </select>
                  <input name="wastage_percent[]" type="number" min="0" max="100" step="0.01" placeholder="Waste %">
                  <button type="button" class="remove-recipe-line" aria-label="Remove ingredient">✕</button>
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

        <!-- Edit Recipe Modal -->
        <div class="modal-overlay" id="modal-edit-recipe" onclick="if(event.target===this)toggleModal('modal-edit-recipe')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Edit Recipe</h3>
              <button type="button" class="modal-close" onclick="toggleModal('modal-edit-recipe')">✕</button>
            </div>

            <form id="edit-recipe-form" method="post">
              <div class="form-grid">
                <div class="form-grp form-full">
                  <label for="edit-recipe-menu-item">Menu Item *</label>
                  <select id="edit-recipe-menu-item" name="menu_item_id" required>
                    <option value="">Select a menu item</option>
                    <?php foreach (($menuItems ?? []) as $menuItem): ?>
                      <option value="<?= (int) $menuItem['id'] ?>">
                        <?= htmlspecialchars($menuItem['menu_name'] . ' - ' . $menuItem['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div style="margin:12px 0;font-size:13px;font-weight:700;color:var(--t1);">Ingredients per guest</div>
              <div id="edit-recipe-lines" style="display:flex;flex-direction:column;gap:8px;"></div>

              <button type="button" class="btn btn-outline btn-sm" style="margin-top:10px;" onclick="addRecipeLine('edit-recipe-lines')">+ Add Ingredient</button>
              <div style="display:flex;gap:10px;margin-top:16px;">
                <button type="submit" class="btn btn-primary">Update Recipe</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-edit-recipe')">Cancel</button>
              </div>
            </form>
          </div>
        </div>

        <script>
          window.recipeData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
          window.recipeUpdateUrl = <?= json_encode($baseUrl . '/chef/recipes/update/') ?>;
        </script>
      </section>