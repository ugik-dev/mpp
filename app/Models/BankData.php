<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BankData extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ref_id', 'tanggal_dokumen', 'slug', 'description', 'agency_id', 'user_id', 'view', 'filename', 'public', 'fileextension'];

    public function scopeComplete($query)
    {
        return
            $query
            ->selectRaw('ref_bank_data.name as ref_name')->leftJoin('ref_bank_data', 'ref_bank_data.id', '=', 'bank_data.ref_id')
            ->selectRaw('agencies.name_sort as agency_name')->leftJoin('agencies', 'agencies.id', '=', 'bank_data.agency_id')
            ->selectRaw('users.name as user_name')->join('users', 'users.id', '=', 'bank_data.user_id');
    }
    public function scopeFilter($query, $filter)
    {
        return    $query->where('bank_data.name', 'like', '%' . $filter . '%')
            ->orWhere('bank_data.description', 'like', '%' . $filter . '%')
            ->orWhere('bank_data.tanggal_dokumen', 'like', '%' . $filter . '%')
            ->orWhere('agencies.name_sort', 'like', '%' . $filter . '%')
            ->orWhere('agencies.name', 'like', '%' . $filter . '%')
            ->orWhere('users.name', 'like', '%' . $filter . '%')
            ->orWhere('ref_bank_data.name', 'like', '%' . $filter . '%');
    }
    public function scopeCreateUniqueSlug($query, $name, $date)
    {
        $title = $name . ' ' . $date;
        $slug = Str::slug($title);
        $count = 1;
        while ($this->slugExists($slug)) {
            $slug = Str::slug($title) . '-' . $count++;
        }
        return $slug;
    }

    private function slugExists($slug)
    {
        return BankData::where('slug', $slug)->exists();
    }
}
