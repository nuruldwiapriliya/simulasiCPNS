<?php
require("database.php");

SESSION_START();

if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
}

//list chats
$sql = mysqli_query($conn, "SELECT * FROM chat ORDER BY chatid ASC");

while($list = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{
	$userId = $list["sender"];
	$u_query = mysqli_query($conn,"SELECT * FROM users WHERE user_id ='$userId'");
	$u_results = mysqli_fetch_array($u_query, MYSQLI_ASSOC);
	print("<hr>");
	print("<small><b>".$u_results["username"].":</b></small><br/>");
	print("<span class='message'>".strip_tags($list["message"])."</span>");
}