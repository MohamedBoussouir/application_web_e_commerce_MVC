<?php
// session_start(); 
// include './app/views/layout/header.php';

// جلب البيانات القادمة من الكنترولر (ProductsController)
$data = isset($_POST["data"]) ? $_POST["data"] : []; 

?>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    :root {
        --main-bg: #f8fafc;
        --sidebar-color: #0f172a;
        --accent-blue: #3b82f6;
        --accent-purple: #8b5cf6;
        --white: #ffffff;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --success: #10b981;
        --danger: #ef4444;
    }

    body {
        margin: 0;
        font-family: 'Inter', 'Cairo', sans-serif;
        background-color: var(--main-bg);
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar */
    .custom-sidebar {
        width: 260px;
        background-color: var(--sidebar-color);
        color: white;
        padding: 30px 20px;
        position: fixed;
        height: 100vh;
    }

    .logo-area {
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 40px;
        color: var(--accent-blue);
        text-align: center;
    }

    .nav-menu { list-style: none; padding: 0; }
    .nav-link-wrapper { text-decoration: none; color: inherit; display: block; }
    
    .nav-item {
        padding: 12px 15px;
        border-radius: 10px;
        margin-bottom: 8px;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        align-items: center;
        color: #94a3b8;
    }

    .nav-item:hover, .nav-item.active {
        background-color: rgba(59, 130, 246, 0.1);
        color: var(--accent-blue);
    }

    /* Main Content Area */
    .main-content {
        flex: 1;
        margin-left: 260px; /* لترك مساحة للـ Sidebar */
        padding: 40px;
    }

    /* 1. ضبط توازي الجزء العلوي (Header Alignment) */
    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center; /* موازنة العنوان مع الزر عمودياً */
        margin-bottom: 40px;
        width: 100%;
    }

    .top-bar h2 {
        margin: 0; /* إزالة الهوامش التلقائية التي تسبب عدم التوازي */
        font-weight: 800;
        color: var(--text-dark);
        font-size: 24px;
    }

    /* 2. ضبط توازي كروت الإحصائيات (Stats Grid Alignment) */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
        align-items: stretch; /* جعل الكروت متساوية الطول */
    }

    .stat-card {
        background: var(--white);
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        border-left: 5px solid var(--accent-blue);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stat-card.purple { border-left-color: var(--accent-purple); }
    .stat-card.green { border-left-color: var(--success); }

    .stat-title { color: var(--text-light); font-size: 13px; font-weight: 600; text-transform: uppercase; }
    .stat-value { color: var(--text-dark); font-size: 28px; font-weight: 800; margin-top: 5px; }

    /* Table Wrapper */
    .table-wrapper {
        background: var(--white);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
    }

    .styled-table { width: 100%; border-collapse: collapse; }
    .styled-table th { text-align: left; padding: 18px; background: #f8fafc; color: var(--text-light); font-size: 11px; text-transform: uppercase; }
    .styled-table td { padding: 18px; border-bottom: 1px solid #f1f5f9; color: var(--text-dark); font-size: 14px; vertical-align: middle; }

    /* Action Buttons (Edit/Delete) */
    .btn-action {
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-action.edit { background: rgba(59, 130, 246, 0.1); color: var(--accent-blue); border: 1px solid var(--accent-blue); }
    .btn-action.edit:hover { background: var(--accent-blue); color: white; }
    
    .btn-action.delete { background: rgba(239, 68, 68, 0.1); color: var(--danger); border: 1px solid var(--danger); }
    .btn-action.delete:hover { background: var(--danger); color: white; }

    /* Modal Fix (قابل للكتابة وغير شفاف) */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(15, 23, 42, 0.7);
        display: none;
        justify-content: center; align-items: center;
        z-index: 9999;
    }

    .modal-box {
        background: var(--white);
        width: 480px; padding: 35px; border-radius: 24px;
        position: relative; pointer-events: all; /* ضمان التفاعل */
    }

    .custom-input {
        width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0;
        border-radius: 10px; margin-top: 8px; transition: 0.3s;
        box-sizing: border-box;
    }

    .custom-input:focus { border-color: var(--accent-blue); outline: none; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1); }
</style>

<aside class="custom-sidebar">
    <div class="logo-area">ELECTRO_DASH</div>
    <ul class="nav-menu">
        <a href="?Accueil" class="nav-link-wrapper"><li class="nav-item active"><i class="fas fa-home me-2"></i> الرئيسية</li></a>
        <a href="?Produits" class="nav-link-wrapper"><li class="nav-item"><i class="fas fa-box me-2"></i> المنتجات</li></a>
        <a href="?Users" class="nav-link-wrapper"><li class="nav-item"><i class="fas fa-users me-2"></i> المستخدمين</li></a>
        <a href="?Logout" class="nav-link-wrapper"><li class="nav-item"><i class="fas fa-sign-out-alt me-2"></i> خروج</li></a>
    </ul>
</aside>

<main class="main-content">
    <div class="top-bar">
        <h2>لوحة القيادة</h2>
        <button onclick="toggleModal(true)" style="background: var(--accent-blue); color: white; border: none; padding: 12px 25px; border-radius: 12px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-plus"></i> إضافة منتج جديد
        </button>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">إجمالي السلع</div>
            <div class="stat-value"><?php echo count($data); ?></div>
        </div>
        <div class="stat-card purple">
            <div class="stat-title">إجمالي المبيعات</div>
            <div class="stat-value">45,000 DH</div>
        </div>
        <div class="stat-card green">
            <div class="stat-title">طلبات اليوم</div>
            <div class="stat-value">12</div>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>price dh</th>
                    <th>image_url</th>
                    <th>stock_quantity</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($data)): foreach($data as $vale): ?>
                <tr>
                    <td style="font-weight: 700;"><?php echo $vale['title']; ?></td>
                    <td title="<?php echo $vale['description']; ?>"><?php echo substr($vale['description'], 0, 35); ?>...</td>
                    <td style="font-weight: 800; color: var(--accent-blue);"><?php echo $vale['price']; ?> DH</td>
                    <td style="color: var(--accent-purple); font-size: 11px;"><?php echo $vale['image_url']; ?></td>
                    <td style="color: var(--accent-purple); font-size: 11px;"><?php echo $vale['stock_quantity']; ?></td>

                    <td style="text-align: center;">
                        <a href="?Products_Edit_views=<?php echo $_POST['data']=$vale['id']; ?>"  class="btn-action edit"><i class="fas fa-edit"></i></a>
                        <a href="?Products_Delete=<?php echo $vale['id']; ?>" onclick="return confirm('هل تريد حذف المنتج؟')" class="btn-action delete"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="text-align:center;">لا توجد بيانات لعرضها حالياً</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<div class="modal-overlay" id="myModal">
    <div class="modal-box">
        <h3 style="margin: 0 0 25px 0; color: var(--text-dark);">إضافة منتج جديد</h3>
        <form action="?Request" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="font-size: 13px; font-weight: 600;">اسم المنتج</label>
                <input type="text" name="title" class="custom-input" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="font-size: 13px; font-weight: 600;">الوصف</label>
                <textarea name="description" class="custom-input" rows="3"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="font-size: 13px; font-weight: 600;">رابط الصورة (Image URL)</label>
                <input type="url" name="ImageURL" class="custom-input">
            </div>
            <div style="margin-bottom: 25px;">
                <label style="font-size: 13px; font-weight: 600;">الكمية </label>
                <input type="number" name="stock_quantity" class="custom-input" required>
            </div>
            <div style="margin-bottom: 25px;">
                <label style="font-size: 13px; font-weight: 600;">السعر (DH)</label>
                <input type="number" name="price" class="custom-input" required>
            </div>
            <div style="display: flex; gap: 10px;">
                <button type="button" onclick="toggleModal(false)" style="flex: 1; padding: 12px; border-radius: 10px; border: 1.5px solid #e2e8f0; background: none; font-weight: 600; cursor: pointer;">إلغاء</button>
                <button type="submit" name="submit" value="Produit" style="flex: 2; padding: 12px; border-radius: 10px; border: none; background: var(--accent-blue); color: white; font-weight: 700; cursor: pointer;">تأكيد الإضافة</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {
        document.getElementById('myModal').style.display = show ? 'flex' : 'none';
    }
    // إغلاق المودال عند الضغط خارج المربع
    window.onclick = function(e,b) {
        if (e.target == document.getElementById('myModal')) toggleModal(false);
    }
</script>
<?php 



// var_dump($data);
?>