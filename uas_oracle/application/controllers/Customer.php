<?php

class Customer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//list customer
		$data = json_decode($this->api->request('get', 'customer'), TRUE);
		$data['customer'] = $data['items'];

		$this->load->view('header/header');
		$this->load->view('customer/list', $data);
		$this->load->view('footer/footer');
	}

	function detil($id = null)
	{
		$data = json_decode($this->api->request('get', 'customer'), TRUE);
		$dataDetail = $this->arr_search($data['items'], "kd_customer", $id);

		if ($id === null) {
			echo "Error";
		} elseif (is_array($dataDetail) === false) {
			echo "Data tidak ditemukan";
		} else {
			$data['dtl'] = $dataDetail[0];
			$this->load->view('header/header');
			$this->load->view('customer/detil', $data);
			$this->load->view('footer/footer');
		}
	}

	//function tambah

	function tambah($d = null)
	{
		if ($d === null) {
			//echo "Form tambah";
			$this->load->view('header/header');
			$this->load->view('customer/tambah');
			$this->load->view('footer/footer');
		} elseif ($d === 'proses') {

			$data = array(
				'username'		=> $this->input->post('username'),
				'alamat'		=> $this->input->post('alamat'),
				'no_tlp'		=> $this->input->post('no_tlp')
			);

			$this->api->request('post', 'customer', $data);
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Ditambah")';
			echo '</script>';
			redirect('customer', 'refresh');
		}
	}

	function edit($id = null)
	{
		$data = json_decode($this->api->request('get', 'customer'), TRUE);
		$dataFilter = $this->arr_search($data['items'], "kd_customer", $id);

		if (empty($id)) {
			echo '<script language="javascript">';
			echo 'alert("Error Bos")';
			echo '</script>';
			redirect('customer', 'refresh');
		} elseif (is_array($dataFilter) === true) {
			$data = array(
				'dtl' 		=> $dataFilter[0],
				'judul' 	=> 'Detil Data Customer'
			);
			$this->load->view('header/header');
			$this->load->view('customer/edit', $data);
			$this->load->view('footer/footer');
		}
	}

	function aksiedit()
	{
		$data = array(
			'username'		=> $this->input->post('username'),
			'alamat'		=> $this->input->post('alamat'),
			'no_tlp'		=> trim($this->input->post('no_tlp'))
		);
		$this->api->request('PUT', 'customer/' . $this->input->post('kd_customer'), $data);

		echo '<script language="javascript">';
		echo 'alert("Data Berhasil Diubah")';
		echo '</script>';
		redirect('customer', 'refresh');
	}

	function hapus($id = null)
	{
		if (!empty($id)) {
			$a = $this->api->request('delete', 'customer/' . $id);
			echo '<script language="javascript">';
			echo 'alert("Data Berhasil Dihapus")';
			echo '</script>';
			redirect('customer', 'refresh');
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
