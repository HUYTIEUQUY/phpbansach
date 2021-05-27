<?php
require_once('controllers/base_controller.php');
require_once('models/theloai.php');

class theloai_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'theloai';
  }

  public function danhmuctheloai()
  {
    $TLs = TheLoai::allTL(); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('TLs' => $TLs);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('danhmuctheloai', $data);
  }


  public function themtheloai()
  {
    //chỉ cần gọi giao diện thêm, không cần dữ liệu
    $this->render('themtheloai');
  }

  
   public function xemkqthemTL()
  {
    $ma = $_POST['matl'];
    $ten = $_POST['tentl'];
   
    $ketqua = TheLoai::themtheloai($ma,$ten);
    $data = array('ketqua'=>$ketqua);
    $this->render('themtheloai',$data);   
  }


 
  public function  suathongtintheloai()
  {   
    
    if(isset($_GET['ma'])) 
      $matl = $_GET['ma'];//Lấy từ trang index.php
    
      //gọi pt từ model/sanpham.php trả về đối tượng sản phẩm
      $theloaicu=TheLoai::findTLtheoma($matl); 
      $data = array("theloaicu"=>$theloaicu);
      $this->render('suathongtintheloai',$data);
  }


  public function xemkqsuatheloai(){
    $ma = $_POST['matl'];
    $ten = $_POST['tentl'];
    $ketquaupdate = TheLoai::CapNhatTL($ma,$ten);
    $data = array('ketquaupdate'=>$ketquaupdate);
    $this->render('xemkqsuatheloai',$data);

  }

    public function xoatheloai()
  {
    if(isset($_GET['ma'])) 
      $matl = $_GET['ma'];//Lấy từ trang index.php
    //echo "vao controller";
    $ketquaxoa = TheLoai::xoaTLtheoma($matl); 
    //echo $ketquaxoa;
    $data = array('ketquaxoa' => $ketquaxoa);
    $this->render('xoatheloai', $data);
  }

   public function loixoa()
  {
    $this->render('loixoa');
  }



}