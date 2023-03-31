<?php

namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromArray;

class ExportDomain implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
   

    protected $domains;

    public function __construct(array $domains)
    {
        $this->domains = $domains;
    }

    public function array(): array
    {
        return $this->domains;
    }
}
