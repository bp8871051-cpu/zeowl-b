<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'project_code' => '01',
                'title' => 'Modern Real Estate & Web Engineering Platform',
                'slug' => 'modern-real-estate-platform',
                'domain' => 'WEB DEVELOPMENT',
                'category' => 'Web Apps',
                'category_label' => 'EDTECH & WEB PLATFORMS',
                'description' => 'High-performance full-stack web application featuring interactive property searches, real-time client consultations, verified mentor portals, and sub-second page transitions.',
                'impact' => '+180% Placement Rate',
                'users_metric' => '15,000+ Active Users',
                'tech_stack' => ['Next.js', 'React', 'Node.js', 'PostgreSQL', 'Tailwind CSS'],
                'image' => '/portfolio/mockup-web-dev.jpg',
                'live_url' => 'https://zeowlinfotech.com/portfolio/real-estate',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'project_code' => '02',
                'title' => 'FinVibe SaaS Enterprise Analytics Suite',
                'slug' => 'finvibe-saas-analytics-suite',
                'domain' => 'SOFTWARE DEVELOPMENT',
                'category' => 'Web Apps',
                'category_label' => 'FINTECH & ENTERPRISE SAAS',
                'description' => 'Comprehensive cloud software platform with real-time analytics, automated multi-currency ledger, live KPI telemetry dashboards, and instant automated vendor payouts.',
                'impact' => '$42M+ Processed Vol',
                'users_metric' => 'Sub-50ms Query Latency',
                'tech_stack' => ['React', 'TypeScript', 'Redux Toolkit', 'Chart.js', 'Go', 'Laravel'],
                'image' => '/portfolio/mockup-software-dev.jpg',
                'live_url' => 'https://zeowlinfotech.com/portfolio/finvibe',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'project_code' => '03',
                'title' => 'AutomateIQ Multi-Agent Intelligence Engine',
                'slug' => 'automateiq-multi-agent-engine',
                'domain' => 'AI & AUTOMATION',
                'category' => 'AI & Automation',
                'category_label' => 'AI AGENTS & PIPELINES',
                'description' => 'Enterprise autonomous AI pipeline and document intelligence system that extracts complex financial records, automates CRM syncs, and powers smart predictive decisions.',
                'impact' => '1,200+ Hrs Saved/Mo',
                'users_metric' => '99.4% Extraction Acc',
                'tech_stack' => ['Python', 'LangChain', 'FastAPI', 'OpenAI', 'Redis'],
                'image' => '/portfolio/mockup-ai-automation.jpg',
                'live_url' => 'https://zeowlinfotech.com/portfolio/automateiq',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'project_code' => '04',
                'title' => 'Nova Health Telemedicine & Patient App',
                'slug' => 'nova-health-telemedicine-app',
                'domain' => 'APP DEVELOPMENT',
                'category' => 'Mobile Apps',
                'category_label' => 'HEALTHCARE & MOBILE',
                'description' => 'HIPAA-compliant mobile application offering instant video consultations, real-time prescription synchronization, automated vitals tracking, and encrypted chat.',
                'impact' => '4.9 ★ App Rating',
                'users_metric' => '50,000+ Consultations',
                'tech_stack' => ['Flutter', 'Dart', 'WebRTC', 'Firebase', 'Laravel REST API'],
                'image' => '/portfolio/mockup-app-dev.jpg',
                'live_url' => 'https://zeowlinfotech.com/portfolio/nova-health',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'project_code' => '05',
                'title' => 'LuxeCraft Global Brand & Design System',
                'slug' => 'luxecraft-global-brand-system',
                'domain' => 'UI/UX DESIGN',
                'category' => 'UI/UX Design',
                'category_label' => 'E-COMMERCE & LUXURY BRANDING',
                'description' => 'End-to-end design system overhaul for an ultra-luxury lifestyle label including typography rules, 3D product visualizer interactions, and high-conversion checkout flows.',
                'impact' => '+230% Conversion Lift',
                'users_metric' => 'Design System 2.0',
                'tech_stack' => ['Figma', 'Spline 3D', 'Tailwind CSS', 'Framer Motion'],
                'image' => '/portfolio/mockup-design.jpg',
                'live_url' => 'https://zeowlinfotech.com/portfolio/luxecraft',
                'is_featured' => false,
                'order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Portfolio::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
