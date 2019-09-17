<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Core\Services\UserService;
use App\Http\Requests\UserFormRequest;
use App\Model\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('kullanicilar.index', compact('users'));
    }

    public function create()
    {
        $yetki = [
            [
                "id"       => 1,
                "pozisyon" => "Yönetici",
            ],
            [
                "id"       => 2,
                "pozisyon" => "Departman Lideri",
            ],
            [
                "id"       => 3,
                "pozisyon" => "Kullanıcı",
            ]
        ];


        return view('kullanicilar.create', compact('yetki'));
    }

    public function post(UserFormRequest $userFormRequest, UserService $userService)
    {
        $inputData = $userFormRequest->toArray();
        $userService->create($inputData);
        return redirect()->intended('/kullanicilar')->with('success', 'Kullanıcı Başarılı bir şekilde tanımladı!');

    }

    public function edit($id)
    {
        $yetki        = [
            [
                "id"       => 1,
                "pozisyon" => "Yönetici",
            ],
            [
                "id"       => 2,
                "pozisyon" => "Departman Lideri",
            ],
            [
                "id"       => 3,
                "pozisyon" => "Kullanıcı",
            ]
        ];
        $user         = User::find($id);
        $userPozisyon = $user->pozisyon;
        $yetkiBul     = [];
        foreach ($yetki as $value) {
            if ($userPozisyon == $value[ "id" ]) {
                $yetkiBul = $value[ "pozisyon" ];
            }
        }

        return view('kullanicilar.edit', compact('user', 'yetkiBul', 'yetki', 'userPozisyon'));
    }

    public function update($id, UserFormRequest $userFormRequest, UserService $userService)
    {
        $inputData = $userFormRequest->toArray();
        $userService->update($id, $inputData);
        return redirect()->intended('/kullanicilar')->with('success', 'Kullanıcı Başarılı bir şekilde güncellendi!');

    }

    public function delete($id, UserService $userService)
    {
        $userService->delete($id);
        return redirect()->intended('/kullanicilar')->with('success', 'Kullanıcı Başarılı bir şekilde silindi!');
    }
}