<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-8" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman"> DANH MỤC THỂ LOẠI</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >                         
    <a href= "index.php?controller=theloai&action=themtheloai" class="btn bg-primary text-center">  Thêm thể loại 
    </a>
     
  </div>      
</div>

<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         
         <th style="width: 20%;">STT</th>
         <th style="width: 20%;">Mã thể loại</th>
         <th style="width: 35%;">Tên thể loại</th>
        
       

         <th style="width: 25%;">
            <a class="button" href="">Thao tác</a>
         </th>
        
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($TLs as $s) {  ?>
          <tr>
            
             <td><?php echo $i?></td>
             <td>
                <a href="index.php?controller=theloai&action=chitiettheloai&ma=<?=$s->MaTL?>"><?=$s->MaTL?></a>
               
                <input type="hidden" name="matl" value="<?=$s->MaTL?>"></td>
             <td><?=$s->TenTL?></td>
             <td>
             	
              <a href="index.php?controller=theloai&action=suathongtintheloai&ma=<?=$s->MaTL?>">Sửa</a> |
              <a href="index.php?controller=theloai&action=xoatheloai&ma=<?=$s->MaTL?>">Xoá</a>
            </td>
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
