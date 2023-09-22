@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-2 mb-4">FAQ</h1>
                @if (session()->has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session('success') }}</strong>

                    </div>
                @endif
                <a class="btn btn-primary" href="/FAQ/new" role="button">Buat Baru</a>
                <div class="w-100 mx-auto ">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col ">No</th>
                                <th scope="col ">Pertanyaan</th>
                                <th scope="col ">Jawaban</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $i = 1; ?>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>
                                        <div style="width: 300px; height: 150px;" class="overflow-hidden mx-auto">
                                            {{ $faq['question'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 300px; height: 150px;" class="overflow-hidden mx-auto">
                                            {!! $faq['answer'] !!}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/FAQ/{{ $faq['id'] }}"class="btn btn-warning">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/FAQ/delete/{{ $faq['id'] }}"class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
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
