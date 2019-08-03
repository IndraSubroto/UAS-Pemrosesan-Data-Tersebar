<?php

class Supplier extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//list supplier
		$data = json_decode($this->api->request('get', 'supplier'), TRUE);
		$data['supplier'] = $data['items'];

		$this->load->view('header/header');
		$this->load->view('supplier/list', $data);
		$this->load->view('footer/footer');
	}

	function detil($id = null)
	{
		$data = json_decode($this->api->request('get', 'supplier'), TRUE);
		$dataDetail = $this->arr_search($data['items'], "id_supplier", $id);

		if ($id === null) {
			echo "Error";
		} elseif (is_array($dataDetail) === false) {
			echo "Data tidak ditemukan";
		} else {
			$data['dtl'] = $dataDetail[0];
			$this->load->view('header/header');
			$this->load->view('supplier/detil', $data);
			$this->load->view('footer/footer');
		}
	}

	//function tambah

	function tambah($d = null)
	{
		if ($d === null) {
			//echo "Form tambah";
			$this->load->view('header/header');
			$this->load->view('supplier/tambah');
			$this->load->view('footer/footer');
		} elseif ($d === 'proses') {

			$data = array(
				'nm_supplier'	=> $this->input->post('nm_supplier'),
				'alamat'		=> $this->input->post('alamat'),
				'no_tlp'		=> $this->input->post('no_tlp')
			);

			$this->api->request('post', 'supplier', $data);
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Ditambah")';
			echo '</script>';
			redirect('supplier', 'refresh');
		}
	}

	function edit($id = null)
	{
		$data = json_decode($this->api->request('get', 'supplier'), TRUE);
		$dataFilter = $this->arr_search($data['items'], "id_supplier", $id);

		if (empty($id)) {
			echo '<script language="javascript">';
			echo 'alert("Error Bos")';
			echo '</script>';
			redirect('supplier', 'refresh');
		} elseif (is_array($dataFilter) === true) {
			$data = array(
				'dtl' 		=> $dataFilter[0],
				'judul' 	=> 'Detil Data supplier'
			);
			$this->load->view('header/header');
			$this->load->view('supplier/edit', $data);
			$this->load->view('footer/footer');
		}
	}

	function aksiedit()
	{
		$data = array(
			'nm_supplier'		=> $this->input->post('nm_supplier'),
			'alamat'		=> $this->input->post('alamat'),
			'no_tlp'		=> $this->input->post('no_tlp')
		);
		$this->api->request('PUT', 'supplier/' . $this->input->post('id_supplier'), $data);

		echo '<script language="javascript">';
		echo 'alert("Data Berhasil Diubah")';
		echo '</script>';
		redirect('supplier', 'refresh');
	}

	function hapus($id = null)
	{
		if (!empty($id)) {
			$this->api->request('delete', 'supplier/' . $id);
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Dihapus")';
			echo '</script>';
			redirect('supplier', 'refresh');
		}
	}

	private function arr_search($array, $key, $value)
	{
		$results = array();

		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value)
				$results[] = $array;

			foreach ($array as $subarray)
				$results = array_merge($results, $this->arr_search($subarray, $key, $value));
		}

		return $results;
	}
}
