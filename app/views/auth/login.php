<?php
session_start();
include './app/views/layout/header.php'; ?>


<div class="row justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="col-md-5">
        <div class="card auth-card animate__animated animate__zoomIn">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="auth-icon-circle">
                        <i class="fas fa-lock text-primary fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mt-3">Connexion</h3>
                    <p class="text-muted small">Accédez à votre espace personnel</p>
                </div>

                <?php
                // var_dump($_SESSION['error']);
                if ($_SESSION['error'] == 5):
                ?>
                    <div class="alert alert-danger py-2 small">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= "Adresse e-mail et mot de passe incorrects " ?>
                    </div>
                <?php endif;
                $_SESSION['error'] = 0;
                ?>

                <form action="?Request" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-0" placeholder="exemple@mail.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-key text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-0" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button name="submit" value="login" type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm">
                        Se connecter <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </form>

                <div class="text-center mt-4">
                    <p class="small text-muted">Vous n'avez pas de compte ? <a href="?Register" class="text-primary fw-bold text-decoration-none">S'inscrire</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .auth-card {
        border: none;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .auth-icon-circle {
        width: 70px;
        height: 70px;
        background: rgba(67, 97, 238, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .form-control:focus {
        box-shadow: none;
        background-color: #fff !important;
        border: 1px solid var(--primary-color) !important;
    }
</style>


<?php include './app/views/layout/footer.php'; ?>