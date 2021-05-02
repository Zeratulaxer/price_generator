<?php

namespace App\model;

class MobileModel implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $brand_id;

    /**
     * MobileModel constructor.
     * @param int $id
     * @param string $name
     * @param int $brand_id
     */
    public function __construct(int $id, string $name, int $brand_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->brand_id = $brand_id;
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
    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    /**
     * @param int $brand_id
     */
    public function setBrandId(int $brand_id): void
    {
        $this->brand_id = $brand_id;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'brand_id' => $this->getBrandId()
        ];
    }
}