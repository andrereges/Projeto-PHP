<?php
$dsn = "pgsql:"
    . "host=ec2-54-221-220-82.compute-1.amazonaws.com;"
    . "dbname=de9h600nuj7b14;"
    . "user=evpnkpokmazgmd;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=49ea80d27e2955236cf1efc1bb55ebc74f21263b80a0628daa2c9fa9a32da8b1";

$db = new PDO($dsn);
