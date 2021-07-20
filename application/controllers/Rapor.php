<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rapor extends MY_Controller
{
	private $filename = "import_data"; // Kita tentukan nama filenya

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RaporModel');
		$this->check_login();
	}

	public function index()
	{
		$data = konfigurasi('Rapor', 'Kelola Rapor');
		$data['rapor'] = $this->RaporModel->view();
		$this->template->load('layouts/template', '/rapor/view', $data);
	}

	public function form()
	{
		$data = konfigurasi('Rapor', 'Kelola Rapor');

		$data['rapor'] = array(); // Buat variabel $data sebagai array

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->RaporModel->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			} else { // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$this->template->load('layouts/template', '/rapor/form', $data);
	}


	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 3;
		$kosong = 0;
		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 3) {
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'cabang' => $row['B'],
					'temuan' => $row['C'],
					'nilai_amanah' => $row['D'],
					'level' => $row['E'],
					'tingkat' => $row['F'],
					'avail' => $row['G'],
					'util' => $row['H'],
					'nilai_kompeten' => $row['I'],
					'kaloborasi' => $row['J'],
					'nilai_harmonis' => $row['K'],
					'revenue' => $row['L'],
					'efisiensi' => $row['M'],
					'nilai_loyal' => $row['N'],
					'koreksi' => $row['O'],
					'modul' => $row['P'],
					'nilai_adaptif' => $row['Q'],
					'realisasi_kpi' => $row['R'],
					'realisasi_pkm' => $row['S'],
					'nilai_kolab' => $row['T'],
					'nilai_total' => $row['U'],
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->RaporModel->insert_multiple($data);

		redirect("/rapor"); // Redirect ke halaman awal (ke controller rapor fungsi index)
	}
	public function export()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('PT Pelindo')
			->setLastModifiedBy('PT Pelindo')
			->setTitle("Rekap Rapor Akhlak")
			->setSubject("Rekap Rapor Akhlak")
			->setDescription("Rekap Rapor Akhlak")
			->setKeywords("Rekap Rapor Akhlak");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Rekap Rapor Akhlak"); // Set kolom A1 dengan tulisan "Rekap Rapor Akhlak"
		$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA CABANG"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NILAI AMANAH"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "NILAI KOMPETEN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "NILAI HARMONIS"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "NILAI LOYAL"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "NILAI ADAPTIF"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "NILAI KOLABORATIF"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "NILAI TOTAL"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "TANGGAL UPLOAD"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->RaporModel->view();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->cabang);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nilai_amanah . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nilai_kompeten . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nilai_harmonis . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->nilai_loyal . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->nilai_adaptif . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->nilai_kolab . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->nilai_total . '%');
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->created_at);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(2); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(14); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(14); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(16); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(16); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(12); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(14); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(19); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(12); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(19); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Rekap Rapor Akhlak");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Rekap Rapor Akhlak.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
