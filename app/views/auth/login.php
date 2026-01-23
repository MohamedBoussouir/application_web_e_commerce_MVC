<?php

include './app/views/layout/header.php'; ?>

<div class="login-youth-container d-flex align-items-center justify-content-center">
    <div class="floating-bubble bubble-1"></div>
    <div class="floating-bubble bubble-2"></div>

    <div class="col-md-6 col-lg-4 px-3" style="z-index: 5;">
        <div class="card login-card-premium animate__animated animate__backInUp">
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center mb-5">
                    <div class="icon-box-modern animate__animated animate__bounceIn">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h2 class="brand-name-youth mt-3">ELECTRO<span>TECH</span></h2>
                    <p class="text-muted fw-500">Prêt pour l'aventure numérique ?</p>
                </div>

                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 5): ?>
                    <div class="alert alert-custom-youth animate__animated animate__headShake">
                        <i class="fas fa-ghost me-2"></i> Oups! Accès refusé.
                    </div>
                <?php 
                    $_SESSION['error'] = 0;
                    endif; 
                ?>

                <form action="?Request" method="POST">
                    <div class="input-group-youth mb-4 animate__animated animate__fadeInLeft animate__delay-1s">
                        <label>VOTRE EMAIL</label>
                        <div class="input-field-wrapper">
                            <i class="far fa-envelope"></i>
                            <input type="email" name="email" placeholder="hello@tech.com" required>
                        </div>
                    </div>

                    <div class="input-group-youth mb-5 animate__animated animate__fadeInRight animate__delay-1s">
                        <label>MOT DE PASSE</label>
                        <div class="input-field-wrapper">
                            <i class="fas fa-key"></i>
                            <input type="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <button name="submit" value="login" type="submit" class="btn-youth-action shadow-lg animate__animated animate__pulse animate__infinite">
                        LOG IN <i class="fas fa-rocket ms-2"></i>
                    </button>
                </form>

                <div class="text-center mt-5">
                    <p class="small fw-bold text-secondary">
                        Nouveau ici ? <a href="?Register" class="text-info-custom">Rejoignez le club !</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* الحاوية الأساسية متناسقة مع ألوان الهيدر */
    .login-youth-container {
        min-height: 85vh;
        background: #f1f5f9; /* رمادي فاتح جداً ليبرز الهيدر الداكن */
        position: relative;
        overflow: hidden;
    }

    /* أشكال عائمة خلفية (ألوان الهيدر) */
    .floating-bubble {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        z-index: 1;
        opacity: 0.15;
    }
    .bubble-1 { width: 300px; height: 300px; background: #38bdf8; top: -50px; left: -50px; }
    .bubble-2 { width: 250px; height: 250px; background: #0f172a; bottom: -50px; right: -50px; }

    /* البطاقة البريميوم */
    .login-card-premium {
        background: white;
        border: none;
        border-radius: 35px; /* مستديرة جداً وشبابية */
        box-shadow: 0 25px 70px rgba(15, 23, 42, 0.08);
        border-bottom: 5px solid #38bdf8; /* خط سفلي بلون الهيدر */
    }

    /* صندوق الأيقونة */
    .icon-box-modern {
        width: 70px;
        height: 70px;
        background: #0f172a; /* لون الهيدر الداكن */
        color: #38bdf8; /* لون الهيدر المضيء */
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 30px;
        box-shadow: 0 10px 20px rgba(56, 189, 248, 0.2);
    }

    .brand-name-youth {
        font-weight: 900;
        letter-spacing: -1px;
        color: #0f172a;
    }
    .brand-name-youth span { color: #38bdf8; }

    /* تنسيق المدخلات الشبابي */
    .input-group-youth label {
        font-size: 0.75rem;
        font-weight: 800;
        color: #64748b;
        margin-bottom: 8px;
        display: block;
        letter-spacing: 1px;
    }

    .input-field-wrapper {
        position: relative;
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 18px;
        transition: 0.3s ease;
    }

    .input-field-wrapper:focus-within {
        border-color: #38bdf8;
        background: white;
        box-shadow: 0 0 15px rgba(56, 189, 248, 0.1);
    }

    .input-field-wrapper i {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .input-field-wrapper input {
        width: 100%;
        border: none;
        background: transparent;
        padding: 15px 15px 15px 55px;
        outline: none;
        font-weight: 600;
        color: #0f172a;
    }

    /* الزر الأكشن (متناسق مع الهيدر) */
    .btn-youth-action {
        width: 100%;
        background: #0f172a;
        color: white;
        border: none;
        padding: 18px;
        border-radius: 20px;
        font-weight: 800;
        letter-spacing: 1px;
        transition: 0.4s;
    }

    .btn-youth-action:hover {
        background: #38bdf8;
        color: #0f172a;
        transform: scale(1.02);
    }

    /* التنبيه */
    .alert-custom-youth {
        background: #fff1f2;
        border: none;
        color: #e11d48;
        border-radius: 15px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .text-info-custom {
        color: #38bdf8;
        text-decoration: none;
        border-bottom: 2px solid #38bdf8;
    }

    .fw-500 { font-weight: 500; }
</style>

<?php include './app/views/layout/footer.php'; ?>