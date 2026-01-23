<?php

include './app/views/layout/header.php'; ?>

<style>
    :root {
        --deep-void: #030305; /* أسود فحمي للخلفية */
        --electric-blue: #38bdf8;
        --neon-purple: #ae00ff; /* لون ثانوي للتباين */
        --text-faded: #a0a0aa;
    }

    body {
        background-color: var(--deep-void);
        color: white;
        overflow-x: hidden;
    }

    /* 1. Header الصفحة مع أنميشن خلفي */
    .cat-header {
        padding: 100px 0;
        text-align: center;
        position: relative;
        background: radial-gradient(circle at center, rgba(56, 189, 248, 0.08) 0%, transparent 60%);
        animation: headerGlow 8s infinite alternate;
    }

    @keyframes headerGlow {
        from { box-shadow: 0 0 50px rgba(56, 189, 248, 0.2); }
        to { box-shadow: 0 0 80px rgba(174, 0, 255, 0.2); }
    }

    .cat-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 4rem;
        font-weight: 900;
        letter-spacing: 15px;
        text-transform: uppercase;
        background: linear-gradient(to right, #fff, var(--electric-blue));
        background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 20px var(--electric-blue));
        animation: titlePulse 2s infinite alternate;
    }

    @keyframes titlePulse {
        from { transform: scale(1); filter: drop-shadow(0 0 15px var(--electric-blue)); }
        to { transform: scale(1.02); filter: drop-shadow(0 0 30px var(--neon-purple)); }
    }

    /* 2. كروت الفئات بتقنية ثلاثية الأبعاد ومؤثرات كثيرة */
    .category-module {
        position: relative;
        background: rgba(15, 23, 42, 0.6); /* شفافية لإظهار الخلفية */
        border: 1px solid rgba(56, 189, 248, 0.3);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        transition: 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* easing أفضل */
        overflow: hidden;
        height: 100%;
        cursor: pointer;
        perspective: 1000px;
    }

    /* توهج داخلي يظهر عند الحوام */
    .inner-glow {
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.3) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.4s;
        border-radius: 50%;
        animation: moduleGlow 15s infinite linear;
    }

    @keyframes moduleGlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .category-module:hover .inner-glow {
        opacity: 0.2;
    }

    /* تأثير الحواف المضيئة عند الحوام */
    .category-module::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        border-radius: 20px;
        border: 2px solid transparent;
        transition: border-color 0.4s, box-shadow 0.4s;
    }

    .category-module:hover::before {
        border-color: var(--electric-blue);
        box-shadow: 0 0 30px var(--electric-blue);
    }

    /* الأيقونات النيونية المتحركة */
    .cat-icon-container {
        position: relative;
        width: 100px; height: 100px;
        margin: 0 auto 25px auto;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%;
        background: rgba(56, 189, 248, 0.1);
        border: 1px solid var(--electric-blue);
        box-shadow: 0 0 20px var(--electric-blue);
        animation: iconPulse 3s infinite alternate;
    }

    @keyframes iconPulse {
        from { transform: scale(1); box-shadow: 0 0 10px var(--electric-blue); }
        to { transform: scale(1.05); box-shadow: 0 0 30px var(--neon-purple); }
    }

    .cat-icon {
        font-size: 3.5rem;
        color: var(--electric-blue);
        filter: drop-shadow(0 0 10px var(--electric-blue));
        transition: 0.3s;
    }

    .category-module:hover .cat-icon {
        transform: scale(1.1) rotateY(15deg);
        filter: drop-shadow(0 0 25px var(--neon-purple));
    }

    .cat-name {
        font-family: 'Orbitron', sans-serif;
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .cat-count {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        color: var(--text-faded);
        background: rgba(0,0,0,0.4);
        padding: 5px 15px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 15px;
    }

    .btn-explore {
        background: var(--electric-blue);
        color: var(--deep-void);
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: 0.4s;
        animation: btnFloat 2s infinite alternate;
    }

    @keyframes btnFloat {
        from { transform: translateY(0); }
        to { transform: translateY(-5px); }
    }

    .btn-explore:hover {
        background: var(--neon-purple);
        box-shadow: 0 0 40px var(--neon-purple);
        transform: scale(1.05) translateY(-8px);
    }

    /* تأثير الجزيئات المتساقطة في الخلفية */
    .particle {
        position: absolute;
        background: var(--electric-blue);
        width: 1px; height: 1px;
        opacity: 0.4;
        border-radius: 50%;
        animation: particleFall linear infinite;
        pointer-events: none; /* لتجنب تعطيل تفاعل الماوس */
    }

    @keyframes particleFall {
        from { transform: translateY(0vh); opacity: 0; }
        20% { opacity: 0.4; }
        80% { opacity: 0.4; }
        to { transform: translateY(100vh); opacity: 0; }
    }
</style>

<div class="container pb-5">
    <div class="cat-header animate__animated animate__fadeInDown">
        <h1 class="cat-title">CATALOGUE_MATRIX</h1>
        <p class="text-faded">انغمس في عالم التقنية اللامحدود واستكشف فئاتنا المتطورة.</p>
    </div>

    <div class="row g-4">
        <?php 
        $categories = [
            ['name' => 'CPUs & Processors', 'icon' => 'fa-microchip', 'count' => '72 Protocols'],
            ['name' => 'Graphics Cards', 'icon' => 'fa-ethernet', 'count' => '48 Modules'],
            ['name' => 'Memory & Storage', 'icon' => 'fa-database', 'count' => '96 Arrays'],
            ['name' => 'Motherboards', 'icon' => 'fa-solar-panel', 'count' => '30 Platforms'],
            ['name' => 'Power Supplies', 'icon' => 'fa-charging-station', 'count' => '25 Units'],
            ['name' => 'Cases & Cooling', 'icon' => 'fa-fan', 'count' => '60 Enclosures'],
            ['name' => 'Peripherals', 'icon' => 'fa-keyboard', 'count' => '120 Devices'],
            ['name' => 'Software & OS', 'icon' => 'fa-laptop-code', 'count' => '15 Solutions']
        ];

        foreach($categories as $index => $cat): 
        ?>
        <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp" style="animation-delay: <?= $index*0.1 ?>s;">
            <div class="category-module" data-index="<?= $index ?>">
                <div class="inner-glow"></div>
                <div class="cat-icon-container">
                    <i class="fas <?= $cat['icon'] ?> cat-icon"></i>
                </div>
                <h3 class="cat-name"><?= $cat['name'] ?></h3>
                <span class="cat-count"><?= $cat['count'] ?></span>
                <br>
                <a href="?page=boutique&cat=<?= urlencode($cat['name']) ?>" class="btn-explore">ACCEDER AU SYSTÈME</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    // جزيئات النجوم المتساقطة
    const body = document.body;
    for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        const size = Math.random() * 2 + 1 + 'px';
        particle.style.width = size;
        particle.style.height = size;
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDuration = (Math.random() * 5 + 5) + 's';
        particle.style.animationDelay = (Math.random() * -10) + 's'; // لتبدأ بعضها من المنتصف
        body.appendChild(particle);
    }

    // تأثير الميلان ثلاثي الأبعاد والتوهج عند الحوام على الكروت
    document.querySelectorAll('.category-module').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 15; // زيادة حساسية الميلان
            const rotateY = (centerX - x) / 15;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)`;
        });
    });
</script>

<?php include './app/views/layout/footer.php'; ?>