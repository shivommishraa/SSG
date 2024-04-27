<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//require_once('PHPExcel.php');
  require_once APPPATH . "/third_party/PHPExcel_FILE/Classes/PHPExcel.php";
   ///require_once APPPATH . "/third_party/PHPExcel_FILE/Classes/PHPExcel/Writer/Excel2007.php";
 
 // require(APPPATH . '/third_party/PHPExcel_FILE/Classes/PHPExcel.php');
  //require(APPPATH . '/third_party/PHPExcel_FILE/Classes/PHPExcel/Writer/Excel2007.php');

class Excel extends PHPExcel{
 public function __construct(){
  parent::__construct();
 }
}

?>