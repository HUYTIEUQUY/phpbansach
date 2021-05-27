<?php
class Gia
{
  public $MaSach;
  public $GiaBan;
  public $NgayCapNhat;


 
  function __construct($ma, $gia,$ngaycn)
  {
    $this->MaSach = $ma;
    $this->Gia = $gia;
    $this->NgayCapNhat = $ngaycn;


  }


  static function findGiatheoma($ma,$ngay)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM gia WHERE MaSach = :ma and NgayCapNhat < :ngay');
    $result->execute(array('ma' => $ma, 'ngay' => $ngay));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      return new Gia($item['MaSach'], $item['GiaBan'],$item['NgayCapNhat']);
    return null;
  }

    }
   static function lichsugia()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM gia');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new Gia($item['MaSach'], $item['GiaBan'],$item['NgayCapNhat']);
    }
    return $list;
  }

   static function themgia($ma,$gia,$ngay)
  {
    $db=DB::getInstance();

    $lenhsql="
     INSERT INTO gia(MaSach,GiaBan,NgayCapNhat) VALUES (:ma,:gia,:ngay)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':ngay', $ngay);
    $stmt->execute();

    return 1;
  }

}



    