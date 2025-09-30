<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $resumeData['personal']['name'] }} - Resume</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        .header-section {
            background: #fff;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .card {
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #ddd;
            font-weight: 600;
        }
        .skill-item, .achievement-badge {
            background: #e9ecef;
            border-radius: 20px;
            padding: 5px 12px;
            margin: 3px;
            display: inline-block;
            font-size: 0.9em;
        }
        .date-badge {
            font-size: 0.85em;
            color: #6c757d;
            margin-bottom: 8px;
            display: inline-block;
        }
        .section-item {
            margin-bottom: 20px;
        }
        footer {
            background: #fff;
            border-top: 1px solid #ddd;
            padding: 20px 0;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <section class="header-section position-relative">
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-sm logout-btn">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>

        <div class="profile-img">
            <i class="fas fa-user fa-3x text-secondary"></i>
        </div>
        <h2>{{ $resumeData['personal']['name'] }}</h2>
        <p class="text-muted">{{ $resumeData['personal']['summary'] }}</p>
       
        <div class="mt-3">
            <a href="{{ route('resume.download') }}" class="btn btn-success btn-sm">
                <i class="fas fa-download me-2"></i>Download PDF
            </a>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4">
                <!-- Contact -->
                <div class="card">
                    <div class="card-header">Contact Details</div>
                    <div class="card-body">
                        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $resumeData['personal']['location'] }}</p>
                        <p><i class="fas fa-envelope me-2"></i>{{ $resumeData['personal']['email'] }}</p>
                        <p><i class="fab fa-linkedin me-2"></i><a href="{{ $resumeData['personal']['linkedin'] }}">LinkedIn</a></p>
                        <p><i class="fab fa-github me-2"></i><a href="{{ $resumeData['personal']['github'] }}">GitHub</a></p>
                    </div>
                </div>

                <!-- Skills -->
                <div class="card">
                    <div class="card-header">Technical Skills</div>
                    <div class="card-body">
                        @foreach ($resumeData['skills'] as $category => $skillList)
                        <div class="mb-3">
                            <h6>{{ $category }}</h6>
                            @foreach (explode(', ', $skillList) as $skill)
                                <span class="skill-item">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Achievements -->
                <div class="card">
                    <div class="card-header">Achievements</div>
                    <div class="card-body">
                        @foreach ($resumeData['achievements'] as $category => $value)
                        <div class="mb-2">
                            <strong>{{ $category }}:</strong>
                            @if ($category == 'Awards/Activities')
                                @foreach (explode(', ', $value) as $award)
                                    <span class="achievement-badge">{{ trim($award) }}</span>
                                @endforeach
                            @else
                                <p class="mb-0">{{ $value }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">
                <!-- Experience -->
                <div class="card">
                    <div class="card-header">Experience</div>
                    <div class="card-body">
                        @foreach ($resumeData['experience'] as $exp)
                        <div class="section-item">
                            <div class="date-badge">{{ $exp['date'] }}</div>
                            <h6>{{ $exp['role'] }}</h6>
                            <ul>
                                @foreach ($exp['details'] as $detail)
                                <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Projects -->
                <div class="card">
                    <div class="card-header">Projects</div>
                    <div class="card-body">
                        @foreach ($resumeData['projects'] as $project)
                        <div class="section-item">
                            <div class="date-badge">{{ $project['date'] }}</div>
                            <h6>{{ $project['title'] }}</h6>
                            <ul>
                                @foreach ($project['details'] as $detail)
                                <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Education -->
                <div class="card">
                    <div class="card-header">Education</div>
                    <div class="card-body">
                        <div class="section-item">
                            <div class="date-badge">{{ $resumeData['education']['period'] }}</div>
                            <h6>{{ $resumeData['education']['degree'] }}</h6>
                            <p class="mb-0">{{ $resumeData['education']['institution'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 {{ $resumeData['personal']['name'] }}. All rights reserved.</p>
        <p class="small">Logged in as: {{ Auth::user()->name }}</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
