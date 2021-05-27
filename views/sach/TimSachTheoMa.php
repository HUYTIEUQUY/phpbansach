<br><br><br>
<div class="container">
   <form id = "formdmsanpham" action="index.php?controller=sach&action=kqTimSachTheoMa" method="POST" >
  <div class="row">
    <div class="col-3"></div>
    <div class="col-2">Mã sách:</div>
    <div class="col-3">
     
  <input class="form-control mr-sm-4" type="text" name = "masach" style="width: 200px;"  pattern="[A-Z]{2}[0-9]{4}" title="Vui lòng nhập mã sách  vd: 'NG0001' " required>

    </div>
    <div class="col-3">
      <input class="btn btn-primary" type="submit" name = "tim" style="width: 50%;" value="Tìm kiếm">
    </div>

  </div>
</form>
<?php
require_once('views/sach/danhmucsach.php');
?>
        
    
    <br>  <br><br><br><br><br><br>
</div>