<?
class rezervasyonlar_model extends CI_Model
{
    public $tablo_adi="";
    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi='tbl_rezervasyonlar';
    }

    //rezervasyon tamamlandı
    public function Add($rez_bilgileri=array())
    {
        return $this->db->insert($this->tablo_adi, $rez_bilgileri);
    }

    public function myrezervations($tc)
    {
        $this->db->select('*');
        $this->db->from($this->tablo_adi);
        $this->db->join('tbl_araclar', 'tbl_araclar.arac_id=tbl_rezervasyonlar.arac_id');
        return $this->db->where('tckimlik',$tc)->get()->result();

    }

    public function rezervation_cancel($id)
    {
        //update tbl_rezervasyonlar set durumu=..., iptal_tarihi=... where rez_id=..
        $data=array('durumu'=>'İptal', 'iptal_tarihi'=>date('Y-m-d'));
        $this->db->set($data);
        $this->db->where('rez_id',$id);
        $this->db->where('datediff(alma_tarihi, CURRENT_DATE)>0');
        $this->db->update($this->tablo_adi);
        if($this->db->affected_rows()==true)
        {
            $sonuc=true;
        }
        else {
            $sonuc=false;
        }
        return $sonuc;
    }
}
?>