<?php
// Read the JSON file
$jsonFile = 'produtos.json';
$jsonData = file_get_contents($jsonFile);
$products = json_decode($jsonData, true);

// Specify the product name to remove
$productNameToRemove = 'Product Name'; // Change this to the actual product name

// Remove the product from the array
foreach ($products as $key => $product) {
    if ($product['nome'] === $productNameToRemove) {
        unset($products[$key]);
        break;
    }
}

// Re-index the array
$products = array_values($products);

// Save the updated JSON back to the file
file_put_contents($jsonFile, json_encode($products, JSON_PRETTY_PRINT));

echo "Product removed successfully.";
?>
