<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold"><?= esc($page_title) ?></h4>
  <a href="<?= base_url('admin/categories') ?>" class="btn-waari btn-waari-outline">
    <i class="fas fa-arrow-left me-1"></i> Back to Categories
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <?php $isEdit = ! empty($category); ?>
  <form action="<?= $isEdit ? base_url('admin/categories/update/' . $category['id']) : base_url('admin/categories/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label>Category Name *</label>
        <input type="text" name="name" class="form-control" value="<?= old('name', $category['name'] ?? '') ?>" required>
      </div>

      <div class="col-md-3">
        <label>Font Awesome Icon Class</label>
        <input type="text" name="icon" class="form-control" value="<?= old('icon', $category['icon'] ?? 'fa-mortar-pestle') ?>" placeholder="fa-mortar-pestle, fa-cubes">
      </div>

      <div class="col-md-3">
        <label>Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="<?= old('sort_order', $category['sort_order'] ?? 0) ?>">
      </div>

      <div class="col-12">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"><?= old('description', $category['description'] ?? '') ?></textarea>
      </div>

      <div class="col-12">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?= old('is_active', $category['is_active'] ?? 1) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_active">Active Category</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          <?= $isEdit ? 'Update Category' : 'Save Category' ?> <i class="fas fa-check ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
