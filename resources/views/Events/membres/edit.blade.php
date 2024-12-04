<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Edit Membre') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <form method="POST" action="{{ route('membres.update', $membre->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="nom" class="block text-sm font-medium text-gray-300">Nom</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom', $membre->nom) }}" 
                                       class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                @error('nom')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="prenom" class="block text-sm font-medium text-gray-300">Prénom</label>
                                <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $membre->prenom) }}" 
                                       class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                @error('prenom')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="sexe" class="block text-sm font-medium text-gray-300">Sexe</label>
                                <select name="sexe" id="sexe" 
                                        class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="male" {{ old('sexe', $membre->sexe) === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sexe', $membre->sexe) === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('sexe')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="telephone" class="block text-sm font-medium text-gray-300">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $membre->telephone) }}" 
                                       class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                @error('telephone')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $membre->email) }}" 
                                       class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="seminaire_id" class="block text-sm font-medium text-gray-300">Thème du Séminaire</label>
                                <select name="seminaire_id" id="seminaire_id" 
                                        class="block w-full mt-1 rounded-md bg-gray-700 border-gray-600 text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($seminaires as $seminaire)
                                        <option value="{{ $seminaire->id }}" {{ old('seminaire_id', $membre->seminaire_id) == $seminaire->id ? 'selected' : '' }}>
                                            {{ $seminaire->theme }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('seminaire_id')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between mt-6">
                                <a href="{{ route('membres.index') }}" 
                                   class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition duration-300 ease-in-out">
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
                                    Update Membre
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>