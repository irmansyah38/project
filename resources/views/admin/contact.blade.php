@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-2 mb-4">Pesan Pengunjung</h1>
                @if (session()->has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session('success') }}</strong>

                    </div>
                @endif
                <div class="table-responsive w-100">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col ">No</th>
                                <th scope="col ">Nama</th>
                                <th scope="col ">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($contacts as $i => $contact)
                                <tr class="">
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td><a href="/contact/detail/{{ $contact->id }}" class="btn btn-primary"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i></a></td>
                                    <td><a href="/contact/delete/{{ $contact->id }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
