<?php

namespace interfaces;

interface ProductExportInterface
{
    public function exportCSV($inputData);
    public function exportXML($inputData);
    public function exportJSON($inputData);
}