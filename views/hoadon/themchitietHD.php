
<div class="container">
<div class="row">
<div style="text-align: center; size: 30px;" class="col-11">
</div>
<div class="col-1">
<button  class="btn btn-primary"><a href="index.php?controller=hoadon&action=themHD">Quay về</a></button>
</div>
</div>
<br><br><br>
  <div style="text-align: center;"><h3>THÊM CHI TIẾT HOÁ ĐƠN</h3></div>
<form id = "formdmsanpham" action="index.php?controller=hoadon&action=themchitietHD" method="POST" >
  <?php 

    
       foreach ($HD as $p) {  ?>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-1.5">
                  <b>Số phiếu nhập:</b>
                </div>
                <div class="col-2"><input class="form-control mr-sm-4" type="text" name = "sohd" value="<?=$p->SoHD?>" style="width: 100%;">
                </div>
                <div class="col-1"></div>
                <div class="col-1.5" name="ngay"><b>Ngày bán :</b>
                </div>
                <div class="col-2">
                  <input class="form-control mr-sm-4" type="text" name = "ngayban" value="<?=$p->NgayBan?>" style="width: 100%;">
                </div>
                <div class="col-2" style="margin-bottom: 6%;"></div>

            </div>

          <?php } ?>


   
    <div class="row">
  <div class="col-12">
  
    <table class="table table-striped table-hover" style="margin-bottom: 10%;">
          <tr>
            <th style="width: 30%;">Mã Sách</th>
            <th style="width: 30%;">Số Lượng</th>
            <th style="width: 40%;"></th>
          </tr>

          <tr>
             
            
             <td style="width:30%;">
                  <select name="masach" style="width: 100%; height: 40%;" class="form-control mr-sm-4">
                    <?php
                    foreach ($sachs as $s) {  ?>

          <option name="masach" ><?=$s->MaSach?></option>
        <?php } ?></select> 
              </td>

              <td style="width: 30%;">
                <input class="form-control mr-sm-4" type="number" name = "soluong" style="width: 100%;"   pattern="[1-9]" title="Vui lòng nhập số lượng  vd: '2' " required>
              </td>
             
               <td style="width: 40%;">
                <input class="btn btn-primary" type="submit" name = "them" style="width: 50%;" value="Thêm">
              </td>

             
          </tr>
           

       
        

    </table>
    </form>

    <?php
    require_once('views/hoadon/BangHD.php');
    ?>
  </div>
</div>


        
    
    <br>  <br>
    
    <br><br><br><br><br>
</div>
