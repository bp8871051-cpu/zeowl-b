<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'number' => '01',
                'slug' => 'web-development',
                'title' => 'Web Development',
                'eyebrow' => 'DIGITAL ENGINEERING',
                'short_desc' => 'Modern, responsive and high-performing websites built to convert visitors into customers.',
                'full_desc' => 'We engineer high-speed, enterprise-grade web applications and bespoke digital platforms. Using modern architecture with Next.js, React, and Laravel headless content systems, we build websites that load in milliseconds, scale effortlessly, and turn traffic into recurring revenue.',
                'card_type' => 'featured',
                'theme' => 'navy',
                'accent_color' => '#F47B20',
                'tags' => ['Next.js', 'React', 'Laravel', 'Full-Stack', 'E-Commerce', 'Performance'],
                'image' => '/images for services/01_web-development-removebg-preview.png',
                'metrics' => ['stat' => '0.4s', 'label' => 'Median LCP Load Time'],
                'deliverables' => [
                    'Custom Corporate & Brand Platforms',
                    'Headless E-Commerce Architectures',
                    'Progressive Web Applications (PWA)',
                    'Enterprise API Integration & CMS',
                    'Ultra-Fast SEO & Core Web Vitals Optimization',
                    'Serverless & Microservices Infrastructure'
                ],
                'technologies' => ['Next.js', 'React', 'Laravel', 'PHP', 'Tailwind CSS', 'PostgreSQL', 'MySQL'],
                'process' => [
                    ['step' => '01', 'title' => 'Architecture Blueprint', 'desc' => 'Defining data schemas, UX wireframes, and technology stack.'],
                    ['step' => '02', 'title' => 'Agile Engineering', 'desc' => 'Building modular UI components with atomic design and strict typing.'],
                    ['step' => '03', 'title' => 'Performance Hardening', 'desc' => 'Optimizing bundle size, caching headers, and responsive layouts.'],
                    ['step' => '04', 'title' => 'CI/CD Deployment', 'desc' => 'Automated testing and edge deployment with continuous uptime monitoring.']
                ],
                'faqs' => [
                    ['q' => 'Which tech stack do you recommend for high-traffic websites?', 'a' => 'We primarily architect on Next.js, React, and Laravel with REST/GraphQL APIs. This provides lightning-fast rendering, security, and boundless scalability.'],
                    ['q' => 'Do you build custom CMS integrations?', 'a' => 'Yes, we integrate modern headless CMS solutions or build tailored Laravel admin dashboards for your internal teams.']
                ],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'number' => '02',
                'slug' => 'ui-ux-design',
                'title' => 'UI/UX & Graphic Design',
                'eyebrow' => 'EXPERIENCE DESIGN',
                'short_desc' => 'Creative digital experiences and visual systems that make your brand memorable.',
                'full_desc' => 'We translate complex user flows into intuitive, visually breathtaking digital products. From deep user research and interactive design systems in Figma to micro-interactions and brand design, we ensure every touchpoint creates genuine emotional resonance.',
                'card_type' => 'white',
                'theme' => 'white',
                'accent_color' => '#F47B20',
                'tags' => ['Figma', 'Design Systems', 'User Research', 'Prototyping', 'Visual Identity'],
                'image' => '/images for services/03_ui-ux-design-removebg-preview.png',
                'metrics' => ['stat' => '+185%', 'label' => 'Avg User Engagement'],
                'deliverables' => [
                    'End-to-End Product & UI/UX Design',
                    'Comprehensive Design Systems & Tokens',
                    'Interactive High-Fidelity Prototypes',
                    'User Journey Mapping & Information Architecture',
                    'Usability Audits & Conversion Optimization',
                    'Marketing & Digital Graphic Assets'
                ],
                'technologies' => ['Figma', 'Adobe Creative Suite', 'Principle', 'Spline 3D', 'Storybook'],
                'process' => [
                    ['step' => '01', 'title' => 'User Discovery', 'desc' => 'Interviewing stakeholders and mapping pain points across customer journeys.'],
                    ['step' => '02', 'title' => 'Wireframing & UX', 'desc' => 'Crafting low-fidelity interaction structures focused on user clarity.'],
                    ['step' => '03', 'title' => 'Design System Tokens', 'desc' => 'Assembling consistent typographic hierarchies, colors, and components.'],
                    ['step' => '04', 'title' => 'Developer Handoff', 'desc' => 'Delivering production-ready specs, assets, and design documentation.']
                ],
                'faqs' => [
                    ['q' => 'Do you provide design tokens for frontend engineers?', 'a' => 'Yes, our Figma files include tokens for spacing, typography, colors, and transitions ready to import directly into Tailwind CSS or CSS Modules.'],
                ],
                'order' => 2,
                'is_active' => true,
            ],
            [
                'number' => '03',
                'slug' => 'app-development',
                'title' => 'Mobile App Development',
                'eyebrow' => 'CROSS-PLATFORM ENGINEERING',
                'short_desc' => 'Native and cross-platform mobile apps for iOS and Android built for peak performance.',
                'full_desc' => 'We create fluid, responsive, high-retention mobile apps using Flutter and React Native. Connected with robust Laravel backends, offline-first architectures, real-time push engines, and sub-16ms render speeds.',
                'card_type' => 'white',
                'theme' => 'white',
                'accent_color' => '#F47B20',
                'tags' => ['Flutter', 'React Native', 'iOS', 'Android', 'REST APIs'],
                'image' => '/images for services/02_app-development-removebg-preview.png',
                'metrics' => ['stat' => '60 FPS', 'label' => 'Fluid Rendering Rate'],
                'deliverables' => [
                    'Cross-Platform iOS & Android Apps',
                    'Offline Data Persistence & Syncing',
                    'Secure Biometric & In-App Payment Integrations',
                    'Push Notifications & Telemetry Logging',
                    'App Store & Google Play Store Submission'
                ],
                'technologies' => ['Flutter', 'React Native', 'Kotlin', 'Swift', 'Laravel API', 'Firebase'],
                'process' => [
                    ['step' => '01', 'title' => 'Feature Scoping', 'desc' => 'Specifying native capabilities, sensors, offline stores, and auth routines.'],
                    ['step' => '02', 'title' => 'Component Prototyping', 'desc' => 'Building 60FPS fluid touch surfaces and state pipelines.'],
                    ['step' => '03', 'title' => 'Hardware & Device QA', 'desc' => 'Validating performance across varied Android & iOS versions.'],
                    ['step' => '04', 'title' => 'Store Release', 'desc' => 'Managing code signing, metadata, and app store compliance.']
                ],
                'faqs' => [
                    ['q' => 'Should we choose Flutter or React Native?', 'a' => 'Both are stellar. If your team already has React web expertise, React Native shares logic nicely. If you need bespoke canvas animations and maximum UI fidelity across platforms, Flutter is unmatched.'],
                ],
                'order' => 3,
                'is_active' => true,
            ],
            [
                'number' => '04',
                'slug' => 'ai-automation',
                'title' => 'AI & Automation Solutions',
                'eyebrow' => 'INTELLIGENT SYSTEMS',
                'short_desc' => 'Autonomous agents, custom LLM fine-tuning, and robotic workflow automations.',
                'full_desc' => 'Deploy autonomous multi-agent networks and intelligent document pipelines. From natural language customer service bots to automated data extraction and predictive recommendation engines, we eliminate repetitive toil.',
                'card_type' => 'featured',
                'theme' => 'navy',
                'accent_color' => '#F47B20',
                'tags' => ['LLMs', 'LangChain', 'Python', 'FastAPI', 'Automation', 'Agents'],
                'image' => '/images for services/06_ai-automation-removebg-preview.png',
                'metrics' => ['stat' => '1,200+ Hrs', 'label' => 'Saved Per Client Monthly'],
                'deliverables' => [
                    'Multi-Agent System Orchestration',
                    'Custom LLM Fine-Tuning & RAG Knowledge Bases',
                    'Document Intelligence & Extraction Pipelines',
                    'Automated CRM & ERP Sync Workflows',
                    'Predictive AI Analytics & Scoring'
                ],
                'technologies' => ['Python', 'OpenAI', 'LangChain', 'Llama 3', 'FastAPI', 'Redis', 'Laravel'],
                'process' => [
                    ['step' => '01', 'title' => 'Workflow Audit', 'desc' => 'Pinpointing operational bottlenecks with highest ROI potential.'],
                    ['step' => '02', 'title' => 'Vector & Agent Architecture', 'desc' => 'Designing RAG pipelines, chunking policies, and reasoning chains.'],
                    ['step' => '03', 'title' => 'Evaluation Benchmarking', 'desc' => 'Preventing hallucinations with strict deterministic validation gates.'],
                    ['step' => '04', 'title' => 'Production Deployment', 'desc' => 'Integrating webhooks, rate limiting, and observability telemetry.']
                ],
                'faqs' => [
                    ['q' => 'How do you prevent AI hallucinations?', 'a' => 'We enforce grounded Retrieval-Augmented Generation (RAG) with vector databases, strict JSON schema validation, and confidence cutoff thresholds.'],
                ],
                'order' => 4,
                'is_active' => true,
            ],
            [
                'number' => '05',
                'slug' => 'software-development',
                'title' => 'Software Development',
                'eyebrow' => 'ENTERPRISE SOLUTIONS',
                'short_desc' => 'Bespoke ERPs, CRMs, SaaS platforms, and cloud microservices engineered to scale.',
                'full_desc' => 'We engineer mission-critical enterprise systems tailored to your unique operational flows. Scalable database schemas, role-based security, multi-tenant setups, and automated compliance logging.',
                'card_type' => 'white',
                'theme' => 'white',
                'accent_color' => '#F47B20',
                'tags' => ['SaaS', 'ERP', 'CRM', 'Cloud', 'Microservices', 'Laravel'],
                'image' => '/images for services/04_software-development-removebg-preview.png',
                'metrics' => ['stat' => '99.99%', 'label' => 'Production Uptime SLA'],
                'deliverables' => [
                    'Custom ERP & Enterprise Software',
                    'Multi-Tenant SaaS Platforms',
                    'Automated Billing & Subscription Engines',
                    'High-Throughput REST & GraphQL APIs',
                    'Role-Based Access Control (RBAC) & Audit Trails'
                ],
                'technologies' => ['PHP', 'Laravel', 'Node.js', 'Go', 'Docker', 'PostgreSQL', 'Redis'],
                'process' => [
                    ['step' => '01', 'title' => 'System Modeling', 'desc' => 'Mapping domain-driven design, entity relationships, and access tiers.'],
                    ['step' => '02', 'title' => 'Core Development', 'desc' => 'Writing clean, test-driven backend code and optimized database queries.'],
                    ['step' => '03', 'title' => 'Stress & Load Testing', 'desc' => 'Simulating concurrent users and optimizing connection pools.'],
                    ['step' => '04', 'title' => 'DevOps Provisioning', 'desc' => 'Setting up auto-scaling containers, backup policies, and monitoring.']
                ],
                'faqs' => [
                    ['q' => 'Can you migrate legacy software to modern cloud architectures?', 'a' => 'Yes, we specialize in strangler-fig pattern migrations that gradually replace legacy monoliths with modern microservices with zero downtime.'],
                ],
                'order' => 5,
                'is_active' => true,
            ],
            [
                'number' => '06',
                'slug' => 'digital-marketing',
                'title' => 'Digital Marketing & SEO',
                'eyebrow' => 'GROWTH ENGINE',
                'short_desc' => 'Data-driven performance marketing, technical SEO, and conversion optimization.',
                'full_desc' => 'Scale your revenue with programmatic search optimization, high-converting PPC campaigns, social media strategies, and content marketing engineered to capture high-intent leads.',
                'card_type' => 'white',
                'theme' => 'white',
                'accent_color' => '#F47B20',
                'tags' => ['SEO', 'PPC', 'Google Ads', 'Content Strategy', 'CRO'],
                'image' => '/images for services/05_digital-marketing-removebg-preview.png',
                'metrics' => ['stat' => '+320%', 'label' => 'Average Organic Inflow'],
                'deliverables' => [
                    'Technical & On-Page SEO Overhauls',
                    'High-Intent Paid Search (Google & Bing Ads)',
                    'Paid Social Strategy (Meta, LinkedIn, YouTube)',
                    'Conversion Rate Optimization (CRO)',
                    'Attribution & Custom GA4 Dashboards'
                ],
                'technologies' => ['Google Search Console', 'SEMrush', 'GA4', 'Meta Ads', 'LinkedIn Campaign Manager'],
                'process' => [
                    ['step' => '01', 'title' => 'Competitive Audit', 'desc' => 'Analyzing search share, keyword intent gaps, and rival funnels.'],
                    ['step' => '02', 'title' => 'Technical Remediation', 'desc' => 'Fixing schema markup, crawl budgets, and internal link equity.'],
                    ['step' => '03', 'title' => 'Campaign Launch', 'desc' => 'Executing multi-channel creative tests and audience segmentation.'],
                    ['step' => '04', 'title' => 'ROAS Optimization', 'desc' => 'Weekly budget re-allocation towards highest-margin conversion paths.']
                ],
                'faqs' => [
                    ['q' => 'How long does SEO take to produce measurable pipeline?', 'a' => 'Technical fixes often show indexation improvements within 2-4 weeks, while keyword rankings and compounding pipeline growth typically accelerate at months 3-6.'],
                ],
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
