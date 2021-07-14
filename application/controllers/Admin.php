<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2)!='login' )
		{
			redirect('admin');			
		}
	}

	public function index()
	{
		if($this->session->userdata('adminlogin')){redirect('admin/panel');}
		$this->load->view('admin/login');
	}


	public function panel()
	{
		$data['head']="Anasayfa";
		$this->load->view('admin/panel',$data); 
	}

//SİTE AYARLARI

	public function ayarlar()
	{
		$data['head']="Site Ayarları";
		$data['config']=ayarlar::find(10);
		$this->load->view('admin/config',$data);
	}

	public function ayarlarpost()
	{
		$config=ayarlar::find(postvalue('id'));
		$data=['title'=>postvalue('title'),
			   'info'=>postvalue('info'),
			   'mail'=>postvalue('mail'),
			   'facebook'=>postvalue('facebook'),
			   'twitter'=>postvalue('twitter'),
			   'instagram'=>postvalue('instagram'),
			   'youtube'=>postvalue('youtube')];
		if($_FILES['logo']['size']>0)
		{
			$data['logo']=imageupload('logo','config','jpg|png|ico');
			unlink($config->logo);
		}
		if($_FILES['icon']['size']>0)
		{
			$data['icon']=imageupload('icon','config','jpg|png|ico');
			unlink($config->icon);
		}		
		
		Ayarlar::update(postvalue('id'),$data);
		flash('success','check','Ayarlar güncellendi.');
		back();

	}
	//SİTE SON


	//üRÜN KATEGORİLERİ


	public function kategoriler()
	{
		$data['head']="Ürün Kategorileri";
		$data['categories']=Kategori::select();
		$this->load->view('admin/category/categories',$data);
	}

	public function kategoriekle()
	{
			if(isPost())
		{
			$data=['topcategory'=>postvalue('topcategory'),'name'=>postvalue('category'),'slug'=>sef(postvalue('category'))];
			Kategori::insert($data);
			flash('success','check','Kategori Eklendi');
			back();
		}
		$data['head']="Kategori Ekle";
		$this->load->view('admin/category/addcategory',$data);
	}

	public function kategoriduzenle($id)
	{
		$data['head']="Kategorileri Düzenle";
		if(isPost())
		{
			$data=['topcategory'=>postvalue('topcategory'),'name'=>postvalue('category'),'slug'=>sef(postvalue('category'))];
			Kategori::update($id,$data);
			flash('success','check','KategoriGüncellendi!');
			back();
		}


		$isExit=Kategori::find($id);
		if($isExit)
		{
			$data['category']=$isExit;
			$this->load->view('admin/category/editcategory',$data);
		}

	}




	public function login()
	{
		$exist=Yonetim::find(['mail'=>$this->input->post('email'),'password'=>$this->input->post('sifre')]);
		if($exist)
		{
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$exist);
			redirect('admin/panel'); 
		}else
		{
			$hata="email adresi veya şifre hatalı.";
			$this->session->set_flashdata('error',$hata);
			redirect('admin');
		}
	}

	
	public function cikis()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}
