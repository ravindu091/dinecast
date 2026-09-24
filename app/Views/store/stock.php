<!-- ================================================
           RECEIVE STOCK SECTION (DASHBOARD)
           ================================================ -->
<section id="sec-receive" class="section active">
  <div class="rs-dashboard">

    <!-- Dashboard Header -->
    <div class="sec-hdr">
      <h2>Receive Stocks</h2>
      <p>Inbound inspection, purchase order verification, and stock intake logging.</p>
    </div>

    <!-- Metrics Cards -->
    <div class="stats metric-stats">

      <article class="metric-card metric-card-blue">
        <div class="metric-value">26</div>
        <div class="metric-label">Total POs This Month</div>
        <div class="metric-footer">
          <span>From 8 active<br>suppliers</span>
          <strong>+4 this<br>week</strong>
        </div>
      </article>

      <article class="metric-card metric-card-orange">
        <div class="metric-value">06</div>
        <div class="metric-label">Awaiting Inspection</div>
        <div class="metric-footer">
          <span>inbound shipments<br>pending intake</span>
          <strong>Pending<br>Review</strong>
        </div>
      </article>

      <article class="metric-card metric-card-green">
        <div class="metric-value">18</div>
        <div class="metric-label">Approved</div>
        <div class="metric-footer">
          <span>verified and added<br>to inventory</span>
          <strong>Received<br>to Stock</strong>
        </div>
      </article>

      <article class="metric-card metric-card-red">
        <div class="metric-value">02</div>
        <div class="metric-label">Rejected</div>
        <div class="metric-footer">
          <span>shortage/damage<br>rejections</span>
          <strong>Disputed /<br>Returned</strong>
        </div>
      </article>

    </div>


    <!-- Main Table Card -->
    <div class="tab-group" style="margin-top:32px;">
      <div class="tabs" style="margin-bottom:12px;">
        <button class="tab active" style="display:flex; align-items:center; gap:8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <circle cx="10" cy="13" r="2"></circle>
            <path d="m14 17-2-2"></path>
          </svg>
          Awaiting Inspection <span class="rs-tab-count">6</span>
        </button>
        <button class="tab" style="display:flex; align-items:center; gap:8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
          </svg>
          Past Purchase Orders <span class="rs-tab-count" style="background:#f1f5f9;color:#475569;">20</span>
        </button>
      </div>

      <div class="tab-pane active">
        <div class="card" style="margin-bottom:0;">
          <div class="inventory-toolbar">
            <label class="inventory-search">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
              </svg>
              <input type="search" placeholder="Search PO / Supplier..." autocomplete="off">
            </label>
            <div class="inventory-filters">
              <span style="font-size:14px;color:var(--store-muted);display:flex;align-items:center;gap:6px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg> Filters:
              </span>
              <label class="inventory-sort">
                <select aria-label="Status">
                  <option>All Statuses</option>
                </select>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path d="m6 9 6 6 6-6" />
                </svg>
              </label>
              <label class="inventory-sort">
                <select aria-label="Dates">
                  <option>All Dates</option>
                </select>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path d="m6 9 6 6 6-6" />
                </svg>
              </label>
              <button class="btn btn-primary toolbar-btn" type="button"
                style="background:#065f46; border-color:#065f46; padding-top:8px; padding-bottom:8px;" data-popup-target="msr-overlay">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                <span>Receive Stock Manually</span>
              </button>
            </div>
          </div>

          <div class="tbl-wrap">
            <table>
              <thead>
                <tr>
                  <th>PO ID</th>
                  <th>SUPPLIER</th>
                  <th>PO DATE</th>
                  <th>ARRIVED</th>
                  <th>ITEMS</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>PO-2026-0042</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Cargills Food City
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>18 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>22 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge">8 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
                <tr>
                  <td>PO-2026-0041</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Keells Supplies
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>20 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>22 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge">5 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
                <tr>
                  <td>PO-2026-0040</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Prima Flour Mills
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>19 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>21 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge" style="background:#eff6ff;color:#3b82f6;">12 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
                <tr>
                  <td>PO-2026-0039</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Lanka Fresh Produce
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>19 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>21 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge">9 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
                <tr>
                  <td>PO-2026-0036</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Ceylon Dairy Direct
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>17 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>20 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge">6 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
                <tr>
                  <td>PO-2026-0034</td>
                  <td>
                    <div class="rs-sup-col">
                      <div class="rs-sup-dot"></div> Global Seafoods Ltd
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>16 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td>
                    <div class="rs-date-col">
                      <span>20 Sep</span>
                      <span class="rs-date-year">2026</span>
                    </div>
                  </td>
                  <td><span class="rs-items-badge">4 Items</span></td>
                  <td><span class="rs-status-badge">
                      <div class="rs-sup-dot" style="width:4px;height:4px;background:#b45309;"></div> Awaiting
                      Inspection
                    </span></td>
                  <td><button class="rs-btn-action" data-popup-target="batch-popup-overlay"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 14l2 2 4-4"></path>
                      </svg> Inspect</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== TAB 2: Past Purchase Orders ===== -->
      <div class="tab-pane" style="display:none;">
        <div class="card" style="margin-bottom:0;">
          <div class="inventory-toolbar">
            <label class="inventory-search">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
              </svg>
              <input type="search" placeholder="Search PO / Supplier..." autocomplete="off">
            </label>
            <div class="inventory-filters">
              <span style="font-size:14px;color:var(--store-muted);display:flex;align-items:center;gap:6px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg> Filters:
              </span>
              <label class="inventory-sort">
                <select aria-label="Status">
                  <option>All Statuses</option>
                </select>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path d="m6 9 6 6 6-6" />
                </svg>
              </label>
              <label class="inventory-sort">
                <select aria-label="Dates">
                  <option>All Dates</option>
                </select>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path d="m6 9 6 6 6-6" />
                </svg>
              </label>
            </div>
          </div>

          <div class="tbl-wrap">
            <table>
              <thead>
                <tr>
                  <th>PO ID</th>
                  <th>SUPPLIER</th>
                  <th>ORDER<br>DATE</th>
                  <th>ARRIVAL<br>DATE</th>
                  <th>DECISION<br>DATE</th>
                  <th>ITEMS</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-weight:600;color:#0f766e;">PO-2026-<br>0038</td>
                  <td style="font-weight:500;">Cargills Food<br>City</td>
                  <td>
                    <div class="rs-date-col"><span>14 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td>
                    <div class="rs-date-col"><span>18 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td style="color:#64748b;font-weight:500;">18 Sep 2026</td>
                  <td><span class="rs-items-badge"
                      style="background:#eff6ff;color:#3b82f6;display:inline-block;text-align:center;line-height:1.2;padding:6px 12px;font-weight:600;">8<br><span
                        style="font-size:10px;font-weight:500;">Items</span></span></td>
                  <td>
                    <span
                      style="display:inline-flex;align-items:center;gap:6px;background:#d1fae5;color:#059669;padding:6px 12px;border-radius:16px;font-size:0.75rem;font-weight:600;border:1px solid #a7f3d0;">
                      <div style="width:6px;height:6px;border-radius:50%;background:#10b981;"></div> Approved
                    </span>
                  </td>
                  <td><button class="btn btn-outline"
                      style="font-size:12px;padding:6px 12px;border-radius:6px;color:#475569;gap:6px;"><svg width="14"
                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg> View</button></td>
                </tr>
                <tr>
                  <td style="font-weight:600;color:#0f766e;">PO-2026-<br>0037</td>
                  <td style="font-weight:500;">Keells</td>
                  <td>
                    <div class="rs-date-col"><span>12 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td>
                    <div class="rs-date-col"><span>16 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td style="color:#64748b;font-weight:500;">16 Sep 2026</td>
                  <td><span class="rs-items-badge"
                      style="background:#eff6ff;color:#3b82f6;display:inline-block;text-align:center;line-height:1.2;padding:6px 12px;font-weight:600;">5<br><span
                        style="font-size:10px;font-weight:500;">Items</span></span></td>
                  <td>
                    <span
                      style="display:inline-flex;align-items:center;gap:6px;background:#d1fae5;color:#059669;padding:6px 12px;border-radius:16px;font-size:0.75rem;font-weight:600;border:1px solid #a7f3d0;">
                      <div style="width:6px;height:6px;border-radius:50%;background:#10b981;"></div> Approved
                    </span>
                  </td>
                  <td><button class="btn btn-outline"
                      style="font-size:12px;padding:6px 12px;border-radius:6px;color:#475569;gap:6px;"><svg width="14"
                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg> View</button></td>
                </tr>
                <tr>
                  <td style="font-weight:600;color:#0f766e;">PO-2026-<br>0035</td>
                  <td style="font-weight:500;">Prima</td>
                  <td>
                    <div class="rs-date-col"><span>10 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td>
                    <div class="rs-date-col"><span>15 Sep</span><span class="rs-date-year">2026</span></div>
                  </td>
                  <td style="color:#64748b;font-weight:500;">15 Sep 2026</td>
                  <td><span class="rs-items-badge"
                      style="background:#eff6ff;color:#3b82f6;display:inline-block;text-align:center;line-height:1.2;padding:6px 12px;font-weight:600;">12<br><span
                        style="font-size:10px;font-weight:500;">Items</span></span></td>
                  <td>
                    <div style="display:flex;flex-direction:column;align-items:flex-start;gap:4px;">
                      <span
                        style="display:inline-flex;align-items:center;gap:6px;background:#fee2e2;color:#b91c1c;padding:6px 12px;border-radius:16px;font-size:0.75rem;font-weight:600;border:1px solid #fecaca;">
                        <div style="width:6px;height:6px;border-radius:50%;background:#ef4444;"></div> Rejected
                      </span>
                      <span style="font-size:11px;color:#ef4444;font-weight:600;padding-left:12px;">Discrepancy</span>
                    </div>
                  </td>
                  <td><button class="btn btn-outline"
                      style="font-size:12px;padding:6px 12px;border-radius:6px;color:#ef4444;border-color:#fecaca;background:#fef2f2;gap:6px;"><svg
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg> View</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- MANUAL STOCK RECEIVING MODAL -->
<div class="pm-overlay" id="msr-overlay" aria-modal="true" role="dialog">
  <div class="pm-modal pm-modal--lg">
    
    <!-- 1. Green Header -->
    <div class="pm-header">
      <div class="pm-header-left">
        <div class="pm-icon">
          <!-- You can insert your document SVG icon here -->
        </div>
        <div>
          <h2 class="pm-title">Add Manual Stock Receiving</h2>
          <p class="pm-subtitle">Log direct inbound intake and schedule for verification audit</p>
        </div>
      </div>
      <button class="pm-close" data-popup-close id="msr-close" type="button">&times;</button>
    </div>

    <!-- 2. Body -->
    <div class="pm-body addstock-body">
      
      <!-- Top Form Row -->
      <div style="display: grid; grid-template-columns: 2fr 1.5fr 1.5fr; gap: 16px; margin-bottom: 24px;">
        <div class="addstock-field">
          <label class="addstock-label">Supplier <span style="color:#ef4444;">*</span></label>
          <select class="addstock-select">
            <option>Cargills Food City</option>
            <option>Keells</option>
          </select>
        </div>
        <div class="addstock-field">
          <label class="addstock-label">Reference No.</label>
          <input class="addstock-input" type="text" value="INV-2026-0892">
        </div>
        <div class="addstock-field">
          <label class="addstock-label">Received Date <span style="color:#ef4444;">*</span></label>
          <input class="addstock-input" type="date">
        </div>
      </div>

      <!-- Ingredients Table Section -->
      <div class="msr-ingredients-sec">
        <div class="msr-sec-header">
          <div class="msr-sec-title">INGREDIENTS</div>
          <div class="msr-item-count" id="msr-count">2 Items Listed</div>
        </div>
        <table class="msr-table">
          <thead>
            <tr>
              <th style="width: 30%;">INGREDIENT</th>
              <th style="width: 20%;">BATCH ID</th>
              <th style="width: 15%;">QTY</th>
              <th style="width: 15%;">UNIT</th>
              <th style="width: 20%;">EXPIRY DATE</th>
              <th style="width: 40px;"></th>
            </tr>
          </thead>
          <tbody id="msr-tbody">
            <tr>
              <td>
                <select class="msr-input">
                  <option>Chicken Breast</option>
                  <option>Fresh Tomatoes</option>
                  <option>Jasmine Rice</option>
                </select>
              </td>
              <td><input type="text" class="msr-input" value="B-748"></td>
              <td><input type="number" class="msr-input" value="15"></td>
              <td>
                <select class="msr-input">
                  <option>kg</option>
                  <option>L</option>
                  <option>units</option>
                </select>
              </td>
              <td><input type="date" class="msr-input" value="2026-10-15"></td>
              <td style="text-align: center;">
                <button type="button" class="msr-remove-btn" style="background:none; border:none; color:#ef4444; cursor:pointer;" title="Remove row">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <select class="msr-input">
                  <option>Fresh Tomatoes</option>
                  <option>Chicken Breast</option>
                  <option>Jasmine Rice</option>
                </select>
              </td>
              <td><input type="text" class="msr-input" value="B-749"></td>
              <td><input type="number" class="msr-input" value="10"></td>
              <td>
                <select class="msr-input">
                  <option>kg</option>
                  <option>L</option>
                  <option>units</option>
                </select>
              </td>
              <td><input type="date" class="msr-input" value="2026-10-22"></td>
              <td style="text-align: center;">
                <button type="button" class="msr-remove-btn" style="background:none; border:none; color:#ef4444; cursor:pointer;" title="Remove row">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="button" class="msr-btn-add" id="msr-btn-add">+ Add Ingredient</button>
      </div>

    </div>

    <!-- 3. Footer -->
    <div class="pm-footer pm-footer--between">
      <button class="pm-btn pm-btn--cancel" id="msr-cancel" data-popup-close type="button">Cancel</button>
      <button class="pm-btn pm-btn--confirm" type="button">Submit for Inspection</button>
    </div>

  </div>
</div>

</section>
