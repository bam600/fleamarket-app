<?php
// 商品出品テーブルのEloquent Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Exhibitionクラスはlaravelのmodelクラスを継承
class Exhibition extends Model
{   
    // モデルファクトリ機能を使用する為のトレイト
    use HasFactory;

    // fillable：ホワイトリスト方式で一括代入許可フィールドの定義
    protected $fillable = ['product_name', 'brand','condition_id','description','price','status','user_id' ];

    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }


}

