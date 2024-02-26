<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'jenis',
        'slug',
        'key',
        'content',
    ];
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeCreateUniqueSlug($query, $title)
    {
        $slug = Str::slug($title);

        $count = 1;
        while ($this->slugExists($slug)) {
            $slug = Str::slug($title) . '-' . $count++;
        }
        return $slug;
    }

    private function slugExists($slug)
    {
        return Content::where('slug', $slug)->exists();
    }
}
