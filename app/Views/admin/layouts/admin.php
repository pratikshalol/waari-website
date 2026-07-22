<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($page_title ?? 'Dashboard') ?> — Waari Admin</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Lato:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Waari CSS -->
  <link href="<?= base_url('assets/css/waari.css') ?>" rel="stylesheet">

  <?= $extra_css ?? '' ?>
</head>
<body style="background:#f7f3ee;">

  <!-- Admin Sidebar -->
  <aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
      <img src="<?= base_url('assets/images/logo.png') ?>" alt="वारी" style="height:45px;width:auto;margin-bottom:4px;">
      <div style="font-size:0.72rem;color:rgba(255,255,255,0.4);margin-top:2px;">Admin Dashboard</div>
    </div>

    <nav style="padding: 1rem 0;">
      <div class="admin-nav-label">Main</div>
      <a href="<?= base_url('admin/dashboard') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/dashboard') ? 'active' : '') ?>">
        <i class="fas fa-tachometer-alt"></i> Dashboard
      </a>

      <div class="admin-nav-label">Catalogue</div>
      <a href="<?= base_url('admin/products') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/products') ? 'active' : '') ?>">
        <i class="fas fa-box"></i> Products
      </a>
      <a href="<?= base_url('admin/categories') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/categories') ? 'active' : '') ?>">
        <i class="fas fa-tags"></i> Categories
      </a>

      <div class="admin-nav-label">Content</div>
      <a href="<?= base_url('admin/testimonials') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/testimonials') ? 'active' : '') ?>">
        <i class="fas fa-star"></i> Testimonials
      </a>
      <a href="<?= base_url('admin/gallery') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/gallery') ? 'active' : '') ?>">
        <i class="fas fa-images"></i> Gallery
      </a>
      <a href="<?= base_url('admin/content/about') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/content/about') ? 'active' : '') ?>">
        <i class="fas fa-info-circle"></i> About Page
      </a>
      <a href="<?= base_url('admin/content/contact') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/content/contact') ? 'active' : '') ?>">
        <i class="fas fa-address-book"></i> Contact Info
      </a>

      <div class="admin-nav-label">Customers</div>
      <a href="<?= base_url('admin/enquiries') ?>" class="admin-nav-link <?= (str_contains(current_url(), 'admin/enquiries') ? 'active' : '') ?>">
        <i class="fas fa-envelope"></i> Enquiries
        <?php if (isset($new_enquiries_count) && $new_enquiries_count > 0): ?>
          <span style="background:var(--waari-amber);color:#fff;border-radius:50px;font-size:0.7rem;padding:1px 7px;margin-left:auto;">
            <?= $new_enquiries_count ?>
          </span>
        <?php endif; ?>
      </a>

      <div class="admin-nav-label" style="margin-top:1rem;"></div>
      <a href="<?= base_url('/') ?>" target="_blank" class="admin-nav-link">
        <i class="fas fa-external-link-alt"></i> View Website
      </a>
      <a href="<?= base_url('admin/logout') ?>" class="admin-nav-link" style="color:rgba(255,100,100,0.8);">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </nav>
  </aside>

  <!-- Admin Main -->
  <div class="admin-main">

    <!-- Topbar -->
    <div class="admin-topbar">
      <div class="d-flex align-items-center gap-3">
        <button id="sidebarToggle" class="btn btn-sm d-lg-none" style="border:1px solid var(--waari-border);">
          <i class="fas fa-bars"></i>
        </button>
        <h6 class="mb-0" style="color:var(--waari-dark);font-weight:700;">
          <?= esc($page_title ?? 'Dashboard') ?>
        </h6>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span style="font-size:0.85rem;color:var(--waari-muted);">
          <i class="fas fa-user-shield me-1"></i>
          <?= esc(session()->get('admin_name') ?? 'Admin') ?>
        </span>
      </div>
    </div>

    <!-- Flash Messages -->
    <div class="admin-content" style="padding-bottom:0.5rem;">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="waari-alert success" data-auto-dismiss>
          <i class="fas fa-check-circle"></i>
          <?= esc(session()->getFlashdata('success')) ?>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="waari-alert error" data-auto-dismiss>
          <i class="fas fa-exclamation-circle"></i>
          <?= esc(session()->getFlashdata('error')) ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Page Content -->
    <div class="admin-content">
      <?= $this->renderSection('content') ?>
    </div>

  </div><!-- /.admin-main -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Waari JS -->
  <script src="<?= base_url('assets/js/waari.js') ?>"></script>

  <?= $extra_js ?? '' ?>
</body>
</html>
