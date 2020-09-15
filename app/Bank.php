<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['count_number', 'amount', 'balance'];

    const LABEL_SACAR = "sacar";
    const LABEL_DEPOSITAR = "depositar";

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = $this->attributes['amount'] + $value;
    }
}
