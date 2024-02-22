@extends('layout.admin')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <h2 class="text-center font-bold mb-3">Sistem Admin Data Siswa</h2>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalsiswa }}</h3>

                                <p>Jumlah Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <a href="siswa" class="small-box-footer">More info 
                            <i
                                class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalsiswalaki }}<sup style="font-size: 20px"></sup></h3>

                                <p>Siswa Laki-Laki</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalsiswaperempuan }}</h3>

                                <p>Siswa Perempuan</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-person-dress"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalkota }}</h3>

                                <p>Jumlah Kota</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-city"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                    <!-- PIE CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                        <h3 class="card-title">Presentase Berdasarkan Jenis Kelamin </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>

                        </div>
                        <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    </div>
                    <!-- /.col (LEFT) -->

                    <div class="col-md-6">
                    

                    <div class="card card-danger">
                        <div class="card-header">
                        <h3 class="card-title">Presentase berdasarkan Asal Kota Siswa</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>

                        </div>
                        <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->

                    <div class="col-md-12">
                        <!-- Bar chart -->
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="far fa-chart-bar"></i>
                              Jumlah Siswa Berdasarkan Tahun Kelahiran
                            </h3>
            
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <canvas id="barChart" style="height: 300px;"></canvas>
                          </div>
                          <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
                    </div> 
                    <!--/.col -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div> <!-- /.content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('donutChart').getContext('2d');
        let ctx2 = document.getElementById('pieChart').getContext('2d');

        // mengambil variabel $dataChart dari PHP lalu mengubah ke format JSON dan menghasilkan array dari objek, dimana setiap objek memiliki properti kota dan total
        let dataChart = {!! json_encode($dataChart) !!};
        // membuat array baru dari dataChart. fungsi panah mengambil objek tersebut (e) dan mengembalikan sting yang menggabungkan e.kota dan e.total dalam format "kota (total)" ex: "Jakarta (10)"
        let labels = dataChart.map(e => `${e.kota} (${e.total})`);
        let cityChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: {!! json_encode(array_column($dataChart, 'total')) !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(99, 255, 132, 0.2)',
                        'rgba(235, 162, 54, 0.2)',
                        'rgba(86, 206, 255, 0.2)',
                        'rgba(192, 75, 192, 0.2)',
                        'rgba(102, 153, 255, 0.2)',
                        'rgba(159, 64, 255, 0.2)',
                        'rgba(132, 99, 255, 0.2)',
                        'rgba(162, 54, 235, 0.2)',
                        'rgba(206, 86, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(99, 255, 132, 1)',
                        'rgba(235, 162, 54, 1)',
                        'rgba(86, 206, 255, 1)',
                        'rgba(192, 75, 192, 1)',
                        'rgba(102, 153, 255, 1)',
                        'rgba(159, 64, 255, 1)',
                        'rgba(132, 99, 255, 1)',
                        'rgba(162, 54, 235, 1)',
                        'rgba(206, 86, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });

        let genderChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $totalsiswalaki }}, {{ $totalsiswaperempuan }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(99, 255, 132, 0.2)',
                        'rgba(235, 162, 54, 0.2)',
                        'rgba(86, 206, 255, 0.2)',
                        'rgba(192, 75, 192, 0.2)',
                        'rgba(102, 153, 255, 0.2)',
                        'rgba(159, 64, 255, 0.2)',
                        'rgba(132, 99, 255, 0.2)',
                        'rgba(162, 54, 235, 0.2)',
                        'rgba(206, 86, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(99, 255, 132, 1)',
                        'rgba(235, 162, 54, 1)',
                        'rgba(86, 206, 255, 1)',
                        'rgba(192, 75, 192, 1)',
                        'rgba(102, 153, 255, 1)',
                        'rgba(159, 64, 255, 1)',
                        'rgba(132, 99, 255, 1)',
                        'rgba(162, 54, 235, 1)',
                        'rgba(206, 86, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });

        var ctbar = document.getElementById('barChart').getContext('2d');
        var yearChart = new Chart(ctbar, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelsYear) !!},
                datasets: [{
                    label: 'Jumlah Anak',
                    data: {!! json_encode($dataTotalYear) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


@endsection
