<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold"><?= esc($page_title) ?></h4>
  <a href="<?= base_url('admin/testimonials') ?>" class="btn-waari btn-waari-outline">
    <i class="fas fa-arrow-left me-1"></i> Back to Testimonials
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <?php $isEdit = ! empty($testimonial); ?>
  <form action="<?= $isEdit ? base_url('admin/testimonials/update/' . $testimonial['id']) : base_url('admin/testimonials/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label>Customer Name *</label>
        <input type="text" name="customer_name" class="form-control" value="<?= old('customer_name', $testimonial['customer_name'] ?? '') ?>" required>
      </div>

      <div class="col-md-3">
        <label>Customer Location</label>
        <input type="text" name="customer_location" class="form-control" value="<?= old('customer_location', $testimonial['customer_location'] ?? '') ?>" placeholder="Pune, MH">
      </div>

      <div class="col-md-3">
        <label>Star Rating (1 - 5) *</label>
        <select name="rating" class="form-select" required>
          <?php for($i=5; $i>=1; $i--): ?>
            <option value="<?= $i ?>" <?= (old('rating', $testimonial['rating'] ?? 5) == $i ? 'selected' : '') ?>><?= $i ?> Stars</option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="col-12">
        <label>Review Message *</label>
        <textarea name="message" class="form-control" rows="4" required><?= old('message', $testimonial['message'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" <?= old('is_featured', $testimonial['is_featured'] ?? 1) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_featured">Featured on Homepage</label>
        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?= old('is_active', $testimonial['is_active'] ?? 1) ? 'checked' : '' ?>>
          <label class="form-check-label" for="is_active">Active Review</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          <?= $isEdit ? 'Update Testimonial' : 'Save Testimonial' ?> <i class="fas fa-check ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
