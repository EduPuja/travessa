<?php

$connexioPsql = pg_connect("host=localhost port=5432 dbname=btravessa user=postgres passwrod=Dam2020!");

if(!$connexioPsql)
{
    pg_close();
    echo "not good";
}
else
{

    echo nice;
}

?>