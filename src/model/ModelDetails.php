<?php

namespace App\model;

class ModelDetails implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $processor;
    private string $cpu;
    private string $memory;
    private string $storage;
    private string $battery;
    private string $display;
    private string $rear_camera;
    private string $front_camera;
    private int $model_id;

    /**
     * ModelDetails constructor.
     * @param int $id
     * @param string $name
     * @param string $processor
     * @param string $cpu
     * @param string $memory
     * @param string $storage
     * @param string $battery
     * @param string $display
     * @param string $rear_camera
     * @param string $front_camera
     * @param int $model_id
     */
    public function __construct(int $id, string $name, string $processor, string $cpu, string $memory, string $storage, string $battery, string $display, string $rear_camera, string $front_camera, int $model_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->processor = $processor;
        $this->cpu = $cpu;
        $this->memory = $memory;
        $this->storage = $storage;
        $this->battery = $battery;
        $this->display = $display;
        $this->rear_camera = $rear_camera;
        $this->front_camera = $front_camera;
        $this->model_id = $model_id;
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
     * @return string
     */
    public function getProcessor(): string
    {
        return $this->processor;
    }

    /**
     * @param string $processor
     */
    public function setProcessor(string $processor): void
    {
        $this->processor = $processor;
    }

    /**
     * @return string
     */
    public function getCpu(): string
    {
        return $this->cpu;
    }

    /**
     * @param string $cpu
     */
    public function setCpu(string $cpu): void
    {
        $this->cpu = $cpu;
    }

    /**
     * @return string
     */
    public function getMemory(): string
    {
        return $this->memory;
    }

    /**
     * @param string $memory
     */
    public function setMemory(string $memory): void
    {
        $this->memory = $memory;
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->storage;
    }

    /**
     * @param string $storage
     */
    public function setStorage(string $storage): void
    {
        $this->storage = $storage;
    }

    /**
     * @return string
     */
    public function getBattery(): string
    {
        return $this->battery;
    }

    /**
     * @param string $battery
     */
    public function setBattery(string $battery): void
    {
        $this->battery = $battery;
    }

    /**
     * @return string
     */
    public function getDisplay(): string
    {
        return $this->display;
    }

    /**
     * @param string $display
     */
    public function setDisplay(string $display): void
    {
        $this->display = $display;
    }

    /**
     * @return string
     */
    public function getRearCamera(): string
    {
        return $this->rear_camera;
    }

    /**
     * @param string $rear_camera
     */
    public function setRearCamera(string $rear_camera): void
    {
        $this->rear_camera = $rear_camera;
    }

    /**
     * @return string
     */
    public function getFrontCamera(): string
    {
        return $this->front_camera;
    }

    /**
     * @param string $front_camera
     */
    public function setFrontCamera(string $front_camera): void
    {
        $this->front_camera = $front_camera;
    }

    /**
     * @return int
     */
    public function getModelId(): int
    {
        return $this->model_id;
    }

    /**
     * @param int $model_id
     */
    public function setModelId(int $model_id): void
    {
        $this->model_id = $model_id;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'processor' => $this->getProcessor(),
            'cpu' => $this->getCpu(),
            'memory' => $this->getMemory(),
            'storage' => $this->getStorage(),
            'battery' => $this->getBattery(),
            'display' => $this->getDisplay(),
            'rear_camera' => $this->getRearCamera(),
            'front_camera' => $this->getFrontCamera(),
            'model_id' => $this->getModelId(),
        ];
    }
}
