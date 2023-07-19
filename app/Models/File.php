<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function hasExpired()
    {
        if ($this->expire_after) {
            return Carbon::parse($this->expire_after)->isPast();
        }

        return false;
    }

}
