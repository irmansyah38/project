@extends('user.layout.template')

@section('main')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>E-Tiket</li>
                </ol>
                <h2>E-Tiket</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8 entries" style="min-height: 400px;">
                        <div class="w-75">
                            <h2 class="mb-4">Pembelian Tiket</h2>
                            <p>Harga Tiket <strong>Rp. {{ $harga }}</strong></p>
                            @auth
                                <form action="/E-Tiket" method="post">
                                    @csrf
                                    <input type="number" name="user_id" value="{{ $data->id }}" hidden>
                                    <input type="text" name="name" value="{{ $data->name }}" hidden>
                                    <input type="text" name="phone" value="{{ $data->nomor }}" hidden>
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Jumlah orang dalam satu qrcode</label>
                                        <input type="number" class="form-control border border-2 w-75" name="qty"
                                            id="qty" aria-describedby="helpId" placeholder="minimal 1 dan maksimal 30"
                                            min="1" max="30" required>
                                    </div>

                                    <button type="submit" class="btn d-inline-block text-white"
                                        style="background-color: #e43c5c;">Pesan
                                        Tiket</button>
                                </form>
                            @else
                                <p class="text-center">Silahkan Login atau Sign up terlebih dahulu</p>
                            @endauth

                        </div>

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4 ">
                        <h2>Daftar Tiket</h2>
                        <div>
                            @auth
                                <ul style="list-style: none;">
                                    @foreach ($barcodes as $barcode)
                                        <li>
                                            <div class="mx-auto mb-3 text-center border border-3 rounded ">
                                                <h5 class="text-white mx-auto rounded p-1" style="background-color: #e43c5c;">
                                                    <strong>SCAN ME
                                                        <br><span
                                                            style="font-size: 0.9rem;">{{ $barcode->jumlah_orang }}</span></strong>
                                                </h5>

                                                <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{ $barcode->id }}&choe=UTF-8"
                                                    class="" alt="Barcode" style="margin: 0;">
                                                <a href="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl={{ $barcode->id }}&choe=UTF-8"
                                                    download='barcode.jpg' class="btn d-block text-white"
                                                    style="background-color: #e43c5c;">Click Me For Zoom</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                {!! $barcodes->withQueryString()->links('pagination::bootstrap-5') !!}
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
