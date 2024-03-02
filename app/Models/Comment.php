<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'message', 'content_id', 'reply_id', 'show', 'star', 'ip_address'];
}
