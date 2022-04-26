<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'bank_id' ,
        'accountNumber' ,
        'institution_id' ,
        'balance',
        'type',
    ];

    /**
     * $type
     * define the using place of this account .
     */

    public static $type = [
        'system' => 2,
        'main' => 1
    ];


    /**
     * Get the branch that owns the Bank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banks()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }

    /**
     * Get all of the transactions for the Bank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transacsions::class, 'bank_id', 'id');
    }

}
