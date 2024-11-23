<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $table = "notices";

    protected $fillable = [
        'notice_id',
        'title',
        'description',
        'regards_by',
        'flashing_start',
        'flashing_ending',
        'status',
    ];

    // Function to generate a unique notice ID
    public static function generateNoticeId(): string
    {
        // Define the prefix
        $prefix = 'NOT';

        // Get current date details
        $today = Carbon::now();
        $day = $today->format('d'); // Day
        $month = strtolower($today->format('M')); // Current month abbreviation
        $year = $today->format('y'); // Last two digits of the year

        // Get the sequence number for the current month and year
        $sequence = self::whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->count() + 1; // Count of notices created in the current month + 1

        // Format the sequence to be two digits
        $sequenceFormatted = str_pad($sequence, 2, '0', STR_PAD_LEFT);

        // Generate the full notice ID
        $fullNoticeId = "{$prefix}-{$day}-{$month}-{$year}-{$sequenceFormatted}";

        return $fullNoticeId;
    }

}
