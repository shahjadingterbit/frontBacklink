<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = "groups";
    protected $primaryKey = "id";
    protected $fillable = ['name'];

    function getHeadings() {
        return $this->hasMany(Heading::class, 'group_id', 'id')->orderBy('id');
    }

    function getHeadingRecords() {
        return $this->hasMany(HeadingRecord::class, 'group_id', 'id')->orderBy('id');
    }
}
