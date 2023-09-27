<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/admin">Dasboard</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </div>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mt-1">Logout</button>
            </form>
        </li>

    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link" href="/foto-curug">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Foto Curug
                    </a>
                    <a class="nav-link" href="/paragraf">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Paragraf
                    </a>
                    <a class="nav-link" href="/FAQ">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        FAQ
                    </a>
                    <a class="nav-link" href="/harga">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Harga
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ $nama }}
            </div>
        </nav>
    </div>
