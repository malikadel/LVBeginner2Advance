<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'posts';
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'is_published'
    // ];
     
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }


}
