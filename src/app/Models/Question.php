<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Choice;

class Question extends Model
{
    use HasFactory;

    //modelを別のtableに繋げる　
    //protected クラス内だけでなく外部からも参照可能
    //⇒別テーブルから操作可能
    protected $guarded = ['created_at', 'updated_at'];
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
