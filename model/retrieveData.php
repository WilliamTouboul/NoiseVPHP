<?php

$url = "http://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];

$arr = parse_url($url);
$idToFetch = $arr['query'];

$getInfo = 'SELECT * FROM artist WHERE id =' . $idToFetch;
$infos = getQuery($connect, $getInfo);
