<?php
/* Основные настройки */
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "gbook";
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

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
    $sql = "INSERT INTO msgs (name,email,msg) VALUE ('$name','$email','$msg')";
    mysqli_query($link, $sql);
    header("Location: ". $_SERVER["REQUEST_URI"]);
    exit;

}

/* Сохранение записи в БД */

/* Удаление записи из БД */
if(isset($_GET["del"])){
    $id = abs((int)$_GET['del']);
    echo 'Удалена запись - '.$id;
    if($id){
        $sql = "DELETE FROM msgs WHERE id = $id";
        mysqli_query($link, $sql);
      /*  header("Location: ". $_SERVER["REQUEST_URI"]);
        exit;*/
    }
}

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

$sql = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
$res = mysqli_query($link, $sql);
$tmp = mysqli_num_rows($res);
echo "<p>Всего записей в гостевой книге: $tmp </p>";
while($row = mysqli_fetch_assoc($res)){
    $dt = date("d-m-Y H:i:s", $row["dt"]);
    $msg = nl2br($row['msg']);
    echo <<<MSG
    <p>
        <a href="{$row['email']}">{$row['name']}</a>
        {$dt} написал <br/>{$msg}
    </p>
    <p align="right">
        <a href="{$_SERVER['REQUEST_URI']}&del={$row['id']}">Удалить</a>
    </p>

MSG;

}


/* Вывод записей из БД */
?>