
<div class="container">   

     <div class="row" >
        <h3>TÌM KIẾM SÁCH VỚI MÃ <?=$ctsach->MaSach?></h3>
    </div>   
     <br><br><br>
    <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <img style="width:300px; height: 400px; " src="<?=$ctsach->HinhAnh?>">
            </div>
    </div>
    <br>
    <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tên sách:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$ctsach->TenSach?></div>
    </div>
    <br>
    <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tên thể loại:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$ctsach->TenTL?></div>
    </div>
    <br>
      <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tên nhà xuất bản:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$ctsach->TenNXB?></div>
    </div>
    <br>
      <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tên tác giả:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$ctsach->TenTG?></div>
    </div>
    </div>
    </br>

</form>
</div>








