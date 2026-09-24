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
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
            </svg>
            <input id="ingredient-search" type="search" placeholder="Search ingredient name, SKU, zone, or supplier..." autocomplete="off">
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
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M4 16v1a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-1m-4-4-4 4-4-4m4 4V4"/>
              </svg>
              <span>Export CSV</span>
            </button>
            <button class="btn btn-primary toolbar-btn" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 4v16m8-8H4"/>
              </svg>
              <span>Add Ingredient</span>
            </button>
          </div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Ingredients</h3><span style="font-size:12px;color:var(--t3);">Showing 1–10 of 1,284</span></div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr data-category="Meat &amp; Seafood" data-status="low">
                  <th>Ingredient</th><th>Category</th><th>UOM</th>
                  <th>Min Stock</th><th>Current Stock</th><th>Status</th><th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr data-category="Dairy" data-status="low">
                  <td class="tbl-main">Fresh Salmon Fillet</td><td>Meat &amp; Seafood</td><td>kg</td>
                  <td>10</td><td style="color:var(--danger);font-weight:700;">2.5</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Meat &amp; Seafood" data-status="optimal">
                  <td class="tbl-main">Unsalted Butter</td><td>Dairy</td><td>kg</td>
                  <td>5</td><td style="color:var(--danger);font-weight:700;">0.8</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Dry Goods" data-status="optimal">
                  <td class="tbl-main">Chicken (Whole)</td><td>Meat &amp; Seafood</td><td>kg</td>
                  <td>20</td><td>35.5</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Spices &amp; Herbs" data-status="low">
                  <td class="tbl-main">Basmati Rice</td><td>Dry Goods</td><td>kg</td>
                  <td>50</td><td>88</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Dry Goods" data-status="optimal">
                  <td class="tbl-main">Fresh Curry Leaves</td><td>Spices &amp; Herbs</td><td>g</td>
                  <td>500</td><td style="color:var(--danger);font-weight:700;">50</td>
                  <td><span class="badge bg-red">Below Min</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Vegetables" data-status="low">
                  <td class="tbl-main">Coconut Milk (Canned)</td><td>Dry Goods</td><td>L</td>
                  <td>10</td><td>14</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Dry Goods" data-status="optimal">
                  <td class="tbl-main">Romaine Lettuce</td><td>Vegetables</td><td>kg</td>
                  <td>5</td><td>3.2</td>
                  <td><span class="badge bg-orange">Low</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Meat &amp; Seafood" data-status="low">
                  <td class="tbl-main">Dark Chocolate (70%)</td><td>Dry Goods</td><td>kg</td>
                  <td>3</td><td>6.5</td>
                  <td><span class="badge bg-green">In Stock</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td>
                </tr>
                <tr data-category="Spices &amp; Herbs" data-status="low">
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
        
        <div class="pm-overlay open">
          <div class="pm-model">
            <div class="pm-header">
              <h2>hello world</h2>
            </div>
            <div class="pm-body">
              <p>subtitle</p>
            </div>
            <div class="pm-footer">
              <button class="pm-btn pm-btn-cancel">cancel</button>
              <button class="pm-btn pm-btn-confirm">confirm</button>
            </div>
          </div>
        </div>
      </section>
