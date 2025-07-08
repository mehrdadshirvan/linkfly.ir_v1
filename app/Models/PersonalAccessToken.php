<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;


/**
 * App\Models\PersonalAccessToken
 *
 * @property-read \Illuminate\Database\Eloquent\Model|Eloquent $tokenable
 * @method static Builder|PersonalAccessToken newModelQuery()
 * @method static Builder|PersonalAccessToken newQuery()
 * @method static Builder|PersonalAccessToken query()
 * @property int $id
 * @property string $tokenable_type
 * @property int $tokenable_id
 * @property string $name
 * @property string $token
 * @property string|null $notification_token
 * @property array|null $abilities
 * @property string|null $last_used_ip
 * @property \Illuminate\Support\Carbon|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|PersonalAccessToken whereAbilities($value)
 * @method static Builder|PersonalAccessToken whereCreatedAt($value)
 * @method static Builder|PersonalAccessToken whereId($value)
 * @method static Builder|PersonalAccessToken whereLastUsedAt($value)
 * @method static Builder|PersonalAccessToken whereLastUsedIp($value)
 * @method static Builder|PersonalAccessToken whereName($value)
 * @method static Builder|PersonalAccessToken whereNotificationToken($value)
 * @method static Builder|PersonalAccessToken whereToken($value)
 * @method static Builder|PersonalAccessToken whereTokenableId($value)
 * @method static Builder|PersonalAccessToken whereTokenableType($value)
 * @method static Builder|PersonalAccessToken whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fillable = ['name', 'token', 'abilities','last_used_ip'];

    protected $guarded = ['last_used_ip'];


    public function forceFill(array $attributes)
    {
        if (config('sanctum.get_ip_user')) {
            $attributes = array_merge($attributes, ['last_used_ip' => request()->ip()]);
        }
        return parent::forceFill($attributes);
    }


}