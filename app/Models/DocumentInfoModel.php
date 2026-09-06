<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentInfoModel extends Model
{
    use HasFactory;

    // টেবিলের নাম
    protected $table = 'documents_info';

    // প্রাইমারি কি
    protected $primaryKey = 'id';

    // Fillable ফিল্ডসমূহ
    protected $fillable = [
        'user_id',
        'user_name',
        'document_type',
        'document_link',
        'document_status',
        'document_id',
        'payment_amount',
    ];

    // কাস্টিং
    protected $casts = [
        'payment_amount' => 'decimal:2',
    ];

    // ❌ Laravel যেন created_at ও updated_at ব্যবহার না করে
    public $timestamps = false;
}
