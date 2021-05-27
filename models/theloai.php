<?php
class TheLoai
{
  public $MaTL;
  public $TenTL;
  
 
  function __construct($ma, $ten)
  {
    $this->MaTL = $ma;
    $this->TenTL = $ten;

  }

  static function allTL()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM theloai');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new TheLoai($item['MaTL'], $item['TenTL']);
    }
    return $list;
  }


  static function themtheloai($ma,$ten)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect MaTL from theloai where MaTL= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
    //Kiểm tra dữ liệu hợp lệ (Làm sau)
    //Kiem tra trung khoa chinh
    if(isset($item['MaTL']))
    {
      return 0;
    }

    $lenhsql="
     INSERT INTO theloai(MaTL,TenTL) VALUES (:ma,:ten)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ten', $ten);
    $stmt->execute();

    return 1;
  }

  static function findTLtheoma($ma)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM theloai WHERE MaTL = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaTL'])) {
      return new TheLoai($item['MaTL'], $item['TenTL']);
    }
    return null;
  }


   static function CapNhatTL($ma,$ten)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update theloai set TenTL = :ten where MaTL= :ma');     
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


   static function xoaTLtheoma($ma)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    
    $result = $db->prepare('select * FROM sach WHERE MaTL = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaTL'])) {
      return 0;
    }
    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
        delete FROM sach WHERE MaTL = :ma;

        delete FROM theloai WHERE MaTL = :ma;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    //echo "goi controller2";
    return 1; 

  }



  
}



    