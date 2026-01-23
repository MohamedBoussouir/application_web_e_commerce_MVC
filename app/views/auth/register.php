<?php

include './app/views/layout/header.php'; ?>

<div class="login-youth-container d-flex align-items-center justify-content-center">
    <div class="floating-bubble bubble-1"></div>
    <div class="floating-bubble bubble-2"></div>

    <div class="col-md-8 col-lg-5 px-3" style="z-index: 5;">
        <div class="card login-card-premium animate__animated animate__backInUp">
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center mb-5">
                    <div class="icon-box-modern animate__animated animate__bounceIn">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h2 class="brand-name-youth mt-3">ELECTRO<span>TECH</span></h2>
                    <p class="text-muted fw-500">Crée ton espace et rejoins le club !</p>
                </div>

                <div class="error-container-youth">
                    <?php
                    if(isset($_SESSION['error'])){
                        if($_SESSION['error'] == 1){
                            echo "<div class='alert alert-custom-youth animate__animated animate__shakeX'>
                                    <i class='fas fa-lock-open me-2'></i> Mot de passe non confirmé !
                                  </div>";
                            $_SESSION['error'] = 0;
                        } elseif($_SESSION['error'] == 2){
                            echo "<div class='alert alert-custom-youth animate__animated animate__shakeX'>
                                    <i class='fas fa-envelope-open me-2'></i> Email non valide !
                                  </div>";
                            $_SESSION['error'] = 0;
                        } elseif($_SESSION['error'] == 3){
                            echo "<div class='alert alert-custom-youth animate__animated animate__shakeX'>
                                    <i class='fas fa-user-tag me-2'></i> Email ou nom déjà pris !
                                  </div>";
                            $_SESSION['error'] = 0;
                        }
                    }
                    ?>
                </div>

                <form action="?Request" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-4 animate__animated animate__fadeInLeft animate__delay-1s">
                            <div class="input-group-youth">
                                <label>NOM D'UTILISATEUR</label>
                                <div class="input-field-wrapper">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="username" placeholder="Ton nom complet" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4 animate__animated animate__fadeInRight animate__delay-1s">
                            <div class="input-group-youth">
                                <label>VOTRE EMAIL</label>
                                <div class="input-field-wrapper">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" name="email" placeholder="hello@tech.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 animate__animated animate__fadeInLeft animate__delay-2s">
                            <div class="input-group-youth">
                                <label>MOT DE PASSE</label>
                                <div class="input-field-wrapper">
                                    <i class="fas fa-key"></i>
                                    <input type="password" name="password" placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 animate__animated animate__fadeInRight animate__delay-2s">
                            <div class="input-group-youth">
                                <label>CONFIRMER</label>
                                <div class="input-field-wrapper">
                                    <i class="fas fa-check-double"></i>
                                    <input type="password" name="confirm_password" placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-4 custom-check animate__animated animate__fadeIn animate__delay-2s">
                        <input class="form-check-input shadow-none" type="checkbox" id="terms" required>
                        <label class="form-check-label small fw-bold text-muted" for="terms">
                            J'accepte les conditions d'utilisation
                        </label>
                    </div>

                    <button name="submit" value="register" type="submit" class="btn-youth-action shadow-lg animate__animated animate__pulse animate__infinite">
                        CRÉER MON COMPTE <i class="fas fa-paper-plane ms-2"></i>
                    </button>
                </form>

                <div class="text-center mt-5">
                    <p class="small fw-bold text-secondary">
                        Déjà inscrit ? <a href="?Login" class="text-info-custom">Se connecter</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* الحاوية الأساسية */
    .login-youth-container {
        min-height: 90vh;
        background: #f1f5f9;
        position: relative;
        overflow: hidden;
        padding: 50px 0;
    }

    /* الفقاعات الخلفية */
    .floating-bubble {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        z-index: 1;
        opacity: 0.12;
    }
    .bubble-1 { width: 400px; height: 400px; background: #38bdf8; top: -100px; left: -100px; }
    .bubble-2 { width: 350px; height: 350px; background: #0f172a; bottom: -100px; right: -100px; }

    /* البطاقة */
    .login-card-premium {
        background: white;
        border: none;
        border-radius: 35px;
        box-shadow: 0 30px 80px rgba(15, 23, 42, 0.1);
        border-bottom: 6px solid #38bdf8;
    }

    /* أيقونة الرأس */
    .icon-box-modern {
        width: 75px;
        height: 75px;
        background: #0f172a;
        color: #38bdf8;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 32px;
        box-shadow: 0 10px 25px rgba(56, 189, 248, 0.25);
    }

    .brand-name-youth {
        font-weight: 900;
        color: #0f172a;
        letter-spacing: -1px;
    }
    .brand-name-youth span { color: #38bdf8; }

    /* تنسيق الحقول */
    .input-group-youth label {
        font-size: 0.7rem;
        font-weight: 800;
        color: #94a3b8;
        margin-bottom: 8px;
        display: block;
        letter-spacing: 1.5px;
    }

    .input-field-wrapper {
        position: relative;
        background: #f8fafc;
        border: 2px solid #f1f5f9;
        border-radius: 18px;
        transition: 0.4s;
    }

    .input-field-wrapper:focus-within {
        border-color: #38bdf8;
        background: white;
        transform: translateY(-2px);
    }

    .input-field-wrapper i {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #cbd5e1;
        font-size: 1.1rem;
    }

    .input-field-wrapper input {
        width: 100%;
        border: none;
        background: transparent;
        padding: 14px 15px 14px 55px;
        outline: none;
        font-weight: 600;
        color: #1e293b;
    }

    /* ألوان التنبيهات */
    .alert-custom-youth {
        background: #fff1f2;
        border: none;
        color: #e11d48;
        border-radius: 15px;
        font-weight: 700;
        font-size: 0.85rem;
        margin-bottom: 20px;
        padding: 12px;
    }

    /* الزر */
    .btn-youth-action {
        width: 100%;
        background: #0f172a;
        color: white;
        border: none;
        padding: 18px;
        border-radius: 22px;
        font-weight: 800;
        letter-spacing: 1px;
        transition: 0.4s;
    }

    .btn-youth-action:hover {
        background: #38bdf8;
        color: #0f172a;
        transform: translateY(-3px);
    }

    .text-info-custom {
        color: #38bdf8;
        text-decoration: none;
        font-weight: 800;
    }

    /* تحسين الـ Checkbox */
    .custom-check .form-check-input:checked {
        background-color: #38bdf8;
        border-color: #38bdf8;
    }
</style>

<?php include './app/views/layout/footer.php'; ?>