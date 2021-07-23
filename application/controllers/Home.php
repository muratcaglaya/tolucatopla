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
		switch($category)
		{
			  case'erkek':
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>1]);
			  		$data['urunler']=Urunler::select(['category'=>1,'active'=>1]);
			  		$data['pageinfo']=['title'=>'ERKEK','subtitle'=>'Yeni Sezon Trend Erkek Ürünleri','image'=>'empty'];
			  break; 
			  case'kadin':
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>2]);
			  		$data['urunler']=Urunler::select(['category'=>2,'active'=>1]);
			  		$data['pageinfo']=['title'=>'KADIN','subtitle'=>'Yeni Sezon Trend Kadın Ürünleri','image'=>'empty'];
			  break;
			  case'cocuk':
			  		$data['Kategoriler']=Kategori::select(['topcategory'=>3]);
			  		$data['urunler']=Urunler::select(['category'=>3,'active'=>1]);
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