<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — Waari Control Panel</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Lato:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Waari CSS -->
  <link href="<?= base_url('assets/css/waari.css') ?>" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #1C3B24 0%, #2C5E3A 100%); min-height: 100vh;" class="d-flex align-items-center justify-content-center py-5">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">

        <div class="card border-0 rounded-4 shadow-lg p-4 bg-white waari-form">
          <div class="text-center mb-4">
            <div class="navbar-brand-text mb-1" style="font-size: 2.5rem;">Waari<span>.</span></div>
            <p class="text-muted small fw-bold uppercase tracking-wider mb-0">Shrutika Nutrilite Foods PVT LTD</p>
            <span class="badge bg-amber text-white px-3 py-1 mt-2">Admin Control Panel</span>
          </div>

          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small mb-3">
              <i class="fas fa-exclamation-triangle me-1"></i><?= esc(session()->getFlashdata('error')) ?>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success py-2 small mb-3">
              <i class="fas fa-check-circle me-1"></i><?= esc(session()->getFlashdata('success')) ?>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('admin/login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label>Username / Email</label>
              <div class="input-group">
                <span class="input-group-text bg-cream border-amber text-amber"><i class="fas fa-user-shield"></i></span>
                <input type="text" name="username" class="form-control border-amber" placeholder="admin" value="<?= old('username') ?>" required autofocus>
              </div>
            </div>

            <div class="mb-4">
              <label>Password</label>
              <div class="input-group">
                <span class="input-group-text bg-cream border-amber text-amber"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control border-amber" placeholder="••••••••" required>
              </div>
            </div>

            <button type="submit" class="btn-waari btn-waari-primary btn-lg w-100 mb-2">
              Sign In to Dashboard <i class="fas fa-arrow-right ms-2"></i>
            </button>
          </form>

          <div class="text-center mt-3 pt-3 border-top">
            <a href="<?= base_url('/') ?>" class="small text-muted text-decoration-none">
              <i class="fas fa-arrow-left me-1"></i> Back to Main Website
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
