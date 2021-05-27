<div class="container">   
<div class="row">
<div class ="col-12" style="top:10px; bottom: 10px;">             
    <h3 style="font-family: Times New Roman;text-align: center;" > SỬA THÔNG TIN TÁC GIẢ</h3>
    <br> <br> <br>
</div>
</div>
<div class="row">
<div class ="col-md-offset-1 col-md-11" style="top:10px; bottom: 10px;"> 
<form action="index.php?controller=tacgia&action=xemkqsuatacgia" method="POST"  enctype="multipart/form-data"  >
    <table width="100%">
    <tr>
        <td width="10%">Mã tác giả:</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "matg" style="width: 200px;" value="<?=$tacgiacu->MaTG?>" readonly></td>
        <td width="10%"></td>
        <td width="10%">Tên tác giả:</td>
        <td width="20%"><input class="form-control mr-sm-4" type="text" name = "tentg"  style="width: 200px;" value="<?=$tacgiacu->TenTG?>"></td>
    </tr>

   
        <tr><td colspan="4" style="color: white;">.</td></tr>
    <tr>
        <td colspan="2"></td>
        <td><input class="btn btn-primary" type ="submit" name=luu value="Lưu" style="width: 100px;"></td>
        <td></td>
        <td colspan="2"></td>

    </tr>
    <tr style="color: red; text-align: center;">
        <td colspan="4">
        <?php
        if (isset($ketqua)) {
            if($ketqua == 0)
                echo '(*Trung khóa chính, không thêm được*)';
            else 
                echo '(*Đã thêm NXB thành công*)';
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