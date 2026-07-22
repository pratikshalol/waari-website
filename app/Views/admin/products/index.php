<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Products Catalogue</h4>
  <a href="<?= base_url('admin/products/create') ?>" class="btn-waari btn-waari-primary">
    <i class="fas fa-plus me-1"></i> Add New Product
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
  <?php if (! empty($products)): ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $p): ?>
            <tr>
              <td style="width: 70px;">
                <?php if (! empty($p['image']) && file_exists(FCPATH . 'uploads/products/' . $p['image'])): ?>
                  <img src="<?= base_url('uploads/products/' . esc($p['image'])) ?>" alt="" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                <?php else: ?>
                  <div class="bg-cream rounded text-amber text-center py-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-jar fs-4"></i>
                  </div>
                <?php endif; ?>
              </td>
              <td>
                <strong><?= esc($p['name']) ?></strong>
                <?php if ($p['is_featured']): ?>
                  <span class="badge bg-amber ms-1">Featured</span>
                <?php endif; ?>
              </td>
              <td><?= esc($p['category_name'] ?? 'Uncategorized') ?></td>
              <td class="fw-bold text-amber">₹<?= number_format($p['price'], 2) ?></td>
              <td><span class="badge bg-cream text-dark border border-warning"><?= esc($p['weight'] ?? '—') ?></span></td>
              <td>
                <?php if ($p['is_active']): ?>
                  <span class="badge bg-success">Active</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Inactive</span>
                <?php endif; ?>

                <?php if (! $p['is_available']): ?>
                  <span class="badge bg-danger ms-1">Out of Stock</span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <a href="<?= base_url('admin/products/edit/' . esc($p['id'])) ?>" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?= base_url('admin/products/delete/' . esc($p['id'])) ?>" class="btn btn-sm btn-outline-danger" data-confirm="Are you sure you want to delete this product?">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="text-center py-5">
      <i class="fas fa-box-open fs-1 text-muted mb-3"></i>
      <h5>No Products Found</h5>
      <p class="text-muted small">Start adding your natural jaggery products.</p>
      <a href="<?= base_url('admin/products/create') ?>" class="btn-waari btn-waari-primary btn-sm">Add First Product</a>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
