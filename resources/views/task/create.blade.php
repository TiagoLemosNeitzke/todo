<x-app-layout>
    <div class="bg-gray-700 w-full h-screen flex flex-row justify-center">
        <div class="flex flex-col justify-center items-center text-center">
            <h2 class="bg-emerald-700 rounded-t-md w-full text-white text-xl font-bold p-6">
                {{__('Create task')}}
            </h2>
            <form action="{{route('tasks.store')}}" method="post" class="bg-white rounded-b-md w-60">
                @method('post')
                @csrf
                <div class="flex flex-col justify-start items-center p-4 pb-6">
                    <label>
                        <input class="rounded-md bg-slate-300 text-xs border-none" type="text" id="name" name="name" placeholder="task name" required>
                    </label>
                    @error('name')
                    <div class="mt-2">
                        <x-input-error messages="{{$message}}" />
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col justify-start items-center p-4 pb-6">
                    <label>
                        <input class="rounded-md bg-slate-300 text-xs border-none" type="text" id="short_description" name="short_description" placeholder="short description" required>
                    </label>
                    @error('short_description')
                    <div class="mt-2">
                        <x-input-error messages="{{$message}}" />
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col justify-start items-center p-4 pb-6">
                    <label>
                        <input class="rounded-md bg-slate-300 text-xs border-none" type="number" id="score" name="score" placeholder="task score">
                    </label>
                    @error('score')
                    <div class="mt-2">
                        <x-input-error messages="{{$message}}" />
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col justify-start items-center p-4 pb-6">
                    <label>
                        <select class="rounded-md bg-slate-300 text-xs border-none" name="team_id" placeholder="What's your team?">
                            <option value="">What's your team?</option>
                            @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('team_id')
                    <div class="mt-2">
                        <x-input-error messages="{{$message}}" />
                    </div>
                    @enderror
                </div>
                <button type="submit"  class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mb-4 sm:mt-0 items-start justify-start px-6 py-1 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-white">
                    Save
                </button>
                <a href="{{url()->previous()}}"  class="focus:ring-2 focus:ring-offset-2 focus:ring-slate-600 inline-flex sm:ml-3 mb-4 sm:mt-0 items-start justify-start px-6 py-1 bg-slate-700 hover:bg-slate-600 focus:outline-none rounded text-white">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
