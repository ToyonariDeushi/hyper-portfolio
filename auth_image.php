<?php
// ヘッダーを送信
header('Content-Type: image/png');

// 画像を作成
$image = imagecreate(420, 80);


// 背景色の設定
imagecolorallocate($image, 0, 0, 0);

// 文字サイズ
$size = 40;

// 角度数（左から右へ水平が0、プラス：座標を軸に反時計回り方向）
$angle = 0;

// 座標（左上隅が0,0）
$x = 10;
$y = 60;

// 文字色の設定
$textColor = imagecolorallocate($image, 255, 255, 255);

// フォントファイル
$font_list = array(
"font/NINJAS.TTF",
"font/28 Days Later.ttf",
"font/Burton_s_nigthmare2000.ttf",
"font/MAROC___.TTF",
"font/Orial_Bold.otf",
"font/PEIXE___.ttf",
"font/SF Zimmerman.ttf",
"font/youmurdererbb_reg.ttf"
);

$font = $font_list[mt_rand(0,7)];
/*
function getRandomString($nLengthRequired = 8){
	$sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	mt_srand();
	$sRes = "";
	for($i = 0; $i < $nLengthRequired; $i++)
		$sRes .= $sCharList[mt_rand(0, strlen($sCharList) - 1)];
		return $sRes;
}

$string = getRandomString();*/

$string = $_REQUEST["str"];

// 文字列を書き込みます。
imagettftext($image, $size, $angle, $x, $y, $textColor, $font, $string);

// 画像を出力します
imagepng($image);

// 画像を破棄しメモリを開放します。
imagedestroy($image);
?>