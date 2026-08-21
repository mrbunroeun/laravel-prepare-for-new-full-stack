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
            // Home / General FAQs
            // Left Column
            [
                'page' => 'home',
                'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?',
                'answer' => 'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'page' => 'home',
                'question' => 'How much does a room cost?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'page' => 'home',
                'question' => 'Are smoking and non-smoking rooms available?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'page' => 'home',
                'question' => 'Is breakfast included?',
                'answer' => 'ComingSoon',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 4,
            ],
            // Right Column
            [
                'page' => 'home',
                'question' => 'Are pets allowed?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 5,
            ],
            [
                'page' => 'home',
                'question' => 'What facilities are available?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 6,
            ],
            [
                'page' => 'home',
                'question' => 'Do you provide airport transportation?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 7,
            ],
            [
                'page' => 'home',
                'question' => 'Are there discounts for weekly or monthly stays?',
                'answer' => 'ComingSoon',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 8,
            ],

            // Property Sales FAQs
            [
                'page' => 'property-sales',
                'question' => 'What types of properties does CWD Realty & Hospitality offer for sale?',
                'answer' => 'CWD focuses on residential properties and condominium projects in Cambodia, including projects such as Wealth Mansion, Private Residential, and UC88, subject to current availability.',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'page' => 'property-sales',
                'question' => 'What types of units are available at Wealth Mansion?',
                'answer' => 'A variety of unit layouts including 1-bedroom, 2-bedroom, and penthouse residences designed for modern urban living.',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'page' => 'property-sales',
                'question' => 'Can I buy a property and have CWD manage it for rental?',
                'answer' => 'Yes, CWD provides comprehensive rental and property management solutions to help owners maximize occupancy and returns.',
                'column' => 'left',
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'page' => 'property-sales',
                'question' => 'Can foreigners buy property in Cambodia?',
                'answer' => 'Foreign investors can legally own freehold strata titles for condominium properties from the first floor and above in Cambodia.',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 4,
            ],
            [
                'page' => 'property-sales',
                'question' => 'Can I arrange a property viewing before buying?',
                'answer' => 'Yes, our team can arrange scheduled in-person property tours and consultations tailored to your requirements.',
                'column' => 'right',
                'status' => 'published',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                [
                    'page' => $faq['page'],
                    'question' => $faq['question'],
                ],
                $faq
            );
        }
    }
}
