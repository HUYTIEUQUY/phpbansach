<?php
require_once('controllers/base_controller.php');
require_once('models/nhaxuatban.php');

class nhaxuatban_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'nhaxuatban';
  }

  public function danhmucNXB()
  {
    $NXBs = NhaXuatBan::allNXB(); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('NXBs' => $NXBs);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('danhmucNXB', $data);
  }


  public function themNXB()
  {
    //chỉ cần gọi giao diện thêm, không cần dữ liệu
    $this->render('themNXB');
  }

  
   public function xemkqthemNXB()
  {
    $ma = $_POST['manxb'];
    $ten = $_POST['tennxb'];
   
    $ketqua = NhaXuatBan::themNXB($ma,$ten);
    $data = array('ketqua'=>$ketqua);
    $this->render('themNXB',$data);   
  }


 
  public function  suathongtiNXB()
  {   
    
    if(isset($_GET['ma'])) 
      $manxb = $_GET['ma'];//Lấy từ trang index.php
    
      //gọi pt từ model/sanpham.php trả về đối tượng sản phẩm
      $nxbcu=NhaXuatBan::findNXBtheoma($manxb); 
      $data = array("nxbcu"=>$nxbcu);
      $this->render('suathongtinNXB',$data);
  }


  public function xemkqsuaNXB(){
    $ma = $_POST['manxb'];
    $ten = $_POST['tennxb'];
    $ketquaupdate = NhaXuatBan::CapNhatNXB($ma,$ten);
    $data = array('ketquaupdate'=>$ketquaupdate);
    $this->render('xemkqsuaNXB',$data);

  }

    public function xoaNXB()
  {
    if(isset($_GET['ma'])) 
      $manxb = $_GET['ma'];//Lấy từ trang index.php
    //echo "vao controller";
    $ketquaxoa = NhaXuatBan::xoaNXBtheoma($manxb); 
    //echo $ketquaxoa;
    $data = array('ketquaxoa' => $ketquaxoa);
    $this->render('xoaNXB', $data);
  }

   public function loixoa()
  {
    $this->render('loixoa');
  }



}