<?php
/**
 * CEO View – Reports & Analytics
 * Read-only access to executive reports and month-to-date KPIs.
 * Covers: FR28 (variance report), FR29 (executive dashboard)
 *
 * NOTE: CEO can only VIEW / EXPORT reports. No editing.
 */
?>

<!-- ================================================
     REPORTS SECTION
     ================================================ -->

<div class="sec-hdr">
  <h2>Reports &amp; Analytics</h2>
</div>

<div class="grid-2">

  <!-- ===== LEFT: Available Reports ===== -->
  <div class="card">
    <div class="card-hdr">
      <h3>📥 Available Reports</h3>
    </div>

    <div style="display:flex;flex-direction:column;gap:10px;">
      <?php if (!empty($data['reports'])): ?>
        <?php foreach ($data['reports'] as $r): ?>
          <?php
            // Expect each $r to have: title, description, badge_class, export_key
            $title  = $r->title       ?? $r['title']       ?? 'Untitled Report';
            $desc   = $r->description ?? $r['description'] ?? '';
            $badge  = $r->badge_class ?? $r['badge_class'] ?? 'bg-blue';
            $key    = $r->export_key  ?? $r['export_key']  ?? '';
          ?>
          <div class="report-row">
            <div>
              <div class="report-title"><?= htmlspecialchars($title) ?></div>
              <div class="report-desc"><?= htmlspecialchars($desc) ?></div>
            </div>
            <a class="btn btn-outline btn-sm"
               href="<?= htmlspecialchars(BASE_URL) ?>/ceo/exportReport/<?= urlencode($key) ?>"
               aria-label="Export <?= htmlspecialchars($title) ?>">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
              Export
            </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;color:var(--t3);padding:24px 0;">
          No reports available.
        </p>
      <?php endif; ?>
    </div>
  </div>

  <!-- ===== RIGHT: Key Metrics (MTD) ===== -->
  <div class="card">
    <div class="card-hdr">
      <h3>📈 Key Metrics (Month to Date)</h3>
    </div>

    <?php
      $m = $data['metrics'] ?? [];
      $monthLabel = $data['monthLabel'] ?? date('F Y');
    ?>
    <div class="var-rows">

      <!-- Total Events -->
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">Total Events</div>
          <div class="var-sub"><?= htmlspecialchars($monthLabel) ?></div>
        </div>
        <span class="var-val" style="color:var(--t1);">
          <?= number_format((int)($m['total_events'] ?? 0)) ?>
        </span>
      </div>

      <!-- Guests Served -->
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">Guests Served</div>
          <div class="var-sub">Across all confirmed events</div>
        </div>
        <span class="var-val" style="color:var(--t1);">
          <?= number_format((int)($m['guests_served'] ?? 0)) ?>
        </span>
      </div>

      <!-- Forecast Accuracy -->
      <?php $acc = (float)($m['forecast_accuracy'] ?? 0); ?>
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">Forecast Accuracy</div>
          <div class="var-sub">
            Average across <?= (int)($m['recorded_events'] ?? 0) ?> recorded events
          </div>
        </div>
        <span class="var-val <?= $acc >= 90 ? 'v-pos' : 'v-neg' ?>">
          <?= number_format($acc, 0) ?>%
        </span>
      </div>

      <!-- Procurement Spend -->
      <?php
        $spend  = (float)($m['procurement_spend'] ?? 0);
        $budget = (float)($m['budget'] ?? 0);
        $spendFmt = 'Rs. ' . number_format($spend / 1000000, 2) . 'M';
        $budgetFmt = 'Rs. ' . number_format($budget / 1000000, 2) . 'M';
        $withinBudget = ($budget > 0 && $spend <= $budget);
      ?>
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">Procurement Spend</div>
          <div class="var-sub">Against budget of <?= htmlspecialchars($budgetFmt) ?></div>
        </div>
        <span class="var-val <?= $withinBudget ? 'v-pos' : 'v-neg' ?>">
          <?= htmlspecialchars($spendFmt) ?>
        </span>
      </div>

      <!-- PRs Approved -->
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">PRs Approved</div>
          <div class="var-sub">
            Of <?= (int)($m['prs_submitted'] ?? 0) ?> submitted
          </div>
        </div>
        <span class="var-val" style="color:var(--t1);">
          <?= (int)($m['prs_approved'] ?? 0) ?> /
          <?= (int)($m['prs_submitted'] ?? 0) ?>
        </span>
      </div>

      <!-- Stock Shortfalls -->
      <?php $short = (int)($m['stock_shortfalls'] ?? 0); ?>
      <div class="var-row">
        <div class="var-left">
          <div class="var-lbl">Stock Shortfalls</div>
          <div class="var-sub">Items below minimum threshold</div>
        </div>
        <span class="var-val <?= $short > 0 ? 'v-neg' : 'v-pos' ?>">
          <?= $short ?> items
        </span>
      </div>

    </div>
  </div>
</div>