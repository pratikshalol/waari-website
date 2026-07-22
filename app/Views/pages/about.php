<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>About Waari</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Waari</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5">
  <div class="container py-3">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="badge bg-amber text-white fs-6 mb-2 px-3 py-2 rounded-pill">Our Heritage &amp; Purity</span>
        <h2 class="section-title text-start mb-3">Welcome to Waari</h2>
        <div class="section-divider ms-0 mb-4"></div>
        <p class="lead text-dark-gur">
          <?= esc($content['tagline']['content'] ?? '100% Natural, Chemical-Free Jaggery Products by Shrutika Nutrilite Foods PVT LTD.') ?>
        </p>
        <p class="text-muted mb-4" style="line-height: 1.8;">
          <?= nl2br(esc($content['brand_story']['content'] ?? 'Waari was born out of a passion for preserving traditional Indian superfoods. Situated in Maharashtra, we partner directly with sugarcane farmers to produce 100% natural jaggery without any harmful chemicals, artificial colors, or preservatives.')) ?>
        </p>
        
        <div class="row g-3">
          <div class="col-6">
            <div class="p-3 bg-cream rounded-waari border border-warning">
              <i class="fas fa-check-circle text-amber fs-4 mb-2"></i>
              <h6 class="mb-1 text-dark-gur">No Bleach / Sulphur</h6>
              <p class="small text-muted mb-0">Pure golden-amber color from natural boiling.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 bg-cream rounded-waari border border-warning">
              <i class="fas fa-microscope text-amber fs-4 mb-2"></i>
              <h6 class="mb-1 text-dark-gur">Lab Tested Quality</h6>
              <p class="small text-muted mb-0">Tested for purity &amp; essential mineral counts.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="p-4 bg-light-amber rounded-4 shadow-waari border border-warning">
          <h3 class="text-dark-gur mb-3" style="font-family: var(--font-heading);">Shrutika Nutrilite Foods</h3>
          <p class="text-muted mb-4">
            Under Shrutika Nutrilite Foods PVT LTD, Waari guarantees uncompromised quality, hygiene, and traditional taste.
          </p>
          
          <div class="mb-4">
            <h5 class="text-dark-gur mb-2"><i class="fas fa-bullseye text-amber me-2"></i>Our Mission</h5>
            <p class="text-muted small mb-0"><?= esc($content['mission']['content'] ?? 'To make natural, chemical-free jaggery an accessible, everyday healthy alternative to refined sugar for households worldwide.') ?></p>
          </div>

          <div class="mb-4">
            <h5 class="text-dark-gur mb-2"><i class="fas fa-eye text-amber me-2"></i>Our Vision</h5>
            <p class="text-muted small mb-0"><?= esc($content['vision']['content'] ?? 'To be India\'s most trusted brand for authentic, unadulterated sugarcane and palm jaggery products.') ?></p>
          </div>

          <div>
            <h5 class="text-dark-gur mb-2"><i class="fas fa-award text-amber me-2"></i>FSSAI Certification</h5>
            <p class="text-muted small mb-0">FSSAI License No: <strong><?= esc($contact_info['fssai_number'] ?? '11223344556677') ?></strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process Highlights -->
<section class="py-5 bg-cream">
  <div class="container py-3">
    <div class="text-center mb-5">
      <h2 class="section-title">How Waari Jaggery is Made</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Traditional craft meets modern hygiene</p>
    </div>

    <div class="row g-4 text-center">
      <div class="col-md-3">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <div class="fs-1 text-amber mb-3"><i class="fas fa-seedling"></i></div>
          <h5 class="text-dark-gur">1. Fresh Sugarcane</h5>
          <p class="small text-muted mb-0">Harvested at peak sweetness from non-GMO sugarcane fields.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <div class="fs-1 text-amber mb-3"><i class="fas fa-filter"></i></div>
          <h5 class="text-dark-gur">2. Natural Clarification</h5>
          <p class="small text-muted mb-0">Clarified using natural plant extract (bhindi mucilage) — zero chemicals.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <div class="fs-1 text-amber mb-3"><i class="fas fa-fire-alt"></i></div>
          <h5 class="text-dark-gur">3. Slow Evaporation</h5>
          <p class="small text-muted mb-0">Evaporated in traditional pans to concentrate molasses and iron content.</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <div class="fs-1 text-amber mb-3"><i class="fas fa-box-open"></i></div>
          <h5 class="text-dark-gur">4. Hygienic Packing</h5>
          <p class="small text-muted mb-0">Sealed in food-grade packaging to protect aroma and shelf life.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
