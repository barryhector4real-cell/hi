<?php
require __DIR__ . '/includes/auth.php';
redirectIfLoggedIn('dashboard.php');

$flash = getFlash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['full_name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $phone === '' || $password === '') {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please fill in all required fields.'];
        header('Location: register.php');
        exit;
    }

    if (findUserByEmail($email)) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'An account with this email already exists.'];
        header('Location: register.php');
        exit;
    }

    $user = [
        'full_name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s'),
    ];

    saveUser($user);
    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Registration successful. Please login.'];
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | BuyCard</title>
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
          <h2>Create your account</h2>
          <p class="small-note">Sign up to buy airtime, data, TV subscriptions, electricity and exam cards in seconds.</p>

          <?php if ($flash): ?>
            <div class="notice <?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['message']) ?></div>
          <?php endif; ?>

          <form method="POST" action="register.php">
            <div class="form-group">
              <label for="full_name">Full name</label>
              <input id="full_name" name="full_name" type="text" placeholder="Enter your full name" required />
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input id="email" name="email" type="email" placeholder="you@example.com" required />
            </div>

            <div class="form-group">
              <label for="phone">Phone number</label>
              <input id="phone" name="phone" type="tel" placeholder="0803 000 0000" required />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" placeholder="Create a password" required />
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Register</button>
              <a href="login.php" class="link">Already have an account?</a>
            </div>
          </form>
        </div>

        <div class="summary-box">
          <h3>Why create an account?</h3>
          <ul class="check-list">
            <li>Fast checkout for airtime and data purchases.</li>
            <li>Payment history and service records.</li>
            <li>Zero stress for electricity and cable TV payments.</li>
            <li>Access to secure exam card transactions.</li>
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
