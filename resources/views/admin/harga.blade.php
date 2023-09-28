@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="w-100" style="height: 50%; margin-top: -150px;">
                    <div class="row">
                        <div class="col-md d-flex justify-content-center align-items-center">
                            <div class="shadow rounded p-2 border border-3 w-100 mb-3">
                                <h2>Ubah Harga</h2>
                                @if (session()->has('success'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ session('success') }}</strong>

                                    </div>
                                @endif
                                <form action="/harga" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="number" class="form-control w-75 border border-3" name="harga"
                                            id="harga" aria-describedby="helpId" placeholder="" required
                                            value="{{ $harga->harga }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center align-items-center">
                            <div class="shadow rounded p-2 border border-3">
                                <h4 class="mt-2 mb-4">Harga tiket untuk satu orang
                                    Rp.<strong>{{ $harga->harga }}</strong>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col">
                        <h2>Ubah Harga</h2>
                        @if (session()->has('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ session('success') }}</strong>

                            </div>
                        @endif
                        <form action="/harga" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control w-75 border border-3" name="harga"
                                    id="harga" aria-describedby="helpId" placeholder="" required
                                    value="{{ $harga->harga }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                    <div class="col">
                        <div class="w-100 mx-auto ">
                            <h4 class="mt-2 mb-4">Harga tiket untuk satu orang Rp.<strong>{{ $harga->harga }}</strong></h4>
                        </div>
                    </div>
                </div> --}}
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a>Privacy Policy</a>
                        &middot;
                        <a>Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
