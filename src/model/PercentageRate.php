<?php

namespace App\model;

class PercentageRate
{
    private int $month_count;

    private float $percentage;

    private float $bank_percentage;

    public function __construct(int $month_count, float $percentage, float $bank_percentage)
    {
        //todo use assert functions
        if ($month_count === 0) throw new \RuntimeException("Month count should be greater then zero.");
        if ($percentage > 1 || $percentage < 0) throw new \RuntimeException("Percentage should be in range 0..1");
        if ($bank_percentage > 1 || $bank_percentage < 0) throw new \RuntimeException("Percentage should be in range 0..1");

        $this->month_count = $month_count;
        $this->percentage = $percentage;
        $this->bank_percentage = $bank_percentage;
    }

    public function getMonthCount(): int
    {
        return $this->month_count;
    }

    public function setMonthCount(int $month_count): void
    {
        $this->month_count = $month_count;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function setPercentage(float $percentage): void
    {
        $this->percentage = $percentage;
    }

    public function getBankPercentage(): float
    {
        return $this->bank_percentage;
    }

    public function setBankPercentage(float $bank_percentage): void
    {
        $this->bank_percentage = $bank_percentage;
    }
}
