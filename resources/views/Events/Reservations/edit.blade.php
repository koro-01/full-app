<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Edit Reservation') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="membre_id" class="block text-gray-300">Membre</label>
                                    <select id="membre_id" name="membre_id" class="w-full px-4 py-2 bg-gray-800 text-gray-100 rounded-md" required>
                                        @foreach ($membres as $membre)
                                            <option value="{{ $membre->id }}" {{ $reservation->membre_id == $membre->id ? 'selected' : '' }}>{{ $membre->nom }} {{ $membre->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="seminaire_id" class="block text-gray-300">Seminaire Theme</label>
                                    <select id="seminaire_id" name="seminaire_id" class="w-full px-4 py-2 bg-gray-800 text-gray-100 rounded-md" required>
                                        @foreach ($seminaires as $seminaire)
                                            <option value="{{ $seminaire->id }}" {{ $reservation->seminaire_id == $seminaire->id ? 'selected' : '' }}>{{ $seminaire->theme }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="date_reservation" class="block text-gray-300">Date Reservation</label>
                                    <input type="date" id="date_reservation" name="date_reservation" value="{{ $reservation->date_reservation }}" class="w-full px-4 py-2 bg-gray-800 text-gray-100 rounded-md" required>
                                </div>

                                <div>
                                    <label for="status" class="block text-gray-300">Status Reservation</label>
                                    <select id="status" name="status" class="w-full px-4 py-2 bg-gray-800 text-gray-100 rounded-md" required>
                                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="canceled" {{ $reservation->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">Update Reservation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
