<?php
/**
 * CEO View – Team Directory (View-Only)
 * CEO can VIEW team members but CANNOT manage them.
 * User management is the Admin's responsibility (FR1–FR3).
 *
 * Covers: FR29 (executive visibility)
 */
?>

<!-- ================================================
     TEAM DIRECTORY SECTION (CEO – View Only)
     ================================================ -->

<div class="sec-hdr">
  <h2>Team Directory</h2>
  <!-- NO "Add User" button — Admin only (FR1) -->
</div>

<!-- ===== STATS ===== -->
<div class="stats">
  <div class="stat c-blue">
    <div class="stat-ico">👤</div>
    <div class="stat-val"><?= (int)($data['stats']['active_users'] ?? 0) ?></div>
    <div class="stat-lbl">Active Users</div>
  </div>
  <div class="stat c-green">
    <div class="stat-ico">🟢</div>
    <div class="stat-val"><?= (int)($data['stats']['online_users'] ?? 0) ?></div>
    <div class="stat-lbl">Currently Online</div>
  </div>
</div>

<!-- ===== USERS LIST ===== -->
<div class="card">
  <div class="card-hdr">
    <h3>All System Users</h3>
    <span style="font-size:12px;color:var(--t3);">
      Read-only view · Contact Admin for changes
    </span>
  </div>

  <div style="padding:4px 0;">
    <?php if (!empty($data['users'])): ?>
      <?php foreach ($data['users'] as $u): ?>
        <?php
          // ---- Initials ----
          $nameParts = preg_split('/\s+/', trim($u->user_name ?? ''));
          $initials = '';
          if (count($nameParts) >= 2) {
              $initials = strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1));
          } elseif (!empty($nameParts[0])) {
              $initials = strtoupper(substr($nameParts[0], 0, 2));
          }

          // ---- Role label ----
          $roleLabel = $u->role_label ?? ucfirst(str_replace('_', ' ', $u->role ?? ''));

          // ---- Status badge ----
          $isOnline = !empty($u->is_online);
          $isActive = ($u->status ?? 'active') === 'active';

          if (!$isActive) {
              $statusBadge = ['bg-gray', 'Inactive'];
          } elseif ($isOnline) {
              $statusBadge = ['bg-green', 'Online'];
          } else {
              $statusBadge = ['bg-gray', 'Offline'];
          }

          // ---- Avatar color palette ----
          $avatarPalette = [
              ['var(--success-bg)',  'var(--success)'],
              ['var(--info-bg)',     'var(--info)'],
              ['var(--purple-bg)',   'var(--purple)'],
              ['var(--warning-bg)',  'var(--warning)'],
          ];
          [$avBg, $avColor] = $avatarPalette[($u->user_id ?? 0) % count($avatarPalette)];
        ?>
        <div class="usr-row">
          <div class="usr-av" style="background:<?= $avBg ?>;color:<?= $avColor ?>;">
            <?= htmlspecialchars($initials) ?>
          </div>
          <div>
            <div class="usr-name"><?= htmlspecialchars($u->user_name ?? '—') ?></div>
            <div class="usr-role">
              <?= htmlspecialchars($roleLabel) ?>
              &nbsp;·&nbsp;
              ID: <?= htmlspecialchars($u->user_code ?? '—') ?>
            </div>
          </div>
          <div class="usr-status">
            <span class="badge <?= $statusBadge[0] ?>">
              <?= htmlspecialchars($statusBadge[1]) ?>
            </span>
          </div>
          <div class="acts">
            <!-- NO Edit/Deactivate buttons — CEO cannot manage users -->
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="text-align:center;color:var(--t3);padding:24px 0;">
        No users found.
      </p>
    <?php endif; ?>
  </div>
</div>
