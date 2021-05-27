<?php
require_once('controllers/base_controller.php');
require_once('models/PN.php');
require_once('models/sach.php');
require_once('models/sachconlai.php');
require_once('models/nhaxuatban.php');
require_once('models/chitietphieunhap.php');

class phieunhap_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'phieunhap';
  }

  public function PN()
  {
    $this->render('PN');
  }

  public function themPN()
  {
    $this->render('themphieunhap');
  }

   public function xemkqthemPN()
  {
    $so = $_POST['sopn'];
    $manxb = $_POST['nxb'];
    $ngay = $_POST['ngaynhap'];
    if($ngay==null)
      $ngay = date("Y-m-d");//ngày hiện tại
   
    //Kiem tra du lieu nhap (chưa làm)
    //them san pham
    $ketqua = PhieuNhapPN::themPN($so,$ngay,$manxb);
    $PN = PhieuNhapPN::Timma($so); 
    $PNs = ChiTietPhieuNhap::allPN($so);
    $sachs = Sach::allsach();

    $nxb = NhaXuatBan::allNXB();

    $data = array('ketqua'=>$ketqua,'PN'=>$PN,'PNs'=>$PNs,'sachs'=>$sachs,'nxb'=>$nxb);
     if ($ketqua == 0) {
       $this->render('Loi');
     }
     else{
      $this->render('themchitietPN',$data);   
    }
  }

  public function themchitietPN()
  {
    $so = $_POST['sopn'];
    $ma = $_POST['masach'];
    $soluongnhap = $_POST['soluong'];
    $gia = $_POST['gia'];

    $ngay=$_POST['ngaynhap'];

    $ketqua = PhieuNhapPN::themchitietPN($so,$ma,$soluongnhap,$gia);
    $PN = PhieuNhapPN::Timma($so);
    $PNs = ChiTietPhieuNhap::allPN($so);
     $sachs = Sach::allsach();
     $nxb = NhaXuatBan::allNXB();

     $slcl =SachConLai::findSLtheoma($ma,$soluongnhap);


    $data = array('ketqua'=>$ketqua,'PN'=>$PN,'PNs'=>$PNs,'sachs'=>$sachs,'nxb'=>$nxb);
    $this->render('themchitietPN',$data);   
  }


   public function timPN()
  {
    $PNs = PhieuNhapPN::allmaPN(); 
    $data = array('PNs' => $PNs);
    $this->render('timPN', $data);  
  }

 public function chonPN()
  {
    $PNs = PhieuNhapPN::allmaPN(); 
    $data = array('PNs' => $PNs);
    $this->render('giaodienxoaPN', $data);  
  }

  public function DSPNtheoma()
  { 
    $sopn = $_POST['sopn'];
    $PNs = ChiTietPhieuNhap::allPN($sopn); 
    $PN = PhieuNhapPN::Timma($sopn); 
    $data = array('PNs'=>$PNs,'PN' => $PN);
    $this->render('DSPNtheoma', $data);
  }

  public function xemkqxoa()
  { 
    $sopn = $_POST['sopn'];
    $kq = ChiTietPhieuNhap::xoaPN($sopn); 

    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('kq' => $kq);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('xemkqxoa', $data);
  }

  public function huyPN()
  { 
    if(isset($_GET['sopn'])) 
      $so = $_GET['sopn'];
    $kq = ChiTietPhieuNhap::xoaPN($so); 

    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('kq' => $kq);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('PN', $data);
  }

    public function LuuPN(){
    if(isset($_GET['tienpn'])) 
      $tongtien = $_GET['tienpn'];
    if(isset($_GET['sopn'])) 
      $so = $_GET['sopn'];

  
   
    
    $luutienPN = PhieuNhapPN::luuTienPN($so,$tongtien);
    $data = array('luutienPN'=>$luutienPN);
    $this->render('PN',$data);

  }


}


