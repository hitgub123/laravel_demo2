<?php
include './db.php';
// $c=getConnection();
$act = $_REQUEST["action"];
if ($act == 'update') {
    update($c, $_REQUEST["name"], $_REQUEST["id"]);
} else if ($act == 'delete') {
    delete($c, $_REQUEST["id"]);
} else if ($act == 'add') {
    insert($c, $_REQUEST["name"]);
}
close($c);

echo date("Y/m/d H:i:s", time());
echo '<br/>you ' . $_REQUEST["action"] . ' this user<br/>';
print_r($_REQUEST);
echo '<form action="testdb.php"><input type="submit" value="返回" /></form>';
