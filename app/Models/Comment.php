<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'text',
        'rating',
        'initials',
        'status',
    ];

    /**
     * Compute 2-letter uppercase initials:
     * e.g., "Has Bun" -> "HB", "Has Bun Roen" -> "HB", "Bunroeun" -> "BU"
     */
    public static function extractInitials(string $name): string
    {
        $name = trim($name);
        if (empty($name)) {
            return 'CW';
        }

        // Split by whitespace
        $words = preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY);

        if (count($words) >= 2) {
            // First letter of first word + first letter of second word (e.g. "Has Bun" -> "HB", "Has Bun Roen" -> "HB")
            $first = mb_substr($words[0], 0, 1);
            $second = mb_substr($words[1], 0, 1);
            return mb_strtoupper($first . $second);
        }

        // Single word: take first two letters
        return mb_strtoupper(mb_substr($words[0], 0, 2));
    }
}
