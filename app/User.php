<?php

namespace App;
use App\Article;
use App\Model\Review;
use App\Model\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'gender', 'telephone', 'avatar'
    // ];
    protected $guarded = [];

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
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);

    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function rating(){
      return   $this->reviews->count() ? round($this->reviews->sum('star')/ $this->reviews->count(),1):'NO Rating Yet';
    }
}
