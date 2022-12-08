<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemUpdateController extends Controller
{
   // //画面表示
   // public function item_update(){
   // return view('item.item_update');
   // }

   public function item_update($id)
   {
        // レコードをidで指定
      $data = Item::find($id);
        // viewに連想配列で返す
      return view('item.item_update',[
            'id' => $data->id,
            'name' => $data->name,
            'price' => $data->price,
            'quantity' => $data->quantity,
            'type' => $data->type,
            'detail' => $data->detail,
      ]);
   }


   // 登録の更新処理
   public function update(Request $request, $id)
   {
      $this->validate($request, [
         //'id' => 'required|max:100',
         'name' => 'required|max:100',
         'price' => 'required|max:100',
         'quantity' => 'required|max:100',
         'detail' => 'nullable|max:150',
         'type' => 'required',
      ]);
      $item = Item::find($id);
      //$item ->user_id = $request->input('user_id');
      $item ->name = $request->input('name');
      $item ->price = $request->input('price');
      $item ->quantity = $request->input('quantity');
      $item ->detail = $request->input('detail');
      $item ->type = $request->input('type');
      $item->save();
      return redirect('/items');
   }

   // 登録の削除処理
   public function destroy(Request $request,$id)
   {
      $item = Item::find($id);
      $item->delete();
      return redirect('/items');
   }
}