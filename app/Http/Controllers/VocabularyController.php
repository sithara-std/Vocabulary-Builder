<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vocabulary;
use App\Http\Requests\StoreVocabularyRequest;
use GuzzleHttp\Client;

class VocabularyController extends Controller
{
    // Display a list of vocabularies
    public function index()
    {
        $vocabularies = Vocabulary::all();
        return view('vocabularies.index', compact('vocabularies'));
    }

    // Show form to create a new vocabulary word
    public function create()
    {
        return view('vocabularies.create');
    }

    // Store new vocabulary word
    public function store(StoreVocabularyRequest $request)
    {
        // Fetch the meaning and example sentences from the API
        $definitionData = $this->fetchWordDefinition($request->word);

        if ($definitionData) {
            // Extract the meaning and example sentence
            $meaning = $definitionData[0]['meanings'][0]['definitions'][0]['definition'] ?? 'Meaning not found';
            $example = $definitionData[0]['meanings'][0]['definitions'][0]['example'] ?? 'Example not found';

            // Create the vocabulary entry with the fetched data
            Vocabulary::create([
                'word' => $request->word,
                'meaning' => $meaning,
                'usage_example' => $example,
            ]);

            return redirect()->route('vocabularies.index')->with('success', 'Vocabulary added successfully!');
        }

        return back()->withErrors(['word' => 'Unable to fetch definition.']);
    }

    // Show form to edit an existing vocabulary word
    public function edit(Vocabulary $vocabulary)
    {
        return view('vocabularies.edit', compact('vocabulary'));
    }

    // Update an existing vocabulary word
    public function update(StoreVocabularyRequest $request, Vocabulary $vocabulary)
    {
        $vocabulary->update($request->validated());
        return redirect()->route('vocabularies.index')->with('success', 'Vocabulary updated successfully!');
    }

    // Delete a vocabulary word
    public function destroy(Vocabulary $vocabulary)
    {
        $vocabulary->delete();
        return redirect()->route('vocabularies.index')->with('success', 'Vocabulary deleted successfully!');
    }

    // Fetch word definition from Free Dictionary API
    private function fetchWordDefinition($word)
    {
        $client = new Client();
        $url = "https://api.dictionaryapi.dev/api/v2/entries/en/{$word}";

        try {
            $response = $client->request('GET', $url);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., word not found)
            return null;
        }
    }
}
