<div class="container">
  <h1>Upload Data</h1>
  <form method="post" class="form-inline" action="<?php echo base_url("member/rapor/form"); ?>" enctype="multipart/form-data">
    <div class="form-group mb-2">

      <small><a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>||<a href="<?php echo base_url("member/rapor/"); ?>">Kembali</a></small>
      <input type="file" class="form-control-file" id="file" name="file">

    </div>
    <input type="submit" name="preview" value="preview" class="btn btn-success btn-sm">

  </form>

  <?php
  if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
    if (isset($upload_error)) { // Jika proses upload gagal
      echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
      die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='" . base_url("member/rapor/import") . "'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    all data Required <span id='jumlah_kosong'></span> data not empty.
    </div>";

    echo "<table border='1' class='table table-hover' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Address</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach ($sheet as $row) {
      // Ambil data pada excel sesuai Kolom
      $cabang = $row['B'];
      $temuan = $row['C'];
      $nilai_amanah = $row['D'];
      $level = $row['E'];
      $tingkat = $row['F'];
      $avail = $row['G'];
      $util = $row['H'];
      $nilai_kompeten = $row['I'];
      $kaloborasi = $row['J'];
      $nilai_harmonis = $row['K'];
      $revenue = $row['L'];
      $efisiensi = $row['M'];
      $nilai_loyal = $row['N'];
      $koreksi = $row['O'];
      $modul = $row['P'];
      $nilai_adaptif = $row['Q'];
      $realisasi_kpi = $row['R'];
      $realisasi_pkm = $row['S'];
      $nilai_kolab = $row['T'];
      $nilai_total = $row['U'];
      // Cek jika semua data tidak diisi
      if ($cabang == "" && $temuan == ""  && $nilai_amanah == ""  && $level == "" && $tingkat == "" && $avail == "" && $util == "" && $nilai_kompeten == "" && $kaloborasi == "" && $nilai_harmonis == "" && $revenue == "" && $efisiensi == "" && $nilai_loyal == "" && $koreksi == "" && $modul == "" && $nilai_adaptif == "" && $realisasi_kpi == "" && $realisasi_pkm == "" && $nilai_kolab == "" && $nilai_total == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Validasi apakah semua data telah diisi
        $cabang_td = (!empty($cabang)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $temuan_td = (!empty($temuan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $nilai_amanah_td = (!empty($nilai_amanah)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $level_td = (!empty($level)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $tingkat_td = (!empty($tingkat)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $avail_td = (!empty($avail)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $util_td = (!empty($util)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_kompeten_td = (!empty($nilai_kompeten)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $kaloborasi_td = (!empty($kaloborasi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_harmonis_td = (!empty($nilai_harmonis)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $revenue_td = (!empty($revenue)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $efisiensi_td = (!empty($efisiensi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_loyal_td = (!empty($nilai_loyal)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $koreksi_td = (!empty($koreksi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $modul_td = (!empty($modul)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_adaptif_td = (!empty($nilai_adaptif)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $realisasi_kpi_td = (!empty($realisasi_kpi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $realisasi_pkm_td = (!empty($realisasi_pkm)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_kolab_td = (!empty($nilai_kolab)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_total_td = (!empty($nilai_total)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

        // Jika salah satu data ada yang kosong
        if ($cabang == "" && $temuan == ""  && $nilai_amanah == ""  && $level == "" && $tingkat == "" && $avail == "" && $util == "" && $nilai_kompeten == "" && $kaloborasi == "" && $nilai_harmonis == "" && $revenue == "" && $efisiensi == "" && $nilai_loyal == "" && $koreksi == "" && $modul == "" && $nilai_adaptif == "" && $realisasi_kpi == "" && $realisasi_pkm == "" && $nilai_kolab == "" && $nilai_total == "") {
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td" . $cabang_td . ">" . $cabang . "</td>";
        echo "<td" . $temuan_td . ">" . $temuan . "</td>";
        echo "<td" . $nilai_amanah_td . ">" . $nilai_amanah . "</td>";
        echo "<td" . $level_td . ">" . $level . "</td>";
        echo "<td" . $tingkat_td . ">" . $tingkat . "</td>";
        echo "<td" . $avail_td . ">" . $avail . "</td>";
        echo "<td" . $util_td . ">" . $util . "</td>";
        echo "<td" . $nilai_kompeten_td . ">" . $nilai_kompeten . "</td>";
        echo "<td" . $kaloborasi_td . ">" . $kaloborasi . "</td>";
        echo "<td" . $nilai_harmonis_td . ">" . $nilai_harmonis . "</td>";
        echo "<td" . $revenue_td . ">" . $revenue . "</td>";
        echo "<td" . $efisiensi_td . ">" . $efisiensi . "</td>";
        echo "<td" . $nilai_loyal_td . ">" . $nilai_loyal . "</td>";
        echo "<td" . $koreksi_td . ">" . $koreksi . "</td>";
        echo "<td" . $modul_td . ">" . $modul . "</td>";
        echo "<td" . $nilai_adaptif_td . ">" . $nilai_adaptif . "</td>";
        echo "<td" . $realisasi_kpi_td . ">" . $realisasi_kpi . "</td>";
        echo "<td" . $realisasi_pkm_td . ">" . $realisasi_pkm . "</td>";
        echo "<td" . $nilai_kolab_td . ">" . $nilai_kolab . "</td>";
        echo "<td" . $nilai_total_td . ">" . $nilai_total . "</td>";
        echo "</tr>";
      }

      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if ($kosong > 0) {
  ?>
      <script>
        $(document).ready(function() {
          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
          $("#jumlah_kosong").html('<?php echo $kosong; ?>');

          $("#kosong").show(); // Munculkan alert validasi kosong
        });
      </script>
  <?php
    } else { // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' class='btn btn-info' name='import'>process</button>";
      echo "&nbsp;";
      echo "<a href='" . base_url("member/rapor/") . "' class='btn btn-dark'>Cancel</a>";
    }

    echo "</form>";
  }
  ?>

</div>