<?php
session_start();
include './app/views/layout/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">

<style>
    :root {
        --deep-void: #030305;
        --electric-blue: #38bdf8;
        --success-green: #2ecc71;
    }

    body {
        background-color: var(--deep-void);
        color: white;
        overflow: hidden; /* لمنع التمرير أثناء الاحتفال */
    }

    .success-wrapper {
        height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: relative;
        z-index: 10;
    }

    /* أيقونة النجاح العملاقة */
    .success-icon-container {
        position: relative;
        width: 150px;
        height: 150px;
        background: rgba(46, 204, 113, 0.1);
        border: 2px solid var(--success-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 50px rgba(46, 204, 113, 0.3);
        margin-bottom: 40px;
        animation: iconBounce 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes iconBounce {
        0% { transform: scale(0) rotate(-45deg); opacity: 0; }
        100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }

    .success-icon-container i {
        font-size: 4rem;
        color: var(--success-green);
        filter: drop-shadow(0 0 10px var(--success-green));
    }

    /* حلقات الطاقة حول الأيقونة */
    .ring-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 2px solid var(--success-green);
        border-radius: 50%;
        animation: ringExpand 2s infinite;
        opacity: 0;
    }

    @keyframes ringExpand {
        0% { transform: scale(1); opacity: 0.5; }
        100% { transform: scale(2.5); opacity: 0; }
    }

    /* النصوص الحركية */
    .congrats-text {
        font-family: 'Orbitron', sans-serif;
        font-size: 3rem;
        font-weight: 900;
        letter-spacing: 5px;
        text-transform: uppercase;
        background: linear-gradient(to right, #fff, var(--electric-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 15px;
    }

    .success-subtext {
        font-family: 'JetBrains Mono', monospace;
        color: #94a3b8;
        font-size: 1.1rem;
        letter-spacing: 2px;
        max-width: 600px;
        text-align: center;
    }

    /* زر الانتقال المضيء */
    .btn-login-redirect {
        margin-top: 50px;
        background: var(--electric-blue);
        color: var(--deep-void);
        padding: 18px 50px;
        border-radius: 50px;
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        text-decoration: none;
        display: inline-block;
        transition: 0.4s;
        box-shadow: 0 0 30px rgba(56, 189, 248, 0.4);
        position: relative;
        overflow: hidden;
    }

    .btn-login-redirect:hover {
        background: white;
        transform: scale(1.1) translateY(-5px);
        box-shadow: 0 0 50px var(--electric-blue);
    }

    /* جزيئات القصاصات الورقية التقنية */
    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background: var(--electric-blue);
        top: -10px;
        border-radius: 2px;
        animation: confettiFall 4s linear infinite;
    }

    @keyframes confettiFall {
        0% { transform: translateY(0) rotate(0deg); opacity: 1; }
        100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
    }

    /* الخلفية النيونية */
    .glow-spot {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.05) 0%, transparent 70%);
        z-index: -1;
    }
</style>

<div class="success-wrapper">
    <div class="glow-spot"></div>
    <div id="confetti-container"></div>

    <div class="success-icon-container">
        <div class="ring-pulse"></div>
        <div class="ring-pulse" style="animation-delay: 0.5s;"></div>
        <i class="fas fa-check"></i>
    </div>

    <h1 class="congrats-text animate__animated animate__tada">BIENVENUE !</h1>
    
    <div class="success-subtext animate__animated animate__fadeInUp animate__delay-1s">
        [ ACCOUNT_CREATED_SUCCESSFULLY ]
        <p class="mt-3 opacity-75">لقد تم تفعيل هويتك الرقمية في مصفوفة ELECTROTECH. أنت الآن جاهز لاستكشاف المستقبل.</p>
    </div>

    <a href="?Login" class="btn-login-redirect animate__animated animate__bounceIn animate__delay-2s">
        ACCÉDER AU LOGIN <i class="fas fa-sign-in-alt ms-2"></i>
    </a>
</div>

<script>
    // إنشاء قصاصات ورقية تقنية (Confetti) بشكل برمجي
    const container = document.getElementById('confetti-container');
    const colors = ['#38bdf8', '#ae00ff', '#ffffff', '#2ecc71'];

    for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.width = Math.random() * 8 + 4 + 'px';
        confetti.style.height = confetti.style.width;
        confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
        confetti.style.animationDelay = Math.random() * 5 + 's';
        container.appendChild(confetti);
    }
</script>

<?php include './app/views/layout/footer.php'; ?>