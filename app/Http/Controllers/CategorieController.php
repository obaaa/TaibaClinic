<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Categorie;

class CategorieController extends Controller {


//index---------------------------------product_categories
    public function index(){
      $categories = Categorie::all();
      return view('categorie')->withCategories($categories);
    }

//store---------------------------------categorie_name
    public function store(Request $request)
    {
      $categorie_name = $request->input('categorie_name');

      $new_categorie = new Categorie;
      $new_categorie->categorie_name = $request->categorie_name;

      $new_categorie->save();

      return redirect('categorie');
    }
//destroy---------------------------------categories
    public function destroy($id)
    {
      $categorie = Categorie::find($id)->delete();
      return back();
    }

}
