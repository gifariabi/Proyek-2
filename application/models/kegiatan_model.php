<?php 
    class Kegiatan_model extends CI_Model{
        //input data
        function data($data,$table){
            // $query = "INSERT INTO kelas VALUES('','$nama','$spesifik','$jumlah','$kondisi')";
            // $this->db->query($query);
            return $this->db->insert($table,$data);
        }
        // function getId($where,$table){
        //      $this->db->where($where);
        //      $this->db->insert($table,$data);
        // }
        //mengambil database
        function tampil(){
            // $query = $this->db->query("SELECT * FROM kelas");
            // return $query->result();
            $this->db->select('k.id_kegiatan, k.nama_kegiatan, k.waktu, k.tempat, k.harga, k.qr_code, p.departemen');
            $this->db->from('kegiatan k');
            $this->db->join('programkerja p','p.id_programkerja = k.id_programkerja');
            
            $query = $this->db->get();
            // if($query->num_rows() > 0) {
                return $query;
            // }
        }
        // menghapus data
        function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        //mengedit data
        function edit_data($where,$table){
            return $this->db->get_where($table,$where);
        }
        // update data
        function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        function search($keyword){
            $this->db->like('nama_kegiatan',$keyword);
            $this->db->or_like('harga',$keyword);
            $query=$this->db->get('kegiatan');
            return $query->result();
        }
    }
?>