<?php

function generateCsv($data) {
    $csvContent = "";

    foreach ($data as $category) {
        foreach ($category['products'] as $product) {
            foreach ($product['variants'] as $variant) {
                // Build a row for each variant
                $row = [
                    $category['name'],
                    $product['name'],
                    $variant['name'],
                    $variant['price'],
                ];
                $csvContent .= implode(",", $row) . "\n";
            }
        }
    }

    file_put_contents('output.csv', $csvContent);
}

// Example hierarchical data
$data = [
    [
        'name' => 'Electronics',
        'products' => [
            [
                'name' => 'Smartphone',
                'variants' => [
                    ['name' => '128GB', 'price' => 699],
                    ['name' => '256GB', 'price' => 799],
                ],
            ],
            [
                'name' => 'Laptop',
                'variants' => [
                    ['name' => '13-inch', 'price' => 999],
                    ['name' => '15-inch', 'price' => 1199],
                ],
            ],
        ],
    ],
    [
        'name' => 'Home Appliances',
        'products' => [
            [
                'name' => 'Refrigerator',
                'variants' => [
                    ['name' => 'Single Door', 'price' => 499],
                    ['name' => 'Double Door', 'price' => 699],
                ],
            ],
        ],
    ],
];

generateCsv($data);