<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Edit Activite') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <form action="{{ route('activites.update', $activite->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4">
                                <!-- Nom -->
                                <div>
                                    <label for="nom" class="block text-sm font-medium text-gray-100">Nom</label>
                                    <input type="text" name="nom" id="nom" value="{{ old('nom', $activite->nom) }}" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                    @error('nom') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-100">Description</label>
                                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $activite->description) }}</textarea>
                                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Seminar -->
                                <div>
                                    <label for="seminaire_id" class="block text-sm font-medium text-gray-100">Seminaire</label>
                                    <select name="seminaire_id" id="seminaire_id" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                        <option value="">Select a Seminar</option>
                                        @foreach ($seminaires as $seminaire)
                                            <option value="{{ $seminaire->id }}" {{ old('seminaire_id', $activite->seminaire_id) == $seminaire->id ? 'selected' : '' }}>{{ $seminaire->theme }}</option>
                                        @endforeach
                                    </select>
                                    @error('seminaire_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 transition duration-300 ease-in-out">Update Activite</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
