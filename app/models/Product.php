<?php

class Product
{
    private int $productID = 0;
    private int $categoryID = 0;
    private string $productCode = '';
    private string $productName = '';
    private float $listPrice = 0.0;

    public function __construct()
    {
        $this->productID = 0;
        $this->categoryID = 0;
        $this->productCode = '';
        $this->productName = '';
        $this->listPrice = 0.0;
    }

    public function getProductID(): int
    {
        return $this->productID;
    }

    public function setProductID(int $productID): void
    {
        $this->productID = $productID;
    }

    public function getCategoryID(): int
    {
        return $this->categoryID;
    }

    public function setCategoryID(int $categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): void
    {
        $this->productCode = $productCode;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getListPrice(): float
    {
        return $this->listPrice;
    }

    public function setListPrice(float $listPrice): void
    {
        $this->listPrice = $listPrice;
    }

    public function getId(): int
    {
        return $this->getProductID();
    }

    public function setId(int $productID): void
    {
        $this->setProductID($productID);
    }
}
