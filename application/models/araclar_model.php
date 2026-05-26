<?
    class araclar_model extends CI_Model
    {
        public $tablo_adi = "";
        public function __construct()
        {
            //bir sınıf yüklenirken ilk çalışması gereken 
            //satırları içerir.
            parent::__construct();
            $this->tablo_adi = 'tbl_araclar';
        }

        public function TumAraclariGetir()
        {
            return $this->db->get($this->tablo_adi)->result();
        }

        public function TekBirArac($id)
        {
            return $this->db->where("arac_id",$id)->get($this->tablo_adi)->row();
        }

        //admin
        public function add($arac=array())
        {
            return $this->db->insert($this->tablo_adi, $arac);
        }

        //admin
        public function delete($id)
        {
            return $this->db->where('arac_id',$id)->delete($this->tablo_adi);
        }

        //admin
        public function update($data=array())
        {
            //update tbl_araclar set marka='m1', model='m2',... where arac_id=5
            return $this->db->where('arac_id',$data['arac_id'])->update($this->tablo_adi, $data);
        }

        //admin
        public function upload_vehicle_image($id)
        {
            $data=array('resim_var_mi'=>'E');
            $this->db->set($data);
            $this->db->where('arac_id',$id);
            return $this->db->update($this->tablo_adi);
        }
    }
?>