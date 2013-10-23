<?php
include_once("include/config.php");

switch ( TRUE ) {
	
	case preg_match("{.*?/images/thumb_img_}", $_SERVER["REQUEST_URI"]):
		$sql = "
		SELECT thumb_data
		FROM article
		WHERE thumb_name = '".$_REQUEST["img_name"]."'
		";
		$result = mysql_query($sql, $db_con);
		while ( $data = mysql_fetch_assoc($result) ) {
			header("Content-Type: ".$data["thumb_type"]."");
			echo $data['thumb_data'];
		}
		break;
	
	case preg_match("{.*?/images/article_img_}", $_SERVER["REQUEST_URI"]):
		$sql = "
		SELECT img_data
		FROM add_article
		WHERE img_name = '".$_REQUEST["img_name"]."'
		";
		$result = mysql_query($sql, $db_con);
		while ( $data = mysql_fetch_assoc($result) ) {
			header("Content-Type: ".$data["img_type"]."");
			echo $data['img_data'];
		}
		break;
	
	case preg_match("{.*?/images/user_img_}", $_SERVER["REQUEST_URI"]):
		$sql = "
		SELECT icon_user_data
		FROM comment
		WHERE icon_user_name = '".$_REQUEST["img_name"]."'
		";
		$result = mysql_query($sql, $db_con);
		while ( $data = mysql_fetch_assoc($result) ) {
			header("Content-Type: ".$data["icon_user_type"]."");
			echo $data['icon_user_data'];
		}
		break;
	
	case preg_match("{.*?/images/add_user_img_}", $_SERVER["REQUEST_URI"]):
		$sql = "
		SELECT icon_add_user_data
		FROM add_comment
		WHERE icon_add_user_name = '".$_REQUEST["img_name"]."'
		";
		$result = mysql_query($sql, $db_con);
		while ( $data = mysql_fetch_assoc($result) ) {
			header("Content-Type: ".$data["icon_add_user_type"]."");
			echo $data['icon_add_user_data'];
		}
		break;
		
}
?>