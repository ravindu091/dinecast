<!-- ================================================
     REPORTS SECTION
     ================================================ -->

<div class="sec-hdr"><h2>Reports &amp; Analytics</h2></div>
<div class="grid-2">
  <div class="card">
    <div class="card-hdr"><h3>📥 Available Reports</h3></div>
    <div style="display:flex;flex-direction:column;gap:10px;">
      <?php
      $reports = [
        ['Forecast Accuracy Report',  'Actual vs. Forecast comparison across all events','bg-green'],
        ['Procurement Spend Report',  'Monthly spend by supplier and category',          'bg-blue'],
        ['Inventory Variance Report', 'Used vs. received quantities per batch',           'bg-purple'],
        ['Event Summary Report',      'Guests, menus, and PR data per event',            'bg-orange'],
        ['Low Stock Alert Report',    'Items below minimum stock threshold',             'bg-red'],
      ];
      foreach ($reports as $r): ?>
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;background:var(--bg);border-radius:var(--r-sm);border:1px solid var(--border);">
        <div>
          <div style="font-size:13.5px;font-weight:600;color:var(--t1);"><?= $r[0] ?></div>
          <div style="font-size:12px;color:var(--t3);margin-top:2px;"><?= $r[1] ?></div>
        </div>
        <button class="btn btn-outline btn-sm" onclick="showToast('Generating report...')">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          Export
        </button>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="card">
    <div class="card-hdr"><h3>📈 Key Metrics (Month to Date)</h3></div>
    <div class="var-rows">
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Total Events</div><div class="var-sub">August 2026</div></div>
        <span class="var-val" style="color:var(--t1);">19</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Guests Served</div><div class="var-sub">Across all confirmed events</div></div>
        <span class="var-val" style="color:var(--t1);">3,214</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Forecast Accuracy</div><div class="var-sub">Average across 6 recorded events</div></div>
        <span class="var-val v-pos">92%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Procurement Spend</div><div class="var-sub">Against budget of Rs. 1.30M</div></div>
        <span class="var-val v-pos">Rs. 1.24M</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">PRs Approved</div><div class="var-sub">Of 7 submitted</div></div>
        <span class="var-val" style="color:var(--t1);">6 / 7</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Stock Shortfalls</div><div class="var-sub">Items below minimum threshold</div></div>
        <span class="var-val v-neg">12 items</span>
      </div>
    </div>
  </div>
</div>
