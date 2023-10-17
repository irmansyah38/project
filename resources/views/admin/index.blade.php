@extends('admin.layout.template')
@section('container')
  <script>
    window.onload = function() {

      var chartTahun = new CanvasJS.Chart("chartTahun", {
        title: {
          text: "Penjualan dalam setahun"
        },
        axisY: {
          title: "Jumlah Penjualan"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataChartTahun, JSON_NUMERIC_CHECK); ?>
        }]
      });

      var chartBulan = new CanvasJS.Chart("chartBulan", {
        title: {
          text: "Penjualan dalam sebulan"
        },
        axisY: {
          title: "Jumlah Penjualan"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataChartBulan, JSON_NUMERIC_CHECK); ?>
        }]
      });

      chartTahun.render();
      chartBulan.render();

    }
  </script>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div id="bulan">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-area me-1"></i>
              Grafik penjualan tiket {{ $date['year'] }}
            </div>
            <div class="card-body p-1">
              <div id="chartTahun" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div id="tahun">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-area me-1"></i>
              Grafik penjualan tiket bulan {{ $date['month'] }}
            </div>
            <div class="card-body p-1">
              <div id="chartBulan" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pembelian Tiket Hari Ini
          </div>
          <div class="card-body" style="min-height: 100px;">
            @if (count($transaksis) == 0)
              <h3 class="text-center">Tidak ada pembelian tiket hari ini</h3>
            @else
              <table id="datatablesSimple" class="table text-center">
                <thead>
                  <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Jumlah Orang</th>
                    <th>Tiket Dibuat</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksis as $transaksi)
                    <tr>
                      <td>{{ $transaksi['user_id'] }}</td>
                      <td>{{ $transaksi['name'] }}</td>
                      <td>{{ $transaksi['qty'] }}</td>
                      <td>{{ $transaksi['created_at'] }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {!! $transaksis->withQueryString()->links('pagination::bootstrap-5') !!}
            @endif
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Daftar Tiket Yang Tersedia
          </div>
          <div class="card-body">
            <table id="datatablesSimple" class="table text-center">
              <thead>
                <tr>
                  <th>Nomor Tiket</th>
                  <th>ID User</th>
                  <th>Jumlah Orang</th>
                  <th>Tiket Dibuat</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataBarcodes as $dataBarcode)
                  <tr>
                    <td>{{ $dataBarcode->id }}</td>
                    <td>{{ $dataBarcode->user_id }}</td>
                    <td>{{ $dataBarcode->jumlah_orang }}</td>
                    <td>{{ $dataBarcode->created_at }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {!! $dataBarcodes->withQueryString()->links('pagination::bootstrap-5') !!}
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
