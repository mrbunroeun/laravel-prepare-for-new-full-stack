<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Left Column
            [
                'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?',
                'answer' => 'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'question' => 'How much does a room cost?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'question' => 'Are smoking and non-smoking rooms available?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'question' => 'Is breakfast included?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 4,
            ],
            // Right Column
            [
                'question' => 'Are pets allowed?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 5,
            ],
            [
                'question' => 'What facilities are available?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 6,
            ],
            [
                'question' => 'Do you provide airport transportation?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 7,
            ],
            [
                'question' => 'Are there discounts for weekly or monthly stays?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 8,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
