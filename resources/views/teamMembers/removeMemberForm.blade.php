<x-app-layout>
    <div class="bg-gray-700 w-full h-screen flex flex-row justify-center">
        <div class="flex flex-col justify-center items-center text-center w-60">
            <h2 class="bg-emerald-700 rounded-t-md w-full text-white text-md font-bold p-6">
                {{__('Remove Team Member')}}
            </h2>
            <form action="{{route('removeMember')}}" method="post" class="bg-white rounded-b-md w-60">
                @csrf
                <div class="flex flex-col justify-start items-center p-4 pb-6">
                    <label>
                        <input class="rounded-md bg-slate-300 text-xs border-none" type="email" id="email" name="email" placeholder="User email to remove to team" required>
                    </label>
                    @error('email')
                    <div class="mt-2">
                        <x-input-error messages="{{$message}}" />
                    </div>
                    @enderror
                    @if(isset($notification))
                        <x-notification :type :message/>
                    @endif
                </div>
                <input name="team" type="text" value="{{$team}}" hidden>
                <button type="submit"  class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mb-4 sm:mt-0 items-start justify-start px-6 py-1 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-white">
                    {{__('Remove')}}
                </button>
                <a href="{{url()->previous()}}"  class="focus:ring-2 focus:ring-offset-2 focus:ring-slate-600 inline-flex sm:ml-3 mb-4 sm:mt-0 items-start justify-start px-6 py-1 bg-slate-700 hover:bg-slate-600 focus:outline-none rounded text-white">
                    {{__('Cancel')}}
                </a>
            </form>

        </div>
    </div>

</x-app-layout>
