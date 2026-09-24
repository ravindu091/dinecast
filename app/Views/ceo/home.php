<!-- ================================================
     OVERVIEW SECTION
     ================================================ -->

<!-- Welcome -->
<div class="welcome">
  <div class="welcome-txt">
    <h2>Good to see you, Amara!</h2>
    <p>Here's the full operational overview for DineCast.</p>
    <div class="user-id">ID: DC-CEO-01 &nbsp;·&nbsp; Super Admin</div>
  </div>
  <div class="welcome-illo">📊</div>
</div>

<!-- KPI Bar -->
<div class="kpi-bar">
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--success-bg);">📅</div>
      <span class="kpi-tag up">+3</span>
    </div>
    <div class="kpi-val">19</div>
    <div class="kpi-lbl">Events This Month</div>
  </div>
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--info-bg);">👥</div>
      <span class="kpi-tag up">+8%</span>
    </div>
    <div class="kpi-val">3,214</div>
    <div class="kpi-lbl">Total Guests Served</div>
  </div>
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--purple-bg);">🎯</div>
      <span class="kpi-tag up">+4%</span>
    </div>
    <div class="kpi-val">92%</div>
    <div class="kpi-lbl">Forecast Accuracy</div>
  </div>
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--warning-bg);">💰</div>
      <span class="kpi-tag down">-2%</span>
    </div>
    <div class="kpi-val" style="font-size:16px;">Rs. 1.24M</div>
    <div class="kpi-lbl">Procurement Spend</div>
  </div>
  <div class="kpi">
    <div class="kpi-top">
      <div class="kpi-ico" style="background:var(--danger-bg);">⚠️</div>
      <span class="kpi-tag down">12 items</span>
    </div>
    <div class="kpi-val">12</div>
    <div class="kpi-lbl">Low Stock Items</div>
  </div>
</div>

<!-- Charts Row -->
<div class="grid-2">

  <!-- Forecast vs Actual Chart -->
  <div class="card">
    <div class="card-hdr">
      <div><h3>Forecast vs Actual Guests</h3><p style="font-size:11.5px;color:var(--t3);">Last 8 events</p></div>
    </div>
    <div class="chart-legend">
      <span><span class="leg-dot" style="background:var(--primary);"></span>Actual</span>
      <span><span class="leg-dot" style="background:#93C5FD;"></span>Forecast</span>
    </div>
    <div class="forecast-chart">
      <?php
      $events = [
        ['lbl'=>'Jul 1','act'=>186,'frc'=>180],
        ['lbl'=>'Jul 8','act'=>222,'frc'=>300],
        ['lbl'=>'Jul 15','act'=>67,'frc'=>75],
        ['lbl'=>'Jul 20','act'=>485,'frc'=>500],
        ['lbl'=>'Aug 1','act'=>200,'frc'=>200],
        ['lbl'=>'Aug 12','act'=>195,'frc'=>200],
        ['lbl'=>'Aug 13','act'=>null,'frc'=>45],
        ['lbl'=>'Aug 14','act'=>null,'frc'=>20],
      ];
      $max = 530;
      foreach ($events as $ev):
        $actH = $ev['act'] ? round(($ev['act']/$max)*100) : 0;
        $frcH = round(($ev['frc']/$max)*100);
      ?>
      <div class="fc-col">
        <div class="fc-bars">
          <?php if($ev['act']): ?>
          <div class="fc-b actual" style="height:<?= $actH ?>%" title="Actual: <?= $ev['act'] ?>"></div>
          <?php endif; ?>
          <div class="fc-b forecast" style="height:<?= $frcH ?>%" title="Forecast: <?= $ev['frc'] ?>"></div>
        </div>
        <div class="fc-lbl"><?= $ev['lbl'] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Procurement Breakdown -->
  <div class="card">
    <div class="card-hdr">
      <div><h3>Procurement Spend Breakdown</h3><p style="font-size:11.5px;color:var(--t3);">By supplier category (August 2026)</p></div>
    </div>
    <div style="display:flex;align-items:center;gap:24px;margin-bottom:20px;">
      <div class="donut-ring">
        <div class="donut-hole">Aug</div>
      </div>
      <div class="legend-list">
        <div class="legend-item"><div class="legend-dot" style="background:var(--primary);"></div><span class="legend-label">Meat &amp; Seafood</span><span class="legend-val">68%</span></div>
        <div class="legend-item"><div class="legend-dot" style="background:var(--warning);"></div><span class="legend-label">Dairy</span><span class="legend-val">14%</span></div>
        <div class="legend-item"><div class="legend-dot" style="background:var(--danger);"></div><span class="legend-label">Dry Goods</span><span class="legend-val">9%</span></div>
        <div class="legend-item"><div class="legend-dot" style="background:#CBD5E1;"></div><span class="legend-label">Vegetables &amp; Herbs</span><span class="legend-val">9%</span></div>
      </div>
    </div>
    <div class="proc-rows">
      <div class="proc-row">
        <span class="proc-name">Meat &amp; Seafood</span>
        <div class="proc-bar"><div class="proc-fill" style="width:68%;"></div></div>
        <span class="proc-pct">68%</span>
        <span class="proc-amt">Rs. 843K</span>
      </div>
      <div class="proc-row">
        <span class="proc-name">Dairy</span>
        <div class="proc-bar"><div class="proc-fill" style="width:14%;background:var(--warning);"></div></div>
        <span class="proc-pct">14%</span>
        <span class="proc-amt">Rs. 174K</span>
      </div>
      <div class="proc-row">
        <span class="proc-name">Dry Goods</span>
        <div class="proc-bar"><div class="proc-fill" style="width:9%;background:var(--danger);"></div></div>
        <span class="proc-pct">9%</span>
        <span class="proc-amt">Rs. 112K</span>
      </div>
      <div class="proc-row">
        <span class="proc-name">Vegetables &amp; Herbs</span>
        <div class="proc-bar"><div class="proc-fill" style="width:9%;background:#CBD5E1;"></div></div>
        <span class="proc-pct">9%</span>
        <span class="proc-amt">Rs. 112K</span>
      </div>
    </div>
  </div>
</div>

<!-- Second Row: Events + Inventory Health + Variance -->
<div class="grid-3">

  <!-- Upcoming Events -->
  <div class="card">
    <div class="card-hdr">
      <div><h3>Upcoming Events</h3><p style="font-size:11.5px;color:var(--t3);">Next 5</p></div>
      <a href="<?= $baseUrl ?>/ceo/events" class="btn btn-ghost btn-sm">All</a>
    </div>
    <div class="act-list">
      <div class="act-item">
        <div class="act-ico" style="background:var(--success-bg);">📅</div>
        <div class="act-body"><div class="act-title">Wedding Reception – Perera</div><div class="act-desc">12 Aug &nbsp;·&nbsp; 200 guests</div></div>
        <span class="badge bg-green" style="font-size:10.5px;">Confirmed</span>
      </div>
      <div class="act-item">
        <div class="act-ico" style="background:var(--warning-bg);">📅</div>
        <div class="act-body"><div class="act-title">Corporate Function – ABC Ltd</div><div class="act-desc">13 Aug &nbsp;·&nbsp; 45 guests</div></div>
        <span class="badge bg-orange" style="font-size:10.5px;">Tentative</span>
      </div>
      <div class="act-item">
        <div class="act-ico" style="background:var(--success-bg);">📅</div>
        <div class="act-body"><div class="act-title">Birthday Dinner – Silva</div><div class="act-desc">14 Aug &nbsp;·&nbsp; 20 guests</div></div>
        <span class="badge bg-green" style="font-size:10.5px;">Confirmed</span>
      </div>
      <div class="act-item">
        <div class="act-ico" style="background:var(--info-bg);">📅</div>
        <div class="act-body"><div class="act-title">Tech Conference – NovaTech</div><div class="act-desc">16 Aug &nbsp;·&nbsp; 50 guests</div></div>
        <span class="badge bg-teal" style="font-size:10.5px;">Upcoming</span>
      </div>
      <div class="act-item">
        <div class="act-ico" style="background:var(--warning-bg);">📅</div>
        <div class="act-body"><div class="act-title">Seminar – Edu Board</div><div class="act-desc">20 Aug &nbsp;·&nbsp; 500 guests</div></div>
        <span class="badge bg-orange" style="font-size:10.5px;">Tentative</span>
      </div>
    </div>
  </div>

  <!-- Inventory Health -->
  <div class="card">
    <div class="card-hdr"><h3>Inventory Health</h3></div>
    <div class="health-grid" style="margin-bottom:18px;">
      <div class="health-item">
        <div class="h-val" style="color:var(--success);">1,264</div>
        <div class="h-lbl">Items Normal</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--danger);">12</div>
        <div class="h-lbl">Below Min</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--warning);">8</div>
        <div class="h-lbl">Near Expiry</div>
      </div>
      <div class="health-item">
        <div class="h-val" style="color:var(--danger);">3</div>
        <div class="h-lbl">Expired</div>
      </div>
    </div>
    <div style="font-size:11.5px;color:var(--t3);font-weight:700;text-transform:uppercase;letter-spacing:0.6px;margin-bottom:10px;">Monthly Trend</div>
    <div class="month-trend">
      <div class="mt-bar" style="height:40%;"></div>
      <div class="mt-bar" style="height:55%;"></div>
      <div class="mt-bar" style="height:32%;"></div>
      <div class="mt-bar hi" style="height:70%;"></div>
      <div class="mt-bar" style="height:48%;"></div>
      <div class="mt-bar" style="height:38%;"></div>
      <div class="mt-bar hi" style="height:62%;"></div>
      <div class="mt-bar cur" style="height:82%;"></div>
    </div>
    <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--t3);margin-top:4px;">
      <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span>
      <span>May</span><span>Jun</span><span>Jul</span><span>Aug</span>
    </div>
  </div>

  <!-- Variance Summary -->
  <div class="card">
    <div class="card-hdr"><h3>Forecast Variance Summary</h3><p style="font-size:11.5px;color:var(--t3);">Last 6 events</p></div>
    <div class="var-rows">
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Wedding Perera</div><div class="var-sub">Jul 1 · 180 reg</div></div>
        <span class="var-val v-pos">+3.3%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Institutional Lunch</div><div class="var-sub">Jul 8 · 300 reg</div></div>
        <span class="var-val v-neg">-26.0%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Gov Dinner – Ministry</div><div class="var-sub">Jul 15 · 75 reg</div></div>
        <span class="var-val v-neg">-10.7%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Seminar – Edu Board</div><div class="var-sub">Jul 20 · 500 reg</div></div>
        <span class="var-val v-neg">-3.0%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Wedding Reception</div><div class="var-sub">Aug 1 · 200 reg</div></div>
        <span class="var-val v-neg">-2.5%</span>
      </div>
      <div class="var-row">
        <div class="var-left"><div class="var-lbl">Product Launch</div><div class="var-sub">Aug 12 · 200 reg</div></div>
        <span class="var-val v-neg">-2.5%</span>
      </div>
    </div>
  </div>
</div>

<!-- Alerts Row -->
<div class="card">
  <div class="card-hdr"><h3>⚡ System Alerts</h3></div>
  <div class="alert-grid">
    <div class="alert-card">
      <div class="alert-ico" style="background:var(--danger-bg);">🔴</div>
      <div>
        <div class="alert-title">12 Ingredients Below Minimum</div>
        <div class="alert-desc">Including Salmon, Butter, and Curry Leaves. Review PRs urgently.</div>
      </div>
    </div>
    <div class="alert-card">
      <div class="alert-ico" style="background:var(--warning-bg);">🟡</div>
      <div>
        <div class="alert-title">PR-0045 Rejected — Rework Pending</div>
        <div class="alert-desc">Chef Sudath must revise the Prawn Cocktail PR before Aug 16.</div>
      </div>
    </div>
    <div class="alert-card">
      <div class="alert-ico" style="background:var(--warning-bg);">⏰</div>
      <div>
        <div class="alert-title">Fresh Prawns (B-046) Expire Aug 13</div>
        <div class="alert-desc">Batch worth Rs. 9,600 at risk. Allocate to soonest event.</div>
      </div>
    </div>
    <div class="alert-card">
      <div class="alert-ico" style="background:var(--info-bg);">📋</div>
      <div>
        <div class="alert-title">4 Events Without Menu Assigned</div>
        <div class="alert-desc">Cannot generate forecast until menu is linked. Action needed.</div>
      </div>
    </div>
  </div>
</div>
