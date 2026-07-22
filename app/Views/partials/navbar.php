<nav class="waari-navbar navbar navbar-expand-lg">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="<?= base_url('/') ?>">
      <img src="<?= base_url('assets/images/logo.png') ?>" alt="वारी" style="height:50px;width:auto;">
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#waariNav"
            aria-controls="waariNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Links -->
    <div class="collapse navbar-collapse" id="waariNav">
      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item">
          <a class="nav-link <?= (current_url() === base_url('/') ? 'active' : '') ?>"
             href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (str_contains(current_url(), '/about') ? 'active' : '') ?>"
             href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (str_contains(current_url(), '/products') ? 'active' : '') ?>"
             href="<?= base_url('products') ?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (str_contains(current_url(), '/gallery') ? 'active' : '') ?>"
             href="<?= base_url('gallery') ?>">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (str_contains(current_url(), '/testimonials') ? 'active' : '') ?>"
             href="<?= base_url('testimonials') ?>">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (str_contains(current_url(), '/contact') ? 'active' : '') ?>"
             href="<?= base_url('contact') ?>">Contact</a>
        </li>
      </ul>

      <!-- Auth Actions -->
      <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">
        <?php if (session()->get('user_logged_in')): ?>
          <div class="dropdown">
            <button class="btn-waari btn-waari-outline dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user me-1"></i>
              <?= esc(session()->get('user_name') ?? 'Account') ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fas fa-user-circle me-2"></i>My Profile</a></li>
              <li><a class="dropdown-item" href="<?= base_url('profile/enquiries') ?>"><i class="fas fa-envelope me-2"></i>My Enquiries</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
          </div>
        <?php else: ?>
          <a href="<?= base_url('login') ?>" class="btn-waari btn-waari-outline">
            <i class="fas fa-sign-in-alt me-1"></i>Login
          </a>
          <a href="<?= base_url('register') ?>" class="btn-waari btn-waari-primary">
            Register
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
