<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="build/assets/app-6fdb6572.css">
</head>

<body class="items-center w-full h-screen justify-center flex flex-col text-white bg-primary gap-2">
    <div class="bg-white/50 w-80 p-10 pt-24 rounded-lg drop-shadow-lg shadow-white/20 relative">
        <img src="/logo.png" alt="logo" class="absolute -top-1 left-9 max-w-[115px]">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="username" class="text-secondary">Username</label>
            <input type="text" class="w-full bg-transparent border-b mb-6 focus-visible:outline-none caret-white"
                name="username" id="username">

            <label for="password" class="text-secondary">Password</label>
            <input type="text" class="w-full bg-transparent border-b mb-6 focus-visible:outline-none caret-white"
                name="password" id="password">
            <button type="submit"
                class="bg-secondary text-primary w-full rounded-md py-2 font-bold drop-shadow-lg shadow-white/20 hover:bg-[#f39c12]
            duration-300 transition-all">
                Sign In</button>
        </form>
    </div>
    <footer class="text-xs text-center">
        &copy; Pemrograman Berbasis Kerangka Kerja C-E 2022/2023<br />
        Institut Teknologi Sepuluh Nopember
    </footer>

    <script src="build/assets/app-9c47871d.js"></script>
</body>

</html>
