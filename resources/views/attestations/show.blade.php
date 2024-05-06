@include('layouts.head')
  <main class="m-0 py-0">
    <div class="h-92 w-full">
      <img src="{{ asset('assets/head.png') }}" class="h-80 w-full" alt="">
    </div>
    <div class="mx-auto w-full text-center px-auto pt-12">
      <div class="inline-flex justify-center w-full">
        <a href="http://scan-qr.test/storage/{{ $attestation->file }}" class="bg-telecharger-bg py-2 px-3 text-white  rounded-md">Télecharger</a>
        <a href="https://www.diplome.cd/reclamation" class="bg-reclamer-bg center ml-4 py-2 px-3 text-white  rounded-md">Réclamation</a>
      </div>
      <h2 class="font-bold text-3xl px-12 text-gray-800 mt-2">Félicitations</h2>
      <h2 class="font-bold text-3xl px-16 text-gray-800">{{ $attestation->student_name }} 👏💐👏</h2>
      <div class="mx-auto py-12 px-6">
        <img src="http://scan-qr.test/storage/{{ $attestation->image }}" class="w-full h-64" alt="">
      </div>
    </div>
    <div class="bg-bg-two">
      <div class="rounded-lg text-center py-8">
        <img src="{{ asset('assets/epst.png') }}" alt="" class="h-76 px-28">
      </div>
      <div class="pt-4  py-1 px-8 text-center">
        <h3 class="font-bold text-3xl text-gray-800">Vérifier l'authenticité de votre attestation avec</h3>
        <h3 class="font-bold text-blue-800 text-3xl">Certif-app</h3>
        <p class="text-lg text-gray-600 font-light mt-6">Certif-app scanne le CODE QR contenu sur une attestation, en cas de succès elle renvoie des informations nécessaires qui se présentent sur le document en dur. En cas d'échec, elle retourne  un message qu'il s'agit d'un faux document. Certif-app fonctionne en mode offline pour les opérations d'authentification et d'affichage de contenu.</p>

        <a href="https://play.google.com/store/apps/details?id=lc.CertifApp.starter">
          <img src="{{ asset('assets/gplay.png') }}" alt="" class="mt-8 mx-auto rounded-md w-52">
        </a>
      </div>
    </div>
    <div class="text-center py-8">
      <h2 class="font-bold text-3xl">Partenaires</h2>
      <h2 class="font-bold text-3xl">institutionnels</h2>
      <div class="my-8">
        <img src="{{ asset('assets/Screenshot_20231110-085844.jpg') }}" class="w-full" alt="">
      </div>
    </div>
  </main>
@include('layouts.footer')