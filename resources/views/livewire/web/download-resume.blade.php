<div class="flex items-center">
    <button wire:click="download" wire:loading.attr="disabled"
        class="group relative inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-semibold rounded-lg transition-all duration-200 ease-in-out disabled:opacity-70 disabled:cursor-not-allowed shadow-md hover:shadow-lg cursor-pointer">
        <!-- Icon: Download (Visible when not loading) -->
        <svg wire:loading.remove xmlns="www.w3.org" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>

        <!-- Spinner: Loading (Visible only when loading) -->
        <svg wire:loading class="animate-spin h-4 w-4 text-white" xmlns="www.w3.org" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>

        <!-- Button Text -->
        <span wire:loading.remove>Download CV</span>
        <span wire:loading>Processing...</span>
    </button>
</div>
