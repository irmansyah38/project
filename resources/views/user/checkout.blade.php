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

    {{-- midtrans --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?= config('midtrans.client_key') ?>"></script>

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
                            <li>+62-8989-5402-99</li>
                            <li>curugcikoneng@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="row text-center">
                        <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Checkout</h3>
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


                        <div class="row mt-2 mb-5">
                            <p class="fw-bold">Tanggal: <span
                                    class="text-muted">{{ $transaksi->hari }}-{{ $transaksi->bulan }}-{{ $transaksi->tahun }}</span>
                            </p>
                            <button id="pay-button" class="btn text-white" style="background-color: #e43c5c;">Bayar
                                Sekarang</button>
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
            {{-- midtranso3 --}}
            <script type="text/javascript">
                // For example trigger on button clicked, or any time you need
                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function() {
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay("{{ $snapToken }}", {
                        onSuccess: function(result) {
                            /* You may add your own implementation here */
                            alert("payment success!");
                            window.location.href = "/invoice/{{ $transaksi->id }}";

                        },
                        onPending: function(result) {
                            /* You may add your own implementation here */
                            alert("wating your payment!");
                            console.log(result);
                        },
                        onError: function(result) {
                            /* You may add your own implementation here */
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                    })
                });
            </script>
</body>

</html>
