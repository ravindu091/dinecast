<section id="sec-ingredients" class="section active">
        <div class="sec-hdr">
          <h2>Ingredients</h2>
          <button class="btn btn-primary">+ Add Ingredient</button>
        </div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M14.25 3.104v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M4.2 15.3A2.25 2.25 0 003 17.33v.42A2.25 2.25 0 005.25 20h13.5A2.25 2.25 0 0021 17.75v-.42a2.25 2.25 0 00-1.2-2.03"/></svg></div><div class="stat-val">1,284</div><div class="stat-lbl">Total Ingredient Lines</div></div>
          <div class="stat c-red"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/></svg></div><div class="stat-val">12</div><div class="stat-lbl">Below Minimum</div></div>
          <div class="stat c-green"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l4 4L19 6"/></svg></div><div class="stat-val">1,264</div><div class="stat-lbl">In Stock (Normal)</div></div>
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
