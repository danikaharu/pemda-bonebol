<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name', 'head_office', 'address', 'url', 'email'];

    public function category()
    {
        if ($this->category == 1) {
            return 'Dinas';
        } elseif ($this->category == 2) {
            return 'Kecamatan';
        } elseif ($this->category == 3) {
            return 'Rumah Sakit';
        } else {
            return '-';
        }
    }

    public function scopeType($query, $type)
    {
        return $query->where('category', $type);
    }
}
