<div class="w-full h-screen sm:px-6">
    <div class="bg-gray-700 h-screen text-white dark:bg-gray-800  shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto rounded-md">
        <table class="w-full whitespace-nowrap">
            <thead>
            <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none bg-emerald-600 text-white">
                <th class="font-normal text-center pl-4">Todo</th>
                <th class="font-normal text-center pl-16">Doing</th>
                <th class="font-normal text-center pl-16">Done</th>
                <th class="font-normal text-center pl-16">Action</th>

            </tr>
            </thead>
            <tbody class="w-full">
            @foreach($tasks as $task)
            <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-slate-300 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700">
                <td class="pl-4 cursor-pointer">
                    <div class="flex items-center">
                        <div class="pl-4 cursor-pointer">
                            @if($task->status == 1)
                                <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                                    <!-- Primary Navigation Menu -->
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="flex justify-between h-16">
                                            <!-- Settings Dropdown -->
                                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                                <x-dropdown align="right" width="48">
                                                    <x-slot name="trigger">
                                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                            <div>{{ $task->name }}</div>
                                                            <div class="ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </x-slot>

                                                    <x-slot name="content">
                                                        <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                                            <button type="submit" wire:click="setTaskStatus({{$task->id}})">
                                                                {{__('Move task to doing')}}
                                                            </button>
                                                        </div>
                                                    </x-slot>
                                                </x-dropdown>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="pl-16">
                    <div class="pl-4">
                        @if($task->status == 2)
                            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                                <!-- Primary Navigation Menu -->
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div class="flex justify-between h-16">
                                        <!-- Settings Dropdown -->
                                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                        <div>{{ $task->name }}</div>
                                                        <div class="ml-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                                        <button type="submit" wire:click="setTaskStatus({{$task->id}})">
                                                            {{__('Move task to done')}}
                                                        </button>
                                                    </div>
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        @endif
                    </div>
                </td>
                <td class="pl-16">
                    <div class="pl-4">
                        @if($task->status == 3)
                            <p class="font-medium">{{$task->name}}</p>
                        @endif
                    </div>
                </td>
                <td class="pl-16">

                    <!-- Remove task -->
                    <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                        @can('view', $task)
                            <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="text" name="id" value="{{$task->id}}" hidden>
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-red-700 w-6 h-6">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
