<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        // $items = Item
        //     ::where('items.status', 'active')
        //     ->select()
        //     ->get();

        // ユーザー一覧をページネートで取得
        $items = item::paginate(8);
               // 検索フォームで入力された値を取得する
        $search = $request->input('search');
           // クエリビルダ
        $query = item::query();
           // もし検索フォームにキーワードが入力されたら
        if ($search) {
               // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
               // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
               // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }
           // 上記で取得した$queryをページネートにし、変数$usersに代入
            $items = $query->paginate(8);
        }
        
        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'price' => 'required|max:11',
                'quantity' => 'required|max:11',
                'detail' => 'nullable|max:500',
                'type' => 'required',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' =>$request->quantity,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    // //商品一覧検索
    // public function showList(Request $request){
    
    //     // ユーザー一覧をページネートで取得
    //     $items = item::paginate(20);
    //            // 検索フォームで入力された値を取得する
    //     $search = $request->input('search');
    //        // クエリビルダ
    //     $query = item::query();
    //        // もし検索フォームにキーワードが入力されたら
    //     if ($search) {
    //            // 全角スペースを半角に変換
    //         $spaceConversion = mb_convert_kana($search, 's');
    //            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
    //         $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
    //            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
    //         foreach($wordArraySearched as $value) {
    //             $query->where('name', 'like', '%'.$value.'%');
    //         }
    //        // 上記で取得した$queryをページネートにし、変数$usersに代入
    //         $items = $query->paginate(20);
    //        }
    //        return view('item.index', compact('items'));
 
    // }
}