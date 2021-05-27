<div class="container">
    <div class="row">
        <div class="col-12">
          <?php
        if (isset($kq)) {
            if($kq == 0)
                echo '(*XOÁ KHÔNG THÀNH CÔNG*)';
            else 
                echo '(ĐÃ XOÁ THÀNH CÔNG)';
        }
        ?>
           <a href="index.php?controller=phieunhap&action=PN" class="btn bg-primary text-center">Quay lại</a>
        </div>
    </div> 
    <br>   
</div>