@extends('admin.layout.template')
@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-2 mb-4">Edit FAQ</h1>
                <div class="w-100 mx-auto ">
                    <form action="/FAQ" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <textarea class="form-control" name="question" id="question" rows="3">{{ $faq->question }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea id="editor" class="form-control" name="answer" id="answer">{{ $faq->answer }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
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
