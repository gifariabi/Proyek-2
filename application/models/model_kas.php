<?php
class model_kas extends CI_Model{

	public function kas_masuk($pemasukan_kas,$tanggal,$idOrganisasi){
      	$query = "INSERT INTO kas VALUES('','$pemasukan_kas','','','$tanggal','1')";
        $this->db->query($query);
    }

    public function kas_keluar($pengeluaran_kas,$keterangan,$tanggal,$idOrganisasi){
      	$query = "INSERT INTO kas VALUES('','','$pengeluaran_kas','$keterangan','$tanggal','1')";
        $this->db->query($query);
    }

    public function getKas(){
    	$this->db->select('*');
        $this->db->from('kas');
        //$this->db->where('MONTH(tanggal)', $tanggal);
        $this->db->order_by('id_kas', 'ASC');
        
		$query = $this->db->get();
		return $query->result();
   	}

   	public function edit_kas($where,$table){      
        return $this->db->get_where($table,$where);
    }

    public function update_kas($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

    public function getTotalKas(){
    	$this->db->select("FORMAT((SUM(pemasukan_kas)-SUM(pengeluaran_kas)),0) as total_kas");
    	$this->db->from('kas');
    	$query = $this->db->get();
    	return $query;
    }

    public function getlaporan(){
        $this->db->select("SUM(pemasukan_kas) as total_masuk, SUM(pengeluaran_kas) AS total_keluar,FORMAT((SUM(pemasukan_kas)-SUM(pengeluaran_kas)),0) as total_kas");
        $this->db->from('kas');
        $query = $this->db->get();
        return $query;
    }


    public function hapus_kas($where,$table){
        $this->db->delete($table,$where);
    }
//Bulan Untuk Kas
    public function get_januari(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 01');
        $query = $this->db->get();
        return $query;
    }

        public function get_februari(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 02');
        $query = $this->db->get();
        return $query;
    }

        public function get_maret(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 03');
        $query = $this->db->get();
        return $query;
    }

        public function get_april(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 04');
        $query = $this->db->get();
        return $query;
    }

         public function get_mei(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 05');
        $query = $this->db->get();
        return $query;
    }

        public function get_juni(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 06');
        $query = $this->db->get();
        return $query;
    }

        public function get_juli(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 07');
        $query = $this->db->get();
        return $query;
    }

    public function get_agustus(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 08');
        $query = $this->db->get();
        return $query;
    }

     public function get_september(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 09');
        $query = $this->db->get();
        return $query;
    }

        public function get_oktober(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 10');
        $query = $this->db->get();
        return $query;
    }

        public function get_november(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 11');
        $query = $this->db->get();
        return $query;
    }

        public function get_desember(){
       //$query = "SELECT * FROM kas WHERE month(tanggal) = 10";
       //$this->db->query($query);
        $this->db->select("*");
        $this->db->from('kas');
        $this->db->where('MONTH(tanggal) = 12');
        $query = $this->db->get();
        return $query;
    }

    public function get_kasMasuk(){
        $this->db->SELECT("*");
        $this->db->from("kas");
        $this->db->where("pemasukan_kas > 0 ");
        $query = $this->db->get();
        return $query;
    }

    public function get_kasKeluar(){
        $this->db->SELECT("*");
        $this->db->from("kas");
        $this->db->where("pengeluaran_kas > 0 ");
        $query = $this->db->get();
        return $query;
    }
}