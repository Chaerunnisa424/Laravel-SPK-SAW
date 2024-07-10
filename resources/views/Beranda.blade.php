@extends('layouts.template')

@section('judul')
Home
@endsection

@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Rekomendasi Tempat Kost</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Kota Tegal</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#Tentang" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span></span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('tema/img/logologo.png')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection

@section('main')


<main id="main">
<!-- ======= About Section ======= -->
<section id="Tentang" class="Tentang">
    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h2 data-aos="fade-up">Tentang Easy Kost</h2>
            <p data-aos="fade-up" data-aos-delay="100" style="text-align: justify; line-height: 2;">
                Easy Kost hadir dengan misi untuk menyederhanakan proses pencarian kost bagi mahasiswa. Kami tidak hanya menyediakan berbagai pilihan kost dengan beragam fasilitas dan harga, tetapi juga menawarkan pengalaman pengguna yang mulus melalui teknologi canggih dalam Sistem Pendukung Keputusan (SPK).
              </p>

            <div class="text-center text-lg-start" data-aos="fade-up" data-aos-delay="200">
              <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            </div>
          </div>
        </div>

        {{-- <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('style/images/logo.png') }}" class="img-fluid" alt="Logo Easy Kost">
        </div> --}}

      </div>
    </div>
  </section><!-- End About Section -->


<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <P>Kost Terbaik</P>
        <br>
        <h2> Kota Tegal</h2>
      </header>

      <div class="row gy-4" data-aos="fade-left">

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <h3 style="color: #000000; border-bottom: 3px solid #000000; margin-bottom: 10px;">Kost Cemara Tipe A</h3><br>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><strong>Fasilitas Kamar:</strong>
                            <li>AC</li>
                            <li>Kasur</li>
                            <li>Meja</li>
                            <li>Lemari Baju</li>
                    </li>
                    <li><strong>Fasilitas Kamar Mandi:</strong>
                            <li>K. Mandi Dalam</li>
                            <li>Kloset Duduk</li>
                    </li>
                    <li><strong>Biaya Bulanan:</strong></li>
                    <li>Rp1.300.000</li>
                    <li><strong>Sisa Kamar:</strong></li>
                    <li> Banyak tempat</li>
                    <li><strong>Rate:</strong> 4.9</li>
                </ul>
                <a href="https://mamikos.com/room/kost-tegal-kost-campur-eksklusif-kost-cemara-kota-tegal-1?redirection_source=landing%20area" class="btn-buy">Selengkapnya</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <h3 style="color: #000000; border-bottom: 3px solid #000000; margin-bottom: 10px;">Kost Situbondo Margadana</h3><br>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><strong>Fasilitas Kamar:</strong>
                            <li>Kasur</li>
                            <li>Lemari Baju</li>
                            <li>Ventilasi</li>
                            <li>Kipas Angin</li>
                            <li>Bantal</li>
                    </li>
                    <li><strong>Fasilitas Kamar Mandi:</strong>
                            <li>K. Mandi Dalam</li>
                            <li>Kloset Jongkok</li>
                            <li>Ember mandi</li>
                            <li>Bak mandi</li>
                    </li>
                    <li><strong>Biaya Bulanan:</strong></li>
                    <li>Rp 450.000</li>
                    <li><strong>Sisa Kamar:</strong> 3</li>
                    <li><strong>Rate:</strong> 4.7</li>
                </ul>
                <a href="https://mamikos.com/room/kost-kota-tegal-kost-putri-murah-kost-situbondo-margadana-tegal-1?redirection_source=list%20kos%20result" class="btn-buy">Selengkapnya</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <h3 style="color: #000000; border-bottom: 3px solid #000000; margin-bottom: 10px;">Kost Zaeni Margadana</h3><br>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><strong>Fasilitas Kamar:</strong>
                            <li>Kasur</li>
                            <li>Lemari Baju</li>
                            <li>Ventilasi</li>
                            <li>Kipas Angin</li>
                            <li>Bantal</li>
                            <li>Ventilasi</li>
                    </li>
                    <li><strong>Fasilitas Kamar Mandi:</strong>
                            <li>K. Mandi Dalam</li>
                            <li>Kloset Jongkok</li>
                            <li>Ember mandi</li>
                            <li>Bak mandi</li>
                    </li>
                    <li><strong>Biaya Bulanan:</strong></li>
                    <li>Rp 500.000</li>
                    <li><strong>Sisa Kamar:</strong> 2</li>
                    <li><strong>Rate:</strong> 4.8</li>
                </ul>
                <a href="https://mamikos.com/room/kost-kota-tegal-kost-putri-murah-kos-putri-neni-margadana-tegal-2?redirection_source=list%20kos%20result" class="btn-buy">Selengkapnya</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <h3 style="color: #000000; border-bottom: 3px solid #000000; margin-bottom: 10px;">Kost Permata</h3><br>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><strong>Fasilitas Kamar:</strong>
                            <li>Kasur</li>
                            <li>Lemari Baju</li>
                            <li>Ventilasi</li>
                            <li>Kipas Angin</li>
                            <li>Bantal</li>
                            <li>Ventilasi</li>
                            <li>TV</li>
                    </li>
                    <li><strong>Fasilitas Kamar Mandi:</strong>
                            <li>K. Mandi Dalam</li>
                            <li>Kloset Jongkok</li>
                            <li>Ember mandi</li>
                    </li>
                    <li><strong>Biaya Bulanan:</strong></li>
                    <li>Rp 800.000</li>
                    <li><strong>Sisa Kamar:</strong> 5</li>
                    <li><strong>Rate:</strong> 5.0</li>
                </ul>
                <a href="https://mamikos.com/room/kost-kota-tegal-kost-putra-murah-kost-permata-tegal-selatan-tegal?redirection_source=list%20kos%20result" class="btn-buy">Selengkapnya</a>
            </div>
        </div>


<!-- ======= Review Konsumen ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-emoji-smile"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1" class="purecounter"></span>
            <p>Konsumen yang suka</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
            <p>Rating</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-headset" style="color: #15be56;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pelayanan</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-people" style="color: #bb0852;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="1" class="purecounter"></span>
            <p></p>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- End Review konsumen -->

<!-- ======= Testimonial Konsumen ======= -->


</section><!-- End Testimonials Section -->

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

@endsection
