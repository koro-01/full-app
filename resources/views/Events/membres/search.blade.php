<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Manage Members') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('membres.search') }}" class="mb-4">
                            <div class="flex space-x-4  ">
                                <!-- Search Input for multiple fields -->
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by Nom, Prenom, Sexe, Telephone, or Email" class="px-4 py-2 rounded-md"  style="color: black;" />

                                
                                <!-- Search Button -->
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
                            </div>
                        </form>

                        <!-- Members List -->
                        <div class="overflow-x-auto bg-gray-700 p-4 rounded-lg">
                            <table class="min-w-full text-left table-auto text-gray-100">
                                <thead>
                                    <tr class="border-b border-gray-600">
                                        <th class="py-2 px-4">Nom</th>
                                        <th class="py-2 px-4">Prenom</th>
                                        <th class="py-2 px-4">Sexe</th>
                                        <th class="py-2 px-4">Telephone</th>
                                        <th class="py-2 px-4">Email</th>
                                        <th class="py-2 px-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membres as $membre)
                                        <tr class="border-b border-gray-600">
                                            <td class="py-2 px-4">{{ $membre->nom }}</td>
                                            <td class="py-2 px-4">{{ $membre->prenom }}</td>
                                            <td class="py-2 px-4">{{ $membre->sexe }}</td>
                                            <td class="py-2 px-4">{{ $membre->telephone }}</td>
                                            <td class="py-2 px-4">{{ $membre->email }}</td>
                                            <td class="py-2 px-4 flex space-x-2">
                                                <a href="{{ route('membres.edit', $membre->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700">Edit</a>
                                                <form action="{{ route('membres.destroy', $membre->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $membres->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
