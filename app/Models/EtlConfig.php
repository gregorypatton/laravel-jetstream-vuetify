<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtlConfig extends Model
{
    use HasFactory;
    protected $table = 'etl_config';
    protected $primaryKey = 'etl_config_id';
    protected $fillable = [
        'report_type',
        'seller_id',
        'channel_id',
        'last_run_status',
        'last_run_ts',
        'last_report_id',
        'last_report_doc',
        'first_run_hr',
        'freq_run_min',
        'last_change_user',
    ];

    protected $casts = [
        'last_run_ts' => 'datetime',
        'last_change_ts' => 'datetime',
    ];
}
