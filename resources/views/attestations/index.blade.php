<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attestations') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div id="success-message"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#success-message" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="flex justify-end me-0 my-2">
                <button data-modal-target="modal" data-modal-toggle="modal" type="button"
                    class="px-3 py-2 bg-emerald-500 hover:bg-emerald-700 text-white rounded">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </button>
            </div>
            <div class="relative w-full mx-auto overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-md text-center text-gray-500" id="index-table">
                    <thead class="text-md text-gray-700 uppercase bg-gray-50">
                        <tr class="py-4">
                            <th scope="col" class="py-3 px-6">
                                N°
                            </th>
                            <th scope="col" class="py-3 px-6 !text-center">
                                Nom
                            </th>
                            <th scope="col" class="py-3 px-6 !text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($attestations->count() > 0)
                            @foreach ($attestations as $key => $attestation)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap uppercase">
                                        {{ $attestation->student_name }}
                                    </td>
                                    <td
                                        class="py-4 px-6 flex justify-end text-sm font-medium text-blue-900 whitespace-nowrap">
                                        <div class="flex space-x-3">
                                            <button data-modal-target="qr-generate" data-modal-toggle="qr-generate"
                                                type="button" onclick="generate({{ $attestation }})"
                                                class="font-medium cursor-pointer bg-emerald-400 hover:bg-emerald-400 dark:bg-emerald-400 py-2 px-3 rounded text-white dark:text-white">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 4h6v6H4V4Zm10 10h6v6h-6v-6Zm0-10h6v6h-6V4Zm-4 10h.01v.01H10V14Zm0 4h.01v.01H10V18Zm-3 2h.01v.01H7V20Zm0-4h.01v.01H7V16Zm-3 2h.01v.01H4V18Zm0-4h.01v.01H4V14Z" />
                                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01v.01H7V7Zm10 10h.01v.01H17V17Z" />
                                                </svg>
                                            </button>
                                            <a href="{{ route('attestations.show', $attestation) }}">
                                                <div
                                                    class="font-medium cursor-pointer bg-amber-400 hover:bg-amber-400 dark:bg-amber-400 py-2 px-3 rounded text-white dark:text-white">
                                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                                type="button" onclick="openEdit({{ $attestation }})"
                                                class="font-medium cursor-pointer bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 py-2 px-3 rounded text-white dark:text-white">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                            </button>
                                            <a href="{{ route('attestations.destroy', $attestation) }}"
                                                data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                                onclick="supprimer(event, {{ $attestation }})"
                                                class="font-medium bg-red-600 hover:bg-red-700 dark:bg-red-700 py-2 px-3 rounded  text-white dark:text-white">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td colspan="3" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ __('Pas d\'attestations trouvées') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div class="mx-auto my-4 px-auto">
                {{ $attestations->links() }}
            </div> --}}
        </div>
    </div>
    <x-attestation-create />
    <x-attestation-edit />
    <x-qr-generate />
    <x-delete :message="__('Voulez-vous vraiment supprimer cette attestation ?')" />

    <script>
        const data = new simpleDatatables.DataTable("#index-table", {
            searchable: true,
            fixedHeight: true,
            paging: true,
            perPage: 10,
            perPageSelect: [5, 10, 20, 50],
            firstLast: true,
            nextPrev: true,
        })

        const searchInput = document.querySelector(".datatable-input");
        const perPageSelect = document.querySelector(".datatable-selector");
        searchInput.classList.add("px-4", "py-2", "border", "border-gray-300", "dark:border-white", "rounded-lg",
            "focus:outline-none", "focus:ring-2", "focus:ring-blue-500", "focus:border-blue-500", "w-full")
        perPageSelect.classList.add("px-4", "py-2", "border", "border-gray-300", "dark:border-white", "rounded-lg",
            "focus:outline-none", "focus:ring-2", "focus:ring-blue-500", "focus:border-blue-500")
    </script>
</x-app-layout>
