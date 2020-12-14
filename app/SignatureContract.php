<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignatureContract extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'signature_contracts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'signature_contract_name',
        'signature_contract_file',
        'type',
    ];
}
