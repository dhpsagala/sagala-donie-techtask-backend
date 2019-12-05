<?php

namespace App\Data;

interface IDataService
{
    public function readDataFile($jsonData) : object;
}
