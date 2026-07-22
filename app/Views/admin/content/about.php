<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Edit About Page Content</h4>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <form action="<?= base_url('admin/content/about/update') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-12">
        <label>Brand Tagline / Header</label>
        <input type="text" name="tagline" class="form-control" value="<?= esc($content['tagline']['content'] ?? '') ?>" placeholder="100% Natural, Chemical-Free Jaggery Products...">
      </div>

      <div class="col-12">
        <label>Brand Story / Heritage</label>
        <textarea name="brand_story" class="form-control" rows="6"><?= esc($content['brand_story']['content'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <label>Company Mission</label>
        <textarea name="mission" class="form-control" rows="4"><?= esc($content['mission']['content'] ?? '') ?></textarea>
      </div>

      <div class="col-md-6">
        <label>Company Vision</label>
        <textarea name="vision" class="form-control" rows="4"><?= esc($content['vision']['content'] ?? '') ?></textarea>
      </div>

      <div class="col-12">
        <label>Quality &amp; Purity Promise</label>
        <textarea name="quality_promise" class="form-control" rows="4"><?= esc($content['quality_promise']['content'] ?? '') ?></textarea>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          Update About Content <i class="fas fa-check ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
