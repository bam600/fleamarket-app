<?php
/** PG09住所変更画面controller */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Models\Profile;

class AddressController extends Controller
{  
    /**
     * 住所変更画面の表示
     */
    public function address($id)
    {
        $user = auth()->user();
        $profile = $user->profile;

        // セッションから取得（未設定ならプロフィールの値を初期値に）
        $postal_code = session('purchase_postal_code', $profile->postal_code ?? '');
        $address     = session('purchase_address', $profile->address ?? '');
        $building    = session('purchase_building', $profile->building ?? '');

        return view('mypage.address', [
            'profile'        => $profile,
            'postal_code'    => $postal_code,
            'address'        => $address,
            'building'       => $building,
            'exhibition_id'  => $id,
        ]);
    }

    /**
     * 住所変更の保存処理
     */
    public function change(AddressRequest $request, $id)
    {
        $profile = auth()->user()->profile;
        $profile->postal_code = $request->postal_code;
        $profile->address     = $request->address;
        $profile->building    = $request->building;
        $profile->save();

        // セッションにも反映（購入画面で表示するため）
        session([
            'purchase_postal_code' => $request->postal_code,
            'purchase_address'     => $request->address,
            'purchase_building'    => $request->building,
        ]);

        
    return redirect()->route('item.confirm', ['id' => $exhibition_id])
        ->with('success', '住所を更新しました');
    }

    /**
     * 管理者などによる住所情報の更新画面（ユーザーID指定）
     */
    public function update($id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();

        return view('mypage.address', [
            'profile'      => $profile,
            'postal_code'  => $profile->postal_code,
            'address'      => $profile->address,
            'building'     => $profile->building,
        ]);
    }
}
