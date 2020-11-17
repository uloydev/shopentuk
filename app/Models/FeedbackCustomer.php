<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCustomer extends Model
{
    use HasFactory;

    protected $table = 'feedback_customer';
    protected $fillable = ['name', 'telephone', 'email', 'message'];
}
