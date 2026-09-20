<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Kitchen Manager Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/kitchen.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/sidebar.css">
</head>
<body>
<div class="dash">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Operations</div>
    <nav class="sb-links">
      <div class="nav-link active" data-section="sec-home" data-title="Kitchen Manager Dashboard">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
        <span class="nav-label">Home</span>
      </div>
      <div class="nav-link" data-section="sec-events" data-title="Events">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
        <span class="nav-label">Events</span>
      </div>
      <div class="nav-link" data-section="sec-bookings" data-title="Bookings">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
        <span class="nav-label">Bookings</span>
      </div>
      <div class="nav-link" data-section="sec-forecast" data-title="Forecast">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>
        <span class="nav-label">Forecast</span>
      </div>
      <div class="nav-link" data-section="sec-pr" data-title="Purchase Requisitions">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6"/></svg></span>
        <span class="nav-label">Purchase Requisitions</span>
      </div>
      <div class="nav-link" data-section="sec-attendance" data-title="Attendance">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <span class="nav-label">Attendance</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar" style="background:var(--info-bg);color:var(--info);">SB</div>
        <div>
          <div class="sb-user-name">Sudath Bandaranayake</div>
          <div class="sb-user-role">Kitchen Manager</div>
        </div>
      </div>
      <div class="sb-logout" onclick="logout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Logout
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main-area">
    <header class="topbar">
      <div class="topbar-left">
        <h1>Kitchen Manager Dashboard</h1>
        <p>Welcome back, Sudath!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></button>
      </div>
    </header>

    <main class="content">

      <!-- HOME -->
      <section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>Welcome to Kitchen Manager Dashboard</h2>
            <p>Manage events, generate forecasts and submit purchase requisitions.</p>
            <div class="user-id">ID: DC-KM-07 &nbsp;·&nbsp; Kitchen Manager</div>
          </div>
          <div class="welcome-illo">👨‍💼</div>
        </div>

        <!-- Big Action Cards  -->
        <div class="action-cards action-cards-5">
          <div class="action-card" onclick="document.querySelector('[data-section=sec-events]').click()">
            <div class="ac-icon">📅</div>
            <div class="ac-title">Events</div>
            <div class="ac-badge">8 upcoming</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-bookings]').click()">
            <div class="ac-icon">✅</div>
            <div class="ac-title">Bookings</div>
            <div class="ac-badge">12 bookings</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-forecast]').click()">
            <div class="ac-icon">📈</div>
            <div class="ac-title">Forecast</div>
            <div class="ac-badge warn">3 short items</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-pr]').click()">
            <div class="ac-icon">🛒</div>
            <div class="ac-title">Purchase Req.</div>
            <div class="ac-badge">4 submitted</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-attendance]').click()">
            <div class="ac-icon">👥</div>
            <div class="ac-title">Attendance</div>
            <div class="ac-badge">Log actual</div>
          </div>
        </div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📅</div><div class="stat-val">8</div><div class="stat-lbl">Upcoming Events</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">5</div><div class="stat-lbl">Confirmed</div></div>
          <div class="stat c-orange"><div class="stat-ico">⏰</div><div class="stat-val">3</div><div class="stat-lbl">Tentative</div></div>
          <div class="stat c-purple"><div class="stat-ico">📋</div><div class="stat-val">1</div><div class="stat-lbl">PR Rejected / Redo</div></div>
        </div>
      </section>

      <!-- EVENTS -->
      <section id="sec-events" class="section">
        <div class="sec-hdr"><h2>Events</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-event')">+ New Event</button></div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📅</div><div class="stat-val">8</div><div class="stat-lbl">Total Upcoming</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">5</div><div class="stat-lbl">Confirmed</div></div>
          <div class="stat c-orange"><div class="stat-ico">🔄</div><div class="stat-val">3</div><div class="stat-lbl">Tentative</div></div>
          <div class="stat c-purple"><div class="stat-ico">👥</div><div class="stat-val">3,214</div><div class="stat-lbl">Total Guests (Reg.)</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Events — August 2026</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event Name</th><th>Type</th><th>Date</th><th>Reg. Guests</th><th>Att. Factor</th><th>Forecast Guests</th><th>Menu</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – Perera</td><td style="font-size:12px;color:var(--t2);">Wedding</td><td>12/08/26</td><td>200</td><td>80%</td><td style="font-weight:700;color:var(--primary);">160</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Corporate Function – ABC Ltd</td><td style="font-size:12px;color:var(--t2);">Corporate</td><td>13/08/26</td><td>45</td><td>60%</td><td style="font-weight:700;color:var(--warning);">27</td><td><span class="ico-no">✗ No Menu</span></td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Birthday Dinner – Silva</td><td style="font-size:12px;color:var(--t2);">Birthday</td><td>14/08/26</td><td>20</td><td>80%</td><td style="font-weight:700;color:var(--primary);">16</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Tech Conference – NovaTech</td><td style="font-size:12px;color:var(--t2);">Conference</td><td>16/08/26</td><td>50</td><td>80%</td><td style="font-weight:700;color:var(--primary);">40</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board</td><td style="font-size:12px;color:var(--t2);">Seminar</td><td>20/08/26</td><td>500</td><td>60%</td><td style="font-weight:700;color:var(--warning);">300</td><td><span class="ico-no">✗ No Menu</span></td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add Event Modal -->
        <div class="modal-overlay" id="modal-add-event" onclick="if(event.target===this)toggleModal('modal-add-event')">
          <div class="modal">
            <div class="modal-hdr"><h3>Add New Event</h3><button class="modal-close" onclick="toggleModal('modal-add-event')">✕</button></div>
            <form onsubmit="submitForm(event,'Event created!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Event Name *</label><input type="text" placeholder="e.g. Wedding Reception – Perera" required></div>
                <div class="form-grp"><label>Event Type</label><select><option>Wedding</option><option>Corporate</option><option>Birthday</option><option>Conference</option><option>Seminar</option><option>Government</option><option>Other</option></select></div>
                <div class="form-grp"><label>Event Date *</label><input type="date" required></div>
                <div class="form-grp"><label>Registered Guests *</label><input type="number" placeholder="e.g. 200" required></div>
                <div class="form-grp"><label>Attendance Factor (%)</label><input type="number" value="80" min="0" max="100"></div>
                <div class="form-grp"><label>Assign Menu</label><select><option>— Select Menu —</option><option>Wedding Banquet Menu A</option><option>Corporate Lunch Set</option><option>Festive Dinner Buffet</option></select></div>
                <div class="form-grp"><label>Status</label><select><option>Confirmed</option><option>Tentative</option></select></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Event</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-event')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- BOOKINGS -->
      <section id="sec-bookings" class="section">
        <div class="sec-hdr"><h2>Bookings</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-booking')">+ New Booking</button></div>

        <div class="card">
          <div class="card-hdr"><h3>All Bookings</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Booking Ref</th><th>Client / Organisation</th><th>Linked Event</th><th>Guests</th><th>Booked On</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td><span class="pr-ref">BK-0089</span></td><td class="tbl-main">Perera Family</td><td style="font-size:13px;color:var(--t2);">Wedding Reception – Perera</td><td>200</td><td>01/07/26</td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0090</span></td><td class="tbl-main">ABC Ltd HR Dept.</td><td style="font-size:13px;color:var(--t2);">Corporate Function – ABC Ltd</td><td>45</td><td>05/07/26</td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0091</span></td><td class="tbl-main">Silva Family</td><td style="font-size:13px;color:var(--t2);">Birthday Dinner – Silva</td><td>20</td><td>10/07/26</td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0092</span></td><td class="tbl-main">NovaTech (Pvt) Ltd</td><td style="font-size:13px;color:var(--t2);">Tech Conference – NovaTech</td><td>50</td><td>15/07/26</td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0093</span></td><td class="tbl-main">Ministry of Education</td><td style="font-size:13px;color:var(--t2);">Seminar – Edu Board</td><td>500</td><td>20/07/26</td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-overlay" id="modal-add-booking" onclick="if(event.target===this)toggleModal('modal-add-booking')">
          <div class="modal">
            <div class="modal-hdr"><h3>New Booking</h3><button class="modal-close" onclick="toggleModal('modal-add-booking')">✕</button></div>
            <form onsubmit="submitForm(event,'Booking created!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Client / Organisation *</label><input type="text" placeholder="e.g. Perera Family" required></div>
                <div class="form-grp"><label>Linked Event *</label><select required><option>— Select Event —</option><option>Wedding Reception – Perera</option><option>Corporate Function – ABC Ltd</option></select></div>
                <div class="form-grp"><label>Guest Count *</label><input type="number" placeholder="e.g. 200" required></div>
                <div class="form-grp"><label>Contact Name</label><input type="text" placeholder="Contact person"></div>
                <div class="form-grp"><label>Contact Phone</label><input type="text" placeholder="e.g. 077-XXXXXXX"></div>
                <div class="form-grp"><label>Status</label><select><option>Confirmed</option><option>Tentative</option></select></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Booking</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-booking')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- FORECAST -->
      <section id="sec-forecast" class="section">
        <div class="sec-hdr"><h2>Forecast</h2><button class="btn btn-primary" onclick="showToast('Forecast generated!')">+ Generate New Forecast</button></div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">👥</div><div class="stat-val">1,078</div><div class="stat-lbl">This Week's Forecast Guests</div></div>
          <div class="stat c-red"><div class="stat-ico">⚠️</div><div class="stat-val">3</div><div class="stat-lbl">Ingredients Short vs Stock</div></div>
          <div class="stat c-orange"><div class="stat-ico">📅</div><div class="stat-val">Aug 19</div><div class="stat-lbl">Next Scheduled Run</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>Forecast Records</h3><p style="font-size:11.5px;color:var(--t3);">Click "View" to see ingredient-level breakdown · Click "Generate PR" to create a draft PR</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event / Date Range</th><th>Generated On</th><th>Forecast Guests</th><th>Linked PR</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – 12 Aug</td><td style="font-size:12px;color:var(--t3);">10/08/2026</td><td style="font-weight:700;">160</td><td><span class="pr-ref">PR-0049</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td class="tbl-main">Corporate Function – 13 Aug</td><td style="font-size:12px;color:var(--t3);">10/08/2026</td><td style="font-weight:700;">27</td><td><span class="pr-ref">PR-0050</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td class="tbl-main">Birthday Dinner – 14 Aug</td><td style="font-size:12px;color:var(--t3);">11/08/2026</td><td style="font-weight:700;">16</td><td><span style="color:var(--t3);font-size:12px;">— not yet</span></td><td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PR draft created!')">Generate PR</span></div></td></tr>
                <tr><td class="tbl-main">Tech Conference – 16 Aug</td><td style="font-size:12px;color:var(--t3);">11/08/2026</td><td style="font-weight:700;">40</td><td><span style="color:var(--t3);font-size:12px;">— not yet</span></td><td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PR draft created!')">Generate PR</span></div></td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board – 20 Aug</td><td style="font-size:12px;color:var(--t3);">—</td><td style="color:var(--t3);">Pending (no menu)</td><td>—</td><td><div class="acts"><span class="act" style="opacity:.5;cursor:default;">No Menu</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Ingredient Shortfall -->
        <div class="card">
          <div class="card-hdr"><h3>⚠️ Ingredient Shortfall (This Week)</h3><p style="font-size:11.5px;color:var(--t3);">Forecast demand vs current stock</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Available Stock</th><th>Safety Stock</th><th>PR Qty (Calculated)</th><th>Status</th></tr></thead>
              <tbody>
                <tr>
                  <td class="tbl-main">Fresh Salmon Fillet</td>
                  <td>48 kg</td>
                  <td style="color:var(--danger);font-weight:700;">2.5 kg</td>
                  <td>4.8 kg (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">50.3 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Fresh Curry Leaves</td>
                  <td>1.2 kg</td>
                  <td style="color:var(--danger);font-weight:700;">50 g</td>
                  <td>120 g (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">1.27 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Unsalted Butter</td>
                  <td>8 kg</td>
                  <td style="color:var(--danger);font-weight:700;">0.8 kg</td>
                  <td>0.8 kg (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">8 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Basmati Rice</td>
                  <td>60 kg</td>
                  <td>88 kg</td>
                  <td>6 kg (10%)</td>
                  <td style="color:var(--t3);">0 kg (covered)</td>
                  <td><span class="badge bg-green">Covered</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Chicken (Whole)</td>
                  <td>30 kg</td>
                  <td>35.5 kg</td>
                  <td>3 kg (10%)</td>
                  <td style="color:var(--t3);">0 kg (covered)</td>
                  <td><span class="badge bg-green">Covered</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- PURCHASE REQUISITIONS -->
      <section id="sec-pr" class="section">
        <div class="sec-hdr"><h2>Purchase Requisitions</h2><button class="btn btn-primary" onclick="showToast('New PR draft created!')">+ New PR</button></div>

        <div class="stats">
          <div class="stat c-gray"><div class="stat-ico">📝</div><div class="stat-val">2</div><div class="stat-lbl">Drafts</div></div>
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">4</div><div class="stat-lbl">Submitted — Awaiting Approval</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">1</div><div class="stat-lbl">Rejected — Needs Rework</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">6</div><div class="stat-lbl">Approved</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Purchase Requisitions</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>PR Ref</th><th>Items</th><th>Linked Forecast / Event</th><th>Created</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td><span class="pr-ref">PR-0043</span></td>
                  <td style="font-size:13px;color:var(--t2);">A, B, C</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 1–7 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">01/08/2026</td>
                  <td><span class="badge bg-orange">Submitted</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0044</span></td>
                  <td style="font-size:13px;color:var(--t2);">A, B</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 10–15 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">05/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0045</span></td>
                  <td style="font-size:13px;color:var(--t2);">X, Y, Z</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 28–Feb 1</a></td>
                  <td style="font-size:12px;color:var(--t3);">06/08/2026</td>
                  <td><span class="badge bg-gray">Draft</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act" onclick="showToast('PR submitted for approval!')">Submit</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0046</span></td>
                  <td style="font-size:13px;color:var(--t2);">Q, R, S, T</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Feb 7–14 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">07/08/2026</td>
                  <td><span class="badge bg-red">Rejected</span></td>
                  <td><div class="acts"><span class="act">View Remarks</span><span class="act">Redo</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0047</span></td>
                  <td style="font-size:13px;color:var(--t2);">L, M</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Mar 5–9 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">08/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0048</span></td>
                  <td style="font-size:13px;color:var(--t2);">Z, Q, B</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Apr 13–14 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">09/08/2026</td>
                  <td><span class="badge bg-gray">Draft</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act" onclick="showToast('PR submitted for approval!')">Submit</span></div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ATTENDANCE -->
      <section id="sec-attendance" class="section">
        <div class="sec-hdr"><h2>Attendance History</h2><button class="btn btn-primary" onclick="toggleModal('modal-log-attendance')">+ Log Attendance</button></div>

        <div class="card">
          <div class="card-hdr"><h3>Registered vs Actual Attendance</h3><p style="font-size:11.5px;color:var(--t3);">Used to auto-refine attendance factors</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event</th><th>Date</th><th>Registered</th><th>Actual</th><th>Variance</th><th>Att. Factor (Applied)</th><th>Revised Factor</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – Perera</td><td>01/07/26</td><td>180</td><td style="font-weight:700;">186</td><td><span class="var-val v-pos">+3.3%</span></td><td>80%</td><td style="color:var(--success);font-weight:700;">103%</td></tr>
                <tr><td class="tbl-main">Institutional Lunch</td><td>08/07/26</td><td>300</td><td style="font-weight:700;">222</td><td><span class="var-val v-neg">-26.0%</span></td><td>80%</td><td style="color:var(--danger);font-weight:700;">74%</td></tr>
                <tr><td class="tbl-main">Gov Dinner – Ministry</td><td>15/07/26</td><td>75</td><td style="font-weight:700;">67</td><td><span class="var-val v-neg">-10.7%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">89%</td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board</td><td>20/07/26</td><td>500</td><td style="font-weight:700;">485</td><td><span class="var-val v-neg">-3.0%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">97%</td></tr>
                <tr><td class="tbl-main">Wedding Reception (Aug 1)</td><td>01/08/26</td><td>200</td><td style="font-weight:700;">195</td><td><span class="var-val v-neg">-2.5%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">97.5%</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Log Attendance Modal -->
        <div class="modal-overlay" id="modal-log-attendance" onclick="if(event.target===this)toggleModal('modal-log-attendance')">
          <div class="modal">
            <div class="modal-hdr"><h3>Log Actual Attendance</h3><button class="modal-close" onclick="toggleModal('modal-log-attendance')">✕</button></div>
            <form onsubmit="submitForm(event,'Attendance logged!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Event *</label><select required><option>Wedding Reception – Perera (12 Aug)</option><option>Tech Conference – NovaTech (16 Aug)</option></select></div>
                <div class="form-grp"><label>Registered Guest Count</label><input type="number" placeholder="Auto-filled" readonly></div>
                <div class="form-grp"><label>Actual Guests Served *</label><input type="number" placeholder="e.g. 186" required></div>
                <div class="form-grp form-full"><label>Notes</label><textarea placeholder="Any notes on variance…"></textarea></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Save Attendance</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-log-attendance')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/kitchen.js"></script>
</body>
</html>
