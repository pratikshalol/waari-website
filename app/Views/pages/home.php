<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- ── HERO SECTION ────────────────────────────────────────────── -->
<section class="hero-section text-white py-5">
  <div class="container hero-content">
    <div class="row align-items-center g-5 py-4">
      <div class="col-lg-7">
        <span class="hero-badge">
          <i class="fas fa-leaf me-1"></i> 100% Pure &amp; Chemical-Free
        </span>
        <h1 class="hero-title">
          Taste the Goodness of <span>Natural Jaggery</span>
        </h1>
        <p class="hero-description">
          Handcrafted in the heart of Maharashtra using traditional open-pan boiling. No added chemicals, preservatives, or artificial colors — just pure sugarcane sweetness rich in vital minerals.
        </p>
        <div class="d-flex flex-wrap gap-3 mt-4">
          <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-primary btn-lg">
            <i class="fas fa-shopping-bag me-2"></i>Explore Products
          </a>
          <a href="<?= base_url('about') ?>" class="btn-waari btn-waari-outline btn-lg text-white border-white">
            Our Heritage
          </a>
        </div>
        
        <div class="hero-stats">
          <div>
            <div class="hero-stat-number">100%</div>
            <div class="hero-stat-label">Natural &amp; Unrefined</div>
          </div>
          <div>
            <div class="hero-stat-number">0</div>
            <div class="hero-stat-label">Chemicals / Sulphur</div>
          </div>
          <div>
            <div class="hero-stat-number">10+</div>
            <div class="hero-stat-label">Product Varieties</div>
          </div>
        </div>
      </div>

      <div class="col-lg-5 text-center">
        <div class="p-4 rounded-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.2);">
          <div class="mb-3">
            <span class="fs-1 text-warning"><i class="fas fa-cubes"></i></span>
          </div>
          <h3 class="text-white mb-2" style="font-family: var(--font-heading);">वारी Natural Jaggery</h3>
          <p class="small text-white-50 mb-3">By Shrutika Nutrilite Foods PVT LTD</p>
          <hr class="border-light opacity-25">
          <p class="text-white small mb-4">Pure Sugarcane Jaggery Powder, Kolhapuri Blocks, Flavoured Infusions &amp; Organic Syrups.</p>
          <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-white w-100">
            View All Products <i class="fas fa-arrow-right ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FEATURED CATEGORIES ────────────────────────────────────── -->
<?php if (! empty($categories)): ?>
<section class="py-5 bg-light-amber">
  <div class="container py-3">
    <div class="text-center mb-5">
      <h2 class="section-title">Our Product Categories</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Discover our wide array of traditional, wholesome jaggery products</p>
    </div>

    <div class="row g-4">
      <?php foreach ($categories as $cat): ?>
        <div class="col-lg-4 col-md-6">
          <a href="<?= base_url('products?category=' . esc($cat['slug'])) ?>" class="text-decoration-none">
            <div class="feature-card h-100 d-flex flex-column align-items-center text-center p-4">
              <div class="feature-icon mb-3">
                <i class="fas <?= esc($cat['icon'] ?? 'fa-mortar-pestle') ?>"></i>
              </div>
              <h4 class="feature-title mb-2 text-dark-gur"><?= esc($cat['name']) ?></h4>
              <p class="feature-desc mb-3"><?= esc($cat['description'] ?? 'Pure, natural jaggery products.') ?></p>
              <span class="btn-waari btn-waari-outline mt-auto">Browse Category &rarr;</span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ── FEATURED PRODUCTS ─────────────────────────────────────── -->
<section class="py-5">
  <div class="container py-3">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
      <div>
        <h2 class="section-title text-start mb-1">Featured Products</h2>
        <p class="text-muted mb-0">Handpicked natural favourites for your kitchen</p>
      </div>
      <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-outline mt-3 mt-md-0">
        View All Products <i class="fas fa-arrow-right ms-1"></i>
      </a>
    </div>
    <div class="section-divider ms-0 mb-5"></div>

    <div class="row g-4">
      <?php if (! empty($featured_products)): ?>
        <?php foreach ($featured_products as $prod): ?>
          <div class="col-lg-4 col-md-6">
            <div class="product-card">
              <div class="product-card-img">
                <?php if (! empty($prod['image']) && file_exists(FCPATH . 'uploads/products/' . $prod['image'])): ?>
                  <img src="<?= base_url('uploads/products/' . esc($prod['image'])) ?>" alt="<?= esc($prod['name']) ?>">
                <?php else: ?>
                  <div class="product-card-img-placeholder">
                    <i class="fas fa-jar"></i>
                  </div>
                <?php endif; ?>
              </div>
              <div class="product-card-body">
                <span class="product-category-badge"><?= esc($prod['category_name'] ?? 'Jaggery') ?></span>
                <h4 class="product-card-title">
                  <a href="<?= base_url('products/' . esc($prod['slug'])) ?>" class="text-dark-gur text-decoration-none">
                    <?= esc($prod['name']) ?>
                  </a>
                </h4>
                <p class="product-card-desc"><?= esc($prod['short_description']) ?></p>
              </div>
              <div class="product-card-footer">
                <div>
                  <span class="product-price">₹<?= number_format($prod['price'], 2) ?></span>
                  <?php if (! empty($prod['weight'])): ?>
                    <span class="product-weight-tag ms-1"><?= esc($prod['weight']) ?></span>
                  <?php endif; ?>
                </div>
                <a href="<?= base_url('products/' . esc($prod['slug'])) ?>" class="btn-waari btn-waari-primary btn-sm">
                  View Detail
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <p class="text-muted">No products available at the moment.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ── WHY CHOOSE WAARI ──────────────────────────────────────── -->
<section class="why-choose-section">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Why Choose वारी?</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Purity and health in every spoonful — crafted with traditional care</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-leaf"></i></div>
          <h4 class="feature-title">100% Chemical-Free</h4>
          <p class="feature-desc">No synthetic clarification agents, sulphur, or artificial bleaching used at any stage.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-heartbeat"></i></div>
          <h4 class="feature-title">Mineral-Rich Superfood</h4>
          <p class="feature-desc">Retains natural iron, calcium, magnesium, and potassium lost in refined sugar.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-tractor"></i></div>
          <h4 class="feature-title">Direct From Farmers</h4>
          <p class="feature-desc">Made from fresh sugarcane sourced directly from sustainable farms in Maharashtra.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="feature-card">
          <div class="feature-icon"><i class="fas fa-award"></i></div>
          <h4 class="feature-title">FSSAI Certified</h4>
          <p class="feature-desc">Processed under strict hygiene standards by Shrutika Nutrilite Foods PVT LTD.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── HEALTH BENEFITS ───────────────────────────────────────── -->
<section class="benefits-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="section-title text-start mb-2">Health Benefits of Natural Jaggery</h2>
        <div class="section-divider ms-0 mb-4"></div>
        <p class="lead text-dark-gur mb-4">Switching from refined sugar to pure jaggery is one of the easiest health upgrades you can make for your family.</p>

        <div class="benefit-item">
          <span class="benefit-icon text-amber"><i class="fas fa-tint"></i></span>
          <div class="benefit-text">
            <h5>Rich Source of Iron</h5>
            <p>Prevents anaemia, improves hemoglobin levels, and boosts overall energy daily.</p>
          </div>
        </div>

        <div class="benefit-item">
          <span class="benefit-icon text-amber"><i class="fas fa-fire"></i></span>
          <div class="benefit-text">
            <h5>Aids Digestion &amp; Detoxification</h5>
            <p>Stimulates digestive enzymes, prevents constipation, and helps flush toxins from the liver.</p>
          </div>
        </div>

        <div class="benefit-item">
          <span class="benefit-icon text-amber"><i class="fas fa-shield-alt"></i></span>
          <div class="benefit-text">
            <h5>Immunity &amp; Respiratory Support</h5>
            <p>Contains antioxidants and minerals like zinc and selenium that strengthen your body's immune defense.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 text-center">
        <div class="p-5 rounded-4 bg-amber text-white shadow-waari">
          <i class="fas fa-seedling fs-1 mb-3"></i>
          <h3 class="text-white mb-3" style="font-family: var(--font-heading);">Pure Maharashtra Sugarcane</h3>
          <p class="lead mb-4">Natural sweetness, rich golden hue, and traditional taste. Make the healthy choice today.</p>
          <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-white btn-lg">
            Shop Pure Jaggery <i class="fas fa-shopping-cart ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ──────────────────────────────────────────── -->
<?php if (! empty($testimonials)): ?>
<section class="testimonials-section">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">What Our Customers Say</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Real experiences from families across India</p>
    </div>

    <div class="row g-4">
      <?php foreach ($testimonials as $t): ?>
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <div class="testimonial-stars" data-stars="<?= esc($t['rating']) ?>"></div>
            <p class="testimonial-message">"<?= esc($t['message']) ?>"</p>
            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top border-secondary opacity-75">
              <div>
                <div class="testimonial-customer-name"><?= esc($t['customer_name']) ?></div>
                <?php if (! empty($t['customer_location'])): ?>
                  <div class="testimonial-customer-place"><i class="fas fa-map-marker-alt me-1"></i><?= esc($t['customer_location']) ?></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ── CONTACT CTA ───────────────────────────────────────────── -->
<section class="py-5 bg-cream text-center">
  <div class="container py-4">
    <h2 class="section-title mb-3">Have Questions or Bulk Order Enquiries?</h2>
    <p class="section-subtitle mb-4">We'd love to hear from you. Get in touch with the वारी team today.</p>
    <a href="<?= base_url('contact') ?>" class="btn-waari btn-waari-primary btn-lg">
      <i class="fas fa-envelope me-2"></i>Contact Us Now
    </a>
  </div>
</section>

<?= $this->endSection() ?>
