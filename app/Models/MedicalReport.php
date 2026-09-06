<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    protected $table = 'medical_reports';

    public const FILE_NO_START = 1312161;

    public static function nextFileNo(): int
    {
        $maxId = (int) static::max('id');

        return self::FILE_NO_START + $maxId;
    }

    public function serialFileNo(): string
    {
        return (string) (self::FILE_NO_START + (int) $this->id - 1);
    }

    protected $fillable = [
        'to_name',
        'report_date',
        'file_no',
        'time',
        'name',
        'nationality',
        'age',
        'sex',
        'sponsor_company',
        'job_desc',
        'city',
        'height',
        'weight',
        'pulse',
        'bp',
        'temp',
        'blood_group',
        'passport_or_iqama',
        'date_of_birth',
        'design',
    ];

    public function usesLatestDesign(): bool
    {
        return ($this->design ?? 'old') === 'latest';
    }
}
