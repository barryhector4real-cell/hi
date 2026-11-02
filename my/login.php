<?php
require __DIR__ . '/includes/auth.php';
redirectIfLoggedIn('dashboard.php');

$flash = getFlash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim((string) ($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Email and password are required.'];
        header('Location: login.php');
        exit;
    }

    $user = findUserByEmail($email);
    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Invalid email or password.'];
        header('Location: login.php');
        exit;
    }

    $_SESSION['user'] = $user;
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | BuyCard</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/script.js" defer></script>
  </head>
  <body>
    <header class="site-header">
      <div class="topbar">
        <div class="container topbar-inner">
          <div class="topbar-links"><span>BuyCard App</span><span>Secure Payments</span></div>
          <div class="topbar-links"><span>WhatsApp:</span><span class="phone">09041504184</span></div>
        </div>
      </div>
      <div class="nav-wrap">
        <div class="container navbar">
          <a href="index.php" class="brand" aria-label="BuyCard home"><span class="brand-mark">B</span><span>BuyCard</span></a>
          <button class="mobile-menu-toggle" aria-label="Open menu" aria-expanded="false">☰</button>
          <nav class="nav-links" aria-label="Main navigation">
            <a href="index.php">Home</a>
            <a href="services.php">Services</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          </nav>
          <div class="nav-actions">
            <a href="login.php" class="btn btn-light">Login</a>
            <a href="register.php" class="btn btn-primary">Get Started</a>
          </div>
        </div>
      </div>
    </header>

    <main class="page-shell">
      <div class="container auth-grid">
        <div class="auth-card">
          <h2>Welcome back</h2>
          <p class="small-note">Sign in to continue paying for your services and managing purchases.</p>

          <?php if ($flash): ?>
            <div class="notice <?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['message']) ?></div>
          <?php endif; ?>

          <form method="POST" action="login.php">
            <div class="form-group">
              <label for="email">Email address</label>
              <input id="email" name="email" type="email" placeholder="you@example.com" required />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" placeholder="Enter your password" required />
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="register.php" class="link">Create account</a>
            </div>
          </form>
        </div>

        <div class="summary-box">
          <h3>Need a secure payment account?</h3>
          <ul class="check-list">
            <li>Buy airtime and data in a few taps.</li>
            <li>Pay TV and electricity bills online.</li>
            <li>Manage your payment history in one dashboard.</li>
            <li>Use your account for all services.</li>
          </ul>
        </div>
      </div>
    </main>

    <footer class="site-footer">
      <div class="container footer-bottom">
        <span>Copyright © <span id="year"></span> BuyCard.</span>
        <div><a href="index.php">Home</a> · <a href="login.php">Login</a> · <a href="register.php">Register</a></div>
      </div>
    </footer>
  </body>
</html>
