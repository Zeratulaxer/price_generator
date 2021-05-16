<?php

namespace App\model;

class PercentageRate
{
    /**
     * This field is identifier(PK).
     *
     * @var int
     */
    private int $monthCount;

    private float $percentage;

    private float $bankPercentage;

    public function __construct(int $monthCount, float $percentage, float $bankPercentage)
    {
        //todo use assert functions
        if ($monthCount === 0) throw new \RuntimeException("Month count should be greater then zero.");
        if ($percentage > 1 || $percentage < 0) throw new \RuntimeException("Percentage should be in range 0..1");
        if ($bankPercentage > 1 || $bankPercentage < 0) throw new \RuntimeException("Percentage should be in range 0..1");

        $this->monthCount = $monthCount;
        $this->percentage = $percentage;
        $this->bankPercentage = $bankPercentage;
    }

    public function getMonthCount(): int
    {
        return $this->monthCount;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function getBankPercentage(): float
    {
        return $this->bankPercentage;
    }
}
