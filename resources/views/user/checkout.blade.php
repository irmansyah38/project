<!doctype html>
<html lang="en">

<head>
    <title>Checkout</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .tombol {
            display: block;
            max-width: 60%;
            min-width: 300px;
        }
    </style>

</head>


<body>

    <div class="card">
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="far fa-building text-danger fa-6x float-start"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">

                        <ul class="list-unstyled float-end">
                            <li style="font-size: 25px; color: #e43c5c;">Curug Cikoneng</li>
                            <li>Jl. Curug Cikoneng <br>Puraseda, Kec. Leuwiliang
                            <li>+62-8989-5402-88</li>
                            <li>curugcikoneng@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="row text-center">
                        <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Pembayaran</h3>
                    </div>

                    <div class="text-center">
                        <img src="{{ $qr }}" alt="qris">
                    </div>

                    <div class="row mx-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Jumlah Orang</th>
                                    <th scope="col">Rp. {{ $harga }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $transaksi->qty }}</td>
                                    <td><i class="fas fa-dollar-sign"></i>Rp. {{ $transaksi->total_price }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xl-8" style="margin-left:60px">
                                <p class="float-end"
                                    style="font-size: 30px; color: #e43c5c; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                                    Total:
                                    <span><i class="fas fa-dollar-sign"></i>Rp. {{ $transaksi->total_price }}</span>
                                </p>
                            </div>
                        </div>


                        <div class="mt-2">
                            <p class="fw-bold">Tanggal: <span
                                    class="text-muted">{{ $transaksi->hari }}-{{ $transaksi->bulan }}-{{ $transaksi->tahun }}</span>
                            </p>
                            {{-- <a class="btn text-white mb-3" href="{{ $qr }}" role="button"
                                style="background-color: #e43c5c;" id="downloadButton">Download QR</a> --}}
                        </div>
                        <div>
                            <button id="downloadButton" class="mx-auto tombol btn text-white mb-3 d-block" style="background-color: #e43c5c;"><strong>Download QR</strong></button>
                            <a class="mx-auto btn text-white d-block tombol " href="/E-Tiket"
                                style="background-color: #e43c5c;">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
                integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
            </script>

            <script>
                document.getElementById("downloadButton").addEventListener('click', async function() {
                        const imageUrl = "{{$qr}}"; // Ganti URL_GAMBAR dengan URL gambar yang ingin Anda unduh

                        try {
                            const response = await fetch(imageUrl);
                            if (response.ok) {
                                const blob = await response.blob();
                                const url = window.URL.createObjectURL(blob);

                                const a = document.createElement('a');
                                a.href = url;
                                a.download ='qrcode.jpg'; // Ganti 'gambar.jpg' dengan nama file yang Anda inginkan
                                a.style.display = 'none';
                                document.body.appendChild(a);

                                a.click();

                                window.URL.revokeObjectURL(url);
                            } else {
                                console.error('Gagal mengunduh gambar');
                            }
                        } catch (error) {
                            console.error('Terjadi kesalahan:', error);
                        }
                    });
            </script>


</body>

</html>
