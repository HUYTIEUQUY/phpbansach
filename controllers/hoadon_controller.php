<?php
require_once('controllers/base_controller.php');
require_once('models/sach.php');
require_once('models/sachconlai.php');
require_once('models/hoadon.php');
require_once('models/gia.php');
require_once('models/chitiethoadon.php');

class hoadon_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'hoadon';
  }

  public function HD()
  {
    $this->render('HD');
  }

  public function themHD()
  {
    $this->render('themhoadon');
  }

   public function xemkqthemHD()
  {
    $so = $_POST['sohd'];
    $ngay = $_POST['ngayxuat'];
    if($ngay==null)
      $ngay = date("Y-m-d");//ngày hiện tại
   
    //Kiem tra du lieu nhap (chưa làm)
    //them san pham
    $ketqua = HoaDon::themHD($so,$ngay);
    $HD = HoaDon::Timma($so); 
    $HDs = ChiTietHoaDon::allHD($so);
    $sachs = Sach::allsach();
     
    $data = array('ketqua'=>$ketqua,'HD'=>$HD,'HDs'=>$HDs,'sachs'=>$sachs);
     if ($ketqua == 0) {
       $this->render('Loi');
     }
     else{
      $this->render('themchitietHD',$data);   
    }
  }

  public function timHD()
  {
    $HDs = HoaDon::allmaHD(); 
    $data = array('HDs' => $HDs);
    $this->render('timHD', $data);  
  }

 public function DSHDtheoma()
  { 
    $so = $_POST['sohd'];
    $HDs = ChiTietHoaDon::allHD($so); 
    $HD = HoaDon::Timma($so); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('HDs' => $HDs , 'HD' => $HD);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('DSHDtheoma', $data);
  }




   public function themchitietHD()
  {
    $so = $_POST['sohd'];
    $ma = $_POST['masach'];
    $soluong = $_POST['soluong'];
    $ngay=$_POST['ngayban'];
    $slcl =SachConLai::findSL($ma,$soluong);


	if ($slcl == 0) {
		$this->render('LoiSL');
	}
     else{
    $kq = HoaDon::themchitietHD($so,$ma,$soluong,$ngay);
    $HD = HoaDon::Timma($so); 
    $HDs = ChiTietHoaDon::allHD($so);
    $sachs = Sach::allsach();
    $gia = Gia::findGiatheoma($ma,$ngay);
    $data = array('kq'=>$kq,'HD'=>$HD,'HDs'=>$HDs,'sachs'=>$sachs,'gia'=>$gia);
    $this->render('themchitietHD',$data);    
    }

    
  }

  public function LuuHD(){
    if(isset($_GET['tienhd'])) 
      $tongtien = $_GET['tienhd'];
    if(isset($_GET['sohd'])) 
      $so = $_GET['sohd'];
    $luutienHD = HoaDon::luuTienHD($so,$tongtien);
    $data = array('luutienHD'=>$luutienHD);
    $this->render('HD',$data);

  }

  public function huyHD()
  { 
    if(isset($_GET['sohd'])) 
      $so = $_GET['sohd'];
    $kq = ChiTietHoaDon::xoaHD($so); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('kq' => $kq);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('HD', $data);
  }

 
}


