<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'last_four', 'brand', 'recurrent'
    ];

    /**
     * Get the user related to the record
     *
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Filter rows using specific parameters.
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['user'] ?? null, function($query, $user) {
            if( $user->role_id == 1 ) {// Admin
                //Bring everything because is admin
            } elseif ( $user->role_id == 2 ) {// Apirest // Cliente
                // $query->where('user_id', $user->asociado->id);
            } else {
                #Bring everything because is admin
            }
        })
        ->when($filters['owner_id'] ?? null, function($query, $user_id) {
            $query->where('user_id', $user_id);
        })
        ->when($filters['fecha_inicio'] ?? null, function($query, $fecha_inicio) {
            $query->where('payment_date', '>=', $fecha_inicio);
        })
        ->when($filters['fecha_fin'] ?? null, function($query, $fecha_fin) {
            $query->where('payment_date', '<=', $fecha_fin);
        })
        ->when($filters['limit'] ?? null, function($query, $limit) {
            $query->limit($limit);
        });
    }
}