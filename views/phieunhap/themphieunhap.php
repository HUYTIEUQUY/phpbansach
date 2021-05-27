<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=phieunhap&action=xemkqThemPN" method="POST" >
    <div style="text-align: center; margin-bottom: 5%;"><h3>TẠO PHIẾU NHẬP MỚI</h3></div>

  <div class="row">
    <div class="col-1">
      Số PN: 
    </div>
    <div class="col-2">
        <input class="form-control mr-sm-4" type="text" name = "sopn" style="width: 100%;" pattern="[P,N]{2}[0-9]{4}" title="Nhập theo mẫu 'PN0001'" required >
    </div>
        <div class="col-1"></div>

    <div class="col-1.5" >
    Ngày nhập: 
  </div>
    <div class="col-2">
      <input class="form-control mr-sm-4" type="date" name = "ngaynhap" style="width: 100%;">
    </div>
    <div class="col-1"></div>
    <div class="col-1">Mã NXB: 
    </div>
    <div class="col-2">
      <input class="form-control mr-sm-4" type="text" name = "nxb" style="width: 80%;" pattern="[A-Z]{3}" title="Nhập theo mẫu 'NXB'" required ></div>

  </div>


  <div class="row" style="margin-top: 5%;">
    <div class="col-5"></div>
    <div class="col-2">
      <input class="btn btn-primary" type="submit" name = "them" style="width: 100%;" value="Tạo phiếu"></div>
    <div class="col-5"></div>

  </div>

</form>
<br><br>


        
    
    <br>  <br><br><br><br><br><br>
</div>