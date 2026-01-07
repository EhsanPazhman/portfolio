<?php

namespace App\Livewire\Web;

use App\Models\User;
use Illuminate\Support\Str;
use App\Livewire\Web\BaseComponent;

/**
 * Class SocialSidebar
 * Manages the fixed sidebar displaying social media links of the administrator.
 */
class SocialSidebar extends BaseComponent
{
    /** @var User $owner Administrative user instance with social profile */
    public $owner;

    /** @var bool $open State for toggling sidebar visibility (if needed for mobile/expand) */
    public bool $open = false;

    /**
     * Component mount lifecycle hook.
     * Fetches the administrator and eager loads social links to optimize query performance.
     *
     * @return void
     */
    public function mount()
    {
        $this->owner = User::where('role', 'Admin')
            ->with('profile.socialLinks')
            ->firstOrFail();
    }

    /**
     * Toggles the sidebar open/close state.
     * 
     * @return void
     */
    public function toggle()
    {
        $this->open = ! $this->open;
    }

    /**
     * Ensures all social URLs have a valid HTTPS prefix.
     * Used within the view to keep the template logic clean.
     *
     * @param string|null $url
     * @return string
     */
    public function formatUrl(?string $url): string
    {
        if (!$url) return '#';
        return Str::startsWith($url, ['http://', 'https://']) ? $url : 'https://' . $url;
    }

    /**
     * Renders the social sidebar view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.web.social-sidebar');
    }
}
