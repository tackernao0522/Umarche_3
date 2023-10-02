<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Shop;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('shop'); // shopのid取得
            // null判定
            if (!is_null($id)) {
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int) $shopsOwnerId; // キャスト 文字列->数値いに型変換
                $ownerId = Auth::id();
                if ($shopId !== $ownerId) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }

    public function index()
    {
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));
    }

    public function update(UploadImageRequest $request, $id)
    {
        Shop::findOrFail($id);

        $imageFile = $request->image;

        // もしからでなかったら及びアップロードできたら
        if (!is_null($imageFile) && $imageFile->isValid()) {
            ImageService::upload($imageFile, 'shops');
        }

        return redirect()->route('owner.shops.index')->with([
            'message' => '画像が登録されました。',
            'status' => 'info',
        ]);
    }
}
