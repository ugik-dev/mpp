<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'slug', 'content', 'tanggal', 'ref_content_id', 'sampul', 'user_id', 'agency_id'];
    public function scopeCreateUniqueSlug($query, $title)
    {
        $slug = Str::slug($title);

        $count = 1;
        while ($this->slugExists($slug)) {
            $slug = Str::slug($title) . '-' . $count++;
        }
        return $slug;
    }

    private function scopeUser($query)
    {
        return $query->join('users')->exists();
    }

    private function slugExists($slug)
    {
        return Content::where('slug', $slug)->exists();
    }

    public function ref_content()
    {
        return $this->belongsTo(RefContent::class, 'ref_content_id');
    }

    public function scopeWithUserInstansi($query)
    {
        return
            $query
            ->selectRaw('agencies.name_sort as agency_name')->leftJoin('agencies', 'agencies.id', '=', 'contents.agency_id')
            ->selectRaw('users.name as user_name')->leftJoin('users', 'users.id', '=', 'contents.user_id');
    }
}
