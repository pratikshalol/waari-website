<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-5 bg-light-amber min-vh-75 d-flex align-items-center">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        
        <div class="card border-warning rounded-4 shadow-waari p-4 bg-white waari-form">
          <div class="text-center mb-4">
            <span class="fs-1 text-amber"><i class="fas fa-user-circle"></i></span>
            <h3 class="text-dark-gur mt-2" style="font-family: var(--font-heading);">Welcome Back</h3>
            <p class="text-muted small">Login to your Waari user account</p>
          </div>

          <form action="<?= base_url('login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label>Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-cream border-amber text-amber"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="name@example.com" required>
              </div>
            </div>

            <div class="mb-4">
              <label>Password</label>
              <div class="input-group">
                <span class="input-group-text bg-cream border-amber text-amber"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
              </div>
            </div>

            <button type="submit" class="btn-waari btn-waari-primary btn-lg w-100 mb-3">
              Login to Account <i class="fas fa-sign-in-alt ms-2"></i>
            </button>

            <div class="text-center border-top pt-3">
              <p class="small text-muted mb-0">Don't have an account? <a href="<?= base_url('register') ?>" class="text-amber fw-bold">Register Here</a></p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
