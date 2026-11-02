<?php
require __DIR__ . '/includes/auth.php';
requireLogin();

$user = currentUser();
$selectedService = $_GET['service'] ?? 'Airtime';
$selectedAmount = (float) ($_GET['amount'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = trim((string) ($_POST['service'] ?? $selectedService));
    $amount = (float) ($_POST['amount'] ?? $selectedAmount);
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $paymentMethod = trim((string) ($_POST['payment_method'] ?? 'Card'));

    if ($service === '' || $amount <= 0 || $phone === '') {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Service, amount and phone number are required.'];
        header('Location: payment.php?service=' . urlencode($service) . '&amount=' . $amount);
        exit;
    }

    $payment = [
        'email' => $user['email'],
        'full_name' => $user['full_name'],
        'service' => $service,
        'amount' => $amount,
        'phone' => $phone,
        'payment_method' => $paymentMethod,
        'status' => 'Paid',
        'created_at' => date('Y-m-d H:i:s'),
    ];

    savePayment($payment);
    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Payment completed successfully.sent to barnabas account'];
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment | BuyCard</title>
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
            <a href="dashboard.php" class="btn btn-light">Dashboard</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <main class="page-shell">
      <div class="container auth-grid">
        <div class="auth-card">
          <h2>Complete payment</h2>
          <p class="small-note">You are paying for <strong><?= htmlspecialchars($selectedService) ?></strong>.</p>

          <form method="POST" action="payment.php">
            <div class="form-group">
              <label for="service">Service</label>
              <input id="service" name="service" type="text" value="<?= htmlspecialchars($selectedService) ?>" readonly />
            </div>

            <div class="form-group">
              <label for="amount">Amount</label>
              <input id="amount" name="amount" type="number" min="1" step="0.01" value="<?= htmlspecialchars((string) $selectedAmount) ?>" required />
            </div>

            <div class="form-group">
              <label for="phone">Recipient Phone</label>
              <input id="phone" name="phone" type="tel" placeholder="0803 000 0000" required />
            </div>

            <div class="form-group">
              <label for="payment_method">Payment Method</label>
              <select id="payment_method" name="payment_method">
                <option value="Card">Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Wallet">Wallet</option>
              </select>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Pay Now</button>
              <a href="services.php" class="link">Back to services</a>
            </div>
          </form>
        </div>

        <div class="summary-box">
          <h3>Payment summary</h3>
          <table class="table">
            <tr><th>Customer</th><td><?= htmlspecialchars($user['full_name']) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($user['email']) ?></td></tr>
            <tr><th>Service</th><td><?= htmlspecialchars($selectedService) ?></td></tr>
            <tr><th>Amount</th><td><?= formatMoney((float) $selectedAmount) ?></td></tr>
          </table>
        </div>
      </div>
    </main>

    <footer class="site-footer">
      <div class="container footer-bottom">
        <span>Copyright © <span id="year"></span> BuyCard.</span>
        <div><a href="index.php">Home</a> · <a href="dashboard.php">Dashboard</a></div>
      </div>
    </footer>
  </body>
</html>
