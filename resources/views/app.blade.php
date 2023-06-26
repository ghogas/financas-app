<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Finanças App</title>
</head>
<body>

    <main>
        <div class="md:grid grid-cols-4 gap-4">
            <div class="md:w-full col-span-1 p-5 bg-teal-200 h-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="mb-8">Olá <strong>{{auth()->user()->name}}</strong></p>

                <!-- menu  -->
                <ul>
                    <li><a href="{{route('dashboard')}}">Extrato</a></li>
                    <li><a href="{{route('nova_entrada')}}">Nova Entrada</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); this.closest('form').submit();" 
                            role="button">
                                {{ __('Sair') }}
                            </a>
                        </form>
                    </li>
                </ul>

            </div>
            <div class="md:w-full col-span-3">
                @yield('conteudo')
            </div>
        </div>
    </main>    
</body>
</html>