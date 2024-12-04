<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Manage Activites') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                       
                        <div class="mb-4">
                            <a href="{{ route('activites.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">Add New Activites</a>
                        </div>

                       
                        <div class="overflow-x-auto bg-gray-700 p-4 rounded-lg">
                            <table class="min-w-full text-left table-auto text-gray-100">
                                <thead>
                                    <tr class="border-b border-gray-600">
                                        <th class="py-2 px-4">Nom</th>
                                        <th class="py-2 px-4">Description</th>
                                        <th class="py-2 px-4">Theme</th>
                                        <th class="py-2 px-4">Date Debut</th>
                                        <th class="py-2 px-4">Date Fin</th>
                                        <th class="py-2 px-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activites as $activite)
                                        <tr class="border-b border-gray-600">
                                            <td class="py-2 px-4">{{ $activite->nom }}</td>
                                            <td class="py-2 px-4">{{ $activite->description }}</td>
                                            <td class="py-2 px-4">{{ $activite->seminaire->theme ?? 'Devoid' }}</td>
                                            <td class="py-2 px-4">{{ $activite->seminaire->date_debut ?? 'Devoid' }}</td>
                                            <td class="py-2 px-4">{{ $activite->seminaire->date_fin ?? 'Devoid' }}</td>
                                            <td class="py-2 px-4 flex space-x-2">
                                              
                                                <!-- Edit -->
                                                <a href="{{ route('activites.edit', $activite->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition duration-300 ease-in-out">Edit</a>
                                                 
                                                <!-- Delete -->
                                                <form action="{{ route('activites.destroy', $activite->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this activite?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition duration-300 ease-in-out">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $activites->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
