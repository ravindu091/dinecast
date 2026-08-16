<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — CEO Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/ceo.css">
</head>
<body>
<div class="dash">

  <!-- ====================================================
       SIDEBAR
       ==================================================== -->
  <aside class="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Overview</div>
    <nav>
      <div class="nav-link active" data-section="sec-overview" data-title="CEO Dashboard">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
          </svg>
        </span>
        <span class="nav-label">Overview</span>
      </div>

      <div class="nav-link" data-section="sec-events-ceo" data-title="Events">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
        </span>
        <span class="nav-label">Events</span>
      </div>

      <div class="nav-link" data-section="sec-procurement" data-title="Procurement">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6"/>
          </svg>
        </span>
        <span class="nav-label">Procurement</span>
      </div>

      <div class="nav-link" data-section="sec-inventory-ceo" data-title="Inventory">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
          </svg>
        </span>
        <span class="nav-label">Inventory</span>
      </div>

      <div class="sb-section">Management</div>

      <div class="nav-link" data-section="sec-pr-approval" data-title="PR Approvals">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 11 12 14 22 4"/>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
          </svg>
        </span>
        <span class="nav-label">PR Approvals</span>
      </div>

      <div class="nav-link" data-section="sec-users" data-title="Users">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
        </span>
        <span class="nav-label">Users</span>
      </div>

      <div class="nav-link" data-section="sec-reports" data-title="Reports">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>
          </svg>
        </span>
        <span class="nav-label">Reports &amp; Analytics</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar">AP</div>
        <div>
          <div class="sb-user-name">Amara Perera</div>
          <div class="sb-user-role">CEO / Super Admin</div>
        </div>
      </div>
      <div class="sb-logout" onclick="logout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        Logout
      </div>
    </div>
  </aside>

  <!-- ====================================================
       MAIN AREA
       ==================================================== -->
  <div class="main-area">

    <header class="topbar">
      <div class="topbar-left">
        <h1>CEO Dashboard</h1>
        <p>Welcome back, Amara!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        
        <button class="icon-btn" title="Notifications">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
          </svg>
        </button>
      </div>
    </header>

    <main class="content">

      <!-- ================================================
           OVERVIEW SECTION
           ================================================ -->
      <section id="sec-overview" class="section active">

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
              <button class="btn btn-ghost btn-sm" onclick="document.querySelector('[data-section=sec-events-ceo]').click()">All</button>
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

      </section>

      <!-- ================================================
           EVENTS SECTION
           ================================================ -->
      <section id="sec-events-ceo" class="section">
        <div class="sec-hdr"><h2>All Events</h2></div>
        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📅</div><div class="stat-val">19</div><div class="stat-lbl">Total This Month</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">11</div><div class="stat-lbl">Confirmed</div></div>
          <div class="stat c-orange"><div class="stat-ico">🔄</div><div class="stat-val">8</div><div class="stat-lbl">Tentative</div></div>
          <div class="stat c-purple"><div class="stat-ico">👥</div><div class="stat-val" style="font-size:20px;">3,214</div><div class="stat-lbl">Total Guests</div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><h3>Events — August 2026</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event</th><th>Date</th><th>Type</th><th>Guests</th><th>Menu</th><th>Forecast</th><th>Status</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – Perera</td><td>12/08</td><td>Wedding</td><td>200</td><td><span class="ico-yes">✓</span></td><td><span class="ico-yes">✓</span></td><td><span class="badge bg-green">Confirmed</span></td></tr>
                <tr><td class="tbl-main">Corporate Function – ABC Ltd</td><td>13/08</td><td>Function</td><td>45</td><td><span class="ico-no">✗</span></td><td><span class="ico-no">✗</span></td><td><span class="badge bg-orange">Tentative</span></td></tr>
                <tr><td class="tbl-main">Birthday Dinner – Silva</td><td>14/08</td><td>Birthday</td><td>20</td><td><span class="ico-yes">✓</span></td><td><span class="ico-yes">✓</span></td><td><span class="badge bg-green">Confirmed</span></td></tr>
                <tr><td class="tbl-main">Anniversary Gala – Fernando</td><td>15/08</td><td>Anniversary</td><td>14</td><td><span class="ico-no">✗</span></td><td><span class="ico-no">✗</span></td><td><span class="badge bg-orange">Tentative</span></td></tr>
                <tr><td class="tbl-main">Tech Conference – NovaTech</td><td>16/08</td><td>Conference</td><td>50</td><td><span class="ico-yes">✓</span></td><td><span class="ico-yes">✓</span></td><td><span class="badge bg-teal">Upcoming</span></td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board</td><td>20/08</td><td>Seminar</td><td>500</td><td><span class="ico-no">✗</span></td><td><span class="ico-no">✗</span></td><td><span class="badge bg-orange">Tentative</span></td></tr>
                <tr><td class="tbl-main">Gov Dinner – Ministry</td><td>22/08</td><td>Government</td><td>75</td><td><span class="ico-yes">✓</span></td><td><span class="ico-yes">✓</span></td><td><span class="badge bg-green">Confirmed</span></td></tr>
                <tr><td class="tbl-main">Institutional Lunch – State Bank</td><td>25/08</td><td>Institutional</td><td>300</td><td><span class="ico-no">✗</span></td><td><span class="ico-no">✗</span></td><td><span class="badge bg-orange">Tentative</span></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ================================================
           PROCUREMENT SECTION
           ================================================ -->
      <section id="sec-procurement" class="section">
        <div class="sec-hdr"><h2>Procurement Overview</h2></div>
        <div class="stats">
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">4</div><div class="stat-lbl">PRs Awaiting Approval</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">6</div><div class="stat-lbl">PRs Approved</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">1</div><div class="stat-lbl">Rejected</div></div>
          <div class="stat c-blue"><div class="stat-ico">💰</div><div class="stat-val" style="font-size:18px;">Rs. 1.24M</div><div class="stat-lbl">Total Spend (Aug)</div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><h3>Purchase Requisitions — Awaiting Approval</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>PR Ref</th><th>Created By</th><th>Items</th><th>Linked Event</th><th>Submitted</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td><span class="pr-ref">PR-0042</span></td>
                  <td style="color:var(--t2);font-size:13px;">Chef Sudath</td>
                  <td style="color:var(--t2);font-size:13px;">Chicken, Rice, Spices</td>
                  <td style="font-size:13px;font-weight:600;">Wedding Reception</td>
                  <td>05/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td>
                    <div class="acts">
                      <span class="act" onclick="showToast('✓ PR-0042 Approved!')">Approve</span>
                      <span class="act del" onclick="showToast('PR-0042 Rejected.','error')">Reject</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0044</span></td>
                  <td style="color:var(--t2);font-size:13px;">Chef Sudath</td>
                  <td style="color:var(--t2);font-size:13px;">Vegetables, Eggs, Flour</td>
                  <td style="font-size:13px;font-weight:600;">Birthday Dinner</td>
                  <td>06/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td>
                    <div class="acts">
                      <span class="act" onclick="showToast('✓ PR-0044 Approved!')">Approve</span>
                      <span class="act del" onclick="showToast('PR-0044 Rejected.','error')">Reject</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0045</span></td>
                  <td style="color:var(--t2);font-size:13px;">Chef Sudath</td>
                  <td style="color:var(--t2);font-size:13px;">Prawns, Cream, Cheese</td>
                  <td style="font-size:13px;font-weight:600;">Tech Conference</td>
                  <td>07/08/2026</td>
                  <td><span class="badge bg-red">Rejected</span></td>
                  <td><div class="acts"><span class="act">View Remarks</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0047</span></td>
                  <td style="color:var(--t2);font-size:13px;">Chef Sudath</td>
                  <td style="color:var(--t2);font-size:13px;">Beef, Mushrooms, Cream</td>
                  <td style="font-size:13px;font-weight:600;">Gov Dinner</td>
                  <td>09/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td>
                    <div class="acts">
                      <span class="act" onclick="showToast('✓ PR-0047 Approved!')">Approve</span>
                      <span class="act del" onclick="showToast('PR-0047 Rejected.','error')">Reject</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ================================================
           INVENTORY SECTION (CEO view)
           ================================================ -->
      <section id="sec-inventory-ceo" class="section">
        <div class="sec-hdr"><h2>Inventory Overview</h2></div>
        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📦</div><div class="stat-val">1,284</div><div class="stat-lbl">Total Ingredient Lines</div></div>
          <div class="stat c-red"><div class="stat-ico">⬇️</div><div class="stat-val">12</div><div class="stat-lbl">Below Minimum</div></div>
          <div class="stat c-orange"><div class="stat-ico">⏰</div><div class="stat-val">8</div><div class="stat-lbl">Near Expiry</div></div>
          <div class="stat c-purple"><div class="stat-ico">❌</div><div class="stat-val">3</div><div class="stat-lbl">Expired (Action Needed)</div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><h3>Critical Items — Below Minimum Stock</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Ingredient</th><th>Category</th><th>Min Stock</th><th>Current</th><th>Shortfall</th><th>Action</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Fresh Salmon Fillet</td><td>Meat &amp; Seafood</td><td>10 kg</td><td style="color:var(--danger);font-weight:700;">2.5 kg</td><td><span class="badge bg-red">-7.5 kg</span></td><td><div class="acts"><span class="act">Raise PR</span></div></td></tr>
                <tr><td class="tbl-main">Unsalted Butter</td><td>Dairy</td><td>5 kg</td><td style="color:var(--danger);font-weight:700;">0.8 kg</td><td><span class="badge bg-red">-4.2 kg</span></td><td><div class="acts"><span class="act">Raise PR</span></div></td></tr>
                <tr><td class="tbl-main">Fresh Curry Leaves</td><td>Spices &amp; Herbs</td><td>500 g</td><td style="color:var(--danger);font-weight:700;">50 g</td><td><span class="badge bg-red">-450 g</span></td><td><div class="acts"><span class="act">Raise PR</span></div></td></tr>
                <tr><td class="tbl-main">Garlic (Peeled)</td><td>Spices &amp; Herbs</td><td>1 kg</td><td style="color:var(--danger);font-weight:700;">300 g</td><td><span class="badge bg-red">-700 g</span></td><td><div class="acts"><span class="act">Raise PR</span></div></td></tr>
                <tr><td class="tbl-main">Lamb Shoulder (Bone-in)</td><td>Meat &amp; Seafood</td><td>6 kg</td><td style="color:var(--warning);font-weight:700;">4 kg</td><td><span class="badge bg-orange">-2 kg</span></td><td><div class="acts"><span class="act">Raise PR</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ================================================
           PR APPROVALS SECTION
           ================================================ -->
      <section id="sec-pr-approval" class="section">
        <div class="sec-hdr"><h2>PR Approvals</h2></div>
        <div class="stats">
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">4</div><div class="stat-lbl">Pending Your Approval</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">6</div><div class="stat-lbl">Approved This Month</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">1</div><div class="stat-lbl">Rejected</div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><h3>All Purchase Requisitions</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>PR Ref</th><th>Raised By</th><th>Items</th><th>Value Est.</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td><span class="pr-ref">PR-0043</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Salmon, Butter, Lemon</td><td>Rs. 48,500</td><td>06/08/2026</td><td><span class="badge bg-green">Approved</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td><span class="pr-ref">PR-0046</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Lamb, Herbs, Red Wine</td><td>Rs. 72,200</td><td>08/08/2026</td><td><span class="badge bg-green">Approved</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td><span class="pr-ref">PR-0042</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Chicken, Rice, Spices</td><td>Rs. 34,800</td><td>05/08/2026</td><td><span class="badge bg-orange">Pending</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td><span class="pr-ref">PR-0044</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Vegetables, Eggs, Flour</td><td>Rs. 12,400</td><td>06/08/2026</td><td><span class="badge bg-orange">Pending</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td><span class="pr-ref">PR-0045</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Prawns, Cream, Cheese</td><td>Rs. 28,600</td><td>07/08/2026</td><td><span class="badge bg-red">Rejected</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td><span class="pr-ref">PR-0047</span></td><td>Chef Sudath</td><td style="font-size:13px;color:var(--t2);">Beef, Mushrooms, Cream</td><td>Rs. 25,100</td><td>09/08/2026</td><td><span class="badge bg-orange">Pending</span></td><td><div class="acts"><span class="act del">View</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ================================================
           USERS SECTION
           ================================================ -->
      <section id="sec-users" class="section">
        <div class="sec-hdr"><h2>Users</h2><button class="btn btn-primary">+ Add User</button></div>
        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">👤</div><div class="stat-val">3</div><div class="stat-lbl">Active Users</div></div>
          <div class="stat c-green"><div class="stat-ico">🟢</div><div class="stat-val">2</div><div class="stat-lbl">Currently Online</div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><h3>All System Users</h3></div>
          <div style="padding:4px 0;">
            <div class="usr-row">
              <div class="usr-av">AP</div>
              <div>
                <div class="usr-name">Amara Perera</div>
                <div class="usr-role">CEO / Super Admin &nbsp;·&nbsp; ID: DC-CEO-01</div>
              </div>
              <div class="usr-status"><span class="badge bg-green">Online</span></div>
              <div class="acts"><span class="act">Edit</span></div>
            </div>
            <div class="usr-row">
              <div class="usr-av" style="background:var(--info-bg);color:var(--info);">SB</div>
              <div>
                <div class="usr-name">Sudath Bandaranayake</div>
                <div class="usr-role">Kitchen Manager (Chef) &nbsp;·&nbsp; ID: DC-CHF-42</div>
              </div>
              <div class="usr-status"><span class="badge bg-green">Online</span></div>
              <div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div>
            </div>
            <div class="usr-row">
              <div class="usr-av" style="background:var(--purple-bg);color:var(--purple);">NK</div>
              <div>
                <div class="usr-name">Nadeesha Kumari</div>
                <div class="usr-role">Store Manager &nbsp;·&nbsp; ID: DC-STR-11</div>
              </div>
              <div class="usr-status"><span class="badge bg-gray">Offline</span></div>
              <div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div>
            </div>
          </div>
        </div>
      </section>

      <!-- ================================================
           REPORTS SECTION
           ================================================ -->
      <section id="sec-reports" class="section">
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
      </section>

    </main>
  </div><!-- /main-area -->
</div><!-- /dash -->

<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/ceo.js"></script>
</body>
</html>
