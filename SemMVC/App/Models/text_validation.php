<?php
function isValid($validateInt){
    $int = $validateInt;

    if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
        return true;
    } else {
        return false;
    }
    return ;
};

function isValidText($validateText){
    $text = $validateText;
    if (is_string($text)) {
        return true;
    } else {
        return false;
    }
};


