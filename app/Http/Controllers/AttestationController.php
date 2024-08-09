<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttestationController extends Controller
{
    public function index()
    {
        $attestations = Attestation::latest()->paginate();
        return view('attestations.index', compact('attestations'));
    }

    public function generateQrCode(Request $request, Attestation $attestation)
    {
        $rts= 'https://diplomesolution.com/'. $attestation->id;
        $qr_generated = QrCode::size(100)->generate($rts);
        return view('attestations.generate', compact('attestation', 'qr_generated'));
    }

    public function create()
    {
        //
    }

    public function show(Attestation $attestation)
    {
        return view('attestations.show', compact('attestation'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file')->store('attestations');
        }

        if($request->hasFile('image')) {
            $image = $request->file('image')->store('attestations');
        }

        Attestation::create([
            'student_name' =>$request->student_name,
            'file' => $file ?? "",
            'image' => $image ?? "",
        ]);

        return Redirect::route('attestations.index')->with('succes', 'L\'enregistrement de l\'attestion a été un succès');
    }

    public function edit(Attestation $attestation)
    {
        return view('attestations.edit', compact('attestation'));
    }

    public function update(Request $request, Attestation $attestation)
    {
        $file = $attestation->file;
        $image = $attestation->image;
        if($request->hasFile('file')) {
            Storage::delete($attestation->file);
            $file = $request->file('file')->store('attestations');
        }

        if($request->hasFile('image')) {
            Storage::delete($attestation->image);
            $image = $request->file('image')->store('attestations');
        }

        $attestation->update([
            'student_name' => $request->student_name,
            'file' => $file,
            'image' => $image,
        ]);

        return Redirect::route('attestations.index')->with('succes', 'La mise à jour de l\'attestation a été un succès');
    }

    public function destroy(Attestation $attestation)
    {
        Storage::delete([$attestation->file, $attestation->image]);
        $attestation->delete();

        return Redirect::route('attestations.index')->with('succes', 'La suppression de l\'attestation a été un succès');
    }
}
