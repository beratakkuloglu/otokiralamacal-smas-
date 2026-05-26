<?
class home extends CI_Controller {
    public function index()
    {
        $this->load->view("home_index_view");
    }

    public function vehicle()
    {
        $this->load->model('araclar_model');
        $liste = new stdClass();
        $liste->araclar=$this->araclar_model->TumAraclariGetir();
        $this->load->view('home_vehiclelist_view',$liste);
    }

    public function detail($id)
    {
        $this->load->model('araclar_model');
        $sepetim['uyari']=null;
        $sepetim['arac']=$this->araclar_model->TekBirArac($id);
        $this->load->view('home_detail_view',$sepetim);
    }

    public function RezervationAddPost()
    {
        $this->load->model("rezervasyonlar_model");
        $this->load->model("araclar_model");
        $aid=$this->input->post('arac_id_');
        $rezervasyon=array(
            'arac_id'   =>  $aid,
            'tckimlik'  =>  $this->input->post('tckimlik_'),
            'alma_tarihi' => $this->input->post('alma_tarihi_'),
            'teslim_tarihi' => $this->input->post('teslim_tarihi_'),
            'tutar'     => $this->input->post('tutar_')
        );
        $result=$this->rezervasyonlar_model->Add($rezervasyon);
        if($result)
            $sepet['uyari']='Tebrikler, rezervasyon tamamlandı';
        else
            $sepet['uyari']='Üzgünüm, hata meydana geldi';
        $sepet['arac']=$this->araclar_model->TekBirArac($aid);
        $this->load->view('home_detail_view',$sepet);
    }

    public function rezervation()
    {
        $veriler=new stdClass();
        $veriler->rezervasyonlar=[]; //data<=0
        $this->load->view('home_rezervation_view',$veriler);
    }

    public function rezervationListPost()
    {
        $this->load->model('rezervasyonlar_model');
        $veriler=new stdClass();
        $tc=$this->input->post('tckimlik_');
        $veriler->rezervasyonlar=$this->rezervasyonlar_model->myrezervations($tc);
        $this->load->view('home_rezervation_view',$veriler);
    }

    public function rezervationCancel($id)
    {
        $this->load->model('rezervasyonlar_model');
        $result=$this->rezervasyonlar_model->rezervation_cancel($id);
    }
}
?>