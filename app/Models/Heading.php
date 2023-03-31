<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    use HasFactory;

    protected $table = "headings";
    protected $primaryKey = "id";
    protected $fillable = ['group_id', 'name'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'id', 'group_id');
    }
}
