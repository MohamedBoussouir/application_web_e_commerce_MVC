<?php

include './app/views/layout/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;700&family=Playfair+Display:ital,wght@0,900;1,700&display=swap" rel="stylesheet">

<style>
    :root {
        --deep-void: #050505;
        --electric-blue: #38bdf8;
        --border-glass: rgba(255, 255, 255, 0.05);
    }

    body {
        background-color: var(--deep-void);
        color: #f8fafc;
        font-family: 'Space Grotesk', sans-serif;
    }

    /* 1. HERO SECTION - قريب جداً من الناف بار */
    .hero-main {
        padding-top: 30px; /* مسافة ضئيلة جداً ليكون قريباً من الأعلى */
        text-align: center;
        background: radial-gradient(circle at 50% 0%, rgba(56, 189, 248, 0.05) 0%, transparent 70%);
    }

    .hero-main h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 10vw, 7rem);
        font-weight: 900;
        margin-bottom: 5px;
        line-height: 1;
    }

    /* 2. قمة المبيعات (Best Sellers) */
    .best-sellers-section {
        padding: 60px 0;
    }

    .section-tag {
        color: var(--electric-blue);
        letter-spacing: 5px;
        font-size: 0.75rem;
        text-transform: uppercase;
        display: block;
        margin-bottom: 40px;
    }

    /* كرت منتج أنيق ونظيف */
    .premium-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--border-glass);
        padding: 20px;
        transition: 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
    }

    .premium-card:hover {
        border-color: var(--electric-blue);
        transform: translateY(-8px);
        background: rgba(255, 255, 255, 0.04);
    }

    .card-img-wrap {
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
        margin-bottom: 20px;
        background: #000;
    }

    .card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.7;
        transition: 0.6s;
    }

    .premium-card:hover img {
        opacity: 1;
        transform: scale(1.1);
    }

    .best-seller-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--electric-blue);
        color: #000;
        font-size: 0.65rem;
        font-weight: 900;
        padding: 5px 12px;
        z-index: 2;
        text-transform: uppercase;
    }

    .product-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        margin-bottom: 10px;
    }

    .price-label {
        color: var(--electric-blue);
        font-weight: 700;
        letter-spacing: 1px;
    }

    .btn-details {
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        text-decoration: none;
        display: inline-block;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.3s;
    }

    .btn-details:hover {
        border-color: var(--electric-blue);
        background: var(--electric-blue);
        color: #000;
    }
</style>

<section class="hero-main">
    <div class="container">
        <h1 class="animate__animated animate__fadeInDown">Electro<span style="color: var(--electric-blue);">Tech.</span></h1>
        <p class="text-secondary opacity-50 small">القطع التي شكلت مستقبل مبيعاتنا</p>
    </div>
</section>

<section class="best-sellers-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Hall of Fame</span>
            <h2 class="font-playfair text-white" style="font-size: 2.5rem;">الأكثر مبيعاً على الإطلاق</h2>
        </div>

        <div class="row g-4">
            <?php 
            $best_sellers = [
                ['name' => 'Titan GPU Core', 'price' => '12,500', 'img' => 'https://images.unsplash.com/photo-1591488320449-011701bb6704?w=500'],
                ['name' => 'Zenith Phone X', 'price' => '8,900', 'img' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500'],
                ['name' => 'Nova Monitor', 'price' => '4,200', 'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500'],
                ['name' => 'Vortex Console', 'price' => '5,400', 'img' => 'https://images.unsplash.com/photo-1485856407642-7f9ba0268b51?w=500']
            ];

            foreach($best_sellers as $item): ?>
            <div class="col-lg-3 col-md-6">
                <div class="premium-card animate__animated animate__fadeInUp">
                    <span class="best-seller-badge">Best Seller</span>
                    <div class="card-img-wrap">
                        <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
                    </div>
                    <h3 class="product-title text-white"><?= $item['name'] ?></h3>
                    <div class="price-label"><?= $item['price'] ?> DH</div>
                    <a href="#" class="btn-details">عرض التفاصيل</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container border-top border-secondary pt-5 opacity-50">
        <p class="small">هذه المنتجات تم اختيارها بناءً على تقييمات أكثر من 20,000 عميل حول العالم.</p>
    </div>
</section>

<?php include './app/views/layout/footer.php'; ?>