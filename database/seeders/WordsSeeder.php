<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('words')->insert([
            [
                'italiano' => 'Lontano',
                'english' => 'Far',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il parco è lontano da qui.',
                    'La stazione è lontana.',
                    'I negozi sono lontani.'
                ])
            ],
            [
                'italiano' => 'Vicino',
                'english' => 'Near',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il ristorante è vicino.',
                    'La farmacia è vicina.',
                    'I miei amici abitano vicini.'
                ])
            ],
            [
                'italiano' => 'Qui vicino',
                'english' => 'Nearby',
                'type' => 'adverbial phrase',
                'sentences' => json_encode([
                    'C\'è un supermercato qui vicino.',
                    'Abito qui vicino.'
                ])
            ],
            [
                'italiano' => 'Troppo',
                'english' => 'Too much',
                'type' => 'adverb',
                'sentences' => json_encode([
                    'Mangio troppo.',
                    'Parli troppo velocemente.'
                ])
            ],
            [
                'italiano' => 'E poi',
                'english' => 'And then',
                'type' => 'conjunction',
                'sentences' => json_encode([
                    'Prima studiamo e poi usciamo.',
                    'Ho fatto colazione e poi sono andato al lavoro.'
                ])
            ],
            [
                'italiano' => 'C\'è anche',
                'english' => 'There is also',
                'type' => 'phrase',
                'sentences' => json_encode([
                    'C\'è anche un parco in città.',
                    'Nel menu c\'è anche la pizza.'
                ])
            ],
            [
                'italiano' => 'Non c\'è male',
                'english' => 'Not bad',
                'type' => 'phrase',
                'sentences' => json_encode([
                    'Come stai? Non c\'è male.',
                    'Il film? Non c\'è male.'
                ])
            ],
            [
                'italiano' => 'Dica',
                'english' => 'Say (formal imperative)',
                'type' => 'verb',
                'sentences' => json_encode([
                    'Dica pure, signore.',
                    'Mi dica, come posso aiutarla?'
                ])
            ],
            [
                'italiano' => 'Forse',
                'english' => 'Maybe',
                'type' => 'adverb',
                'sentences' => json_encode([
                    'Forse verrò alla festa.',
                    'Forse pioverà domani.'
                ])
            ],
            [
                'italiano' => 'Mi può aiutare',
                'english' => 'Can you help me',
                'type' => 'phrase',
                'sentences' => json_encode([
                    'Mi può aiutare, per favore?',
                    'Mi può aiutare a trovare l\'ufficio?'
                ])
            ],
            [
                'italiano' => 'Lentamente',
                'english' => 'Slowly',
                'type' => 'adverb',
                'sentences' => json_encode([
                    'Parla lentamente, per favore.',
                    'Cammino lentamente.'
                ])
            ],
            [
                'italiano' => 'Ripetere',
                'english' => 'To repeat',
                'type' => 'verb',
                'sentences' => json_encode([
                    'Puoi ripetere, per favore?',
                    'Ho ripetuto la lezione molte volte.'
                ])
            ],
            [
                'italiano' => 'Perso',
                'english' => 'Lost',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono perso, può aiutarmi?',
                    'La chiave è persa.',
                    'I turisti sono persi.'
                ])
            ],
            [
                'italiano' => 'Femmina',
                'english' => 'Female',
                'type' => 'noun',
                'sentences' => json_encode([
                    'La femmina del leone è la leonessa.',
                    'Questo gatto è una femmina.'
                ])
            ],
            [
                'italiano' => 'Maschio',
                'english' => 'Male',
                'type' => 'noun',
                'sentences' => json_encode([
                    'Il maschio del leone ha la criniera.',
                    'Questo cane è un maschio.'
                ])
            ],
            [
                'italiano' => 'Prenotazione',
                'english' => 'Reservation',
                'type' => 'noun',
                'sentences' => json_encode([
                    'Ho fatto una prenotazione al ristorante.',
                    'La prenotazione è a nome di Rossi.'
                ])
            ],
            [
                'italiano' => 'Libero',
                'english' => 'Free',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il tavolo è libero.',
                    'La sedia è libera.',
                    'I posti sono liberi.'
                ])
            ],
            [
                'italiano' => 'Camera',
                'english' => 'Room',
                'type' => 'noun',
                'sentences' => json_encode([
                    'Vorrei prenotare una camera.',
                    'La mia camera è al secondo piano.'
                ])
            ],
            [
                'italiano' => 'Guardare',
                'english' => 'To look',
                'type' => 'verb',
                'sentences' => json_encode([
                    'Mi piace guardare il tramonto.',
                    'Ho guardato un film ieri sera.'
                ])
            ],
            [
                'italiano' => 'Triste',
                'english' => 'Sad',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono triste oggi.',
                    'La storia è triste.',
                    'I bambini sembrano tristi.'
                ])
            ],
            [
                'italiano' => 'Stanco',
                'english' => 'Tired',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono stanco dopo il lavoro.',
                    'Lei è stanca dal viaggio.',
                    'Siamo stanchi di aspettare.'
                ])
            ],
            [
                'italiano' => 'Spaventato',
                'english' => 'Scared',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il bambino è spaventato dal buio.',
                    'La ragazza sembra spaventata.',
                    'Siamo spaventati dal temporale.'
                ])
            ],
            [
                'italiano' => 'Forte',
                'english' => 'Strong',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Lui è molto forte.',
                    'La sua voce è forte.',
                    'I venti sono forti oggi.'
                ])
            ],
            [
                'italiano' => 'Debole',
                'english' => 'Weak',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Mi sento debole oggi.',
                    'La connessione è debole qui.',
                    'Le prove sono deboli.'
                ])
            ],
            [
                'italiano' => 'Arrabbiato',
                'english' => 'Angry',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono arrabbiato con te.',
                    'Lei è arrabbiata per il ritardo.',
                    'I clienti sono arrabbiati per il servizio.'
                ])
            ],
            [
                'italiano' => 'Annoiato',
                'english' => 'Bored',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono annoiato a casa.',
                    'La ragazza sembra annoiata.',
                    'Gli studenti sono annoiati dalla lezione.'
                ])
            ],
            [
                'italiano' => 'Carino',
                'english' => 'Cute',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il gattino è carino.',
                    'Che idea carina!',
                    'I tuoi figli sono carini.'
                ])
            ],
            [
                'italiano' => 'Alto',
                'english' => 'Tall',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Mio fratello è alto.',
                    'La torre è alta.',
                    'Gli alberi sono alti.'
                ])
            ],
            [
                'italiano' => 'Grande',
                'english' => 'Big',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Ho una grande casa.',
                    'La città è grande.',
                    'I problemi sono grandi.'
                ])
            ],
            [
                'italiano' => 'Eccitato',
                'english' => 'Excited',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono eccitato per il viaggio.',
                    'Lei è eccitata per la festa.',
                    'I bambini sono eccitati per Natale.'
                ])
            ],
            [
                'italiano' => 'Emozionato',
                'english' => 'Emotional',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono emozionato per il concerto.',
                    'La sposa è emozionata.',
                    'Siamo emozionati per la notizia.'
                ])
            ],
            [
                'italiano' => 'Concentrato',
                'english' => 'Focused',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono concentrato sul lavoro.',
                    'Lei è concentrata sullo studio.',
                    'Gli atleti sono concentrati sulla gara.'
                ])
            ],
            [
                'italiano' => 'Ottimo',
                'english' => 'Excellent',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Il cibo era ottimo.',
                    'L\'idea è ottima.',
                    'I risultati sono ottimi.'
                ])
            ],
            [
                'italiano' => 'Introverso',
                'english' => 'Introverted',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono una persona introversa.',
                    'Mia sorella è introversa.',
                    'Alcuni artisti sono introversi.'
                ])
            ],
            [
                'italiano' => 'Intenditore',
                'english' => 'Connoisseur',
                'type' => 'noun',
                'sentences' => json_encode([
                    'Lui è un intenditore di vini.',
                    'Gli intenditori apprezzano la qualità.'
                ])
            ],
            [
                'italiano' => 'Settimana',
                'english' => 'Week',
                'type' => 'noun',
                'sentences' => json_encode([
                    'Ci vediamo la prossima settimana.',
                    'Lavoro cinque giorni a settimana.'
                ])
            ],
            [
                'italiano' => 'Felice',
                'english' => 'Happy',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono felice di vederti.',
                    'Lei è felice per il successo.',
                    'Siamo felici della notizia.'
                ])
            ],
            [
                'italiano' => 'Insieme',
                'english' => 'Together',
                'type' => 'adverb',
                'sentences' => json_encode([
                    'Andiamo insieme al cinema.',
                    'Lavoriamo bene insieme.'
                ])
            ],
            [
                'italiano' => 'Interessato',
                'english' => 'Interested',
                'type' => 'adjective',
                'sentences' => json_encode([
                    'Sono interessato all\'arte.',
                    'Lei è interessata alla proposta.',
                    'Siamo interessati a visitare il museo.'
                ])
            ],
            [
                'italiano' => 'Chiedere',
                'english' => 'To ask',
                'type' => 'verb',
                'sentences' => json_encode([
                    'Posso chiederti un favore?',
                    'Ho chiesto informazioni all\'ufficio turistico.'
                ])
            ],
            [
                'italiano' => 'Imparare',
                'english' => 'To learn',
                'type' => 'verb',
                'sentences' => json_encode([
                    'Mi piace imparare nuove lingue.',
                    'Ho imparato molto durante il viaggio.'
                ])
            ]
        ]);
    }
}
