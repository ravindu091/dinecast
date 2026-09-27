<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="DineCast — Forecast-Driven Procurement and Food Planning System. Sign in to your account.">
  
  <title>DineCast — Login</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/login.css">
</head>

<body class="login-page">
  <div class="login-wrapper">

    <!-- ===== LEFT: Brand Panel ===== -->
    <div class="login-brand">
      <div class="brand-inner">

        <div class="brand-logo">
          <!-- Logo should be the icon + "DineCast" ONLY.
               Tagline and subtext below are real text, not part of the image,
               so keep logo.png cropped tight (no tagline baked in). -->
          <img src="<?= BASE_URL ?>/public/assets/img/logo.png" alt="DineCast Logo" class="brand-logo-img">
        </div>

        <div class="brand-tagline">
          <span>FORECAST</span><i>&bull;</i>
          <span>PLAN</span><i>&bull;</i>
          <span>PROCURE</span><i>&bull;</i>
          <span>SERVE</span>
        </div>

        <p class="brand-subtext">Forecast-Driven Procurement and Food Planning System</p>

      </div>
    </div>

    <!-- ===== RIGHT: Login Form Panel ===== -->
    <div class="login-form-panel">
      <div class="login-form-inner">

        <h1>Welcome!</h1>
        <p class="login-subtitle">Sign in to your account...</p>

        <div class="login-card">
          <h2 class="login-card-title">Login</h2>

          <?php if (isset($_SESSION['message'])): ?>
            <div style="padding: 12px 16px; margin-bottom: 20px; border-radius: 8px; font-size: 14px; font-weight: 500; background-color: <?= $_SESSION['message-type'] === 'error' ? '#fee2e2' : '#dcfce7' ?>; color: <?= $_SESSION['message-type'] === 'error' ? '#991b1b' : '#166534' ?>; border: 1px solid <?= $_SESSION['message-type'] === 'error' ? '#f87171' : '#86efac' ?>;">
                <?= htmlspecialchars($_SESSION['message']) ?>
            </div>
            <?php 
               unset($_SESSION['message']);
               unset($_SESSION['message-type']);
            ?>
          <?php endif; ?>

          <form action="<?= BASE_URL ?>/login" method="post" id="loginForm">

            <div class="fg">
              <label for="username">User Name</label>
              <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="username" required>
                <span class="input-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </span>
              </div>
              <span class="error-message" id="usernameError"></span>
            </div>

            <div class="fg">
              <label for="login-pass">Password</label>
              <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" required>
                <span class="input-icon input-icon--toggle" id="pwd-toggle" aria-label="Toggle password visibility">
                  <img src="<?= BASE_URL ?>/public/assets/img/show.png" alt="" class="icon-eye">
                  <img src="<?= BASE_URL ?>/public/assets/img/hide.png" alt="" class="icon-eye-off">
                </span>
              </div>
              <span class="error-message" id="passwordError"></span>
            </div>

            <div class="form-opts">
              <label class="cb-row">
                <input type="checkbox" id="remember-me"> Remember me
              </label>
              <a href="#" class="text-link">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login" id="login-submit-btn">Login</button>

            <p class="login-note">
              Don't have an account? <a href="#">Contact Admin Support</a>
            </p>

          </form>
        </div>

        <p class="login-footer">All rights reserved &copy; DineCast 2026</p>

      </div>
    </div>

  </div>

  <script>window.BASE_URL = '<?= BASE_URL ?>';</script>

  <!-- password visibility toggle -->
  <script>
    (function () {
      var toggle = document.getElementById('pwd-toggle');
      var pass   = document.getElementById('password');
      if (!toggle || !pass) return;
      toggle.addEventListener('click', function () {
        pass.type = pass.type === 'password' ? 'text' : 'password';
        toggle.classList.toggle('active');
      });
    })();
  </script>
  <script src="<?= BASE_URL ?>/public/assets/js/login.js"></script>
</body>
</html>