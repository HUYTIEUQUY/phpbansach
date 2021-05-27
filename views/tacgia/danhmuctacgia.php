<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-8" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman"> DANH MỤC TÁC GIẢ</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >                         
    <a href= "index.php?controller=tacgia&action=themtacgia" class="btn bg-primary text-center">  Thêm tác giả 
    </a>
     
  </div>      
</div>

<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         
         <th style="width: 20%;">STT</th>
         <th style="width: 20%;">Mã tác giả</th>
         <th style="width: 35%;">Tên tác giả</th>
        
       

         <th style="width: 25%;">
            <a class="button" href="">Thao tác</a>
         </th>
        
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($TGs as $tg) {  ?>
          <tr>
            
             <td><?php echo $i?></td>
             <td><?=$tg->MaTG?></td>
             <td><?=$tg->TenTG?></td>
             <td>
             	
              <a href="index.php?controller=tacgia&action=suathongtintacgia&ma=<?=$tg->MaTG?>">Sửa</a> |
              <a href="index.php?controller=tacgia&action=xoatacgia&ma=<?=$tg->MaTG?>">Xoá</a>
            </td>
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
