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
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/kitchenhome.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/home.css">
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
        <a href="<?= $baseUrl ?>/kitchen">
            
            <div class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" data-section="sec-home" data-title="Kitchen Manager Dashboard">
              <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
              <span class="nav-label">Home</span>
            </div>
            </a>
        <a href="<?= $baseUrl ?>/kitchen/events">

            <div class="nav-link <?= $activePage === 'events' ? 'active' : '' ?>" data-section="sec-events" data-title="Events">
              <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
              <span class="nav-label">Events</span>
            </div>
        </a>
        <a href="<?= $baseUrl ?>/kitchen/bookings">

            <div class="nav-link <?= $activePage === 'bookings' ? 'active' : '' ?>" data-section="sec-bookings" data-title="Bookings">
              <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
              <span class="nav-label">Bookings</span>
            </div>
        </a>
        <a href="<?= $baseUrl ?>/kitchen/forecast">

            <div class="nav-link <?= $activePage === 'forecast' ? 'active' : '' ?>" data-section="sec-forecast" data-title="Forecast">
              <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>
              <span class="nav-label">Forecast</span>
            </div>
        </a>
        <a href="<?= $baseUrl ?>/kitchen/pr">
        <div class="nav-link <?= $activePage === 'pr' ? 'active' : '' ?>" data-section="sec-pr" data-title="Purchase Requisitions">
          <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6"/></svg></span>
          <span class="nav-label">Purchase Requisitions</span>
        </div>
        </a>
        <a href="<?= $baseUrl ?>/kitchen/attendance">
            <div class="nav-link <?= $activePage === 'attendance' ? 'active' : '' ?>" data-section="sec-attendance" data-title="Attendance">
        <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <span class="nav-label">Attendance</span>
      </div>
        </a>
      
    </nav>

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
        <h1>Kitchen Manager Dashboard</h1>
        <p>Welcome back, <?= htmlspecialchars($nameParts[0]) ?>!</p>
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
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/kitchen.js"></script>
</body>
</html>
