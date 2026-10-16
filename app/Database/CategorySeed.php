<?php

class CategorySeed
{
    public function run(PDO $conn)
    {
        // Create table
        $createTable = $conn->prepare("
            CREATE TABLE IF NOT EXISTS category (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                sku VARCHAR(4) NOT NULL,
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        $createTable->execute();

        // Insert categories
        $stmt = $conn->prepare("
            INSERT INTO category (name, sku)
            VALUES (:name, :sku)
        ");

        $categories = [
            ['Meat & Poultry', 'MEA'],
            ['Seafood', 'SEA'],
            ['Vegetables', 'VEG'],
            ['Fruits', 'FRT'],
            ['Herbs', 'HRB'],
            ['Spices & Seasonings', 'SPI'],
            ['Rice & Grains', 'GRN'],
            ['Flour', 'FLR'],
            ['Pulses & Legumes', 'PUL'],
            ['Nuts & Seeds', 'NUT'],
            ['Dairy & Milk Products', 'DAI'],
            ['Eggs & Egg Products', 'EGG'],
            ['Oils & Fats', 'OIL'],
            ['Sauces & Condiments', 'SAU'],
            ['Sugar & Sweeteners', 'SUG'],
            ['Canned & Preserved Foods', 'CAN'],
            ['Vinegar & Dressings', 'VIN'],
            ['Chocolate & Cocoa', 'CHO'],
            ['Frozen Foods', 'FRZ'],
            ['Other Ingredients', 'OTH'],
        ];

        foreach ($categories as $category) {
            $stmt->execute([
                ':name' => $category[0],
                ':sku' => $category[1]
            ]);
        }

        echo "Category seeded successfully.\n";
    }
}