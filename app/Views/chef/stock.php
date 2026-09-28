<section id="sec-stock" class="section active">
  <!-- Header -->
  <div class="issue-hdr">
    <div class="issue-hdr-left">
      <div>
        <h2 class="issue-title-wrap">
          Request Ingredients
        </h2>
        <p class="issue-subtitle">Submit ingredient requests and track real-time fulfillment status from the store.</p>
      </div>
    </div>
    <button class="btn-manual-issue" style="background: var(--primary); color: white;">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 5v14M5 12h14"/>
      </svg>
      New Request
    </button>
  </div>



  <!-- Tab Area -->
  <div class="issue-tab-container">
    <div class="issue-tabs-header">
      <div class="issue-tabs-left">
        <button class="issue-tab-btn active">
          Active Requests 
          <span class="issue-tab-badge gray">3</span>
        </button>
        <button class="issue-tab-btn">
          Past Requests 
        </button>
      </div>
      <div class="issue-fefo-status">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#065f46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
        </svg>
        <div class="issue-fefo-text" style="color: var(--t2);">
          Auto-fill from Menus<br>
          <span class="issue-fefo-active" style="color: var(--primary);">Available</span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="issue-toolbar">
      <label class="issue-search-wrap">
        <svg class="issue-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input class="issue-search-input" type="search" placeholder="Search request ID, ingredient...">
      </label>
      <select class="issue-select">
        <option>Status: All Active</option>
        <option>Pending</option>
        <option>Partially Fulfilled</option>
      </select>
      <select class="issue-select">
        <option>Priority: All</option>
        <option>Urgent</option>
        <option>High</option>
        <option>Normal</option>
      </select>
      <button class="issue-icon-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
          <polyline points="7 10 12 15 17 10"/>
          <line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
      </button>
    </div>

    <!-- Table -->
    <div class="tbl-wrap" style="padding: 0;">
      <table class="issue-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>PURPOSE</th>
            <th>DATE</th>
            <th>ITEMS</th>
            <th style="text-align: center;">PRIORITY</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: right;">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>REQ-0042</td>
            <td>Weekend Special Menu</td>
            <td>24 Sep</td>
            <td>5 Items</td>
            <td style="text-align: center;"><span class="badge-priority high">High</span></td>
            <td style="text-align: center;"><span class="badge-status pending">Pending</span></td>
            <td style="text-align: right;"><button class="btn-review" style="padding: 4px 12px; font-size: 13px;">View</button></td>
          </tr>
          <tr>
            <td>REQ-0041</td>
            <td>Corporate Banquet</td>
            <td>23 Sep</td>
            <td>4 Items</td>
            <td style="text-align: center;"><span class="badge-priority normal">Normal</span></td>
            <td style="text-align: center;"><span class="badge-status partial">Partial</span></td>
            <td style="text-align: right;"><button class="btn-review" style="padding: 4px 12px; font-size: 13px;">View</button></td>
          </tr>
          <tr>
            <td>REQ-0045</td>
            <td>Daily Top-up</td>
            <td>23 Sep</td>
            <td>3 Items</td>
            <td style="text-align: center;"><span class="badge-priority urgent">Urgent</span></td>
            <td style="text-align: center;"><span class="badge-status pending">Pending</span></td>
            <td style="text-align: right;"><button class="btn-review" style="padding: 4px 12px; font-size: 13px;">View</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="issue-pagination">
      <div>Showing 1 to 3 of 3 active requests</div>
      <div class="pagination-controls">
        <button class="page-btn" disabled>Prev</button>
        <button class="page-num active">1</button>
        <button class="page-btn" disabled>Next</button>
      </div>
    </div>
  </div>
</section>