<?php
class Sach
{
  public $MaSach;
  public $TenSach;
  public $MaTL;
  public $MaNXB;
  public $MaTG;
  public $HinhAnh;
 
  function __construct($ma, $ten, $theloai,$nxb,$tg, $hinhanh)
  {
    $this->MaSach = $ma;
    $this->TenSach = $ten;
    $this->MaTL = $theloai;
    $this->MaNXB = $nxb;
    $this->MaTG = $tg;
    $this->HinhAnh = $hinhanh;

  }

  static function allsach()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sach');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new Sach($item['MaSach'], $item['TenSach'], $item['MaTL'],$item['MaNXB'], $item['MaTG'], $item['HinhAnh']);
    }
    return $list;
  }


  static function themsach($ma,$ten,$theloai,$tacgia,$nxb,$soluong=0.0,$ngay,$hinhanh)
  {
    $db=DB::getInstance();
    $sql = $db->prepare('SeLect MaSach from sach where MaSach= :ma');
    $sql ->execute(array('ma' => $ma));
    $item = $sql->fetch();
    //Kiểm tra dữ liệu hợp lệ (Làm sau)
    //Kiem tra trung khoa chinh
    if(isset($item['MaSach']))
    {
      return 0;
    }

    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
        INSERT INTO sach(MaSach,TenSach,MaTL,MaTG,MaNXB,HinhAnh) 
        VALUES (:ma,:ten,:theloai,:tacgia,:nxb,:hinhanh);

        INSERT INTO sachconlai(MaSach,Ngay,SoLuongConLai) 
        VALUES (:ma,:ngay,:soluongconlai);

        COMMIT;
        ROLLBACK;
      ";
    $stmt = $db->prepare($lenhsql);
    $stmt->bindParam(':ma', $ma); //gán biến cho :xxxx
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':theloai', $theloai);
    $stmt->bindParam(':tacgia', $tacgia);
    $stmt->bindParam(':nxb', $nxb);
    $stmt->bindParam(':ngay', $ngay);
    $stmt->bindParam(':soluongconlai', $soluong); 
    $stmt->bindParam(':hinhanh', $hinhanh);
    $stmt->execute();

    return 1;
  }

  static function findSachtheoma($ma)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sach WHERE MaSach = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      return new Sach($item['MaSach'], $item['TenSach'], $item['MaTL'],$item['MaTG'],$item['MaNXB'],$item['HinhAnh']);
    }
    return null;
  }


   static function CapNhatSach($ma,$ten,$theloai,$tacgia,$nxb,$hinhanhmoi)
  {
    try{
      $db=DB::getInstance();
      $sql = $db->prepare('Update sach set TenSach = :ten, MaTL=:theloai,MaTG = :tacgia, MaNXB=:nxb, hinhanh=:hinhanhmoi where MaSach= :ma');     
      $sql->bindParam(':ma', $ma);
      $sql->bindParam(':ten', $ten);
      $sql->bindParam(':theloai', $theloai);
      $sql->bindParam(':tacgia', $tacgia);
      $sql->bindParam(':nxb', $nxb);
      $sql->bindParam(':hinhanhmoi', $hinhanhmoi);
      
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


   static function xoaSachtheoma($ma)
  {
    //echo "goi controller1";
    $db = DB::getInstance();
    $result = $db->prepare('select * FROM sachconlai WHERE MaSach = :ma');
    $result->execute(array('ma' => $ma));
    foreach ($result->fetchAll() as $item) {
      if($item['SoLuongConLai'] > 0)
        return 0;
    }
       
    $result = $db->prepare('select * FROM chitiethoadon WHERE MaSach = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      return 0;
    }

    $result = $db->prepare('select * FROM chitietphieunhap WHERE MaSach = :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      return 0;
    }
    
    $lenhsql="
      SET AUTOCOMMIT = 0;
      START TRANSACTION;
      BEGIN; 
        delete FROM sach WHERE MaSach = :ma;

        delete FROM chitiethoadon WHERE MaSach = :ma;

        delete FROM chitietphieunhap WHERE MaSach = :ma;

        COMMIT;
        ROLLBACK;
      ";
    $result = $db->prepare($lenhsql);
    $result->execute(array('ma' => $ma));
    //echo "goi controller2";
    return 1; 

  }

  

  
}



    