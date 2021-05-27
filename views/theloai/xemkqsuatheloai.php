<?php
if($ketquaupdate==1)
    header('Location: index.php?controller=theloai&action=danhmuctheloai');
else 
    header('Location: index.php?controller=theloai&action=error');

?>