<?php
// session_start();
include './app/views/layout/header.php';

$data = [];
// var_dump($_SESSION['product_id']);


foreach ($_POST["data"] as $vale) {
    foreach ($_SESSION['product_id'] as $val) {
        if ($vale['id'] == $val) {
            array_push($data, $vale);
        }
    }
}
// var_dump($data);


















?>

<style>
    :root {
        --cyber-black: #050505;
        --neon-blue: #00d1ff;
        --neon-purple: #bd00ff;
        --neon-lime: #ccff00;
        --glass-panel: rgba(255, 255, 255, 0.03);
    }

    body {
        background-color: var(--cyber-black);
        color: white;
        font-family: 'Space Mono', monospace;
    }

    /* عنوان السلة بتأثير نيون */
    .cart-header {
        padding: 60px 0;
        text-align: center;
    }

    .cart-title-cyber {
        font-family: 'Orbitron', sans-serif;
        font-size: 3rem;
        font-weight: 900;
        letter-spacing: 5px;
        color: var(--neon-blue);
        text-shadow: 0 0 20px rgba(0, 209, 255, 0.5);
    }

    /* حاوية المنتجات (الجدول المطور) */
    .cart-container-cyber {
        background: var(--glass-panel);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        padding: 30px;
        backdrop-filter: blur(10px);
    }

    .cart-item-row {
        display: grid;
        grid-template-columns: 100px 2fr 1fr 1fr 50px;
        align-items: center;
        gap: 20px;
        padding: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: 0.3s;
    }

    .cart-item-row:hover {
        background: rgba(0, 209, 255, 0.05);
        border-left: 4px solid var(--neon-blue);
    }

    .cart-img-box {
        width: 80px;
        height: 80px;
        border: 1px solid var(--neon-blue);
        padding: 5px;
        background: black;
    }

    .cart-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-info h5 {
        font-family: 'Orbitron', sans-serif;
        font-size: 1rem;
        margin: 0;
        color: white;
    }

    /* أزرار الكمية المربعة */
    .quantity-box {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-qty {
        background: transparent;
        border: 1px solid var(--neon-blue);
        color: var(--neon-blue);
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .btn-qty:hover {
        background: var(--neon-blue);
        color: black;
    }

    /* ملخص السلة الجانبي */
    .summary-card-cyber {
        background: var(--glass-panel);
        border: 1px solid var(--neon-purple);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(189, 0, 255, 0.1);
    }

    .summary-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 0.9rem;
    }

    .total-line {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 15px;
        font-size: 1.3rem;
        font-weight: bold;
        color: var(--neon-lime);
    }

    /* زر الدفع النهائي */
    .btn-checkout-cyber {
        width: 100%;
        background: var(--neon-blue);
        color: black;
        border: none;
        padding: 15px;
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        letter-spacing: 2px;
        margin-top: 20px;
        transition: 0.4s;
    }

    .btn-checkout-cyber:hover {
        background: var(--neon-lime);
        box-shadow: 0 0 30px var(--neon-lime);
        transform: translateY(-5px);
    }

    .btn-remove {
        color: #ff4444;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-remove:hover {
        color: white;
        text-shadow: 0 0 10px #ff4444;
    }
</style>

<div class="container pb-5">
    <div class="cart-header animate__animated animate__fadeIn">
        <h1 class="cart-title-cyber">MY_CART_SYSTEM</h1>
        <p class="text-secondary small">VÉRIFICATION DES MODULES SÉLECTIONNÉS</p>
    </div>

    <div class="row g-5">
        <div class="col-lg-8">
            <div class="cart-container-cyber animate__animated animate__fadeInLeft">
                <?php foreach ($data as $idx): ?>
                    <?php

                    $qty = isset($_SESSION['cart'][$idx['id']]) ? $_SESSION['cart'][$idx['id']] : 1;

                    $total_item_price = $idx['price'] * $qty;
                    ?>
                    <div class="cart-item-row">
                        <div class="cart-img-box">
                            <img src="<?= $idx['image_url'] ?>" alt="">
                        </div>

                        <div class="item-info">
                            <h5><?= $idx['title'] ?></h5>
                        </div>

                        <div class="quantity-box">
                            <button class="btn-qty" onclick="location.href='?btn_n9s=<?= $idx['id'] ?>'">-</button>

                            <span id="quantity_<?= $idx['id'] ?>"><?= $qty ?></span>

                            <button class="btn-qty" onclick="location.href='?btn_zyad=<?= $idx['id'] ?>'">+</button>

                            <span class="price-unit" style="display: none;"><?= $idx['price'] ?></span>
                        </div>

                        <div class="summary-line total-line">
                            <span id="price" class="item-total-price">
                                <?= number_format($total_item_price, 2) ?>
                            </span>
                            <span class="currency">&nbsp;DH</span>
                        </div>

                        <div class="btn-remove">
                            <a href="?panier=<?= $idx['id'] ?>" class="fas fa-trash"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="summary-card-cyber animate__animated animate__fadeInRight">
                <h4 class="font-orbitron mb-4 fw-bold">SUMMARY_REPORT</h4>

                <div class="summary-line">
                    <span>SOUS-TOTAL</span>
                    <span id="SOUS-TOTAL">13,500 DH</span>
                </div>
                <div class="summary-line">
                    <span>LIVRAISON</span>
                    <span class="text-lime">GRATUIT</span>
                </div>
                <div class="summary-line">
                    <span>TAXE_SYSTEM</span>
                    <span>0.00 DH</span>
                </div>

                <div class="summary-line total-line">
                    <span>TOTAL</span>
                    <span id="TOTAL">13,500 DH</span>
                </div>

                <a href="?confirm_order" class="btn-checkout-cyber" style="text-decoration: none; display: inline-block;">
                    CONFIRM_ORDER <i class="fas fa-rocket ms-2"></i>
                </a>

                <div class="text-center mt-4">
                    <a href="?Boutique" class="text-white small opacity-50 text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i> CONTINUER_SHOPPING
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<Script>
    function total() {
        let pric = 0;
        const price = document.querySelectorAll('#price');
        price.forEach((element) => {
            pric += parseFloat(element.innerText.replace(/[^\d.-]/g, ''));

        })
        return pric;
    }
    // total();
    document.getElementById('TOTAL').innerText = total() + ' DH';
    document.getElementById('SOUS-TOTAL').innerText = total() + ' DH';



    // let btn_n9s = document.querySelectorAll('#btn_n9s');
    // let quantity = document.querySelectorAll('#quantity');
    // let btn_zyad = document.querySelectorAll('#btn_zyad');
    // let price = document.querySelectorAll('#price');
    // let price_stabl = document.querySelectorAll('#price_stabl');


    // price.forEach((element, key) => {

    //     if (getCookie(key) == "") {

    //         element.innerText = price_stabl[key].innerText * 1;
    //         quantity[key].innerText = 1;
    //     } else {

    //         element.innerText = price_stabl[key].innerText * getCookie(key);
    //         quantity[key].innerText = getCookie(key);
    //     }
    //     document.getElementById('TOTAL').innerText = total() + ' DH';
    //     document.getElementById('SOUS-TOTAL').innerText = total() + ' DH';


    // })
    // btn_n9s.forEach((element, key) => {
    //     element.addEventListener('click', (e) => {
    //         if (quantity[key].innerText == 1 | quantity[key].innerText == 0) {} else {
    //             quantity[key].innerText--;
    //             price[key].innerText = price[key].innerText - price_stabl[key].innerText;
    //             document.getElementById('TOTAL').innerText = total() + ' DH';
    //             document.getElementById('SOUS-TOTAL').innerText = total() + ' DH';
    //             add_cookie()
    //         }
    //     })
    // })
    // btn_zyad.forEach((element, key) => {
    //     element.addEventListener('click', (e) => {
    //         quantity[key].innerText++;

    //         let a = parseFloat(price_stabl[key].innerText.replace(/[^\d.-]/g, ''));
    //         let b = parseFloat(price[key].innerText.replace(/[^\d.-]/g, ''));
    //         price[key].innerText = a + b;
    //         document.getElementById('TOTAL').innerText = total() + ' DH';
    //         document.getElementById('SOUS-TOTAL').innerText = total() + ' DH';
    //         add_cookie()
    //     })
    // })

    // let date = new Date();
    // date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
    // let expires = "expires=" + date.toUTCString();

    // function add_cookie() {
    //     quantity.forEach((element, key) => {
    //         document.cookie = key + "=" + element.innerText + "; " + expires + "; path=/";
    //     })
    // }

    // function getCookie(name) {
    //     let cookieName = name + "=";

    //     let ca = document.cookie.split(';');

    //     for (let i = 0; i < ca.length; i++) {
    //         let c = ca[i];

    //         while (c.charAt(0) == ' ') c = c.substring(1);

    //         if (c.indexOf(cookieName) == 0) {
    //             return c.substring(cookieName.length, c.length);
    //         }
    //     }
    //     return "";
    // };
</Script>
<?php include './app/views/layout/footer.php'; ?>