<?php
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use App\Models\Word;

new class extends Component {

    #[Computed]
    public function data()
    {
        return auth()->user()->words()->wherePivot('archived', false)->get()->toArray();
    }

    public function archive($id)
    {
        $word = Word::findOrFail($id);
        $user = auth()->user();
        // Update the pivot table to set 'archived' to false
        $user->words()->updateExistingPivot($word->id, ['archived' => true]);
    }

    public function delete($id)
    {
        $word = Word::findOrFail($id);
        $user = auth()->user();
        // Update the pivot table to set 'archived' to false
        $user->words()->detach($word->id);
    }
}; ?>

<div>
    <h1 class="text-center min-h-[70px] mt-12 text-5xl text-white">Parole Attive</h1>
    <ul class="max-w-lg mx-auto space-y-3 text-white mt-8 bg-[#393937] p-4 rounded-lg">
        @if (empty($this->data))
            <li class="text-lg">Non ci sono parole attive.</li>
        @endif
        @foreach ($this->data as $word)
            <li class="flex items-start justify-between border-b border-white/10 pb-4 last:border-none last:pb-0">
                <span class="text-lg">{{ $word['italiano'] }}</span>
                <div class="flex items-cener gap-6">
                    <button wire:click="archive({{ $word['id'] }})" class="text-white/75 hover:bg-black/10 px-2 py-1">Archive</button>
                    <button wire:click="delete({{ $word['id'] }})" class="text-white/75 hover:bg-black/10 px-2 py-1">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
