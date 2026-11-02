<?php
require __DIR__ . '/includes/auth.php';
requireLogin();

$user = currentUser();
$payments = getUserPayments();
$flash = getFlash();
$totalSpent = array_sum(array_map(fn($item) => (float) ($item['amount'] ?? 0), $payments));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | BuyCard</title>
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
            <a href="dashboard.php">Dashboard</a>
          </nav>
          <div class="nav-actions">
            <a href="services.php" class="btn btn-light">Buy More</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <main class="page-shell">
      <div class="container">
        <div class="section-header">
          <h2>Welcome, <?= htmlspecialchars($user['full_name']) ?>.</h2>
          <a href="services.php" class="btn btn-primary">Purchase Service</a>
        </div>

        <?php if ($flash): ?>
          <div class="notice <?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['message']) ?></div>
        <?php endif; ?>

        <div class="summary-box" style="margin-bottom:24px;">
          <h3>Account overview</h3>
          <table class="table">
            <tr><th>Name</th><td><?= htmlspecialchars($user['full_name']) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($user['email']) ?></td></tr>
            <tr><th>Phone</th><td><?= htmlspecialchars($user['phone']) ?></td></tr>
            <tr><th>Total Spent</th><td><?= formatMoney($totalSpent) ?></td></tr>
          </table>
        </div>

        <div class="auth-card">
          <h3>Recent payments</h3>
          <?php if (empty($payments)): ?>
            <p class="small-note">No payment record yet. Buy a service to get started.</p>
          <?php else: ?>
            <table class="table">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Amount</th>
                  <th>Method</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($payments as $payment): ?>
                  <tr>
                    <td><?= htmlspecialchars($payment['service']) ?></td>
                    <td><?= formatMoney((float) ($payment['amount'] ?? 0)) ?></td>
                    <td><?= htmlspecialchars($payment['payment_method'] ?? 'Card') ?></td>
                    <td><span class="badge"><?= htmlspecialchars($payment['status'] ?? 'Paid') ?></span></td>
                    <td><?= htmlspecialchars($payment['created_at'] ?? '') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </main>

    <footer class="site-footer">
      <div class="container footer-bottom">
        <span>Copyright © <span id="year"></span> BuyCard.</span>
        <div><a href="index.php">Home</a> · <a href="services.php">Services</a> · <a href="logout.php">Logout</a></div>
      </div>
    </footer>
  </body>
</html>
