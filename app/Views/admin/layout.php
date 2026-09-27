<?php extract($data) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
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
      <div class="sb-logo-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
      </div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Administration</div>
    <nav class="sb-links">
      <a href="<?= $baseUrl ?>/admin" class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
        <span class="nav-label">Home</span>
      </a>
      <a href="<?= $baseUrl ?>/admin/users" class="nav-link <?= $activePage === 'users' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <span class="nav-label">User Management</span>
      </a>
      <a href="<?= $baseUrl ?>/admin/params" class="nav-link <?= $activePage === 'params' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg></span>
        <span class="nav-label">System Parameters</span>
      </a>
      <a href="<?= $baseUrl ?>/admin/uom" class="nav-link <?= $activePage === 'uom' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/></svg></span>
        <span class="nav-label">Units of Measure</span>
      </a>
      <a href="<?= $baseUrl ?>/admin/holidays" class="nav-link <?= $activePage === 'holidays' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
        <span class="nav-label">Holiday Calendar</span>
      </a>
      <a href="<?= $baseUrl ?>/admin/logs" class="nav-link <?= $activePage === 'logs' ? 'active' : '' ?>">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
        <span class="nav-label">Activity Logs</span>
      </a>
    </nav>

    <!-- LOGOUT BUTTON WORK AND PROFILE VIEW -->
    <?php
      $fullName = $_SESSION['fullName'] ?? 'User';
      $nameParts = explode(' ', trim($fullName));
      $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
      $role = ucfirst($_SESSION['role'] ?? 'Store Manager');
      $profilePicture = !empty($_SESSION['profile_picture']) ? BASE_URL . '/' . $_SESSION['profile_picture'] : null;
    ?>
    <div class="sb-footer">
      <a href="<?= BASE_URL ?>/profile">
        <div class="sb-user">
          <div class="sb-avatar">
            <?php if ($profilePicture): ?>
              <img src="<?= htmlspecialchars($profilePicture) ?>" alt="Profile" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            <?php else: ?>
              <span><?= htmlspecialchars($initials) ?></span>
            <?php endif; ?>
          </div>
          <div>
            <div class="sb-user-name"><?= htmlspecialchars($fullName) ?></div>
            <div class="sb-user-role"><?= htmlspecialchars($role) ?></div>
          </div>
        </div>
      </a>
      <a href="<?= BASE_URL ?>/logout" class="sb-logout">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        <span>Logout</span>
      </a>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main-area">
    <header class="topbar">
      <div class="topbar-left">
        <h1>Admin Dashboard</h1>
        <p><?= $pageTitle ?? 'System Administration Panel' ?></p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></button>
      </div>
    </header>

    <main class="content">
        <?= $content ?>
    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/public/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/public/assets/js/admin.js"></script>

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>
