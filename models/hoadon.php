<?php
class HoaDon
{
  public $SoHD;
  public $NgayBan;
  
 
  function __construct($so, $ngay)
  {
    $this->SoHD = $so;
    $this->NgayBan = $ngay;

  }

  static function allmaHD()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM hoadon ');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new HoaDon($item['SoHD'],$item['NgayBan']);
    }
    return $list;
  }

  static function Timma($ma)
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM hoadon where SoHD = :ma');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute(array('ma' => $ma));
    foreach ($result->fetchAll() as $item) {
      $list[] = new HoaDon($item['SoHD'], $item['NgayBan']);
     }
      return $list;
    }


     static function themHD($ma,$ngay)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect SoHD from hoadon where SoHD= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
     if(isset($item['SoHD']))
    {
      return 0;
    }
   
     $lenhsql="
     INSERT INTO hoadon(SoHD,NgayBan) VALUES (:ma,:ngay)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ngay', $ngay);
    $stmt->execute();

    return 1;
  }

  static function themchitietHD($sohd,$ma,$soluong,$gia)
  {
    $db=DB::getInstance();
     $lenhsql="
     INSERT INTO chitiethoadon(SoHD,MaSach,SoLuongBan) VALUES (:so, :ma, :soluong)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':so', $sohd);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->execute();

    return 1;
  }

    static function LuuTienHD($so,$tien)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update hoadon set TongTienHD = :tien where SoHD= :so');     
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

 }
 ?>