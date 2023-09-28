@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <h2>Tambah Foto</h2>
                    <div class="col-xl-4 mb-3">
                        @if (session()->has('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ session('success') }}</strong>

                            </div>
                        @endif

                        <form action="/foto-curug" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="kategori" class="form-label">Kategori</label>
                                <br>
                                <small id="helpId" class="form-text text-muted">Pilih salah satu</small>
                                <select class="form-select form-select-lg" name="kategori" id="kategori" required>
                                    <option value="curug">Curug</option>
                                    <option value="fasilitas">Fasilitas</option>
                                </select>
                            </div>



                            <div class="mb-3">
                                <label for="image" class="form-label">Choose file</label>
                                <input type="file" class="form-control" name="image" id="image" placeholder=""
                                    aria-describedby="fileHelpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                    <div class="col-xl-8">
                        <div class="table-responsive w-75 mx-auto">
                            <h2>Daftar Foto</h2>
                            @if (session()->has('successDelete'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('successDelete') }}</strong>

                                </div>
                            @endif
                            @if (session()->has('errorDelete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('errorDelete') }}</strong>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Foto</th>
                                        <th scope="col">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr class="">
                                            <td class="text-center"><img src="curug/{{ $image['nama'] }}"
                                                    style="width: 200px; height: 150px;">
                                            </td>
                                            <td><a href="/foto-curug/{{ $image->id }}"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                            {{-- <td>
                                                <form method="post"
                                                    action="{{ route('foto-curug.destroy', $image['id']) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {!! $images->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>


                    </div>
                </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
