<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'profile', 'photo', 'lhkpn', 'contact', 'position'];

    public function position()
    {
        if ($this->position == 1) {
            return 'Bupati';
        } elseif ($this->position == 2) {
            return 'Wakil Bupati';
        } elseif ($this->position == 3) {
            return 'Sekretaris Daerah';
        } else {
            return '-';
        }
    }
}
