<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KRT</title>


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>


<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('Contents')
            <!-- Menambahkan elemen canvas untuk grafik -->

        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template/dist/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('template/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Skrip untuk menginisialisasi dan membuat grafik -->
    <script>
        $(document).ready(function() {
            // Fungsi untuk menginisialisasi data bulanan
            function initializeMonthlyData() {
                var data = {
                    totalAmount: new Array(12).fill(0),
                    totalIncome: new Array(12).fill(0),
                    totalExpenses: new Array(12).fill(0)
                };
                return data;
            }

            // Ambil data dari tabel
            var monthlyData = initializeMonthlyData();
            $('#transactionTable tr').each(function() {
                var transaction = $(this).find('.column-transaction').text().trim();
                var date = new Date($(this).find('.column-date').text().trim());
                var amount = parseFloat($(this).find('.column-amount').text().trim());

                var month = date.getMonth(); // Mendapatkan bulan dari tanggal (0-11)

                // Hitung total saldo, pendapatan, dan pengeluaran
                monthlyData.totalAmount[month] += amount;
                if (transaction.toLowerCase() === 'income') {
                    monthlyData.totalIncome[month] += amount;
                } else if (transaction.toLowerCase() === 'expense') {
                    monthlyData.totalExpenses[month] += amount;
                }
            });

            // Labels untuk bulan
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            // Inisialisasi grafik
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Balance',
                        data: monthlyData.totalAmount,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Income',
                        data: monthlyData.totalIncome,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Expenses',
                        data: monthlyData.totalExpenses,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
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
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateRowVisibility() {
                var rowCount = $('#rowCount').val();
                $('#transactionTable tr').show();
                if (rowCount !== 'All') {
                    $('#transactionTable tr:gt(' + (rowCount - 1) + ')').hide();
                }
            }

            $('#toggleTransaction').change(function() {
                $('.column-transaction').toggle(this.checked);
            });
            $('#toggleDate').change(function() {
                $('.column-date').toggle(this.checked);
            });
            $('#toggleAmount').change(function() {
                $('.column-amount').toggle(this.checked);
            });
            $('#toggleAction').change(function() {
                $('.column-action').toggle(this.checked);
            });
            $('#rowCount').change(function() {
                updateRowVisibility();
            });

            // Initial row visibility
            updateRowVisibility();
        });
    </script>
</body>

</html>