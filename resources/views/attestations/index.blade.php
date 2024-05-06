@include('layouts.head')
<div class="mx-auto w-4xl min-h-screen">
    <main class="m-2 p-8 w-full">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('attestations.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                Ajouter
            </a>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            NOM
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attestations as $attestation)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $attestation->id }}
                            </td>
                            <td
                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"">
                                {{ $attestation->student_name }}
                            </td>
                            <td
                                class="py-4 px-6 text-sm font-medium text-blue-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-3">
                                    <a href="{{ route('attestations.show', $attestation) }}"
                                        class="px-4 py-2 bg-green-500 hover:bg-emerald-700 rounded-lg text-white">Voir</a>
                                    <a href="{{ route('qrcode', $attestation) }}"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Générer QR Code</a>
                                    <a href="{{ route('attestations.edit', $attestation->id) }}"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Modifier</a>
                                    <form action="{{ route('attestations.destroy', $attestation->id) }}"
                                        method="post"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                        onsubmit="return confirm('Etes-vous sûr?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@include('layouts.footer')

