<footer class="waari-footer">
  <div class="container">
    <div class="row g-5">

      <!-- Brand Column -->
      <div class="col-lg-4 col-md-6">
        <div class="footer-brand">वारी<span style="color:#f5d78a">.</span></div>
        <p class="footer-tagline">100% Natural. Chemical-Free Jaggery.</p>
        <p style="color:rgba(255,255,255,0.65);font-size:0.88rem;line-height:1.8;">
          Brought to you by <strong style="color:rgba(255,255,255,0.85);">Shrutika Nutrilite Foods PVT LTD</strong>
          — committed to purity, health, and the ancient tradition of natural jaggery making in Maharashtra.
        </p>
        <div class="footer-social">
          <a href="<?= esc($contact_info['facebook_url']  ?? '#') ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="<?= esc($contact_info['instagram_url'] ?? '#') ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="<?= esc($contact_info['youtube_url']   ?? '#') ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="https://wa.me/<?= esc(preg_replace('/\D/', '', $contact_info['whatsapp'] ?? '919876543210')) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="fssai-badge">
          <i class="fas fa-shield-alt"></i>
          FSSAI: <?= esc($contact_info['fssai_number'] ?? '11223344556677') ?>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6 col-6">
        <h6 class="footer-heading">Quick Links</h6>
        <ul class="footer-links">
          <li><a href="<?= base_url('/') ?>">Home</a></li>
          <li><a href="<?= base_url('about') ?>">About वारी</a></li>
          <li><a href="<?= base_url('products') ?>">Products</a></li>
          <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>
          <li><a href="<?= base_url('testimonials') ?>">Reviews</a></li>
          <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
        </ul>
      </div>

      <!-- Products -->
      <div class="col-lg-2 col-md-6 col-6">
        <h6 class="footer-heading">Our Products</h6>
        <ul class="footer-links">
          <li><a href="<?= base_url('products?category=jaggery-powder') ?>">Jaggery Powder</a></li>
          <li><a href="<?= base_url('products?category=jaggery-blocks') ?>">Jaggery Blocks</a></li>
          <li><a href="<?= base_url('products?category=flavoured-jaggery') ?>">Flavoured Jaggery</a></li>
          <li><a href="<?= base_url('products?category=jaggery-syrup') ?>">Jaggery Syrup</a></li>
          <li><a href="<?= base_url('products?category=gift-combos') ?>">Gift Combos</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4 col-md-6">
        <h6 class="footer-heading">Get in Touch</h6>
        <div class="footer-contact-item">
          <span class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></span>
          <div class="footer-contact-text">
            <?= esc($contact_info['address_line1'] ?? 'Shrutika Nutrilite Foods PVT LTD') ?><br>
            <?= esc($contact_info['address_line2'] ?? 'Village Waari, Taluka Koregaon') ?><br>
            <?= esc($contact_info['address_city'] ?? 'Satara') ?>,
            <?= esc($contact_info['address_state'] ?? 'Maharashtra') ?> —
            <?= esc($contact_info['address_pincode'] ?? '415 001') ?>
          </div>
        </div>
        <div class="footer-contact-item">
          <span class="footer-contact-icon"><i class="fas fa-phone"></i></span>
          <div class="footer-contact-text">
            <a href="tel:<?= esc($contact_info['phone'] ?? '+919876543210') ?>" style="color:rgba(255,255,255,0.75);">
              <?= esc($contact_info['phone'] ?? '+91 98765 43210') ?>
            </a>
          </div>
        </div>
        <div class="footer-contact-item">
          <span class="footer-contact-icon"><i class="fas fa-envelope"></i></span>
          <div class="footer-contact-text">
            <a href="mailto:<?= esc($contact_info['email'] ?? 'hello@waari.in') ?>" style="color:rgba(255,255,255,0.75);">
              <?= esc($contact_info['email'] ?? 'hello@waari.in') ?>
            </a>
          </div>
        </div>
        <div class="footer-contact-item">
          <span class="footer-contact-icon"><i class="fas fa-clock"></i></span>
          <div class="footer-contact-text">
            <?= esc($contact_info['business_hours'] ?? 'Monday – Saturday: 9:00 AM – 6:00 PM') ?>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
          &copy; <?= date('Y') ?> वारी — Shrutika Nutrilite Foods PVT LTD. All rights reserved.
        </div>
        <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
          Made with <span style="color:#e25555">&#9829;</span> in Maharashtra, India
        </div>
      </div>
    </div>
  </div>
</footer>
