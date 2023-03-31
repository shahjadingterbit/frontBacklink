<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLogRecord extends Model
{
    use HasFactory;

    protected $table = "project_log_records";
    protected $primaryKey = "id";
    protected $fillable = ['group_id', 'project_log_id', 'unique_row_num'];
}
