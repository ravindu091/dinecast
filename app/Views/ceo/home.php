<?php
/**
 * CEO View – Executive Overview (Home)
 * Covers: FR29 (executive dashboard), FR28 (variance summary)
 * Read-only: CEO views aggregated operational data.
 */
?>

<!-- ================================================
     OVERVIEW SECTION
     ================================================ -->

<!-- ===== Welcome ===== -->
<div class="welcome">
  <div class="welcome-txt">
    <h2>Good to see you, <?= htmlspecialchars($data['userName'] ?? 'CEO') ?>!</h2>
    <p>Here's the full operational overview for DineCast.</p>
    <div class="user-id">
      ID: <?= htmlspecialchars($data['userId'] ?? 'DC-CEO-01') ?>
      &nbsp;·&nbsp;
      <?= htmlspecialchars($data['userRole'] ?? 'Top Management') ?>
    </div>
  </div>
  <div class="welcome-illo">📊</div>
</div>

<!-- ===== KPI Bar ===== -->
<div class="kpi-bar">

  <!-- Events This Month -->
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--success-bg);">📅</div>
      <?php $evDelta = (int)($data['kpis']['events_delta'] ?? 0); ?>
      <span class="kpi-tag <?= $evDelta >= 0 ? 'up' : 'down' ?>">
        <?= $evDelta >= 0 ? '+' : '' ?><?= $evDelta ?>
      </span>
    </div>
    <div class="kpi-val"><?= (int)($data['kpis']['events_this_month'] ?? 0) ?></div>
    <div class="kpi-lbl">Events This Month</div>
  </div>

  <!-- Total Guests -->
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--info-bg);">👥</div>
      <?php $gDelta = (float)($data['kpis']['guests_delta_pct'] ?? 0); ?>
      <span class="kpi-tag <?= $gDelta >= 0 ? 'up' : 'down' ?>">
        <?= $gDelta >= 0 ? '+' : '' ?><?= number_format($gDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val"><?= number_format((int)($data['kpis']['total_guests'] ?? 0)) ?></div>
    <div class="kpi-lbl">Total Guests Served</div>
  </div>

  <!-- Forecast Accuracy -->
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--purple-bg);">🎯</div>
      <?php $aDelta = (float)($data['kpis']['accuracy_delta_pct'] ?? 0); ?>
      <span class="kpi-tag <?= $aDelta >= 0 ? 'up' : 'down' ?>">
        <?= $aDelta >= 0 ? '+' : '' ?><?= number_format($aDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val"><?= (int)($data['kpis']['forecast_accuracy'] ?? 0) ?>%</div>
    <div class="kpi-lbl">Forecast Accuracy</div>
  </div>

  <!-- Procurement Spend -->
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--warning-bg);">💰</div>
      <?php $pDelta = (float)($data['kpis']['spend_delta_pct'] ?? 0); ?>
      <span class="kpi-tag <?= $pDelta >= 0 ? 'up' : 'down' ?>">
        <?= $pDelta >= 0 ? '+' : '' ?><?= number_format($pDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val" style="font-size:16px;">
      Rs. <?= number_format(($data['kpis']['procurement_spend'] ?? 0) / 1000000, 2) ?>M
    </div>
    <div class="kpi-lbl">Procurement Spend</div>
  </div>

  <!-- Low Stock Items -->
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--danger-bg);">⚠️</div>
      <span class="kpi-tag down">
        <?= (int)($data['kpis']['low_stock_items'] ?? 0) ?> items
      </span>
    </div>
    <div class="kpi-val"><?= (int)($data['kpis']['low_stock_items'] ?? 0) ?></div>
    <div class="kpi-lbl">Low Stock Items</div>
  </div>

</div>

<!-- ===== Charts Row ===== -->
<div class="grid-2">

  <!-- Forecast vs Actual Chart -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Forecast vs Actual Guests</h3>
        <p style="font-size:11.5px;color:var(--t3);">Last <?= count($data['forecastChart'] ?? []) ?> events</p>
      </div>
    </div>
    <div class="chart-legend">
      <span><span class="leg-dot" style="background:var(--primary);"></span>Actual</span>
      <span><span class="leg-dot" style="background:#93C5FD;"></span>Forecast</span>
    </div>

    <?php
      $fcEvents = $data['forecastChart'] ?? [];
      // Determine max value dynamically, rounded up
      $maxVal = 1;
      foreach ($fcEvents as $ev) {
        $maxVal = max($maxVal, (int)($ev->actual_guests ?? 0), (int)($ev->forecast_guests ?? 0));
      }
      $maxVal = ceil($maxVal / 50) * 50; // round up to nearest 50
    ?>

    <div class="forecast-chart">
      <?php if (!empty($fcEvents)): ?>
        <?php foreach ($fcEvents as $ev): ?>
          <?php
            $act = $ev->actual_guests ?? null;
            $frc = (int)($ev->forecast_guests ?? 0);
            $actH = $act ? round(($act / $maxVal) * 100) : 0;
            $frcH = round(($frc / $maxVal) * 100);

            // Short label (e.g., "Aug 12")
            $lbl = !empty($ev->event_date)
              ? date('M j', strtotime($ev->event_date))
              : '—';
          ?>
          <div class="fc-col">
            <div class="fc-bars">
              <?php if ($act): ?>
                <div class="fc-b actual"
                     style="height:<?= $actH ?>%"
                     title="Actual: <?= (int)$act ?>"></div>
              <?php endif; ?>
              <div class="fc-b forecast"
                   style="height:<?= $frcH ?>%"
                   title="Forecast: <?= $frc ?>"></div>
            </div>
            <div class="fc-lbl"><?= htmlspecialchars($lbl) ?></div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;color:var(--t3);padding:40px 0;">No event data available.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Procurement Breakdown -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Procurement Spend Breakdown</h3>
        <p style="font-size:11.5px;color:var(--t3);">
          By supplier category (<?= htmlspecialchars($data['monthLabel'] ?? date('F Y')) ?>)
        </p>
      </div>
    </div>

    <?php
      $proc = $data['procurement'] ?? [];
      $colorPalette = ['var(--primary)', 'var(--warning)', 'var(--danger)', '#CBD5E1'];
    ?>

    <?php if (!empty($proc)): ?>
      <div style="display:flex;align-items:center;gap:24px;margin-bottom:20px;">
        <div class="donut-ring">
          <div class="donut-hole"><?= htmlspecialchars($data['monthShort'] ?? date('M')) ?></div>
        </div>
        <div class="legend-list">
          <?php foreach ($proc as $i => $p): ?>
            <div class="legend-item">
              <div class="legend-dot" style="background:<?= $colorPalette[$i % count($colorPalette)] ?>;"></div>
              <span class="legend-label"><?= htmlspecialchars($p->category_name) ?></span>
              <span class="legend-val"><?= (float)$p->percentage ?>%</span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="proc-rows">
        <?php foreach ($proc as $i => $p): ?>
          <div class="proc-row">
            <span class="proc-name"><?= htmlspecialchars($p->category_name) ?></span>
            <div class="proc-bar">
              <div class="proc-fill"
                   style="width:<?= (float)$p->percentage ?>%;background:<?= $colorPalette[$i % count($colorPalette)] ?>;">
              </div>
            </div>
            <span class="proc-pct"><?= (float)$p->percentage ?>%</span>
            <span class="proc-amt">
              Rs. <?= number_format(((float)($p->total_spend ?? 0)) / 1000, 0) ?>K
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p style="text-align:center;color:var(--t3);padding:40px 0;">No procurement data.</p>
    <?php endif; ?>
  </div>
</div>

<!-- ===== Second Row ===== -->
<div class="grid-3">

  <!-- Upcoming Events -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Upcoming Events</h3>
        <p style="font-size:11.5px;color:var(--t3);">Next 5</p>
      </div>
      <a href="<?= BASE_URL ?>/ceo/events" class="btn btn-ghost btn-sm">All</a>
    </div>

    <div class="act-list">
      <?php if (!empty($data['upcomingEvents'])): ?>
        <?php foreach ($data['upcomingEvents'] as $ev): ?>
          <?php
            $statusKey = strtolower($ev->status ?? '');
            $badgeMap = [
              'confirmed' => ['bg-green', 'var(--success-bg)'],
              'tentative' => ['bg-orange', 'var(--warning-bg)'],
              'upcoming'  => ['bg-teal',   'var(--info-bg)'],
            ];
            [$badgeCls, $icoBg] = $badgeMap[$statusKey] ?? ['bg-grey', 'var(--info-bg)'];

            $evDate = !empty($ev->event_date)
              ? date('j M', strtotime($ev->event_date))
              : '—';
          ?>
          <div class="act-item">
            <div class="act-ico" style="background:<?= $icoBg ?>;">📅</div>
            <div class="act-body">
              <div class="act-title"><?= htmlspecialchars($ev->event_name) ?></div>
              <div class="act-desc">
                <?= htmlspecialchars($evDate) ?> &nbsp;·&nbsp;
                <?= number_format((int)$ev->registered_guests) ?> guests
              </div>
            </div>
            <span class="badge <?= $badgeCls ?>" style="font-size:10.5px;">
              <?= htmlspecialchars(ucfirst($statusKey)) ?>
            </span>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;color:var(--t3);padding:24px 0;">No upcoming events.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Inventory Health -->
  <div class="card">
    <div class="card-hdr"><h3>Inventory Health</h3></div>

    <?php $inv = $data['inventory'] ?? []; ?>
    <div class="health-grid" style="margin-bottom:18px;">
      <div class="health-item">
        <div class="h-val" style="color:var(--success);">
          <?= number_format((int)($inv['normal'] ?? 0)) ?>
        </div>
        <div class="h-lbl">Items Normal</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--danger);">
          <?= (int)($inv['below_min'] ?? 0) ?>
        </div>
        <div class="h-lbl">Below Min</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--warning);">
          <?= (int)($inv['near_expiry'] ?? 0) ?>
        </div>
        <div class="h-lbl">Near Expiry</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--danger);">
          <?= (int)($inv['expired'] ?? 0) ?>
        </div>
        <div class="h-lbl">Expired</div>
      </div>
    </div>

    <div style="font-size:11.5px;color:var(--t3);font-weight:700;text-transform:uppercase;letter-spacing:0.6px;margin-bottom:10px;">
      Monthly Trend
    </div>

    <?php
      $trend = $inv['trend'] ?? [];   // e.g. [['Jan', 40], ['Feb', 55], ...]
      $maxTrend = 1;
      foreach ($trend as $t) $maxTrend = max($maxTrend, (int)$t[1]);
    ?>
    <div class="month-trend">
      <?php foreach ($trend as $i => $t): ?>
        <?php
          $heightPct = round(($t[1] / $maxTrend) * 100);
          $isCurrent = ($i === count($trend) - 1);
          $isHi = $t[1] === $maxTrend;
          $cls = $isCurrent ? 'mt-bar cur' : ($isHi ? 'mt-bar hi' : 'mt-bar');
        ?>
        <div class="<?= $cls ?>" style="height:<?= $heightPct ?>%;"></div>
      <?php endforeach; ?>
    </div>
    <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--t3);margin-top:4px;">
      <?php foreach ($trend as $t): ?>
        <span><?= htmlspecialchars($t[0]) ?></span>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Variance Summary -->
  <div class="card">
    <div class="card-hdr">
      <h3>Forecast Variance Summary</h3>
      <p style="font-size:11.5px;color:var(--t3);">
        Last <?= count($data['variance'] ?? []) ?> events
      </p>
    </div>

    <div class="var-rows">
      <?php if (!empty($data['variance'])): ?>
        <?php foreach ($data['variance'] as $v): ?>
          <?php
            $varPct = (float)($v->variance_pct ?? 0);
            $varCls = $varPct >= 0 ? 'v-pos' : 'v-neg';
            $evDate = !empty($v->event_date)
              ? date('M j', strtotime($v->event_date))
              : '—';
          ?>
          <div class="var-row">
            <div class="var-left">
              <div class="var-lbl"><?= htmlspecialchars($v->event_name) ?></div>
              <div class="var-sub">
                <?= htmlspecialchars($evDate) ?> ·
                <?= number_format((int)$v->registered_guests) ?> reg
              </div>
            </div>
            <span class="var-val <?= $varCls ?>">
              <?= $varPct >= 0 ? '+' : '' ?><?= number_format($varPct, 1) ?>%
            </span>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;color:var(--t3);padding:24px 0;">No variance data.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- ===== Alerts Row ===== -->
<div class="card">
  <div class="card-hdr"><h3>⚡ System Alerts</h3></div>

  <div class="alert-grid">
    <?php if (!empty($data['alerts'])): ?>
      <?php foreach ($data['alerts'] as $a): ?>
        <?php
          $sev = strtolower($a->severity ?? 'info');
          $sevMap = [
            'danger'  => ['var(--danger-bg)',  '🔴'],
            'warning' => ['var(--warning-bg)', '🟡'],
            'info'    => ['var(--info-bg)',    '📋'],
            'urgent'  => ['var(--danger-bg)',  '⏰'],
          ];
          [$bg, $ico] = $sevMap[$sev] ?? $sevMap['info'];
        ?>
        <div class="alert-card">
          <div class="alert-ico" style="background:<?= $bg ?>;"><?= $ico ?></div>
          <div>
            <div class="alert-title"><?= htmlspecialchars($a->title) ?></div>
            <div class="alert-desc"><?= htmlspecialchars($a->description) ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="text-align:center;color:var(--t3);padding:24px 0;width:100%;">
        No active alerts. All systems normal. ✅
      </p>
    <?php endif; ?>
  </div>
</div>