<?php
require_once('controllers/base_controller.php');
require_once('models/sach.php');
require_once('models/chitietsach.php');

class sach_controller extends base_controller
{
  //phương thức khởi tạo: xác định folder chứa giao diện
  function __construct()
  {
    $this->folder = 'sach';
  }

  public function danhmucsach()
  {
    $sachs = Sach::allsach(); 
    /*$sanpham: là mảng mà mỗi phần tử là 1 đối tượng sản phẩm*/
    $data = array('sachs' => $sachs);
    /*data: mảng kết hợp có 1 key -> value  
      - key: sanphams
      - value là mảng đối tượng: $sanphams
    */
    $this->render('danhmucsach', $data);
  }


  public function themsach()
  {
    //chỉ cần gọi giao diện thêm, không cần dữ liệu
    $this->render('themsach');
  }

  
   public function xemkqthemsach()
  {
    $ma = $_POST['masach'];
    $ten = $_POST['tensach'];
    $theloai= $_POST['matl'];
    $tacgia = $_POST['matg'];
    $soluong = $_POST['soluong'];
    $ngay = $_POST['ngay'];
    $nxb = $_POST['manxb'];
    $source= $_FILES['file_upload']['tmp_name'];
    $dest = "resources/img/".$_FILES['file_upload']['name'];
    move_uploaded_file($source, $dest);
    $hinhanh="resources/img/".$_FILES['file_upload']['name'];

    
    if($ngay==null)
      $ngay = date("Y-m-d");//ngày hiện tại
   
    //Kiem tra du lieu nhap (chưa làm)
    //them san pham
    $ketqua = Sach::themsach($ma,$ten,$theloai,$tacgia,$nxb,$soluong,$ngay,$hinhanh);
    $data = array('ketqua'=>$ketqua);
    $this->render('themsach',$data);   
  }


 
  public function  suathongtinsach()
  {   
    
    if(isset($_GET['ma'])) 
      $masach = $_GET['ma'];//Lấy từ trang index.php
    
      //gọi pt từ model/sanpham.php trả về đối tượng sản phẩm
      $sachcu=Sach::findSachtheoma($masach ); 
      $data = array("sachcu"=>$sachcu);
      $this->render('suathongtinsach',$data);
  }


  public function xemkqsuasach(){
    $ma = $_POST['masach'];
    $ten = $_POST['tensach'];
    $theloai= $_POST['matl'];
    $tacgia = $_POST['matg'];
    $soluong = $_POST['soluong'];
    $ngay = $_POST['ngay'];
    $nxb = $_POST['manxb'];
  
    $source= $_FILES['file_upload']['tmp_name'];
    $dest = "resources/img/".$_FILES['file_upload']['name'];
    move_uploaded_file($source, $dest);
    $hinhanhmoi="resources/img/".$_FILES['file_upload']['name'];
    $ketquaupdate = Sach::CapNhatSach($ma,$ten,$theloai,$tacgia,$nxb,$hinhanhmoi);
    $data = array('ketquaupdate'=>$ketquaupdate);
    $this->render('xemkqsuasach',$data);

  }

    public function xoasach()
  {
    if(isset($_GET['ma'])) 
      $masp = $_GET['ma'];//Lấy từ trang index.php
    //echo "vao controller";
    $ketquaxoa = Sach::xoaSachtheoma($masp); 
    //echo $ketquaxoa;
    $data = array('ketquaxoa' => $ketquaxoa);
    $this->render('xoasach', $data);
  }

   public function loixoa()
  {
    $this->render('loixoa');
  }


 public function gdTimSach()
  {
    $this->render('gdTimSach');
  }



public function TimSachTheoMa()
  {
    $sachs = Sach::allsach(); 
    $data = array('sachs' => $sachs);
    $this->render('TimSachTheoMa', $data);
  }

  public function kqTimSachTheoMa()
  {
    $ma = $_POST['masach'];
    $ctsach = ChiTietSach::timsach($ma);
    $data = array('ctsach' => $ctsach);
    $this->render('chitietsach', $data);
  }
}


