<?php
/**
 * CEO Dashboard Layout
 * Provides the shell (sidebar + topbar + content area) for all CEO views.
 *
 * Expected $data keys:
 *   - title             (STRING)  page title
 *   - baseUrl           (STRING)  base URL of the app
 *   - activePage        (STRING)  current nav key: home|events|procurement|inventory|approvals|users|reports
 *   - userName          (STRING)  logged-in user's full name
 *   - userRole          (STRING)  e.g. "CEO / Top Management"
 *   - userCode          (STRING)  e.g. "DC-CEO-01"
 *   - notificationCount (INT)     optional — unread notifications
 *   - content           (STRING)  rendered inner view HTML (from renderWithLayout)
 */

// ---- Safe fallbacks (avoid undefined-variable notices) ----
$title             = $title             ?? 'DineCast — CEO Dashboard';
$baseUrl           = $baseUrl           ?? '';
$activePage        = $activePage        ?? '';
$userName          = $userName          ?? 'CEO';
$userRole          = $userRole          ?? 'Top Management';
$userCode          = $userCode          ?? 'DC-CEO-01';
$notificationCount = $notificationCount ?? 0;
$content           = $content           ?? '';

// ---- Avatar initials (e.g. "Amara Perera" → "AP") ----
$initials  = '';
$nameParts = preg_split('/\s+/', trim($userName));
if (count($nameParts) >= 2) {
    $initials = strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1));
} elseif (!empty($nameParts[0])) {
    $initials = strtoupper(substr($nameParts[0], 0, 2));
}

// ---- First name only (for welcome greeting) ----
$firstName = explode(' ', trim($userName))[0] ?? 'CEO';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="DineCast — Forecast-Driven Procurement and Food Planning System">
  <title><?= htmlspecialchars($title) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS load order: base → sidebar → CEO-specific overrides -->
  <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl) ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl) ?>/assets/css/layout.css">
  <script defer src="<?= htmlspecialchars($baseUrl) ?>/assets/js/layout.js"></script>
  <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl) ?>/assets/css/ceo.css">
</head>
<body>
<div class="dash">

  <!-- ====================================================
       SIDEBAR (fixed, green, dark)
       ==================================================== -->
  <aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sb-logo">
      <div class="sb-logo-icon">🍽️</div>
      <span class="sb-logo-name">Dine<span>Cast</span></span>
    </div>

    <!-- Overview section -->
    <div class="sb-section">Overview</div>
    <nav class="sb-links">

      <!-- Overview -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo">
        <div class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
              <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
            </svg>
          </span>
          <span class="nav-label">Overview</span>
        </div>
      </a>

      <!-- Events -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/events">
        <div class="nav-link <?= $activePage === 'events' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/>
              <line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
          </span>
          <span class="nav-label">Events</span>
        </div>
      </a>

      <!-- Procurement -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/procurement">
        <div class="nav-link <?= $activePage === 'procurement' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6"/>
            </svg>
          </span>
          <span class="nav-label">Procurement</span>
        </div>
      </a>

      <!-- Inventory -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/inventory">
        <div class="nav-link <?= $activePage === 'inventory' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
            </svg>
          </span>
          <span class="nav-label">Inventory</span>
        </div>
      </a>

      <!-- Management section -->
      <div class="sb-section">Management</div>

      <!-- PR Approvals -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/approvals">
        <div class="nav-link <?= $activePage === 'approvals' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 11 12 14 22 4"/>
              <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
          </span>
          <span class="nav-label">PR Approvals</span>
        </div>
      </a>

      <!-- Users / Team Directory -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/users">
        <div class="nav-link <?= $activePage === 'users' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
          </span>
          <span class="nav-label">Team</span>
        </div>
      </a>

      <!-- Reports & Analytics -->
      <a href="<?= htmlspecialchars($baseUrl) ?>/ceo/reports">
        <div class="nav-link <?= $activePage === 'reports' ? 'active' : '' ?>">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
              <polyline points="17 6 23 6 23 12"/>
            </svg>
          </span>
          <span class="nav-label">Reports &amp; Analytics</span>
        </div>
      </a>

    </nav>

    <!-- Sidebar footer (user + logout) -->
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

  <!-- ====================================================
       MAIN AREA (topbar + content)
       ==================================================== -->
  <div class="main-area">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>CEO Dashboard</h1>
        <p>Welcome back, <?= htmlspecialchars($firstName) ?>!</p>
      </div>
      <div class="topbar-right">
        <span class="date-chip" id="dateChip"></span>

        <button type="button" class="icon-btn" id="btnNotifications" title="Notifications" aria-label="Notifications">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
          </svg>
          <?php if ((int)$notificationCount > 0): ?>
            <span class="notif-badge"><?= (int)$notificationCount ?></span>
          <?php endif; ?>
        </button>
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

    <!-- Content (inner view HTML) -->
    <main class="content">
      <?= $content /* Trusted: already-rendered inner view HTML */ ?>
    </main>

  </div><!-- /main-area -->
</div><!-- /dash -->

<!-- Pass server values to JS -->
<script>
  window.BASE_URL  = <?= json_encode($baseUrl, JSON_UNESCAPED_SLASHES) ?>;
  window.USER_CODE = <?= json_encode($userCode) ?>;
</script>
<script src="<?= htmlspecialchars($baseUrl) ?>/assets/js/app.js"></script>
<script src="<?= htmlspecialchars($baseUrl) ?>/assets/js/ceo.js"></script>
</body>
</html>