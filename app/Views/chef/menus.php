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