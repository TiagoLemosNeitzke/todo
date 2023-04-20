@props(['type', 'message'])
<x-app-layout>
    <div class="w-full flex flex-row justify-center items-center h-screen">
        <div class="flex flex-col justify-center items-center text-center bg-slate-400 w-40 md:w-80 rounded-md p-6">
             <span @class([
                'text-red-500' => $type === 'error',
                'text-green-500' => $type === 'success',
                'text-yellow-500' => $type === 'warning',
                'text-blue-500' => $type === 'info',
               ])>
                 {{$message}}
             </span>
            <a class="mt-4 bg-slate-500 px-4 py-1 rounded-md hover:bg-slate-600 text-white" href="{{$url}}">Back</a>
        </div>
    </div>
</x-app-layout>
