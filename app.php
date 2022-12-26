<?php

require_once 'vendor/autoload.php';
require_once 'inc/You.class.php';


$you = new You();

$question_answer = $you->askQuestion("Puedes desarrollar un formulario en html que consulte un api con jquery y la respuesta la muestre en un div", "");
$data_processed = $you->process_data($question_answer);

foreach ($data_processed  as $key => $value) {
   echo $value->token;
}
