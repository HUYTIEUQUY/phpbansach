<?php
class ChiTietHoaDon
{
  public $SoHD;
  public $TenSach;
  public $SoLuongXuat;
  public $GiaBan;
  public $NgayXuat;



  
 
  function __construct($sohd,$tensach,$soluong,$gia,$ngay)
  {
    $this->SoHD = $sohd;
    $this->TenSach = $tensach;
    $this->SoLuongBan = $soluong;
    $this->GiaBan = $gia;
    $this->NgayBan = $ngay;

  }

static function allHD($ma)
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('
     SELECT *
      FROM sach s, hoadon h, chitiethoadon c , gia g
      WHERE s.MaSach=c.MaSach AND h.SoHD=c.SoHD AND g.MaSach=s.MaSach AND h.SoHD = :ma ');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute(array('ma' => $ma));
    foreach ($result->fetchAll() as $item) {
      $list[] = new ChiTietHoaDon($item['SoHD'], $item['TenSach'], $item['SoLuongBan'], $item['GiaBan'],$item['NgayBan']);
     }
      return $list;
    }


    static function xoaHD($so)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
       

        delete FROM chitiethoadon WHERE SoHD = :so;

        delete FROM hoadon where SoPN= :so;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('so' => $so));
    //echo "goi controller2";
    return 1; 

  }


}



    