<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    protected $table = 'links';
    protected $guarded = [];

    public static function columns()
    {
        $columns = [
            'uuid',
            'code',
            'original_url',
            'short_url',
            'qr_code',
            'clicks',
        ];
        if (!empty($array[0])) {
            $columns = array_merge($columns, $array);
        }
        return $columns;
    }
}
