<div class="container">
<div class="row">
<div class="col-12">  
<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top" >
  <a class="navbar-brand" href="#">
    <img src="resources/img/chimcanhcut.png" alt="logo" style="width:40px;">
  </a>
  <ul class="navbar-nav">

     <!-- Trang chủ -->
    <li class="nav-item">
      <a class="nav-link" href="index.php?controller=home&action=index">Trang chủ</a>
    </li>


    <!-- Sách -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  id="navbardrop" data-toggle="dropdown">
        Sách
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=sach&action=danhmucsach">Danh mục sách</a>
        <a class="dropdown-item" href="index.php?controller=sach&action=themsach">Thêm sách</a>
        <a class="dropdown-item" href="index.php?controller=sach&action=gdTimSach">Tìm kiếm sách</a>
      </div>
    </li>

    <!-- Thể loại -->
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Thể loại
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=theloai&action=danhmuctheloai">Danh mục thể loại</a>
        <a class="dropdown-item" href="index.php?controller=theloai&action=themtheloai">Thêm thể loại</a>
        <a class="dropdown-item" href="#">Tìm kiếm thể loại</a>
      </div>
    </li>

    <!-- Tác giả -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Tác giả
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=tacgia&action=danhmuctacgia">Danh mục tác giả</a>
        <a class="dropdown-item" href="index.php?controller=tacgia&action=themtacgia">Thêm tác giả</a>
        <a class="dropdown-item" href="#">Tìm kiếm tác giả</a>
      </div>
    </li>

    
  <!-- Nhà xuất bản-->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
        NXB
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=nhaxuatban&action=danhmucNXB">Danh sách nhà xuất bản</a>
        <a class="dropdown-item" href="index.php?controller=nhaxuatban&action=themNXB">Thêm nhà xuất bản</a>
        <a class="dropdown-item" href="index.php?controller=hoadon&action=HD">Tìm kiếm xuất bản</a>
      </div>
    </li>


    <!-- Giá-->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
        Giá
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=gia&action=lichsugia">Lịch sử giá</a>
        <a class="dropdown-item" href="index.php?controller=hoadon&action=HD">Thêm giá</a>
        <a class="dropdown-item" href="index.php?controller=hoadon&action=HD">Tìm giá</a>
      </div>
    </li>

    <!-- Phiếu nhập-->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
        Phiếu nhập
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=phieunhap&action=timPN">Tìm phiếu nhập</a>
        <a class="dropdown-item" href="index.php?controller=phieunhap&action=themPN">Lập phiếu nhập</a>
        <a class="dropdown-item" href="index.php?controller=phieunhap&action=chonPN">xoá phiếu nhập</a>
      </div>
    </li>


       <!-- Hoá đơn-->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
        Hoá đơn
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?controller=hoadon&action=timHD">Tìm hoá đơn</a>
        <a class="dropdown-item" href="index.php?controller=hoadon&action=themHD">Lập hoá đơn</a>
        <a class="dropdown-item" href="index.php?controller=hoadon&action=HD">Xoá hoá đơn</a>
      </div>
    </li>



  </ul>
</nav>
</div>
</div>
</div>
