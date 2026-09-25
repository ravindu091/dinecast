      <section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>Admin Control Panel</h2>
            <p>Manage all users, system settings and configurations from here.</p>
            <div class="user-id">ID: DC-ADM-01 &nbsp;·&nbsp; System Administrator</div>
          </div>
          <div class="welcome-illo">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          </div>
        </div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><div class="stat-val">7</div><div class="stat-lbl">Total Users</div></div>
          <div class="stat c-green"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div><div class="stat-val">5</div><div class="stat-lbl">Active Users</div></div>
          <div class="stat c-red"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg></div><div class="stat-val">2</div><div class="stat-lbl">Inactive Users</div></div>
          <div class="stat c-orange"><div class="stat-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div><div class="stat-val">24</div><div class="stat-lbl">Logins Today</div></div>
        </div>

        <div class="grid-2">
          
          <!-- User Summary -->
          <div class="card">
            <div class="card-hdr"><h3>Users by Role</h3><a href="<?= $baseUrl ?>/admin/users" class="btn btn-primary btn-sm" style="text-decoration:none">+ Add User</a></div>
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
              <a href="<?= $baseUrl ?>/admin/users" class="quick-link" style="text-decoration:none;color:inherit;">
                <div class="ql-icon" style="background:var(--info-bg);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                <div><div class="ql-title">Add New User</div><div class="ql-sub">Create account & assign role</div></div>
                <div class="ql-arrow">›</div>
              </a>
              <a href="<?= $baseUrl ?>/admin/params" class="quick-link" style="text-decoration:none;color:inherit;">
                <div class="ql-icon" style="background:var(--warning-bg);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
                <div><div class="ql-title">System Parameters</div><div class="ql-sub">Safety stock, wastage factors</div></div>
                <div class="ql-arrow">›</div>
              </a>
              <a href="<?= $baseUrl ?>/admin/holidays" class="quick-link" style="text-decoration:none;color:inherit;">
                <div class="ql-icon" style="background:var(--success-bg);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                <div><div class="ql-title">Holiday Calendar</div><div class="ql-sub">Manage public holidays</div></div>
                <div class="ql-arrow">›</div>
              </a>
              <a href="<?= $baseUrl ?>/admin/logs" class="quick-link" style="text-decoration:none;color:inherit;">
                <div class="ql-icon" style="background:var(--purple-bg);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
                <div><div class="ql-title">View Activity Logs</div><div class="ql-sub">All login events</div></div>
                <div class="ql-arrow">›</div>
              </a>
            </div>
          </div>
        </div>
      </section>
