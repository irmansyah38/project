@extends('user.layout.template')

@section('main')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>E-tiket</li>
                </ol>
                <h2>E-Tiket</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries" style="min-height: 400px;">
                        <h2 class="mb-4">Pembelian Tiket</h2>
                        <div class="w-75">
                            @auth
                                <form action="/E-Tiket" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                        <input type="number" class="form-control border border-2" name="jumlah_orang"
                                            id="jumlah_orang" aria-describedby="helpId" placeholder="minimal 1 dan maksimal 30"
                                            min="1" max="30" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Beli</button>
                                </form>
                            @else
                                <p class="text-center">Silahkan Login atau Sign up terlebih dahulu</p>
                            @endauth

                        </div>

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">
                        <h2>Daftar Tiket</h2>
                        <div>
                            @auth
                                <ul style="list-style: none;" class="text-center">
                                    @foreach ($barcodes as $barcode)
                                        <li>
                                            <div>
                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $barcode['id'] }}&choe=UTF-8"
                                                    class="" alt="...">
                                                <a href="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $barcode['id'] }}&choe=UTF-8"
                                                    download='barcode.jpg' class="btn btn-primary">Download</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada barcode karena ada belum login</p>
                            @endauth

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
