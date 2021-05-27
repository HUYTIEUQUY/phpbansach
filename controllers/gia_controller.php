<?php
require_once('controllers/base_controller.php');
require_once('models/gia.php');
require_once('models/sach.php');

class gia_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'gia';
  }

  public function lichsugia()
  {
    $gia = Gia::lichsugia(); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('gia' => $gia);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('lichsugia', $data);
  }


  public function themgia()
  {
    $sachs = Sach::allsach(); 
    $data = array('sachs' => $sachs);
    $this->render('themgia', $data);
  }

  
   public function xemkqThemgia()
  {
    $ma = $_POST['masach'];
    $ngay = $_POST['ngay'];
    $gia = $_POST['gia'];
   if($ngay==null)
      $ngay = date("Y-m-d");
    $ketqua = Gia::themgia($ma,$gia,$ngay);
    $gia = Gia::lichsugia(); 
    $data = array('ketqua'=>$ketqua, 'gia' => $gia);
    $this->render('lichsugia',$data);   
  }


}