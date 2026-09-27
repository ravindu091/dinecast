<?php
/**
 * CEO View – Procurement Overview
 * Read-only executive visibility into procurement activity.
 * Covers: FR22 (PO conversion - view), FR23 (PO status tracking - view), FR29 (dashboard)
 *
 * IMPORTANT: CEO CANNOT approve/reject PRs (FR21 – Procurement Manager's role).
 *            CEO CANNOT raise PRs (FR20 – Store/Kitchen Manager's role).
 *            This view is strictly read-only.
 */
?>

<!-- ================================================
     PROCUREMENT SECTION (CEO – View Only)
     ================================================ -->

<div class="sec-hdr">
  <h2>Procurement Overview</h2>
</div>

<!-- ===== STATS ===== -->
<div class="stats">
  <div class="stat c-orange">
    <div class="stat-ico">⏳</div>
    <div class="stat-val"><?= (int)($data['stats']['pending_prs'] ?? 0) ?></div>
    <div class="stat-lbl">PRs Pending Approval</div>
  </div>
  <div class="stat c-green">
    <div class="stat-ico">✅</div>
    <div class="stat-val"><?= (int)($data['stats']['approved_prs'] ?? 0) ?></div>
    <div class="stat-lbl">PRs Approved</div>
  </div>
  <div class="stat c-blue">
    <div class="stat-ico">📄</div>
    <div class="stat-val"><?= (int)($data['stats']['open_pos'] ?? 0) ?></div>
    <div class="stat-lbl">Open Purchase Orders</div>
  </div>
  <div class="stat c-purple">
    <div class="stat-ico">💰</div>
    <div class="stat-val" style="font-size:18px;">
      Rs. <?= number_format(($data['stats']['total_spend'] ?? 0) / 1000000, 2) ?>M
    </div>
    <div class="stat-lbl">Total Spend (<?= htmlspecialchars($data['monthShort'] ?? date('M')) ?>)</div>
  </div>
</div>

<!-- ===== RECENT PRs TABLE (View-Only) ===== -->
<div class="card">
  <div class="card-hdr">
    <h3>Recent Purchase Requisitions</h3>
    <a href="<?= BASE_URL ?>/ceo/approvals" class="link-view-all">
      View All PRs →
    </a>
  </div>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>PR Ref</th>
          <th>Created By</th>
          <th>Items</th>
          <th>Linked Event</th>
          <th>Submitted</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['recentPRs'])): ?>
          <?php foreach ($data['recentPRs'] as $pr): ?>
            <?php
              $statusKey = strtolower($pr->status ?? '');
              $badgeMap = [
                'pending'  => 'bg-orange',
                'approved' => 'bg-green',
                'rejected' => 'bg-red',
                'draft'    => 'bg-grey',
              ];
              $badgeClass = $badgeMap[$statusKey] ?? 'bg-grey';
              $statusLabel = ucfirst($statusKey);

              $submittedDate = !empty($pr->submitted_at)
                ? date('d/m/Y', strtotime($pr->submitted_at))
                : (!empty($pr->created_at)
                    ? date('d/m/Y', strtotime($pr->created_at))
                    : '—');
            ?>
            <tr>
              <td>
                <span class="pr-ref"><?= htmlspecialchars($pr->pr_number) ?></span>
              </td>
              <td style="color:var(--t2);font-size:13px;">
                <?= htmlspecialchars($pr->created_by_name ?? '—') ?>
              </td>
              <td style="color:var(--t2);font-size:13px;">
                <?= htmlspecialchars($pr->items_summary ?? '—') ?>
              </td>
              <td style="font-size:13px;font-weight:600;">
                <?= htmlspecialchars($pr->event_name ?? '—') ?>
              </td>
              <td><?= htmlspecialchars($submittedDate) ?></td>
              <td>
                <span class="badge <?= $badgeClass ?>">
                  <?= htmlspecialchars($statusLabel) ?>
                </span>
              </td>
              <td>
                <div class="acts">
                  <?php if ($statusKey === 'rejected'): ?>
                    <a class="act"
                       href="<?= BASE_URL ?>/ceo/viewPR/<?= (int)$pr->pr_id ?>">
                      View Remarks
                    </a>
                  <?php else: ?>
                    <a class="act"
                       href="<?= BASE_URL ?>/ceo/viewPR/<?= (int)$pr->pr_id ?>">
                      View
                    </a>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align:center;color:var(--t2);padding:24px;">
              No purchase requisitions found.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- ===== PURCHASE ORDERS SECTION (FR23) ===== -->
<div class="card" style="margin-top:20px;">
  <div class="card-hdr">
    <h3>Purchase Orders — Status Tracking</h3>
  </div>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>PO Ref</th>
          <th>Supplier</th>
          <th>Items</th>
          <th>Value</th>
          <th>Issued</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['purchaseOrders'])): ?>
          <?php foreach ($data['purchaseOrders'] as $po): ?>
            <?php
              $poStatus = strtolower($po->status ?? '');
              $poBadgeMap = [
                'issued'   => 'bg-teal',
                'received' => 'bg-green',
                'closed'   => 'bg-grey',
                'draft'    => 'bg-orange',
              ];
              $poBadge = $poBadgeMap[$poStatus] ?? 'bg-grey';

              $issuedDate = !empty($po->issued_at)
                ? date('d/m/Y', strtotime($po->issued_at))
                : '—';
            ?>
            <tr>
              <td><span class="pr-ref"><?= htmlspecialchars($po->po_number) ?></span></td>
              <td><?= htmlspecialchars($po->supplier_name ?? '—') ?></td>
              <td style="color:var(--t2);font-size:13px;">
                <?= htmlspecialchars($po->items_summary ?? '—') ?>
              </td>
              <td>Rs. <?= number_format((float)($po->total_value ?? 0), 2) ?></td>
              <td><?= htmlspecialchars($issuedDate) ?></td>
              <td>
                <span class="badge <?= $poBadge ?>">
                  <?= htmlspecialchars(ucfirst($poStatus)) ?>
                </span>
              </td>
              <td>
                <div class="acts">
                  <a class="act"
                     href="<?= BASE_URL ?>/ceo/viewPO/<?= (int)$po->po_id ?>">
                    View
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align:center;color:var(--t2);padding:24px;">
              No purchase orders issued yet.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- ===== SUPPLIER SPEND BREAKDOWN ===== -->
<div class="card" style="margin-top:20px;">
  <div class="card-hdr">
    <h3>Top Suppliers by Spend (<?= htmlspecialchars($data['monthLabel'] ?? date('F Y')) ?>)</h3>
  </div>

  <?php if (!empty($data['supplierSpend'])): ?>
    <div class="proc-rows">
      <?php
        $maxSpend = 1;
        foreach ($data['supplierSpend'] as $s) {
          $maxSpend = max($maxSpend, (float)$s->total_spend);
        }
      ?>
      <?php foreach ($data['supplierSpend'] as $s): ?>
        <?php $pct = round(((float)$s->total_spend / $maxSpend) * 100); ?>
        <div class="proc-row">
          <span class="proc-name"><?= htmlspecialchars($s->supplier_name) ?></span>
          <div class="proc-bar">
            <div class="proc-fill" style="width:<?= $pct ?>%;"></div>
          </div>
          <span class="proc-pct"><?= $pct ?>%</span>
          <span class="proc-amt">
            Rs. <?= number_format(((float)$s->total_spend) / 1000, 0) ?>K
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p style="text-align:center;color:var(--t3);padding:24px 0;">
      No supplier spend data available.
    </p>
  <?php endif; ?>
</div>
