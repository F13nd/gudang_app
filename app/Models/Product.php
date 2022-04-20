<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stock', 'description'];

    public function outgoing_transaction()
    {
        return $this->hasMany(OutgoingTransaction::class);
    }

    public function incoming_transaction()
    {
        return $this->hasMany(IncomingTransaction::class);
    }
}
