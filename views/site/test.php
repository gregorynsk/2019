<?php

use yii\helpers\Html;
use yii\helpers\Inflector;

/* @var $string app\controllers\SiteController */

$test_string =  Inflector::slug($string, ' ', false);
?>

<?=Html::encode($test_string);?>