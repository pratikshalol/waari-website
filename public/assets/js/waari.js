/**
 * Waari — Main JS
 * Shrutika Nutrilite Foods PVT LTD
 */

(function () {
  'use strict';

  /* ── Navbar scroll shadow ───────────────────────────── */
  const navbar = document.querySelector('.waari-navbar');
  if (navbar) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) {
        navbar.style.boxShadow = '0 4px 20px rgba(122,66,0,0.15)';
      } else {
        navbar.style.boxShadow = 'none';
      }
    });
  }

  /* ── Flash message auto-dismiss ────────────────────── */
  document.querySelectorAll('.waari-alert[data-auto-dismiss]').forEach(function (el) {
    setTimeout(function () {
      el.style.transition = 'opacity 0.5s';
      el.style.opacity = '0';
      setTimeout(function () { el.remove(); }, 500);
    }, 4000);
  });

  /* ── Admin sidebar mobile toggle ───────────────────── */
  const sidebarToggle = document.getElementById('sidebarToggle');
  const adminSidebar  = document.querySelector('.admin-sidebar');
  if (sidebarToggle && adminSidebar) {
    sidebarToggle.addEventListener('click', function () {
      adminSidebar.classList.toggle('open');
    });
    // close on outside click
    document.addEventListener('click', function (e) {
      if (!adminSidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
        adminSidebar.classList.remove('open');
      }
    });
  }

  /* ── Product category filter (client-side) ──────────── */
  const filterBtns = document.querySelectorAll('.category-filter-btn');
  const productCards = document.querySelectorAll('.product-card-wrapper');

  if (filterBtns.length && productCards.length) {
    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        filterBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        const cat = btn.dataset.category;
        productCards.forEach(function (card) {
          if (cat === 'all' || card.dataset.category === cat) {
            card.style.display = '';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }

  /* ── Gallery lightbox ───────────────────────────────── */
  const galleryItems = document.querySelectorAll('.gallery-item');
  if (galleryItems.length) {
    // Create modal
    const modal = document.createElement('div');
    modal.id = 'galleryModal';
    modal.style.cssText =
      'position:fixed;inset:0;background:rgba(0,0,0,0.92);z-index:9999;' +
      'display:none;align-items:center;justify-content:center;padding:1rem;';
    modal.innerHTML =
      '<button id="galleryModalClose" style="position:absolute;top:1rem;right:1.5rem;' +
      'background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;">&#x2715;</button>' +
      '<img id="galleryModalImg" src="" alt="" style="max-height:90vh;max-width:90vw;' +
      'border-radius:8px;box-shadow:0 0 60px rgba(0,0,0,0.5);">';
    document.body.appendChild(modal);

    galleryItems.forEach(function (item) {
      item.addEventListener('click', function () {
        const img = item.querySelector('img');
        if (img) {
          document.getElementById('galleryModalImg').src = img.src;
          modal.style.display = 'flex';
        }
      });
    });

    document.getElementById('galleryModalClose').addEventListener('click', function () {
      modal.style.display = 'none';
    });
    modal.addEventListener('click', function (e) {
      if (e.target === modal) modal.style.display = 'none';
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') modal.style.display = 'none';
    });
  }

  /* ── Image preview before upload ───────────────────── */
  document.querySelectorAll('input[type="file"][data-preview]').forEach(function (input) {
    input.addEventListener('change', function () {
      const previewId = input.dataset.preview;
      const preview   = document.getElementById(previewId);
      if (preview && input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
      }
    });
  });

  /* ── Confirm delete ─────────────────────────────────── */
  document.querySelectorAll('[data-confirm]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      const msg = el.dataset.confirm || 'Are you sure you want to delete this item?';
      if (!confirm(msg)) {
        e.preventDefault();
        e.stopPropagation();
      }
    });
  });

  /* ── Star rating display ────────────────────────────── */
  function renderStars(rating) {
    let html = '';
    for (let i = 1; i <= 5; i++) {
      html += i <= rating ? '&#9733;' : '&#9734;';
    }
    return html;
  }
  document.querySelectorAll('[data-stars]').forEach(function (el) {
    el.innerHTML = renderStars(parseInt(el.dataset.stars, 10));
  });

  /* ── Smooth scroll for anchor links ────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

})();
