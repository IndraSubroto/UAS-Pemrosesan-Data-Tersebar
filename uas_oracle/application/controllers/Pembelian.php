<?php

class Pembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function tambah(){
		//riwayat pembelian	

		$this->load->view('header/header');
		$this->load->view('pembelian/tambah_beli');
		$this->load->view('footer/footer');
	}

	function index(){
		$data = json_decode($this->api->request('get', 'pembelian'), TRUE);
		$data['beli'] = $data['items'];

		$this->load->view('header/header');
		$this->load->view('pembelian/list', $data);
		$this->load->view('footer/footer');	
	}

	function aksipembelian(){
		$data = array(
				'id_supplier'	=> $this->input->post('id_supplier'),
				'kd_barang'	=> $this->input->post('kd_barang'),
				'tanggal'		=> date('Y-m-d'),
				'jml'		=> $this->input->post('jml'),
				'harga'		=> $this->input->post('harga'),
			);

		$a = json_decode($this->api->request('post', 'pembelian', $data), TRUE);

        if ($a) {
            echo json_encode('success') ;
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