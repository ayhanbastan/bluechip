<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Core\Services\CustomerDefinitionService;
use App\Http\Requests\NewCustomerDefinitionRequest;
use App\Models\CustomerDefination;

class CustomerDefinitionController extends Controller
{
    public function index()
    {
        $customerDefinitions = CustomerDefination::all();
        return view('customer.index', compact('customerDefinitions'));
    }

    public function create()
    {

        return view('customer.create');
    }

    public function post(NewCustomerDefinitionRequest $newCustomerDefinitionRequest, CustomerDefinitionService $customerDefinitionService
    ) {
        $inputData = $newCustomerDefinitionRequest->toArray();
        $customerDefinitionService->create($inputData);
        return redirect()->intended('/musteri-tanımlama')->with('success', 'Müşteri Başarılı bir şekilde tanımladı!');
    }

    public function edit($id)
    {
        $customerDefinitions = CustomerDefination::find($id);
        return view('customer.edit', compact('customerDefinitions'));
    }

    public function update($id, NewCustomerDefinitionRequest $newCustomerDefinitionRequest, CustomerDefinitionService $customerDefinitionService)
    {
        $inputData = $newCustomerDefinitionRequest->toArray();
        $customerDefinitionService->update($id,$inputData);
        return redirect()->intended('/musteri-tanımlama')->with('success', 'Müşteri Başarılı bir şekilde güncellendi!');
    }

    public function delete($id, CustomerDefinitionService $customerDefinitionService)
    {
        $customerDefinitionService->delete($id);
        return redirect()->intended('/musteri-tanımlama')->with('success', 'Müşteri Başarılı bir şekilde silindi!');
    }
}