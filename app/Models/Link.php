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
            'url',
            'clicks',
        ];
        if (!empty($array[0])) {
            $columns = array_merge($columns, $array);
        }
        return $columns;
    }

    protected $appends = ['short_url'];

    public function getShortUrlAttribute(){
        return url(!empty($this->code) ? $this->code : $this->id);
        return 'https://lfly.ir/'.(!empty($this->code) ? $this->code : $this->id);
    }
}
