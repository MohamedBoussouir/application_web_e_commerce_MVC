<?php include './app/views/layout/header.php'; ?>
<div class="row align-items-center py-5">
    <div class="col-lg-6 animate__animated animate__fadeInLeft">
        <h1 class="display-3 fw-bold mb-3">
            Bienvenue sur <span class="text-primary-gradient">MVC Pro</span>
        </h1>
        <p class="lead text-secondary mb-4">
            Une architecture robuste, sécurisée et évolutive pour vos projets Web PHP.
            Découvrez la puissance de la Programmation Orientée Objet.
        </p>
        <div class="d-flex gap-3">
            <a href="/auth/register" class="btn btn-primary btn-lg rounded-pill px-4 shadow">Commencer</a>
            <a href="#features" class="btn btn-outline-secondary btn-lg rounded-pill px-4">En savoir plus</a>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block animate__animated animate__fadeInRight text-center">
        <div class="hero-image-container">
            <i class="fas fa-cubes fa-10x text-primary opacity-25"></i>
        </div>
    </div>
</div>

<div id="features" class="row py-5 mt-5 g-4">
    <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center feature-card">
            <div class="icon-box mb-3 mx-auto">
                <i class="fas fa-shield-alt fa-2x text-primary"></i>
            </div>
            <h5 class="fw-bold">Sécurité</h5>
            <p class="text-muted small">Gestion des rôles (Admin/User) et protection contre les failles CSRF et XSS.</p>
        </div>
    </div>

    <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center feature-card">
            <div class="icon-box mb-3 mx-auto">
                <i class="fas fa-code fa-2x text-secondary" style="color: #7209b7 !important;"></i>
            </div>
            <h5 class="fw-bold">Architecture MVC</h5>
            <p class="text-muted small">Séparation claire entre le Modèle (Données), la Vue (Interface) et le Contrôleur (Logique).</p>
        </div>
    </div>

    <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center feature-card">
            <div class="icon-box mb-3 mx-auto">
                <i class="fas fa-bolt fa-2x text-warning"></i>
            </div>
            <h5 class="fw-bold">Performance</h5>
            <p class="text-muted small">Optimisation des requêtes via PDO et chargement rapide grâce à une structure légère.</p>
        </div>
    </div>
</div>

<div class="mt-5 p-5 bg-primary-gradient rounded-5 text-white text-center shadow-lg animate__animated animate__pulse animate__infinite">
    <h2 class="fw-bold">Prêt à explorer le Back-Office ?</h2>
    <p class="mb-4">Connectez-vous en tant qu'administrateur pour gérer les produits.</p>
    <a href="/auth/login" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-primary">Se connecter</a>
</div>

<style>
    .text-primary-gradient {
        background: linear-gradient(45deg, #4361ee, #7209b7);
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .bg-primary-gradient {
        background: linear-gradient(45deg, #4361ee, #7209b7);
    }

    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .icon-box {
        width: 60px;
        height: 60px;
        background: rgba(67, 97, 238, 0.1);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-image-container {
        animation: bounce 6s infinite ease-in-out;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }
</style>
<?php include './app/views/layout/footer.php'; ?>