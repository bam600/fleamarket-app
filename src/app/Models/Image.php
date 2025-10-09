<?php
// Imageテーブル
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // 代入可能なカラム（セキュリティ責務）
    protected $fillable = [
        'exhibition_id',
        'path',
        'original_name',
    ];

    // リレーション：出品との接続責務
    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }
}