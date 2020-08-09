<?php
$tpl = file_get_contents('index.tpl');
require_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
    $result = (int)$_POST['result'];
    $control = htmlspecialchars($_POST['captcha']);

    if (md5($result) == $control)   {
        $name = htmlspecialchars($_POST['name']);
        $text = htmlspecialchars($_POST['text']);
        $time = time();

        $query = "INSERT INTO reviews(autor,text,time) VALUES ('$name','$text',$time)";
        mysqli_query($connect, $query);
    }
}

$query = "SELECT * FROM reviews ORDER BY time DESC";
$result = mysqli_query($connect, $query);
$reviews = "";
while($data = mysqli_fetch_assoc($result))
{
    $reviews.="
    <div class='reviews__item'>
    <div class='reviews__item__footer'>
    <div class='reviews__autor'>".$data['autor']."</div>
    <div class='reviews__time'>".date('d F Y, g:i a', $data['time'])."</div>
    </div>
    <div class='reviews__text'>
    ".$data['text']."
</div>
</div>";
}

$a = rand(1, 10);
$b = rand(1, 10);

$captcha = md5($a + $b);

$patterns = ['/{reviews}/','/{captcha}/','/{digital1}/','/{digital2}/'];
$replace = [$reviews, $captcha, $a, $b];
echo preg_replace($patterns, $replace, $tpl);
?>