<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>Customer Reviews</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reviews</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5 bg-light-amber">
  <div class="container py-3">
    <div class="text-center mb-5">
      <h2 class="section-title">What People Say About Waari</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Real experiences from customers who chose 100% natural jaggery</p>
    </div>

    <div class="row g-4">
      <?php if (! empty($testimonials)): ?>
        <?php foreach ($testimonials as $t): ?>
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-warning rounded-4 shadow-sm p-4 bg-white">
              <div class="testimonial-stars fs-5 mb-3" data-stars="<?= esc($t['rating']) ?>"></div>
              <p class="text-muted fst-italic mb-4" style="line-height: 1.8;">
                "<?= esc($t['message']) ?>"
              </p>
              <div class="mt-auto pt-3 border-top border-warning-subtle d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="mb-0 text-dark-gur font-heading fw-bold"><?= esc($t['customer_name']) ?></h6>
                  <?php if (! empty($t['customer_location'])): ?>
                    <span class="small text-muted"><i class="fas fa-map-marker-alt text-amber me-1"></i><?= esc($t['customer_location']) ?></span>
                  <?php endif; ?>
                </div>
                <span class="badge bg-cream text-amber border border-amber px-2 py-1 small">Verified Customer</span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <p class="text-muted">No testimonials available yet.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
