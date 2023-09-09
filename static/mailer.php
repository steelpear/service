<?php 
if(mail("sservismobil@mail.ru", "Новый отзыв", "Поступил новый отзыв")){
    echo "true";
} else{
    echo "false";
}
?>
