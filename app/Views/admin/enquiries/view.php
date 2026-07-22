<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Enquiry Detail #<?= esc($enquiry['id']) ?></h4>
  <a href="<?= base_url('admin/enquiries') ?>" class="btn-waari btn-waari-outline">
    <i class="fas fa-arrow-left me-1"></i> Back to Enquiries
  </a>
</div>

<div class="row g-4">
  <div class="col-lg-8">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white mb-4">
      <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
          <span class="text-muted small">Submitted On</span>
          <h6 class="mb-0 text-dark-gur fw-bold"><?= date('F d, Y \a\t h:i A', strtotime($enquiry['created_at'])) ?></h6>
        </div>
        <div>
          <span class="text-muted small me-2">Current Status:</span>
          <?php if ($enquiry['status'] === 'new'): ?>
            <span class="badge bg-warning text-dark px-3 py-2 fs-6">New</span>
          <?php elseif ($enquiry['status'] === 'in_progress'): ?>
            <span class="badge bg-info text-white px-3 py-2 fs-6">In Progress</span>
          <?php elseif ($enquiry['status'] === 'resolved'): ?>
            <span class="badge bg-success px-3 py-2 fs-6">Resolved</span>
          <?php else: ?>
            <span class="badge bg-secondary px-3 py-2 fs-6"><?= esc($enquiry['status']) ?></span>
          <?php endif; ?>
        </div>
      </div>

      <div class="mb-4">
        <h6 class="text-muted small text-uppercase fw-bold">Subject / Product</h6>
        <h5 class="text-dark-gur font-heading fw-bold"><?= esc($enquiry['product_name'] ?? $enquiry['subject'] ?? 'General Enquiry') ?></h5>
      </div>

      <div class="p-4 bg-cream rounded-4 border border-warning">
        <h6 class="text-amber mb-2"><i class="fas fa-quote-left me-2"></i>Customer Message:</h6>
        <p class="mb-0 text-dark-gur" style="line-height: 1.8; white-space: pre-line;"><?= esc($enquiry['message']) ?></p>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <!-- Customer Info Card -->
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white mb-4">
      <h5 class="text-dark-gur font-heading fw-bold mb-3"><i class="fas fa-user-circle text-amber me-2"></i>Customer Information</h5>

      <div class="mb-3">
        <span class="small text-muted d-block">Name:</span>
        <strong class="text-dark-gur"><?= esc($enquiry['name']) ?></strong>
      </div>

      <div class="mb-3">
        <span class="small text-muted d-block">Email Address:</span>
        <a href="mailto:<?= esc($enquiry['email']) ?>" class="text-amber fw-bold"><?= esc($enquiry['email']) ?></a>
      </div>

      <div class="mb-3">
        <span class="small text-muted d-block">Phone Number:</span>
        <?php if (! empty($enquiry['phone'])): ?>
          <a href="tel:<?= esc($enquiry['phone']) ?>" class="text-dark-gur fw-bold"><?= esc($enquiry['phone']) ?></a>
        <?php else: ?>
          <span class="text-muted">Not provided</span>
        <?php endif; ?>
      </div>

      <?php if (! empty($enquiry['registered_user_name'])): ?>
        <div class="p-2 bg-light-amber rounded text-amber small">
          <i class="fas fa-check-circle me-1"></i> Registered User: <?= esc($enquiry['registered_user_name']) ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Update Status Card -->
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
      <h5 class="text-dark-gur font-heading fw-bold mb-3"><i class="fas fa-tasks text-amber me-2"></i>Update Status</h5>

      <form action="<?= base_url('admin/enquiries/update-status/' . esc($enquiry['id'])) ?>" method="POST">
        <?= csrf_field() ?>

        <div class="mb-3">
          <select name="status" class="form-select border-amber">
            <option value="new" <?= ($enquiry['status'] === 'new' ? 'selected' : '') ?>>New</option>
            <option value="in_progress" <?= ($enquiry['status'] === 'in_progress' ? 'selected' : '') ?>>In Progress</option>
            <option value="resolved" <?= ($enquiry['status'] === 'resolved' ? 'selected' : '') ?>>Resolved</option>
            <option value="closed" <?= ($enquiry['status'] === 'closed' ? 'selected' : '') ?>>Closed</option>
          </select>
        </div>

        <button type="submit" class="btn-waari btn-waari-primary w-100">
          Update Status
        </button>
      </form>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
