<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;

class UserImport implements ToArray
{
    /**
    * @param Collection $collection
    */
    public function array(array $rows)
    {
      return $rows;
    }
}