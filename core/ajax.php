<?php

$_POST['action']();

function add_biker(){
    $data = $_POST['data'];
    require './sql_connection.php';
    $nome = $data[0]['value'];
    $numero = $data[1]['value'];
    $motoclub = $data[2]['value'];
    $moto = $data[3]['value'];
    $id_categoria = $data[4]['value'];
    print_r($data);
    $query = "INSERT INTO motociclisti (nome, numero, motoclub, moto, id_categoria) VALUES ('{$nome}', '{$numero}', '{$motoclub}', '{$moto}', '{$id_categoria}')";
    db_query($query, 'INSERT');
}