<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=hoadon&action=xemkqThemHD" method="POST" >
    <div style="text-align: center; margin-bottom: 5%;"><h3>TẠO HOÁ ĐƠN MỚI</h3></div>

  <div class="row">
    <div class="col-2"></div>
    <div class="col-1">
      Số HD: 
    </div>
    <div class="col-2">
        <input class="form-control mr-sm-4" type="text" name = "sohd" style="width: 100%;" pattern="[H,D]{2}[0-9]{4}" title="Nhập theo mẫu 'HD0001'" required >
    </div>
        <div class="col-2"></div>

    <div class="col-2">
    Ngày bán: 
  </div>
    <div class="col-2">
      <input class="form-control mr-sm-4" type="date" name = "ngayxuat" style="width: 100%;">
    </div>
    <div class="col-1"></div>

  </div>


  <div class="row" style="margin-top: 5%;">
    <div class="col-5"></div>
    <div class="col-2">
      <input class="btn btn-primary" type="submit" name = "tạo" style="width: 100%;" value="Tạo phiếu"></div>
    <div class="col-5"></div>

  </div>

</form>
<br><br>


        
    
    <br>  <br><br><br><br><br><br>
</div>