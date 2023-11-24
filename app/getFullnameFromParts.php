<?php
function getFullnameFromParts($surname, $name, $patronymic)
{
    $fullName = $surname . ' ' . $name . ' ' . $patronymic;
    return mb_convert_case($fullName, MB_CASE_TITLE);
}
