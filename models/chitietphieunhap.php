<?php
class ChiTietPhieuNhap
{
  public $SoPN;
  public $TenSach;
  public $SoLuongNhap;
  public $GiaNhap;
  public $NgayNhap;

  
 
  function __construct($sopn,$tensach,$soluong,$gia,$ngaynhap)
  {
    $this->SoPN = $sopn;
    $this->TenSach = $tensach;
    $this->SoLuongNhap = $soluong;
    $this->GiaNhap = $gia;
    $this->NgayNhap = $ngaynhap;

  }

static function allPN($ma)
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('
     SELECT *
      FROM sach s, phieunhap p, chitietphieunhap c
      WHERE s.MaSach=c.MaSach AND p.SoPN=c.SoPN AND p.SoPN= :ma ');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute(array('ma' => $ma));
    foreach ($result->fetchAll() as $item){
      $list[] = new ChiTietPhieuNhap($item['SoPN'], $item['TenSach'], $item['SoLuongNhap'], $item['GiaNhap'],$item['NgayNhap']);
     }
      return $list;
    }


 
   static function xoaPN($ma)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
       

        delete FROM chitietphieunhap WHERE SoPN = :ma;

        delete FROM phieunhap where SoPN= :ma;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    //echo "goi controller2";
    return 1; 

  }


}



    