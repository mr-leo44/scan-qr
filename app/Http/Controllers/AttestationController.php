<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Attestation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttestationController extends Controller
{
    public function index()
    {
        $attestations = Attestation::latest()->get();
        foreach ($attestations as $key => $attestation) {
            $rts = route('attestations.show',$attestation->student_name);
            $qr_generated = QrCode::size(100)->generate($rts);
            $qr_code = html_entity_decode($qr_generated);
            $attestation['qr_code'] = $qr_code;
            $attestation['pdf_link'] = route('attestations.generatePDF', $attestation->student_name);
        }
        return view('attestations.index', compact('attestations'));
    }

    public function create()
    {
        //
    }

    public function show(Attestation $attestation)
    {
        return view('attestations.show', compact('attestation'));
    }
    public function generatePDF(Request $request, Attestation $attestation)
    {
        $rts = route('attestations.show',$attestation->student_name);
        $qr_generated = QrCode::size(200)->generate($rts);
        $qr_code = base64_encode($qr_generated);
        $html = view('pdf.generate', compact('attestation', 'qr_code'))->render();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $domPdf = new Dompdf($options);
        $domPdf->loadHtml($html);
        $domPdf->setPaper('A4', 'portrait');
        $domPdf->render();
        return response()->streamDownload(function() use ($domPdf) {
            echo $domPdf->output();
        },"$attestation->student_name.pdf", ['Content-Type' => 'application/pdf']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => ['required','string','min:5','unique:'.Attestation::class],
            'file' => ['file','mimes:pdf', 'max:2048'],
            'image' => ['file','mimes:jpg,png,jpeg','max:2048']
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('attestations/pdf');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('attestations/images');
        }

        Attestation::create([
            'student_name' => $request->student_name,
            'file' => $file ?? "",
            'image' => $image ?? "",
        ]);

        return Redirect::route('attestations.index')->with('success', 'L\'enregistrement de l\'attestion a été un succès');
    }

    public function edit(Attestation $attestation)
    {
        //
    }

    public function update(Request $request, Attestation $attestation)
    {
        $request->validate([
            'student_name' => ['required','string','min:5','unique:'.Attestation::class],
            'file' => ['file','mimes:pdf', 'max:2048'],
            'image' => ['file','mimes:jpg,png,jpeg','max:2048']
        ]);

        $file = $attestation->file;
        $image = $attestation->image;
        if ($request->hasFile('file')) {
            Storage::delete($attestation->file);
            $file = $request->file('file')->store('attestations/pdf');
        }

        if ($request->hasFile('image')) {
            Storage::delete($attestation->image);
            $image = $request->file('image')->store('attestations/images');
        }

        $attestation->update([
            'student_name' => $request->student_name,
            'file' => $file,
            'image' => $image,
        ]);

        return Redirect::route('attestations.index')->with('success', 'La mise à jour de l\'attestation a été un succès');
    }

    public function destroy(Attestation $attestation)
    {
        Storage::delete([$attestation->file, $attestation->image]);
        $attestation->delete();

        return Redirect::route('attestations.index')->with('success', 'La suppression de l\'attestation a été un succès');
    }
}
