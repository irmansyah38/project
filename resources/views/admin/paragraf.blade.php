@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-2 mb-4">Paragraf</h1>
                <div class="w-100 mx-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col ">Urutan Paragraf</th>
                                <th scope="col ">Paragraf</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($paragrafs as $paragraf)
                                <tr>
                                    <td class="text-center">
                                        @if ($paragraf['id'] == 1)
                                            Kiri
                                        @endif
                                        @if ($paragraf['id'] == 2)
                                            Kanan
                                        @endif
                                    </td>
                                    <td>
                                        <div style="width: 400px; height: 200px;" class="overflow-hidden mx-auto">
                                            {!! $paragraf['paragraf'] !!}
                                        </div>
                                    </td>
                                    <td class="text-center"><a href="/paragraf/{{ $paragraf['id'] }}"
                                            class="btn btn-warning">Edit</a></td>
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
