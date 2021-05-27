<?php
class DoanhThu
{
  public $TienPN;
  public $TienHD;
  public $NgayNhap;

  
 
  function __construct($tienpn,$tienhd,$ngay)
  {
    $this->TienPN = $tienpn;
    $this->TienHD = $tienhd;
    $this->NgayNhap = $ngay;

  }

static function thongkeDTngay($ngay)
  {
    $db = DB::getInstance();
    $result = $db->prepare(' SELECT Sum(TongTienPN) as TienPN, sum(TongTienHD) as TienHD, NgayNhap FROM phieunhap p , hoadon h WHERE p.NgayNhap like :ngay AND p.NgayNhap=h.NgayBan');
    $result->execute(array('ngay' => $ngay));
    $item = $result->fetch();
    if (isset($item['NgayNhap'])) {
      return new DoanhThu($item['TienPN'], $item['TienHD'],$item['NgayNhap']);
    return null;
  }
    }



 
}



    