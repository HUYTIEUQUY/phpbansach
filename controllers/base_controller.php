<?php
class base_controller
{
  protected $folder; // Biến: thư mục nào đó trong thư mục views
  protected $pageURL;
  // Hàm hiển thị kết quả ra cho người dùng.
  function render($file, $data = array())
  {
    //vd: views/sanpham/index.php
    $view_file = 'views/'.$this->folder.'/'.$file.'.php';
    if(is_file($view_file)){ 
      extract($data);
      //bắt đầu ghi toàn bộ nội dung của file trong $view_file vào catche
      ob_start(); 
      require_once $view_file;
      //lấy nội dung trong catche lưu vào biến $content (chưa hiển thị)
      $content=ob_get_contents(); //biến chứa nội dung hiển thị 
      ob_clean();//xóa vùng đệm
      require_once ('views/layouts/application.php'); //giao diện trang web
    }
    else{ //không có file trong thư mục view --> chuyển trang báo lỗi
      header('Location: index.php?controller=home&action=error');
    }
  }








  public function currentPageURL()
  {
    $this->pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on")
    {
      $this->pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80")
    {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }
    else
    {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
  }
}
