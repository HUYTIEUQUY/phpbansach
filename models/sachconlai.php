<?php
class SachConLai
{
  public $MaSach;
 
  public $SoLuongConLai;
 
  function __construct($ma,$sl)
  {
    $this->MaSach = $ma;
   
    $this->SoLuongConLai = $sl;

  }

  static function findSLtheoma($ma,$soluongnhap)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sachconlai WHERE MaSach = :ma ');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      $sql = $db->prepare('Update sachconlai set SoLuongConLai = :sl where MaSach= :ma');     
      $sql->bindParam(':ma', $ma);
      $sl=$item['SoLuongConLai']+$soluongnhap;
      $sql->bindParam(':sl', $sl);
      $sql->execute(); 
    
  }
  else
  {
  	 $sqls = $db->prepare(' INSERT INTO sachconlai(MaSach,SoLuongConLai) 
        VALUES (:ma,:sl)');     
      $sqls->bindParam(':ma', $ma);
     
      $sqls->bindParam(':sl', $soluongnhap);
      $sqls->execute(); 
  }
  return null;

 }

 static function findSL($ma,$soluong)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sachconlai WHERE MaSach = :ma ');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    $sl= $item['SoLuongConLai']-$soluong;
    if (isset($item['MaSach'])&&$item['SoLuongConLai']>=$soluong) {
      $sql = $db->prepare('Update sachconlai set SoLuongConLai = :sl where MaSach= :ma');     
      $sql->bindParam(':ma', $ma);
      $sql->bindParam(':sl',$sl);
      $sql->execute(); 
      return 1;
  }
  else
  {
  	return 0;
  }
  return null;
 }

 static function allsachcl()
  {
    $list = [];
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sachconlai');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    foreach ($result->fetchAll() as $item) {
      $list[] = new SachConLai($item['MaSach'], $item['SoLuongConLai']);
    }
    return $list;
  }


}
 ?>