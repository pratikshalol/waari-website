<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold"><?= esc($page_title) ?></h4>
  <a href="<?= base_url('admin/products') ?>" class="btn-waari btn-waari-outline">
    <i class="fas fa-arrow-left me-1"></i> Back to Products
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <?php $isEdit = ! empty($product); ?>
  <form action="<?= $isEdit ? base_url('admin/products/update/' . $product['id']) : base_url('admin/products/store') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-8">
        <label>Product Name *</label>
        <input type="text" name="name" class="form-control" value="<?= old('name', $product['name'] ?? '') ?>" required>
      </div>

      <div class="col-md-4">
        <label>Category *</label>
        <select name="category_id" class="form-select" required>
          <option value="">Select Category</option>
          <?php foreach ($categories as $cat): ?>
            <option value="<?= esc($cat['id']) ?>" <?= (old('category_id', $product['category_id'] ?? '') == $cat['id'] ? 'selected' : '') ?>>
              <?= esc($cat['name']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-4">
        <label>Price (₹) *</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?= old('price', $product['price'] ?? '') ?>" required>
      </div>

      <div class="col-md-4">
        <label>Weight / Quantity Tag</label>
        <input type="text" name="weight" class="form-control" value="<?= old('weight', $product['weight'] ?? '') ?>" placeholder="500g, 1kg, 400ml">
      </div>

      <div class="col-md-4">
        <label>Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="<?= old('sort_order', $product['sort_order'] ?? 0) ?>">
      </div>

      <div class="col-12">
        <label>Short Description</label>
        <textarea name="short_description" class="form-control" rows="2" placeholder="Brief tagline shown on product cards..."><?= old('short_description', $product['short_description'] ?? '') ?></textarea>
      </div>

      <div class="col-12">
        <label>Full Description (HTML allowed)</label>
        <textarea name="description" class="form-control" rows="5" placeholder="Detailed product story & benefits..."><?= old('description', $product['description'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <label>Health / Nutritional Benefits (One per line)</label>
        <textarea name="benefits" class="form-control" rows="4" placeholder="Rich in iron&#10;No chemicals&#10;Aids digestion..."><?= old('benefits', $product['benefits'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <label>Ingredients</label>
        <textarea name="ingredients" class="form-control" rows="4" placeholder="100% Pure Sugarcane Juice..."><?= old('ingredients', $product['ingredients'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" data-preview="imgPreview">
        <div class="mt-2">
          <?php if (! empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])): ?>
            <img id="imgPreview" src="<?= base_url('uploads/products/' . esc($product['image'])) ?>" alt="" class="rounded border p-1" style="max-height: 120px;">
          <?php else: ?>
            <img id="imgPreview" src="" alt="" class="rounded border p-1" style="max-height: 120px; display: none;">
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-6">
        <label class="d-block">Options &amp; Visibility</label>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" <?= old('is_featured', $product['is_featured'] ?? 0) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_featured">Featured Product (Show on Homepage)</label>
        </div>

        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" name="is_available" value="1" id="is_available" <?= old('is_available', $product['is_available'] ?? 1) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_available">In Stock / Available</label>
        </div>

        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?= old('is_active', $product['is_active'] ?? 1) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_active">Active (Visible on Site)</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          <?= $isEdit ? 'Update Product' : 'Save Product' ?> <i class="fas fa-check ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
