
<div class="container">
<div class="row">
<div style="text-align: center; size: 30px;" class="col-11">
  <?php
        if (isset($ketqua)) {
            if($ketqua == 0)
                echo '(*Trung khoa chinh, không thêm được  -- Hãy quay về hoặc chỉnh sữa phiếu có số PN duoi*)';
            else 
                echo '(Đã thêm phiếu nhập thành công)';
        }
        ?>
</div>
<div class="col-1">
<button  class="btn btn-primary"><a href="index.php?controller=phieunhap&action=themPN">Quay về</a></button>
</div>
</div>
<br><br><br>
  <div style="text-align: center; margin-bottom: 6%;"><h3>THÊM CHI TIẾT PHIẾU NHẬP</h3></div>
<form id = "formdmsanpham" action="index.php?controller=phieunhap&action=themchitietPN" method="POST" >
  <?php 

    
       foreach ($PN as $p) {  ?>

            <div class="row">
                <div class="col-1.5">
                  <b>Số phiếu nhập:</b>
                </div>
                <div class="col-1.5"><input class="form-control mr-sm-4" type="text" name = "sopn" value="<?=$p->SoPN?>" style="width: 100%;" >
                </div>
                <div class="col-1"></div>
                <div class="col-1.5" name="ngay"><b>Ngày nhập :</b>
                </div>
                <div class="col-2">
                  <input class="form-control mr-sm-4" type="text" name = "ngaynhap" value="<?=$p->NgayNhap?>" style="width: 100%;">
                </div>
                <div class="col-1"></div>
                <div class="col-1.5"><b> NXB</b></div>
                <div class="col-2">
                <input class="form-control mr-sm-4" type="text" name = "tennxb" value="<?=$p->TenNXB?>" style="width: 100%;">

                </div>
                

            </div>

          <?php } ?>


   
    <div class="row">
  <div class="col-12">
  
    <table class="table table-striped table-hover" style="margin-bottom: 10%;">
          <tr>
            <th style="width: 25%;">Mã Sách</th>
            <th style="width: 25%;">Số Lượng</th>
            <th style="width: 25%;">Đơn giá</th>
            <th style="width: 25%;"></th>
          </tr>

          <tr>
             
            
             <td style="width: 25%;">
                  <select name="masach" style="width: 100%; height: 40%;" class="form-control mr-sm-4">
                    <?php
                    foreach ($sachs as $s) {  ?>

          <option name="masach" ><?=$s->MaSach?></option>
        <?php } ?></select> 
              </td>
              <td style="width: 25%;">
                <input class="form-control mr-sm-4" type="text" name = "soluong" style="width: 100%;" pattern="[1-9].{0,}" title="Vui lòng nhập số lượng  vd: 2 " required>
              </td>
              <td style="width: 25%;">
                <input class="form-control mr-sm-4" type="text" name = "gia" style="width: 100%;" pattern="[0-9].{0,}" title="Vui lòng nhập số tiền  vd: 35000" required>
              </td>
               <td style="width: 25%;">
                <input class="btn btn-primary" type="submit" name = "them" style="width: 50%;" value="Thêm">
              </td>

             
          </tr>
           

       
        

    </table>
    </form>

    <?php
    require_once('views/phieunhap/BangPN.php');
    ?>
  </div>
</div>




        
    
    <br>  <br>
    
    <br><br><br><br><br>
</div>
