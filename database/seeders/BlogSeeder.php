<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'How AI Automation & Multi-Agents are Transforming Modern Enterprise Workflows',
                'slug' => 'ai-automation-transforming-businesses',
                'category' => 'AI & Automation',
                'excerpt' => 'Explore how autonomous AI agents, document intelligence pipelines, and real-time LLM integrations are saving teams 1,000+ hours per month.',
                'content' => [
                    'intro' => 'Artificial intelligence has evolved far beyond experimental chat interfaces. In 2026, forward-thinking enterprises are deploying autonomous multi-agent networks that orchestrate complex, multi-step operations.',
                    'sections' => [
                        [
                            'heading' => '1. The Shift From Static Scripts to Autonomous Agentic Workflows',
                            'paragraphs' => [
                                'Traditional robotic process automation (RPA) relied on rigid, fragile heuristics. Modern agentic pipelines operate on intent and reasoning loops.',
                                'Utilizing multi-model orchestration, agents decompose high-level business goals into sequential sub-tasks, validate outputs with deterministic guardrails, and self-heal when edge cases emerge.'
                            ],
                            'quote' => 'Autonomous agents do not simply automate tasks; they understand context, resolve ambiguities, and deliver verified business outcomes.'
                        ],
                        [
                            'heading' => '2. Real-World Case: 1,200+ Hours Saved Monthly in Document Intelligence',
                            'paragraphs' => [
                                'At Zeowl, we engineered a document intelligence system for an enterprise fintech client handling thousands of unstructured contracts daily.',
                                'The pipeline reduced manual human verification from 14 minutes per file to under 25 seconds, while pushing data extraction accuracy to 99.4%.'
                            ]
                        ]
                    ]
                ],
                'author_name' => 'Zeowl Tech Team',
                'author_role' => 'AI & Engineering Solutions',
                'author_avatar' => 'Z',
                'read_time' => '6 min read',
                'date_display' => 'Oct 04, 2026',
                'cover_image' => '/blog/featured-ai-robot.jpg',
                'tags' => ['AI Agents', 'Automation', 'Enterprise', 'LLMs'],
                'views_count' => 1420,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Building Scalable Full-Stack Web Apps with Next.js & Modern Backends',
                'slug' => 'building-scalable-fullstack-apps',
                'category' => 'Web Development',
                'excerpt' => 'A deep dive into server components, edge caching, API architecture, and micro-frontend design for sub-second speeds.',
                'content' => [
                    'intro' => 'Modern users expect desktop-speed fluid interactivity on mobile networks. Discover the engineering principles behind sub-500ms First Contentful Paint.',
                    'sections' => [
                        [
                            'heading' => '1. Decoupled Architecture with Next.js & Laravel',
                            'paragraphs' => [
                                'By pairing Next.js App Router for server-rendered UI with a hardened Laravel REST API, teams get the best developer experience, rock-solid security, and blazingly fast response times.'
                            ]
                        ]
                    ]
                ],
                'author_name' => 'Zeowl Tech Team',
                'author_role' => 'Principal Web Architect',
                'author_avatar' => 'Z',
                'read_time' => '7 min read',
                'date_display' => 'Sep 28, 2026',
                'cover_image' => '/blog/fullstack-guide.jpg',
                'tags' => ['Next.js', 'React', 'Laravel', 'Architecture', 'WebDev'],
                'views_count' => 980,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Mastering Cross-Platform Mobile Architecture with Flutter & Native Bridges',
                'slug' => 'cross-platform-mobile-architecture',
                'category' => 'Mobile Apps',
                'excerpt' => 'How to write unified dart codebases that feel truly native, achieve stable 60 FPS, and interface effortlessly with native camera and bluetooth sensors.',
                'content' => [
                    'intro' => 'Cross-platform app development is no longer about compromise. With Flutter engine optimizations, you can achieve 120Hz refresh rates.',
                    'sections' => [
                        [
                            'heading' => '1. State Management at Scale',
                            'paragraphs' => [
                                'Choosing between BLoC and Riverpod depends on team composition, but clear architectural boundaries between data layers, business logic, and UI widgets are non-negotiable.'
                            ]
                        ]
                    ]
                ],
                'author_name' => 'Zeowl Tech Team',
                'author_role' => 'Mobile Engineering Lead',
                'author_avatar' => 'Z',
                'read_time' => '5 min read',
                'date_display' => 'Sep 20, 2026',
                'cover_image' => '/blog/flutter-mobile.jpg',
                'tags' => ['Flutter', 'Mobile', 'iOS', 'Android', 'Dart'],
                'views_count' => 840,
                'is_featured' => false,
                'is_published' => true,
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
