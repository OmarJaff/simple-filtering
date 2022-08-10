<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo App</title>

         <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    </head>
    <body class="antialiased bg-gray-200 min-h-screen">
        <div class="relative flex items-top justify-center items-start   sm:items-center py-4 mt-16 ">

             <div class="px-4 sm:px-6 lg:px-8 w-full max-w-6xl">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
                    </div>



                </div>

                 <div class="mt-8">

                     <x-filters ></x-filters>

                 </div>

                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">User Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Gender</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Position</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 capitalized">{{$user->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->username}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->email}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->gender}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->position->title}}</td>

                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
{{--                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>


                            </div>
                            <div class="py-4">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </body>
</html>
