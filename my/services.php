<?php
require __DIR__ . '/includes/auth.php';

$services = [
    ['name' => 'Airtime', 'price' => 100, 'description' => 'Recharge MTN, Airtel, Glo and 9mobile.' ],
    ['name' => 'Data', 'price' => 200, 'description' => 'Buy internet bundles instantly.' ],
    ['name' => 'Cable TV', 'price' => 1800, 'description' => 'DSTV, GOtv and StarTimes subscriptions.' ],
    ['name' => 'Electricity Bill', 'price' => 1000, 'description' => 'Prepaid and postpaid power bills.' ],
    ['name' => 'WAEC Card', 'price' => 1500, 'description' => 'Scratch cards for exams and school payment.' ],
];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services | BuyCard</title>
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
            <?php if (isLoggedIn()): ?>
              <a href="dashboard.php" class="btn btn-light">Dashboard</a>
              <a href="logout.php" class="btn btn-primary">Logout</a>
            <?php else: ?>
              <a href="login.php" class="btn btn-light">Login</a>
              <a href="register.php" class="btn btn-primary">Get Started</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header>

    <main class="page-shell">
      <div class="container">
        <div class="section-header">
          <h2>Buy Services</h2>
          <span class="subtle">Choose a service and pay securely.</span>
        </div>

        <div class="service-list">
          <?php foreach ($services as $service): ?>
            <div class="service-item">
              <div>
                <h3><?= htmlspecialchars($service['name']) ?></h3>
                <p><?= htmlspecialchars($service['description']) ?></p>
              </div>
              <div style="display:flex; align-items:center; gap:16px;">
                <span class="price-tag"><?= formatMoney((float) $service['price']) ?></span>
                <a href="payment.php?service=<?= urlencode($service['name']) ?>&amount=<?= (float) $service['price'] ?>" class="btn btn-primary">Pay Now</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </main>

    <footer class="site-footer">
      <div class="container footer-bottom">
        <span>Copyright © <span id="year"></span> BuyCard.</span>
        <div><a href="index.php">Home</a> · <a href="services.php">Services</a> · <a href="login.php">Login</a></div>
      </div>
    </footer>
  </body>
</html>
