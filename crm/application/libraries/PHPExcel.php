<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* save to libraries as Excel.php
 *  ======================================= 
 *  Author     : Muhammad Surya Ikhsanudin 
 *  License    : Protected 
 *  Email      : mutofiyah@gmail.com 
 *   
 *  Dilarang merubah, mengganti dan mendistribusikan 
 *  ulang tanpa sepengetahuan Author 
 *  ======================================= 
 */  
require_once APPPATH."./third_party/PHPExcel.php"; 
 
Class PHPExcel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}
?>