<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ArtistList;
use App\Models\MusicianList;

class UserController extends Controller
{

    public function signup()
    {
        return view('user.sign_up');
    }

    public function user_submit(Request $request)
    {
        $post['full_name'] = $request['full_name'];
        $post['phone_number'] = $request['phone_number'];
        $post['gender'] = $request['gender'];
        $post['email'] = $request['email'];
        $post['password'] = Hash::make($request['password']);
        $inser_id = user::create($post);
        $post['id'] = $inser_id->id;
        $request->session()->put('userdata', $post);
        return redirect('artist_type')->with('status', 'Profile updated!');
    }

    public function artist_type()
    {
        if (session()->exists('userdata')) {
            $ArtistList = ArtistList::take(5)->get()->toArray();
            return view('user.artist_type', ['ArtistList' => $ArtistList]);
        } else {
            return redirect('');
        }
    }

    public function get_artist(Request $request)
    {
        $ArtistList = ArtistList::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        if (!empty($ArtistList)) {
            foreach ($ArtistList as $artist) {
                $data .= '<a href="javascript:void(0);" class="artist--type select' . $artist['id'] . '" data-name="' . $artist['name'] . '" data-id="' . $artist['id'] . '">
                <span>' . $artist['name'] . '</span>
            </a>';
            }
        } else {
            $data .= 'Not Found !';
        }
        return $data;
    }

    public function artist_submit(Request $request)
    {
        if (!empty($request->artist_seleted)) {
            $artist_type = implode(',', $request->artist_seleted);
            $id = session('userdata')['id'];
            user::where('id', $id)->update(['artist_type' => $artist_type]);
            if (in_array('2', $request->artist_seleted)) {
                return redirect('musician_type');
            } else {
                Session::flush();
            return redirect('')->with('success', 'Thank you, your registeration process is successful. We will contact you soon.');
                // return redirect('dashboard');
            }
        } else {
            return redirect('artist_type')->with('error', 'You have not selected any type of Artist.');
        }
    }

    public function musician_type()
    {
        if (session()->exists('userdata')) {
            $MusicianList = MusicianList::take(4)->get()->toArray();
            return view('user.musician_type', ['MusicianList' => $MusicianList]);
        } else {
            return redirect('');
        }
    }

    public function get_music(Request $request)
    {
        $MusicianList = MusicianList::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        if (!empty($MusicianList)) {
            foreach ($MusicianList as $music) {
                $data .= '<a href="javascript:void(0);" class="artist--type select' . $music['id'] . '" data-name="' . $music['name'] . '" data-id="' . $music['id'] . '">
                <span>' . $music['name'] . '</span>
            </a>';
            }
        } else {
            $data .= 'Not Found !';
        }
        return $data;
    }

    public function music_submit(Request $request)
    {
        if (!empty($request->music_seleted)) {
            $music_type = implode(',', $request->music_seleted);
            $id = session('userdata')['id'];
            user::where('id', $id)->update(['music_list' => $music_type]);
            // return redirect('dashboard');
            Session::flush();
            return redirect('')->with('success', 'Thank you, your registeration process is successful. We will contact you soon.');
        } else {
            return redirect('musician_type')->with('error', 'You have not selected any type of music.');
        }
    }

    public function dashboard()
    {
        return "Continue...";
    }
    public function thankyou()
    {
        return view('user.thankyou');
    }
}
