<?php
class TacGia
{
  public $MaTG;
  public $TenTG;

 
  function __construct($ma, $ten)
  {
    $this->MaTG = $ma;
    $this->TenTG = $ten;

  }

  static function allTG()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM tacgia');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new TacGia($item['MaTG'], $item['TenTG']);
    }
    return $list;
  }


  static function themtacgia($ma,$ten)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect MaTG from tacgia where MaTG= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
    //Kiểm tra dữ liệu hợp lệ (Làm sau)
    //Kiem tra trung khoa chinh
    if(isset($item['MaTG']))
    {
      return 0;
    }

    $lenhsql="
     INSERT INTO tacgia(MaTG,TenTG) VALUES (:ma,:ten)
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ten', $ten);
    $stmt->execute();

    return 1;
  }

  static function findTGtheoma($ma)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM tacgia WHERE MaTG = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaTG'])) {
      return new TacGia($item['MaTG'], $item['TenTG']);
    }
    return null;
  }


   static function CapNhatTG($ma,$ten)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update tacgia set TenTG = :ten where MaTG= :ma');     
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


   static function xoaTGtheoma($ma)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    
    $result = $db->prepare('select * FROM sach WHERE MaTG = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaTG'])) {
      return 0;
    }
    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
        delete FROM sach WHERE MaTG = :ma;

        delete FROM tacgia WHERE MaTG = :ma;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    //echo "goi controller2";
    return 1; 

  }



  
}



    