<?php

class Barang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//list barang
		$data = json_decode($this->api->request('get', 'barang'), TRUE);
		$data['barang'] = $data['items'];

		$this->load->view('header/header');
		$this->load->view('barang/list', $data);
		$this->load->view('footer/footer');
	}

	function detil($id = null)
	{
		$data = json_decode($this->api->request('get', 'barang'), TRUE);
		$dataDetail = $this->arr_search($data['items'], "kd_barang", $id);

		if ($id === null) {
			echo "Error";
		} elseif (is_array($dataDetail) === false) {
			echo "Data tidak ditemukan";
		} else {
			$data['dtl'] = $dataDetail[0];
			$this->load->view('header/header');
			$this->load->view('barang/detil', $data);
			$this->load->view('footer/footer');
		}
	}

	//function tambah

	function tambah($d = null)
	{
		if ($d === null) {
			//echo "Form tambah";
			$this->load->view('header/header');
			$this->load->view('barang/tambah');
			$this->load->view('footer/footer');
		} elseif ($d === 'proses') {

			$data = array(
				'nm_barang'		=> $this->input->post('nm_barang'),
				'harga'		=> $this->input->post('harga'),
				'jml_barang' => $this->input->post('jml_barang'),
			);

			$this->api->request('post', 'barang', $data);
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Ditambah")';
			echo '</script>';
			redirect('barang', 'refresh');
		}
	}

	function edit($id = null)
	{
		$data = json_decode($this->api->request('get', 'barang'), TRUE);
		$dataFilter = $this->arr_search($data['items'], "kd_barang", $id);

		if (empty($id)) {
			echo '<script language="javascript">';
			echo 'alert("Error Bos")';
			echo '</script>';
			redirect('barang', 'refresh');
		} elseif (is_array($dataFilter) === true) {
			$data = array(
				'dtl' 		=> $dataFilter[0],
				'judul' 	=> 'Detil Data Barang'
			);
			$this->load->view('header/header');
			$this->load->view('barang/edit', $data);
			$this->load->view('footer/footer');
		}
	}

	function aksiedit()
	{
		$data = array(
			'nm_barang'		=> $this->input->post('nm_barang'),
			'harga'		=> $this->input->post('harga'),
			'jml_barang' => $this->input->post('jml_barang'),
		);
		$this->api->request('PUT', 'barang/' . $this->input->post('kd_barang'), $data);

		echo '<script language="javascript">';
		echo 'alert("Data Berhasil Diubah")';
		echo '</script>';
		redirect('barang', 'refresh');
	}

	function hapus($id = null)
	{
		if (!empty($id)) {
			$a = $this->api->request('delete', 'barang/' . $id);
			if ($a) {
				echo '<script language="javascript">';
				echo 'alert("Data Berhasil Dihapus")';
				echo '</script>';
				redirect('barang', 'refresh');
				// echo '<script language="javascript">';
				// echo 'alert("Data Berhasil Dihapus")';
				// echo '</script>';
				// redirect('barang', 'refresh');
			}
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
