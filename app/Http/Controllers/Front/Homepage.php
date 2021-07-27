<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Mail;
use Validator;

//Models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;

class Homepage extends Controller
{

// Tüm fonksiyonlarda çalışmasını istediğim fonksiyon
	public function __construct(){
		if(Config::find(1)->active==0){
			return redirect()->to('site-bakimda')->send();
			
		}

		view()->share('pages',Page::where('status',1)->orderby('order','ASC')->get());
		view()->share('categories',Category::where('status',1)->inRandomOrder()->get());
	}


	
	public function index()
	{
		$data['articles']=Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
			$query->where('status',1);
			})->orderBy('created_at','DESC')->paginate(10); //Codeigniter tarzı $data icerisine yazdıgımız veriyi değişken gibi alıp article modeliyle göndermesi
		return view('front.homepage',$data);
		
	}

	public function single($category,$slug){
		$article=Article::where('slug',$slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı'); // Eğer model articleda bulursa bunu bir değişkene ata bulamazsa 403 sayfasına yönlendirsin ve bu yazıyı yazdırsın 
		$article->increment('hit');
		$data['article']=$article;
		$data['categories']=Category::inRandomOrder()->get();
		return view('front.single',$data);

	}

	public function category($slug){
		$category=Category::where('slug',$slug)->first() ?? abort(403,'Böyle bir kategori bulunamadı');
		$data['category']=$category;
		$data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at','DESC')->paginate(1);
		return view('front.category',$data);
	}

	public function page($slug){
		$page=Page::whereSlug($slug)->first() ?? abort(403,'Böyle bir sayfa bulunamadı.');
		$data['page']=$page;
		return view('front.page',$data);
		
	}

	public function contact(){
		return view('front.contact');

	}

	public function contactpost(Request $request){

		$rules=[
			'name'=>'required|min:5',
			'email'=>'required|email',
			'konu'=>'required',
			'mesaj'=>'required|min:10'
		];

		$validate= Validator::make($request->post(),$rules);

		if($validate->fails()){
			return redirect()->route('contact')->withErrors($validate)->withInput();
		}

		Mail::send([],[], function($message) use($request){
			$message->from('iletisim@blogsitesi.com','Blog Sitesi');
			$message->to('ersnybusiness@gmail.com');
			$message->setBody(' Mesajı Gönderen :'.$request->name.'<br />
				Mesajı Gönderen Mail :'.$request->email.'<br />
				Mesajı Gönderen Website :'.$request->website.'<br />
				Mesaj Konusu : '.$request->konu.'<br />
				Mesaj : '.$request->mesaj.'<br /> <br />
				Mesaj Gönderilme Tarihi: '.now().'','text/html');
			$message->subject($request->name. ' iletişimden mesaj gönderdi!');

		});

		// $contact = new Contact;
		// $contact->name=$request->name;
		// $contact->email=$request->email;
		// $contact->konu=$request->konu;
		// $contact->mesaj=$request->mesaj;
		// $contact->save();

		return redirect()->route('contact')->with('success','Mesajınız iletildi, teşekkürler!.');



	}


}
