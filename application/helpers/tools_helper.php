<?php
 function active($menu)
 {
    $ci=get_instance();
 	if($ci->uri->segment(2)==$menu)
    {
        echo "active";
    }
 }

 function menu_name()
 {
    $ci=get_instance();

    switch ($ci->uri->segment(2))
      {
         case "panel":
             echo "Anasayfa";
             break;
         case "config":
             echo "Site Ayarları";
             break;      
         case "logout":
             echo "Çıkış";
             break;
      }
  }

 function postvalue($name)
 {
    $ci=get_instance();
    return $ci->input->post($name,true);
 }

 function imageupload($name,$path,$param)
{
    $ci=get_instance();

    $config['upload_path']='assets/upload/'.$path.'/';
    $config['allowed_types']= $param;

    $ci->upload->initialize($config);
    if($ci->upload->do_upload($name))
    {       
        $image=$ci->upload->data();
        return $config['upload_path'].$image['file_name'];
    }
    return null;
}   
?>