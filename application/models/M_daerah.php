<?php
class M_daerah extends CI_Model
{

    function get_kelurahan()
    {
        return $this->db->get('kelurahan')->result();
    }
    
    function get_rumahsakit()
    {
        return $this->db->get('puskesmas')->result();
    }

    public function get_puskel($id_puskesmas){    
          $this->db->where('id_puskesmas', $id_puskesmas);    
          $result = $this->db->get('kelurahan')->result();
                  
          return $result;   
    }

    public function total_vaksin1(){
        return $this->db->query("SELECT SUM(vaksin_gel1) as total, SUM(jumlah_penduduk) as totalp FROM data_vaksin");
    }

    public function total_vaksin2(){
        return $this->db->query("SELECT SUM(vaksin_gel2) as total, SUM(jumlah_penduduk) as totalp FROM data_vaksin");
    }

    public function total_vaksin3(){
        return $this->db->query("SELECT SUM(vaksin_gel3) as total, SUM(jumlah_penduduk) as totalp FROM data_vaksin");
    }

    public function data_puskesmas(){
        $this->db->select('*');
        $this->db->from('info_puskesmas');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = info_puskesmas.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = info_puskesmas.id_kelurahan');
        return $this->db->get()->result();
    }

    public function data_puskesmas1()
    {
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c1 = "1"');
        return $this->db->get()->result();
    }

    public function data_puskesmas2()
    {
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c2 = "1"');
        return $this->db->get()->result();
    }

    public function data_puskesmas3()
    {
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c3 = "1"');
        return $this->db->get()->result();
    }

    public function edit_daerah($where,$table){
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        return  $this->db->get_where($table,$where);
    }

    public function edit_daerah_vaksinasi($where, $table)
    {
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = info_puskesmas.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = info_puskesmas.id_kelurahan');
        return  $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    public function hapus_daerah($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function datavaksin(){
        $this->db->select('*');
        $this->db->from('data_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        return $this->db->get()->result();
    }

    function get_puskesmas($id_penduduk)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->order_by('jumlah_penduduk', 'ASC');
        $query = $this->db->get('data_penduduk');

        $output = '<option value="">-- Pilih Puskesmas --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_penduduk . '">' . $row->jumlah_penduduk . '</option>';
        }
        //return data kabupaten
        return $output;
    }

    function selectdata($where = '')
    {
        return $this->db->query("select * from $where;");
    }

    public function hasil_kmeans(){
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        return $this->db->get()->result();
    }

    function zhijau(){
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c1 = "1"');
        return $this->db->get()->result();
    
    }

    function zkuning(){
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c2 = "1"');
        return $this->db->get()->result();
    }

    function zmerah()
    {
        $this->db->select('*');
        $this->db->from('centroid_temp');
        $this->db->join('data_vaksin', 'data_vaksin.id_vaksin = centroid_temp.id_vaksin');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas = data_vaksin.id_puskesmas');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan = data_vaksin.id_kelurahan');
        $this->db->where('iterasi = "2"');
        $this->db->where('c3 = "1"');
        return $this->db->get()->result();
    }
    
    function graph1()
    {
        $query = "SELECT COUNT(*) AS total, id_vaksin,C1 FROM centroid_temp where iterasi='2' GROUP BY C1 ORDER BY C1 DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function graph2()
    {
        $query = "SELECT COUNT(*) AS total, id_vaksin,c2 FROM centroid_temp where iterasi='2' GROUP BY C2 ORDER BY c2 DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function graph3()
    {
        $query = "SELECT COUNT(*) AS total, id_vaksin,c3 FROM centroid_temp where iterasi='2' GROUP BY C3 ORDER BY c3 DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function tambah_logo($data){
        $this->db->update('logo',$data);
    }

    function simpan_sosmed($nama_sosmed, $link, $icon, $status)
    {
        $save = $this->db->query("INSERT INTO sosial_media (nama_sosmed,link,icon,status) VALUES ('$nama_sosmed','$link','$icon','$status')");
        return $save;
    }

    public function edit_sosmed($where,$table){
        return  $this->db->get_where($table,$where);
    }

}
