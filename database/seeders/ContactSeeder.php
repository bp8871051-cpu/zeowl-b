<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Rahul Sharma',
                'email' => 'rahul.sharma@techcorp.in',
                'phone' => '+91 63525 24266',
                'service' => 'Website Development',
                'message' => 'We need a high-performance corporate platform with custom CMS and Next.js frontend.',
                'status' => 'new',
                'notes' => 'Priority lead. Sent inquiry through Zeowl website.',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
            [
                'name' => 'Sarah Jenkins',
                'email' => 'sarah@globalfintech.io',
                'phone' => '+1 415 555 2671',
                'service' => 'AI Automation',
                'message' => 'Looking to implement an autonomous document parsing and compliance agent network.',
                'status' => 'in_progress',
                'notes' => 'Call scheduled for Thursday 4 PM.',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
            ],
            [
                'name' => 'Amit Patel',
                'email' => 'amit.patel@healthbridge.com',
                'phone' => '+91 99887 76655',
                'service' => 'Mobile App Development',
                'message' => 'Need a cross-platform Flutter telemedicine application with real-time video consultations.',
                'status' => 'contacted',
                'notes' => 'Initial NDA signed, requirements document shared.',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::updateOrCreate(
                ['email' => $contact['email'], 'service' => $contact['service']],
                $contact
            );
        }
    }
}
