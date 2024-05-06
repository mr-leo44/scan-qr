@include('layouts.head')
    <div class="mx-auto w-4xl min-h-screen">
        <main class="m-2 p-8 w-full">
            <form method="POST" action="{{ route('attestations.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-6">
                    <label for="student_name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <div class="mt-1">
                        <input type="text" id="student_name" name="student_name"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5">
                    <label for="file" class="block text-sm font-medium text-gray-700">Attestation</label>
                    <div class="mt-1">
                        <input type="file" id="file" name="file"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="mt-6 py-4">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Enregistrer</button>
                </div>
              </form>
        </main>
    </div>
@include('layouts.footer')