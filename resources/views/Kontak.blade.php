@extends('layouts.template')

@section('judul')

@section('main')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <p>Hubungi Kami</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jl. Mayjend Sutoyo No.35, Pekauman, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52125<br>
                <a href="https://maps.app.goo.gl/DWFTs9hVvss1HhdY7" target="_blank">Lihat di Google Maps</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Telephone</h3>
              <p><a href="tel:+6285642224614">+6285642224614</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:chaerunnisasalsabila424@gmail.com">chaerunnisasalsabila424@gmail.com</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-whatsapp"></i>
              <h3>WhatsApp</h3>
              <p><a href="https://wa.me/6285642224614">+6285642224614</a></p>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-6">
        <form action="forms/contact.php" method="post" class="php-email-form">
          <div class="row gy-4">
            <!-- Kolom formulir kontak -->
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="col-md-12">
              <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <div class="col-md-12">
              <textarea name="message" rows="6" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6">
        <form action="forms/contact.php" method="post" class="php-email-form">
          <div class="row gy-4">
            <!-- Formulir kontak disini -->
          </div>
        </form>
      </div>

    </div>

  </div>

</section><!-- End Contact Section -->

<!-- ======= End ======= -->
@endsection

