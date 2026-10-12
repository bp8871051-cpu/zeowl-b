<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Alexander Hayes',
                'client_role' => 'CTO',
                'company' => 'FinVibe Technologies',
                'content' => 'Zeowl engineered our core transaction processing engine from scratch. Their mastery of high-throughput architecture, sub-second query tuning, and flawless UI delivery helped us onboard 150k active users without a glitch.',
                'rating' => 5,
                'avatar' => '/testimonials/alexander.jpg',
                'project_name' => 'FinVibe SaaS Platform',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Dr. Elena Rostova',
                'client_role' => 'Founder & Chief Medical Officer',
                'company' => 'Nova Health Corp',
                'content' => 'The mobile telehealth application built by Zeowl has transformed our patient care delivery. Fluid 60fps video, rock-solid HIPAA encryption, and intuitive design that our elderly patients find effortless to navigate.',
                'rating' => 5,
                'avatar' => '/testimonials/elena.jpg',
                'project_name' => 'Nova Health Telemedicine App',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Marcus Vance',
                'client_role' => 'VP of Engineering',
                'company' => 'AutomateIQ Solutions',
                'content' => 'Zeowl’s AI team delivered an autonomous document extraction pipeline that reduced our weekly processing overhead by over 1,200 hours. Their deterministic guardrails eliminated hallucinations completely.',
                'rating' => 5,
                'avatar' => '/testimonials/marcus.jpg',
                'project_name' => 'AutomateIQ Multi-Agent Engine',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $item) {
            Testimonial::updateOrCreate(
                ['client_name' => $item['client_name'], 'company' => $item['company']],
                $item
            );
        }
    }
}
