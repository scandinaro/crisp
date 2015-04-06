<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Dom
 * Date: 9/6/13
 * Time: 1:31 PM
 * To change this template use File | Settings | File Templates.
 */
require_once('includes/crisp.php');
$view = new crisp('index');

$view->set('year', date('Y'));
$view->set('title', 'my title');

$fruits = array('apple', 'banana', 'orange');

$optionHTML = '';
$i = 0;
foreach ($fruits as $fruit){
    $optionTPL = new crisp('option');
    $optionTPL->set('key', $fruit);
    $optionTPL->set('value', $i);
    $optionHTML .= $optionTPL->HTML();
    $i++;
}
$view->set('options', $optionHTML);

$view->display();