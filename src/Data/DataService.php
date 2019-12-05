<?php

namespace App\Data;

use Exception;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class DataService implements IDataService
{
    public function readDataFile($fileName): object
    {
        if (!file_exists($fileName))
            throw new FileNotFoundException($fileName);

        $str = file_get_contents($fileName);
        $json = json_decode($str);
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $json;
                break;
            default:
                throw new Exception(json_last_error_msg());
                break;
        }
    }
}
