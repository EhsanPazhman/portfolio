<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 30px;
        }

        .header {
            text-align: center;
            background-color: #1a202c;
            color: white;
            padding: 40px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 2px;
        }

        .header p {
            margin: 5px 0 0;
            opacity: 0.8;
        }

        .section {
            margin-top: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #2d3748;
            border-bottom: 2px solid #cbd5e0;
            padding-bottom: 5px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .item {
            margin-bottom: 15px;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            color: #2d3748;
        }

        .item-sub {
            font-style: italic;
            color: #718096;
            font-size: 14px;
        }

        .item-desc {
            margin-top: 5px;
            font-size: 13px;
            text-align: justify;
        }

        .skills-grid {
            width: 100%;
        }

        .skill-badge {
            display: inline-block;
            background: #edf2f7;
            color: #4a5568;
            padding: 4px 10px;
            border-radius: 4px;
            margin: 2px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $fullname }}</h1>
        <p>{{ $job_title }} | {{ $email }}</p>
    </div>

    <div class="container">
        <!-- EXPERIENCE -->
        <div class="section">
            <div class="section-title">Work Experience</div>
            @foreach ($experiences as $exp)
                <div class="item">
                    <div class="item-header">{{ $exp->company }} - {{ $exp->position }}</div>
                    <div class="item-sub">{{ $exp->start_date }} to {{ $exp->end_date ?? 'Present' }}</div>
                    <div class="item-desc">{{ $exp->description }}</div>
                </div>
            @endforeach
        </div>

        <!-- PROJECTS -->
        <div class="section">
            <div class="section-title">Projects</div>
            @foreach ($projects as $project)
                <div class="item">
                    <div class="item-header">{{ $project->title }}</div>
                    <div class="item-desc">{{ $project->description }}</div>
                </div>
            @endforeach
        </div>

        {{-- <!-- EDUCATION -->
        <div class="section">
            <div class="section-title">Education</div>
            @foreach ($education as $edu)
                <div class="item">
                    <div class="item-header">{{ $edu->degree }}</div>
                    <div class="item-sub">{{ $edu->university }} | {{ $edu->graduation_year }}</div>
                </div>
            @endforeach
        </div> --}}

        <!-- SKILLS -->
        <div class="section">
            <div class="section-title">Technical Skills</div>
            <div class="skills-grid">
                @foreach ($skills as $skill)
                    <span class="skill-badge">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
