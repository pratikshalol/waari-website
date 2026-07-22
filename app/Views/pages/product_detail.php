<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1><?= esc($product['name']) ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('products') ?>">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= esc($product['name']) ?></li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5">
  <div class="container py-3">
    <div class="row g-5">

      <!-- Left Column: Product Image -->
      <div class="col-lg-6">
        <div class="product-detail-img-box p-4 bg-cream rounded-4 text-center border border-warning shadow-sm">
          <?php if (! empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])): ?>
            <img src="<?= base_url('uploads/products/' . esc($product['image'])) ?>" alt="<?= esc($product['name']) ?>" class="img-fluid rounded-3 max-h-400">
          <?php else: ?>
            <div class="py-5 text-muted">
              <i class="fas fa-jar text-amber" style="font-size: 8rem;"></i>
              <p class="mt-3 font-heading text-dark-gur">वारी Natural Jaggery</p>
            </div>
          <?php endif; ?>
        </div>

        <div class="mt-4 p-4 bg-light-amber rounded-4 border border-warning">
          <div class="d-flex align-items-center gap-3">
            <div class="text-amber fs-2"><i class="fas fa-shield-alt"></i></div>
            <div>
              <h6 class="mb-1 text-dark-gur">वारी Quality Assurance</h6>
              <p class="small text-muted mb-0">100% Sugarcane Juice &bull; Zero Bleach &bull; FSSAI License No. <?= esc($contact_info['fssai_number'] ?? '11223344556677') ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Product Information & Enquiry Form -->
      <div class="col-lg-6">
        <div class="ps-lg-3">
          <span class="product-category-badge fs-6 px-3 py-1 mb-2"><?= esc($product['category_name'] ?? 'Jaggery') ?></span>
          
          <h2 class="text-dark-gur mb-3" style="font-family: var(--font-heading); font-weight: 800;"><?= esc($product['name']) ?></h2>

          <div class="d-flex align-items-center gap-3 mb-4">
            <span class="product-price fs-2">₹<?= number_format($product['price'], 2) ?></span>
            <?php if (! empty($product['weight'])): ?>
              <span class="product-weight-tag fs-6 px-3 py-1"><?= esc($product['weight']) ?></span>
            <?php endif; ?>
            
            <?php if ($product['is_available']): ?>
              <span class="availability-badge available px-3 py-1 fs-6"><i class="fas fa-check-circle me-1"></i>In Stock</span>
            <?php else: ?>
              <span class="availability-badge unavailable px-3 py-1 fs-6"><i class="fas fa-times-circle me-1"></i>Out of Stock</span>
            <?php endif; ?>
          </div>

          <div class="p-3 bg-cream rounded-3 mb-4 border border-warning">
            <p class="mb-0 text-dark-gur fs-6">
              <?= esc($product['short_description']) ?>
            </p>
          </div>

          <!-- Description Tab / Section -->
          <div class="mb-4">
            <h5 class="text-dark-gur border-bottom border-warning pb-2 mb-3">Product Description</h5>
            <div class="text-muted" style="line-height: 1.8;">
              <?= $product['description'] /* Rich HTML content */ ?>
            </div>
          </div>

          <!-- Benefits -->
          <?php if (! empty($product['benefits'])): ?>
            <div class="mb-4">
              <h5 class="text-dark-gur border-bottom border-warning pb-2 mb-3"><i class="fas fa-heartbeat text-amber me-2"></i>Nutritional &amp; Health Benefits</h5>
              <ul class="list-unstyled text-muted">
                <?php foreach (explode("\n", $product['benefits']) as $benefit): ?>
                  <?php if (trim($benefit) !== ''): ?>
                    <li class="mb-2 d-flex align-items-start gap-2">
                      <i class="fas fa-check text-amber mt-1"></i>
                      <span><?= esc(trim($benefit)) ?></span>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Ingredients -->
          <?php if (! empty($product['ingredients'])): ?>
            <div class="mb-4">
              <h5 class="text-dark-gur border-bottom border-warning pb-2 mb-2"><i class="fas fa-mortar-pestle text-amber me-2"></i>Ingredients</h5>
              <p class="text-muted small mb-0"><?= esc($product['ingredients']) ?></p>
            </div>
          <?php endif; ?>

          <!-- Enquiry Form CTA Card -->
          <div class="card border-amber rounded-4 shadow-sm mt-5">
            <div class="card-header bg-dark-gur text-white rounded-top-4 py-3">
              <h5 class="mb-0 text-white" style="font-family: var(--font-heading);"><i class="fas fa-paper-plane me-2"></i>Send Enquiry / Order Request</h5>
            </div>
            <div class="card-body p-4 waari-form">
              <form action="<?= base_url('products/enquire') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                <input type="hidden" name="product_name" value="<?= esc($product['name']) ?>">

                <div class="row g-3">
                  <div class="col-md-6">
                    <label>Your Name *</label>
                    <input type="text" name="name" class="form-control" value="<?= esc(session()->get('user_name') ?? '') ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label>Email Address *</label>
                    <input type="email" name="email" class="form-control" value="<?= esc(session()->get('user_email') ?? '') ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
                  </div>
                  <div class="col-md-6">
                    <label>Product</label>
                    <input type="text" class="form-control bg-light" value="<?= esc($product['name']) ?>" readonly>
                  </div>
                  <div class="col-12">
                    <label>Message / Quantity Needed *</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Please specify quantity or any questions..." required></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn-waari btn-waari-primary w-100">
                      Submit Product Enquiry <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Related Products -->
    <?php if (! empty($related_products)): ?>
      <div class="mt-5 pt-5 border-top">
        <h3 class="section-title text-start mb-4">Related Products</h3>
        <div class="row g-4">
          <?php foreach ($related_products as $rel): ?>
            <div class="col-lg-3 col-md-6">
              <div class="product-card">
                <div class="product-card-img">
                  <?php if (! empty($rel['image']) && file_exists(FCPATH . 'uploads/products/' . $rel['image'])): ?>
                    <img src="<?= base_url('uploads/products/' . esc($rel['image'])) ?>" alt="<?= esc($rel['name']) ?>">
                  <?php else: ?>
                    <div class="product-card-img-placeholder">
                      <i class="fas fa-jar"></i>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="product-card-body">
                  <span class="product-category-badge"><?= esc($rel['category_name'] ?? 'Jaggery') ?></span>
                  <h5 class="product-card-title">
                    <a href="<?= base_url('products/' . esc($rel['slug'])) ?>" class="text-dark-gur text-decoration-none">
                      <?= esc($rel['name']) ?>
                    </a>
                  </h5>
                </div>
                <div class="product-card-footer">
                  <span class="product-price">₹<?= number_format($rel['price'], 2) ?></span>
                  <a href="<?= base_url('products/' . esc($rel['slug'])) ?>" class="btn-waari btn-waari-outline btn-sm">
                    View
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>
