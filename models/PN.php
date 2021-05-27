<?php
class PhieuNhapPN
{
  public $SoPN;
  public $NgayNhap;
  public $TenNXB;

  
 
  function __construct($sopn,$ngaynhap,$nxb)
  {
    $this->SoPN = $sopn;
    $this->NgayNhap = $ngaynhap;
    $this->TenNXB = $nxb;

  }

static function allmaPN()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM phieunhap p,nhaxuatban n WHERE p.MaNXB=n.MaNXB ');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new PhieuNhapPN($item['SoPN'],$item['NgayNhap'],$item['TenNXB']);
    }
    return $list;
  }

  static function Timma($ma)
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM phieunhap p,nhaxuatban n WHERE p.MaNXB=n.MaNXB AND SoPN = :ma');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute(array('ma' => $ma));
    foreach ($result->fetchAll() as $item) {
      $list[] = new PhieuNhapPN($item['SoPN'], $item['NgayNhap'], $item['TenNXB']);
     }
      return $list;
    }


static function themchitietPN($sopn,$ma,$soluong,$gia)
  {
    $db=DB::getInstance();
     $lenhsql="
     INSERT INTO chitietphieunhap(SoPN,MaSach,SoLuongNhap,GiaNhap) VALUES (:so, :ma, :soluong, :gia)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':so', $sopn);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->bindParam(':gia', $gia);
    $stmt->execute();
    return 1;
  }

  static function themPN($ma,$ngay,$nxb)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect SoPN from phieunhap where SoPN= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
     if(isset($item['SoPN']))
    {
      return 0;
    }
   
     $lenhsql="
     INSERT INTO phieunhap(SoPN,NgayNhap,MaNXB) VALUES (:ma,:ngay,:nxb)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ngay', $ngay);
    $stmt->bindParam(':nxb', $nxb);
    $stmt->execute();

    return 1;
  }

  static function findPNtheoma($ma)
  {
    $db = DB::getInstance();
    $lenhsql="
      SELECT *
      FROM sach s, phieunhap p, chitietphieunhap c
      WHERE s.MaSach=c.MaSach AND p.SoPN=c.SoPN AND p.SoPN = :ma
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['SoPN'])) {
      return new TheLoai($item['MaTL'], $item['TenTL']);
    }
    return null;
  }

   static function LuuTienPN($so,$tien)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update phieunhap set TongTienPN = :tien where SoPN= :so');     
      $sql->bindParam(':tien', $tien);
      $sql->bindParam(':so', $so);
      $pdoExec = $sql->execute();
      if($pdoExec)
        return 1;
      else
        return 0;
    }
    catch(Exception $e )
    {
        echo "có lỗi".$e->getMessage();
    }
  }
  

  static function findPNtheongay($ngay)
  {
    $db = DB::getInstance();
    $lenhsql="
      SELECT *
      FROM  phieunhap 
      WHERE ngay = :ngay
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['SoPN'])) {
      return new TheLoai($item['MaTL'], $item['TenTL']);
    }
    return null;
  }


}



    