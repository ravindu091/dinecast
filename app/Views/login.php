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
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/login.css">
</head>
<body class="login-page">

  <div class="login-wrapper" >

    <!-- ===== LEFT: Brand Panel ===== -->
    <div class="login-brand">
      <div class="brand-logo">
        <div class="brand-icon">🍽️</div>
        <div class="brand-name-block">
          <div class="brand-name">Dine<span>Cast</span></div>
          <div class="brand-slogan">Forecast · Plan · Procure · Serve</div>
        </div>
      </div>

      <div class="brand-mid">
        <h2>Smart Dining,<br>Better Planning.</h2>
        <p>A forecast-driven procurement and<br>food planning system for modern<br>catering &amp; event operations.</p>
      </div>

      <div class="brand-pills">
        <span class="brand-pill">Forecast</span>
        <span class="brand-pill">Plan</span>
        <span class="brand-pill">Procure</span>
        <span class="brand-pill">Serve</span>
      </div>
    </div>

    <!-- ===== RIGHT: Login Form ===== -->
    <div class="login-form-panel">

      <h1>Welcome!</h1>
      <p class="login-subtitle">Sign in to your account...</p>

      <form onsubmit="handleLogin(); return false;">

        <div class="fg">
          <label for="login-user">User Name</label>
          <input type="text" id="login-user" placeholder="Enter your username" autocomplete="username">
        </div>

        <div class="fg">
          <label for="login-pass">Password</label>
          <input type="password" id="login-pass" placeholder="Enter your password" autocomplete="current-password">
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

      <p style="margin-top:48px;font-size:11px;color:var(--t3);text-align:center;">
        All rights reserved © DineCast 2026
      </p>
    </div>
  </div>
  <script>window.BASE_URL = '<?= $baseUrl ?>';</script>
  <script src="<?= $baseUrl ?>/assets/js/app.js"></script>
  <script src="<?= $baseUrl ?>/assets/js/login.js"></script>
</body>
</html>
