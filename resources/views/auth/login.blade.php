<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <style type="text/tailwindcss">
        @layer components {
            * {
                @apply transition-all
            }

            body {

                @apply bg-blue-300 w-full h-screen flex justify-center items-center
            }

            input {
                @apply bg-blue-100 rounded-2xl py-3 lg:py-5 px-10 text-sm outline-none text-gray-500
            }

            button {
                @apply inline justify-center items-center rounded-2xl shadow-2xl py-3 lg:p-5 font-bold text-[14px]
            }

            p {
                @apply font-semibold
            }
        }
    </style>
    <style>
        .container {
            align-items: center;
            justify-content: center;
            background-image: url("../../../../images/background.jpg");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <main class="bg-blue-300 w-full h-screen flex justify-center items-center">
        <div
            class=" bg-blue-300 overflow-hident lg:p-20 relative w-[90%] h-[90%] border-2 border-blue-300 bg:blue-100 rounded-2xl container">
            <div class="flex h-full flex-col items-center lg:flex-row p-10 lg:justify-between lg:p-20 gap-2 lg:gap-10 ">
                <div class="lg:w-1/2">
                    {{-- <h1 class="text-2xl lg:text-4xl font-bold text-blue-700">FTB Bank</h1> --}}
                    {{-- <p class="text-sm text-gray-900 ">Welcome to FTB Bank</p> --}}
                    <img src="" class="w-[30rem] mt-5" alt="">
                </div>
                <form class="lg:w-1/2 flex flex-col w-full gap-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" id="login" name="login" required placeholder="Enter your Email"
                        class="p-4 rounded-lg text-black" :value="old('login')" autofocus autocomplete="username" />
                    @error('login')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <input type="password" id="password" name="password" required placeholder="Enter your password"
                        class="p-4 rounded-lg text-black" autocomplete="current-password" />
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="flex items-center gap-2 text-gray-100">
                        <input type="checkbox" class="h-4 w-4">
                        <p>Keep me logged in</p>
                    </div>
                    <button type="submit"
                        class="flex bg-blue-600 hover:shadow-none active:bg-blue-500 p-3 rounded-lg text-white text-[20px]">Login</button>

                    <p class="flex text-center justify-center text-gray-100 mt-3">Please Contact Us To Create An
                        Account<a href="https://join.skype.com/pYIChcV0tLr4"
                            style="color: blue; margin-left:20px; "target="_blank">
                            Contact Us</a></p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
