<?php defined('BASEPATH') or exit('No direct script access allowed');
class Data_PKP extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('ModelPKP');
        // If Not Logged in Then Redirect to Auth Controller
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

    // Load View and Record Activity
    public function index()
    {
        $data = array(
            'title' => "Data PKP",
            'pkp' => $this->ModelPKP->findAll('data_pegawai')
        );

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pkp/data_pkp', $data);
        $this->load->view('template_admin/footer');
    }

    // Insert Data
    public function create()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Ada error, silahkan cek kembali data!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            $this->index();
        } else {
            $kode           = $this->input->post('kode');
            $keterangan     = $this->input->post('keterangan');
            $nominal        = $this->input->post('nominal');
            $nominal_akhir  = $this->input->post('nominal_akhir');
            $pot_npwp       = $this->input->post('pot_npwp');
            $pot_no_npwp    = $this->input->post('pot_no_npwp');

            $data = array(
                'kode'            => $kode,
                'keterangan'      => $keterangan,
                'nominal'         => $nominal,
                'nominal_akhir'   => $nominal_akhir,
                'pot_npwp'        => $pot_npwp,
                'pot_no_npwp'     => $pot_no_npwp,
            );

            $this->ModelPKP->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('admin/Data_PKP');
        }
    }

    public function read()
    {
        $result['data'] = $this->ModelPKP->findAll();
        echo json_encode($result);
    }

    // Update Data
    public function update_data($id)
    {
        $data['title'] = "Update Data PKP";
        $data['pkp'] = $this->ModelPKP->find($id);

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pkp/update_data_pkp', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Ada error, silahkan cek kembali data!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            $this->index();
        } else {
            $id         = $this->input->post('id');
            $kode       = $this->input->post('kode');
            $keterangan = $this->input->post('keterangan');
            $nominal    = $this->input->post('nominal');
            $nominal    = $this->input->post('nominal_akhir');
            $nominal    = $this->input->post('pot_npwp');
            $nominal    = $this->input->post('pot_no_npwp');

            $data = array(
                'kode'              => $kode,
                'keterangan'        => $keterangan,
                'nominal'           => $nominal,
            );

            $this->ModelPKP->edit($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('admin/Data_PKP');
        }
    }

    // Delete Data
    public function delete($id)
    {
        $result = $this->ModelPKP->remove($id);


        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('admin/Data_PKP');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required');
        $this->form_validation->set_rules('nominal_akhir', 'nominal_akhir', 'required');
        $this->form_validation->set_rules('pot_npwp', 'pot_npwp', 'required');
        $this->form_validation->set_rules('pot_no_npwp', 'pot_no_npwp', 'required');
    }
}
