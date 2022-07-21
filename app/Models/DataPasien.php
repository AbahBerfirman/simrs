<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKelurahan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataPasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_telp',
        'rtrw',
        'kelurahan_id',
        'ttl',
        'jenis_kelamin',
    ];

    protected $dates = ['ttl'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'data_pasiens', 'length' => 10, 'prefix' =>date('ym')]);
        });
    }

    public function kelurahan()
    {
        return $this->belongsTo(DataKelurahan::class);
    }
}
