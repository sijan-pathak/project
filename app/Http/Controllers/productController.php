<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use hash;
use session;
use App\Models\User;
use App\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class productController extends Controller{
        public function list(){
        
            $crud = product::all();
            return view('welcome',compact('crud'));     
        }

        public function insert(){
            return view('add');
        }

        public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required |max:20 |min:4',
            'city'=> 'required',
            'marks'=> 'required',
            'image'=> 'image| mimes:jpg, png, jpeg'
        ]);
                
            $product=new product; //product vanne class(model) ko object(instance) banako
            $product->name=$request->input('name');
            $product->city=$request->input('city');
            $product->marks=$request->input('marks');
            if($request->hasfile('image'))
            {
                $file=$request->file('image');
                $extension= $file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('images/',$filename);
                $product->image=$filename;

            }
            $product->save();
            return redirect('welcome');
    }    
        public function destroy($id){

            $crud=product::find($id);
            $crud->delete();
            if($crud->image){
                File::delete(public_path("images/{$crud->image}"));
            }
            
        
            return redirect('welcome');

        }
        public function edit(product $data,$id){
            return view('edit')->with('crud',product::find($id));
        }
        public function update(Request $request,$id){
            $validated = $request->validate([
                'name'=> 'required |max:20 |min:4',
                'city'=> 'required',
                'marks'=> 'required',
                'image'=> 'image| mimes:jpg, png, jpeg'
            ]);
            $product= product::find($id);
            $product->name = $request->input('name');
            $product->city = $request->input('city');
            $product->marks = $request->input('marks');
        
            if($request->hasfile('image'))
            {
                $destination = 'images/'.$product->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file=$request->file('image');
                $extension= $file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('images/',$filename);
                $product->image=$filename;

            }
            $product->save();
            return redirect('welcome');

        }
        public function show(){
            return view('send_email');
        }
    public function send(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'meessage' => 'required'
        ]);
        
    }

    public function showPage(){
        $country = DB::table('country')->get();
        $city = DB::table('city')->get();
        return view('dynamic-dropdown',compact('country','city'));
    }
    public function getCity(Request $request){
    $conn_id=$request->post('c_id');
    $city = DB::table('city')->where('c_id',$conn_id)->get();
    $html = '<option value="">Select city</option>';
    foreach($city as $list){
        $html.= '<option value="'.$list->s_id.'">'.$list->s_name.'</option>';
    }
    echo $html;
    }

    public function getState(Request $request){
        $st_id=$request->post('s_id');
        $state = DB::table('state')->where('s_id',$st_id)->get();
        $html = '<option value="">Select city</option>';
          foreach($state as $list)
        {
           $html.= '<option value="'.$list->state_id.'">'.$list->state_name.'</option>';
        }
        echo $html;
    }
   public function getWard(Request $request){
       $war = $request->post('state_id');
       $ward = DB::table('ward')->where('state_id',$war)->get();
       $html = '<option value=">select ward</option>';
       foreach($ward as $list){
           $html.='<option value="'.$list->w_id.'">'.$list->name.'</option>';
       }
       echo $html;
   }
}