<?php
/* Основные настройки */
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "gbook";
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
/*if(!$link){
    echo 'Ошибка: '. mysqli_connect_errno()
        . ' : '. mysqli_connect_error();
}*/
/* Основные настройки */
function clearStr($data){
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}
/* Сохранение записи в БД */
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = clearStr($_POST['name']);
    $email = clearStr($_POST['email']);
    $msg = clearStr($_POST['msg']);
}

/* Сохранение записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */

/* Вывод записей из БД */
?>