<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YearlyReport extends Model
{
    use HasFactory;
    public $guarded=[];

    
    public function satker(): BelongsTo
    {
        return $this->belongsTo(Satker::class, 'satker_id', 'id');
    }
    public function reportType(): BelongsTo
    {
        return $this->belongsTo(ReportType::class, 'report_type_id', 'id');
    }
}
