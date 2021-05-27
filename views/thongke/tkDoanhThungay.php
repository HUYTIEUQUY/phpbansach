
<div class="container">   

     <div class="row" >
        <h3 style="text-align: center;">THỐNG KÊ DOANH THU THEO NGÀY <?=$DT->NgayNhap?></h3>
    </div>   
     <br><br><br>
    <br>
    <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tổng số tiền chi:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$DT->TienPN?> <b>vnd</b></div>
    </div>
    <br>
    <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tổng số tiền thu:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$DT->TienHD?><b>vnd</b></div>
    </div>
    <br>
      <div class="row">
            <div class="col-2"></div>
            <div class="col-4" style="font-size: 30px;"><b>Tổng doanh thu:</b></div>
            <div class="col-6" style="font-size: 30px;"><?=$DT->TienHD-$DT->TienPN?><b>vnd</b></div>
    </div>
    </div>
    </br>

</form>
</div>








