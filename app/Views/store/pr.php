<section id="sec-pr" class="section active">
  <div class="sec-hdr">
    <h2>Purchase Requisitions</h2>
  </div>

  <div class="pr-layout">
    
    <!-- LEFT COLUMN: PR List -->
    <div class="pr-list-col">
      
      <!-- Filter Tabs -->
      <div class="card" style="padding: 10px;">
         <div class="pr-filters">
           <div class="pr-filter-tab active" data-filter="all">All<br>(8)</div>
           <div class="pr-filter-tab" data-filter="pending">Pending<br>(3)</div>
           <div class="pr-filter-tab" data-filter="approved">Approved<br>(4)</div>
           <div class="pr-filter-tab" data-filter="rejected">Rejected<br>(1)</div>
         </div>
      </div>

      <!-- Card 1 (Active) -->
      <div class="card pr-card active" data-status="pending">
        <div class="pr-card-header">
          <h4 class="pr-card-title">REQ-0015</h4>
          <span class="badge bg-orange" style="font-size: 11px;">Step 2: Store Review</span>
        </div>
        <p class="pr-card-desc">Low stock - Proteins & Seafood</p>
        <div class="pr-card-meta">
          <span>21 Sep 2026 - 10:24 AM</span>
          <span>Reviewer: N. Kumari &gt;</span>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="card pr-card inactive" data-status="approved">
        <div class="pr-card-header">
          <h4 class="pr-card-title">REQ-0014</h4>
          <span class="badge bg-green" style="font-size: 11px;">Approved</span>
        </div>
        <p class="pr-card-desc">Dairy & Eggs - Weekly Replenishment</p>
        <div class="pr-card-meta">
          <span>19 Sep 2026 - 02:15 PM</span>
          <span>PO Issued: R. Mendis (Proc.) &gt;</span>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="card pr-card inactive" data-status="approved">
        <div class="pr-card-header">
          <h4 class="pr-card-title">REQ-0013</h4>
          <span class="badge bg-green" style="font-size: 11px;">Approved</span>
        </div>
        <p class="pr-card-desc">Vegetables - Fresh Produce</p>
        <div class="pr-card-meta">
          <span>18 Sep 2026 - 11:32 AM</span>
          <span>Approved by: N. Fernando &gt;</span>
        </div>
      </div>
      
      <!-- Card 4 -->
      <div class="card pr-card inactive" data-status="approved">
        <div class="pr-card-header">
          <h4 class="pr-card-title">REQ-0012</h4>
          <span class="badge bg-green" style="font-size: 11px;">Approved</span>
        </div>
        <p class="pr-card-desc">Dry Goods - Rice & Grains</p>
        <div class="pr-card-meta">
          <span>16 Sep 2026 - 04:20 PM</span>
          <span>Approved by: N. Fernando &gt;</span>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="card pr-card inactive" data-status="rejected">
        <div class="pr-card-header">
          <h4 class="pr-card-title">REQ-0011</h4>
          <span class="badge bg-red" style="font-size: 11px;">Rejected</span>
        </div>
        <p class="pr-card-desc">Beverages - Drinks & Juices</p>
        <div class="pr-card-meta">
          <span>14 Sep 2026 - 09:12 AM</span>
          <span>Rejected by: N. Fernando &gt;</span>
        </div>
      </div>
      
    </div>

    <!-- RIGHT COLUMN: Detail View -->
    <div class="card pr-detail-col">
      
      <!-- Header -->
      <div class="pr-detail-header">
        <div>
          <div class="pr-detail-title-row">
            <h2 class="pr-detail-title">REQ-0015</h2>
            <span class="badge bg-orange">Pending Approval</span>
          </div>
          <div class="pr-detail-meta">Created on 21 Sep 2026 - 10:24 AM</div>
        </div>
        <div class="pr-detail-actions">
          <button class="btn btn-outline"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:5px;"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg> Edit</button>
          <button class="btn btn-primary" style="background: var(--primary);"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:5px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14M22 4L12 14.01l-3-3"/></svg> Submit for Approval</button>
        </div>
      </div>

      <!-- Pipeline Status -->
      <div class="pr-pipeline">
        <div class="pr-pipeline-header">
          <div class="pr-pipeline-title">3-Stage Approval Pipeline</div>
          <div class="badge bg-orange">Step 2 of 3 Active</div>
        </div>
        <div class="pr-pipeline-steps">
          
          <div class="pr-step completed">
            <div class="pr-step-icon">✓</div>
            <div>
              <div class="pr-step-title">1. Kitchen Manager</div>
              <div class="pr-step-subtitle">Created - 21 Sep</div>
            </div>
          </div>
          
          <div class="pr-step active">
            <div class="pr-step-icon">2</div>
            <div>
              <div class="pr-step-title">2. Store Manager</div>
              <div class="pr-step-subtitle">In Review (You)</div>
            </div>
          </div>
          
          <div class="pr-step pending">
            <div class="pr-step-icon">3</div>
            <div>
              <div class="pr-step-title">3. Procurement</div>
              <div class="pr-step-subtitle">Final PO Release</div>
            </div>
          </div>
          
        </div>
      </div>

      <!-- Requested By info -->
      <div class="pr-req-info">
        <div class="pr-req-section">
          <div class="pr-req-label">Requested By</div>
          <div class="pr-req-user">
            <div class="pr-req-avatar">NP</div>
            <div>
              <div class="pr-req-val-main">Nimal Perera</div>
              <div class="pr-req-val-sub">Kitchen Manager</div>
            </div>
          </div>
        </div>
        <div class="pr-req-section">
          <div class="pr-req-label">Department</div>
          <div class="pr-req-val-main">Kitchen / Main Hot</div>
          <div class="pr-req-val-sub">Kitchen</div>
        </div>
        <div class="pr-req-section">
          <div class="pr-req-label">Expected Delivery</div>
          <div class="pr-req-date">26 Sep 2026</div>
        </div>
      </div>

      <!-- Items Table -->
      <div class="pr-items-header">
        <h3 class="pr-items-title">Items Requested</h3>
        <span class="pr-items-count">5 items total</span>
      </div>
      
      <div class="tbl-wrap pr-items-table">
        <table>
          <thead>
            <tr>
              <th style="width: 50px;">#</th>
              <th>ITEM</th>
              <th>CATEGORY</th>
              <th style="text-align: right;">QUANTITY</th>
              <th>UNIT</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="color: var(--t3);">1</td>
              <td style="font-weight: 600; color: var(--t1);">Chicken Whole</td>
              <td style="color: var(--t2);">Proteins & Seafood</td>
              <td style="text-align: right; font-weight: 700; color: var(--t1);">20</td>
              <td>kg</td>
            </tr>
            <tr>
              <td style="color: var(--t3);">2</td>
              <td style="font-weight: 600; color: var(--t1);">Prawns (Fresh)</td>
              <td style="color: var(--t2);">Proteins & Seafood</td>
              <td style="text-align: right; font-weight: 700; color: var(--t1);">10</td>
              <td>kg</td>
            </tr>
            <tr>
              <td style="color: var(--t3);">3</td>
              <td style="font-weight: 600; color: var(--t1);">Tomato</td>
              <td style="color: var(--t2);">Vegetables</td>
              <td style="text-align: right; font-weight: 700; color: var(--t1);">15</td>
              <td>kg</td>
            </tr>
            <tr>
              <td style="color: var(--t3);">4</td>
              <td style="font-weight: 600; color: var(--t1);">Onion</td>
              <td style="color: var(--t2);">Vegetables</td>
              <td style="text-align: right; font-weight: 700; color: var(--t1);">10</td>
              <td>kg</td>
            </tr>
            <tr>
              <td style="color: var(--t3);">5</td>
              <td style="font-weight: 600; color: var(--t1);">Cooking Oil</td>
              <td style="color: var(--t2);">Dry Goods</td>
              <td style="text-align: right; font-weight: 700; color: var(--t1);">5</td>
              <td>L</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Reason -->
      <div class="pr-reason">
        <div class="pr-reason-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
        <div>
          <div class="pr-reason-title">Reason</div>
          <div class="pr-reason-text">Stock is below minimum level and required for upcoming menu items (weekend special).</div>
        </div>
      </div>

      <!-- Approval History -->
      <h3 class="pr-history-title">Approval History</h3>
      
      <div class="pr-history-item">
        <div class="pr-history-line">
          <div class="pr-history-dot completed">✓</div>
          <div class="pr-history-connector completed"></div>
        </div>
        <div class="pr-history-content">
          <div class="pr-history-header">
            <div class="pr-history-user">Created by Nimal Perera</div>
            <div class="pr-history-role">Kitchen Manager</div>
          </div>
          <div class="pr-history-status completed">21 Sep 2026 - 10:24 AM</div>
          <div class="pr-history-desc">Requirement submitted with stock audit notes</div>
        </div>
      </div>

      <div class="pr-history-item">
        <div class="pr-history-line">
          <div class="pr-history-dot active">2</div>
          <div class="pr-history-connector pending"></div>
        </div>
        <div class="pr-history-content">
          <div class="pr-history-header">
            <div class="pr-history-user">In Review</div>
            <div class="pr-history-role">Store Manager</div>
          </div>
          <div class="pr-history-status active">Pending your approval</div>
          <div class="pr-history-desc">Awaiting verification of quantities against current stock levels.</div>
        </div>
      </div>

      <div class="pr-history-item">
        <div class="pr-history-line">
          <div class="pr-history-dot pending">3</div>
        </div>
        <div class="pr-history-content">
          <div class="pr-history-header">
            <div class="pr-history-user">Final PO Release</div>
            <div class="pr-history-role">Procurement Manager</div>
          </div>
          <div class="pr-history-status pending">Not started</div>
        </div>
      </div>

    </div>
  </div>
</section>
