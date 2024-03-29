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
        'agency_id',
        'jenis',
        'slug',
        'key',
        'content',
        'number',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->with('parent');
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->children()->with('childrens');
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
        return Menu::where('slug', $slug)->exists();
    }
}
