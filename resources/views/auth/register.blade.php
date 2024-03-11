<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Form</title>
    <style type="text/tailwindcss">
        @layer components {
            * {
                @apply transition-all
            }

            body {

                @apply bg-blue-200 w-full h-screen flex justify-center items-center
            }

            input {
                @apply bg-blue-200 rounded-2xl py-3 lg:py-4 px-10 text-sm outline-none text-black
            }

            button {
                @apply inline justify-center items-center rounded-2xl shadow-2xl py-3 lg:p-5 font-bold text-[14px]
            }

            p {
                @apply font-semibold
            }
        }
    </style>
</head>

<body>
    <main class="bg-blue-200 w-full h-screen flex justify-center items-center">
        <div
            class=" bg-white overflow-hident lg:p-20 relative w-[90%] h-[90%] border-2 border-white bg:blue-100 rounded-2xl container">
            <div class="flex h-full flex-col items-center lg:flex-row p-10 lg:justify-between lg:p-20 gap-2 lg:gap-10 ">
                <div class="lg:w-1/2">
                    <h1 class="text-2xl lg:text-4xl font-bold text-blue-800">S&H Store</h1>
                    <p class="text-sm text-gray-600 ">Welcome to S&H Shop</p>
                    {{-- <img src="./images/profile.webp" class="w-[30rem] mt-5" alt=""> --}}
                </div>
                <form class="lg:w-1/2 flex flex-col w-full gap-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-text-input id="name" class="block w-full " type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your Name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="block  w-full " type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="Enter your Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-text-input id="password" class="block w-full " type="password" name="password" required
                            autocomplete="new-password" placeholder="Enter Your password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-text-input id="password_confirmation" class="block  w-full " type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Conform your password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class=" text-sm text-gray-600 hover:text-gray-900 rounded-md " href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>

                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
