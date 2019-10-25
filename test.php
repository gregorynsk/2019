<?php

use yii\i18n\Formatter;

class CustomFormatter extends Formatter {
    public function asPhone($phone, $mask = "+7-($2)-$3-$4") {
        return preg_replace("/^(\d{1})(\d{3})(\d{3})(\d{4})$/", $mask, $phone);
    }
}