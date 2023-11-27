<?php
function getFullnameFromParts($surname, $name, $patronymic)
{
    $fullName = $surname . ' ' . $name . ' ' . $patronymic;
    return mb_convert_case($fullName, MB_CASE_TITLE);
}

function getPartsFromFullname($fullName)
{
    $fullName = mb_convert_case($fullName, MB_CASE_TITLE);
    $parts = explode(" ", $fullName);
    $keys = ['Surname', 'Name', 'Patronomyc'];
    return array_combine($keys, $parts);
}

function getShortName($fullName)
{
    $parts = getPartsFromFullname($fullName);
    $shortName = $parts['Name'] . ' ' . mb_substr($parts['Surname'], 0, 1) . '.';
    return $shortName;
}

function getGenderFromName($fullName)
{
    $parts = getPartsFromFullname($fullName);
    $genderAttribute = 0;
    //female gender check
    mb_substr($parts['Patronomyc'], -3) === 'вна' ? $genderAttribute-- : 0;
    mb_substr($parts['Name'], -1) === 'а' ? $genderAttribute-- : 0;
    mb_substr($parts['Surname'], -2) === 'ва' ? $genderAttribute-- : 0;
    //male gender check
    mb_substr($parts['Patronomyc'], -2) === 'ич' ? $genderAttribute++ : 0;
    mb_substr($parts['Name'], -1) === 'й' ? $genderAttribute++ : 0;
    mb_substr($parts['Name'], -1) === 'н' ? $genderAttribute++ : 0;
    mb_substr($parts['Surname'], -1) === 'в' ? $genderAttribute++ : 0;
    return $genderAttribute <=> 0;
}

function getGenderDescription($arr)
{
    //getGenderFromName() return 1(men);-1(women);0(undefined)
    $men_arr = array_filter($arr, function ($arr) {
        return getGenderFromName($arr['fullname']) === 1;
    });
    $women_arr = array_filter($arr, function ($arr) {
        return getGenderFromName($arr['fullname']) === -1;
    });
    $undefined_arr = array_filter($arr, function ($arr) {
        return getGenderFromName($arr['fullname']) === 0;
    });
    // calculating percentages men/women/undefined  
    $men = round(count($men_arr) * 100 / (count($men_arr) + count($women_arr) + count($undefined_arr)), 1);
    $women = round(count($women_arr) * 100 / (count($men_arr) + count($women_arr) + count($undefined_arr)), 1);
    $undefined = round(count($undefined_arr) * 100 / (count($men_arr) + count($women_arr) + count($undefined_arr)), 1);
    $description = <<<DESCRIPTION
    Гендерный состав аудитории:
    ---------------------------
    Мужчины - {$men}%
    Женщины - {$women}%
    Не удалось определить - {$undefined}%
    DESCRIPTION;
    echo $description;
}

function getPerfectPartner($surname, $name, $patronymic, $arr)
{
    $fullName = getFullnameFromParts($surname, $name, $patronymic);
    $gender = getGenderFromName($fullName);
    if ($gender === 0) {
        echo 'К сожалению ваш пол не определен :(';
    } else {
        $perfectPartner = $arr[rand(0, count($arr) - 1)]['fullname'];
        //randomize partner from the array with opposite gender
        $genderPartner = getGenderFromName($perfectPartner);
        while ($genderPartner === $gender || $genderPartner === 0) {
            $perfectPartner = $arr[rand(0, count($arr) - 1)]['fullname'];
            $genderPartner = getGenderFromName($perfectPartner);
        }
        $shortName = getShortName($fullName);
        $shortNamePartner = getShortName($perfectPartner);
        $randomValue = round(50 + lcg_value() * (abs(100 - 50)), 2);
        $result = <<<TXT
        {$shortName} + {$shortNamePartner} = 
        ♡ Идеально на {$randomValue}% ♡
        TXT;
        echo $result;
    }
}
?>