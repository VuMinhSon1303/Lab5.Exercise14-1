<?php

require_once __DIR__ . '/Product.php';

class ProductDB
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getProducts(): array
    {
        $statement = $this->db->query(
            'SELECT p.productID, p.categoryID, p.productCode, p.productName, p.listPrice, c.categoryName
             FROM products p
             INNER JOIN categories c ON p.categoryID = c.categoryID
             ORDER BY p.productName'
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductList(): array
    {
        return $this->getProducts();
    }

    public function getProductsByCategory(int $categoryId): array
    {
        $statement = $this->db->prepare(
            'SELECT productID, categoryID, productCode, productName, listPrice
             FROM products
             WHERE categoryID = :category_id
             ORDER BY productName'
        );
        $statement->execute(['category_id' => $categoryId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct(int $productId): ?array
    {
        $statement = $this->db->prepare(
            'SELECT productID, categoryID, productCode, productName, listPrice
             FROM products
             WHERE productID = :id'
        );
        $statement->execute(['id' => $productId]);
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        return $product ?: null;
    }

    public function addProduct(Product $product): void
    {
        $statement = $this->db->prepare(
            'INSERT INTO products (categoryID, productCode, productName, listPrice)
             VALUES (:category_id, :product_code, :product_name, :list_price)'
        );
        $statement->execute([
            'category_id' => $product->getCategoryID(),
            'product_code' => $product->getProductCode(),
            'product_name' => $product->getProductName(),
            'list_price' => $product->getListPrice(),
        ]);
    }

    public function updateProduct(Product $product): void
    {
        $statement = $this->db->prepare(
            'UPDATE products
             SET categoryID = :category_id,
                 productCode = :product_code,
                 productName = :product_name,
                 listPrice = :list_price
             WHERE productID = :id'
        );
        $statement->execute([
            'category_id' => $product->getCategoryID(),
            'product_code' => $product->getProductCode(),
            'product_name' => $product->getProductName(),
            'list_price' => $product->getListPrice(),
            'id' => $product->getProductID(),
        ]);
    }

    public function deleteProduct(int $productId): void
    {
        $statement = $this->db->prepare('DELETE FROM products WHERE productID = :id');
        $statement->execute(['id' => $productId]);
    }
}
