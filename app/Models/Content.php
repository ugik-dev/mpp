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

    public function comment()
    {
        return $this->hasMany(Comment::class, 'content_id');
    }

    public function scopeWithUserInstansi($query)
    {
        return
            $query
            ->selectRaw('agencies.name_sort as agency_name')->leftJoin('agencies', 'agencies.id', '=', 'contents.agency_id')
            ->selectRaw('users.name as user_name')->leftJoin('users', 'users.id', '=', 'contents.user_id');
    }
    public function scopeComplete($query)
    {
        return
            $query
            ->selectRaw('ref_contents.name as ref_content_name, prefix')->leftJoin('ref_contents', 'ref_contents.id', '=', 'contents.ref_content_id')
            ->selectRaw('agencies.name_sort as agency_name')->leftJoin('agencies', 'agencies.id', '=', 'contents.agency_id')
            ->selectRaw('users.name as user_name')->join('users', 'users.id', '=', 'contents.user_id');
    }
    public function scopeFilter($query, $filter)
    {
        return    $query->where('contents.content', 'like', '%' . $filter . '%')
            ->orWhere('contents.judul', 'like', '%' . $filter . '%')
            ->orWhere('agencies.name_sort', 'like', '%' . $filter . '%')
            ->orWhere('agencies.name', 'like', '%' . $filter . '%')
            ->orWhere('users.name', 'like', '%' . $filter . '%')
            ->orWhere('ref_contents.name', 'like', '%' . $filter . '%');
    }
}
