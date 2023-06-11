<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Models\ContactLandingPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function indexLandingPage()
    {
        $contacts = ContactLandingPage::get();
        $kategori_mobil = KategoriMobil::get();

        return view('landing_page.contact', compact('contacts','kategori_mobil'));
    }

    public function index()
    {
        $contact = ContactLandingPage::get();
        $kategori_mobil = KategoriMobil::get();

        return view('admin.landingPage.contact.index', compact('contact','kategori_mobil'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_contact' => 'required',
            'description_contact' => 'required',
            'image_contact' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'slug_contact' => 'nullable',
        ]);

        // dd($request->all());

        $contacts = ContactLandingPage::create([
            'title_contact' => $request->title_contact,
            'description_contact' => $request->description_contact,
            'slug_contact' => $request->title_contact,
        ]);

        if ($request->hasFile('image_contact')) {
            if ($request->file('image_contact')->isValid()) {
                $contactPath = $request->file('image_contact')->store('contact', 'public');
                $contacts->image_contact = $contactPath;
                $contacts->save();
            } else {
                return back()->withErrors(['image_contact' => 'Failed to upload image.']);
            }
        }


        if ($contacts) {
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'title_contact' => 'required',
        'description_contact' => 'required',
        'image_contact' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'slug_contact' => 'nullable',
    ]);

    $contacts = ContactLandingPage::findOrFail($id);

    $contacts->update([
        'title_contact' => $request->title_contact,
        'description_contact' => $request->description_contact,
        'slug_contact' => $request->title_contact,
    ]);

    if ($request->hasFile('image_contact')) {
        $contactPath = $request->file('image_contact')->store('contact', 'public');
        $contacts->image_contact = $contactPath;
        $contacts->save();
    }

    if ($contacts) {
        return back()->with(['success' => 'Data Berhasil Diupdate!']);
    } else {
        return back()->with(['error' => 'Data Gagal Diupdate!']);
    }
}

public function destroy($id)
{
    $contacts = ContactLandingPage::findOrFail($id);

    // Hapus file gambar terkait
    if ($contacts->image_contact) {
        Storage::disk('public')->delete($contacts->image_contact);
    }

    if ($contacts->delete()) {
        return back()->with(['success' => 'Data Berhasil Dihapus!']);
    } else {
        return back()->with(['error' => 'Data Gagal Dihapus!']);
    }
}



}
