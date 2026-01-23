<?php

include './app/views/layout/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">

<div class="error-universe">
    <div class="stars-container" id="stars"></div>
    <div class="nebula-glow"></div>

    <div class="error-content animate__animated animate__zoomIn">
        <div class="glitch-wrapper">
            <h1 class="glitch-text" data-text="404">404</h1>
        </div>
        
        <div class="status-box">
            <span class="pulse-dot"></span>
            <span class="status-msg">SYSTEM_DISCONNECTED</span>
        </div>

        <p class="error-description">
            عذراً! لقد خرجت عن المدار. الصفحة التي تحاول الوصول إليها مفقودة في الفضاء الرقمي لـ <span class="text-electric">ELECTROTECH</span>.
        </p>

        <div class="action-zone mt-5">
            <a href="?Accueil" class="btn-reentry">
                <i class="fas fa-satellite-dish me-2"></i> RE-ENTRY TO HOME
            </a>
        </div>
    </div>
</div>

<style>
    :root {
        --deep-space: #0f172a; /* لون الهيدر الداكن */
        --electric-blue: #38bdf8; /* لون الهيدر المضيء */
    }

    .error-universe {
        height: 90vh;
        background-color: var(--deep-space);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        color: white;
    }

    /* هالة ضوئية في الخلفية */
    .nebula-glow {
        position: absolute;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(80px);
        animation: pulseGlow 5s infinite alternate;
    }

    @keyframes pulseGlow {
        from { transform: scale(1); opacity: 0.5; }
        to { transform: scale(1.3); opacity: 0.8; }
    }

    /* تأثير الـ Glitch للرقم 404 */
    .glitch-text {
        font-family: 'Orbitron', sans-serif;
        font-size: 15rem;
        font-weight: 900;
        position: relative;
        color: white;
        letter-spacing: -5px;
        z-index: 1;
    }

    .glitch-text::before, .glitch-text::after {
        content: attr(data-text);
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: -1;
    }

    .glitch-text::before {
        color: #ff0055; /* وميض أحمر خفيف للخطأ */
        left: -3px;
        animation: glitch-anim-1 0.5s infinite linear alternate-reverse;
    }

    .glitch-text::after {
        color: var(--electric-blue);
        left: 3px;
        animation: glitch-anim-2 0.5s infinite linear alternate-reverse;
    }

    @keyframes glitch-anim-1 {
        0% { clip-path: inset(20% 0 30% 0); }
        100% { clip-path: inset(10% 0 60% 0); }
    }

    @keyframes glitch-anim-2 {
        0% { clip-path: inset(40% 0 10% 0); }
        100% { clip-path: inset(50% 0 30% 0); }
    }

    /* صندوق الحالة */
    .status-box {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 25px;
        border-radius: 50px;
        border: 1px solid rgba(56, 189, 248, 0.3);
        margin-top: -40px;
    }

    .pulse-dot {
        width: 10px; height: 10px;
        background: #ff4757;
        border-radius: 50%;
        margin-right: 15px;
        box-shadow: 0 0 10px #ff4757;
        animation: pulseRed 1s infinite;
    }

    @keyframes pulseRed {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(2.5); opacity: 0; }
    }

    .status-msg {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        letter-spacing: 2px;
    }

    .text-electric { color: var(--electric-blue); font-weight: bold; }

    .error-description {
        max-width: 500px;
        margin: 30px auto;
        color: #94a3b8;
        font-size: 1.1rem;
    }

    /* زر العودة الحيوي */
    .btn-reentry {
        background: var(--electric-blue);
        color: var(--deep-space);
        padding: 18px 45px;
        border-radius: 15px;
        font-family: 'Orbitron', sans-serif;
        font-weight: 800;
        text-decoration: none;
        display: inline-block;
        transition: 0.4s;
        box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);
    }

    .btn-reentry:hover {
        background: white;
        transform: scale(1.05) translateY(-5px);
        box-shadow: 0 15px 30px rgba(56, 189, 248, 0.5);
    }

    /* جزيئات النجوم */
    .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        opacity: 0.3;
        animation: twinkle var(--duration) infinite ease-in-out;
    }

    @keyframes twinkle {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.5); opacity: 0.8; }
    }
</style>

<script>
    // إنشاء نجوم عشوائية في الخلفية لتعطي "حياة" للفضاء
    const container = document.getElementById('stars');
    for (let i = 0; i < 50; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        const size = Math.random() * 3 + 'px';
        star.style.width = size;
        star.style.height = size;
        star.style.top = Math.random() * 100 + '%';
        star.style.left = Math.random() * 100 + '%';
        star.style.setProperty('--duration', (Math.random() * 3 + 2) + 's');
        container.appendChild(star);
    }
</script>

<?php include './app/views/layout/footer.php'; ?>