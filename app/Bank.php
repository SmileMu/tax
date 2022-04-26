<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';

    protected $fillable = [
        'bank_name', 'adress',


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
        return $this->hasMany(Account::class, 'id');
    }



    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function emp()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_id', 'id');
    }

    /**
     * Get all of the transactions for the Bank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'bank_id', 'id');
    }

}
