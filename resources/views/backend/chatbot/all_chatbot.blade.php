@extends('admin.template')

@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <link rel="shortcut icon" href="/backend/assets/images/favicon.png" />
</head>

<body>
    <div class="chat-container animate__animated animate__fadeInDown">
    </div>

    <div class="typing-container animate__animated animate__fadeInDown">
        <div class="typing-content animate__animated animate__fadeInDown">
            <div class="typing-textarea">
                <textarea id="chat-input" spellcheck="false" placeholder="Message ChatBot . . ." required></textarea>
                <span id="send-btn" class="material-symbols-rounded">send</span>
            </div>

            <div class="typing-controls">
                <a href="{{ route('admin.dashboard') }}">
                    <span id="back-btn" class="material-symbols-rounded">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    </span>
                </a>
                <span id="theme-btn" class="material-symbols-rounded">light_mode</span>
                <span id="delete-btn" class="material-symbols-rounded">delete</span>
            </div>
        </div>
    </div>
</body>

</html>
