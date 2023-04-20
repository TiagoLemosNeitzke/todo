<div x-data="{ openNav: true }" class="w-24 md:w-36 bg-gray-900 h-screen">
    <button @click="openNav = true" class="md:hidden flex flex-col items-center p-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
        </svg>
    </button>
    <nav x-show="openNav" @click.outside="openNav = false" class="flex flex-col w-full z-10">
        <ul class="mt-1">
            <x-nav.item route="teams.create" label="Teams">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                    </svg>
                </x-slot:icon>
            </x-nav.item>

            <x-nav.item route="tasks.create" label="Tasks">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                    </svg>
                </x-slot:icon>
            </x-nav.item>
        </ul>
        {{--Filters--}}
        <ul class="flex flex-col justify-center items-center mt-4">
            <div class="text-center w-full border-y-[0.525px] border-slate-400 py-2">
                <span class="text-white text-xs md:text-lg">Filters</span>
            </div>
            <div class="flex flex-col items-start mt-4">
                <x-filters.item route="teams.index" label="Backlog">
                    <x-filters.item-span color="blue" style="background: blue"/>
                </x-filters.item>

                <x-filters.item route="teams.index" label="To do">
                    <x-filters.item-span color="green" style="background: green"/>
                </x-filters.item>

                <x-filters.item route="teams.index" label="Doing">
                    <x-filters.item-span color="purple" style="background: purple"/>
                </x-filters.item>

                <x-filters.item route="teams.index" label="Done">
                    <x-filters.item-span color="yellow" style="background: yellow"/>
                </x-filters.item>

                <x-filters.item route="teams.index" label="Teams">
                    <x-filters.item-span color="red" style="background: red"/>
                </x-filters.item>

                <x-filters.item route="dashboard" label="Tasks">
                    <x-filters.item-span color="pink" style="background: pink"/>
                </x-filters.item>
            </div>
        </ul>
        {{--End Filters--}}
    </nav>
</div>
