<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Core\Services\BriefService;
use App\Http\Requests\BriefFormRequest;
use App\Models\Brief;
use App\Models\CustomerDefination;
use App\Models\Departman;
use App\Models\Referans;

class BriefController extends Controller
{
    public function index()
    {
        $briefs = Brief::with([ 'customers', 'referance' ])->get();
        return view('brief.index', compact('briefs'));
    }

    public function create()
    {
        $customers  = CustomerDefination::all();
        $departmans = Departman::all();
        return view('brief.create', compact('customers', 'departmans'));
    }

    public function post(BriefFormRequest $briefFormRequest, BriefService $briefService)
    {
        $inputData = $briefFormRequest->toArray();
        $briefService->create($inputData);
        return redirect()->intended('/brief')->with('success', 'Brief Başarılı bir şekilde tanımladı!');

    }

    public function edit($id)
    {
        $brief      = Brief::query()->with([ 'customers', 'departmans' ])->find($id);
        $customers  = CustomerDefination::all();
        $briefId    = $brief->customers->id;
        $referans   = Referans::query()->select('id', 'referansAd')->where('musteriId', '=', $briefId)->first();
        $departmans = Departman::all();

        return view('brief.edit', compact('brief', 'customers', 'referans', 'departmans'));
    }

    public function show($id)
    {
        $brief    = Brief::query()->with([ 'customers', 'departmans' ])->find($id);
        $briefId  = $brief->customers->id;
        $referans = Referans::query()->select('id', 'referansAd')->where('musteriId', '=', $briefId)->first();
        return view('brief.show', compact('brief', 'briefId', 'referans'));
    }

    public function update($id, BriefFormRequest $briefFormRequest, BriefService $briefService)
    {
        $inputData = $briefFormRequest->toArray();
        $briefService->update($id, $inputData);
        return redirect()->intended('/brief')->with('success', 'Brief Başarılı bir şekilde güncellendi!');
    }

    public function delete($id, BriefService $briefService)
    {
        $briefService->delete($id);
        return redirect()->intended('/brief')->with('success', 'Brief Başarılı bir şekilde silindi!');
    }

}