<?php

class Penjualan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$response = json_decode($this->api->request('get', 'penjualan'), TRUE);

		$data = array(
			'beli'		=> $response['items'],
			'judul'		=> 'Penujualan Barang'
		);

		$this->load->view('header/header');
		$this->load->view('penjualan/list', $data);
		$this->load->view('footer/footer');
	}

	function tambah()
	{
		//riwayat pembelian	

		$this->load->view('header/header');
		$this->load->view('penjualan/tambah_jual');
		$this->load->view('footer/footer');
	}

	function detil($id = null)
	{
		$data = json_decode($this->api->request('get', 'penjualan'), TRUE);
		$dataFilter = $this->arr_search($data['items'], "kd_transaksi", $id);
		
		if ($id === null) {

			echo "Error";
		} elseif (is_array($dataFilter) === true) {
			# code...
			echo "Data tidak ditemukan";
		} else {
			$response = json_decode($this->api->request('get', 'barang'), TRUE);
			$barang = $this->arr_search($response['items'], "kd_barang", $dataFilter[0]['kd_barang']);

			$data['dtl'] = $dataFilter;
			$data['jualDtl'] = $barang;

			$this->load->view('header/header');
			$this->load->view('penjualan/detil', $data);
			$this->load->view('footer/footer');
		}
	}

	function aksijual()
	{
		$data = array(
			'kd_customer'	=> $this->input->post('kd_customer'),
			'kd_barang'		=> $this->input->post('kd_barang'),
			'tanggal'		=> date('Y-m-d'),
			'jml'			=> $this->input->post('jml'),
			'harga'			=> $this->input->post('harga'),
		);

		$z = json_decode($this->api->request('post', 'penjualan', $data), TRUE);

		if ($z) {
			echo '<script language="javascript">';
				echo 'alert("Data Berhasil Dihapus")';
				echo '</script>';
				redirect('barang', 'refresh');
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
