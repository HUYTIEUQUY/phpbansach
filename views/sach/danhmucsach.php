<div class="container" id="sach"  >         
<div class="row bg-white text-primary"  >
  <div class ="col-md-8" style="top:10px; bottom: 10px;">             
      <h3 style="font-family: Times New Roman"> DANH MỤC SÁCH</h3>
      <br>
  </div> 
  <div class="col-2"></div>
  <div class ="col-2  " style="top:10px;bottom:10px;  " >                         
    <a href= "index.php?controller=sach&action=themsach" class="btn bg-primary text-center">  Thêm sách 
    </a>
     
  </div>      
</div>

<div class="row">
  <div class="col-12">
  <form id = "formdmsanpham" action="" method="POST" >
    <table class="table table-striped table-hover">
      <tr>
         <th style="width: 5%;">STT</th>
         <th style="width: 10%;">Mã sách</th>
         <th style="width: 25%;">Tên sách</th>
         <th style="width: 10%;">Mã thể loại</th>
         <th style="width: 10%;">Mã NXB</th>
         <th style="width: 10%;">Mã tác giả</th>
         <th style="width: 10%;">Hình ảnh</th>
       

         <th style="width: 10%;">
            <a class="button" href="">Thao tác</a>
         </th>
      </tr>
     
      <input type="hidden" name="stt" id="stt" value="">
    <?php 

       $i=1;
       foreach ($sachs as $s) {  ?>
          <tr>
             <td><?php echo $i?></td>
             <td>
                <a href="index.php?controller=sach&action=chitietsach&ma=<?=$s->MaSach?>"><?=$s->MaSach?></a>
               
                <input type="hidden" name="MaSach" value="<?=$s->MaSach?>"></td>
             <td><?=$s->TenSach?></td>
             <td><?=$s->MaTL?></td>
             <td><?=$s->MaNXB?></td>
             <td><?=$s->MaTG?></td>
             <td><img style="width:80px; height: 100px; " src="<?=$s->HinhAnh?>"></td>
             <td>
             	
              <a href="index.php?controller=sach&action=suathongtinsach&ma=<?=$s->MaSach?>">Sửa</a> |
              <a href="index.php?controller=sach&action=xoasach&ma=<?=$s->MaSach?>">Xoá</a>
            </td>
          </tr>
          <?php $i++;} ?>

    </table>
    </form>
  </div>
</div>
</div>
