<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100">

        @php
            $fields = [
                "id",
                "name",
                "email",
                "birth_date",
                "country",
                "phone",
                "registration_date",
                "need_pickup"
            ];        
        @endphp

        <section class="w-full p-4">

            {{-- Notification element --}}
            <div class="block text-sm text-blue-600 bg-blue-200 border border-blue-400 h-12 flex items-center p-4 mb-2 rounded-sm relative" role="alert">
                <span class="mr-1">
                    <svg class="fill-current text-blue-500 inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path class="heroicon-ui" d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"></path>
                    </svg>
                </span>
                <span>
                    {{ $message }}
                </span>
            </div>


            <table class="border-collapse w-full shadow">
                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{$field}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            @foreach ($fields as $field)
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{$field}}</span>
                                    {{ $user[$field] }}
                                </td>
                            @endforeach                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </body>
</html>
