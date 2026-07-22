<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Stat Counters Grid -->
<div class="row g-4 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border-start border-warning border-4">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small text-uppercase fw-bold">Total Products</span>
          <h2 class="mb-0 text-dark-gur font-heading fw-bold mt-1"><?= esc($stats['total_products']) ?></h2>
        </div>
        <div class="fs-1 text-amber opacity-75"><i class="fas fa-box"></i></div>
      </div>
      <a href="<?= base_url('admin/products') ?>" class="small text-amber mt-3 d-inline-block text-decoration-none fw-bold">Manage Products &rarr;</a>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border-start border-warning border-4">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small text-uppercase fw-bold">Categories</span>
          <h2 class="mb-0 text-dark-gur font-heading fw-bold mt-1"><?= esc($stats['total_categories']) ?></h2>
        </div>
        <div class="fs-1 text-amber opacity-75"><i class="fas fa-tags"></i></div>
      </div>
      <a href="<?= base_url('admin/categories') ?>" class="small text-amber mt-3 d-inline-block text-decoration-none fw-bold">Manage Categories &rarr;</a>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border-start border-warning border-4">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small text-uppercase fw-bold">Enquiries</span>
          <h2 class="mb-0 text-dark-gur font-heading fw-bold mt-1"><?= esc($stats['total_enquiries']) ?></h2>
        </div>
        <div class="fs-1 text-amber opacity-75"><i class="fas fa-envelope"></i></div>
      </div>
      <a href="<?= base_url('admin/enquiries') ?>" class="small text-amber mt-3 d-inline-block text-decoration-none fw-bold">
        View Enquiries <?= ($stats['new_enquiries'] > 0 ? '('.$stats['new_enquiries'].' new)' : '') ?> &rarr;
      </a>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border-start border-warning border-4">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small text-uppercase fw-bold">Gallery / Reviews</span>
          <h2 class="mb-0 text-dark-gur font-heading fw-bold mt-1"><?= esc($stats['total_gallery'] + $stats['total_testimonials']) ?></h2>
        </div>
        <div class="fs-1 text-amber opacity-75"><i class="fas fa-images"></i></div>
      </div>
      <a href="<?= base_url('admin/gallery') ?>" class="small text-amber mt-3 d-inline-block text-decoration-none fw-bold">Manage Gallery &rarr;</a>
    </div>
  </div>
</div>

<!-- Recent Enquiries Section -->
<div class="row">
  <div class="col-12">
    <div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 text-dark-gur font-heading fw-bold"><i class="fas fa-clock text-amber me-2"></i>Recent Customer Enquiries</h5>
        <a href="<?= base_url('admin/enquiries') ?>" class="btn-waari btn-waari-outline btn-sm">View All Enquiries</a>
      </div>

      <?php if (! empty($recent_enquiries)): ?>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email / Phone</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($recent_enquiries as $enq): ?>
                <tr>
                  <td>#<?= esc($enq['id']) ?></td>
                  <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($enq['created_at'])) ?></td>
                  <td><strong><?= esc($enq['name']) ?></strong></td>
                  <td class="small"><?= esc($enq['email']) ?><br><span class="text-muted"><?= esc($enq['phone']) ?></span></td>
                  <td><?= esc($enq['subject']) ?></td>
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
                  <td>
                    <a href="<?= base_url('admin/enquiries/view/' . esc($enq['id'])) ?>" class="btn btn-sm btn-outline-warning">
                      <i class="fas fa-eye"></i> View
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-muted text-center py-4 mb-0">No customer enquiries received yet.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
