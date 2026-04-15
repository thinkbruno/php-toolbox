<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Toolbox Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center"> PHP Toolbox</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Busca de CEP</h2>
                <form action="{{ route('toolbox.cep') }}" method="POST">
                    @csrf
                    <input type="text" name="cep" placeholder="01001-000" class="w-full border p-2 rounded mb-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Consultar</button>
                </form>

                @if(session('cep_result'))
                    <div class="mt-4 p-3 bg-blue-50 text-sm rounded">
                        <pre>{{ json_encode(session('cep_result'), JSON_PRETTY_PRINT) }}</pre>
                    </div>
                @endif
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Uptime Checker</h2>
                <form action="{{ route('toolbox.uptime') }}" method="POST">
                    @csrf
                    <input type="url" name="url" placeholder="https://google.com" class="w-full border p-2 rounded mb-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded w-full">Checar Status</button>
                </form>

                @if(session('uptime_result'))
                    <div class="mt-4 p-3 rounded {{ session('uptime_result')['status'] == 'online' ? 'bg-green-100' : 'bg-red-100' }}">
                        <p><strong>Status:</strong> {{ strtoupper(session('uptime_result')['status']) }}</p>
                        <p><strong>Tempo:</strong> {{ session('uptime_result')['response_time_ms'] }}ms</p>
                    </div>
                @endif
            </div>

        </div>

        @if($errors->any())
            <div class="mt-6 p-4 bg-red-200 text-red-800 rounded">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>