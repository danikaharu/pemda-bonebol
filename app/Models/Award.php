<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name', 'appreciator', 'description'];

    public function category()
    {
        if ($this->category == 1) {
            return 'Hukum dan HAM';
        } elseif ($this->category == 2) {
            return 'Inovasi dan Digitalisasi';
        } elseif ($this->category == 3) {
            return 'Investasi';
        } elseif ($this->category == 4) {
            return 'Kehumasan';
        } elseif ($this->category == 5) {
            return 'Kepegawaian';
        } elseif ($this->category == 6) {
            return 'Ketenagakerjaan';
        } elseif ($this->category == 7) {
            return 'Olahraga';
        } elseif ($this->category == 8) {
            return 'Pembangunan';
        } elseif ($this->category == 9) {
            return 'Pemberdayaan Masyarakat';
        } elseif ($this->category == 10) {
            return 'Penanggulangan Bencana';
        } elseif ($this->category == 11) {
            return 'Prestasi Bupati';
        } elseif ($this->category == 12) {
            return 'Sosial Budaya';
        } elseif ($this->category == 13) {
            return 'Sumber Daya Energi dan Mineral';
        } elseif ($this->category == 14) {
            return 'Transparansi Keuangan';
        } else {
            return '-';
        }
    }
}
