<?php
// Array -> lista string / numeros / objetos 

$students = [
    'douglas' => [
        'name' => 'douglas',
        'course' => 'Computação'
    ],
    'maria' => [
        'name' => 'maria',
        'course' => 'Computação'
    ]
];

echo $students['maria']['name'];


// Exemplo de array push
echo '<br/>';
$products = [];
var_dump($products);
echo '<br/>';
echo '<pre>';
array_push($products, 'Café', 'Pão');
$products[] = 'Papel';
var_dump($products);
echo '</pre>';

$produtosFiltered = array_filter($products, function ($item) {
    return $item === 'Papel';
});

var_dump($produtosFiltered);

echo "<br />";

$peoples = [
    [
        'name' => 'DOuglas',
        'sobrenome' => 'Costa'
    ],
    [
        'name' => 'Maria',
        'sobrenome' => 'Silva'
    ]
];

$newArray = array_map(function ($item) {
    return [...$item, 'fullname' => $item['name'] . ' ' . $item['sobrenome']];
}, $peoples);

echo '<pre>';
var_dump($newArray);
echo '</pre>';
