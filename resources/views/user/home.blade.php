@extends('user.layout.template')

@section('main')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            @auth
                <h3 style="font-size: 1.3rem;">Hi <strong>{{ $data->name }}</strong></h3>
            @else
            @endauth
            <h3>Welcome to <strong>Curug Cikoneng</strong></h3>
            @auth
                <br>
                <a href="/E-Tiket" class="btn-get-started scrollto">Beli Tiket</a>
            @endauth
            <!-- <h1>We're Creative Agency</h1>
                                                         <h2>We are team of talented designers making websites with Bootstrap</h2> -->
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Informasi</h2>
                    <h3>Curug <span>Cikoneng</span></h3>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <div style="font-size: 1.25rem; text-align: justify; text-indent: 1rem">
                            {!! $paragraf[0]['paragraf'] !!}
                        </div>
                        <div style="font-size: 1.25rem; text-align: justify; text-indent: 1rem">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div style="font-size: 1.25rem; text-align: justify; text-indent: 1rem">
                            {!! $paragraf[1]['paragraf'] !!}
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Foto</h2>
                    <h3>Foto <span>Curug Cikoneng</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-curug">Curug</li>
                            <li data-filter=".filter-fasilitas">Fasilitas</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $image->kategori }}">
                            <img src="{{ asset('storage/images') . '/' . $image->nama }}" alt="" width="400px"
                                height="300px">
                            <div class="portfolio-info">
                                <h4>{{ $image->kategori }}</h4>
                                <p>{{ $image->kategori }}</p>
                                <a href="{{ asset('storage/images') . '/' . $image->nama }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link" title="{{ $image->kategori }}"><i
                                        class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->



        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <h3>Frequently Asked <span>Questions</span></h3>
                </div>

                <ul class="faq-list">

                    @foreach ($faqs as $faq)
                        <li>
                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $faq['id'] }} ">
                                {{ $faq['question'] }}<i class="bi bi-chevron-down icon-show"></i><i
                                    class="bi bi-chevron-up icon-close"></i>
                            </div>
                            <div id="faq{{ $faq['id'] }}" class="collapse" data-bs-parent=".faq-list">
                                {!! $faq['answer'] !!}
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </section><!-- End F.A.Q Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3>Contact <span>Us</span></h3>

                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.8622693884563!2d106.60035555956456!3d-6.663985191149123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d7dffe8f8b69%3A0x75c1842d17779215!2sRumah%20Curug%20Cikoneng!5e0!3m2!1sen!2sid!4v1694105711898!5m2!1sen!2sid"
                        frameborder="0" allowfullscreen></iframe>
                </div>


                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jl. Curug Cikoneng, Puraseda, Kec. Leuwiliang, Kabupaten Bogor, Jawa Barat 16640</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>curugcikoneng@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+62 8989 5402 99</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
