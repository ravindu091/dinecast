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
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/store.css">
</head>
<body>
<div class="dash">

  <!-- ====================================================
       SIDEBAR
       ==================================================== -->
  <aside class="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Main Menu</div>
    <nav>
      <a href="<?= $baseUrl ?>/store" class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
          </svg>
        </span>
        <span class="nav-label">Home</span>
      </a>

      <a href="<?= $baseUrl ?>/store/ingredient" class="nav-link <?= $activePage === 'ingredient' ? 'active' : '' ?>" >
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2a10 10 0 0 1 10 10H2A10 10 0 0 1 12 2z"/>
            <path d="M12 12v10M5.2 16.5l13.6-9M18.8 16.5L5.2 7.5"/>
          </svg>
        </span>
        <span class="nav-label">Ingredients</span>
      </a>

      <a href="<?= $baseUrl ?>/store/inventory" class="nav-link <?= $activePage === 'inventory' ? 'active' : '' ?>" >
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
          </svg>
        </span>
        <span class="nav-label">Inventory</span>
      </a>

      <a href="<?= $baseUrl ?>/store/po" class="nav-link <?= $activePage === 'po' ? 'active' : '' ?>" >
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
            <polyline points="10 9 9 9 8 9"/>
          </svg>
        </span>
        <span class="nav-label">Purchase Orders</span>
      </a>

      <a href="<?= $baseUrl ?>/store/stock" class="nav-link <?= $activePage === 'stock' ? 'active' : '' ?>" >
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="8 17 12 21 16 17"/>
            <line x1="12" y1="12" x2="12" y2="21"/>
            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"/>
          </svg>
        </span>
        <span class="nav-label">Receive Stock</span>
      </a>
    </nav>

    <div class="sb-footer">
      <div class="sb-user">
        <div class="sb-avatar">NK</div>
        <div>
          <div class="sb-user-name">Nadeesha Kumari</div>
          <div class="sb-user-role">Store Manager</div>
        </div>
      </div>
      <div class="sb-logout" onclick="logout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        Logout
      </div>
    </div>
  </aside>

  <!-- ====================================================
       MAIN AREA
       ==================================================== -->
  <div class="main-area">

    <header class="topbar">
      <div class="topbar-left">
        <h1>Store Manager Dashboard</h1>
        <p>Welcome back, Nadeesha!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn" title="Notifications">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
          </svg>
        </button>
      </div>
    </header>

    <main class="content">

      <?= $content ?>


    </main>
  </div><!-- /main-area -->
</div><!-- /dash -->

<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/assets/js/store.js"></script>
</body>
</html>
