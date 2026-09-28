<?php
/**
 * CEO View – Executive Overview (Refined)
 */

$userName = $_SESSION['fullName'];
?>

<!-- ===== Welcome ===== -->
<div class="welcome">
  <div class="welcome-txt">
    <h2>Good to see you, <?= htmlspecialchars($userName ?? 'CEO') ?>!</h2>
    <p>Here's the full operational overview for DineCast.</p>
    <div class="user-id">
      ID: <?= htmlspecialchars($userCode ?? 'DC-CEO-01') ?>
      &nbsp;·&nbsp;
      <?= htmlspecialchars($userRole ?? 'Top Management') ?>
    </div>
  </div>
  <div class="welcome-illo">📊</div>
</div>

<!-- ===== KPI Bar ===== -->
<?php
  $k = $kpis ?? [];
  $evDelta = (int)($k['events_delta'] ?? 0);
  $gDelta  = (float)($k['guests_delta_pct'] ?? 0);
  $aDelta  = (float)($k['accuracy_delta_pct'] ?? 0);
  $pDelta  = (float)($k['spend_delta_pct'] ?? 0);
  $lowStock = (int)($k['low_stock_items'] ?? 0);

  $tagClass = function($val) {
    if ($val > 0) return 'up';
    if ($val < 0) return 'down';
    return 'zero';
  };
?>

<div class="kpi-bar">

  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:#F0FDF4;">📅</div>
      <span class="kpi-tag <?= $tagClass($evDelta) ?>">
        <?= $evDelta > 0 ? '+' : '' ?><?= $evDelta ?>
      </span>
    </div>
    <div class="kpi-val"><?= (int)($k['events_this_month'] ?? 0) ?></div>
    <div class="kpi-lbl">Events This Month</div>
  </div>

  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:#F0F9FF;">👥</div>
      <span class="kpi-tag <?= $tagClass($gDelta) ?>">
        <?= $gDelta > 0 ? '+' : '' ?><?= number_format($gDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val"><?= number_format((int)($k['total_guests'] ?? 0)) ?></div>
    <div class="kpi-lbl">Total Guests Served</div>
  </div>

  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:#F5F3FF;">🎯</div>
      <span class="kpi-tag <?= $tagClass($aDelta) ?>">
        <?= $aDelta > 0 ? '+' : '' ?><?= number_format($aDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val"><?= (int)($k['forecast_accuracy'] ?? 0) ?>%</div>
    <div class="kpi-lbl">Forecast Accuracy</div>
  </div>

  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:#FFFBEB;">💰</div>
      <span class="kpi-tag <?= $tagClass($pDelta) ?>">
        <?= $pDelta > 0 ? '+' : '' ?><?= number_format($pDelta, 0) ?>%
      </span>
    </div>
    <div class="kpi-val" style="font-size:20px;">
      Rs. <?= number_format(($k['procurement_spend'] ?? 0) / 1000000, 2) ?>M
    </div>
    <div class="kpi-lbl">Procurement Spend</div>
  </div>

  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:#FFF1F2;">⚠️</div>
      <span class="kpi-tag <?= $lowStock > 0 ? 'down' : 'zero' ?>">
        <?= $lowStock ?> items
      </span>
    </div>
    <div class="kpi-val"><?= $lowStock ?></div>
    <div class="kpi-lbl">Low Stock Items</div>
  </div>

</div>

<!-- ===== Charts Row ===== -->
<div class="grid-2">

  <!-- Forecast vs Actual -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Forecast vs Actual Guests</h3>
        <p>Last <?= count($forecastChart ?? []) ?> events</p>
      </div>
    </div>

    <div class="chart-legend">
      <span><span class="leg-dot" style="background:#16A34A;"></span>Actual</span>
      <span><span class="leg-dot" style="background:#93C5FD;"></span>Forecast</span>
    </div>

    <?php
      $fcEvents = $forecastChart ?? [];
      $maxVal = 1;
      foreach ($fcEvents as $ev) {
        $maxVal = max($maxVal, (int)($ev->actual_guests ?? 0), (int)($ev->forecast_guests ?? 0));
      }
      $maxVal = ceil($maxVal / 50) * 50;
    ?>

    <?php if (!empty($fcEvents)): ?>
      <div class="forecast-chart">
        <?php foreach ($fcEvents as $ev): ?>
          <?php
            $act = $ev->actual_guests ?? null;
            $frc = (int)($ev->forecast_guests ?? 0);
            $actH = $act ? round(($act / $maxVal) * 100) : 0;
            $frcH = round(($frc / $maxVal) * 100);
            $lbl = !empty($ev->event_date) ? date('M j', strtotime($ev->event_date)) : '—';
          ?>
          <div class="fc-col">
            <div class="fc-bars">
              <?php if ($act): ?>
                <div class="fc-b actual" style="height:<?= $actH ?>%" title="Actual: <?= (int)$act ?>"></div>
              <?php endif; ?>
              <div class="fc-b forecast" style="height:<?= $frcH ?>%" title="Forecast: <?= $frc ?>"></div>
            </div>
            <div class="fc-lbl"><?= htmlspecialchars($lbl) ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty-msg">
        <span class="empty-ico">📊</span>
        No event data available.
      </div>
    <?php endif; ?>
  </div>

  <!-- Procurement Breakdown -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Procurement Spend Breakdown</h3>
        <p>By supplier category (<?= htmlspecialchars($monthLabel ?? date('F Y')) ?>)</p>
      </div>
    </div>

    <?php
      $proc = $procurement ?? [];
      $palette = ['#166534', '#D97706', '#E11D48', '#CBD5E1'];
    ?>

    <?php if (!empty($proc)): ?>
      <div style="display:flex;align-items:center;gap:24px;">
        <div class="donut-ring">
          <div class="donut-hole"><?= htmlspecialchars($monthShort ?? date('M')) ?></div>
        </div>
        <div class="legend-list">
          <?php foreach ($proc as $i => $p): ?>
            <div class="legend-item">
              <div class="legend-dot" style="background:<?= $palette[$i % count($palette)] ?>;"></div>
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
              <div class="proc-fill" style="width:<?= (float)$p->percentage ?>%;background:<?= $palette[$i % count($palette)] ?>;"></div>
            </div>
            <span class="proc-pct"><?= (float)$p->percentage ?>%</span>
            <span class="proc-amt">Rs. <?= number_format(($p->total_spend ?? 0) / 1000, 0) ?>K</span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty-msg">
        <span class="empty-ico">💰</span>
        No procurement data.
      </div>
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
        <p>Next 5</p>
      </div>
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/events" class="link-view-all">All →</a>
    </div>

    <div class="act-list">
      <?php if (!empty($upcomingEvents)): ?>
        <?php foreach ($upcomingEvents as $ev): ?>
          <?php
            $statusKey = strtolower($ev->status ?? '');
            $badgeMap = [
              'confirmed' => ['bg-green',  '#F0FDF4'],
              'tentative' => ['bg-orange', '#FFFBEB'],
              'upcoming'  => ['bg-teal',   '#F0F9FF'],
            ];
            [$badgeCls, $icoBg] = $badgeMap[$statusKey] ?? ['bg-gray', '#F8FAFC'];
            $evDate = !empty($ev->event_date) ? date('j M', strtotime($ev->event_date)) : '—';
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
        <div class="empty-msg">
          <span class="empty-ico">📅</span>
          No upcoming events.
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Inventory Health -->
  <div class="card">
    <div class="card-hdr"><h3>Inventory Health</h3></div>

    <?php
      $inv = $inventory ?? [];
      $normal  = (int)($inv['normal'] ?? 0);
      $below   = (int)($inv['below_min'] ?? 0);
      $near    = (int)($inv['near_expiry'] ?? 0);
      $expired = (int)($inv['expired'] ?? 0);
      $trend   = $inv['trend'] ?? [];
    ?>

    <div class="health-grid">
      <div class="health-item <?= $normal > 0 ? 'hi-normal' : '' ?>">
        <div class="h-val"><?= number_format($normal) ?></div>
        <div class="h-lbl">Items Normal</div>
      </div>
      <div class="health-item <?= $below > 0 ? 'hi-danger' : '' ?>">
        <div class="h-val"><?= $below ?></div>
        <div class="h-lbl">Below Min</div>
      </div>
      <div class="health-item <?= $near > 0 ? 'hi-warning' : '' ?>">
        <div class="h-val"><?= $near ?></div>
        <div class="h-lbl">Near Expiry</div>
      </div>
      <div class="health-item <?= $expired > 0 ? 'hi-danger' : '' ?>">
        <div class="h-val"><?= $expired ?></div>
        <div class="h-lbl">Expired</div>
      </div>
    </div>

    <?php if (!empty($trend)): ?>
      <div style="font-size:10.5px;color:var(--t3);font-weight:700;text-transform:uppercase;letter-spacing:0.6px;margin-bottom:8px;">
        Monthly Trend
      </div>
      <?php
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
      <div class="month-labels">
        <?php foreach ($trend as $t): ?>
          <span><?= htmlspecialchars($t[0]) ?></span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Variance Summary -->
  <div class="card">
    <div class="card-hdr">
      <div>
        <h3>Forecast Variance Summary</h3>
        <p>Last <?= count($variance ?? []) ?> events</p>
      </div>
    </div>

    <div class="var-rows">
      <?php if (!empty($variance)): ?>
        <?php foreach ($variance as $v): ?>
          <?php
            $varPct = (float)($v->variance_pct ?? 0);
            $varCls = $varPct >= 0 ? 'v-pos' : 'v-neg';
            $evDate = !empty($v->event_date) ? date('M j', strtotime($v->event_date)) : '—';
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
        <div class="empty-msg">
          <span class="empty-ico">📈</span>
          No variance data.
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>

<!-- ===== Alerts Row ===== -->
<div class="card">
  <div class="card-hdr"><h3>⚡ System Alerts</h3></div>

  <div class="alert-grid">
    <?php if (!empty($alerts)): ?>
      <?php foreach ($alerts as $a): ?>
        <?php
          $sev = strtolower($a->severity ?? 'info');
          $sevMap = [
            'danger'  => ['#FFF1F2', '🔴'],
            'warning' => ['#FFFBEB', '🟡'],
            'info'    => ['#F0F9FF', '📋'],
            'urgent'  => ['#FFF1F2', '⏰'],
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
      <div class="empty-msg" style="grid-column:1/-1;">
        <span class="empty-ico">✅</span>
        No active alerts. All systems normal.
      </div>
    <?php endif; ?>
  </div>
</div>