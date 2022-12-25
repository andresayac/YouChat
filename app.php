<?php

require_once 'vendor/autoload.php';
require_once 'inc/You.class.php';


$you = new You();

$question_answer = $you->askQuestion("Puedes programar en php un programa que imprima el arbol de navidad con simbolos", "");

$data_processed = $you->process_data($question_answer);

foreach ($data_processed  as $key => $value) {
   echo $value->token;
}
