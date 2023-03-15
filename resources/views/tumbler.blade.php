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
                    <p class="uppercase mb-4 font-semibold text-gray-800">{{ $tumbler->name }}</p>
                        Born in: {{ $tumbler->year }} <br>
                        Country: {{ $tumbler->country->name }} <br>
                        Gender: {{ ucfirst($tumbler->gender) }} <br>
                        <a href="{{ $tumbler->instagram_link }}">Instagram</a> <br>
                        <a href="{{ $tumbler->sampler_link }}">Video Sampler</a> <br>
                    </ul>
                </div>

                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Clubs</p>
                        @foreach ($tumbler->clubs as $club)
                            <a href="{{ route('club', $club) }}" class="ml-4">{{ $club->name }}</a><br>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Passes</p>
                    <table class="border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
                        <thead>
                            <tr>
                                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                    Pass
                                </th>
                                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                    Difficulty
                                </th>
                                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                    Total Score
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tumbler->passes as $pass)
                                <tr>
                                    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                        {{ $pass->pass }}
                                    </td>
                                    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                        {{ $pass->difficulty }}
                                    </td>
                                    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                        {{ $pass->total_score }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-white sm:rounded-lg p-6">
                    <p class="uppercase mb-4 font-semibold text-gray-800">Events</p>

                    @foreach ($tumbler->competitions as $competition)
                        <a href="{{ route('event', $competition->event) }}">
                            {{ $competition->event->name }} - {{ $competition->name }}
                        </a> <br>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
