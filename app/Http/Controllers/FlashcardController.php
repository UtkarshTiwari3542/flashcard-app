<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function index()
    {
        $flashcards = Flashcard::all();
        return view('flashcards.index', compact('flashcards'));
    }

    public function create()
    {
        return view('flashcards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Flashcard::create($request->all());

        return redirect()->route('flashcards.index')
                         ->with('success', 'Flashcard created successfully.');
    }

    public function show(Flashcard $flashcard)
    {
        return view('flashcards.show', compact('flashcard'));
    }

    public function edit(Flashcard $flashcard)
    {
        return view('flashcards.edit', compact('flashcard'));
    }

    public function update(Request $request, Flashcard $flashcard)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $flashcard->update($request->all());

        return redirect()->route('flashcards.index')
                         ->with('success', 'Flashcard updated successfully.');
    }

    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();

        return redirect()->route('flashcards.index')
                         ->with('success', 'Flashcard deleted successfully.');
    }
}
