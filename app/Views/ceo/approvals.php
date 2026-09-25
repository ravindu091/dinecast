<?php
/**
 * CEO View – PR Approvals (View-Only)
 * CEO / Top Management can only VIEW PR statuses.
 * Approval/Rejection is done by Procurement Manager (FR21).
 * This view provides visibility for executive oversight (FR29).
 */
?>

<!-- ================================================
     PR APPROVALS SECTION (CEO – View Only)
     ================================================ -->

<div class="sec-hdr">
  <h2>Purchase Requisitions</h2>
</div>

<!-- ===== STATS ===== -->
<div class="stats">
  <div class="stat c-orange">
    <div class="stat-ico">⏳</div>
    <div class="stat-val"><?= (int)($data['stats']['pending'] ?? 0) ?></div>
    <div class="stat-lbl">Pending Approval</div>
  </div>
  <div class="stat c-green">
    <div class="stat-ico">✅</div>
    <div class="stat-val"><?= (int)($data['stats']['approved'] ?? 0) ?></div>
    <div class="stat-lbl">Approved This Month</div>
  </div>
  <div class="stat c-red">
    <div class="stat-ico">❌</div>
    <div class="stat-val"><?= (int)($data['stats']['rejected'] ?? 0) ?></div>
    <div class="stat-lbl">Rejected This Month</div>
  </div>
  <div class="stat c-blue">
    <div class="stat-ico">💰</div>
    <div class="stat-val">
      Rs. <?= number_format(($data['stats']['total_value'] ?? 0) / 1000, 1) ?>K
    </div>
    <div class="stat-lbl">Total Est. Value</div>
  </div>
</div>

<!-- ===== TABLE ===== -->
<div class="card">
  <div class="card-hdr">
    <h3>All Purchase Requisitions</h3>
    <a href="<?= BASE_URL ?>/ceo/procurement" class="link-view-all">View Purchase Orders →</a>
  </div>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>PR Ref</th>
          <th>Raised By</th>
          <th>Items</th>
          <th>Value Est.</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['prs'])): ?>
          <?php foreach ($data['prs'] as $pr): ?>
            <?php
              // Map DB status → badge class
              $statusKey = strtolower($pr->status ?? '');
              $badgeMap = [
                'approved' => 'bg-green',
                'pending'  => 'bg-orange',
                'rejected' => 'bg-red',
                'draft'    => 'bg-grey',
              ];
              $badgeClass = $badgeMap[$statusKey] ?? 'bg-grey';
              $statusLabel = ucfirst($statusKey);

              // Format items string (comma-separated ingredient names)
              $itemsStr = !empty($pr->items_summary)
                ? $pr->items_summary
                : '—';
            ?>
            <tr>
              <td>
                <span class="pr-ref"><?= htmlspecialchars($pr->pr_number) ?></span>
              </td>
              <td><?= htmlspecialchars($pr->raised_by_name ?? '—') ?></td>
              <td style="font-size:13px;color:var(--t2);">
                <?= htmlspecialchars($itemsStr) ?>
              </td>
              <td>Rs. <?= number_format((float)($pr->total_estimated_cost ?? 0), 2) ?></td>
              <td><?= htmlspecialchars(date('d/m/Y', strtotime($pr->created_at ?? 'now'))) ?></td>
              <td>
                <span class="badge <?= $badgeClass ?>"><?= $statusLabel ?></span>
              </td>
              <td>
                <div class="acts">
                  <a class="act"
                     href="<?= BASE_URL ?>/ceo/viewPR/<?= (int)$pr->pr_id ?>">
                    View
                  </a>
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
