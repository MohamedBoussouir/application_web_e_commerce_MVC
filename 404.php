    <?php
     include './app/views/layout/header.php';
     ?>

<div class="row justify-content-center align-items-center text-center" style="min-height: 70vh;">
    <div class="col-md-8 animate__animated animate__zoomIn">
        <h1 class="error-code text-primary-gradient display-1 fw-bold">404</h1>
        
        <div class="mb-4">
            <i class="fas fa-search fa-5x text-muted opacity-50 animate__animated animate__bounce animate__infinite"></i>
        </div>
        
        <h2 class="fw-bold">Oups ! Page introuvable</h2>
        <p class="text-secondary lead mb-5">
            Il semble que le chemin que vous avez emprunté n'existe plus ou a été déplacé.
        </p>
        
        <div class="d-flex justify-content-center gap-3">
            <a href="./" class="btn btn-primary rounded-pill px-5 shadow-lg fw-bold">
                <i class="fas fa-home me-2"></i> Retour à l'accueil
            </a>
            <button onclick="history.back()" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fas fa-arrow-left me-2"></i> Page précédente
            </button>
        </div>
    </div>
</div>

<style>
/* كود الـ CSS لتجميل صفحة الخطأ */
.error-code {
    font-size: 10rem;
    line-height: 1;
    margin-bottom: 20px;
    filter: drop-shadow(0 10px 20px rgba(67, 97, 238, 0.2));
}

.text-primary-gradient {
    background: linear-gradient(45deg, #4361ee, #7209b7);
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* إضافة دوائر عائمة صغيرة للخلفية خصيصاً لهذه الصفحة */
.error-bg-blob {
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(114, 9, 183, 0.05);
    border-radius: 50%;
    z-index: -1;
}
</style>

<script>
    document.addEventListener('mousemove', (e) => {
        const icon = document.querySelector('.fa-search');
        const x = (window.innerWidth - e.pageX) / 50;
        const y = (window.innerHeight - e.pageY) / 50;
        icon.style.transform = `translate(${x}px, ${y}px)`;
    });
</script>

<?php include './app/views/layout/footer.php'; ?>