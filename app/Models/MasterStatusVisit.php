<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStatusVisit extends Model
{
    use HasFactory;

    const DALAM_ANTRIAN = 1;
    const SELESAI_VITAL = 2;
    const PERIKSA_DOKTER = 3;
    const OBAT = 4;
    const DONE = 5;

}
