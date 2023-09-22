@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-2 mb-4">Edit Teks
                    @if ($paragraf->id == 1)
                        Kiri
                    @endif
                    @if ($paragraf->id == 2)
                        Kanan
                    @endif

                </h2>
                @if (session()->has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session('success') }}</strong>

                    </div>
                @endif
                <form action="/paragraf" method="post">
                    @csrf
                    <input type="number" class="form-control" name="id" id="id" value="{{ $paragraf->id }}"
                        hidden>
                    <div class="mb-3">
                        <textarea id="editor" class="form-control" name="paragraf" id="paragraf" rows="3" cols="4">{{ $paragraf->paragraf }}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
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
@endsection
