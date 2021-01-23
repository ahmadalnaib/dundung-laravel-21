<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Work extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'name',
        'title',
        'location',
        'description',
        'image',
        'link',
        'contact',
        'published_at',
        'category_id',
        'user_id'
    ];


    public function ownsBy(User $user)
    {

        return $user->id === $this->user_id;

    }

    public  function category()
    {
        return $this->belongsTo(Category::class);
    }
    public  function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public  function deleteImage()
    {
        Storage::delete($this->image);
    }
//function if the job has tag
    public function hasTag($tagId)
    {
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    public  function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function scopeSearched($query)
    {
        $search=request()->query('search');

        if(!$search)
        {
            return $query;
        }
        return $query->where('title', 'LIKE', "%{$search}%");
    }
}
