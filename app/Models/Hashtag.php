<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $primaryKey = 'name'; // 'name' を主キーとして使用

    // 自動的にインクリメントされないので、主キーは数字ではなく文字列として管理
    public $incrementing = false;

    // タイムスタンプを使わない場合
    public $timestamps = false;

    // fillable に name を追加
    protected $fillable = ['name'];


    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'hashtag_accommodation');
    }

    public function hashtagAccommodation() {
        return $this->hasMany(HashtagAccommodation::class);
    }

}
