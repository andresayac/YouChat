<?php

require_once 'vendor/autoload.php';
require_once 'inc/You.class.php';


$you = new You();

$question_answer = $you->askQuestion("What is the meaning of life?", "42");

$you->process_data($question_answer);
