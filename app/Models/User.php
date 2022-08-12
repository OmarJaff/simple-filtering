<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->where(fn($query) => $query->where('name', 'like','%' . $search . '%')
               ->orWhere('email', 'like', '%' . $search . '%')
               ->orWhere('username', 'like', '%' .$search. '%'));
        });

        $query->when($filters['gender'] ?? false, function ($query, $gender) {
            $query->where('gender', $gender  );
        });

         $query->when($filters['position'] ?? false, function ($query, $position) {
             $query->whereHas('position',   fn($query)  =>
                 $query->where('title',  $position));

        });
    }

    public function position()
    {
       return $this->belongsTo(Position::class);
    }



}
