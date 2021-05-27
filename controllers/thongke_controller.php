<?php
require_once('controllers/base_controller.php');
require_once('models/gia.php');
require_once('models/sach.php');
require_once('models/sachconlai.php');
require_once('models/thongkedoanhthu.php');

class thongke_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'thongke';
  }

  public function TK()
  {

    $this->render('TK');
  }


  
  
   public function tkSachton()
  {
    $sachcl = SachConLai::allsachcl(); 
    $data = array('sachcl' => $sachcl);
    $this->render('tkSachton', $data);
  }

  public function tkDoanhThungay()
  {

    $this->render('chonngay');
  }


 public function kqtkDoanhThungay()
  {

     $ngay = $_POST['ngay'];
     if($ngay==null)
      $ngay = date("Y-m-d");
    $DT = DoanhThu::thongkeDTngay($ngay); 
    $data = array('DT' => $DT);
    $this->render('tkDoanhThungay', $data);
  }

}