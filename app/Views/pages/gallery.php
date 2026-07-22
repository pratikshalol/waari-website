<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>Media Gallery</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5 bg-light-amber">
  <div class="container py-3">

    <!-- Gallery Category Filter Buttons -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
      <a href="<?= base_url('gallery?filter=all') ?>" class="btn-waari <?= ($active_filter === 'all' ? 'btn-waari-primary' : 'btn-waari-outline') ?>">
        All Photos
      </a>
      <?php if (! empty($categories)): ?>
        <?php foreach ($categories as $cat): ?>
          <a href="<?= base_url('gallery?filter=' . urlencode($cat['category'])) ?>" class="btn-waari <?= ($active_filter === $cat['category'] ? 'btn-waari-primary' : 'btn-waari-outline') ?>">
            <?= esc(ucfirst($cat['category'])) ?>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Gallery Grid -->
    <div class="row g-4">
      <?php if (! empty($items)): ?>
        <?php foreach ($items as $item): ?>
          <div class="col-lg-4 col-md-6">
            <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm border border-warning bg-white h-100 style-cursor-pointer" style="cursor: pointer;">
              <?php if (! empty($item['image']) && file_exists(FCPATH . 'uploads/gallery/' . $item['image'])): ?>
                <img src="<?= base_url('uploads/gallery/' . esc($item['image'])) ?>" alt="<?= esc($item['title']) ?>" class="w-100 h-250-cover">
              <?php else: ?>
                <div class="p-5 text-center bg-cream text-amber h-250-cover d-flex flex-column justify-content-center align-items-center">
                  <i class="fas fa-image fs-1 mb-2"></i>
                  <span class="fw-bold text-dark-gur"><?= esc($item['title']) ?></span>
                </div>
              <?php endif; ?>

              <div class="p-3 bg-white">
                <span class="badge bg-amber text-white small px-2 py-1 mb-1 text-uppercase"><?= esc($item['category'] ?? 'General') ?></span>
                <h5 class="text-dark-gur mb-1" style="font-family: var(--font-heading);"><?= esc($item['title']) ?></h5>
                <?php if (! empty($item['caption'])): ?>
                  <p class="small text-muted mb-0"><?= esc($item['caption']) ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <div class="p-5 bg-white rounded-4 shadow-sm">
            <i class="fas fa-images fs-1 text-muted mb-3"></i>
            <h4>No Gallery Media Found</h4>
            <p class="text-muted">No media items are currently published under this category.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
