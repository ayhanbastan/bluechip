<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Core\Services\KontakSevice;
use App\Http\Requests\KontakRequest;
use App\Models\CustomerDefination;
use App\Models\Kontat;

class ContactController extends Controller
{
    public function index()
    {
        $kontaks = Kontat::all();
        return view('kontak.index', compact('kontaks'));
    }

    public function create()
    {
        $companies = CustomerDefination::all();
        return view('kontak.create', compact('companies'));
    }

    public function post(KontakRequest $kontakRequest, KontakSevice $kontakSevice)
    {
        $inputData = $kontakRequest->toArray();
        $kontakSevice->create($inputData);
        return redirect()->intended('/kontak')->with('success', 'Kullanıcı Başarılı bir şekilde tanımladı!');
    }

    public function edit($id)
    {
        $kontak = Kontat::find($id);


        $companies  = CustomerDefination::all();
        $kontakName = CustomerDefination::query()->select("ad")->where("id", "=", $kontak->sirketId)->first();

        return view("kontak.edit", compact("kontak", "companies", "kontakName"));
    }

    public function update($id, KontakRequest $kontakRequest, KontakSevice $kontakSevice)
    {
        $inputData = $kontakRequest->toArray();
        $kontakSevice->update($id, $inputData);
        return redirect()->intended('/kontak')->with('success', 'Kullanıcı Başarılı bir şekilde düzenlendi!');
    }

    public function delete($id, KontakSevice $kontakSevice)
    {
        $kontakSevice->delete($id);
        return redirect()->intended('/kontak')->with('success', 'Kullanıcı Başarılı bir şekilde kaldırıldı!');
    }

}