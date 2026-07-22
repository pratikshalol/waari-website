<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>My Account Profile</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5 bg-light-amber">
  <div class="container py-3">
    <div class="row g-4">

      <!-- Navigation Tabs -->
      <div class="col-lg-3">
        <div class="card border-warning rounded-4 shadow-sm p-3 bg-white">
          <div class="text-center py-3 border-bottom mb-3">
            <div class="fs-1 text-amber mb-2"><i class="fas fa-user-circle"></i></div>
            <h5 class="mb-0 text-dark-gur fw-bold"><?= esc($user['name']) ?></h5>
            <span class="small text-muted"><?= esc($user['email']) ?></span>
          </div>

          <div class="nav flex-column nav-pills gap-2">
            <a href="<?= base_url('profile') ?>" class="btn-waari btn-waari-primary text-start">
              <i class="fas fa-user me-2"></i> Profile Details
            </a>
            <a href="<?= base_url('profile/enquiries') ?>" class="btn-waari btn-waari-outline text-start">
              <i class="fas fa-envelope me-2"></i> My Enquiries
            </a>
            <a href="<?= base_url('logout') ?>" class="btn-waari btn-waari-outline text-start text-danger border-danger">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
          </div>
        </div>
      </div>

      <!-- Main Profile Forms -->
      <div class="col-lg-9">
        
        <!-- Profile Info Form -->
        <div class="card border-warning rounded-4 shadow-sm p-4 bg-white mb-4 waari-form">
          <h4 class="text-dark-gur mb-3" style="font-family: var(--font-heading);"><i class="fas fa-id-card text-amber me-2"></i>Personal Details</h4>

          <form action="<?= base_url('profile/update') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="row g-3">
              <div class="col-md-6">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
              </div>

              <div class="col-md-6">
                <label>Email Address (Read-only)</label>
                <input type="email" class="form-control bg-light" value="<?= esc($user['email']) ?>" readonly>
              </div>

              <div class="col-md-6">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?= esc($user['phone'] ?? '') ?>" placeholder="+91 98765 43210">
              </div>

              <div class="col-md-6">
                <label>Delivery Address</label>
                <textarea name="address" class="form-control" rows="2" placeholder="Your street address, city, pincode..."><?= esc($user['address'] ?? '') ?></textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn-waari btn-waari-primary">Save Profile Changes</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Change Password Form -->
        <div class="card border-warning rounded-4 shadow-sm p-4 bg-white waari-form">
          <h4 class="text-dark-gur mb-3" style="font-family: var(--font-heading);"><i class="fas fa-key text-amber me-2"></i>Change Password</h4>

          <form action="<?= base_url('profile/password') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="row g-3">
              <div class="col-md-4">
                <label>Current Password</label>
                <input type="password" name="current_password" class="form-control" required>
              </div>

              <div class="col-md-4">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="Min 8 characters" required>
              </div>

              <div class="col-md-4">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
              </div>

              <div class="col-12">
                <button type="submit" class="btn-waari btn-waari-outline">Update Password</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
