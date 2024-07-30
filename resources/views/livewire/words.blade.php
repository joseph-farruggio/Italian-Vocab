<?php

use Livewire\Volt\Component;
use App\Models\Word;

new class extends Component {
    public $data = [];
		public $archiveCount;
	 	public $message = '';
    public $wordID;
    public $italiano = '';
    public $inglese = '';
    public $sentences = [];

		
		#On['wordsUpdated', 'refresh']
    public function mount()
    {
        // All words that are not archived
				$userId = auth()->id();
				$this->data = auth()->user()->words()->wherePivot('archived', false)->get()->toArray();      
				$this->archiveCount = auth()->user()->words()->wherePivot('archived', true)->count();
		
				if (empty($this->data)) {
					return;
				}

				$this->newWord();
    }


		public function refreshComponent()
		{
			$this->mount();
		}

    public function newWord()
    {
        if (empty($this->data)) {
            return;
        }

        $word = $this->data[array_rand($this->data)];
        $this->wordID = $word['id'];
        $this->italiano = $word['italiano'];
        $this->inglese = $word['english'];
        $this->sentences = json_decode($word['sentences']);
    }

    public function archiveWord()
    {
			$user = auth()->user();
			$word = Word::findOrFail($this->wordID);

			// Update the pivot table to set 'archived' to true
			$user->words()->updateExistingPivot($word->id, ['archived' => true]);
			$this->newWord();
			$this->dispatch('wordsUpdated');
    }
}; ?>

<main x-data="words()">

		@if (!empty($data))
			<h1 class="text-center min-h-[70px] mt-12 text-5xl text-white">{{ $italiano }}</h1>

			<div class="space-y-4 mt-8">
				<div class="bg-[#393937] p-4 rounded-lg">
					<button
						class="flex items-center justify-between w-full text-white/50 text-2xl"
						x-on:click="definitionOpen = !definitionOpen">
						<span>Inglese</span>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 20 20"
							fill="currentColor"
							class="size-8 transition-transform"
							:class="definitionOpen && 'rotate-180'">
							<path
								fill-rule="evenodd"
								d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
								clip-rule="evenodd"></path>
						</svg>
					</button>

					<div class="mt-4" x-cloak x-show="definitionOpen">
						<p class="text-white text-lg">{{ $inglese }}</p>
					</div>
				</div>

				<div class="bg-[#393937] p-4 rounded-lg">
					<button
						class="flex items-center justify-between w-full text-white/50 text-2xl"
						x-on:click="sentencesOpen = !sentencesOpen">
						<span>Frasi</span>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 20 20"
							fill="currentColor"
							class="size-8 transition-transform"
							:class="sentencesOpen && 'rotate-180'">
							<path
								fill-rule="evenodd"
								d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
								clip-rule="evenodd"></path>
						</svg>
					</button>

					<div class="mt-4" x-cloak x-show="sentencesOpen">
						<ul class="space-y-4">
							@foreach ($sentences as $sentence)
								<li class="text-white text-lg">{{ $sentence }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
				
			<div class="flex items-center gap-4 justify-start">
					<button
							class="bg-[#C15F3C] text-white p-4 rounded-lg mx-auto mt-12 w-full hover:bg-[#a15032] transition-colors"
							x-on:click="newWord()">Nuova parola</button
					>

					<button
							class="bg-white/10 hover:bg-[#42a733] transition-colors text-white p-4 rounded-lg mx-auto mt-12 w-full"
							x-on:click="$wire.archiveWord(); $wire.$refresh();">Archivia parola</button
					>
			</div>
		@else	
			@if ($this->archiveCount > 0)
					<h1 class="text-center mt-12 mb-0 text-5xl text-white">Add New Word</h1>
					<p class="text-center mt-2 text-2xl text-white/50">{{ $this->archiveCount }} words archived.</p>
			@else
				<h1 class="text-center min-h-[70px] mt-12 text-5xl text-white">Add Your First Word</h1>
			@endif
			
			<livewire:word-form />
		@endif

		<script>
			document.addEventListener("alpine:init", () => {
				Alpine.data("words", () => ({
					definitionOpen: false,
					sentencesOpen: false,

					newWord() {
										this.$wire.call("newWord");
						this.definitionOpen = false;
						this.sentencesOpen = false;
					},
				}));
			});
		</script>
	</main>

