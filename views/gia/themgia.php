<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=gia&action=xemkqThemgia" method="POST" >
    <div style="text-align: center; margin-bottom: 5%;"><h3>THÊM GIÁ MỚI</h3></div>

  <div class="row">
    <div class="col-1">
     Mã sách : 
    </div>
    <div class="col-2">
         <select name="masach" class="btn btn-primary">

        <?php 
       foreach ($sachs as $s) {  ?>

          <option name="masach"><?=$s->MaSach?></option>
        <?php } ?>
      </select>
    </div>
        <div class="col-1"></div>

    <div class="col-1.5" >
    Ngày : 
  </div>
    <div class="col-2">
      <input class="form-control mr-sm-4" type="date" name = "ngay" style="width: 100%;">
    </div>
    <div class="col-1"></div>
    <div class="col-1">Giá: 
    </div>
    <div class="col-2">
      <input class="form-control mr-sm-4" type="text" name = "gia" style="width: 80%;" pattern="[0-9]{0,}" title="Nhập theo mẫu '80000'" required ></div>

  </div>


  <div class="row" style="margin-top: 5%;">
    <div class="col-5"></div>
    <div class="col-2">
      <input class="btn btn-primary" type="submit" name = "them" style="width: 100%;" value="Thêm"></div>
    <div class="col-5"></div>

  </div>

</form>
<br><br>


        
    
    <br>  <br><br><br><br><br><br>
</div>