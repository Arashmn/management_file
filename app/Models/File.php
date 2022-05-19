<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class File extends Model
{
    use HasFactory;

    protected $fillable = [

        'Name', 'path','volume','thumbnail'
    ];


    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->format('Y-n-j');
    }
    public function getUpdatedAtAttribute($value)
    {
        return (new Verta($value))->format('Y-n-j');
    }

    public function getImageAttribute()
    {
         return Storage::url($this->path);
    }
}