<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Customer Testimonials</h4>
  <a href="<?= base_url('admin/testimonials/create') ?>" class="btn-waari btn-waari-primary">
    <i class="fas fa-plus me-1"></i> Add Testimonial
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
  <?php if (! empty($testimonials)): ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Rating</th>
            <th>Customer Name</th>
            <th>Location</th>
            <th>Message</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($testimonials as $t): ?>
            <tr>
              <td>
                <span class="testimonial-stars text-amber" data-stars="<?= esc($t['rating']) ?>"></span>
              </td>
              <td><strong><?= esc($t['customer_name']) ?></strong></td>
              <td><?= esc($t['customer_location'] ?? '—') ?></td>
              <td class="small text-muted text-truncate" style="max-width: 250px;"><?= esc($t['message']) ?></td>
              <td>
                <?php if ($t['is_active']): ?>
                  <span class="badge bg-success">Active</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Inactive</span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <a href="<?= base_url('admin/testimonials/edit/' . esc($t['id'])) ?>" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?= base_url('admin/testimonials/delete/' . esc($t['id'])) ?>" class="btn btn-sm btn-outline-danger" data-confirm="Delete this testimonial?">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-muted text-center py-4">No testimonials added yet.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
