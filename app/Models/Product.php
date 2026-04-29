<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * Harus sesuai dengan nama tabel di migration.
     */
    protected $table = 'products';

    /**
     * Kolom yang dapat diisi melalui mass assignment.
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',
        'user_id',
        'category_id',
    ];

    /**
     * Nilai default untuk atribut tertentu.
     */
    protected $attributes = [
        'description' => '',
        'image' => null,
    ];

    /**
     * Relasi ke User yang membuat produk.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Category.
     * Digunakan agar produk terhubung dengan tabel kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}