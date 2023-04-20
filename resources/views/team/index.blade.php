<x-app-layout>
    <div class="w-full sm:px-6">
        <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 dark:bg-gray-700">
            <div class="sm:flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white dark:text-white ">
                    Teams
                </p>
                <div>
                    <a href="{{route('teams.create')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">New Team</p>
                    </a>
                    <a href="{{route('dashboard')}}"  class="focus:ring-2 focus:ring-offset-2 focus:ring-slate-300 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-2 bg-slate-500 hover:bg-slate-600 focus:outline-none rounded text-white">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-gray-700 text-white dark:bg-gray-800  shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto rounded-md">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none bg-emerald-600 text-white ">
                    <th class="font-normal text-left pl-4">Team</th>
                    <th class="font-normal text-left pl-16">Members</th>
                    <th class="font-normal text-left pl-16">Actions</th>
                </tr>
                </thead>
                <tbody class="w-full">

                    @foreach($teams as $team)
                        <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-slate-300 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700 ">
                            <td class="pl-4 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="pl-4">
                                        <p class="font-medium">{{$team->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-16">
                                <livewire:team-members :team-id="$team->id"/>
                            </td>
                            <td class="px-7 2xl:px-0 flex flex-row justify-between">
                                {{--Delete team--}}
                                @can('view',$team)
                                    <form action="{{route('teams.destroy',['team' => $team->id])}}" method="post" tabindex="0" class="flex flex-row justify-center items-center focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 cursor-pointer hover:text-white">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-red-700 w-6 h-6">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                                {{--end delete team--}}
                                {{--Add member--}}
                                    @can('view', $team)
                                            <form action="{{route('memberForm')}}" method="post">
                                                @csrf
                                                <input type="text" name="id" value="{{$team->id}}" hidden>
                                                <button type="submit" class="flex flex-row justify-center items-center focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-emerald-700 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                    </svg>

                                                </button>
                                            </form>
                                    @endcan
                                {{--end add member--}}
                                {{--Remove member--}}
                                @can('view', $team)
                                        <form action="{{route('removeMemberForm')}}" method="post">
                                            @csrf
                                            <input type="text" name="id" value="{{$team->id}}" hidden>
                                            <button type="submit" class="flex flex-row justify-center items-center focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-700 w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                </svg>

                                            </button>
                                        </form>
                                @endcan
                                {{--end remove member--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       <div class="text-white mb-8 flex-row flex justify-center">
           {{ $teams->links()}}
       </div>
    </div>



</x-app-layout>
