<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DineCast — Chef Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/chef.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/layout.css">
  <script defer src="<?= $baseUrl ?>/assets/js/layout.js"></script>
  <?php if (isset($activePage) && $activePage === 'stock'): ?>
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/store.css">
  <?php endif; ?>

</head>
<body>
<div class="dash">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sb-logo">
      <div class="sb-logo-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="2"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>
      </div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <div class="sb-section">Kitchen</div>
    <nav class="sb-links">
      <a href="<?= $baseUrl ?>/chef">
        <div class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" data-section="sec-home" data-title="Chef Dashboard">
          <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
          <span class="nav-label">Home</span>
        </div>
      </a>
      <a href="<?= $baseUrl ?>/chef/menus">
        <div class="nav-link <?= $activePage === 'menus' ? 'active' : '' ?>" data-section="sec-menus" data-title="Menus">
          <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="2"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg></span>
          <span class="nav-label">Menus</span>
        </div>
      </a>
      <a href="<?= $baseUrl ?>/chef/recipes">
        <div class="nav-link <?= $activePage === 'recipes' ? 'active' : '' ?>" data-section="sec-recipes" data-title="Recipes">
          <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 0 1 10 10H2A10 10 0 0 1 12 2z"/><path d="M2 12h20M12 2v10"/></svg></span>
          <span class="nav-label">Recipes</span>
        </div>
      </a>
      <a href="<?= $baseUrl ?>/chef/stock">
        <div class="nav-link <?= $activePage === 'stock' ? 'active' : '' ?>" data-section="sec-stock" data-title="Request Ingredients">
          <span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg></span>
          <span class="nav-label">Stock Requests</span>
        </div>
      </a>
    </nav>

    <?php
      $fullName = $_SESSION['fullName'] ?? 'User';
      $nameParts = explode(' ', trim($fullName));
      $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
      $role = ucfirst($_SESSION['role'] ?? 'Store Manager');
      $userId = $_SESSION['userId'] ?? 'User';
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
        <h1>Chef Dashboard</h1>
        <p>Manage menus and recipes</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip"></span>
        <button class="icon-btn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></button>
        <button class="icon-btn responsive-menu-button" id="responsive-menu-button" aria-label="Open menu">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12H21M3 6H21M3 18H21" stroke-linecap="round"/></svg>
        </button>
      </div>
    </header>
    <div class="responsive-menu-overlay" id="responsive-menu-overlay">
      <button type="button" id="responsive-menu-close" aria-label="Close menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <main class="content">

      <?= $content ?>
      

    </main>
  </div>
</div>
<script>window.BASE_URL = '<?= $baseUrl ?>';</script>
<script src="<?= $baseUrl ?>/public/assets/js/app.js"></script>
<script src="<?= $baseUrl ?>/public/assets/js/chef.js"></script>

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>
</body>
</html>
