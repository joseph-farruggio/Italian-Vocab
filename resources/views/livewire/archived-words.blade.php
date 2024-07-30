<?php

use Livewire\Volt\Component;
use App\Models\Word;

new class extends Component {
    public $data;

    public function mount()
    {
        // All words that are not archived
        $this->data = auth()->user()->words()->wherePivot('archived', true)->get()->toArray();      
    }

    public function unarchiveWord($id)
    {
        $word = Word::findOrFail($id);
        $user = auth()->user();
        // Update the pivot table to set 'archived' to false
        $user->words()->updateExistingPivot($word->id, ['archived' => false]);
        $this->mount();
    }
}; ?>

<div>
    <h1 class="text-center min-h-[70px] mt-12 text-5xl text-white">Parole Archiviate</h1>
    <ul class="max-w-lg mx-auto space-y-3 text-white mt-8 bg-[#393937] p-4 rounded-lg">
        @if (empty($data))
            <li class="text-lg">Non ci sono parole archiviate.</li>
        @endif
        @foreach ($data as $word)
            <li class="flex items-start justify-between border-b border-white/10 pb-4 last:border-none last:pb-0">
                <span class="text-lg">{{ $word['italiano'] }}</span>
                <button wire:click="unarchiveWord({{ $word['id'] }})" class="text-white/75 hover:bg-black/10 px-2 py-1">Ripristina parola</button>
            </li>
        @endforeach
    </ul>
</div>
