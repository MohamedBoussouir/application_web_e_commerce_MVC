<?php

include './app/views/layout/header.php';

$products = $_POST["data"];
// var_dump($products);
?>

<style>
    :root {
        --bg-deep: #050507;
        --cyan-glow: #00f2ff;
        --card-bg: rgba(255, 255, 255, 0.02);
    }

    body {
        background-color: var(--bg-deep);
        color: white;
    }

    /* 1. Header الـ Boutique */
    .shop-header {
        padding: 60px 0;
        background: linear-gradient(to bottom, #0a0a0c, var(--bg-deep));
        border-bottom: 1px solid rgba(0, 242, 255, 0.1);
    }

    .shop-title {
        font-family: 'Syncopate', sans-serif;
        font-weight: 700;
        letter-spacing: 5px;
        text-transform: uppercase;
    }

    /* 2. الفلترة الجانبية (Sidebar) */
    .filter-sidebar {
        background: var(--card-bg);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        padding: 25px;
        backdrop-filter: blur(10px);
        position: sticky;
        top: 100px;
    }

    .filter-title {
        color: var(--cyan-glow);
        font-size: 0.9rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        padding-bottom: 10px;
    }

    .filter-item {
        margin-bottom: 15px;
        cursor: pointer;
        transition: 0.3s;
        color: #888;
        display: block;
        text-decoration: none;
    }

    .filter-item:hover,
    .filter-item.active {
        color: var(--cyan-glow);
        padding-left: 10px;
    }

    /* 3. بطاقات المنتجات المطورة */
    .product-grid-card {
        background: var(--card-bg);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 25px;
        overflow: hidden;
        transition: 0.5s cubic-bezier(0.2, 1, 0.3, 1);
        height: 100%;
    }

    .product-grid-card:hover {
        transform: translateY(-10px);
        border-color: var(--cyan-glow);
        box-shadow: 0 15px 40px rgba(0, 242, 255, 0.1);
    }

    .img-container {
        position: relative;
        aspect-ratio: 1/1;
        background: #000;
        overflow: hidden;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.6s;
    }

    .product-grid-card:hover img {
        transform: scale(1.1) rotate(2deg);
        filter: brightness(0.7);
    }

    /* أزرار سريعة تظهر عند الحوام */
    .quick-actions {
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 10px;
        padding-bottom: 15px;
        transition: 0.4s ease;
    }

    .product-grid-card:hover .quick-actions {
        bottom: 20px;
    }

    .action-btn {
        width: 45px;
        height: 45px;
        background: var(--cyan-glow);
        color: black;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: 0.3s;
    }

    .action-btn:hover {
        background: white;
        transform: scale(1.1);
    }

    /* السعر والمعلومات */
    .product-meta {
        padding: 20px;
        text-align: center;
    }

    .price-tag-shop {
        font-family: 'Syncopate', sans-serif;
        color: var(--cyan-glow);
        font-size: 1.1rem;
        font-weight: 700;
    }

    /* شريط البحث */
    .search-bar-wrap {
        position: relative;
        margin-bottom: 40px;
    }

    .search-input {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 50px;
        padding: 15px 30px;
        color: white;
        width: 100%;
        outline: none;
    }

    .search-input:focus {
        border-color: var(--cyan-glow);
        box-shadow: 0 0 20px rgba(0, 242, 255, 0.1);
    }
</style>

<section class="shop-header">
    <div class="container text-center">
        <h1 class="shop-title animate__animated animate__fadeInDown">Global Store</h1>
        <p class="text-secondary small">EXPLOREZ NOTRE INVENTAIRE TECHNOLOGIQUE HAUTE PRÉCISION</p>
    </div>
</section>

<div class="container my-5">
    <div class="row g-4">
        <aside class="col-lg-3">
            <div class="filter-sidebar animate__animated animate__fadeInLeft">
                <div class="search-bar-wrap">
                    <input type="text" class="search-input" placeholder="Rechercher...">
                </div>

                <h6 class="filter-title">Catégories</h6>
                <div class="filter-list">
                    <a href="#" class="filter-item active">Tout les produits</a>
                    <a href="#" class="filter-item">Smartphones</a>
                    <a href="#" class="filter-item">Laptops & PC</a>
                    <a href="#" class="filter-item">Accessoires</a>
                    <a href="#" class="filter-item">Gaming Gear</a>
                </div>

                <h6 class="filter-title mt-4">Prix Range</h6>
                <input type="range" class="form-range" min="0" max="20000" id="priceRange">
                <div class="d-flex justify-content-between small text-secondary">
                    <span>0 DH</span>
                    <span>20,000 DH</span>
                </div>
            </div>
        </aside>

        <main class="col-lg-9">
            <div class="row g-4">

                <?php foreach ($products as $idx => $p): ?>
                    <div class="col-md-6 col-xl-4 animate__animated animate__fadeInUp" style="animation-delay: <?= $idx * 0.1 ?>s;">
                        <div class="product-grid-card">
                            <div class="img-container">
                                <img src="<?= $p['image_url'] ?>" alt="<?= $p['title'] ?>">

                                <div class="quick-actions">
                                    <a class="action-btn" href="?panier_add=<?= $p['id'] ?>" title="Ajouter au panier">
                                        <i class="fas fa-shopping-cart"></i>
                </a>

                                    <a href="?page=product&id=<?= $p['id'] ?>" class="action-btn" title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <button class="action-btn" title="Favoris">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>

                                <?php if ($p['stock_quantity'] > 0): ?>
                                    <span class="badge-stock">En Stock: <?= $p['stock_quantity'] ?></span>
                                <?php else: ?>
                                    <span class="badge-stock out">Rupture</span>
                                <?php endif; ?>
                            </div>

                            <div class="product-meta">
                                <h6 class="fw-bold mb-1"><?= $p['title'] ?></h6>
                                <p class="text-secondary small mb-2"><?= substr($p['description'], 0, 30) ?>...</p>
                                <div class="price-tag-shop"><?= $p['price'] ?> DH</div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</div>
<script>



</script>

<?php include './app/views/layout/footer.php'; ?>