<?php
if($ketquaupdate==1)
    header('Location: index.php?controller=sach&action=danhmucsach');
else 
    header('Location: index.php?controller=sach&action=error');

?>