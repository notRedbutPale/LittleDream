<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Function to show the list of animals
    public function index()
    {
        $animals = ['tiger', 'lion']; // Add more animals as needed
        return view('animals.index', compact('animals'));
    }

    // Function to show fun facts for a specific animal
    public function show($animal)
    {
        $facts = [];

        switch ($animal) {
            case 'tiger':
                $facts = [
                    "Tigers are the largest wild cats in the world.",
                    "No two tigers have the same stripes.",
                    "A tiger's roar can be heard as far as 2 miles away.",
                    "Tigers are great swimmers and love the water.",
                    "They can eat up to 60 pounds of meat in one night."
                ];
                break;

            case 'lion':
                $facts = [
                    "Lions are known as the 'king of the jungle'.",
                    "Lions live in groups called prides.",
                    "A lion's roar can be heard from 5 miles away.",
                    "Male lions have a majestic mane of hair.",
                    "Lions can sleep for up to 20 hours a day."
                ];
                break;

            // Add more animals and facts as needed
        }

        return view('animals.show', compact('animal', 'facts'));
    }
}
