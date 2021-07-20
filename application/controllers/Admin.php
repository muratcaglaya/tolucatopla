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
		$data['products']=Urunler::select();
		$this->load->view('admin/product/products',$data);
	}

	public function urunekle()
	{
		$data['head']="Ürünler Ekle";
		$data['subcategory']=Kategori::select();
		$this->load->view('admin/product/addproduct',$data);
	}
	public function urunresimekle($id)
	{
		$data['head']="Ürünler Ekle";

		if(isPost())
		{
			$data['head']="Ürünler Resim Ekle";
			$config['upload_path']="assets/upload/products/";
			$config['allowed_types']="jpg|png|jpeg";
			$this->upload->initialize($config);
			if($this->upload->do_upload('file'))
			{
				$image=$this->upload->data();
				$path=$config['upload_path'].$image['file_name'];
				$data=['product'=>$id,'path'=>$path];
				Resimler::insert($data);
			}
		}
		$data['subcategory']=Kategori::select();
		$this->load->view('admin/product/addproductimage',$data);
	}
	public function urunstoktipiekle($id)
	{
		$data['head']="Ürünler Stok Tipi Ekle";
		if(isPost())
		{
			if(postvalue('subcategory')==postvalue('subcategory2'))
			{
				flash('warning','remove','Ürün seçenekleri birbirinden farklı olmalıdır.');
				back();
			}
			if(StokTipi::count(['product'=>$id])==1)
			{
				flash('warning','remove','Ürün için stok tipi belirlenmiştir.');
				back();
			}			
			$data=['product'=>$id,'options'=>postvalue('subcategory')];
			if(postvalue('subcategory2')!=0){$data['options2']=postvalue('subcategory2');}
			StokTipi::insert($data);
			flash('success','check','Stok tipi başarıyla girildi.');
			redirect('admin/urunstokekle/'.$id);			
		}
		$data['head']="Ürünler Stok Tipi Ekle";
		$data['options']=Secenekler::select();
		$this->load->view('admin/product/addproductstocktype',$data);
	}

	public function  urunstokekle($id)
	{

		if(isPost())
		{
			if(Stoklar::find(['product'=>$id,'suboption'=>postvalue('subcategory'),'suboption2'=>postvalue('subcategory2')]))
			{
				flash('warning','remove','Bu seçenekler için zaten stok bilgisi girildi.');
				back();
			}
			$data=['product'=>$id,'suboption'=>postvalue('subcategory'),'suboption2'=>postvalue('subcategory2'),'stock'=>postvalue('stock')];
			Stoklar::insert($data);
			flash('success','check','Stok başarıyla girildi.');
			back();
		}
		$product=Urunler::find($id);
		if(!$product){flash('success','check','Stok tipi başarıyla girildi.'); back();}
		$stocktype=StokTipi::find(['product'=>$product->id]);
		$secenek1=AltSecenekler::select(['option_id'=>$stocktype->options]);
		$secenek2=null;
		if($stocktype->options2!=null)
		{
			$secenek2=AltSecenekler::select(['option_id'=>$stocktype->options2]);
		}
		$data=['option1'=>$secenek1,'option2'=>$secenek2];

		$data['type']=$stocktype;
		$data['head']="Ürün Stoklarını Giriniz";
		$data['stocks']=Stoklar::select(['product'=>$id]);		
		$this->load->view('admin/product/addproductstock',$data);
	}

	public function uruncontroller($id=null)
	{
		if(isPost())
		{
			if(postvalue('step1'))
			{
				$data=['category'=>postvalue('category'),
					   'subcategory'=>postvalue('subcategory'),
					   'title'=>postvalue('title'),
					   'description'=>postvalue('desc'),
					   'price'=>postvalue('price'),
					   'discount'=>postvalue('discount'),
					   'tag'=>postvalue('tag')
				];
				Urunler::insert($data);
				$insert_id=$this->db->insert_id();
				$qrpath='assets/upload/qrcode/urun'.$insert_id.'.png';
				$params['data'] = 'urunid='.$insert_id;
				$params['level'] = 'H';
				$params['size'] = 5;
				$params['savename'] = FCPATH.$qrpath;
				$this->ciqrcode->generate($params);
				Urunler::update($insert_id,['qrcode'=>$qrpath]);
				redirect('admin/urunresimekle/'.$insert_id);
			}
		}

		$urun=Urunler::find($id);
		if($urun)
		{
			Urunler::update($id,['complete'=>1]);
			flash('success','check','Urun başarıyla eklendi.');
			redirect('admin/urunler');
		}
	
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
