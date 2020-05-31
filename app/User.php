<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Custom\ModelNotFound\CustomModelNotFound;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Custom\ModelNotFound\CustomModelNotFoundExceptionContract;

class User extends Authenticatable implements CustomModelNotFoundExceptionContract
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getCustomModelNotFound($request, ModelNotFoundException $exception) : CustomModelNotFound
    {
        $forgetIds = implode(',', $exception->getIds());

        return (new CustomModelNotFound)
            ->setMessage('User not found')
            ->setView('user_not_found')
            ->setViewData(['ids' => $forgetIds]);
        
        // OR
        // return new CustomModelNotFound;
    }
}
