<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=hoadon&action=DSHDtheoma" method="POST" >
  <div class="row">
    <div class="col-3"></div>
    <div class="col-2">Số hoá đơn:</div>
    <div class="col-3">
     
      <select name="sohd">

        <?php 

       $i=1;
       foreach ($HDs as $s) {  ?>

          <option name="sohd"><?=$s->SoHD?></option>
        <?php } ?>
      </select>

    </div>
    <div class="col-3">
      <input class="btn btn-primary" type="submit" name = "tim" style="width: 50%;" value="Tìm kiếm">
    </div>

  </div>
</form>

        
    
    <br>  <br><br><br><br><br><br>
</div>