<div id="modal" tabindex="-1" aria-hidden="true"
    class="hidden mx-auto overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-md md:inset-0 max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5">
                <div class="max-h-auto mx-auto max-w-md">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white px-3 py-2 rounded-lg mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="w-full mx-auto" method="POST" action="{{ route('attestations.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="my-6">
                            <h3 class="font-semibold text-lg text-center">Nouvel enregistrement</h3>
                        </div>
                        <div>
                            <x-input-label for="student_name" :value="__('Nom')" />
                            <x-text-input id="student_name" class="block mt-1 w-full" type="text" name="student_name"
                                :value="old('student_name')" required autofocus
                                autocomplete="student_name" />
                            <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="file" :value="__('Attestations')" />
                            <x-text-input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file" name="file" id="file" type="file" />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="image" name="image" id="image" type="file" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="flex justify-end gap-2 my-4">
                            <button type="submit"
                                class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                Ajouter
                            </button>
                            <button data-modal-hide="modal" type="button"
                                class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-gray-800 rounded-lg border border-gray-200 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Non</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
