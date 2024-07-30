<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public $user;

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login');
    }


    public function mount()
    {
        $this->user = auth()->user();
    }
}; ?>

<nav
    x-data="{ open: false }" 
    class="fixed bottom-0 left-0 flex flex-col items-center gap-4 justify-start p-4 bg-black/10 w-full">
    <div></div>
    <div x-show="open" x-cloak class="text-white flex flex-col gap-4 text-xl mb-8">
        @if (Auth::check())
            <x-nav-link href="{{ route('words') }}">Study Words</x-nav-link>
            <x-nav-link href="{{ route('add-words') }}">Add Words</x-nav-link>
            <x-nav-link href="{{ route('archived-words') }}">Archived Words</x-nav-link>

            <button wire:click="logout" class="text-white text-xl py-2 px-4 rounded-lg mx-auto w-full transition-colors text-center">Logout</button>
        @else
            <x-nav-link href="{{ route('login') }}">Login</x-nav-link>
        @endif
    </div>
    <div>
        <button 
        x-on:click="open = !open" 
        x-text="open ? 'Close' : 'Menu'"
        :class="{'bg-black/25': open, '': !open}"
        class="text-white text-xl py-2 px-4 rounded-lg mx-auto w-full transition-colors text-center">Menu</button>
    </div>
</nav>
