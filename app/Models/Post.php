<?php

namespace App\Models;

use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use DatePresenter;

    protected $faillible = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    
}
