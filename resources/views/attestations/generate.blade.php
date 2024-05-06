@include('layouts.head')
    <div class="mx-auto w-4xl min-h-screen">
        <main class="m-2 p-8 w-full">
          <div class="visible-print text-center">
            {!! $qr_generated !!}
          </div>
        </main>
    </div>
@include('layouts.footer')