<?php

namespace Benzo\SingleEntryPoint\Product\Model;

class Product implements \JsonSerializable
{
    private string $name;
    private int $id;
    private int $price;

    public function __construct(int $id, string $name, int $price){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function toArray(): array
    {
        return ["name" => $this->name, "id" => $this->id, "price" => $this->price];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}