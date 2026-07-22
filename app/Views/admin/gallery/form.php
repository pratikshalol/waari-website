<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold"><?= esc($page_title) ?></h4>
  <a href="<?= base_url('admin/gallery') ?>" class="btn-waari btn-waari-outline">
    <i class="fas fa-arrow-left me-1"></i> Back to Gallery
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <form action="<?= base_url('admin/gallery/store') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label>Photo Title *</label>
        <input type="text" name="title" class="form-control" value="<?= old('title') ?>" placeholder="e.g. Sugarcane Harvest 2026" required>
      </div>

      <div class="col-md-6">
        <label>Gallery Category</label>
        <input type="text" name="category" class="form-control" value="<?= old('category', 'Manufacturing') ?>" placeholder="Manufacturing, Products, Farm, Events">
      </div>

      <div class="col-12">
        <label>Image File *</label>
        <input type="file" name="image" class="form-control" accept="image/*" data-preview="imgPreview" required>
        <div class="mt-2">
          <img id="imgPreview" src="" alt="" class="rounded border p-1" style="max-height: 150px; display: none;">
        </div>
      </div>

      <div class="col-12">
        <label>Caption / Short Note</label>
        <textarea name="caption" class="form-control" rows="3" placeholder="Description of what is shown..."><?= old('caption') ?></textarea>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          Upload Photo <i class="fas fa-upload ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
