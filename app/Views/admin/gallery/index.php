<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Media Gallery</h4>
  <a href="<?= base_url('admin/gallery/create') ?>" class="btn-waari btn-waari-primary">
    <i class="fas fa-upload me-1"></i> Upload Photo
  </a>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white">
  <?php if (! empty($items)): ?>
    <div class="row g-4">
      <?php foreach ($items as $item): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
            <?php if (! empty($item['image']) && file_exists(FCPATH . 'uploads/gallery/' . $item['image'])): ?>
              <img src="<?= base_url('uploads/gallery/' . esc($item['image'])) ?>" alt="" class="card-img-top" style="height: 160px; object-fit: cover;">
            <?php else: ?>
              <div class="bg-cream text-amber text-center py-4" style="height: 160px;">
                <i class="fas fa-image fs-1"></i>
              </div>
            <?php endif; ?>

            <div class="card-body p-3">
              <span class="badge bg-amber text-white small px-2 py-1 mb-1"><?= esc($item['category'] ?? 'General') ?></span>
              <h6 class="card-title text-dark-gur mb-1"><?= esc($item['title']) ?></h6>
              <?php if (! empty($item['caption'])): ?>
                <p class="card-text small text-muted text-truncate"><?= esc($item['caption']) ?></p>
              <?php endif; ?>
            </div>
            
            <div class="card-footer bg-light border-0 d-flex justify-content-end p-2">
              <a href="<?= base_url('admin/gallery/delete/' . esc($item['id'])) ?>" class="btn btn-sm btn-outline-danger" data-confirm="Delete this gallery item?">
                <i class="fas fa-trash me-1"></i> Delete
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="text-muted text-center py-4">No gallery items uploaded yet.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
