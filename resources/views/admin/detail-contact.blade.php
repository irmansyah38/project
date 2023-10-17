@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-2 mb-4">Detail pesan</h1>
                <div class="mx-auto border p-3 rounded shadow" style="width: 90%">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="mb-4">{{ $contact->subject }}</h3>
                            <p class="text-body-secondary">Nama : {{ $contact->name }}</p>
                            <p class="text-body-secondary">Email : {{ $contact->email }}</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-justify">{{ $contact->message }}</p>
                        </div>
                    </div>
                    <a  class="btn btn-primary mt-3" href="/contact" role="button">Kembali</a>
                </div>
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
