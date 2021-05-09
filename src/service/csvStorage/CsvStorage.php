<?php

namespace App\service\csvStorage;

use RuntimeException;

class CsvStorage
{
    private const SEPARATOR = ';';

    private string $filename;

    public function __construct(string $filename)
    {
        if (!file_exists(__DIR__ . "/../../../storage/" . $filename)) {
            throw new \RuntimeException("File not found.");
        }

        $this->filename = __DIR__ . "/../../../storage/" . $filename;
    }

    function findAll(callable $hydrate): array
    {
        $handle = fopen($this->filename, 'r');

        if ($handle === false) throw new RuntimeException('File not found or do not open.');

        $headers = fgetcsv($handle, 0, self::SEPARATOR);

        $result = [];

        while ($row = fgetcsv($handle, 0, self::SEPARATOR)) {
            $result[] = $hydrate(array_combine($headers, $row));
        }

        fclose($handle);

        return $result;
    }
}