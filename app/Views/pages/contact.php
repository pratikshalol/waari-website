<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container page-header-content">
    <h1>Contact Us</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5 bg-light-amber">
  <div class="container py-3">
    <div class="row g-5">

      <!-- Contact Info Sidebar -->
      <div class="col-lg-5">
        <div class="p-4 bg-dark-gur text-white rounded-4 shadow-waari h-100">
          <h3 class="text-white mb-3" style="font-family: var(--font-heading);">Get in Touch</h3>
          <p class="text-white-50 mb-4">Have questions about our natural jaggery products or bulk orders? We're here to help.</p>

          <div class="d-flex gap-3 mb-4 align-items-flex-start">
            <div class="fs-4 text-warning"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <h6 class="text-warning mb-1">Company Address</h6>
              <p class="small text-white-50 mb-0">
                <strong><?= esc($contact_info['company_name'] ?? 'Shrutika Nutrilite Foods PVT LTD') ?></strong><br>
                <?= esc($contact_info['address_line1'] ?? 'Village Waari, Taluka Koregaon') ?><br>
                <?= esc($contact_info['address_city'] ?? 'Satara') ?>, <?= esc($contact_info['address_state'] ?? 'Maharashtra') ?> - <?= esc($contact_info['address_pincode'] ?? '415001') ?>
              </p>
            </div>
          </div>

          <div class="d-flex gap-3 mb-4 align-items-flex-start">
            <div class="fs-4 text-warning"><i class="fas fa-phone"></i></div>
            <div>
              <h6 class="text-warning mb-1">Phone / WhatsApp</h6>
              <p class="small text-white-50 mb-0">
                Phone: <a href="tel:<?= esc($contact_info['phone'] ?? '+919876543210') ?>" class="text-white"><?= esc($contact_info['phone'] ?? '+91 98765 43210') ?></a><br>
                WhatsApp: <a href="https://wa.me/<?= esc(preg_replace('/\D/', '', $contact_info['whatsapp'] ?? '919876543210')) ?>" target="_blank" class="text-white"><?= esc($contact_info['whatsapp'] ?? '+91 98765 43210') ?></a>
              </p>
            </div>
          </div>

          <div class="d-flex gap-3 mb-4 align-items-flex-start">
            <div class="fs-4 text-warning"><i class="fas fa-envelope"></i></div>
            <div>
              <h6 class="text-warning mb-1">Email Address</h6>
              <p class="small text-white-50 mb-0">
                <a href="mailto:<?= esc($contact_info['email'] ?? 'hello@waari.in') ?>" class="text-white"><?= esc($contact_info['email'] ?? 'hello@waari.in') ?></a>
              </p>
            </div>
          </div>

          <div class="d-flex gap-3 mb-4 align-items-flex-start">
            <div class="fs-4 text-warning"><i class="fas fa-clock"></i></div>
            <div>
              <h6 class="text-warning mb-1">Business Hours</h6>
              <p class="small text-white-50 mb-0">
                <?= esc($contact_info['business_hours'] ?? 'Monday - Saturday: 9:00 AM - 6:00 PM') ?>
              </p>
            </div>
          </div>

          <hr class="border-secondary opacity-50 my-4">

          <div>
            <span class="small text-warning me-2">FSSAI License:</span>
            <span class="badge bg-amber text-white"><?= esc($contact_info['fssai_number'] ?? '11223344556677') ?></span>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-7">
        <div class="card border-warning rounded-4 shadow-sm p-4 bg-white waari-form">
          <h3 class="text-dark-gur mb-2" style="font-family: var(--font-heading);">Send Us a Message</h3>
          <p class="text-muted mb-4">Fill out the form below and our team will get back to you within 24 hours.</p>

          <form action="<?= base_url('contact/submit') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="row g-3">
              <div class="col-md-6">
                <label>Your Full Name *</label>
                <input type="text" name="name" class="form-control" value="<?= old('name', session()->get('user_name') ?? '') ?>" required>
              </div>

              <div class="col-md-6">
                <label>Email Address *</label>
                <input type="email" name="email" class="form-control" value="<?= old('email', session()->get('user_email') ?? '') ?>" required>
              </div>

              <div class="col-md-6">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>" placeholder="+91 98765 43210">
              </div>

              <div class="col-md-6">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" value="<?= old('subject') ?>" placeholder="General Enquiry / Bulk Order">
              </div>

              <div class="col-12">
                <label>Your Message *</label>
                <textarea name="message" class="form-control" rows="5" placeholder="How can we help you?" required><?= old('message') ?></textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn-waari btn-waari-primary btn-lg w-100">
                  Send Message <i class="fas fa-paper-plane ms-2"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
