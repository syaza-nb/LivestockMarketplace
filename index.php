<?php
session_start();
require_once 'db_connect.php';
include 'inc/header.php';


try {
    $stmt = $pdo->query("SELECT DISTINCT category FROM livestock");
    $dbCategories = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $dbCategories = ['Cattle', 'Sheep', 'Goat']; 
}

$categoryImages = [
    "Cattle" => "cattle breed.jpg",
    "Sheep"  => "sheep breed.jpg",
    "Goat"   => "goat breed.jpg"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>RanchLink | Livestock Marketplace</title>
</head>
<body>
    <header id="home">
        <!-- <nav>
            <div class="nav__header">
                <div class="nav__logo">
                    <a href="#">RANCHLINK</a>
                </div>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <ul class="nav__links" id="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#categories">Categories</a></li>
                <li><a href="#featured">Marketplace</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="nav__btn">
                <button class="btn">Sell Livestock</button>
            </div>
        </nav> -->
        <div class="section__container header__container">
          <div class="header__content">
            <p class="subtitle">ESTABLISHED 2026</p>
            <h1>PREMIUM LIVESTOCK <span>AT YOUR FINGERTIPS</span></h1>
            <p class="description">
              Connecting you to the finest breeds in Selangor. Buy, sell, or bid on 
              certified cattle, sheep, and goats with transparency and ease.
            </p>
            <div class="header__btns">
              <a href="#categories" class="btn">Explore Categories</a>
              <a href="Models/customer_dashboard.php" class="btn btn__secondary">View Marketplace</a>
            </div>
          </div>
        </div>
      </header>

    <section class="section__container range__container" id="categories">
    <h2 class="section__header">ELITE BREED CATEGORIES</h2>
    <div class="range__grid">
        <?php foreach ($dbCategories as $cat): ?>
            <?php 
                $targetUrl = "/LivestockMarketplace/Models/customer_dashboard.php?category=" . urlencode($cat);
                
                $displayImage = isset($categoryImages[$cat]) ? $categoryImages[$cat] : "default-livestock.jpg";
            ?>
            <div class="range__card" onclick="window.location.href='<?= $targetUrl ?>'" style="cursor: pointer;">
                <img src="assets/<?= $displayImage ?>" 
                     alt="<?= htmlspecialchars($cat) ?>" 
                     onerror="this.src='assets/default-livestock.jpg';">
                
                <div class="range__details">
                    <h4><?= strtoupper(htmlspecialchars($cat)) ?></h4>
                    <a href="<?= $targetUrl ?>">
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="select__container" id="featured">
    <!-- <section class="section__container auction__container">
        <div class="auction__content">
            <div class="auction__image">
                <img src="assets/auction-hero.jpg" alt="Live Auction" />
                <div class="live__badge"><span></span> LIVE AUCTION</div>
            </div>
            <div class="auction__details">
                <p class="subtitle">TRENDING NOW</p>
                <h2 class="section__header" style="text-align: left; margin-bottom: 1rem;">ELITE BRAHMAN BULL</h2>
                <p class="description">Current high bid is holding at <strong>RM 8,500</strong>. Don't miss out on this prime breeding stock.</p>
                
                <div class="countdown__timer">
                    <div class="timer__block">
                        <span id="days">02</span>
                        <p>Days</p>
                    </div>
                    <div class="timer__block">
                        <span id="hours">14</span>
                        <p>Hrs</p>
                    </div>
                    <div class="timer__block">
                        <span id="minutes">35</span>
                        <p>Min</p>
                    </div>
                </div>
                
                <a href="Models/auction_market2.php" class="btn">Place Your Bid</a>
            </div>
        </div>
    </section> -->

    <section class="section__container trust__container">
        <h2 class="section__header">THE RANCHLINK STANDARD</h2>
        <div class="trust__grid">
            <div class="trust__card">
                <span><i class="ri-shield-check-line"></i></span>
                <h4>Certified Health</h4>
                <p>Every animal listed comes with verified veterinary health certifications and vaccination records.</p>
            </div>
            <div class="trust__card">
                <span><i class="ri-verified-badge-line"></i></span>
                <h4>Verified Farmers</h4>
                <p>We personally vet our sellers in Selangor to ensure you are buying from reputable, ethical breeders.</p>
            </div>
            <div class="trust__card">
                <span><i class="ri-hand-coin-line"></i></span>
                <h4>Transparent Pricing</h4>
                <p>No hidden commissions. What you see is what you pay, with direct farm-to-buyer transactions.</p>
            </div>
        </div>
    </section>
</section>

    <?php include 'inc/footer.php'; ?>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>