<?php
// session_start(); // تأكد من وجودها في الهيدر أو هنا
include './app/views/layout/header.php'; 

// $data هنا تمثل المنتجات القادمة من الكنترولر (ProductsController)
$products = isset($data) ? $data : []; 
?>

<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;700&family=Playfair+Display:ital,wght@0,900;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
    :root {
        --deep-void: #050505;
        --electric-blue: #38bdf8;
        --border-glass: rgba(255, 255, 255, 0.05);
        --text-silk: #f8fafc;
    }

    body {
        background-color: var(--deep-void);
        color: var(--text-silk);
        font-family: 'Space Grotesk', sans-serif;
        margin: 0;
    }

    /* 1. HERO SECTION - قريب جداً من الهيدر */
    .hero-main {
        padding: 40px 0;
        text-align: center;
        background: radial-gradient(circle at 50% 0%, rgba(56, 189, 248, 0.08) 0%, transparent 70%);
    }

    .hero-main h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3.5rem, 12vw, 8rem);
        font-weight: 900;
        margin-bottom: 5px;
        line-height: 0.9;
    }

    /* 2. قسم عرض المنتجات */
    .shop-section {
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

    /* كرت المنتج الاحترافي للمستخدم */
    .user-product-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--border-glass);
        padding: 20px;
        border-radius: 0; /* لمسة كلاسيكية حادة */
        transition: 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .user-product-card:hover {
        border-color: var(--electric-blue);
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.04);
    }

    .img-wrap {
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
        margin-bottom: 20px;
        background: #000;
    }

    .img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
        transition: 0.6s;
    }

    .user-product-card:hover img {
        opacity: 1;
        transform: scale(1.1);
    }

    .product-info h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #fff;
    }

    .price-box {
        color: var(--electric-blue);
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    /* زر الشراء العصري */
    .btn-buy {
        background: transparent;
        border: 1px solid var(--electric-blue);
        color: var(--electric-blue);
        width: 100%;
        padding: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        transition: 0.3s;
        cursor: pointer;
        margin-top: auto;
    }

    .btn-buy:hover {
        background: var(--electric-blue);
        color: #000;
        box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);
    }

    .stock-badge {
        position: absolute;
        top: 30px;
        left: 30px;
        background: rgba(0,0,0,0.7);
        padding: 4px 10px;
        font-size: 0.7rem;
        color: var(--electric-blue);
        border: 1px solid var(--electric-blue);
        z-index: 2;
    }
</style>

<section class="hero-main">
    <div class="container">
        <p class="animate__animated animate__fadeInDown" style="letter-spacing: 5px; font-size: 0.7rem; color: var(--electric-blue);">PREMIUM TECH EXPERIENCE</p>
        <h1 class="animate__animated animate__fadeInUp">Electro<span style="color: var(--electric-blue);">Tech.</span></h1>
        <p class="text-secondary opacity-50 small mt-3">استكشف القطع الأكثر طلباً في عالم التكنولوجيا اليوم</p>
    </div>
</section>

<section class="shop-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">New Arrivals</span>
            <h2 class="font-playfair text-white" style="font-size: 2.8rem; font-style: italic;">مجموعتنا المختارة لك</h2>
        </div>

        <div class="row g-4">
            <?php if(!empty($products)): foreach($products as $idx => $item): ?>
            <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp" style="animation-delay: <?= $idx*0.1 ?>s;">
                <div class="user-product-card">
                    <?php if(($item['stock_quantity'] ?? 0) > 0): ?>
                        <span class="stock-badge">In Stock</span>
                    <?php else: ?>
                        <span class="stock-badge" style="color: #ff4444; border-color: #ff4444;">Sold Out</span>
                    <?php endif; ?>

                    <div class="img-wrap">
                        <img src="<?= $item['image_url'] ?>" alt="<?= $item['title'] ?>">
                    </div>

                    <div class="product-info">
                        <h3><?= $item['title'] ?></h3>
                        <div class="price-box"><?= $item['price'] ?> DH</div>
                    </div>

                    <form action="?Order" method="POST">
                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                        <button type="submit" name="buy_now" class="btn-buy" <?= ($item['stock_quantity'] ?? 0) <= 0 ? 'disabled' : '' ?>>
                            <?= ($item['stock_quantity'] ?? 0) > 0 ? 'Acheter Maintenant' : 'Indisponible' ?>
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-secondary">لا توجد منتجات معروضة حالياً. انتظرونا قريباً!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-5" style="border-top: 1px solid var(--border-glass);">
    <div class="container text-center py-4">
        <h4 class="font-playfair italic text-white-50">"التكنولوجيا ليست مجرد أداة، بل هي امتداد لإبداعك."</h4>
    </div>
</section>

<?php include './app/views/layout/footer.php'; ?>