<?php

error_reporting(-1);

function sortMultiArray(&$arr) {
    foreach ($arr as $key => &$value) {
      foreach ($value as &$item) {
        usort($item, function ($a, $b) {
            return ($a['PRICE'] - $b['PRICE']);
        });
      }
    }
}

$arr = [
        'SKLAD1' => [     
            'EDA' => [     
                'TOVAR1' => [     
                    'NAME' => '....',     
                    'PRICE' => 2001     
                ],     
                'TOVAR2' => [     
                    'NAME' => '....',     
                    'PRICE' => 344     
                ],     
            ],     
            'NAPITKI' => [     
                'TOVAR55' => [     
                    'NAME' => '....',     
                    'PRICE' => 508     
                ],     
                'TOVAR54' => [     
                    'NAME' => '....',     
                    'PRICE' => 1234     
                ],     
            ],     
        ],     
        'SKLAD2' => [     
            'EDA' => [     
                'TOVAR66' => [     
                    'NAME' => '....',     
                    'PRICE' => 111     
                ],     
                'TOVAR67' => [     
                    'NAME' => '....',     
                    'PRICE' => 14    
                ],     
            ],   
            'NAPITKI' => [
                'TOVAR77' => [     
                    'NAME' => '....',     
                    'PRICE' => 11    
                ],
                'TOVAR78' => [     
                    'NAME' => '....',     
                    'PRICE' => 333     
                ],  
            ],   
        ]    
    ];

sortMultiArray($arr);


print_r($arr);
?>