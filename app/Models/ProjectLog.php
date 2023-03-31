<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLog extends Model
{
    use HasFactory;

    protected $table = "project_logs";
    protected $primaryKey = "id";
    protected $fillable = ['domain_id', 'location_id', 'status'];

    function getDomain(){
        return $this->hasOne(Domain::class, 'id', 'domain_id')->orderBy('id');
    }

    function getLocation(){
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    function getProjectLogMaster(){
        return $this->hasMany(ProjectLogRecord::class, 'project_log_id', 'id')->orderBy('id');
    }
}
