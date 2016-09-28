<?php

function problem6($arr)
{
    $find = $arr[0];
    $str = $arr[1];
    $check = 0;

    for($i=0; $i < strlen($str); $i++)
    {
        if($str[$i] == $find[0])
        {
            $pos = $i;
            for($j = 0; $j < strlen($find); $j++)
            {
                if($str[$i+$j] == $find[$j])
                {
                    $check++;
                }
                else
                {
                    break;
                }
            }
            if($check == strlen($find))
            {
                echo $str . "   " . $find . "  " . $pos;
            }
        }
    }
}

function problem7($arr)
{
    echo "<table style='border-collapse: collapse;'>";
    foreach ($arr as $arr1){
        echo "<tr>";
        foreach ($arr1 as $arr2){
            echo "<td style='border: 1px solid red; padding: 8px;'>".$arr2."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}



$arr = ["go", "let go out"];
problem6($arr);

echo "<hr>";

$arr = [
    [1,2],
    [3,4, 6],
    [1, 4],
    [5, 7, 1, 0]
];
problem7($arr);