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
                <div id="dumai"></div>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>

    <script>
        Morris.Bar({
            element: 'dumai',
            data: <?php echo $data; ?>,
            xkey: 'cabang',
            ykeys: ['nilai_amanah', 'nilai_kompeten', 'nilai_harmonis', 'nilai_loyal', 'nilai_adaptif', 'nilai_kolab', 'nilai_total'],
            labels: ['Nilai Amanah', 'Nilai Kompeten', 'Nilai Harmonis', 'Nilai Loyal', 'Nilai Adaptif', 'Nilai Kolab', 'Nilai Total'],
            hideHover: true,
            grid: true,
            resize: true
        });
    </script>
    </script>
</body>