<?php

require_once __DIR__ . '/Category.php';

class CategoryDB
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getCategories(): array
    {
        $statement = $this->db->query('SELECT categoryID, categoryName FROM categories ORDER BY categoryName');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryList(): array
    {
        return $this->getCategories();
    }

    public function getCategory(int $categoryId): ?array
    {
        $statement = $this->db->prepare('SELECT categoryID, categoryName FROM categories WHERE categoryID = :id');
        $statement->execute(['id' => $categoryId]);
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category ?: null;
    }

    public function addCategory(Category $category): void
    {
        $statement = $this->db->prepare('INSERT INTO categories (categoryName) VALUES (:category_name)');
        $statement->execute(['category_name' => $category->getCategoryName()]);
    }

    public function updateCategory(Category $category): void
    {
        $statement = $this->db->prepare('UPDATE categories SET categoryName = :category_name WHERE categoryID = :id');
        $statement->execute([
            'category_name' => $category->getCategoryName(),
            'id' => $category->getCategoryID(),
        ]);
    }

    public function deleteCategory(int $categoryId): void
    {
        $statement = $this->db->prepare('DELETE FROM categories WHERE categoryID = :id');
        $statement->execute(['id' => $categoryId]);
    }
}
