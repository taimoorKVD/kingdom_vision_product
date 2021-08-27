<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'age', 'address', 'phone_prefix', 'phone_number', 'zip', 'state', 'city', 'country', 'profile_photo',
        'deactivate_reason', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function syncModel()
    {
        return DB::table('model_has_roles')
            ->where('model_id',$this->id)
            ->delete();
    }

    public function current_state()
    {
        return $this->belongsTo('App\Models\Admin\State','state');
    }

    public function current_city()
    {
        return $this->belongsTo('App\Models\Admin\City','city');
    }
}
