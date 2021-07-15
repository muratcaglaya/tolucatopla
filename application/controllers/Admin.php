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

	public function urunler()
	{
		$data['head']="Ürünler";
		$this->load->view('admin/product/products',$data);
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
		flash('success','check','Ayarlar Güncellendi.');
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
			flash('success','check','Kategori Güncellendi!');
			back();
		}

		$isExit=Kategori::find($id);
		if($isExit)
		{
			$data['category']=$isExit;
			$this->load->view('admin/category/editcategory',$data);
		}

	}
	//üRÜN KADEGORİLERİ SON

	//ÜRÜN SECENEKLERİ

	public function urunsecenekleri()
	{
		$data['head']="Ürün Seçenekleri";
		$data['options']=Secenekler::select();
		$this->load->view('admin/options/options',$data);
	}

	public function secenekekle()
	{
			if(isPost())
		{
			$data=['name'=>postvalue('option'),'slug'=>sef(postvalue('option'))];
			Secenekler::insert($data);
			flash('success','check','Seçenek Eklendi');
			back();
		}
		$data['head']="Seçenek Ekle";
		$this->load->view('admin/options/addoption',$data);
	}

	public function secenekduzenle($id)
	{
		$data['head']="Seçnekleri Düzenle";
		if(isPost())
		{
			$data=['name'=>postvalue('option'),'slug'=>sef(postvalue('option'))];
			Secenekler::update($id,$data);
			flash('success','check','Seçenek Güncellendi!');
			back();
		}
		$isExit=Secenekler::find($id);
		if($isExit)
		{
			$data['option']=$isExit;
			$this->load->view('admin/options/editoption',$data);
		}

	}


public function altsecenekler($id)
{
	$option=Secenekler::find($id);
	$data['head']=$option->name." İçin Alt Seçenekler";
	$data['suboptions']=AltSecenekler::select(['option_id'=>$id]);
	$data['option']=$option;
	$this->load->view('admin/options/suboptions',$data);
}

public function altsecenekekle($id)
{
	if(isPost())
	{
		$suboption=postvalue('suboption');
		$ara='-';
		if(strpos($suboption,$ara))
		{
			$value=explode('-',$suboption);
			foreach($value as $name)
			{
				AltSecenekler::insert(['option_id'=>$id,'name'=>$name]);
			}
			flash('success','check','Alt Seçenekler Eklendi!');
			redirect('admin/altsecenekler/'.$id);

		}else
		{
			AltSecenekler::insert(['option_id'=>$id,'name'=>$suboption]);
			flash('success','check','Alt Seçenek Eklendi!');
			redirect('admin/altsecenekler/'.$id);
		}		
	}
	$this->load->view('admin/options/addsuboption');
}

public function altsecenekduzenle($id)
	{
		$data['head']="Alt Seçnekleri Düzenle";
		if(isPost())
		{
			$suboption=AltSecenekler::find($id);
			$data=['name'=>postvalue('option')];
			AltSecenekler::update($id,$data);
			flash('success','check','Alt Seçenek Güncellendi!');
			redirect('admin/altsecenekler/'.$suboption->option_id);
		}
		$isExit=AltSecenekler::find($id);
		if($isExit)
		{
			$data['suboption']=$isExit;
			$this->load->view('admin/options/editsuboption',$data);
		}

	}


//ÜRÜN SECENEKLERİ SON

	




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
