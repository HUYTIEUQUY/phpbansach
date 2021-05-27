<?php
$controllers = array(
  'home' => ['index', 'error'],
  'sach' => ['danhmucsach', 'chitietsach','themsach','xemkqthemsach','suathongtinsach','xemkqsuasach','xoasach','loixoa','gdTimSach','TimSachTheoMa','kqTimSachTheoMa'],
  'theloai' => ['danhmuctheloai', 'themtheloai','xemkqthemTL','suathongtintheloai','xemkqsuatheloai','xoatheloai','loixoa'],
  'tacgia' => ['danhmuctacgia', 'themtacgia','xemkqthemTG','suathongtintacgia','xemkqsuatacgia','xoatacgia','loixoa'],
  'phieunhap' => ['PN','dspn','themPN','themchitietPN','xemkqThemPN','DSPNtheoma','timPN','chonPN','xemkqxoa','LuuPN','huyPN'],
  'hoadon' => ['HD','themHD','timHD','DSHDtheoma','xemkqThemHD','themchitietHD','LuuHD','huyHD'],
  'nhaxuatban' => ['danhmucNXB','themNXB','xemkqthemNXB','suathongtiNXB','xemkqsuaNXB','xoaNXB','loixoa'],
  'gia'  => ['lichsugia','themgia','xemkqThemgia'],
  'thongke' => ['TK','tkSachton','tkDoanhThungay','kqtkDoanhThungay']

 ); // Các controllers và action có thể gọi

// thì gọi trang lỗi
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'home';
  $action = 'error';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
//ví dụ: sanpham_controller.php
include_once('controllers/' . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$tenClass = $controller.'_controller';
$controller = new $tenClass;
$controller->$action(); //vd: sanpham_controller -> dskhkhachhang
?>