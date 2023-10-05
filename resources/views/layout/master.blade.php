<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>@yield('title')</title>
    </head>
<body class="mb-48">
    @auth
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-24" src="/images/logo.png" alt="" class="logo"/></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <span>Welcome {{ auth()->user()->name }} </span>
                </li>
                <li>
                    <a href="/my_blogs/{{ auth()->user()->id }}" class="hover:text-laravel">My Blogs</a>
                </li>
                <li>
                    <a href="/logout" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Logout</a>
                </li>
            </ul>
        </nav>
    @else
        <nav class="flex justify-between items-center mb-4">
            <a href="/"><img class="w-24" src="/images/logo.png" alt="" class="logo"/></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="/register_page" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login_page" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
            </ul>
        </nav>
    @endauth
    

        <main>@yield('content')</main>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        @auth
            <a href="/create_blog_page" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Blog</a>
        @else
            <a href="/login_page" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Blog</a>
        @endauth
    </footer>
</body>
</html>