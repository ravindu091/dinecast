<?php
/**
 * CEO View – Inventory Overview
 * Read-only inventory health monitoring for executive oversight.
 * Covers: FR17 (stock levels - view only for CEO), FR29 (dashboard)
 *
 * NOTE: CEO cannot raise PRs — that's Store/Kitchen Manager (FR20).
 *       This view provides visibility only.
 */
?>

<!-- ================================================
     INVENTORY SECTION (CEO view)
     ================================================ -->

<div class="sec-hdr">
  <h2>Inventory Overview</h2>
</div>

<!-- ===== STATS ===== -->
<div class="stats">
  <div class="stat c-blue">
    <div class="stat-ico">📦</div>
    <div class="stat-val">
      <?= number_format((int)($data['stats']['total_lines'] ?? 0)) ?>
    </div>
    <div class="stat-lbl">Total Ingredient Lines</div>
  </div>
  <div class="stat c-red">
    <div class="stat-ico">⬇️</div>
    <div class="stat-val"><?= (int)($data['stats']['below_min'] ?? 0) ?></div>
    <div class="stat-lbl">Below Minimum</div>
  </div>
  <div class="stat c-orange">
    <div class="stat-ico">⏰</div>
    <div class="stat-val"><?= (int)($data['stats']['near_expiry'] ?? 0) ?></div>
    <div class="stat-lbl">Near Expiry</div>
  </div>
  <div class="stat c-purple">
    <div class="stat-ico">❌</div>
    <div class="stat-val"><?= (int)($data['stats']['expired'] ?? 0) ?></div>
    <div class="stat-lbl">Expired (Action Needed)</div>
  </div>
</div>

<!-- ===== CRITICAL ITEMS TABLE ===== -->
<div class="card">
  <div class="card-hdr">
    <h3>Critical Items — Below Minimum Stock</h3>
    <a href="<?= BASE_URL ?>/ceo/procurement" class="link-view-all">
      View Procurement →
    </a>
  </div>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>Ingredient</th>
          <th>Category</th>
          <th>Min Stock</th>
          <th>Current</th>
          <th>Shortfall</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['criticalItems'])): ?>
          <?php foreach ($data['criticalItems'] as $item): ?>
            <?php
              // ---- Format stock values with unit ----
              $minStock = (float)($item->min_stock ?? 0);
              $current  = (float)($item->current_stock ?? 0);
              $unit     = htmlspecialchars($item->unit ?? '');
              $shortfall = $minStock - $current;

              // ---- Severity: red if critical (<50% of min), orange otherwise ----
              $severity = ($current < ($minStock * 0.5)) ? 'bg-red' : 'bg-orange';
              $currentColor = ($severity === 'bg-red') ? 'var(--danger)' : 'var(--warning)';

              // ---- Format number: small values in g, large in kg ----
              $fmt = function ($val, $u) {
                if ($u === 'g' && $val < 1000) return number_format($val, 0) . ' g';
                if ($u === 'kg') return number_format($val, $val < 10 ? 1 : 0) . ' kg';
                if ($u === 'L')  return number_format($val, $val < 10 ? 1 : 0) . ' L';
                if ($u === 'ml') return number_format($val, 0) . ' ml';
                return number_format($val, 2) . ' ' . $u;
              };
            ?>
            <tr>
              <td class="tbl-main"><?= htmlspecialchars($item->ingredient_name) ?></td>
              <td><?= htmlspecialchars($item->category_name ?? '—') ?></td>
              <td><?= $fmt($minStock, $item->unit) ?></td>
              <td style="color:<?= $currentColor ?>;font-weight:700;">
                <?= $fmt($current, $item->unit) ?>
              </td>
              <td>
                <span class="badge <?= $severity ?>">
                  -<?= $fmt($shortfall, $item->unit) ?>
                </span>
              </td>
              <td>
                <div class="acts">
                  <?php if (!empty($item->pending_pr_id)): ?>
                    <!-- CEO can only VIEW the existing PR -->
                    <a class="act"
                       href="<?= BASE_URL ?>/ceo/viewPR/<?= (int)$item->pending_pr_id ?>">
                      View PR
                    </a>
                  <?php else: ?>
                    <!-- No PR raised yet — CEO cannot raise, only view ingredient -->
                    <a class="act"
                       href="<?= BASE_URL ?>/ceo/viewIngredient/<?= (int)$item->ingredient_id ?>">
                      View
                    </a>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" style="text-align:center;color:var(--t2);padding:24px;">
              ✅ All ingredients are at healthy stock levels.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>