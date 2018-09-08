<?php

/****
* $author: Chuyen Nguyen
* @email: chuyenim@gmail.com
*/

require_once ('template.php');

$template = new Template();
$template->set('title', 'Hello New');
$template->set('product', ['id' => 1, 'name' => 'Iphone']);
$template->render('index.tpl');

$template->output();



