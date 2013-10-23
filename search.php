<?php
include_once("include/config.php");

$search = "?search=".mb_convert_kana($_POST["search"], 'asKV', "UTF-8")."";

header("Location: ".$DOCUMENT_ROOT_URL.$search."");
?>