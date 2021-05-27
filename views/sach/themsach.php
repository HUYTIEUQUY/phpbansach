<div class="container">   
<div class="row">
<div class ="col-12" style="top:10px; bottom: 10px;">             
    <h3 style="font-family: Times New Roman;text-align: center;" > THÊM SÁCH MỚI</h3>
    <br> <br> <br>
</div>
</div>
<div class="row">
<div class ="col-md-offset-1 col-md-11" style="top:10px; bottom: 10px;"> 
<form action="index.php?controller=sach&action=xemkqthemsach" method="POST"  enctype="multipart/form-data"  >
    <table width="100%">
    <tr>
        <td width="10%">Mã sách:</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "masach" style="width: 200px;"  pattern="[A-Z]{2}[0-9]{4}" title="Vui lòng nhập mã sách  vd: 'NG0001' " required></td>
        <td width="10%"></td>
        <td width="10%">Tên sách</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "tensach"  style="width: 200px;" required></td>
    </tr>
    <tr>
        <td>Mã thể loại:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "matl"  style="width: 200px;" pattern="[A-Z]{2}" title="Vui lòng nhập mã thể loại  vd: 'NN' " required> </td>
        <td></td>
        <td>Mã tác giả:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "matg" style="width: 200px;" ></td>
    </tr>

     <tr>
        <td>Ngày:</td>
        <td><input class="form-control mr-sm-4"  type="date" name = "ngay" style="width: 200px;"></td>
        <td></td>
        <td>Số lượng:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "soluong" style="width: 200px;"></td>
    </tr>

    <tr>
        <td>Mã NXB:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "manxb" style="width: 200px;"></td>
        <td></td>
        <td>Chọn ảnh</td>
        <td><input type="file" id="file_upload" name = "file_upload" onchange="uploadhinh()"></td>
        <td><img src=""  id="hinhanhsach" name="hinhanhsach" style="width: 80px;height: 100px;">  </td>
    </tr>
        <tr><td colspan="4" style="color: white;">.</td></tr>
    <tr>
        <td colspan="2"></td>
        <td><input class="btn btn-primary" type ="submit" name=luu value="Lưu" style="width: 100px;"></td>
        <td colspan="2"></td>
    </tr>
    <tr style="color: red; text-align: center;">
        <td colspan="5">
        <?php
        if (isset($ketqua)) {
            if($ketqua == 0)
                echo 'Mã sách đã tồn tại!!! Vui lòng nhập mã khác';
            else 
               header('Location: index.php?controller=sach&action=danhmucsach');
        }
        ?>
        </td>
    </tr>
    </table>        
<br>       
<input type ="hidden" id="message" name = "message" >             
</form>
</div>
</div>
</div>
<br> <br> <br>