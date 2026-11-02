<?php require __DIR__ . '/includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BuyCard NG | Buy Scratch Cards</title>
    <meta name="description" content="Secure bill payment and exam card purchases in Nigeria." />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/script.js" defer></script>
  </head>
  <body>
    <header class="site-header">
      <div class="topbar">
        <div class="container topbar-inner">
          <div class="topbar-links">
            <span>BuyCard App</span>
            <span>Secure Payments</span>
          </div>
          <div class="topbar-links">
            <span>WhatsApp:</span>
            <span class="phone">09041504184</span>
          </div>
        </div>
      </div>

      <div class="nav-wrap">
        <div class="container navbar">
          <a href="index.php" class="brand" aria-label="BuyCard home">
            <span class="brand-mark">B</span>
            <span>BuyCard</span>
          </a>

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

      <div class="container hero">
        <div class="hero-text">
          <h1>Buy Scratch Cards</h1>
          <p>Get instant access to all Nigerian examination scratch card pins for WAEC, NECO, NABTEB and NBAIS at the most affordable prices.</p>

          <div class="cta-row">
            <a class="btn btn-primary" href="register.php">Get Started</a>
            <a class="btn btn-light" href="login.php">Login</a>
          </div>

          <div class="hero-meta">
            <span><i class="dot"></i> Secure transactions</span>
            <span><i class="dot"></i> Fast delivery</span>
            <span><i class="dot"></i> 24/7 support</span>
          </div>
        </div>

        <div class="hero-visual" aria-label="BuyCard app preview">
          <div class="device">
            <div class="device-screen">
              <img src="https://www.buycard.ng/asset/paradise/images/slide-1.png" alt="BuyCard app preview" />
            </div>
          </div>
          <div class="mini-card">
            <strong>Instant payment</strong>
            <span>WAEC, NECO, Airtime, Data and Electricity</span>
          </div>
        </div>
      </div>
    </header>

    <div class="brand-copy">
      <div class="container">
        <p class="brand-statement">BuyCard is a secured and easy to use educational and bill payment platform. Our services include Nigerian Examination Scratch Card, JAMB services, Airtime topup, Data, Cable TV subscription and Electricity bill payment. We offer the most affordable price for these services in Nigeria.</p>
      </div>
    </div>

    <main>
      <section class="section">
        <div class="container">
          <div class="section-header">
            <h2>Popular Services</h2>
            <span class="subtle">All-in-one digital payment platform</span>
          </div>

          <div class="service-grid">
            <article class="service-card">
              <div class="service-icon">📱</div>
              <h3>Buy Airtime</h3>
              <p>Top up mobile lines quickly and securely.</p>
              <span class="price">From ₦100</span>
            </article>
            <article class="service-card">
              <div class="service-icon">📶</div>
              <h3>Buy Data</h3>
              <p>Affordable internet bundles for all networks.</p>
              <span class="price">From ₦200</span>
            </article>
            <article class="service-card">
              <div class="service-icon">📺</div>
              <h3>TV Subscription</h3>
              <p>Pay for DStv, GOtv and StarTimes online.</p>
              <span class="price">From ₦1,800</span>
            </article>
            <article class="service-card">
              <div class="service-icon">⚡</div>
              <h3>Electricity Bill</h3>
              <p>Settle prepaid and postpaid electricity bills.</p>
              <span class="price">From ₦1,000</span>
            </article>
            <article class="service-card">
              <div class="service-icon">🎓</div>
              <h3>Exam Cards</h3>
              <p>WAEC, NECO, NABTEB and NBAIS scratch cards.</p>
              <span class="price">From ₦1,500</span>
            </article>
          </div>
        </div>
      </section>

      <section class="feature-band">
        <div class="container feature-row">
          <div class="feature-item">
            <div class="feature-chip">⚡</div>
            <div>
              <h4>Fast Delivery</h4>
              <p>Get vouchers instantly</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-chip">🔒</div>
            <div>
              <h4>Secure</h4>
              <p>Protected transactions</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-chip">💬</div>
            <div>
              <h4>Support</h4>
              <p>Reliable customer care</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-chip">💸</div>
            <div>
              <h4>Affordable</h4>
              <p>Best prices in market</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container info-layout">
          <div class="info-box">
            <h3>Why choose BuyCard?</h3>
            <p>We make bill payment and exam card purchases simple, secure and accessible across Nigeria. Whether you are paying school fees or topping up your mobile line, we keep every transaction smooth and reliable.</p>
            <ul class="check-list">
              <li>Easy ordering with instant confirmation.</li>
              <li>Trusted by students and households nationwide.</li>
              <li>Simple platform for all digital payments.</li>
              <li>Quick support whenever you need help.</li>
            </ul>
          </div>

          <div class="info-box">
            <div class="stats-card">
              <div class="stats-grid">
                <div class="stat">
                  <strong>100%</strong>
                  <span>Secure</span>
                </div>
                <div class="stat">
                  <strong>24/7</strong>
                  <span>Support</span>
                </div>
                <div class="stat">
                  <strong>5+</strong>
                  <span>Services</span>
                </div>
                <div class="stat">
                  <strong>Fast</strong>
                  <span>Delivery</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="container">
        <div class="footer-top">
          <div>
            <div class="footer-brand">
              <span class="brand-mark">B</span>
              <span>BuyCard</span>
            </div>
            <p>Fast and secure payment platform for exam cards, data, airtime, cable TV, and electricity bills.</p>
          </div>
          <div>
            <h4>Quick Links</h4>
            <ul>
              <li><a href="services.php">Buy Airtime</a></li>
              <li><a href="services.php">Buy Data</a></li>
              <li><a href="services.php">TV Subscription</a></li>
              <li><a href="services.php">Electricity Bill</a></li>
            </ul>
          </div>
          <div>
            <h4>External Links</h4>
            <ul>
              <li><a href="https://www.waecdirect.org/" target="_blank" rel="noopener noreferrer">WAEC Result Checker</a></li>
              <li><a href="https://results.neco.gov.ng/" target="_blank" rel="noopener noreferrer">NECO Results</a></li>
              <li><a href="https://eworld.nabteb.gov.ng/" target="_blank" rel="noopener noreferrer">NABTEB Results</a></li>
              <li><a href="https://resultchecker.nbais.com.ng/" target="_blank" rel="noopener noreferrer">NBAIS Results</a></li>
            </ul>
          </div>
          <div>
            <h4>Contact Us</h4>
            <ul>
              <li>Address: Port Harcourt, Rivers State</li>
              <li>Email: info@buycard.ng</li>
              <li>Phone: 09041504184</li>
              <li>WhatsApp: 09041504184</li>
            </ul>
          </div>
        </div>

        <div class="footer-bottom">
          <span>Copyright © <span id="year"></span> BuyCard.</span>
          <div>
            <a href="index.php">Home</a> ·
            <a href="services.php">Services</a> ·
            <a href="login.php">Login</a> ·
            <a href="register.php">Register</a> ·
            <a href="dashboard.php">Dashboard</a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
