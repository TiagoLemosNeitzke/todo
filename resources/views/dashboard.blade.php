<x-app-layout>
    <div class="container grid grid-cols-4 h-screen w-full">

        {{-- MENU --}}
        <div>
            <livewire:nav/>
        </div>
        {{-- END MENU --}}

        <div class="col-span-3 text-white">
            <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 dark:bg-gray-700">
                <div class="sm:flex items-center justify-between">
                    <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white dark:text-white ">
                        Tasks
                    </p>
                    <div>
                        <a href="{{route('tasks.create')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <p class="text-sm font-medium leading-none text-white">New Task</p>
                        </a>
                    </div>
                </div>
            </div>
            <livewire:task.task/>
        </div>
    </div>
</x-app-layout>
