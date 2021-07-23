<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('front/home');
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