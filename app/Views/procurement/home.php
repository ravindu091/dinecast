<!-- HOME -->
<section id="sec-home" class="section active">
  <div class="welcome">
    <div class="welcome-txt">
      <h2>Welcome back, <?= htmlspecialchars(explode(" ", trim($_SESSION["fullName"]))[0]) ?>!</h2>
      <p>Review and approve purchase requisitions, manage suppliers, and track orders.</p>
      <div class="user-id">@<?= htmlspecialchars($_SESSION["username"]) ?> &nbsp;·&nbsp; <?= htmlspecialchars(getRole($_SESSION["role"])) ?></div>
    </div>
  </div>

  <!-- KPI Cards -->
  <div class="stats pm-kpi-grid">

    <!-- PRs Awaiting Approval -->
    <article class="pm-kpi pm-kpi-amber">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">PRs Awaiting Approval</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">3</div>
      <div class="pm-kpi-desc">Submitted by the Kitchen Manager</div>
      <a href="<?= $baseUrl ?>/procurement/requisitions" class="pm-kpi-link">Review &rarr;</a>
    </article>

    <!-- Active Purchase Orders -->
    <article class="pm-kpi pm-kpi-blue">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Active Purchase Orders</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">4</div>
      <div class="pm-kpi-desc">Issued or received, not yet closed</div>
      <a href="<?= $baseUrl ?>/procurement/orders" class="pm-kpi-link">Track &rarr;</a>
    </article>

    <!-- Active Suppliers -->
    <article class="pm-kpi pm-kpi-gray">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Active Suppliers</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l1.5-5h15L21 9"/><path d="M4 9v11h16V9"/><path d="M9 20v-6h6v6"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value"><?= $activeSupplierCount ?></div>
      <div class="pm-kpi-desc">Available for purchase orders</div>
      <a href="<?= $baseUrl ?>/procurement/suppliers" class="pm-kpi-link">Manage &rarr;</a>
    </article>

    <!-- Approved PRs Awaiting PO -->
    <article class="pm-kpi pm-kpi-green">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Approved PRs Awaiting PO</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="4" width="12" height="17" rx="2"/><path d="M9 4h6v3H9z"/><path d="M9 12h6M9 16h4"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">1</div>
      <div class="pm-kpi-desc">Ready to convert into purchase orders</div>
      <a href="<?= $baseUrl ?>/procurement/requisitions" class="pm-kpi-link">Create POs &rarr;</a>
    </article>

  </div>

  <div class="grid-2">
    <!-- Pending PRs -->
    <div class="card">
      <div class="card-hdr">
        <div><h3>PRs Awaiting Approval</h3></div>
        <a href="<?= $baseUrl ?>/procurement/requisitions" class="btn btn-outline btn-sm">View All</a>
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
        <div><h3>Active Purchase Orders</h3></div>
        <a href="<?= $baseUrl ?>/procurement/orders" class="btn btn-outline btn-sm">View All</a>
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

<!-- Reject Modal (a copy also lives on the Requisitions page) -->
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
