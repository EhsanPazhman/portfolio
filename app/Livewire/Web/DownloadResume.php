<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * Class DownloadResume
 * Responsible for generating and streaming a PDF version of the professional CV.
 */
class DownloadResume extends Component
{
    /**
     * Generates a PDF resume using data from profiles, users, projects, and experiences.
     * Streams the generated file directly to the browser.
     * 
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|void
     */
    public function download()
    {
        try {
            // Fetch the primary active profile
            $profile = Profile::where('status', 'active')->first();

            if (!$profile) {
                return; // Optionally dispatch a notification error
            }

            // Retrieve associated user data
            $user = User::find($profile->user_id);

            // Structure data for the PDF template
            $data = [
                'fullname'           => $user->name ?? 'Ehsan Pazhman',
                'email'              => $user->email ?? '',
                'job_title'          => $profile->job_title,
                'experience_summary' => $profile->experience_summary,
                'bio'                => $profile->bio,
                'projects'           => Project::all(),
                'experiences'        => Experience::orderBy('start_date', 'desc')->get(),
                'skills'             => Skill::all(),
            ];

            // Load the Blade view and generate PDF
            $pdf = Pdf::loadView('pdf.resume', $data);

            // Stream the download to the client
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'Ehsan_Pazhman_CV.pdf');
        } catch (\Exception $e) {
            // Log technical errors for debugging
            Log::error('Resume Download Error: ' . $e->getMessage());
        }
    }

    /**
     * Renders the download button view.
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.download-resume');
    }
}
