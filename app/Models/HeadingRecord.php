<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingRecord extends Model
{
    use HasFactory;

    protected $table = "heading_records";
    protected $primaryKey = "id";
    protected $fillable = ['group_id', 'heading_id', 'data', 'unique_row_num'];
}
