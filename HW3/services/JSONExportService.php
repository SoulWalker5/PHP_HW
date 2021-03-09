<?php

namespace services;

use exceptions\ExportException;
use interfaces\ExportInterface;

class JSONExportService implements ExportInterface
{
    public function export($inputData)
    {
        $json = json_encode($inputData);
        $filename = 'file' . '.json';
        $fd = fopen($filename, 'w') or die("cannot create file");

        fputs($fd, $json);
        fclose($fd);

        if(!isset($filename)){
            throw new ExportException("Export was unsuccessfully");
        }

        return $filename;
    }
}