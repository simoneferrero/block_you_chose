<?php

namespace block_you_chose;

class block_you_chose_helper_functions
{
    function getArray()
    {
        $totalArray = array();
        $totalArray["optionsArray"] = array();
        $totalArray["min"] = 3;
        $totalArray["max"] = 10;

        for ($i = $totalArray["min"]; $i <= $totalArray["max"]; $i++)
        {
            $totalArray["optionsArray"][$i] = $i;
        }

        return $totalArray;
    }
}