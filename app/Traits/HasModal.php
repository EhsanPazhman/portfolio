<?php

namespace App\Traits;

trait HasModal
{
    public $isModalOpen = false;

    public function openModal()
    {
        $this->isModalOpen = true;
        if (method_exists($this, 'resetInputFields')) {
            $this->resetInputFields();
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
}
