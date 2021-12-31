<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acces extends Model
{
    use HasFactory;

    public static function visit($ip, $country, $countryCode)
    {
        DB::table('acces')->updateOrInsert([
            'ip' => $ip, 'country' => $country, 'code' => $countryCode
        ], [
            'ip' => $ip, 'country' => $country, 'code' => $countryCode, 'updated_at' => now()
        ]);
        DB::table('acces')
            ->where('ip', $ip)
            ->increment('visit', 1);
    }

    public static function getCountry()
    {
        return self::selectRaw('country,code, count(country) as jumlah')
            ->groupBy('country', 'code')
            ->where('updated_at', '>', now()->subDay())
            ->orderBy('jumlah')
            ->limit(4)
            ->get();
    }
}
