<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\User;

class DownloadResume extends Component
{
    public function download()
    {
        $profile = Profile::where('status', 'active')->first();

        $user = User::find($profile->user_id);

        $data = [
            'fullname'          => $user->name,
            'email'             => $user->email,
            'job_title'         => $profile->job_title,
            'experience_summary' => $profile->experience_summary,
            'bio'               => $profile->bio,
            'projects'          => Project::all(),
            'experiences'       => Experience::orderBy('start_date', 'desc')->get(),
            'skills'            => Skill::all(),
        ];

        $pdf = Pdf::loadView('pdf.resume', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Ehsan_Pazhman_CV.pdf');
    }

    public function render()
    {
        return view('livewire.web.download-resume');
    }
}
