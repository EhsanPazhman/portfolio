<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\Attributes\Layout;

/**
 * Abstract Class BaseComponent
 * 
 * This class serves as the foundation for all web-facing Livewire components.
 * It enforces a unified layout and provides a central point for shared logic,
 * global attributes, or utility methods used across the frontend.
 * 
 * @author Ehsan Pazhman
 * @version 2.0 (2026 Edition)
 */
#[Layout('layouts.app')]
abstract class BaseComponent extends Component
{
    /**
     * Shared SEO or Page Meta Data
     * Can be overridden by child components to set dynamic page titles.
     * 
     * @var string|null
     */
    public ?string $title = null;

    /**
     * Component placeholder for future global logic.
     * Examples: Language switching, Theme persistence, or Shared events.
     */
}
