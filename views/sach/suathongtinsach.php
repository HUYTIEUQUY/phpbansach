<div class="container">   
<div class="row">
<div class ="col-12" style="top:10px; bottom: 10px;">             
    <h3 style="font-family: Times New Roman;text-align: center;" > SỬA THÔNG TIN SẢN PHẨM</h3>
    <br> <br> <br>
</div>
</div>
<div class="row">
<div class ="col-md-offset-1 col-md-11" style="top:10px; bottom: 10px;"> 
<form action="index.php?controller=sach&action=xemkqsuasach" method="POST"  enctype="multipart/form-data"  >
    <table width="100%">
    <tr>
        <td width="10%">Mã sách:</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "masach" style="width: 200px;" value="<?=$sachcu->MaSach?>" readonly></td>
        <td width="10%"></td>
        <td width="10%">Tên sách</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "tensach"  style="width: 200px;" value="<?=$sachcu->TenSach?>" required></td>
    </tr>
    <tr>
        <td>Mã thể loại:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "matl"  style="width: 200px; "  value="<?=$sachcu->MaTL?>"> </td>
        <td></td>
        <td>Mã tác giả:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "matg" style="width: 200px;" value="<?=$sachcu->MaTG?>"></td>
    </tr>

    <tr>
        <td>Mã NXB:</td>
        <td><input class="form-control mr-sm-4" type="text" name = "manxb" style="width: 200px;" value="<?=$sachcu->MaNXB?>"></td>
        <td></td>
        <td>Chọn ảnh</td>
        <td><input type="file" id="file_upload" src="<?=$sachcu->HinhAnh?>" name = "file_upload" onchange="uploadhinh()"></td>
        <td><img src="<?=$sachcu->HinhAnh?>"   id="hinhanhsach" name="hinhanhsach" style="width: 80px;height: 100px;">  </td>
    </tr>
        <tr><td colspan="4" style="color: white;">.</td></tr>
    <tr>
        <td colspan="2"></td>
        <td><input class="btn btn-primary" type ="submit" name=luu value="Lưu" style="width: 100px;"></td>
        <td><a href="index.php?controller=sach&action=danhmucsach"><input class="btn btn-primary" type ="button" name=huy value="Huỷ" style="width: 100px;"></a></td>
        <td colspan="2"></td>

    </tr>
    <tr style="color: red; text-align: center;">
        <td colspan="4">
        <?php
        if (isset($ketqua)) {
            if($ketqua == 0)
                echo '(*Trung khoa chinh, không thêm được*)';
            else 
                echo '(*Đã thêm sách thành công*)';
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