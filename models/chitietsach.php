<?php
class ChiTietSach
{
  public $MaSach;
  public $TenSach;
  public $TenTL;
  public $TenNXB;
  public $TenTG;
  public $HinhAnh;
 
  function __construct($ma, $tens, $tentheloai,$tennxb,$tentg, $hinhanh)
  {
    $this->MaSach = $ma;
    $this->TenSach = $tens;
    $this->TenTL = $tentheloai;
    $this->TenNXB = $tennxb;
    $this->TenTG = $tentg;
    $this->HinhAnh = $hinhanh;

  }

   static function timsach($ma)
  {
    $db = DB::getInstance();
    $result = $db->prepare('SELECT * FROM sach s, theloai t, nhaxuatban n, tacgia g WHERE s.MaTL=t.MaTL AND s.MaNXB=n.MaNXB AND s.MaTG=g.MaTG AND MaSach= :ma');
    $result->execute(array('ma' => $ma));
    $item = $result->fetch();
    if (isset($item['MaSach'])) {
      return new ChiTietSach($item['MaSach'], $item['TenSach'], $item['TenTL'],$item['TenNXB'],$item['TenTG'],$item['HinhAnh']);
    }
    return null;
  }


}



    