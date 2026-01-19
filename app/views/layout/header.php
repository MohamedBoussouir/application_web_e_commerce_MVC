<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Premium Project</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #7209b7;
        }

        body {
            background: #f0f2f5;
            overflow-x: hidden;
            position: relative;
        }

        /* شكل هندسي متحرك في الخلفية */
        .bg-shape {
            position: fixed;
            top: -150px;
            right: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.1) 0%, rgba(114, 9, 183, 0.05) 100%);
            border-radius: 50%;
            z-index: -1;
            animation: float 20s infinite alternate;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-100px, 100px); }
        }

        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px); /* تأثير الزجاج */
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="bg-shape"></div> <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i  class="fas fa-layer-group text-primary"></i> MVC<span class="text-primary">PRO</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="?Accueil"><i class="fas fa-home me-1"></i> Accueil</a></li>
                    <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link text-primary" href="/admin/dashboard"><i class="fas fa-chart-line me-1"></i> Dashboard</a></li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> <?= $_SESSION['username'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-danger" href="/auth/logout">Déconnexion</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="?Login" class="btn btn-primary rounded-pill px-4 shadow">Connexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5 py-4 bg-white shadow-sm rounded-4 animate__animated animate__fadeIn" style="min-height: 70vh;">