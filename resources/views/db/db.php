<?php
$c = getConnection();
function getConnection()
{
    try {
        $pdo_conn = new PDO('pgsql:host=localhost; dbname=study;', 'postgres', 'kimoji');
        return $pdo_conn;
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function query($pdo_conn, $sql = 'select * from users order by id desc')
{
    $stmt = $pdo_conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    // foreach($result as $row) {
    //     print_r($row);
    // }
    return $result;
}

function queryOne($pdo_conn, $id, $sql = 'select * from users where id=:id')
{
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function update($pdo_conn, $name, $id, $sql = 'update users set name=:name where id=:id;')
{
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
}

function insert($pdo_conn, $name, $sql = 'insert into users(name) values(:name);')
{
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
}

function delete($pdo_conn, $id, $sql = 'delete from users where id=:id;')
{
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function close($pdo_conn)
{
    $pdo_conn = null;
}
