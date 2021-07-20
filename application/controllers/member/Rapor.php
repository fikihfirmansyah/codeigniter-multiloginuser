<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rapor extends MY_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		$this->load->model('RaporModel');
		        $this->check_login();
        if ($this->session->userdata('id_role') != '2') {
            redirect('', 'refresh');
        }

	}
	
	public function index(){
	    $data= konfigurasi('Rapor', 'Kelola Rapor');
		$data['rapor'] = $this->RaporModel->view();
		$this->template->load('layouts/template', 'member/rapor/view', $data);
	}
	
	public function form(){
	    	    $data= konfigurasi('Rapor', 'Kelola Rapor');

		$data['rapor']= array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->RaporModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true, true, true ,true, true, true ,true, true, true ,true, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
				$this->template->load('layouts/template', 'member/rapor/form', $data);
	}

	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true, true, true ,true, true, true ,true, true, true ,true, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'cabang'=>$row['B'], 
					'temuan'=>$row['C'], 
					'nilai_amanah'=>$row['D'], 
					'level'=>$row['E'],
					'tingkat'=>$row['F'],
					'avail'=>$row['G'],
					'util'=>$row['H'],
					'nilai_kompeten'=>$row['I'],
					'kaloborasi'=>$row['J'],
					'nilai_harmonis'=>$row['K'],
					'revenue'=>$row['L'],
					'efisiensi'=>$row['M'],
					'nilai_loyal'=>$row['N'],
					'koreksi'=>$row['O'],
					'modul'=>$row['P'],
					'nilai_adaptif'=>$row['Q'],
					'realisasi_kpi'=>$row['R'],
					'realisasi_pkm'=>$row['S'],
					'nilai_kolab'=>$row['T'],
					'nilai_total'=>$row['U'],
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    		$this->RaporModel->insert_multiple($data);
		
		redirect("member/rapor"); // Redirect ke halaman awal (ke controller rapor fungsi index)
	}
}
