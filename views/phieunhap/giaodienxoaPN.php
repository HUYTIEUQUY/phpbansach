<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=phieunhap&action=xemkqxoa" method="POST" >
  <div class="row">
    <div class="col-3"></div>
    <div class="col-2">Số phiếu nhập:</div>
    <div class="col-3">
     
      <select name="sopn">

        <?php 

       $i=1;
       foreach ($PNs as $s) {  ?>

          <option name="sopn"><?=$s->SoPN?></option>
        <?php } ?>
      </select>

    </div>
    <div class="col-3">
      <input class="btn btn-danger" type="submit" name = "xoa" style="width: 50%;" value="XOÁ">
    </div>

  </div>
</form>

        
    
    <br>  <br><br><br><br><br><br>
</div>