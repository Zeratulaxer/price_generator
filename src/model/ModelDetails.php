<?php

namespace App\model;

class ModelDetails implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $cpuCore;
    private string $cpuGhz;
    private string $memory;
    private string $storage;
    private string $battery;
    private string $displayType;
    private string $displayPix;
    private string $rearCamera;
    private string $frontCamera;
    private string $modelId;

    public function __construct(
        int $id,
        string $name,
        string $cpuCore,
        string $cpuGhz,
        string $memory,
        string $storage,
        string $battery,
        string $displayType,
        string $displayPix,
        string $rearCamera,
        string $frontCamera,
        string $modelId
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->cpuCore = $cpuCore;
        $this->cpuGhz = $cpuGhz;
        $this->memory = $memory;
        $this->storage = $storage;
        $this->battery = $battery;
        $this->displayType = $displayType;
        $this->displayPix = $displayPix;
        $this->rearCamera = $rearCamera;
        $this->frontCamera = $frontCamera;
        $this->modelId = $modelId;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'cpuCore' => $this->getCpuCore(),
            'cpuGhz' => $this->getCpuGhz(),
            'memory' => $this->getMemory(),
            'storage' => $this->getStorage(),
            'battery' => $this->getBattery(),
            'displayType' => $this->getDisplayType(),
            'displayPix' => $this->getDisplayPix(),
            'rearCamera' => $this->getRearCamera(),
            'frontCamera' => $this->getFrontCamera(),
            'modelId' => $this->getModelId(),
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpuCore(): string
    {
        return $this->cpuCore;
    }

    public function getCpuGhz(): string
    {
        return $this->cpuGhz;
    }

    public function getMemory(): string
    {
        return $this->memory;
    }

    public function getStorage(): string
    {
        return $this->storage;
    }

    public function getBattery(): string
    {
        return $this->battery;
    }

    public function getDisplayType(): string
    {
        return $this->displayType;
    }

    public function getDisplayPix(): string
    {
        return $this->displayPix;
    }

    public function getRearCamera(): string
    {
        return $this->rearCamera;
    }

    public function getFrontCamera(): string
    {
        return $this->frontCamera;
    }

    public function getModelId(): string
    {
        return $this->modelId;
    }
}
