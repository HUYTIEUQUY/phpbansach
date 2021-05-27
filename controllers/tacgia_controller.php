<?php
require_once('controllers/base_controller.php');
require_once('models/tacgia.php');

class tacgia_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'tacgia';
  }

  public function danhmuctacgia()
  {
    $TGs = TacGia::allTG(); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('TGs' => $TGs);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('danhmuctacgia', $data);
  }


  public function themtacgia()
  {
    //chỉ cần gọi giao diện thêm, không cần dữ liệu
    $this->render('themtacgia');
  }

  
   public function xemkqthemTG()
  {
    $ma = $_POST['matg'];
    $ten = $_POST['tentg'];
   
    $ketqua = TacGia::themtacgia($ma,$ten);
    $data = array('ketqua'=>$ketqua);
    $this->render('themtacgia',$data);   
  }


 
  public function  suathongtintacgia()
  {   
    
    if(isset($_GET['ma'])) 
      $matg = $_GET['ma'];//Lấy từ trang index.php
    
      //gọi pt từ model/sanpham.php trả về đối tượng sản phẩm
      $tacgiacu=TacGia::findTGtheoma($matg); 
      $data = array("tacgiacu"=>$tacgiacu);
      $this->render('suathongtintacgia',$data);
  }


  public function xemkqsuatacgia(){
    $ma = $_POST['matg'];
    $ten = $_POST['tentg'];
    $ketquaupdate = TacGia::CapNhatTG($ma,$ten);
    $data = array('ketquaupdate'=>$ketquaupdate);
    $this->render('xemkqsuatacgia',$data);

  }

    public function xoatacgia()
  {
    if(isset($_GET['ma'])) 
      $matg = $_GET['ma'];//Lấy từ trang index.php
    //echo "vao controller";
    $ketquaxoa = TacGia::xoaTGtheoma($matg); 
    //echo $ketquaxoa;
    $data = array('ketquaxoa' => $ketquaxoa);
    $this->render('xoatacgia', $data);
  }

   public function loixoa()
  {
    $this->render('loixoa');
  }



}