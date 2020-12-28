<?php

function nwtg_write($key, $value)
{
    $mysql = mysqli_connect('nwtg-mysql', 'root', 'screencast', 'web');
    $rs = mysqli_fetch_all(mysqli_query($mysql, "SELECT * FROM 'nwtg' WHERE 'key' = '$key'"), MYSQLI_ASSOC);
    if ($rs) {
        mysqli_query($mysql, "UPDATE 'nwtg' SET 'value' = '$value' WHERE 'key' = '$key'");
    } else {
        mysqli_query($mysql, "INSERT INTO 'nwtg' ( 'key', 'value') VALUES ('$key', '$value')");
    }
    mysqli_close($mysql);
}

function nwtg_sync()
{
    $mysql = mysqli_connect('nwtg-mysql', 'root', 'screencast', 'web');
    $rs = mysqli_fetch_all(mysqli_query($mysql, "SELECT * FROM 'nwtg'"), MYSQLI_ASSOC);
    mysqli_close($mysql);

    $memcache = memcache_connect('nwtg-memcached', 11211);
    memcache_flush($memcache);
    foreach ($rs as $row) {
        memcache_set($memcache, $row['key'], $row['value']);
    }
    memcache_close($memcache);
}

function nwtg_read($key)
{
    $mysql = mysqli_connect('nwtg-mysql', 'root', 'screencast', 'web');
    $rs = mysqli_fetch_all(mysqli_query($mysql, "SELECT * FROM 'nwtg' WHERE 'key' = '$key'"), MYSQLI_ASSOC);
    $row = reset($rs);
    $dbVal = isset($row['value']) ? $row['value'] : '';

    $memcache = memcache_connect('nwtg-memcached', 11211);
    $memVal = memcache_get($memcache, $key);
    memcache_close($memcache);

    echo 'Values in database: ' . $dbVal . '<br/>' . 'Values in cache: ' . $memVal;
}

$action = $_POST['action'];

switch ($action) {
    case 'write':
        mwtg_write($_POST['key'], $_POST['value']);
        break;
    case 'sync':
        nwtg_sync();
        break;
    case 'read':
        nwtg_read($_POST['key']);
        break;
}