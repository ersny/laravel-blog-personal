<?php

namespace App\Http\Controllers\Back;
use App\Models\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class ConfigController extends Controller
{
	public function index(){
		$config =Config::find(1);
		return view('back.config.index',compact('config'));
	}

	public function update(Request $request){
		$config=Config::find(1);
		$config->title=$request->title;
		$config->active=$request->active;
		$config->twitter=$request->twitter;
		$config->linkedin=$request->linkedin;
		$config->instagram=$request->instagram;
		$config->github=$request->github;


		if ($request->hasFile('logo'))  { // Logo gelmişse işlem yapılıyor 
			$logo=str_slug($request->title).'-logo.'.$request->logo->getClientOriginalExtension();
			$request->logo->move(public_path('uploads'),$logo);
			$config->logo='uploads/'.$logo;
		}
		

		if ($request->hasFile('favicon'))  { // Logo gelmişse işlem yapılıyor 
			$favicon=str_slug($request->title).'-favicon.'.$request->favicon->getClientOriginalExtension();
			$request->favicon->move(public_path('uploads'),$favicon);
			$config->favicon='uploads/'.$favicon;
		}
		$config->save(); //yeni veriyle güncelliyorum.
		toastr()->success('Ayarlar başarıyla güncellendi');
		return redirect()->back();
	}



}
