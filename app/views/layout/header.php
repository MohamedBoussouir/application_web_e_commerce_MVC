<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTROTECH | Premium Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --main-dark: #0f172a;
            --electric-blue: #38bdf8;
            --glass-bg: rgba(15, 23, 42, 0.8);
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        /* Navbar Ultra-Modern */
        .navbar-custom {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(56, 189, 248, 0.2);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .brand-logo {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -1px;
            color: white !important;
            text-decoration: none;
        }
        
        .brand-logo span {
            color: var(--electric-blue);
            text-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
        }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 15px;
            position: relative;
        }

        .nav-link-custom:hover {
            color: var(--electric-blue) !important;
        }

        /* زر السلة المميز */
        .cart-btn {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid var(--electric-blue);
            color: var(--electric-blue);
            padding: 8px 18px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .cart-btn:hover {
            background: var(--electric-blue);
            color: white;
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);
        }

        /* الحاوية الرئيسية للمحتوى */
        .page-content {
            padding-top: 50px;
            padding-bottom: 50px;
            min-height: 80vh;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="brand-logo animate__animated animate__fadeInDown" href="?Accueil">
                ELECTRO<span>TECH</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="fas fa-bars text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto">
                    <?php if (isset($_SESSION['role'])): ?>
                        <?php if ($_SESSION['role'] == 'user'): ?>
                            <li class="nav-item"><a class="nav-link-custom" href="?Accueil">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link-custom" href="?Boutique">Boutique</a></li>
                            <li class="nav-item"><a class="nav-link-custom" href="?Categories">Catégories</a></li>

                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link-custom" href="?Categories">admin</a></li>

                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link-custom" href="?Accueil">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link-custom" href="?Boutique">Boutique</a></li>
                            <li class="nav-item"><a class="nav-link-custom" href="?Categories">Catégories</a></li> 
                    <?php endif; ?>















                </ul>
                <?php if (isset($_SESSION['role'])): ?>
                    <?php if ($_SESSION['role'] == 'admin'): ?>

                    <?php else: ?>
                        <div class="d-flex align-items-center gap-3">
                            <a href="?panier" class="cart-btn text-decoration-none">
                                <i class="fas fa-shopping-cart me-2"></i> Panier
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="?Logout" class="btn btn-outline-light rounded-circle"><i class="fas fa-user"></i></a>
                    <?php else: ?>
                        <a href="?Login" class="btn btn-light rounded-pill px-4 fw-bold">Login</a>
                    <?php endif; ?>
                        </div>
            </div>
        </div>
    </nav>

    <main class="container page-content animate__animated animate__fadeIn">