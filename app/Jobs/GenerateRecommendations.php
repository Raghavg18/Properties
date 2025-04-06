<?php

namespace App\Jobs;

use App\Models\Property;
use App\Models\PropertyRecommendation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class GenerateRecommendations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function handle()
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "Suggest 5 similar properties for: " . $this->property->title . " located at " . $this->property->address,
                    ]
                ],
            ]);

        $recommendationsText = $response['choices'][0]['message']['content'] ?? 'No recommendations available.';

        PropertyRecommendation::create([
            'property_id' => $this->property->id,
            'recommendations' => $recommendationsText,
        ]);
    }
}
