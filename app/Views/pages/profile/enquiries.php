<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>My Product Enquiries</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Enquiries</li>
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
            <h5 class="mb-0 text-dark-gur fw-bold"><?= esc(session()->get('user_name')) ?></h5>
            <span class="small text-muted"><?= esc(session()->get('user_email')) ?></span>
          </div>

          <div class="nav flex-column nav-pills gap-2">
            <a href="<?= base_url('profile') ?>" class="btn-waari btn-waari-outline text-start">
              <i class="fas fa-user me-2"></i> Profile Details
            </a>
            <a href="<?= base_url('profile/enquiries') ?>" class="btn-waari btn-waari-primary text-start">
              <i class="fas fa-envelope me-2"></i> My Enquiries
            </a>
            <a href="<?= base_url('logout') ?>" class="btn-waari btn-waari-outline text-start text-danger border-danger">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
          </div>
        </div>
      </div>

      <!-- Enquiries List Table -->
      <div class="col-lg-9">
        <div class="card border-warning rounded-4 shadow-sm p-4 bg-white">
          <h4 class="text-dark-gur mb-4" style="font-family: var(--font-heading);"><i class="fas fa-paper-plane text-amber me-2"></i>Submitted Enquiries History</h4>

          <?php if (! empty($enquiries)): ?>
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Date</th>
                    <th>Product / Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($enquiries as $enq): ?>
                    <tr>
                      <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($enq['created_at'])) ?></td>
                      <td>
                        <strong><?= esc($enq['product_name'] ?? $enq['subject'] ?? 'General Enquiry') ?></strong>
                      </td>
                      <td class="small text-muted text-truncate" style="max-width: 250px;">
                        <?= esc($enq['message']) ?>
                      </td>
                      <td>
                        <?php if ($enq['status'] === 'new'): ?>
                          <span class="badge bg-warning text-dark px-2 py-1">New</span>
                        <?php elseif ($enq['status'] === 'in_progress'): ?>
                          <span class="badge bg-info text-white px-2 py-1">In Progress</span>
                        <?php elseif ($enq['status'] === 'resolved'): ?>
                          <span class="badge bg-success px-2 py-1">Resolved</span>
                        <?php else: ?>
                          <span class="badge bg-secondary px-2 py-1"><?= esc($enq['status']) ?></span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="text-center py-5">
              <i class="fas fa-inbox fs-1 text-muted mb-3"></i>
              <h5>No Enquiries Yet</h5>
              <p class="text-muted small">You haven't submitted any product or bulk order enquiries yet.</p>
              <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-primary btn-sm mt-2">Browse Products</a>
            </div>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
