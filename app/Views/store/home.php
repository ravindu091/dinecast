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
          <div class="welcome-illo">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M3 10h18M5 10v10h14V10M4 10l1-6h14l1 6M8 20v-5h8v5M9 7h.01M12 7h.01M15 7h.01"/>
            </svg>
          </div>
        </div>

        <!-- KPI Stats -->
        <div class="stats">
          <div class="stat c-blue">
            <div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.942A4.5 4.5 0 0115.918 17H8.082a4.5 4.5 0 01-2.312-.758L4.2 15.3m15.6 0A2.25 2.25 0 0021 13.37V9.75a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9.75v3.62c0 .878.508 1.67 1.2 2.03"/></svg></div>
            <div class="stat-val">1,284</div>
            <div class="stat-lbl">Total Ingredient Lines</div>
          </div>
          <div class="stat c-red">
            <div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/></svg></div>
            <div class="stat-val">12</div>
            <div class="stat-lbl">Below Minimum Stock</div>
          </div>
          <div class="stat c-orange">
            <div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
            <div class="stat-val">8</div>
            <div class="stat-lbl">Near Expiry (7 days)</div>
          </div>
          <div class="stat c-green">
            <div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg></div>
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
                <h3><span class="status-dot danger" aria-hidden="true"></span>Low Stock Alerts</h3>
                <p>Items requiring immediate attention</p>
              </div>
              <button class="btn btn-outline btn-sm" onclick="document.querySelector('[data-section=sec-inventory]').click()">View Inventory</button>
            </div>
            <div class="stock-alerts">
              <div class="stock-alert">
                <div class="stock-alert-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12c3-4 8-5 14-3l4-2-1 4 1 4-4-2c-6 2-11 1-14-1z"/><path d="M7 10v4M16 9v6"/></svg></div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Fresh Salmon Fillet</div>
                  <div class="stock-alert-desc">Current: 2.5 kg &nbsp;·&nbsp; Minimum: 10 kg</div>
                </div>
                <div class="stock-shortfall">-7.5 kg</div>
              </div>
              <div class="stock-alert">
                <div class="stock-alert-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 9h16v10H4zM7 9V6h10v3M8 13h8"/></svg></div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Unsalted Butter</div>
                  <div class="stock-alert-desc">Current: 0.8 kg &nbsp;·&nbsp; Minimum: 5 kg</div>
                </div>
                <div class="stock-shortfall">-4.2 kg</div>
              </div>
              <div class="stock-alert">
                <div class="stock-alert-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 4C10 4 5 8 5 14c0 3 2 5 5 5 6 0 10-5 10-15zM4 20c2-4 5-7 10-10"/></svg></div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Fresh Curry Leaves</div>
                  <div class="stock-alert-desc">Current: 50 g &nbsp;·&nbsp; Minimum: 500 g</div>
                </div>
                <div class="stock-shortfall">-450 g</div>
              </div>
              <div class="stock-alert warn">
                <div class="stock-alert-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 5c2 0 4 2 4 4 0 2-1 3-3 4-2 1-3 3-5 4-3 2-7 0-7-3 0-2 2-3 4-4 2-1 3-5 7-5z"/><circle cx="9" cy="15" r="1"/></svg></div>
                <div class="stock-alert-body">
                  <div class="stock-alert-name">Lamb (Bone-in)</div>
                  <div class="stock-alert-desc">Current: 4 kg &nbsp;·&nbsp; Minimum: 6 kg</div>
                </div>
                <div class="stock-shortfall">-2 kg</div>
              </div>
              <div class="stock-alert warn">
                <div class="stock-alert-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c-3 2-5 5-5 9 0 5 2 8 5 9 3-1 5-4 5-9 0-4-2-7-5-9zM9 7c1 1 2 2 3 2s2-1 3-2"/></svg></div>
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
                <div class="ql-icon" style="background:var(--success-bg);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg></div>
                <div>
                  <div class="ql-title">Receive Stock</div>
                  <div class="ql-sub">Log incoming deliveries</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-ingredients]').click()">
                <div class="ql-icon" style="background:var(--info-bg);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M14.25 3.104v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M4.2 15.3A2.25 2.25 0 003 17.33v.42A2.25 2.25 0 005.25 20h13.5A2.25 2.25 0 0021 17.75v-.42a2.25 2.25 0 00-1.2-2.03"/></svg></div>
                <div>
                  <div class="ql-title">Ingredients</div>
                  <div class="ql-sub">View all ingredient records</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-inventory]').click()">
                <div class="ql-icon" style="background:var(--warning-bg);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
                <div>
                  <div class="ql-title">Inventory</div>
                  <div class="ql-sub">View batches &amp; expiry dates</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-purchase-orders]').click()">
                <div class="ql-icon" style="background:var(--purple-bg);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
                <div>
                  <div class="ql-title">Purchase Orders</div>
                  <div class="ql-sub">Review approved PRs</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
            </div>

            <!-- Near Expiry -->
            <div style="margin-top:18px;">
              <div style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;color:var(--t3);margin-bottom:12px;"><svg class="inline-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Near Expiry (Within 7 Days)</div>
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
