<?php
function getPartsFromFullname($fullName)
{
    $fullName = mb_convert_case($fullName, MB_CASE_TITLE);
    $parts = explode(" ", $fullName);
    $keys = ['Surname', 'Name', 'Patronomyc'];
    return array_combine($keys, $parts);
}
