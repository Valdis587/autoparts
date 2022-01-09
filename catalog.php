<?php
/**
 * AutoParts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AutoParts
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

$name=$_POST['name'];
$phone=$_POST['phone'];
$url=$_POST['url'];
$mail=$_POST['mail'];
$prod=$_POST['product'];
if (mail($mail,
"Заявка с сайта",
" Товар: " .$prod.
"  Имя:  ".$name.
" Телефон: ".$phone ,
"From: $mail \r\n"))
{
header("Location: $url");
} else {
echo "при отправке сообщения возникли ошибки";
}?>