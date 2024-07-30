<?php

use Livewire\Volt\Component;
use App\Models\Word;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Str;

new class extends Component {
    public $word;
    public $translationAttempts = 0;

    public function save()
    {

        if (! $word = Word::firstWhere('italiano', Str::title($this->word))) {
            $translation = $this->getTranslation();
            $word = Word::create([
                'italiano' => Str::title($this->word),
                'english' => $translation['english'],
                'sentences' => json_encode($translation['sentences'])
            ]);
        }

        if (! auth()->user()->words()->where('words.id', $word->id)->exists()) {
            auth()->user()->words()->attach($word->id);
            $this->dispatch('flash-message', message: 'Word added! Add another word or <a href="/" class="underline">go study</a>');
        } else {
            $this->dispatch('flash-message',  message: 'Word already exists in your list.');
        }

        // Clear the input field
        $this->word = '';
    }

    public function getTranslation($retry = false, $errorMessage = null)
    {
        $jsonExample = [
            'italiano' => 'Essere',
            'english' => 'To be',
            'sentences' => ['Io sono un uomo.', 'Tu sei una donna.'],
            'type' => 'verb',
        ];

        $instructions = "Your response should only be JSON with no comments or ticks (```). Translate the word and return JSON matching the example: ";

        if ($retry) {
            $instructions .= " The previous response was invalid JSON. Please ensure the response is valid JSON.";
        }

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => $instructions . json_encode($jsonExample)],
                ['role' => 'user', 'content' => $this->word],
            ],
        ]);

        try {
            $this->verifyJSON($result->choices[0]->message->content);
            return json_decode($result->choices[0]->message->content, true);
        } catch (\Exception $e) {
            if ($this->translationAttempts >= 3) {
                throw new \Exception($e->getMessage());
            }
            $this->translationAttempts++;
            // Retry the getTranslation method with the added error message
            return $this->getTranslation(true, $e->getMessage());
        }
    }

    public function verifyJSON($json)
    {
        $decodedJson = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON: ' . json_last_error_msg());
        }

        if (!is_array($decodedJson)) {
            throw new \Exception('Your response is not JSON.');
        }

        $requiredKeys = ['italiano', 'english', 'sentences', 'type'];
        foreach ($requiredKeys as $key) {
            if (!isset($decodedJson[$key])) {
                throw new \Exception("Your JSON is missing the required key: $key.");
            }
        }

        if (!is_string($decodedJson['italiano']) || !is_string($decodedJson['english']) || !is_array($decodedJson['sentences']) || !is_string($decodedJson['type'])) {
            throw new \Exception('One or more of your JSON values are not the correct type.');
        }

        foreach ($decodedJson['sentences'] as $sentence) {
            if (!is_string($sentence)) {
                throw new \Exception('Each sentence must be a string.');
            }
        }

        return true;
    }
}; ?>

<div class="">
    <form wire:submit="save" class="flex items-center gap-4 mt-6">
        <x-text-input wire:model="word" id="word" class="block w-full" type="text" name="word" required autofocus placeholder="New word" />
        
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </form>

    <div x-data="{ show: false, message: null }" x-show="show" x-transition @flash-message.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 6000)" style="display: none;">
        <div class="p-4 rounded-lg mt-4 bg-orange-100">
            <p x-html="message"></p>
        </div>
    </div>
</div>
