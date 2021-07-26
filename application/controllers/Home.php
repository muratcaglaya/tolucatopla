<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('front/home');
	}

	public function product($seo)
	{
		$product=Urunler::find(['seo'=>$seo]);
		if(($product)and($product->active==1))
		{
			$data['product']=$product;
			$data['stocks']=Stoklar::group('suboption',['product'=>$product->id]);
			$data['images']=Resimler::select(['product'=>$product->id],['master'=>'DESC']);
			$data['stocktype']=StokTipi::find(['product'=>$product->id]);
			$this->load->view('front/product/product',$data);
		}

	}

	public function getstock()
	{
		$product=postvalue('product');
		$stockid=postvalue('firststock');
		$type=StokTipi::find(['product'=>$product]);
		if($type->options2==null)
		{
			$stocks=Stoklar::select(['product'=>$product,'suboption'=>$stockid]);
			echo json_encode($stocks);
		}
		else
		{
			$stocks=Stoklar::join(['suboptions','suboptions.id','stocks.suboption2'],['product'=>$product,'suboption'=>$stockid]);
			echo json_encode($stocks);	
		}

	}
	public function getcountstock()
	{
		$product=postvalue('product');
		$optionid=postvalue('firststock');
		$optionid2=postvalue('secondstock');

		$stocks=Stoklar::find(['product'=>$product,'suboption'=>$optionid,'suboption2'=>$optionid2]);
		echo $stocks->stock;
	}

	public function category($category)
	{
		$this->db->select("id,title,seo,discount,price, IFNULL(discount,price) as price2");
		$this->db->from('products');

		if($this->input->get('price'))
		{
			switch ($this->input->get('price')) {
				case 'highttolow':	
					$this->db->order_by('price2','DESC');					
					break;
				case 'lowtohight':
					$this->db->order_by('price2','ASC');
					break;

				default:
					break;
			}
		}else
		{
			$this->db->order_by('id','RANDOM');
		}

		switch($category)
		{
			  case'erkek':
			  		$product=$this->db->where(['active'=>1,'category'=>1])->get()->result();
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>1]);$data['bannerimage']='erkeksayfasi.jpg';
			  		$data['urunler']=$product;
			  		$data['pageinfo']=['title'=>'ERKEK','subtitle'=>'Yeni Sezon Trend Erkek Ürünleri','image'=>'empty'];
			  break; 
			  case'kadin':
			  		$product=$this->db->where(['active'=>1,'category'=>2])->get()->result();
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>2]);$data['bannerimage']='kadinsayfasi.jpg';
			  		$data['urunler']=$product;
			  		$data['pageinfo']=['title'=>'KADIN','subtitle'=>'Yeni Sezon Trend Kadın Ürünleri','image'=>'empty'];
			  break;
			  case'cocuk':
			  		$product=$this->db->where(['active'=>1,'category'=>3])->get()->result();
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>3]);$data['bannerimage']='cocuksayfasi.jpg';
			  		$data['urunler']=$product;
			  		$data['pageinfo']=['title'=>'ÇOCUK','subtitle'=>'Yeni Sezon Trend Çocuk Ürünleri','image'=>'empty'];
			  break;
			  default:
			  		///hata kodu
			  break;
		}
		$this->load->view('front/category/category',$data);
	}
	public function subcategory($category,$subcategory)
	{
		echo $category.' '.$subcategory;
	}
}







?>