<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeowl Infotech - Backend Management & API Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #06182f;
            --bg-card: #0b2242;
            --bg-card-alt: #0e2a52;
            --orange: #f57e20;
            --orange-glow: rgba(245, 126, 32, 0.25);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border: rgba(255, 255, 255, 0.08);
            --border-hover: rgba(245, 126, 32, 0.4);
            --green: #10b981;
            --blue: #38bdf8;
            --yellow: #fbbf24;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            padding: 24px;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(245, 126, 32, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(56, 189, 248, 0.05) 0%, transparent 40%);
        }

        .container {
            max-width: 1360px;
            margin: 0 auto;
        }

        /* Header */
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .brand-box {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #f57e20, #ff9d4d);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 22px;
            color: white;
            box-shadow: 0 8px 24px var(--orange-glow);
        }

        .brand-title {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-title span {
            color: var(--orange);
        }

        .badge-live {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
            padding: 5px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-live::before {
            content: '';
            width: 7px;
            height: 7px;
            background-color: #34d399;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px #34d399;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            border-color: var(--border-hover);
            transform: translateY(-2px);
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: white;
            line-height: 1.1;
        }

        .stat-badge {
            display: inline-block;
            margin-top: 8px;
            font-size: 12px;
            font-weight: 600;
            color: var(--orange);
        }

        /* Layout Grid */
        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 28px;
        }

        @media (max-width: 1024px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
        }

        th {
            color: var(--text-muted);
            font-weight: 600;
            padding: 12px 14px;
            border-bottom: 1px solid var(--border);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            vertical-align: middle;
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .status-pill {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-new {
            background: rgba(245, 126, 32, 0.15);
            color: #f57e20;
            border: 1px solid rgba(245, 126, 32, 0.3);
        }

        .status-in_progress {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.3);
        }

        .status-contacted {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-closed {
            background: rgba(148, 163, 184, 0.15);
            color: #94a3b8;
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        /* Action dropdown / form */
        .status-select {
            background: var(--bg-dark);
            color: white;
            border: 1px solid var(--border);
            padding: 5px 8px;
            border-radius: 6px;
            font-size: 12px;
            outline: none;
            cursor: pointer;
        }

        /* API Box */
        .api-tester {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .api-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg-card-alt);
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .api-method {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 6px;
            border-radius: 4px;
        }

        .method-get {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .method-post {
            background: rgba(245, 126, 32, 0.2);
            color: #f57e20;
        }

        .api-endpoint {
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            color: #e2e8f0;
            margin-left: 8px;
        }

        .btn-test {
            background: #1e3a5f;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-test:hover {
            background: var(--orange);
            border-color: var(--orange);
        }

        #apiResponseBox {
            margin-top: 14px;
            background: #020b17;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            max-height: 220px;
            overflow-y: auto;
            color: #38bdf8;
            white-space: pre-wrap;
            display: none;
        }

        /* System info list */
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 13px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--text-muted);
        }

        .info-val {
            font-weight: 600;
            color: white;
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="brand-box">
                <div class="brand-logo">Z</div>
                <div>
                    <h1 class="brand-title">ZEOWL <span>INFOTECH</span></h1>
                    <p style="font-size: 13px; color: var(--text-muted);">PHP Laravel Core Backend &amp; REST API Hub</p>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <span class="badge-live">Backend Operational</span>
                <a href="/api/health" target="_blank" class="btn-test" style="text-decoration: none;">View /api/health</a>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Inquiries</div>
                <div class="stat-value">{{ $stats['total_contacts'] }}</div>
                <div class="stat-badge">Client Leads</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">New Inquiries</div>
                <div class="stat-value" style="color: var(--orange);">{{ $stats['new_contacts'] }}</div>
                <div class="stat-badge">Needs Review</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Active Services</div>
                <div class="stat-value">{{ $stats['services'] }}</div>
                <div class="stat-badge">Published Services</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Portfolio Projects</div>
                <div class="stat-value">{{ $stats['portfolios'] }}</div>
                <div class="stat-badge">Case Studies</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Blog Posts</div>
                <div class="stat-value">{{ $stats['blogs'] }}</div>
                <div class="stat-badge">Engineering Articles</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-grid">
            <!-- Left: Leads and Inquiries -->
            <div>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span style="color: var(--orange);">●</span> Recent Client Inquiries
                        </h2>
                        <span style="font-size: 12px; color: var(--text-muted);">Last 15 submissions</span>
                    </div>

                    @if(session('success'))
                        <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 13px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr>
                                    <td>
                                        <div style="font-weight: 700; color: white;">{{ $contact->name }}</div>
                                        <div style="font-size: 12px; color: var(--text-muted);">{{ $contact->email }}</div>
                                        @if($contact->phone)
                                            <div style="font-size: 11px; color: var(--blue);">{{ $contact->phone }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <span style="font-size: 12px; background: rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 6px;">
                                            {{ $contact->service ?? 'General' }}
                                        </span>
                                    </td>
                                    <td style="max-width: 260px; font-size: 13px; color: #cbd5e1; line-height: 1.4;">
                                        {{ \Illuminate\Support\Str::limit($contact->message, 80) }}
                                    </td>
                                    <td>
                                        <span class="status-pill status-{{ $contact->status }}">
                                            {{ str_replace('_', ' ', $contact->status) }}
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; color: var(--text-muted); white-space: nowrap;">
                                        {{ $contact->created_at->format('M d, H:i') }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.contacts.status', $contact->id) }}" style="display: inline;">
                                            @csrf
                                            <select name="status" class="status-select" onchange="this.form.submit()">
                                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="in_progress" {{ $contact->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="contacted" {{ $contact->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">
                                        No contact inquiries received yet.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive API Tester & System Information -->
            <div>
                <!-- API Interactive Tester -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">REST API Explorer</h2>
                        <span style="font-size: 11px; color: var(--text-muted);">Live Request</span>
                    </div>

                    <div class="api-tester">
                        <div class="api-item">
                            <div>
                                <span class="api-method method-get">GET</span>
                                <span class="api-endpoint">/api/health</span>
                            </div>
                            <button class="btn-test" onclick="testEndpoint('/api/health')">Test</button>
                        </div>
                        <div class="api-item">
                            <div>
                                <span class="api-method method-get">GET</span>
                                <span class="api-endpoint">/api/services</span>
                            </div>
                            <button class="btn-test" onclick="testEndpoint('/api/services')">Test</button>
                        </div>
                        <div class="api-item">
                            <div>
                                <span class="api-method method-get">GET</span>
                                <span class="api-endpoint">/api/portfolio</span>
                            </div>
                            <button class="btn-test" onclick="testEndpoint('/api/portfolio')">Test</button>
                        </div>
                        <div class="api-item">
                            <div>
                                <span class="api-method method-get">GET</span>
                                <span class="api-endpoint">/api/blogs</span>
                            </div>
                            <button class="btn-test" onclick="testEndpoint('/api/blogs')">Test</button>
                        </div>
                        <div class="api-item">
                            <div>
                                <span class="api-method method-get">GET</span>
                                <span class="api-endpoint">/api/testimonials</span>
                            </div>
                            <button class="btn-test" onclick="testEndpoint('/api/testimonials')">Test</button>
                        </div>
                        <div class="api-item">
                            <div>
                                <span class="api-method method-post">POST</span>
                                <span class="api-endpoint">/api/contact</span>
                            </div>
                            <button class="btn-test" onclick="testContactPost()">Test</button>
                        </div>
                    </div>

                    <div id="apiResponseBox"></div>
                </div>

                <!-- System Info Card -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">System &amp; Architecture</h2>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Backend Framework</span>
                        <span class="info-val">Laravel {{ app()->version() }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">PHP Runtime</span>
                        <span class="info-val">{{ PHP_VERSION }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Database</span>
                        <span class="info-val">{{ config('database.default') }} (SQLite / MySQL ready)</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Authentication</span>
                        <span class="info-val">Laravel Sanctum Bearer Tokens</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Frontend Origin</span>
                        <span class="info-val">http://localhost:3000 (CORS Enabled)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function testEndpoint(endpoint) {
            const box = document.getElementById('apiResponseBox');
            box.style.display = 'block';
            box.innerText = `Fetching ${endpoint}...`;

            try {
                const res = await fetch(endpoint);
                const json = await res.json();
                box.innerText = JSON.stringify(json, null, 2);
            } catch (err) {
                box.innerText = `Error: ${err.message}`;
            }
        }

        async function testContactPost() {
            const box = document.getElementById('apiResponseBox');
            box.style.display = 'block';
            box.innerText = 'Posting test inquiry to /api/contact...';

            try {
                const res = await fetch('/api/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: 'API Tester',
                        email: 'test@zeowlinfotech.com',
                        phone: '+91 99999 88888',
                        service: 'Website Development',
                        message: 'Automated test message from the Zeowl Backend Dashboard.'
                    })
                });
                const json = await res.json();
                box.innerText = JSON.stringify(json, null, 2);
                setTimeout(() => location.reload(), 1500);
            } catch (err) {
                box.innerText = `Error: ${err.message}`;
            }
        }
    </script>
</body>
</html>
