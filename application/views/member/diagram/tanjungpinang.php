<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<body>
    <div class="container">
        <div class="row row-cols-4">
            <button onclick="location.href='../home'" type="button" class="btn btn-block btn-primary">KEMBALI</button>

            <div class="col">
                <div id="tanjungpinang"></div>

            </div>

        </div>
    </div>

    <br>
    <!-- Main content -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nilai Amanah</th>
                <th>Nilai Kompeten</th>
                <th>Nilai Harmonis</th>
                <th>Nilai Loyal</th>
                <th>Nilai Adaptif</th>
                <th>Nilai Kolab</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <th>
                    <div class="amanah"></div>
                </th>
                <th>
                    <div class="kompeten"></div>
                </th>
                <th>
                    <div class="harmonis"></div>
                </th>
                <th>
                    <div class="loyal"></div>
                </th>
                <th>
                    <div class="adaptif"></div>
                </th>
                <th>
                    <div class="kolab"></div>
                </th>
            </tr>


        </tbody>
    </table>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>

    <script>
        Morris.Bar({
            element: 'tanjungpinang',
            data: <?php echo $data; ?>,
            xkey: 'created_at',
            ykeys: ['nilai_amanah', 'nilai_kompeten', 'nilai_harmonis', 'nilai_loyal', 'nilai_adaptif', 'nilai_kolab'],
            labels: ['Nilai Amanah', 'Nilai Kompeten', 'Nilai Harmonis', 'Nilai Loyal', 'Nilai Adaptif', 'Nilai Kolab'],
            hideHover: true,
            grid: true,
            resize: true,
            xLabels: "month",

        });
    </script>
    </script>
</body>