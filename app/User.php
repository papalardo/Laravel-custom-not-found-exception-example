<?php

namespace App;

use Illuminate\Support\Facades\View;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Custom\ModelNotFound\CustomModelNotFound;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Custom\CustomModelNotFoundResponse\Response\ModelNotFoundResponse;
use App\Custom\CustomModelNotFoundResponse\Contracts\ModelNotFoundResponseContract;
use App\Custom\CustomModelNotFoundResponse\Contracts\HasCustomModelNotFoundResponse;

class User extends Authenticatable implements HasCustomModelNotFoundResponse
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

    public function getCustomModelNotFoundResponse($request, $exception) : ModelNotFoundResponseContract
    {
        $response = new ModelNotFoundResponse($request, $exception);

        return $response
                ->setMessage("User {$response->getStringIds()} not found")
                ->setView('user_not_found');
        
        // OR
        // return $response;
    }
}
