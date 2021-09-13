<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2)!='login' )
		{
			redirect('admin');			
		}
	}
	
	public function index()
	{
		if($this->session->userdata('adminlogin')){redirect('admin/panel');}
		$this->load->view('admin/login.php');
	}

	public function login()
	{
		$admininfo=Admindb::find(['email'=>$this->input->post('email'),'password'=>$this->input->post('password')]);
		if($admininfo)
		{
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$admininfo);
			redirect('admin/panel',$admininfo); 
		}else
		{
			$hata="email adresi veya şifre hatalı.";
			$this->session->set_flashdata('error',$hata);
			redirect('admin');
		}		
	}

	public function panel()
	{
		$this->load->view('admin/panel.php');
	}

	public function config()
	{
		$this->load->view('admin/config');
	}

	public function web_settings()
	{
		$config=ayarlar::find(postvalue('id'));
		$data=['title'=>postvalue('title'),
			   'info'=>postvalue('info'),
			   'email'=>postvalue('email'),
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
		
		Web_setting::update(postvalue('id'),$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}
