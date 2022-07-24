<?php
// phpinfo();
include 'db.php';
// $c=getConnection();
$result = query($c);

echo '<a href="update.php?action=add">添加</a>';
foreach ($result as $row) {
	echo '<br/><a href="update.php?id=' . $row['id'] . '&action=update">修改</a>' .
		'<a href="confirm.php?id=' . $row['id'] . '&action=delete">删除</a>' . $row['id'] . ':' . $row['name'];
}
close($c);
