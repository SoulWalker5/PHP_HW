<?php

namespace services;

use exceptions\ExportException;
use interfaces\ExportInterface;
use SimpleXMLElement;

class XMLExportService implements ExportInterface
{
    public function export($inputData)
    {
        function array_to_xml($data, $xml_data)
        {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    if (is_numeric($key)) {
                        $key = 'product';
                    }
                    $currentNode = $xml_data->addChild($key);
                    array_to_xml($value, $currentNode);
                } else {
                    $xml_data->addChild("$key", htmlspecialchars("$value"));
                }
            }
        }
        $xml = new SimpleXMLElement('<products/>');

        array_to_xml($inputData, $xml);


        $filename = 'file' . '.xml';
        $fd = fopen($filename, 'w') or die("cannot create file");

        fputs($fd, $xml->asXML());
        fclose($fd);

        if(!isset($filename)){
            throw new ExportException("Export was unsuccessfully");
        }

        return $filename;
    }
}