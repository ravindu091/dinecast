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
