<?php

class Data_Penggajian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Data Gaji Pegawai";
		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}
		$data['potongan'] = $this->ModelPenggajian->get_data('potongan_gaji')->result();
		$data['gaji'] = $this->db->query("SELECT
		final.nik,
		final.nama_pegawai,
		final.jenis_kelamin,
		final.nama_jabatan,
		final.nominal_ptkp,
		final.gaji_pokok,
		final.gaji_setahun,
		final.tj_transport,
		final.uang_makan,
		final.alpha,
		( final.jml_potongan_kehadiran + final.potongan_pajak_per_bulan ) AS jml_potongan,
		(
		final.gaji_pokok + final.tj_transport + final.uang_makan - (final.jml_potongan_kehadiran + final.potongan_pajak_per_bulan)) AS total_gaji 
	FROM
		(
		SELECT
			gaji.nik,
			gaji.nama_pegawai,
			gaji.jenis_kelamin,
			gaji.nama_jabatan,
			gaji.nominal_ptkp,
			gaji.gaji_pokok,
			gaji.gaji_setahun,
		IF
			(
				gaji.kena_pajak = 1,
				(
				SELECT
					( gaji.gaji_setahun - gaji.nominal_ptkp ) * ( data_pkp.pot_npwp / 100 ) / 12 
				FROM
					data_pkp 
				WHERE
					( gaji.gaji_setahun - gaji.nominal_ptkp ) BETWEEN data_pkp.nominal 
					AND data_pkp.nominal_akhir 
				),
				0 
			) AS potongan_pajak_per_bulan,
			gaji.tj_transport,
			gaji.uang_makan,
			gaji.alpha,
			gaji.jml_potongan_kehadiran 
		FROM
			(
			SELECT
				data_pegawai.nik,
				data_pegawai.nama_pegawai,
				data_pegawai.jenis_kelamin,
				data_jabatan.nama_jabatan,
				data_ptkp.nominal AS nominal_ptkp,
				data_jabatan.gaji_pokok,
				data_jabatan.gaji_pokok * 12 AS gaji_setahun,
			IF
				(( data_jabatan.gaji_pokok * 12 ) > data_ptkp.nominal, 1, 0 ) AS kena_pajak,
				data_jabatan.tj_transport,
				data_jabatan.uang_makan,
				data_kehadiran.alpha,
				t1.jml_potongan * data_kehadiran.alpha jml_potongan_kehadiran 
			FROM
				data_pegawai
				INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
				INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
				JOIN ( SELECT t1.jml_potongan FROM potongan_gaji t1 WHERE t1.id = 1 ) t1
				JOIN data_ptkp ON data_ptkp.id = data_pegawai.id_ptkp 
			WHERE
				data_kehadiran.bulan = '$bulantahun' 
			ORDER BY
				data_pegawai.nama_pegawai ASC 
			) AS gaji 
		) AS final")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/gaji/data_gaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function cetak_gaji()
	{

		$data['title'] = "Cetak Data Gaji Pegawai";
		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}
		$data['potongan'] = $this->ModelPenggajian->get_data('potongan_gaji')->result();
		$data['cetak_gaji'] = $this->db->query("SELECT
		data_pegawai.nik,
		data_pegawai.nama_pegawai,
		data_pegawai.jenis_kelamin,
		data_jabatan.nama_jabatan,
		data_jabatan.gaji_pokok,
		data_jabatan.tj_transport,
		data_jabatan.uang_makan,
		data_kehadiran.alpha,
		t1.jml_potongan * data_kehadiran.alpha jml_potongan,
		data_jabatan.gaji_pokok + data_jabatan.tj_transport + data_jabatan.uang_makan - ( t1.jml_potongan * data_kehadiran.alpha ) total_gaji 
		FROM
			data_pegawai
			INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
			INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
			JOIN ( SELECT t1.jml_potongan FROM potongan_gaji t1 WHERE t1.id = 1 ) t1 
		WHERE
			data_kehadiran.bulan = '$bulantahun' 
		ORDER BY
			data_pegawai.nama_pegawai ASC")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/gaji/cetak_gaji', $data);
	}
}
