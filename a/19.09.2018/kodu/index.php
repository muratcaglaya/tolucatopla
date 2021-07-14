<?php
include('Files_pc/css/mobil_detect/mobile_detect.php'); 
  $bunebu=new Mobile_Detect(); 
  if($bunebu->isMobile())
  { 
  	echo 'Mobil Tarafı yapım aşamasındadır';
  }
  elseif($bunebu->isTablet())
  { 
  	echo 'Tablet';
  } 
  else
  {
	 header("Location:Files_pc/index.php");
  }
  ?>
