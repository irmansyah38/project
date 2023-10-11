<!-- ======= Header ======= -->
<header id="header" class="fixed-top @if ($title === 'E-Tiket') header-inner-pages @endif">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">Curug Cikoneng</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="/E-Tiket">E-Tiket</a></li>
                <li><a class="nav-link scrollto " href="https://app.doku.com/retail/merchant/CurugCikonengUMKM"
                        target="__blank">Makanan &
                        Souvenir</a></li>
                <li><a class="nav-link scrollto" href="/tata-cara-pembayaran">Tata Cara Pembayaran</a></li>
                @auth
                    <li>
                        <form action="/logout" method="post" class="nav-link scrollto">
                            @csrf
                            <button type="submit" class="btn btn-danger ms-3">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a class="nav-link scrollto" href="/login">Login</a></li>
                    <li><a class="nav-link scrollto" href="/register">Sign Up</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
