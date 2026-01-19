<?php
session_start();
include './app/views/layout/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">
        <div class="card auth-card animate__animated animate__fadeInUp">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="auth-icon-circle" style="background: rgba(114, 9, 183, 0.1);">
                        <i class="fas fa-user-plus text-secondary fa-2x" style="color: #7209b7 !important;"></i>
                    </div>
                    <h3 class="fw-bold mt-3">Créer un compte</h3>
                    <p class="text-muted small">Rejoignez notre communauté en quelques clics</p>
                </div>

                <form action="?Request" method="POST">
                    <?php
                    // var_dump($_SESSION);
                    if($_SESSION['error']==1){
                        echo "<div class='alert alert-danger' role='alert'>
                        Mot de passe not Confirmer
                        </div>";
                        $_SESSION['error']=0;
                    }; if($_SESSION['error']==2){
                        echo "<div class='alert alert-danger' role='alert'>
                        email not VALIDATE
                        </div>";
                        $_SESSION['error']=0;
                    };
                    if($_SESSION['error']==3){
                        echo "<div class='alert alert-danger' role='alert'>
                        Adresse e-mail ou nom pris
                        </div>";
                        $_SESSION['error']=0;
                    };
                    

                    ?>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold">Nom d'utilisateur</label>
                            <input type="text" name="username" class="form-control bg-light border-0" placeholder="Nom complet" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold">Email</label>
                            <input type="username" name="email" class="form-control bg-light border-0" placeholder="exemple@mail.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Mot de passe</label>
                            <input type="password" name="password" class="form-control bg-light border-0" placeholder="••••••••" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold">Confirmer</label>
                            <input type="password" name="confirm_password" class="form-control bg-light border-0" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label small text-muted" for="terms">
                            J'accepte les conditions d'utilisation
                        </label>
                    </div>

                    <button name="submit" value="register" type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm" style="background: linear-gradient(45deg, #4361ee, #7209b7); border: none;">
                        Créer mon compte
                    </button>
                </form>

                <div class="text-center mt-4">
                    <p class="small text-muted">Déjà inscrit ? <a href="?Login" class="text-primary fw-bold text-decoration-none">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './app/views/layout/footer.php'; ?>