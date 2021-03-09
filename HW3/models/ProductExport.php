<?php


namespace models;

use exceptions\ExportException;
use interfaces\ProductExportInterface;
use SimpleXMLElement;

class ProductExport implements ProductExportInterface
{
    /**
     * @param $inputData
     * @return string <p>
     * Return name of file;
     * </p>
     */
    public function exportCSV($inputData)
    {
        $filename = 'file'. '.csv';
        $stream = fopen($filename, 'w');
        $attributes = array_flip($inputData[0]);
        fputcsv($stream, $attributes, ";");

        foreach ($inputData as $fields) {
            fputcsv($stream, $fields, ";");
        }

        fclose($stream);

        if(!isset($filename)){
            throw new ExportException("Export was unsuccessfully");
        }

        return $filename;
    }

    /**
     * @param $inputData
     * @return string <p>
     * Return name of file;
     * </p>
     */
    public function exportXML($inputData)
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

    public function exportJSON($inputData)
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