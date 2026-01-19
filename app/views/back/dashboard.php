<?php include '../app/views/layout/header.php'; ?>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 animate__animated animate__fadeInDown">
            <div class="d-flex align-items-center">
                <div class="icon-box-dashboard bg-primary-soft text-primary me-3">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Utilisateurs</h6>
                    <h3 class="fw-bold mb-0">128</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 animate__animated animate__fadeInDown" style="animation-delay: 0.1s;">
            <div class="d-flex align-items-center">
                <div class="icon-box-dashboard bg-warning-soft text-warning me-3">
                    <i class="fas fa-user-shield fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Administrateurs</h6>
                    <h3 class="fw-bold mb-0">5</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 animate__animated animate__fadeInDown" style="animation-delay: 0.2s;">
            <div class="d-flex align-items-center">
                <div class="icon-box-dashboard bg-success-soft text-success me-3">
                    <i class="fas fa-box fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Produits</h6>
                    <h3 class="fw-bold mb-0">42</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 animate__animated animate__fadeInUp">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0"><i class="fas fa-list me-2 text-primary"></i> Liste des Utilisateurs</h5>
        <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
            <i class="fas fa-plus me-1"></i> Ajouter
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">Utilisateur</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Rôle</th>
                        <th class="border-0">Date d'inscription</th>
                        <th class="border-0 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=Tayeb+Souini&background=4361ee&color=fff" class="rounded-circle me-2" width="35">
                                <span class="fw-600">Tayeb Souini</span>
                            </div>
                        </td>
                        <td>t.souini@example.com</td>
                        <td><span class="badge bg-warning text-dark rounded-pill px-3">Admin</span></td>
                        <td class="text-muted small">12/01/2026</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light-primary rounded-circle me-1"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-light-danger rounded-circle"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=7209b7&color=fff" class="rounded-circle me-2" width="35">
                                <span class="fw-600">John Doe</span>
                            </div>
                        </td>
                        <td>j.doe@example.com</td>
                        <td><span class="badge bg-light text-primary border rounded-pill px-3">User</span></td>
                        <td class="text-muted small">15/01/2026</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light-primary rounded-circle me-1"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-light-danger rounded-circle"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
/* إضافات CSS للوحة التحكم */
.bg-primary-soft { background-color: rgba(67, 97, 238, 0.1); }
.bg-warning-soft { background-color: rgba(255, 193, 7, 0.1); }
.bg-success-soft { background-color: rgba(40, 167, 69, 0.1); }

.icon-box-dashboard {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-light-primary { color: #4361ee; background: rgba(67, 97, 238, 0.1); border: none; }
.btn-light-danger { color: #ef233c; background: rgba(239, 35, 60, 0.1); border: none; }

.btn-light-primary:hover { background: #4361ee; color: #fff; }
.btn-light-danger:hover { background: #ef233c; color: #fff; }

.fw-600 { font-weight: 600; }
.table thead th { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
</style>

<?php include '../app/views/layout/footer.php'; ?>