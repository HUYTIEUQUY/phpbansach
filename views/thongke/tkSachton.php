<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-12" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman; text-align: center;"> THỐNG KÊ SÁCH TỒN</h3>
      <br>
  </div>     
</div>
<br><br><br><br>
<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         
         <th style="width: 15%;">STT</th>
         <th style="width: 40%;">Mã sách</th>
         <th style="width: 40%;">Số lượng còn lại</th>
         <th style="width: 5%;"></th>
        
       

        
        
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($sachcl as $s) {  ?>
          <tr>
            
             <td><?php echo $i?></td>
             <td><?=$s->MaSach?></td>
             <td><?=$s->SoLuongConLai?></td>
             <td>Quyển</td>
              
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
<br><br><br><br>
