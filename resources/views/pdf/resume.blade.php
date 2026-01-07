<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Essential reset for PDF rendering */
        @page {
            margin: 40px 50px;
        }

        body {
            font-family: 'Helvetica', Arial, sans-serif;
            color: #1a202c;
            /* Deep Charcoal for best readability */
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        /* Clean Minimal Header */
        .header {
            border-bottom: 2px solid #1a202c;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #000000;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 13px;
            color: #4a5568;
            font-weight: 500;
        }

        .section {
            margin-bottom: 25px;
        }

        /* Subtle Section Title */
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #2d3748;
            background-color: #f7fafc;
            /* Very light gray bar */
            padding: 4px 8px;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-left: 3px solid #1a202c;
        }

        /* Layout Table for consistency in PDF */
        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .item-header {
            font-size: 14px;
            font-weight: bold;
            color: #000000;
            text-align: left;
        }

        .item-date {
            text-align: right;
            font-size: 11px;
            color: #718096;
            vertical-align: middle;
        }

        .item-sub {
            font-size: 12px;
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .item-desc {
            font-size: 11.5px;
            color: #4a5568;
            text-align: justify;
            line-height: 1.6;
        }

        /* Clean Skills List */
        .skills-wrapper {
            margin-top: 10px;
        }

        .skill-item {
            display: inline-block;
            color: #1a202c;
            font-size: 11px;
            font-weight: 600;
            margin-right: 15px;
            margin-bottom: 5px;
        }

        .skill-item:after {
            content: " • ";
            color: #cbd5e0;
            margin-left: 15px;
        }

        .skill-item:last-child:after {
            content: "";
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $fullname }}</h1>
        <p>{{ $job_title }} &nbsp;|&nbsp; {{ $email }}</p>
    </div>

    <div class="container">
        <!-- EXPERIENCE -->
        <div class="section">
            <div class="section-title">Professional Experience</div>
            @foreach ($experiences as $exp)
                <div style="margin-bottom: 18px;">
                    <table class="item-table">
                        <tr>
                            <td class="item-header">{{ $exp->position }}</td>
                            <td class="item-date">{{ $exp->start_date }} — {{ $exp->end_date ?? 'Present' }}</td>
                        </tr>
                    </table>
                    <div class="item-sub">{{ $exp->company }}</div>
                    <div class="item-desc">{{ $exp->description }}</div>
                </div>
            @endforeach
        </div>

        <!-- PROJECTS -->
        <div class="section">
            <div class="section-title">Featured Projects</div>
            @foreach ($projects as $project)
                <div style="margin-bottom: 12px;">
                    <div class="item-header" style="font-size: 13px;">{{ $project->title }}</div>
                    <div class="item-desc">{{ $project->description }}</div>
                </div>
            @endforeach
        </div>

        <!-- SKILLS -->
        <div class="section">
            <div class="section-title">Technical Skills</div>
            <div class="skills-wrapper">
                @foreach ($skills as $skill)
                    <span class="skill-item">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
