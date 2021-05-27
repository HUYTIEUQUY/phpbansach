<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-8" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman;"> LỊCH SỬ GIÁ</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >                         
    <a href= "index.php?controller=gia&action=themgia" class="btn bg-primary text-center">  Thêm giá
    </a>
     
  </div>      
</div>

<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         
         <th style="width: 20%;">STT</th>
         <th style="width: 25%;">Mã sách</th>
         <th style="width: 25%;">Giá</th>
         <th style="width: 30%;">Ngày</th>
        
       

        
        
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($gia as $gia) {  ?>
          <tr>
            
             <td><?php echo $i?></td>
             <td><?=$gia->MaSach?></td>
             <td><?=$gia->Gia?></td>
             <td><?=$gia->NgayCapNhat?></td>
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
