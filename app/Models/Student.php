<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Return students status
    public function getStatus()
    {
        if ($this->status == 1) {
            return 'Active';
        } elseif ($this->status == 2) {
            return 'Suspended';
        } else {
            return 'Inactive';
        }
    }
}
