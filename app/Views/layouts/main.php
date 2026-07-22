<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= esc($meta_description ?? 'वारी — 100% Natural, Chemical-Free Jaggery Products by Shrutika Nutrilite Foods PVT LTD') ?>">
  <title><?= esc($page_title ?? 'वारी') ?> | वारी — Natural Jaggery</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;600;700&family=Noto+Sans+Devanagari:wght@400;600;700&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Waari CSS -->
  <link href="<?= base_url('assets/css/waari.css') ?>" rel="stylesheet">

  <?= $extra_css ?? '' ?>
</head>
<body>

  <!-- Top Bar -->
  <div class="top-bar d-none d-md-block">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <i class="fas fa-leaf me-1"></i>
          100% Natural &bull; Chemical-Free &bull; No Preservatives
        </div>
        <div class="d-flex gap-3">
          <a href="<?= esc($contact_phone ?? 'tel:+919876543210') ?>">
            <i class="fas fa-phone me-1"></i><?= esc($contact_info['phone'] ?? '+91 98765 43210') ?>
          </a>
          <a href="mailto:<?= esc($contact_info['email'] ?? 'hello@waari.in') ?>">
            <i class="fas fa-envelope me-1"></i><?= esc($contact_info['email'] ?? 'hello@waari.in') ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <?= $this->include('partials/navbar') ?>

  <!-- Flash Messages -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="container mt-3">
      <div class="waari-alert success" data-auto-dismiss>
        <i class="fas fa-check-circle"></i>
        <?= esc(session()->getFlashdata('success')) ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="container mt-3">
      <div class="waari-alert error" data-auto-dismiss>
        <i class="fas fa-exclamation-circle"></i>
        <?= esc(session()->getFlashdata('error')) ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- Main Content -->
  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Waari JS -->
  <script src="<?= base_url('assets/js/waari.js') ?>"></script>

  <?= $extra_js ?? '' ?>
</body>
</html>
