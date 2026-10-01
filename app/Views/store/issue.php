<section id="sec-issue" class="section active">
  <!-- Header -->
  <div class="sec-hdr">
    <div>
      <h2>Issue Stock</h2>
      <p>Manage ingredient requests, FEFO batch allocations, and kitchen stock releases.</p>
    </div>
    <button class="btn btn-primary toolbar-btn">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 5v14M5 12h14"/>
      </svg>
      Manual Issue
    </button>
  </div>

  <!-- Stat Cards -->
  <div class="stats metric-stats">
    <!-- Card 1 -->
    <article class="metric-card metric-card-blue">
      <div class="metric-value">04</div>
      <div class="metric-label">Pending Requests</div>
      <div class="metric-footer">
        <span>4 this shift</span>
        <strong>Active</strong>
      </div>
    </article>

    <!-- Card 2 -->
    <article class="metric-card metric-card-red">
      <div class="metric-value">02</div>
      <div class="metric-label">Partially Fulfilled</div>
      <div class="metric-footer">
        <span>2 in critical deficit</span>
        <strong>Resolve Now</strong>
      </div>
    </article>

    <!-- Card 3 -->
    <article class="metric-card metric-card-orange">
      <div class="metric-value">12</div>
      <div class="metric-label">Issued Today</div>
      <div class="metric-footer">
        <span>Oldest: Fresh Pra...</span>
        <strong>Review FIFO</strong>
      </div>
    </article>

    <!-- Card 4 -->
    <article class="metric-card metric-card-green">
      <div class="metric-value">48</div>
      <div class="metric-label">Total Issued Dispatches</div>
      <div class="metric-footer">
        <span>342 kg released this...</span>
        <strong>&lt; 0.4%</strong>
      </div>
    </article>
  </div>

  <!-- Tab Area -->
  <div class="tab-group card" style="padding:0;">
    <div class="tabs" style="padding: 0 1rem; background:#f8fafc; border-radius: 12px 12px 0 0; justify-content:space-between; align-items:center;">
      <div style="display:flex;">
        <button class="tab active">
          Chef Requests
          <span class="badge bg-gray" style="margin-left:4px;">4</span>
        </button>
        <button class="tab">
          Issue History
          <span class="badge bg-green" style="margin-left:4px;">24</span>
        </button>
      </div>
      <div class="issue-fefo-status">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#065f46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
          <path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/>
        </svg>
        <div class="issue-fefo-text">
          FEFO Allocation Engine<br>
          <span class="issue-fefo-active">Active</span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="toolbar" style="padding: 1rem; border-bottom: 1px solid var(--store-border);">
      <label class="toolbar-search">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input type="search" placeholder="Search request ID, chef, ingredient...">
      </label>
      <div class="toolbar-filters">
        <label class="toolbar-sort">
          <select>
            <option>Status: All Statuses</option>
          </select>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
        </label>
        <label class="toolbar-sort">
          <select>
            <option>Priority: All</option>
          </select>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
        </label>
        <label class="toolbar-sort">
          <select>
            <option>Today (23 Sep)</option>
          </select>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
        </label>
        <button class="icon-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="7 10 12 15 17 10"/>
            <line x1="12" y1="15" x2="12" y2="3"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Table -->
    <div class="tbl-wrap" style="padding: 0;">
      <table>
        <thead>
          <tr>
            <th>REQUEST ID</th>
            <th>REQUESTED BY</th>
            <th>DESTINATION</th>
            <th>DATE &amp; TIME</th>
            <th>ITEMS</th>
            <th style="text-align: center;">PRIORITY</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: right;">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <!-- ROW 1 -->
          <tr>
            <td>
              <div class="req-id-prefix">REQ-2026-</div>
              <div>0042</div>
            </td>
            <td>
              <div class="user-avatar-wrap">
                <div class="user-avatar">CS</div>
                <span class="user-name">Chef Sudath</span>
              </div>
            </td>
            <td>Main Hot<br>Kitchen</td>
            <td>23 Sep, 10:15<br>AM</td>
            <td>
              <div class="items-count">5 Items</div>
              <div class="items-weight">48.0 kg total</div>
            </td>
            <td style="text-align: center;">
              <span class="badge-priority high">High</span>
            </td>
            <td style="text-align: center;">
              <div class="badge-status pending">
                <div class="dot"></div>
                Pending Review
              </div>
            </td>
            <td style="text-align: right;">
              <button class="btn-review">
                Review &amp; Issue
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </button>
            </td>
          </tr>

          <!-- ROW 2 -->
          <tr>
            <td>
              <div class="req-id-prefix">REQ-2026-</div>
              <div>0041</div>
            </td>
            <td>
              <div class="user-avatar-wrap">
                <div class="user-avatar">CK</div>
                <span class="user-name">Chef Kasun</span>
              </div>
            </td>
            <td>Banquets &amp;<br>Events</td>
            <td>23 Sep,<br>09:30 AM</td>
            <td>
              <div class="items-count">4 Items</div>
              <div class="items-weight">28.0 kg total</div>
            </td>
            <td style="text-align: center;">
              <span class="badge-priority normal">Normal</span>
            </td>
            <td style="text-align: center;">
              <div class="badge-status partial">
                <div class="dot"></div>
                Partially Fulfilled
              </div>
            </td>
            <td style="text-align: right;">
              <button class="btn-review">
                Review &amp; Issue
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </button>
            </td>
          </tr>

          <!-- ROW 3 -->
          <tr>
            <td>
              <div class="req-id-prefix">REQ-2026-</div>
              <div>0043</div>
            </td>
            <td>
              <div class="user-avatar-wrap">
                <div class="user-avatar">CS</div>
                <span class="user-name">Chef Sudath</span>
              </div>
            </td>
            <td>Pastry &amp; Bakery</td>
            <td>23 Sep,<br>08:45 AM</td>
            <td>
              <div class="items-count">3 Items</div>
              <div class="items-weight">12.0 kg total</div>
            </td>
            <td style="text-align: center;">
              <span class="badge-priority normal">Normal</span>
            </td>
            <td style="text-align: center;">
              <div class="badge-status pending">
                <div class="dot"></div>
                Pending Review
              </div>
            </td>
            <td style="text-align: right;">
              <button class="btn-review">
                Review &amp; Issue
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </button>
            </td>
          </tr>

          <!-- ROW 4 -->
          <tr>
            <td>
              <div class="req-id-prefix">REQ-2026-</div>
              <div>0039</div>
            </td>
            <td>
              <div class="user-avatar-wrap">
                <div class="user-avatar">SA</div>
                <span class="user-name">Sous Chef<br>Amila</span>
              </div>
            </td>
            <td>Cold Larder /<br>Salad</td>
            <td>22 Sep, 11:20<br>PM</td>
            <td>
              <div class="items-count">6 Items</div>
              <div class="items-weight">18.0 kg total</div>
            </td>
            <td style="text-align: center;">
              <span class="badge-priority urgent">Urgent</span>
            </td>
            <td style="text-align: center;">
              <div class="badge-status pending">
                <div class="dot"></div>
                Pending Review
              </div>
            </td>
            <td style="text-align: right;">
              <button class="btn-review">
                Review &amp; Issue
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </button>
            </td>
          </tr>

          <!-- ROW 5 -->
          <tr>
            <td>
              <div class="req-id-prefix">REQ-2026-</div>
              <div>0040</div>
            </td>
            <td>
              <div class="user-avatar-wrap">
                <div class="user-avatar">CS</div>
                <span class="user-name">Chef Sudath</span>
              </div>
            </td>
            <td>Main Hot<br>Kitchen</td>
            <td>22 Sep, 02:15<br>PM</td>
            <td>
              <div class="items-count">12 Items</div>
              <div class="items-weight">85.0 kg total</div>
            </td>
            <td style="text-align: center;">
              <span class="badge-priority normal">Normal</span>
            </td>
            <td style="text-align: center;">
              <div class="badge-status issued">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Issued
              </div>
            </td>
            <td style="text-align: right;">
              <button class="btn-docket">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                View Docket
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="issue-pagination">
      <div>Showing 1 to 5 of 24 records</div>
      <div class="pagination-controls">
        <button class="page-btn">Prev</button>
        <button class="page-num active">1</button>
        <button class="page-num">2</button>
        <button class="page-btn">Next</button>
      </div>
    </div>
  </div>
</section>
