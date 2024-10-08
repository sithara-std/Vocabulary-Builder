@extends('layouts.app')

@section('content')
    <!-- Split background section with Flexbox -->
    <div class="split-background-section">
        <!-- Left side: Background Image -->
        <div class="left-side"></div>

        <!-- Right side: Background Color and Form -->
        <div class="right-side">
            <div class="form-box">
                <h1>Add Vocabulary</h1>

                <!-- Vocabulary Form -->
                <form action="{{ route('vocabularies.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="word">Word</label>
                        <div class="input-group">
                            <input type="text" name="word" class="form-control" id="word" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-success ml-1" onclick="speakWord()">🔊</button>
                            </div>
                        </div>
                        @error('word')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-light">Add</button>
                </form>

                <!-- Link to Vocabulary List -->
                <a href="{{ route('vocabularies.index') }}" class="btn btn-secondary mt-2">Back to List</a>
            </div>
        </div>
    </div>

    <style>
        /* Main container that holds both left and right sides */
        .split-background-section {
            display: flex;
            height: 100vh; /* Full height of the viewport */
        }

        /* Left side: Background image */
        .left-side {
            background-image: url('/images/1.jpg'); /* Replace with your image URL */
            background-size: cover; /* Cover the whole section */
            background-position: center; /* Center the image */
            width: 50%; /* 50% width of the section */
        }

        /* Right side: Background color and form */
        .right-side {
            background-color: #ccffcc; /* Light green background color */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 50%; /* 50% width of the section */
            padding: 30px; /* Padding for the form */
        }

        /* Style for form heading */
        .right-side h1 {
            margin-bottom: 20px; /* Spacing below the heading */
        }

        /* Form box styling */
        .form-box {
            background: linear-gradient(to bottom, #00b09b, #96c93d);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2); /* Stronger shadow */
            max-width: 500px;
            width: 100%;
        }
    </style>

    <script>
        function speakWord() {
            const word = document.getElementById('word').value; // Get the word from the input
            if (word) {
                const speech = new SpeechSynthesisUtterance(word); // Create a new SpeechSynthesisUtterance
                window.speechSynthesis.speak(speech); // Speak the word
            } else {
                alert('Please enter a word to hear it spoken.'); // Alert if input is empty
            }
        }
    </script>
@endsection
