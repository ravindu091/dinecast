<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Procurement Manager Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/procurement.css">
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

    <div class="sb-section">Procurement</div>
    <nav class="sb-links">
      <div class="nav-link active" data-section="sec-home" data-title="Procurement Manager Dashboard">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
        <span class="nav-label">Home</span>
      </div>
      <div class="nav-link" data-section="sec-suppliers" data-title="Suppliers">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></span>
        <span class="nav-label">Suppliers</span>
      </div>
      <div class="nav-link" data-section="sec-requisitions" data-title="Requisitions">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
        <span class="nav-label">Requisitions</span>
      </div>
      <div class="nav-link" data-section="sec-orders" data-title="Orders">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></span>
        <span class="nav-label">Orders</span>
      </div>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar" style="background:var(--success-bg);color:var(--success);">KS</div>
        <div>
          <div class="sb-user-name">Kavindu Silva</div>
          <div class="sb-user-role">Procurement Manager</div>
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
        <h1>Procurement Manager Dashboard</h1>
        <p>Welcome back, Kavindu!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
      </div>
    </header>

    <main class="content">

      <!-- HOME -->
      <section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>Welcome back, Kavindu!</h2>
            <p>Review and approve purchase requisitions, manage suppliers, and track orders.</p>
            <div class="user-id">ID: DC-PM-03 &nbsp;·&nbsp; Procurement Manager</div>
          </div>
          <div class="welcome-illo">🛒</div>
        </div>

        <div class="stats">
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">3</div><div class="stat-lbl">PRs Awaiting Your Approval</div></div>
          <div class="stat c-green"><div class="stat-ico">📦</div><div class="stat-val">4</div><div class="stat-lbl">Active Purchase Orders</div></div>
          <div class="stat c-blue"><div class="stat-ico">🏪</div><div class="stat-val">6</div><div class="stat-lbl">Registered Suppliers</div></div>
          <div class="stat c-purple"><div class="stat-ico">📝</div><div class="stat-val">1</div><div class="stat-lbl">Approved PRs Awaiting PO</div></div>
        </div>

        <div class="grid-2">
          <!-- Pending PRs -->
          <div class="card">
            <div class="card-hdr">
              <div><h3>⏳ PRs Awaiting Approval</h3></div>
              <button class="btn btn-outline btn-sm" onclick="document.querySelector('[data-section=sec-requisitions]').click()">View All</button>
            </div>
            <div style="display:flex;flex-direction:column;gap:8px;">
              <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 14px;background:var(--warning-bg);border-radius:10px;">
                <div>
                  <div style="font-size:13.5px;font-weight:700;color:var(--t1);">PR-0047 &nbsp;·&nbsp; Beef, Mushrooms, Cream</div>
                  <div style="font-size:12px;color:var(--t3);">Kitchen Manager &nbsp;·&nbsp; 09 Aug 2026 &nbsp;·&nbsp; Rs. 10,100</div>
                </div>
                <div style="display:flex;gap:6px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0047 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject</button>
                </div>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 14px;background:var(--warning-bg);border-radius:10px;">
                <div>
                  <div style="font-size:13.5px;font-weight:700;color:var(--t1);">PR-0044 &nbsp;·&nbsp; Lettuce, Eggs, Tomatoes</div>
                  <div style="font-size:12px;color:var(--t3);">Kitchen Manager &nbsp;·&nbsp; 06 Aug 2026 &nbsp;·&nbsp; Rs. 3,264</div>
                </div>
                <div style="display:flex;gap:6px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0044 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject</button>
                </div>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 14px;background:var(--warning-bg);border-radius:10px;">
                <div>
                  <div style="font-size:13.5px;font-weight:700;color:var(--t1);">PR-0043 &nbsp;·&nbsp; Salmon, Butter, Lemon</div>
                  <div style="font-size:12px;color:var(--t3);">Kitchen Manager &nbsp;·&nbsp; 05 Aug 2026 &nbsp;·&nbsp; Rs. 91,240</div>
                </div>
                <div style="display:flex;gap:6px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0043 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Active POs -->
          <div class="card">
            <div class="card-hdr">
              <div><h3>📦 Active Purchase Orders</h3></div>
              <button class="btn btn-outline btn-sm" onclick="document.querySelector('[data-section=sec-orders]').click()">View All</button>
            </div>
            <div style="display:flex;flex-direction:column;gap:8px;">
              <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--bg);border:1px solid var(--border);border-radius:8px;">
                <div><div style="font-size:13px;font-weight:700;color:var(--t1);">PO-0020 &nbsp;·&nbsp; Lakmal &amp; Sons Poultry</div><div style="font-size:11.5px;color:var(--t3);">Expected: 13 Aug &nbsp;·&nbsp; Rs. 48,000</div></div>
                <span class="badge bg-blue">Issued</span>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--bg);border:1px solid var(--border);border-radius:8px;">
                <div><div style="font-size:13px;font-weight:700;color:var(--t1);">PO-0019 &nbsp;·&nbsp; Ceylon Agro Exports</div><div style="font-size:11.5px;color:var(--t3);">Expected: 15 Aug &nbsp;·&nbsp; Rs. 20,300</div></div>
                <span class="badge bg-blue">Issued</span>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--bg);border:1px solid var(--border);border-radius:8px;">
                <div><div style="font-size:13px;font-weight:700;color:var(--t1);">PO-0018 &nbsp;·&nbsp; Negombo Sea Foods</div><div style="font-size:11.5px;color:var(--t3);">Expected: 14 Aug &nbsp;·&nbsp; Rs. 45,600</div></div>
                <span class="badge bg-blue">Issued</span>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;background:var(--teal-bg);border:1px solid var(--border);border-radius:8px;">
                <div><div style="font-size:13px;font-weight:700;color:var(--t1);">PO-0017 &nbsp;·&nbsp; Araliya Foods</div><div style="font-size:11.5px;color:var(--t3);">Received: 10 Aug &nbsp;·&nbsp; Rs. 11,700</div></div>
                <span class="badge bg-teal">Received</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- REQUISITIONS -->
      <section id="sec-requisitions" class="section">
        <div class="sec-hdr"><h2>Requisitions</h2></div>

        <div class="stats">
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">3</div><div class="stat-lbl">Pending Approval</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">5</div><div class="stat-lbl">Approved</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">1</div><div class="stat-lbl">Rejected</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>Purchase Requisitions</h3><p style="font-size:11.5px;color:var(--t3);">Review item quantities, current stock, and forecast basis before approving</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th></th><th>PR Ref</th><th>Raised By</th><th>Items</th><th>Linked Event</th><th>Est. Value</th><th>Submitted</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0048')">▶</button></td>
                  <td><span class="pr-ref">PR-0048</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Chicken, Rice, Coconut Milk</td>
                  <td style="font-size:13px;font-weight:600;">Corporate Lunch</td>
                  <td style="font-weight:700;">Rs. 46,250</td>
                  <td style="font-size:12px;color:var(--t3);">10/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td><div class="acts"><span class="act" onclick="showToast('3 POs created for PR-0048, one per supplier')">Create POs</span></div></td>
                </tr>
                <tr class="expand-row" id="pr-detail-0048">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PR-0048 Item Detail</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                          <tbody>
                            <tr><td>Chicken Breast</td><td>55 kg</td><td style="color:var(--warning);">30 kg</td><td style="font-weight:700;">25 kg</td><td>Rs. 850/kg</td><td style="font-weight:700;">Rs. 21,250</td></tr>
                            <tr><td>Basmati Rice</td><td>80 kg</td><td style="color:var(--danger);">30 kg</td><td style="font-weight:700;">50 kg</td><td>Rs. 320/kg</td><td style="font-weight:700;">Rs. 16,000</td></tr>
                            <tr><td>Coconut Milk</td><td>26 L</td><td style="color:var(--danger);">6 L</td><td style="font-weight:700;">20 L</td><td>Rs. 450/L</td><td style="font-weight:700;">Rs. 9,000</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 46,250</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0047')">▶</button></td>
                  <td><span class="pr-ref">PR-0047</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Beef, Mushrooms, Cream</td>
                  <td style="font-size:13px;font-weight:600;">Gov Dinner</td>
                  <td style="font-weight:700;">Rs. 10,100</td>
                  <td style="font-size:12px;color:var(--t3);">09/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act" onclick="showToast('✓ PR-0047 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
                </tr>
                <tr class="expand-row" id="pr-detail-0047">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PR-0047 Item Detail</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                          <tbody>
                            <tr><td>Beef Tenderloin</td><td>12 kg</td><td style="color:var(--warning);">9 kg</td><td style="font-weight:700;">3 kg</td><td>Rs. 2,400/kg</td><td style="font-weight:700;">Rs. 7,200</td></tr>
                            <tr><td>Button Mushrooms</td><td>5 kg</td><td style="color:var(--warning);">3 kg</td><td style="font-weight:700;">2 kg</td><td>Rs. 900/kg</td><td style="font-weight:700;">Rs. 1,800</td></tr>
                            <tr><td>Heavy Cream</td><td>4 L</td><td style="color:var(--warning);">3 L</td><td style="font-weight:700;">1 L</td><td>Rs. 1,100/L</td><td style="font-weight:700;">Rs. 1,100</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 10,100</td></tr></tfoot>
                        </table>
                      </div>
                      <div style="display:flex;gap:10px;margin-top:10px;">
                        <button class="btn btn-primary btn-sm" onclick="showToast('✓ PR-0047 Approved!')">✓ Approve</button>
                        <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">✗ Reject with Remarks</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0046')">▶</button></td>
                  <td><span class="pr-ref">PR-0046</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Chicken, Lamb</td>
                  <td style="font-size:13px;font-weight:600;">Anniversary – Fernando</td>
                  <td style="font-weight:700;">Rs. 48,000</td>
                  <td style="font-size:12px;color:var(--t3);">08/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td style="font-size:12px;color:var(--t3);">PO-0020 issued</td>
                </tr>
                <tr class="expand-row" id="pr-detail-0046">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PR-0046 Item Detail</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                          <tbody>
                            <tr><td>Chicken Breast</td><td>52 kg</td><td style="color:var(--danger);">12 kg</td><td style="font-weight:700;">40 kg</td><td>Rs. 850/kg</td><td style="font-weight:700;">Rs. 34,000</td></tr>
                            <tr><td>Lamb Shoulder</td><td>10 kg</td><td style="color:var(--danger);">0 kg</td><td style="font-weight:700;">10 kg</td><td>Rs. 1,400/kg</td><td style="font-weight:700;">Rs. 14,000</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 48,000</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><span class="pr-ref">PR-0045</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Prawns, Cream, Cheese</td>
                  <td style="font-size:13px;font-weight:600;">Tech Conference</td>
                  <td style="font-weight:700;">Rs. 28,600</td>
                  <td style="font-size:12px;color:var(--t3);">07/08/2026</td>
                  <td><span class="badge bg-red">Rejected</span></td>
                  <td><div class="acts"><span class="act">View Remarks</span></div></td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0044')">▶</button></td>
                  <td><span class="pr-ref">PR-0044</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Lettuce, Eggs, Tomatoes</td>
                  <td style="font-size:13px;font-weight:600;">Birthday – Silva</td>
                  <td style="font-weight:700;">Rs. 3,264</td>
                  <td style="font-size:12px;color:var(--t3);">06/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act" onclick="showToast('✓ PR-0044 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
                </tr>
                <tr class="expand-row" id="pr-detail-0044">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PR-0044 Item Detail</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                          <tbody>
                            <tr><td>Romaine Lettuce</td><td>4 kg</td><td style="color:var(--warning);">3.2 kg</td><td style="font-weight:700;">0.8 kg</td><td>Rs. 180/kg</td><td style="font-weight:700;">Rs. 144</td></tr>
                            <tr><td>Eggs</td><td>60 pcs</td><td style="color:var(--danger);">20 pcs</td><td style="font-weight:700;">40 pcs</td><td>Rs. 45/pc</td><td style="font-weight:700;">Rs. 1,800</td></tr>
                            <tr><td>Tomatoes</td><td>10 kg</td><td style="color:var(--danger);">4 kg</td><td style="font-weight:700;">6 kg</td><td>Rs. 220/kg</td><td style="font-weight:700;">Rs. 1,320</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 3,264</td></tr></tfoot>
                        </table>
                      </div>
                      <div style="display:flex;gap:10px;margin-top:10px;">
                        <button class="btn btn-primary btn-sm" onclick="showToast('✓ PR-0044 Approved!')">✓ Approve</button>
                        <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">✗ Reject with Remarks</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0043')">▶</button></td>
                  <td><span class="pr-ref">PR-0043</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Salmon, Butter, Lemon</td>
                  <td style="font-size:13px;font-weight:600;">Wedding – Perera</td>
                  <td style="font-weight:700;">Rs. 91,240</td>
                  <td style="font-size:12px;color:var(--t3);">05/08/2026</td>
                  <td><span class="badge bg-orange">Pending</span></td>
                  <td><div class="acts"><span class="act" onclick="showToast('✓ PR-0043 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
                </tr>
                <tr class="expand-row" id="pr-detail-0043">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PR-0043 Item Detail</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                          <tbody>
                            <tr><td>Fresh Salmon Fillet</td><td>48 kg</td><td style="color:var(--danger);">2.5 kg</td><td style="font-weight:700;">45.5 kg</td><td>Rs. 1,800/kg</td><td style="font-weight:700;">Rs. 81,900</td></tr>
                            <tr><td>Unsalted Butter</td><td>8 kg</td><td style="color:var(--danger);">0.8 kg</td><td style="font-weight:700;">7.2 kg</td><td>Rs. 1,200/kg</td><td style="font-weight:700;">Rs. 8,640</td></tr>
                            <tr><td>Lemon</td><td>40 pcs</td><td style="color:var(--danger);">12 pcs</td><td style="font-weight:700;">28 pcs</td><td>Rs. 25/pc</td><td style="font-weight:700;">Rs. 700</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 91,240</td></tr></tfoot>
                        </table>
                      </div>
                      <div style="display:flex;gap:10px;margin-top:10px;">
                        <button class="btn btn-primary btn-sm" onclick="showToast('✓ PR-0043 Approved!')">✓ Approve</button>
                        <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">✗ Reject with Remarks</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><span class="pr-ref">PR-0042</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Salmon, Prawns, Rice, Spices</td>
                  <td style="font-size:13px;font-weight:600;">Charity Gala</td>
                  <td style="font-weight:700;">Rs. 65,900</td>
                  <td style="font-size:12px;color:var(--t3);">02/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td style="font-size:12px;color:var(--t3);">PO-0018, PO-0019 issued</td>
                </tr>
                <tr>
                  <td></td>
                  <td><span class="pr-ref">PR-0041</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Coconut Milk, Eggs</td>
                  <td style="font-size:13px;font-weight:600;">School Prize Day</td>
                  <td style="font-weight:700;">Rs. 11,700</td>
                  <td style="font-size:12px;color:var(--t3);">01/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td style="font-size:12px;color:var(--t3);">PO-0017 issued</td>
                </tr>
                <tr>
                  <td></td>
                  <td><span class="pr-ref">PR-0040</span></td>
                  <td>Sudath B. (Kitchen Mgr)</td>
                  <td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes</td>
                  <td style="font-size:13px;font-weight:600;">Staff Welfare Lunch</td>
                  <td style="font-weight:700;">Rs. 2,660</td>
                  <td style="font-size:12px;color:var(--t3);">28/07/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td style="font-size:12px;color:var(--t3);">PO-0016 issued</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </section>

      <!-- PURCHASE ORDERS -->
      <section id="sec-orders" class="section">
        <div class="sec-hdr"><h2>Purchase Orders</h2><button class="btn btn-primary" onclick="showToast('PO generated from approved PRs!')">Generate PO from PR</button></div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📤</div><div class="stat-val">3</div><div class="stat-lbl">Issued (Awaiting Delivery)</div></div>
          <div class="stat c-teal"><div class="stat-ico">✅</div><div class="stat-val">1</div><div class="stat-lbl">Received</div></div>
          <div class="stat c-gray"><div class="stat-ico">🔒</div><div class="stat-val">1</div><div class="stat-lbl">Closed</div></div>
          <div class="stat c-blue"><div class="stat-ico">💰</div><div class="stat-val" style="font-size:18px;">Rs. 128,260</div><div class="stat-lbl">Total PO Value</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Purchase Orders</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th></th><th>PO Ref</th><th>PR Ref</th><th>Supplier</th><th>Items</th><th>Total Value</th><th>Expected</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0020')">▶</button></td>
                  <td><span class="pr-ref">PO-0020</span></td>
                  <td><span class="tbl-id">PR-0046</span></td>
                  <td>Lakmal &amp; Sons Poultry</td>
                  <td style="font-size:13px;color:var(--t2);">Chicken, Lamb</td>
                  <td style="font-weight:700;">Rs. 48,000</td>
                  <td>13/08/26</td>
                  <td><span class="badge bg-blue">Issued</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PO-0020 marked as Received!')">Mark Received</span></div></td>
                </tr>
                <tr class="expand-row" id="po-detail-0020">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PO-0020 — Lakmal &amp; Sons Poultry</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Chicken Breast</td><td>40 kg</td><td>Rs. 850/kg</td><td>Rs. 34,000</td></tr>
                            <tr><td>Lamb Shoulder</td><td>10 kg</td><td>Rs. 1,400/kg</td><td>Rs. 14,000</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 48,000</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0019')">▶</button></td>
                  <td><span class="pr-ref">PO-0019</span></td>
                  <td><span class="tbl-id">PR-0042</span></td>
                  <td>Ceylon Agro Exports</td>
                  <td style="font-size:13px;color:var(--t2);">Rice, Spices</td>
                  <td style="font-weight:700;">Rs. 20,300</td>
                  <td>15/08/26</td>
                  <td><span class="badge bg-blue">Issued</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PO-0019 marked as Received!')">Mark Received</span></div></td>
                </tr>
                <tr class="expand-row" id="po-detail-0019">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PO-0019 — Ceylon Agro Exports</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Basmati Rice</td><td>40 kg</td><td>Rs. 320/kg</td><td>Rs. 12,800</td></tr>
                            <tr><td>Mixed Spices</td><td>5 kg</td><td>Rs. 1,500/kg</td><td>Rs. 7,500</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 20,300</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0018')">▶</button></td>
                  <td><span class="pr-ref">PO-0018</span></td>
                  <td><span class="tbl-id">PR-0042</span></td>
                  <td>Negombo Sea Foods</td>
                  <td style="font-size:13px;color:var(--t2);">Salmon, Prawns</td>
                  <td style="font-weight:700;">Rs. 45,600</td>
                  <td>14/08/26</td>
                  <td><span class="badge bg-blue">Issued</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PO-0018 marked as Received!')">Mark Received</span></div></td>
                </tr>
                <tr class="expand-row" id="po-detail-0018">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PO-0018 — Negombo Sea Foods</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Fresh Salmon Fillet</td><td>20 kg</td><td>Rs. 1,800/kg</td><td>Rs. 36,000</td></tr>
                            <tr><td>Fresh Prawns</td><td>8 kg</td><td>Rs. 1,200/kg</td><td>Rs. 9,600</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 45,600</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0017')">▶</button></td>
                  <td><span class="pr-ref">PO-0017</span></td>
                  <td><span class="tbl-id">PR-0041</span></td>
                  <td>Araliya Foods</td>
                  <td style="font-size:13px;color:var(--t2);">Coconut Milk, Eggs</td>
                  <td style="font-weight:700;">Rs. 11,700</td>
                  <td>10/08/26</td>
                  <td><span class="badge bg-teal">Received</span></td>
                  <td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PO-0017 closed.')">Close PO</span></div></td>
                </tr>
                <tr class="expand-row" id="po-detail-0017">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PO-0017 — Araliya Foods</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Coconut Milk</td><td>20 L</td><td>Rs. 450/L</td><td>Rs. 9,000</td></tr>
                            <tr><td>Eggs</td><td>60 pcs</td><td>Rs. 45/pc</td><td>Rs. 2,700</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 11,700</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0016')">▶</button></td>
                  <td><span class="pr-ref">PO-0016</span></td>
                  <td><span class="tbl-id">PR-0040</span></td>
                  <td>Fresh Farms Ltd</td>
                  <td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes</td>
                  <td style="font-weight:700;">Rs. 2,660</td>
                  <td>31/07/26</td>
                  <td><span class="badge bg-gray">Closed</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr class="expand-row" id="po-detail-0016">
                  <td colspan="9">
                    <div class="expand-inner">
                      <div class="expand-lbl">PO-0016 — Fresh Farms Ltd</div>
                      <div class="tbl-wrap" style="margin:0;">
                        <table>
                          <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Romaine Lettuce</td><td>5 kg</td><td>Rs. 180/kg</td><td>Rs. 900</td></tr>
                            <tr><td>Tomatoes</td><td>8 kg</td><td>Rs. 220/kg</td><td>Rs. 1,760</td></tr>
                          </tbody>
                          <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 2,660</td></tr></tfoot>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SUPPLIERS -->
      <section id="sec-suppliers" class="section">
        <div class="sec-hdr"><h2>Suppliers</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-supplier')">+ Add Supplier</button></div>

        <div class="card">
          <div class="card-hdr"><h3>All Suppliers</h3><span style="font-size:12px;color:var(--t3);">6 registered</span></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Supplier Name</th><th>Category</th><th>Contact Person</th><th>Phone</th><th>Ingredients Supplied</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Negombo Sea Foods</td><td>Meat &amp; Seafood</td><td>Roshan Silva</td><td>077-1234567</td><td style="font-size:13px;color:var(--t2);">Salmon, Prawns, Tuna</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
                <tr><td class="tbl-main">Lakmal &amp; Sons Poultry</td><td>Meat &amp; Seafood</td><td>Lakmal Perera</td><td>071-9876543</td><td style="font-size:13px;color:var(--t2);">Chicken, Lamb, Beef</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
                <tr><td class="tbl-main">Ceylon Agro Exports</td><td>Dry Goods</td><td>Chaminda Ranasinghe</td><td>077-5554433</td><td style="font-size:13px;color:var(--t2);">Rice, Wheat Flour, Spices</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
                <tr><td class="tbl-main">Araliya Foods</td><td>Dairy &amp; Staples</td><td>Nirmala Jayawardena</td><td>076-2223344</td><td style="font-size:13px;color:var(--t2);">Butter, Heavy Cream, Eggs, Coconut Milk</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
                <tr><td class="tbl-main">Global Imports Ltd</td><td>Specialty</td><td>Kevin Fernando</td><td>011-4445566</td><td style="font-size:13px;color:var(--t2);">Cheese, Chocolate</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
                <tr><td class="tbl-main">Fresh Farms Ltd</td><td>Vegetables</td><td>Sunil Hettige</td><td>072-6667788</td><td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes, Lemon, Mushrooms, Herbs</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-overlay" id="modal-add-supplier" onclick="if(event.target===this)toggleModal('modal-add-supplier')">
          <div class="modal">
            <div class="modal-hdr"><h3>Add Supplier</h3><button class="modal-close" onclick="toggleModal('modal-add-supplier')">✕</button></div>
            <form onsubmit="submitForm(event,'Supplier added!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Supplier Name *</label><input type="text" placeholder="e.g. Negombo Sea Foods" required></div>
                <div class="form-grp"><label>Category</label><select><option>Meat &amp; Seafood</option><option>Dairy &amp; Staples</option><option>Vegetables</option><option>Dry Goods</option><option>Specialty</option></select></div>
                <div class="form-grp"><label>Contact Person</label><input type="text" placeholder="Contact name"></div>
                <div class="form-grp"><label>Phone</label><input type="text" placeholder="07X-XXXXXXX"></div>
                <div class="form-grp"><label>Email</label><input type="email" placeholder="supplier@email.lk"></div>
                <div class="form-grp"><label>Address</label><input type="text" placeholder="Supplier address"></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Add Supplier</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-supplier')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- Reject Modal (shared by Home and Requisitions) -->
      <div class="modal-overlay" id="modal-reject" onclick="if(event.target===this)toggleModal('modal-reject')">
        <div class="modal">
          <div class="modal-hdr"><h3>Reject PR with Remarks</h3><button class="modal-close" onclick="toggleModal('modal-reject')">✕</button></div>
          <form onsubmit="submitForm(event,'PR Rejected. Kitchen Manager notified.')">
            <div class="form-grp">
              <label>Rejection Remarks *</label>
              <textarea placeholder="Explain why this PR is rejected (will be visible to the Kitchen Manager)…" style="height:100px;" required></textarea>
            </div>
            <div style="display:flex;gap:10px;margin-top:12px;">
              <button type="submit" class="btn btn-primary" style="background:var(--danger);">Confirm Rejection</button>
              <button type="button" class="btn btn-outline" onclick="toggleModal('modal-reject')">Cancel</button>
            </div>
          </form>
        </div>
      </div>

    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/procurement.js"></script>
</body>
</html>
