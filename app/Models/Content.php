<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'slug', 'content', 'tanggal', 'ref_content_id', 'sampul'];

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

    public function ref_content()
    {
        return $this->belongsTo(RefContent::class, 'ref_content_id');
    }
}
