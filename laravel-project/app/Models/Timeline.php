<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Timeline extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'timeline',
        'is_public',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public static function getAllTimeline() {  //最新のデータベースの情報をとってくるようにする
        //$allTimeline = self::all();
        //指定のuse_idを取得して、
        $allTimeline = self::all();
        return $allTimeline;
    }

    public static function getUserTimeline($userId) {  //最新のデータベースの情報をとってくるようにする
        //$allTimeline = self::all();
        //指定のuse_id(2)を取得して、

        //$userTimeline = self::all();
        $userTimeline = self::where('user_id', $userId)->get();
        return $userTimeline;
    }
}


//ブランチを新しく作る、enyaStudy
//enyaStudyにチェックアウト
//変更をadd
//変更をcommit コメントを書く　作業内容
//pushする

//pullリクエストを発行
//変更のタイトル、内容、誰に向けてか(main)
//アサインメントは自分を登録