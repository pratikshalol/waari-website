<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Product Categories</h4>
  <a href="<?= base_url('admin/categories/create') ?>" class="btn-waari btn-waari-primary">
    <i class="fas fa-plus me-1"></i> Add Category
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
  <?php if (! empty($categories)): ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Icon</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Products Count</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $c): ?>
            <tr>
              <td>
                <div class="bg-cream rounded text-amber text-center py-2" style="width: 40px; height: 40px;">
                  <i class="fas <?= esc($c['icon'] ?? 'fa-tags') ?> fs-5"></i>
                </div>
              </td>
              <td><strong><?= esc($c['name']) ?></strong></td>
              <td><code><?= esc($c['slug']) ?></code></td>
              <td><span class="badge bg-cream text-dark border border-warning px-3 py-1"><?= esc($c['product_count'] ?? 0) ?> Products</span></td>
              <td>
                <?php if ($c['is_active']): ?>
                  <span class="badge bg-success">Active</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Inactive</span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <a href="<?= base_url('admin/categories/edit/' . esc($c['id'])) ?>" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?= base_url('admin/categories/delete/' . esc($c['id'])) ?>" class="btn btn-sm btn-outline-danger" data-confirm="Are you sure you want to delete this category?">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-muted text-center py-4">No categories created yet.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
