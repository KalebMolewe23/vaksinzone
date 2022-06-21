<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_daerah');
        is_logged_in();
    }

    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['title'] = 'Home';

        $wilayah['image'] = $this->db->get('logo')->result();

        $wilayah['vaksin'] = $this->m_daerah->total_vaksin1()->result();
        $wilayah['vaksin1'] = $this->m_daerah->total_vaksin2()->result();
        $wilayah['vaksin2'] = $this->m_daerah->total_vaksin3()->result();

        $wilayah['lowokwaru'] = $this->m_daerah->zkuning();
        $wilayah['lowokwaru2'] = $this->m_daerah->zmerah();
        $wilayah['lowokwaru3'] = $this->m_daerah->zhijau();

        $wilayah['bawah'] = $this->db->get('footer')->result();
        $this->db->where('status', 1);
        $wilayah['sosmed'] = $this->db->get('sosial_media')->result();
        $wilayah['tentang'] = $this->db->get('about')->result();

        $wilayah['lowokwarumerah'] = $this->m_daerah->zmerah();
        $wilayah['vaksinm'] = $this->m_daerah->graph3();
        $wilayah['lowokwarukuning'] = $this->m_daerah->zkuning();
        $wilayah['vaksink'] = $this->m_daerah->graph2();
        $wilayah['lowokwaruhijau'] = $this->m_daerah->zhijau();
        $wilayah['vaksinh'] = $this->m_daerah->graph1();

        $wilayah['lowokwarudata'] = $this->m_daerah->data_puskesmas1();
        $wilayah['lowokwarudata1'] = $this->m_daerah->data_puskesmas2();
        $wilayah['lowokwarudata2'] = $this->m_daerah->data_puskesmas3();
        $wilayah['puskesmas'] = $this->m_daerah->get_rumahsakit();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home', $wilayah);
        $this->load->view('user/templates/footer');
    }

    public function daerah_vaksinasi(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $wilayah['image'] = $this->db->get('logo')->result();

        $wilayah['bawah'] = $this->db->get('footer')->result();
        $this->db->where('status', 1);
        $wilayah['sosmed'] = $this->db->get('sosial_media')->result();
        $wilayah['tentang'] = $this->db->get('about')->result();

        $data['title'] = 'Info Vaksinasi';
        $wilayah['lowokwaru'] = $this->m_daerah->data_puskesmas();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/daerah', $wilayah);
        $this->load->view('user/templates/footer');
    }

    public function tampilan_data(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $wilayah['image'] = $this->db->get('logo')->result();

        $wilayah['bawah'] = $this->db->get('footer')->result();
        $this->db->where('status', 1);
        $wilayah['sosmed'] = $this->db->get('sosial_media')->result();
        $wilayah['tentang'] = $this->db->get('about')->result();

        $data['title'] = 'Data Daerah Vaksinasi';
        $wilayah['lowokwaru'] = $this->m_daerah->zhijau();
        $wilayah['lowokwaru1'] = $this->m_daerah->zkuning();
        $wilayah['lowokwaru2'] = $this->m_daerah->zmerah();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/vaksin', $wilayah);
        $this->load->view('user/templates/footer');
    }

    public function about(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $wilayah['bawah'] = $this->db->get('footer')->result();
        $this->db->where('status',1);
        $wilayah['sosmed'] = $this->db->get('sosial_media')->result();
        $wilayah['tentang'] = $this->db->get('about')->result();

        $wilayah['image'] = $this->db->get('logo')->result();

        $data['title'] = 'Tentang Website';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/about', $wilayah);
        $this->load->view('user/templates/footer');
    }

    public function print_data_vaksin()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Print Data Vaksinasi';
        $wilayah['lowokwaru'] = $this->m_daerah->zhijau();
        $wilayah['lowokwaru1'] = $this->m_daerah->zkuning();
        $wilayah['lowokwaru2'] = $this->m_daerah->zmerah();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/print_vaksinasi', $wilayah);
    }

    public function print_info_vaksin()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Print info Vaksinasi';
        $wilayah['lowokwaru'] = $this->m_daerah->data_puskesmas();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/print_info', $wilayah);
    }

    public function print_grafik(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data_hasil = $this->m_daerah->selectdata('hasil INNER JOIN (data_vaksin,kelurahan) on hasil.id_vaksin = data_vaksin.id_vaksin and data_vaksin.id_kelurahan=kelurahan.id_kelurahan order by d3 DESC');

        $wilayah = array(
            'data_hasil'    => $data_hasil,
        );

        $wilayah['q'] = $this->db->query('select * from centroid_temp group by iterasi');

        $data['title'] = 'Grafik Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->graph();
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/print_grafik', $wilayah);
        $this->load->view('user/templates/footer');
    }

}