<?php

class Category
{
    private int $categoryID = 0;
    private string $categoryName = '';

    public function __construct()
    {
        $this->categoryID = 0;
        $this->categoryName = '';
    }

    public function getCategoryID(): int
    {
        return $this->categoryID;
    }

    public function setCategoryID(int $categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    public function getId(): int
    {
        return $this->getCategoryID();
    }

    public function setId(int $categoryID): void
    {
        $this->setCategoryID($categoryID);
    }

    public function getName(): string
    {
        return $this->getCategoryName();
    }

    public function setName(string $categoryName): void
    {
        $this->setCategoryName($categoryName);
    }
}
