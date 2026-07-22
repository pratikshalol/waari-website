<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0 text-dark-gur font-heading fw-bold">Manage Contact Information</h4>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white waari-form">
  <form action="<?= base_url('admin/content/contact/update') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="<?= esc($info['company_name'] ?? '') ?>" required>
      </div>

      <div class="col-md-6">
        <label>FSSAI License Number</label>
        <input type="text" name="fssai_number" class="form-control" value="<?= esc($info['fssai_number'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>Phone Number</label>
        <input type="text" name="phone" class="form-control" value="<?= esc($info['phone'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>WhatsApp Number</label>
        <input type="text" name="whatsapp" class="form-control" value="<?= esc($info['whatsapp'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>Support Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($info['email'] ?? '') ?>">
      </div>

      <div class="col-md-6">
        <label>Address Line 1</label>
        <input type="text" name="address_line1" class="form-control" value="<?= esc($info['address_line1'] ?? '') ?>">
      </div>

      <div class="col-md-6">
        <label>Address Line 2</label>
        <input type="text" name="address_line2" class="form-control" value="<?= esc($info['address_line2'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>City</label>
        <input type="text" name="address_city" class="form-control" value="<?= esc($info['address_city'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>State</label>
        <input type="text" name="address_state" class="form-control" value="<?= esc($info['address_state'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>Pincode</label>
        <input type="text" name="address_pincode" class="form-control" value="<?= esc($info['address_pincode'] ?? '') ?>">
      </div>

      <div class="col-12">
        <label>Business Operating Hours</label>
        <input type="text" name="business_hours" class="form-control" value="<?= esc($info['business_hours'] ?? '') ?>" placeholder="Mon - Sat: 9:00 AM - 6:00 PM">
      </div>

      <div class="col-md-4">
        <label>Facebook URL</label>
        <input type="url" name="facebook_url" class="form-control" value="<?= esc($info['facebook_url'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>Instagram URL</label>
        <input type="url" name="instagram_url" class="form-control" value="<?= esc($info['instagram_url'] ?? '') ?>">
      </div>

      <div class="col-md-4">
        <label>YouTube URL</label>
        <input type="url" name="youtube_url" class="form-control" value="<?= esc($info['youtube_url'] ?? '') ?>">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn-waari btn-waari-primary btn-lg">
          Update Contact Info <i class="fas fa-check ms-1"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
