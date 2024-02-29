<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'alamat', 'phone', 'whatsapp', 'email', 'website', 'logo', 'image', 'agency_id'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'agency_id');
    }
    public function menuparent()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
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
        return Agency::where('slug', $slug)->exists();
    }
}
