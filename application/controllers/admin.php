<?
class admin extends CI_Controller {
    public function index()
    {
        $this->load->view("admin_index_view");
    }

    public function vehicle()
    {
        $this->load->model('araclar_model');
        $liste = new stdClass();
        $liste->araclar=$this->araclar_model->TumAraclariGetir();
        $this->load->view('admin_vehiclelist_view',$liste);
    }

    public function vehicleDetail($id)
    {
        $this->load->model('araclar_model');
        $sepetim['arac']=$this->araclar_model->TekBirArac($id);
        $this->load->view('admin_vehicleDetail_view',$sepetim);
    }

    public function vehicleAdd()
    {
        $veri['uyari']=null;
        $this->load->view('admin_vehicleAdd_view',$veri);
    }

    public function vehicleAddPost()
    {
        $this->load->model('araclar_model');
        $arac_bilgileri=array(
            'marka' => $this->input->post('marka_'),
            'model' => $this->input->post('model_'),
            'model_yili' => $this->input->post('model_yili_'),
            'yakit_tipi' => $this->input->post('yakit_'),
            'vites_tipi' => $this->input->post('vites_'),
            'fiyat' => $this->input->post('fiyat_')
        );

        $result = $this->araclar_model->add($arac_bilgileri);

        if($result) //true
        {
            $veri['uyari']='Tebrikler, araç bilgileri kaydedildi.';
        }
        else 
        {
            $veri['uyari']='Üzgünüm, bir hata meydana geldi';
        }
        $this->load->view('admin_vehicleAdd_view',$veri);
    }

    public function vehicleDelete($id)
    {
        $this->load->model('araclar_model');
        $result=$this->araclar_model->delete($id);
        if($result)
        {
            //true ise
            redirect(base_url('admin/vehicle'));
        }

    }

    //update-1: GET
    public function vehicleUpdate($aid)
    {
        $this->load->model('araclar_model');
        $sepetim['arac']=$this->araclar_model->TekBirArac($aid);
        $sepetim['uyari']=null;
        $this->load->view('admin_vehicleUpdate_view',$sepetim);
    }

    //update-2: POST
    public function vehicleUpdatePost()
    {
        $this->load->model('araclar_model');
        $arac_bilgileri=array(
            'arac_id'   => $this->input->post('arac_id_'),
            'marka'     => $this->input->post('marka_'),
            'model'     => $this->input->post('model_'),
            'model_yili' => $this->input->post('model_yili_'),
            'yakit_tipi' => $this->input->post('yakit_'),
            'vites_tipi' => $this->input->post('vites_'),
            'fiyat' => $this->input->post('fiyat_')
        );

        $result=$this->araclar_model->update($arac_bilgileri);

        if($result)
        {
            $sepetim['uyari']='Tebrikler, veriler güncellendi';
        }
        else
        {
            $sepetim['uyari']='Üzgünüm, bir hata meydana geldi';
        }
        $arac_id=$this->input->post('arac_id_');
        $sepetim['arac']=$this->araclar_model->TekBirarac($arac_id);
        $this->load->view('admin_vehicleUpdate_view',$sepetim);
    }

    public function UploadImage($id,$resim)
    {
        $data['arac_id']=$id;
        $data['resim_var_mi']=$resim;
        $data['uyari']=null;
        $this->load->view('admin_vehicle_UploadImage_view',$data);
    }

    public function UploadImagePost()
    {
        $arac_id=$this->input->post('arac_id_');
        $file=$arac_id.'.jpg';

        $this->load->model('araclar_model');
        $arac_bilgileri=$this->araclar_model->TekBirArac($arac_id);
        
        //resim varsa öncelikle silme yapılmalı
        if($arac_bilgileri->resim_var_mi=='E')
        {
            unlink('assets/arac_resimleri/'.$file);
        }

        //yüklenen dosya ile ilgili sorgulamalar
        $config['upload_path']='./assets/arac_resimleri/';
        $config['allowed_types']='bmp|png|gif|jpg|jpeg';
        $config['max_size']=2048; //2mb
        $config['max_width']=2000;
        $config['max_height']=1600;
        $config['file_name']=$file;

        //resim yüklemek için codeigniter file upload
        //kütüphanesi yükleniyor
        $this->load->library('upload',$config);
        

        if(!$this->upload->do_upload('resim'))
        {
            //resim yükleme başarısız
            //$data['uyari']='Araç resmi yüklenemedi';
            $data['uyari']=$this->upload->display_errors();
        } else {
            //resim yükleme başarılı
            $data['uyari']='Araç resmi başarıyla yüklendi.';
            $result=$this->araclar_model->upload_vehicle_image($arac_id);
        }
        //$arac_bilgileri['resim_var_mi']
        //$arac_bilgileri[8]
        $data['resim_var_mi']=$arac_bilgileri->resim_var_mi;
        $data['arac_id']=$arac_id;
        $this->load->view('admin_vehicle_UploadImage_view',$data);
    }
}
?>