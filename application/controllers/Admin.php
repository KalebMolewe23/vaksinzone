<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daerah');
        is_logged_in();
    }

    // halaman utama tampilan admin

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Home';

        $wilayah['vaksin'] = $this->m_daerah->total_vaksin1()->result();
        $wilayah['vaksin1'] = $this->m_daerah->total_vaksin2()->result();
        $wilayah['vaksin2'] = $this->m_daerah->total_vaksin3()->result();

        $wilayah['lowokwaru'] = $this->m_daerah->zkuning();
        $wilayah['lowokwaru2'] = $this->m_daerah->zmerah();
        $wilayah['lowokwaru3'] = $this->m_daerah->zhijau();
        
        $wilayah['lowokwarudata'] = $this->m_daerah->data_puskesmas1();
        $wilayah['lowokwarudata1'] = $this->m_daerah->data_puskesmas2();
        $wilayah['lowokwarudata2'] = $this->m_daerah->data_puskesmas3();
        $wilayah['puskesmas'] = $this->m_daerah->get_rumahsakit();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/home', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    // menampilkan daerah vaksinasi

    public function daerah_vaksinasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Daerah Vaksinasi';
        $wilayah['lowokwaru'] = $this->m_daerah->data_puskesmas();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/daerah', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    // menambahkan daerah vaksinasi

    public function tambah_daerah(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_puskesmas', 'id_puskesmas', 'required|trims');
        $this->form_validation->set_rules('id_kelurahan', 'id_kelurahan', 'required|trims|is_unique[info_puskesmas.id_kelurahan]', [
            'is_unique' => 'Maaf, data sudah ada!!!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trims');
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required|trims|min_length[5]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Daerah Vaksinasi';
            $wilayah['lowokwaru'] = $this->m_daerah->get_rumahsakit();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/tambah_daerah', $wilayah);
            $this->load->view('admin/templates/footer');
        } else {
            $datavaksinasi = [
                'id_puskesmas' => $this->input->post('id_puskesmas'),
                'id_kelurahan' => $this->input->post('id_kelurahan'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos')
            ];
            $this->db->insert('info_puskesmas', $datavaksinasi);
            $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Selamat!!! Data Berhasil Ditambah.</div>');
            redirect('admin/daerah_vaksinasi');
        }
    }

    // tampilan edit daerah vaksinasi

    public function editdaerah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_info' => $id);
        $data['title'] = 'Edit Daerah Vaksinasi';
        $ewilayah['daerah'] = $this->m_daerah->edit_daerah_vaksinasi($where, 'info_puskesmas')->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/editdaerah', $ewilayah);
        $this->load->view('admin/templates/footer');
    }

    // proses edit daerah vaksinasi

    public function edit_daerah()
    {
        $id = $this->input->post('id_info');
        $id_puskesmas = $this->input->post('id_puskesmas');
        $id_kelurahan = $this->input->post('id_kelurahan');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');

        $data = array(
            'id_info' => $id,
            'id_puskesmas' => $id_puskesmas,
            'id_kelurahan' => $id_kelurahan,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
        );

        $where = array(
            'id_info' => $id
        );

        $this->m_daerah->update_data($where, $data, 'info_puskesmas');
        $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Data Berhasil Diupdate...</div>');
        redirect('admin/daerah_vaksinasi');
    }

    // hapus daerah vaksinasi

    public function deletedaerah($id)
    {
        $where = array('id_info' => $id);
        $this->m_daerah->hapus_daerah($where, 'info_puskesmas');
        $this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Data Telah Dihapus...</div>');
        redirect('admin/daerah_vaksinasi');
    }

    // menampilkan informasi vaksinasi

    public function add_data()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Data Daerah Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->datavaksin();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/datavaksin', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    // tambah data informasi vaksinasi

    public function data_vaksin()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_puskesmas', 'id_puskesmas', 'required|trims');
        $this->form_validation->set_rules('id_kelurahan', 'id_kelurahan', 'required|trims|is_unique[data_vaksin.id_kelurahan]', [
            'is_unique' => 'Maaf, data sudah ada!!!'
        ]);
        $this->form_validation->set_rules('jumlah_penduduk', 'jumlah_penduduk', 'required|trims');
        $this->form_validation->set_rules('vaksin_gel1', 'vaksin_gel1', 'required|trims');
        $this->form_validation->set_rules('bvaksin_gel1', 'bvaksin_gel1', 'required|trims');
        $this->form_validation->set_rules('vaksin_gel2', 'vaksin_gel2', 'required|trims');
        $this->form_validation->set_rules('bvaksin_gel2', 'bvaksin_gel2', 'required|trims');
        $this->form_validation->set_rules('vaksin_gel3', 'vaksin_gel3', 'required|trims');
        $this->form_validation->set_rules('bvaksin_gel3', 'bvaksin_gel3', 'required|trims');
        $this->form_validation->set_rules('pers_vaksin_gel1', 'pers_vaksin_gel1', 'required|trims');
        $this->form_validation->set_rules('pers_vaksin_gel2', 'pers_vaksin_gel2', 'required|trims');
        $this->form_validation->set_rules('pers_vaksin_gel3', 'pers_vaksin_gel3', 'required|trims');
        if ($this->form_validation->run() == false) {
        $data['title'] = 'Tambah Daerah Vaksinasi';
        $wilayah['daerah'] = $this->m_daerah->get_rumahsakit();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/vaksin', $wilayah);
        $this->load->view('admin/templates/footer');
        }else{
            $datawilayah = array(
                'id_puskesmas' => $this->input->post('id_puskesmas'),
                'id_kelurahan' => $this->input->post('id_kelurahan'),
                'jumlah_penduduk' => $this->input->post('jumlah_penduduk'),
                'vaksin_gel1' => $this->input->post('vaksin_gel1'),
                'bvaksin_gel1' => $this->input->post('bvaksin_gel1'),
                'vaksin_gel2' => $this->input->post('vaksin_gel2'),
                'bvaksin_gel2' => $this->input->post('bvaksin_gel2'),
                'vaksin_gel3' => $this->input->post('vaksin_gel3'),
                'bvaksin_gel3' => $this->input->post('bvaksin_gel3'),
                'pers_vaksin_gel1' => $this->input->post('pers_vaksin_gel1'),
                'pers_vaksin_gel2' => $this->input->post('pers_vaksin_gel2'),
                'pers_vaksin_gel3' => $this->input->post('pers_vaksin_gel3')
            );

            $this->db->insert('data_vaksin', $datawilayah);
            $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Data Berhasil Ditambah...</div>');
            redirect('admin/add_data');
        }
    }

    //tampilan edit data vaksin

    public function editvaksin($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_vaksin' => $id);
        $data['title'] = 'Edit Data Vaksinasi';
        $ewilayah['daerah'] = $this->m_daerah->edit_daerah($where, 'data_vaksin')->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/editvaksin', $ewilayah);
        $this->load->view('admin/templates/footer');
    }

    //proses edit data vaksin

    public function update()
    {
        $id = $this->input->post('id_vaksin');
        $id_puskesmas = $this->input->post('id_puskesmas');
        $id_kelurahan = $this->input->post('id_kelurahan');
        $jumlah_penduduk = $this->input->post('jumlah_penduduk');
        $vaksin_gel1 = $this->input->post('vaksin_gel1');
        $bvaksin_gel1 = $this->input->post('bvaksin_gel1');
        $vaksin_gel2 = $this->input->post('vaksin_gel2');
        $bvaksin_gel2 = $this->input->post('bvaksin_gel2');
        $vaksin_gel3 = $this->input->post('vaksin_gel3');
        $bvaksin_gel3 = $this->input->post('bvaksin_gel3');
        $pers_vaksin_gel1 = $this->input->post('pers_vaksin_gel1');
        $pers_vaksin_gel2 = $this->input->post('pers_vaksin_gel2');
        $pers_vaksin_gel3 = $this->input->post('pers_vaksin_gel3');

        $data = array(
            'id_vaksin' => $id,
            'id_puskesmas' => $id_puskesmas,
            'id_kelurahan' => $id_kelurahan,
            'jumlah_penduduk' => $jumlah_penduduk,
            'vaksin_gel1' => $vaksin_gel1,
            'bvaksin_gel1' => $bvaksin_gel1,
            'vaksin_gel2' => $vaksin_gel2,
            'bvaksin_gel2' => $bvaksin_gel2,
            'vaksin_gel3' => $vaksin_gel3,
            'bvaksin_gel3' => $bvaksin_gel3,
            'pers_vaksin_gel1' => $pers_vaksin_gel1,
            'pers_vaksin_gel2' => $pers_vaksin_gel2,
            'pers_vaksin_gel3' => $pers_vaksin_gel3
        );

        $where = array(
            'id_vaksin' => $id
        );

        $this->m_daerah->update_data($where, $data, 'data_vaksin');
        $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Data Berhasil Diupdate...</div>');
        redirect('admin/add_data');
    }

    //memanggil data kelurahan

    function getdatakelurahan()
    {
        $id_puskesmas = $this->input->post('puskesmas');

        $getdatakel = $this->m_daerah->get_puskel($id_puskesmas);
        echo json_encode($getdatakel);
    }

    //hapus data vaksinasi

    public function deletedatavaksin($id)
    {
        $where = array('id_vaksin' => $id);
        $this->m_daerah->hapus_data($where, 'data_vaksin');
        $this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Data Telah Dihapus...</div>');
        redirect('admin/add_data');
    }

    //menampilkan data zona hijau

    public function zona_hijau()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Home';
        $wilayah['lowokwaru'] = $this->m_daerah->zhijau();
        $wilayah['vaksin'] = $this->m_daerah->graph1();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/hijau', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //menampilkan data zona kuning

    public function zona_kuning()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Home';
        $wilayah['lowokwaru'] = $this->m_daerah->zkuning();
        $wilayah['vaksin'] = $this->m_daerah->graph2();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kuning', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //menampilkan data zona merah

    public function zona_merah()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Home';
        $wilayah['lowokwaru'] = $this->m_daerah->zmerah();
        $wilayah['vaksin'] = $this->m_daerah->graph3();
        $wilayah['vaksin2'] = $this->m_daerah->total_zmerah()->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/merah', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //proses k-means untuk menampilkan data semua vaksinasi

    public function tampilan_data()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $tanggalawal = $this->input->get('tanggalawal', TRUE);
        $tanggalakhir = $this->input->get('tanggalakhir', TRUE);

        $data['title'] = 'Data Daerah Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->datavaksin();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/tampilandata', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //iterasi kmenas

    public function iterasi_kmeans()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Data Daerah Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->datavaksin();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/iterasi-kmeans', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //iterasi lanjut proses kmenas

    public function interasi_lanjut()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $wilayah['data_vaksin'] =$this->db->get('data_vaksin inner join puskesmas on data_vaksin.id_puskesmas = puskesmas.id_puskesmas inner join kelurahan on data_vaksin.id_kelurahan = kelurahan.id_kelurahan');
        $id = "";
        $id = $this->db->query('select max(nomor) as m from hasil_centroid');
        foreach ($id->result() as $i){
            $id = $i->m;
        }
        $this->db->where('nomor', $id);
        $wilayah['centroid'] = $this->db->get('hasil_centroid');
        $wilayah['id'] = $id + 1;

        $it = "";
        $it = $this->db->query('select max(iterasi) as it from centroid_temp');
        foreach ($it->result() as $i) {
            $it = $i->it;
        }

        $it_temp = $it - 1;
        $this->db->where('iterasi', $it_temp);
        $it_sebelum = $this->db->get('centroid_temp');
        $c1_sebelum = array();
        $c2_sebelum = array();
        $c2_sebelum = array();
        $no = 0;
        foreach ($it_sebelum->result() as $it_prev) {
            $c1_sebelum[$no] = $it_prev->c1;
            $c2_sebelum[$no] = $it_prev->c2;
            $c3_sebelum[$no] = $it_prev->c3;
            $no++;
        }

        $this->db->where('iterasi', $it);
        $it_sesesudah = $this->db->get('centroid_temp');
        $c1_sesesudah = array();
        $c2_sesesudah = array();
        $c2_sesesudah = array();
        $no = 0;
        foreach ($it_sesesudah->result() as $it_next) {
            $c1_sesesudah[$no] = $it_next->c1;
            $c2_sesesudah[$no] = $it_next->c2;
            $c3_sesesudah[$no] = $it_next->c3;
            $no++;
        }

        if ($c1_sebelum == $c1_sesesudah || $c2_sebelum == $c2_sesesudah || $c2_sebelum == $c2_sesesudah) {
        ?>
            <script>
                alert("Proses iterasi berakhir pada tahap ke-<?php echo $it; ?>");
            </script>
        <?php
            echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "admin/iterasi_hasil'>";
        } else {
            $datas['title'] = 'Data Daerah Vaksinasi';
            $this->load->view('admin/templates/header', $datas);
            $this->load->view('admin/tampilandatalanjut', $wilayah);
            $this->load->view('admin/templates/footer');
        }   
    }

    //hasil iterasi kmeans

    function iterasi_hasil(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $wilayah['q'] = $this->db->query('select * from centroid_temp group by iterasi');

        $datas['title'] = 'Data Daerah Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->datavaksin();
        $wilayah['vaksin1'] = $this->m_daerah->hasil_kmeans();
        $this->load->view('admin/templates/header', $datas);
        $this->load->view('admin/tampilandatahasil', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    //menampilkan grafik dari hasil kmeans

    public function grafik(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data_hasil = $this->m_daerah->selectdata('hasil INNER JOIN (data_vaksin,kelurahan) on hasil.id_vaksin = data_vaksin.id_vaksin and data_vaksin.id_kelurahan=kelurahan.id_kelurahan order by d3 DESC');

        $wilayah = array(
            'data_hasil'    => $data_hasil,
        );

        $wilayah['q'] = $this->db->query('select * from centroid_temp group by iterasi');

        $data['title'] = 'Grafik Vaksinasi';
        $wilayah['vaksin'] = $this->m_daerah->graph();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/grafik', $wilayah);
        $this->load->view('admin/templates/footer');
    }

    
}
