<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request)
    {
        // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // check if current password entered by admin is correct
            if(Hash::check($data['oldPassword'], Auth::guard('admin')->user()->password)){
                // check if new password is matching with confirm password
                if($data['confirmNewPassword']==$data['newPassword']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['newPassword'])]);
                    return redirect()->back()->with('success_message', 'Password berhasil diupdate');
                }else{
                    return redirect()->back()->with('error_message', 'Password yang anda masukan tidak sama!');
                }
            }else{
                return redirect()->back()->with('error_message', 'Password lama yang anda masukkan salah!');
            }
        }

        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if(Hash::check($data['oldPassword'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'adminName' => 'required|regex:/^[\pL\s\-]+$/u',
                'adminPhone' => 'required|numeric',
            ];

            $customMessages = [
                'adminName.required' => 'Kolom nama belum diisi!',
                'adminName.regex' => 'Nama tidak valid, kolom nama harus berisi huruf!',
                'adminPhone.required' => 'Kolom no handphone belum diisi!',
                'adminPhone.numeric' => 'No handphone tidak valid, kolom no handphone harus berisi angka!',
            ];

            $this->validate($request,$rules,$customMessages);

            // Upload admin photo
            if($request->hasFile('adminPhoto')){
                $image_tmp = $request->file('adminPhoto');
                if($image_tmp->isValid()){
                    // Get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/assets/images/photos/'.$imageName;
                    // Upload
                    Image::make($image_tmp)->save($imagePath);
                }
            }else if(!empty($data['oldImage'])){
                $imageName = $data['oldImage'];
            }else{
                $imageName = "";
            }

            // Update admin details
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['adminName'], 'phone' => $data['adminPhone'], 'image' => $imageName]);
            return redirect()->back()->with('success_message', 'Admin detail berhasil diupdate');
        }
        return view('admin.settings.update_admin_details');
    }

    public function updateSellerDetails($slug, Request $request)
    {
        if($slug == "personal"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                $rules = [
                    'sellerName' => 'required|regex:/^[\pL\s\-]+$/u',
                    'sellerCity' => 'required|regex:/^[\pL\s\-]+$/u',
                    'sellerState' => 'required|regex:/^[\pL\s\-]+$/u',
                    'sellerCountry' => 'required|regex:/^[\pL\s\-]+$/u',
                    'sellerPinCode' => 'required|numeric',
                    'sellerPhone' => 'required|numeric',
                ];

                $customMessages = [
                    'sellerName.required' => 'Kolom nama belum diisi!',
                    'sellerCity.required' => 'Kolom kota belum diisi!',
                    'sellerState.required' => 'Kolom provinsi belum diisi!',
                    'sellerCountry.required' => 'Kolom negara belum diisi!',
                    'sellerName.regex' => 'Nama tidak valid, kolom nama harus berisi huruf!',
                    'sellerCity.regex' => 'Nama tidak valid, kolom kota harus berisi huruf!',
                    'sellerState.regex' => 'Nama tidak valid, kolom provinsi harus berisi huruf!',
                    'sellerCountry.regex' => 'Nama tidak valid, kolom negara harus berisi huruf!',
                    'sellerPhone.required' => 'Kolom no handphone belum diisi!',
                    'sellerPinCode.required' => 'Kolom kode pos belum diisi!',
                    'sellerPhone.numeric' => 'No handphone tidak valid, kolom no handphone harus berisi angka!',
                    'sellerPinCode.numeric' => 'Kode pos tidak valid, kolom kode pos harus berisi angka!',
                ];

                $this->validate($request,$rules,$customMessages);

                // Upload admin photo
                if($request->hasFile('sellerPhoto')){
                    $image_tmp = $request->file('sellerPhoto');
                    if($image_tmp->isValid()){
                        // Get extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Generate name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/assets/images/photos/'.$imageName;
                        // Upload
                        Image::make($image_tmp)->save($imagePath);
                    }
                }else if(!empty($data['oldSellerImage'])){
                    $imageName = $data['oldSellerImage'];
                }else{
                    $imageName = "";
                }

                // Update in admin details
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'name' => $data['sellerName'],
                    'phone' => $data['sellerPhone'],
                    'image' => $imageName,
                ]);

                // Update in seller details
                Seller::where('id', Auth::guard('admin')->user()->seller_id)->update([
                    'name' => $data['sellerName'],
                    'address' => $data['sellerAddress'],
                    'city' => $data['sellerCity'],
                    'state' => $data['sellerState'],
                    'country' => $data['sellerCountry'],
                    'pincode' => $data['sellerPinCode'],
                    'phone' => $data['sellerPhone'],
                ]);

                return redirect()->back()->with('success_message', 'Detail Penjual berhasil diupdate');
            }
            $sellerDetails = Seller::where('id', Auth::guard('admin')->user()->seller_id)->first()->toArray();

        }else if($slug == "business"){

        }else if($slug == "bank"){

        }

        return view('admin.settings.update_seller_details')->with(compact('slug', 'sellerDetails'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";
            // print_r($data); die;
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                // custom messages
                'email.required' => 'Email belum diisi!',
                'email.email' => 'Email tidak valid!',
                'password.required' => 'Password belum diisi!'
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message', 'Email dan Password tidak ditemukan!');
            }
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/logout');
    }
}
