      <!-- ================================================
           HOME SECTION
           ================================================ -->
      <section id="sec-home" class="section active">

        <div class="welcome">
          <div class="welcome-txt">
            <?php $fullName = $_SESSION['fullName'] ?? 'User';?>
            <h2>Welcome back, <?= htmlspecialchars($fullName) ?></h2>
            <p>Here's a snapshot of your store today.</p>
            <div class="user-id">Store Manager</div>
          </div>
          <div class="welcome-illo">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M3 10h18M5 10v10h14V10M4 10l1-6h14l1 6M8 20v-5h8v5M9 7h.01M12 7h.01M15 7h.01"/>
            </svg>
          </div>
        </div>

        <!-- KPI Stats -->
        <div class="metric-stats">

          <!-- Low Stock -->
          <article class="metric-card metric-card-red">
            <div class="metric-value">08</div>
            <div class="metric-label">Low Stock Items</div>
            <div class="metric-footer">
              <span>Ingredients below par threshold</span>
              <strong>+2 vs yest</strong>
            </div>
          </article>

          <!-- Expiring Soon -->
          <article class="metric-card metric-card-orange">
            <div class="metric-value">05</div>
            <div class="metric-label">Expiring Soon</div>
            <div class="metric-footer">
              <span>Batches approaching expiry (&lt;48h)</span>
              <strong>FIFO Action</strong>
            </div>
          </article>

          <!-- Pending Receive -->
          <article class="metric-card metric-card-blue">
            <div class="metric-value">06</div>
            <div class="metric-label">Pending Receive</div>
            <div class="metric-footer">
              <span>Inbound shipments awaiting intake</span>
              <strong>Active POs</strong>
            </div>
          </article>

          <!-- Pending Issues -->
          <article class="metric-card metric-card-green">
            <div class="metric-value">04</div>
            <div class="metric-label">Pending Issues</div>
            <div class="metric-footer">
              <span>Kitchen ingredient fulfillment queues</span>
              <strong>Requisitions</strong>
            </div>
          </article>

        </div>

        <!-- Grid: Low Stock Alerts + Quick Links -->
        <div class="grid-2">

          <!-- Attention Required -->
          <div class="card attn-card">
            <div class="attn-card-hdr">
              <div class="attn-card-hdr-left">
                <span class="attn-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </span>
                <div>
                  <div class="attn-title">Attention Required</div>
                  <div class="attn-subtitle">5 items require immediate manager authorization</div>
                </div>
              </div>
              <a href="#" class="attn-view-all">View All Alerts (8) ↗</a>
            </div>

            <div class="attn-list">

              <!-- Item 1 — Critical Deficit (red dot) -->
              <div class="attn-item">
                <span class="attn-dot attn-dot-red"></span>
                <div class="attn-body">
                  <div class="attn-item-top">
                    <span class="attn-item-name">Chicken Breast (Fresh)</span>
                    <span class="attn-badge attn-badge-red">Critical Deficit</span>
                    <span class="attn-sku">SKU-PRT-012</span>
                  </div>
                  <div class="attn-item-desc">5.00 kg remaining • Safety Minimum: 10.00 kg <span class="attn-highlight-red">(Deficit −50%)</span></div>
                </div>
                <button class="attn-btn attn-btn-outline">View Inventory ›</button>
              </div>

              <!-- Item 2 — Expiring (red dot) -->
              <div class="attn-item">
                <span class="attn-dot attn-dot-red"></span>
                <div class="attn-body">
                  <div class="attn-item-top">
                    <span class="attn-item-name">Fresh Prawns (Jumbo Grade)</span>
                    <span class="attn-badge attn-badge-orange">Expires 24 Sep</span>
                  </div>
                  <div class="attn-item-desc">Batch #BAT-8824 &nbsp;·&nbsp; Batch of 8.2 kg expires in <strong>22 hours</strong> · Cold Room Zone 02</div>
                </div>
                <button class="attn-btn attn-btn-outline">View Batch ›</button>
              </div>

              <!-- Item 3 — Pending PO (orange dot) -->
              <div class="attn-item">
                <span class="attn-dot attn-dot-orange"></span>
                <div class="attn-body">
                  <div class="attn-item-top">
                    <span class="attn-item-name">PO-2026-0042 · Cargills Food City</span>
                    <span class="attn-badge attn-badge-blue">At Loading Bay 2</span>
                  </div>
                  <div class="attn-item-desc">Delivery arrived at 08:45 AM • 8 items pending physical inspection &amp; temp check</div>
                </div>
                <button class="attn-btn attn-btn-primary">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                  Inspect PO
                </button>
              </div>

              <!-- Item 4 — Requisition (orange dot) -->
              <div class="attn-item">
                <span class="attn-dot attn-dot-orange"></span>
                <div class="attn-body">
                  <div class="attn-item-top">
                    <span class="attn-item-name">REQ-2026-0042 · Main Hot Kitchen</span>
                    <span class="attn-badge attn-badge-green">Lunch Service</span>
                  </div>
                  <div class="attn-item-desc">Chef Sudath requested 5 ingredient lines (18.4 kg) for 11:30 AM Service</div>
                </div>
                <button class="attn-btn attn-btn-outline">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                  Review &amp; Issue
                </button>
              </div>

              <!-- Item 5 — Buffer Zone (orange dot) -->
              <div class="attn-item">
                <span class="attn-dot attn-dot-orange"></span>
                <div class="attn-body">
                  <div class="attn-item-top">
                    <span class="attn-item-name">Basmati Rice (Grade AAA)</span>
                    <span class="attn-badge attn-badge-gray">Buffer Zone</span>
                  </div>
                  <div class="attn-item-desc">12.00 kg remaining • Suggested re-order batch: 50.00 kg (Supplier: Keells)</div>
                </div>
                <button class="attn-btn attn-btn-outline">View Item ›</button>
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
                  <div class="ql-title">Issue Stock</div>
                  <div class="ql-sub">Review approved PRs</div>
                </div>
                <div class="ql-arrow">›</div>
              </div>
            </div>

            <!-- Near Expiry -->
            <div style="margin-top:18px;">
              <div class="filter-ttl">
                <svg class="inline-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Near Expiry (Within 7 Days)
              </div>
              <div class="expiry-list">
                <div class="expiry-item expiry-item--warn">
                  <span class="expiry-item-name">Coconut Milk (Batch B-042)</span>
                  <span class="badge bg-orange">Exp: 29 Sep</span>
                </div>
                <div class="expiry-item expiry-item--warn">
                  <span class="expiry-item-name">Sour Cream (Batch B-039)</span>
                  <span class="badge bg-orange">Exp: 30 Sep</span>
                </div>
                <div class="expiry-item expiry-item--crit">
                  <span class="expiry-item-name">Fresh Prawns (Batch B-046)</span>
                  <span class="badge bg-red">Exp: 29 Sep</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
