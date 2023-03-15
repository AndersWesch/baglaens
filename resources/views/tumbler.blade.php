<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tumbler->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Clubs</p>
                        @foreach ($tumbler->clubs as $club)
                            <a href="{{ route('club', $club) }}" class="ml-4">{{ $club->name }}</a><br>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Passes</p>

                    @foreach ($tumbler->passes as $pass)
                        {{ $pass->pass }} <br>
                    @endforeach
                </div>
                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Events</p>

                    @foreach ($tumbler->competitions as $competition)
                        {{ $competition->event->name }} - {{ $competition->name }} <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
