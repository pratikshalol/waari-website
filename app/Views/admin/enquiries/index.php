<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Customer Enquiries</h4>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
  <?php if (! empty($enquiries)): ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Product / Subject</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($enquiries as $e): ?>
            <tr>
              <td>#<?= esc($e['id']) ?></td>
              <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($e['created_at'])) ?></td>
              <td><strong><?= esc($e['name']) ?></strong></td>
              <td class="small"><?= esc($e['email']) ?></td>
              <td class="small"><?= esc($e['phone'] ?? '—') ?></td>
              <td><?= esc($e['product_name'] ?? $e['subject'] ?? 'General Enquiry') ?></td>
              <td>
                <?php if ($e['status'] === 'new'): ?>
                  <span class="badge bg-warning text-dark px-2 py-1">New</span>
                <?php elseif ($e['status'] === 'in_progress'): ?>
                  <span class="badge bg-info text-white px-2 py-1">In Progress</span>
                <?php elseif ($e['status'] === 'resolved'): ?>
                  <span class="badge bg-success px-2 py-1">Resolved</span>
                <?php else: ?>
                  <span class="badge bg-secondary px-2 py-1"><?= esc($e['status']) ?></span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <a href="<?= base_url('admin/enquiries/view/' . esc($e['id'])) ?>" class="btn btn-sm btn-outline-warning me-1">
                  <i class="fas fa-eye"></i> View
                </a>
                <a href="<?= base_url('admin/enquiries/delete/' . esc($e['id'])) ?>" class="btn btn-sm btn-outline-danger" data-confirm="Delete this enquiry?">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-muted text-center py-4">No customer enquiries received yet.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
