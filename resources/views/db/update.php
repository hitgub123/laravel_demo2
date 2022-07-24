<?php
include './db.php';
// $c=getConnection();
$result = queryOne($c, $_REQUEST['id']);
echo '<form action="confirm.php" method="post">';
echo '<input type="hidden" name="id" value="' . $result['id'] . '" />';
echo '<input type="hidden" name="action" value="' . $_REQUEST['action'] . '" />';
echo '<input type="text" name="name" value="' . $result['name'] . '" />';
echo '<input type="submit" value="submit" /></form>';
close($c);
