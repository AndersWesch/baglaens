<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tumblers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Age</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tumblers as $tumbler)
                            <tr>
                                <td>{{ $tumbler->name }}</td>
                                <td>{{ $tumbler->country->name }}</td>
                                <td>{{ $tumbler->birthday }}</td>
                                <td>{{ $tumbler->gender }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
