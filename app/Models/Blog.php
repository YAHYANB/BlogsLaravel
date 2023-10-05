<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tags',
        'content',
        'image',
        'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function scopeFilter ($query , array $filters) {
        if ($filters['tag'] ?? false) {
            $query->where('tags','like','%'.request('tag').'%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('tags','like','%'.request('search').'%');
        }
    }
}
