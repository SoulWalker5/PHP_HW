<?php

namespace services;

use exceptions\ExportException;
use interfaces\ExportInterface;

class CSVExportService implements ExportInterface
{
    public function export($inputData)
    {
        $filename = 'file' . '.csv';
        $stream = fopen($filename, 'w');
        $attributes = array_flip($inputData[0]);
        fputcsv($stream, $attributes, ";");

        foreach ($inputData as $fields) {
            fputcsv($stream, $fields, ";");
        }

        fclose($stream);

        if (!isset($filename)) {
            throw new ExportException("Export was unsuccessfully");
        }

        return $filename;
    }
}