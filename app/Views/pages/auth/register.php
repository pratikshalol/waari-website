<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-5 bg-light-amber min-vh-75 d-flex align-items-center">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        
        <div class="card border-warning rounded-4 shadow-waari p-4 bg-white waari-form">
          <div class="text-center mb-4">
            <span class="fs-1 text-amber"><i class="fas fa-user-plus"></i></span>
            <h3 class="text-dark-gur mt-2" style="font-family: var(--font-heading);">Create an Account</h3>
            <p class="text-muted small">Join Waari to manage enquiries and orders</p>
          </div>

          <form action="<?= base_url('register') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label>Full Name *</label>
              <input type="text" name="name" class="form-control" value="<?= old('name') ?>" placeholder="Your full name" required>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label>Email Address *</label>
                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="name@example.com" required>
              </div>
              <div class="col-md-6">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>" placeholder="+91 98765 43210">
              </div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label>Password *</label>
                <input type="password" name="password" class="form-control" placeholder="At least 8 characters" required>
              </div>
              <div class="col-md-6">
                <label>Confirm Password *</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password" required>
              </div>
            </div>

            <button type="submit" class="btn-waari btn-waari-primary btn-lg w-100 mb-3">
              Register Account <i class="fas fa-user-check ms-2"></i>
            </button>

            <div class="text-center border-top pt-3">
              <p class="small text-muted mb-0">Already have an account? <a href="<?= base_url('login') ?>" class="text-amber fw-bold">Login Here</a></p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
