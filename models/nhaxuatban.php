<?php
class NhaXuatBan
{
  public $MaNXB;
  public $TenNXB;

 
  function __construct($ma, $ten)
  {
    $this->MaNXB = $ma;
    $this->TenNXB = $ten;

  }

  static function allNXB()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM nhaxuatban');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new NhaXuatBan($item['MaNXB'], $item['TenNXB']);
    }
    return $list;
  }


  static function themNXB($ma,$ten)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect MaNXB from nhaxuatban where MaNXB= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
    //Kiểm tra dữ liệu hợp lệ (Làm sau)
    //Kiem tra trung khoa chinh
    if(isset($item['MaNXB']))
    {
      return 0;
    }

    $lenhsql="
     INSERT INTO nhaxuatban(MaNXB,TenNXB) VALUES (:ma,:ten)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ten', $ten);
    $stmt->execute();

    return 1;
  }

  static function findNXBtheoma($ma)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM nhaxuatban WHERE MaNXB = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaNXB'])) {
      return new NhaXuatBan($item['MaNXB'], $item['TenNXB']);
    }
    return null;
  }


   static function CapNhatNXB($ma,$ten)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update nhaxuatban set TenNXB = :ten where MaNXB= :ma');     
      $sql->bindParam(':ma', $ma);
      $sql->bindParam(':ten', $ten);
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


   static function xoaNXBtheoma($ma)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    
    $result = $db->prepare('select * FROM sach WHERE MaNXB = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaNXB'])) {
      return 0;
    }

     $result = $db->prepare('select * FROM phieunhap WHERE MaNXB = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaNXB'])) {
      return 0;
    }

    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
        delete FROM sach WHERE MaNXB = :ma;

        delete FROM nhaxuatban WHERE MaNXB = :ma;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    //echo "goi controller2";
    return 1; 

  }



  
}



    