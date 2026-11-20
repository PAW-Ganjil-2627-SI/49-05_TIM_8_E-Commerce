<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
use Notifiable;
protected $fillable = ['username', 'password', 'role',];
public function hasRole(string ...$roles): bool
{
    return in_array($this->role, $roles, true);
}
protected $hidden = [
'password',
'remember_token',
];
protected function casts(): array
{
return [
'password' => 'hashed',
];
}
}
