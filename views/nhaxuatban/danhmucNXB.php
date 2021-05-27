<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-8" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman"> DANH MỤC NHÀ XUẤT BẢN</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >                         
    <a href= "index.php?controller=nhaxuatban&action=themNXB" class="btn bg-primary text-center">  Thêm NXB 
    </a>
     
  </div>      
</div>

<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         
         <th style="width: 20%;">STT</th>
         <th style="width: 20%;">Mã nhà xuất bản</th>
         <th style="width: 35%;">Tên nhà xuất bản</th>
        
       

         <th style="width: 25%;">
            <a class="button" href="">Thao tác</a>
         </th>
        
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($NXBs as $tg) {  ?>
          <tr>
            
             <td><?php echo $i?></td>
             <td><?=$tg->MaNXB?></td>
             <td><?=$tg->TenNXB?></td>
             <td>
             	
              <a href="index.php?controller=nhaxuatban&action=suathongtiNXB&ma=<?=$tg->MaNXB?>">Sửa</a> |
              <a href="index.php?controller=nhaxuatban&action=xoaNXB&ma=<?=$tg->MaNXB?>">Xoá</a>
            </td>
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
