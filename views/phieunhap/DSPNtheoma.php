<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-12" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman; text-align: center; font-size: 50px;">PHIẾU NHẬP</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >         
  </div>      
</div>
<?php 

    
       foreach ($PN as $p) {  ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-3">
                  <b>Số phiếu nhập:</b> 
                  <?=$p->SoPN?>
                </div>
                <div class="col-1"></div>
                <div class="col-3"><b>Ngày nhập :</b>
                  <?=$p->NgayNhap?>
                </div>
                <div class="col-1"></div>
                <div class="col-3" style="margin-bottom: 6%;">
                  <b>Tên NXB :</b>
                  <?=$p->TenNXB?>
                </div>

            </div>
          <?php } ?>


<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         <th style="width: 10%;">STT</th>
         <th style="width: 25%;">Tên sách</th>
         <th style="width: 10%;">Số lượng nhập</th>
         <th style="width: 20%;">Giá nhập</th>
         <th style="width: 20%;">Thành tiền</th>


         
      </tr>
     
    <?php 
      $d=0;
       $i=1;
       foreach($PNs as $s) {  ?>

          <tr>
             <td><?php echo $i?></td>
             <td><?=$s->TenSach?></td>
             <td><?=$s->SoLuongNhap?></td>
             <td><?=$s->GiaNhap?> </td>
             <td><?=$t=$s->GiaNhap * $s->SoLuongNhap?> </td>
            
          
          <?php $i++; 
                $d=$d+$t;
            } ?>
            </tr>
           <tr>
             <td colspan="4" style="text-align: center;"><b> Tổng cộng:</b></td>
             <td ><b><?php echo $d?> VND</b> </td>
           </tr>
          


    </table>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-4"></div>
<div class="col-2">
<a href="index.php?controller=phieunhap&action=LuuPN"><button  class="btn btn-primary">Luu</button></a>
</div>
<div class="col-2">
<a href="#"><button  class="btn btn-primary">In Phiếu</button></a>
</div>
<div class="col-4"></div>
</div>
</div>
<br><br><br><br>
