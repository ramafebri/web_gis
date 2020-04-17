<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Map extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapModel');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}

	public function bangunan_json()
	{
		$data=$this->db->get('bangunan')->result();
		echo json_encode($data);
	}

	public function getGeojson(){
		$data=$this->db->get('geojson')->result();
		echo json_encode($data);
	}

	public function addGeojson(){
		$data["array"] = $this->input->post('coordinates');

		$result = $this->MapModel->addgeojson($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	//<-Function which used in Map -> 
	public function addMarker(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function deleteMarker($bangunan_id){
        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updateMarker(){
		$foto = $_FILES['l_foto'];

		if($foto['name'] == ''){
			$data['bangunan_id'] = $this->input->post('l_id');
			$data['bangunan_nama'] = $this->input->post('l_name');
			$data['bangunan_lat'] = $this->input->post('l_lat'); 
			$data['bangunan_long'] = $this->input->post('l_long');
			$data['keterangan'] = $this->input->post('l_info');
			   
			$result = $this->MapModel->updateMarkers($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
			$data['bangunan_id'] = $this->input->post('l_id');
			$data['bangunan_nama'] = $this->input->post('l_name');
			$data['bangunan_lat'] = $this->input->post('l_lat'); 
			$data['bangunan_long'] = $this->input->post('l_long');
			$data['keterangan'] = $this->input->post('l_info');
			$data['gambar'] = $foto;
			   
			$result = $this->MapModel->updateMarkers($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}
		}
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Landmark Page ->
	public function addMarker1(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}
	
	public function deleteByID(){
		$bangunan_id = $this->input->post('l_id');

        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function deleteAll(){
        $result = $this->MapModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function updateMarker1(){
		$foto = $_FILES['l_foto'];

		if($foto['name'] == ''){
			$data['bangunan_id'] = $this->input->post('l_id');
			$data['bangunan_nama'] = $this->input->post('l_name');
			$data['bangunan_lat'] = $this->input->post('l_lat'); 
			$data['bangunan_long'] = $this->input->post('l_long');
			$data['keterangan'] = $this->input->post('l_info');
			   
			$result = $this->MapModel->updateMarkers($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
			$data['bangunan_id'] = $this->input->post('l_id');
			$data['bangunan_nama'] = $this->input->post('l_name');
			$data['bangunan_lat'] = $this->input->post('l_lat'); 
			$data['bangunan_long'] = $this->input->post('l_long');
			$data['keterangan'] = $this->input->post('l_info');
			$data['gambar'] = $foto;
			   
			$result = $this->MapModel->updateMarkers($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark'); 
			}
		}
	}

	// Export ke excel
	public function export()
	{
		$data=$this->db->get('bangunan')->result();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Rama - Abhin - Danar')
		->setLastModifiedBy('Rama')
		->setTitle('New Zealand GIS')
		->setSubject('New Zealand GIS Document')
		->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
		->setKeywords('office 2019 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Landmark ID')
		->setCellValue('C1', 'Landmark Name')
		->setCellValue('D1', 'Latitude')
		->setCellValue('E1', 'Longitude')
		->setCellValue('F1', 'Detail Information')
		;

		// Miscellaneous glyphs, UTF-8
		$i=2;
		$no=1; 
		
		foreach($data as $datas) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no)
		->setCellValue('B'.$i, $datas->bangunan_id)
		->setCellValue('C'.$i, $datas->bangunan_nama)
		->setCellValue('D'.$i, $datas->bangunan_lat)
		->setCellValue('E'.$i, $datas->bangunan_long)
		->setCellValue('F'.$i, $datas->keterangan);

		$no++;
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('New Zealand '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="New Zealand.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	function exportPDF(){
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'New Zealand Marker', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
		
		$data = $this->db->get('bangunan')->result();

		$html = '
		<html>
			<head>
				<style>
				table, th, td {
				border: 1px solid black;
				}
				</style>
			</head>
			<body>
				<table>
				<tr>
					<th> <b>ID Marker</b> </th>
					<th> <b>Name</b> </th>
					<th> <b>Latitude</b> </th>
					<th> <b>Longitude</b> </th>
					<th> <b>Information</b> </th>
					<th> <b>Photo</b> </th>
				</tr>
		';

		foreach($data as $landmarks) {
			$html .= '
			<tr>
				<td>'. $landmarks->bangunan_id .'</td>
				<td>'. $landmarks->bangunan_nama .'</td>
				<td>'. $landmarks->bangunan_lat .'</td>
				<td>'. $landmarks->bangunan_long .'</td>
				<td>'. $landmarks->keterangan .'</td>
				<td><img src="./assets/uploads/'. $landmarks->gambar .'" alt="maptime logo gif" width="100px" height="70px"/></td>
			</tr>';
		}
		
		$html .= '</table>
			</body>
		</html>
		';
		$pdf->writeHTML($html, true, false, true, false, '');
		
        $pdf->Output('Nez-Zealand-Marker.pdf', 'I');
    }
	//<-Function which used in Landmark Page ->
}