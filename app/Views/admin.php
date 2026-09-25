<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Admin Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/admin.css">
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

    <div class="sb-section">Administration</div>
    <nav class="sb-links">
      <div class="nav-link active" data-section="sec-home" data-title="Admin Dashboard">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
        <span class="nav-label">Home</span>
      </div>
      <div class="nav-link" data-section="sec-users" data-title="User Management">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <span class="nav-label">User Management</span>
      </div>
      <div class="nav-link" data-section="sec-params" data-title="System Parameters">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg></span>
        <span class="nav-label">System Parameters</span>
      </div>
      <div class="nav-link" data-section="sec-uom" data-title="Units of Measure">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/></svg></span>
        <span class="nav-label">Units of Measure</span>
      </div>
      <div class="nav-link" data-section="sec-holidays" data-title="Holiday Calendar">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
        <span class="nav-label">Holiday Calendar</span>
      </div>
      <div class="nav-link" data-section="sec-logs" data-title="Activity Logs">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
        <span class="nav-label">Activity Logs</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar">SA</div>
        <div>
          <div class="sb-user-name">System Admin</div>
          <div class="sb-user-role">Administrator</div>
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
        <h1>Admin Dashboard</h1>
        <p>System Administration Panel</p>
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
            <h2>Admin Control Panel</h2>
            <p>Manage all users, system settings and configurations from here.</p>
            <div class="user-id">ID: DC-ADM-01 &nbsp;·&nbsp; System Administrator</div>
          </div>
          <div class="welcome-illo">⚙️</div>
        </div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">👥</div><div class="stat-val">7</div><div class="stat-lbl">Total Users</div></div>
          <div class="stat c-green"><div class="stat-ico">🟢</div><div class="stat-val">5</div><div class="stat-lbl">Active Users</div></div>
          <div class="stat c-red"><div class="stat-ico">🔴</div><div class="stat-val">2</div><div class="stat-lbl">Inactive Users</div></div>
          <div class="stat c-orange"><div class="stat-ico">📋</div><div class="stat-val">24</div><div class="stat-lbl">Logins Today</div></div>
        </div>

        <div class="grid-2">
          
          <!-- User Summary -->
          <div class="card">
            <div class="card-hdr"><h3>Users by Role</h3><button class="btn btn-primary btn-sm" onclick="document.querySelector('[data-section=sec-users]').click()">+ Add User</button></div>
            <div class="tbl-wrap">
              <table>
                <thead><tr><th>Role</th><th>Users</th><th>Active</th><th>Last Login</th></tr></thead>
                <tbody>
                  <tr><td>Admin</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Today, 08:30</td></tr>
                  <tr><td>Chef</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Today, 09:15</td></tr>
                  <tr><td>Kitchen Manager</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Today, 07:45</td></tr>
                  <tr><td>Store Manager</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Yesterday</td></tr>
                  <tr><td>Procurement Manager</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Today, 10:02</td></tr>
                  <tr><td>CEO</td><td>1</td><td><span class="badge bg-green">1</span></td><td>Today, 08:00</td></tr>
                  <tr><td>Extra (Inactive)</td><td>1</td><td><span class="badge bg-gray">0</span></td><td>Never</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="card">
            <div class="card-hdr"><h3>Quick Actions</h3></div>
            <div class="quick-links">
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-users]').click()">
                <div class="ql-icon" style="background:var(--info-bg);">👤</div>
                <div><div class="ql-title">Add New User</div><div class="ql-sub">Create account & assign role</div></div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-params]').click()">
                <div class="ql-icon" style="background:var(--warning-bg);">⚙️</div>
                <div><div class="ql-title">System Parameters</div><div class="ql-sub">Safety stock, wastage factors</div></div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-holidays]').click()">
                <div class="ql-icon" style="background:var(--success-bg);">📅</div>
                <div><div class="ql-title">Holiday Calendar</div><div class="ql-sub">Manage public holidays</div></div>
                <div class="ql-arrow">›</div>
              </div>
              <div class="quick-link" onclick="document.querySelector('[data-section=sec-logs]').click()">
                <div class="ql-icon" style="background:var(--purple-bg);">📋</div>
                <div><div class="ql-title">View Activity Logs</div><div class="ql-sub">All login events</div></div>
                <div class="ql-arrow">›</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- USER MANAGEMENT -->
      <section id="sec-users" class="section">
        <div class="sec-hdr"><h2>User Management</h2><button class="btn btn-primary" id="btn-add-user" onclick="toggleModal('modal-add-user')">+ Add User</button></div>

        <div class="card">
          <div class="card-hdr"><h3>All System Users</h3><span style="font-size:12px;color:var(--t3);">7 users total</span></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Name</th><th>Username</th><th>Role</th><th>Status</th><th>Last Login</th><th>Actions</th></tr></thead>
              <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td class="tbl-main"><?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td style="color:var(--t2);font-size:13px;"><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?= $user['is_active'] ? 'Active' : 'Inactive' ?></td>
                  <td style="font-size:12px;color:var(--t3);"><?= htmlspecialchars($user['last_login'] ?? 'Never', ENT_QUOTES, 'UTF-8') ?></td>
                  <td>
                    <div class="acts">
                      <button
                        type="button"
                        class="act update-user-btn"
                        onclick="openUpdateUser(this)"
                        data-id="<?= (int) $user['id'] ?>"
                        data-full-name="<?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?>"
                        data-username="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>"
                        data-email="<?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        data-role="<?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?>"
                      >Update</button>
                      <form method="POST" action="<?= $baseUrl ?>/admin/users/delete" onsubmit="return confirm('Delete this user?');" style="display:inline;">
                        <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                        <button type="submit" class="act del">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal-overlay" id="modal-add-user" onclick="if(event.target===this)toggleModal('modal-add-user')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Add New User</h3>
              <button class="modal-close" onclick="toggleModal('modal-add-user')">✕</button>
            </div>

            <!-- ADD_NEW_USER FORM -->
            <form method="POST" action="<?= $baseUrl ?>/admin/users/create">
              <div class="form-grid">
                <div class="form-grp"><label>Full Name *</label><input type="text" name="full_name" placeholder="e.g. Kasun Perera" required></div>
                <div class="form-grp"><label>Username *</label><input type="text" name="username" placeholder="e.g. kasun_p" required></div>
                <div class="form-grp form-full"><label>Email Address</label><input type="email" name="email" placeholder="e.g. kasun@dinecast.lk"></div>
                <div class="form-grp">
                  <label>Role *</label>
                  <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="chef">Chef</option>
                    <option value="kitchen">Kitchen Manager</option>
                    <option value="store">Store Manager</option>
                    <option value="procurement">Procurement Manager</option>
                    <option value="ceo">CEO</option>
                </select>
                </div>
                <div class="form-grp"><label>Password *</label><input type="password" name="password" placeholder="Min. 8 characters" minlength="8" required></div>
                <div class="form-grp"><label>Confirm Password *</label><input type="password" placeholder="Repeat password" required></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create User</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-user')">Cancel</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Update User Modal -->
        <div class="modal-overlay" id="modal-update-user" onclick="if(event.target===this)toggleModal('modal-update-user')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Update User</h3>
              <button class="modal-close" type="button" onclick="toggleModal('modal-update-user')">✕</button>
            </div>
            <form method="POST" action="<?= $baseUrl ?>/admin/users/update">
              <input type="hidden" name="id" id="update-user-id">
              <div class="form-grid">
                <div class="form-grp"><label>Full Name *</label><input type="text" name="full_name" id="update-full-name" required></div>
                <div class="form-grp"><label>Username *</label><input type="text" name="username" id="update-username" required></div>
                <div class="form-grp form-full"><label>Email Address</label><input type="email" name="email" id="update-email"></div>
                <div class="form-grp"><label>Role *</label>
                  <select name="role" id="update-role" required>
                    <option value="admin">Admin</option>
                    <option value="chef">Chef</option>
                    <option value="kitchen">Kitchen Manager</option>
                    <option value="store">Store Manager</option>
                    <option value="procurement">Procurement Manager</option>
                    <option value="ceo">CEO</option>
                  </select>
                </div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-update-user')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- SYSTEM PARAMETERS -->
      <section id="sec-params" class="section">
        <div class="sec-hdr"><h2>System Parameters</h2></div>
        <div class="grid-2">
          <div class="card">
            <div class="card-hdr"><h3>⚙️ Forecasting Parameters</h3></div>
            <form onsubmit="submitForm(event,'Parameters saved!')">
              <div class="form-grid">
                <div class="form-grp">
                  <label>Default Attendance Factor (%)</label>
                  <input type="number" value="80" min="0" max="100" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied to registered guest counts for confirmed events.</small>
                </div>
                <div class="form-grp">
                  <label>Tentative Event Factor (%)</label>
                  <input type="number" value="60" min="0" max="100" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied to tentative events.</small>
                </div>
                <div class="form-grp">
                  <label>Safety Stock Percentage (%)</label>
                  <input type="number" value="10" min="0" max="50" step="1">
                  <small style="color:var(--t3);font-size:11px;">Added to PR quantities as buffer.</small>
                </div>
                <div class="form-grp">
                  <label>Default Wastage Factor (%)</label>
                  <input type="number" value="8" min="0" max="50" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied globally unless overridden per ingredient.</small>
                </div>
              </div>
              <div class="form-grp" style="margin-top:8px;">
                <label>Walk-in Forecast Lookback (weeks)</label>
                <input type="number" value="12" min="4" max="52" step="1" style="max-width:180px;">
                <small style="color:var(--t3);font-size:11px;">Historical weeks used for day-of-week walk-in average.</small>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top:12px;">Save Parameters</button>
            </form>
          </div>

          <div class="card">
            <div class="card-hdr"><h3>🧪 Wastage Factors by Category</h3><button class="btn btn-outline btn-sm" onclick="showToast('Category added!')">+ Add Category</button></div>
            <div class="tbl-wrap">
              <table>
                <thead><tr><th>Category</th><th>Wastage %</th><th>Actions</th></tr></thead>
                <tbody>
                  <tr><td class="tbl-main">Meat &amp; Seafood</td><td><input type="number" value="12" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Dairy</td><td><input type="number" value="8" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Vegetables &amp; Herbs</td><td><input type="number" value="15" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Dry Goods</td><td><input type="number" value="3" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Spices &amp; Herbs</td><td><input type="number" value="5" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <!-- UNITS OF MEASURE -->
      <section id="sec-uom" class="section">
        <div class="sec-hdr"><h2>Units of Measure</h2><button class="btn btn-primary" onclick="showToast('UOM added!')">+ Add UOM</button></div>
        <div class="card">
          <div class="card-hdr"><h3>All Units</h3><span style="font-size:12px;color:var(--t3);">8 units configured</span></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Unit Name</th><th>Abbreviation</th><th>Type</th><th>Base Unit</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Kilogram</td><td><span class="tbl-id">kg</span></td><td>Weight</td><td>—</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Gram</td><td><span class="tbl-id">g</span></td><td>Weight</td><td>kg (÷1000)</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Litre</td><td><span class="tbl-id">L</span></td><td>Volume</td><td>—</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Millilitre</td><td><span class="tbl-id">ml</span></td><td>Volume</td><td>L (÷1000)</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Unit / Piece</td><td><span class="tbl-id">pcs</span></td><td>Count</td><td>—</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Dozen</td><td><span class="tbl-id">doz</span></td><td>Count</td><td>pcs (×12)</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Can</td><td><span class="tbl-id">can</span></td><td>Package</td><td>—</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Packet</td><td><span class="tbl-id">pkt</span></td><td>Package</td><td>—</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- HOLIDAY CALENDAR -->
      <section id="sec-holidays" class="section">
        <div class="sec-hdr"><h2>Holiday Calendar</h2><button class="btn btn-primary" onclick="showToast('Holiday added!')">+ Add Holiday</button></div>
        <div class="card">
          <div class="card-hdr"><h3>Public Holidays — 2026</h3><p style="font-size:11.5px;color:var(--t3);">Used by the walk-in forecast to adjust daily averages</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Holiday Name</th><th>Date</th><th>Day</th><th>Type</th><th>Walk-in Factor</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Thai Pongal</td><td>15 Jan 2026</td><td>Thursday</td><td><span class="badge bg-orange">National</span></td><td>1.4×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Independence Day</td><td>04 Feb 2026</td><td>Wednesday</td><td><span class="badge bg-blue">National</span></td><td>1.6×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Milad-un-Nabi</td><td>02 Mar 2026</td><td>Monday</td><td><span class="badge bg-green">Religious</span></td><td>1.2×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Sinhala &amp; Tamil New Year</td><td>13 Apr 2026</td><td>Monday</td><td><span class="badge bg-orange">National</span></td><td>1.8×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Vesak Poya</td><td>11 May 2026</td><td>Monday</td><td><span class="badge bg-green">Religious</span></td><td>0.7×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
                <tr><td class="tbl-main">Christmas Day</td><td>25 Dec 2026</td><td>Friday</td><td><span class="badge bg-orange">National</span></td><td>1.9×</td><td><div class="acts"><span class="act">Edit</span><span class="act del">Delete</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ACTIVITY LOGS -->
      <section id="sec-logs" class="section">
        <div class="sec-hdr"><h2>Activity Logs</h2><button class="btn btn-outline" onclick="showToast('Logs cleared!')">Clear Logs</button></div>
        <div class="card">
          <div class="card-hdr"><h3>Login Activity Log</h3><p style="font-size:11.5px;color:var(--t3);">Last 20 events</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Timestamp</th><th>User</th><th>Role</th><th>Action</th><th>IP Address</th><th>Status</th></tr></thead>
              <tbody>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 10:02:11</td><td class="tbl-main">Ravi Mendis</td><td>Procurement Mgr</td><td>Login</td><td>192.168.1.14</td><td><span class="badge bg-green">Success</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 09:15:44</td><td class="tbl-main">Chef Sudath</td><td>Chef</td><td>Login</td><td>192.168.1.12</td><td><span class="badge bg-green">Success</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 09:10:32</td><td class="tbl-main">unknown</td><td>—</td><td>Login</td><td>192.168.1.22</td><td><span class="badge bg-red">Failed</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 08:30:05</td><td class="tbl-main">System Admin</td><td>Admin</td><td>Login</td><td>192.168.1.10</td><td><span class="badge bg-green">Success</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 08:00:18</td><td class="tbl-main">Amara Perera</td><td>CEO</td><td>Login</td><td>192.168.1.11</td><td><span class="badge bg-green">Success</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">12/08/26 07:45:03</td><td class="tbl-main">Sudath Bandaranayake</td><td>Kitchen Mgr</td><td>Login</td><td>192.168.1.13</td><td><span class="badge bg-green">Success</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">11/08/26 17:30:00</td><td class="tbl-main">Nadeesha Kumari</td><td>Store Mgr</td><td>Logout</td><td>192.168.1.15</td><td><span class="badge bg-gray">Logout</span></td></tr>
                <tr><td style="font-size:12px;color:var(--t3);">11/08/26 08:22:41</td><td class="tbl-main">Nadeesha Kumari</td><td>Store Mgr</td><td>Login</td><td>192.168.1.15</td><td><span class="badge bg-green">Success</span></td></tr>
    
              </tbody>
            </table>
          </div>
        </div>
      </section>

    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/public/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/public/assets/js/admin.js"></script>

</body>
</html>