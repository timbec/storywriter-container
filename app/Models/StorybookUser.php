<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StorybookUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'storybook_users';

    protected $fillable = ['name', 'email'];

    protected $hidden = ['remember_token'];
}
