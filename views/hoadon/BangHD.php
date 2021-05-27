<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-12" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman; text-align: center;">HOÁ ĐƠN</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >         
  </div>      
</div>
<?php 

    
       foreach ($HD as $p) {  ?>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                  <b>Số hoá đơn:</b> 
                  <?=$p->SoHD?>
                </div>
                <div class="col-1"></div>
                <div class="col-4"><b>Ngày xuất :</b>
                  <?=$p->NgayBan?>
                </div>
                <div class="col-2" style="margin-bottom: 6%;"></div>

            </div>
          <?php } ?>


<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         <th style="width: 10%;">STT</th>
         <th style="width: 30%;">Tên sách</th>
         <th style="width: 10%;">Số lượng</th>
         <th style="width: 25%;">Giá </th>
         <th style="width: 25%;">Thành tiền</th>


         
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 
        $d=0;
       $i=1;
       foreach ($HDs as $s) {  ?>
          <tr>
             <td><?php echo $i?></td>
             <td><?=$s->TenSach?></td>
             <td><?=$s->SoLuongBan?></td>
             <td><?=$s->GiaBan?> </td>
             <td><?=$t=$s->GiaBan * $s->SoLuongBan?> </td>
          </tr>
          <?php $i++; 
                $d=$d+$t;
        } ?>

           <tr>
            <td colspan="4" ><b> VAT</b></td>
            <td><?php echo $d*(5/100)?> </td>
          </tr>
           <tr>
             <td colspan="4" style="text-align: center;"><b> Tổng cộng:</b></td>
             <td ><b><?php echo $d=$d+($d*(5/100))?> VND</b> </td>
           </tr>
          


    </table>

    <?php 

    
       foreach ($HD as $p) {  ?>
<div class="row" style="margin-top: 6%;">
  <div class="col-7"></div>
<div class="col-1">
<button  class="btn btn-primary" style="width: 100%;"><a href="index.php?controller=hoadon&action=LuuHD&tienhd=<?= $d?>&sohd=<?=$p->SoHD?>">Lưu</button></a>
</div>
<div class="col-0.5"></div>
<div class="col-1">
<button  class="btn btn-primary" style="width: 100%;"><a href="index.php?controller=hoadon&action=huyHD&sohd=<?=$p->SoHD?>">Huỷ</button></a>
</div>
<div class="col-0.5"></div>
<div class="col-1">
  <a href="#"><button  class="btn btn-primary"  style="width: 100%;">In</button></a>

</div>
</div>

<?php } ?>

    
  </div>
</div>
</form>
</div>
<br><br><br><br>
