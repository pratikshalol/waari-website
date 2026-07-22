<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>Our Natural Products</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5 bg-light-amber">
  <div class="container py-3">
    
    <!-- Filter & Search Bar -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-white">
      <form action="<?= base_url('products') ?>" method="GET" class="row g-3 align-items-center">
        <!-- Search input -->
        <div class="col-lg-5 col-md-6">
          <div class="input-group">
            <span class="input-group-text bg-cream border-amber text-amber"><i class="fas fa-search"></i></span>
            <input type="text" name="search" class="form-control border-amber" placeholder="Search jaggery powder, blocks, ginger..." value="<?= esc($search) ?>">
          </div>
        </div>

        <!-- Category Dropdown -->
        <div class="col-lg-4 col-md-4">
          <select name="category" class="form-select border-amber" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat): ?>
              <option value="<?= esc($cat['slug']) ?>" <?= ($category_slug === $cat['slug'] ? 'selected' : '') ?>>
                <?= esc($cat['name']) ?> (<?= esc($cat['product_count']) ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Filter Submit / Reset -->
        <div class="col-lg-3 col-md-2 d-flex gap-2">
          <button type="submit" class="btn-waari btn-waari-primary w-100">Filter</button>
          <?php if (! empty($search) || ! empty($category_slug)): ?>
            <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-outline" title="Reset Filters">Reset</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <!-- Active Filters Badge Display -->
    <?php if (! empty($search) || ! empty($active_category)): ?>
      <div class="d-flex align-items-center gap-2 mb-4">
        <span class="text-muted small">Active Filters:</span>
        <?php if (! empty($active_category)): ?>
          <span class="badge bg-amber text-white px-3 py-2 rounded-pill">
            Category: <?= esc($active_category['name']) ?>
            <a href="<?= base_url('products' . (! empty($search) ? '?search=' . urlencode($search) : '')) ?>" class="text-white ms-1">&times;</a>
          </span>
        <?php endif; ?>
        <?php if (! empty($search)): ?>
          <span class="badge bg-dark-gur text-white px-3 py-2 rounded-pill">
            Search: "<?= esc($search) ?>"
            <a href="<?= base_url('products' . (! empty($category_slug) ? '?category=' . urlencode($category_slug) : '')) ?>" class="text-white ms-1">&times;</a>
          </span>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <!-- Products Grid -->
    <div class="row g-4">
      <?php if (! empty($products)): ?>
        <?php foreach ($products as $prod): ?>
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
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="product-category-badge"><?= esc($prod['category_name'] ?? 'Jaggery') ?></span>
                  <?php if (! $prod['is_available']): ?>
                    <span class="availability-badge unavailable">Out of Stock</span>
                  <?php endif; ?>
                </div>

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
          <div class="p-5 bg-white rounded-4 shadow-sm">
            <i class="fas fa-box-open fs-1 text-muted mb-3"></i>
            <h4>No Products Found</h4>
            <p class="text-muted">We couldn't find any jaggery products matching your criteria.</p>
            <a href="<?= base_url('products') ?>" class="btn-waari btn-waari-primary mt-2">Clear Filters</a>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pager): ?>
      <div class="d-flex justify-content-center mt-5">
        <?= $pager->links('default', 'default_full') ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>
