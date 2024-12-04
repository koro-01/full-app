<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Manage Reservations') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <div class="mb-4">
                            <a href="{{ route('reservations.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">Add New Reservation</a>
                        </div>

                        <div class="overflow-x-auto bg-gray-700 p-4 rounded-lg">
                            <table class="min-w-full text-left table-auto text-gray-100">
                                <thead>
                                    <tr class="border-b border-gray-600">
                                        <th class="py-2 px-4">Membre</th>
                                        <th class="py-2 px-4">Seminaire Theme</th>
                                        <th class="py-2 px-4">Date Reservation</th>
                                        <th class="py-2 px-4">Status Reservation</th>
                                        <th class="py-2 px-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr class="border-b border-gray-600">
                                            <td class="py-2 px-4">{{ $reservation->membre->nom }} {{ $reservation->membre->prenom }}</td>
                                            <td class="py-2 px-4">{{ $reservation->seminaire->theme }}</td>
                                            <td class="py-2 px-4">{{ $reservation->date_reservation }}</td>
                                            <td class="py-2 px-4">{{ $reservation->status }}</td>
                                            <td class="py-2 px-4 flex space-x-2">
                                                <!-- Edit -->
                                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition duration-300 ease-in-out">Edit</a>

                                                <!-- Delete -->
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
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
                            {{ $reservations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
