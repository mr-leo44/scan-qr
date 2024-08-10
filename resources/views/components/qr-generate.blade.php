@props(['attestation'])
<div id="qr-generate" tabindex="-1" aria-hidden="true"
    class="hidden mx-auto overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-md md:inset-0 max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button data-modal-hide="qr-generate" type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="edit-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5">
                <div class="max-h-auto mx-auto max-w-md flex-col justify-center">
                    <div class="my-3">
                        <h3 class="font-semibold text-lg text-center uppercase">QrCode généré</h3>
                    </div>
                    <div class="w-full mx-auto flex justify-center visible-print">
                        {!! $attestation->qr_code !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
