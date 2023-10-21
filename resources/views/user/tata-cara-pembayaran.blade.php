@extends('user.layout.template')

@section('main')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Tata Cara Pembayaran</li>
                </ol>
                <h2>Tata Cara Pembayaran</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <div class="container p-3 text-center">
            <img src="{{ asset('assets/img/tata.jpg') }}" alt="" style="max-width: 100%; min-width: 385px;">
        </div>
    </main><!-- End #main -->
@endsection
