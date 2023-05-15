<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ArtistList;
use App\Models\ArtistSubcategory;
use App\Models\UserProfiles;
use App\Models\ContactAs;
use App\Models\MusicianList;
use App\Models\UserReferral;
use App\Models\Genres;
use App\Models\Venue;
use App\Models\UserMedia;
use App\Models\OrignalSong;
use App\Models\Address;
use App\Models\BankDetail;
use App\Models\ServiceAgreement;
use App\Models\Bank;
use App\Models\Instruments;
use App\Models\SelectIntrument;
use App\Models\Budget;
use App\Models\SelecteSubcategories;
use App\Models\City;
use App\Models\CityPrice;
use App\Models\Products;
use App\Models\RequestBookings;
use App\Models\EventType;
use App\Models\Events;
use App\Models\ManagerDetail;
use App\Models\Languages;

class ArtistController extends Controller
{

    public function referral_code()
    {
        return view('artist.referral_code');
    }

    public function referral_code_submit(Request $request)
    {
        $request_by = session('userdata')['id'];
        $referral_code = $request['referral_code'];
        $requestTO = User::where('referral_code', $referral_code)->first();

        if (!empty($requestTO)) {
            $request_to = $requestTO->id;
            $update = UserReferral::where(['request_by' => $request_by, 'request_to' => $request_to, 'status' => '1'])->update(['referral_code' => $referral_code]);

            if ($update) {
                return redirect('artist_type');
                User::where('id', $request_by)->update(['end_page' => 'artist_type']);
            } else {
                return back()->with('error', 'Referral Code Not accept.');
            }
        } else {
            return back()->with('error', 'Incorrect Referral Code.');
        }
    }

    public function artist_list()
    {
        $request_by = session('userdata')['id'];
        $artists = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id')
            ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id')
            ->where('tbl_user_media.type', '0')
            ->where('tbl_users.role', '=', 'Artist')
            ->where('tbl_users.status', '=', '1')
            ->get()->toArray();
        $data_array = [];
        foreach ($artists as &$artist) {
            $UserReferral = UserReferral::where('request_to', $artist['id'])->where('request_by', $request_by)->first();
            $count_artist = UserReferral::where('request_to', $artist['id'])->where('request_by','!=', $request_by)->Where('request_to','!=', '1')->whereBetween('created_at', [date('Y-m-d', strtotime('-30 days'))." 00:00:00", date('Y-m-d')." 23:59:59"])->get()->toArray();
            if (count($count_artist) > 2) {
                continue;
            }

            if (!empty($UserReferral)) {
                $artist['request_to'] = $UserReferral['request_to'];
                $artist['refer_status'] = $UserReferral['status'];
            } else {
                $artist['request_to'] = "";
                $artist['refer_status'] = "";
            }
            $data_array[] = $artist;
        }
        $request_by_status = UserReferral::where('request_by', $request_by)->first();
        if (!empty($request_by_status)) {
            $data['request_by_status'] = '1';
        } else {
            $data['request_by_status'] = '0';
        }
        $data['artists'] = $data_array;
        return view('artist.artist_list', $data);
    }

    public function SerachArtist(Request $request)
    {
        $request_by = session('userdata')['id'];
        if (!empty($request['search'])) {
            $artists = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
                ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id')
                ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id')
                ->where('tbl_user_media.type', '0')
                ->where('tbl_users.role', '=', 'Artist')
                ->where('tbl_users.status', '=', '1')
                ->where('tbl_users.username', 'like', '%' . $request['search'] . '%')
                // ->toSql();
                // print_r($artists);die;
                ->get()->toArray();
        } else {
            $artists = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
                ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id')
                ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id')
                ->where('tbl_user_media.type', '0')
                ->where('tbl_users.role', '=', 'Artist')
                ->where('tbl_users.status', '=', '1')
                // ->toSql();
                // print_r($artists);die;
                ->get()->toArray();
        }
        $data_array = [];
        foreach ($artists as &$artist) {
            $UserReferral = UserReferral::where('request_to', $artist['id'])->where('request_by', $request_by)->first();
            $count_artist = UserReferral::where('request_to', $artist['id'])->get()->toArray();
            if (count($count_artist) >= 2) {
                continue;
            }

            if (!empty($UserReferral)) {
                $artist['request_to'] = $UserReferral['request_to'];
                $artist['refer_status'] = $UserReferral['status'];
            } else {
                $artist['request_to'] = "";
                $artist['refer_status'] = "";
            }
            $data_array[] = $artist;
        }
        $request_by_status = UserReferral::where('request_by', $request_by)->first();
        if (!empty($request_by_status)) {
            $data['request_by_status'] = '1';
        } else {
            $data['request_by_status'] = '0';
        }
        $data['artists'] = $data_array;

        $returnHTML = view('artist.filter_artist_list', $data)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
        // return view('artist.filter_artist_list', $data)->render();
    }

    public function send_request_artist(Request $request)
    {
        $post['request_by'] = session('userdata')['id'];
        $post['request_to'] = $request['request_to'];
        $post['status'] = '0';
        $insert = UserReferral::create($post);
        if (!empty($insert)) {
            return response()->json(['error' => false, 'message' => 'Request Send Successfully', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something wants wrong!', 'data' => NULL]);
        }
    }

    public function artist_type()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $ArtistList = ArtistList::take(5)->get()->toArray();
            $UserProfiles = UserProfiles::where('user_id', $id)->first();
            return view('artist.artist_type', ['ArtistList' => $ArtistList, 'UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function get_artist(Request $request)
    {
        $ArtistList = ArtistList::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        $UserProfiles = UserProfiles::where('user_id', session('userdata')['id'])->first();
        if (!empty($ArtistList)) {
            foreach ($ArtistList as $artist) {
                if (empty($UserProfiles->artists_type_id)) {
                    $selected = 'unselect';
                } else {
                    if ($UserProfiles->artists_type_id == $artist['id']) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }
                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $artist['id'] . '" data-name="' . $artist['name'] . '" data-id="' . $artist['id'] . '">
                <span>' . $artist['name'] . '</span>
            </a>';
            }
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function artist_submit(Request $request)
    {
        if (!empty($request->artist_seleted)) {
            $id = session('userdata')['id'];
            $getprofile = UserProfiles::where('user_id', $id)->first();
            if (!empty($getprofile)) {
                UserProfiles::where('user_id', $id)->update(['artists_type_id' => $request->artist_seleted, 'artist_name' => $request->artist_name]);
            } else {
                UserProfiles::create(['user_id' => $id, 'artists_type_id' => $request->artist_seleted, 'artist_name' => $request->artist_name]);
            }
            if ($request->artist_seleted == "2") {
                User::where('id', $id)->update(['end_page' => 'musician_type']);
                return redirect('musician_type');
            } elseif ($request->artist_seleted == "1") {
                User::where('id', $id)->update(['end_page' => 'vocalist_type']);
                return redirect('vocalist_type');
            } else {
                User::where('id', $id)->update(['end_page' => 'genres']);
                return redirect('genres');
            }
        } else {
            return redirect('artist_type')->with('error', 'You have not selected any type of Artist.');
        }
    }

    public function musician_type()
    {
        if (session()->exists('userdata')) {
            $MusicianList = ArtistSubcategory::where('artists_type_id', '2')->take(4)->get()->toArray();
            $id = session('userdata')['id'];
            $UserProfiles = UserProfiles::where('user_id', $id)->where('artists_type_id', '2')->first();
            return view('artist.musician_type', ['MusicianList' => $MusicianList, 'UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function vocalist_type()
    {
        if (session()->exists('userdata')) {
            $data['ArtistSubcategory'] = ArtistSubcategory::where('artists_type_id', '1')->get()->toArray();
            $SelecteSubcategories = SelecteSubcategories::where('user_id', session('userdata')['id'])->get()->toArray();
            $data_array = [];
            foreach ($SelecteSubcategories as $selected_subcategory) {
                $data_array[] = $selected_subcategory['subcategory_id'];
            }
            $data['SelecteSubcategories'] = $data_array;
            return view('artist.vocalist_type', $data);
        } else {
            return redirect('');
        }
    }

    public function get_music(Request $request)
    {
        $MusicianList = ArtistSubcategory::where('artists_type_id', '2')->where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        $UserProfiles = UserProfiles::where('user_id', session('userdata')['id'])->first();
        if (!empty($MusicianList)) {
            foreach ($MusicianList as $music) {
                if (empty($UserProfiles->subcategory_id)) {
                    $selected = 'unselect';
                } else {
                    $dataid = explode(',', $UserProfiles->subcategory_id);
                    if (in_array($music['id'], $dataid)) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }
                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $music['id'] . '" data-name="' . $music['name'] . '" data-id="' . $music['id'] . '">
                <span>' . $music['name'] . '</span>
            </a>';
            }
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function get_vocalist(Request $request)
    {
        $ArtistSubcategory = ArtistSubcategory::where('artists_type_id', '1')->where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        $UserProfiles = SelecteSubcategories::where('user_id', session('userdata')['id'])->get()->toArray();
        $data_array = [];
        foreach ($UserProfiles as $selected_subcategory) {
            $data_array[] = $selected_subcategory['subcategory_id'];
        }
        if (!empty($ArtistSubcategory)) {
            foreach ($ArtistSubcategory as $Subcategory) {
                if (empty($data_array)) {
                    $selected = 'unselect';
                } else {
                    if (in_array($Subcategory['id'], $data_array)) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }
                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $Subcategory['id'] . '" data-name="' . $Subcategory['name'] . '" data-id="' . $Subcategory['id'] . '">
                <span>' . $Subcategory['name'] . '</span>
            </a>';
            }
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function set_vocalist(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['user_id'] = $user_id;
        $Subcategories_ids = $request['vocalist_seleted'];
        SelecteSubcategories::where('user_id', $user_id)->delete();

        $subcategory_id = implode(',', $request['vocalist_seleted']);
        $sub_category_names = ArtistSubcategory::whereIn('id', $request['vocalist_seleted'])->get()->toArray();
        $name_array = [];
        foreach ($sub_category_names as $name) {
            $name_array[] = $name['name'];
        }
        $subcategory_name = implode(',', $name_array);
        UserProfiles::where('user_id', $user_id)->update(['subcategory_id' => $subcategory_id, 'subcategory_name' => $subcategory_name]);
        foreach ($Subcategories_ids as $Subcategories_id) {
            $post['subcategory_id'] = $Subcategories_id;
            SelecteSubcategories::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Set Instruments Successfully.', 'data' => NULL]);
    }

    public function remove_vocalist(Request $request)
    {
        $user_id = session('userdata')['id'];
        $id = $request['id'];
        SelecteSubcategories::where(['subcategory_id' => $id, 'user_id' => $user_id])->delete();
        echo "success";
    }

    public function get_selected_vocalist()
    {
        $user_id = session('userdata')['id'];
        $data = SelecteSubcategories::where('user_id', $user_id)->get();
        if (!empty($data)) {
            $count = count($data);
        } else {
            $count = 0;
        }
        echo $count;
    }

    public function music_submit(Request $request)
    {
        if (!empty($request->music_seleted)) {
            $id = session('userdata')['id'];
            $subcategory_id = implode(',', $request->music_seleted);
            $subcategory_name = implode(',', $request->subcategory_name);
            UserProfiles::where('user_id', $id)->update(['subcategory_id' => $subcategory_id, 'subcategory_name' => $subcategory_name]);
            User::where('id', $id)->update(['end_page' => 'genres']);
            return redirect('genres');
        } else {
            return redirect('musician_type')->with('error', 'You have not selected any type of music.');
        }
    }

    public function genres()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $Genres = Genres::where('status', '=', '1')->orWhere('artist_id', '=', $id)->take(4)->get()->toArray();
            $UserProfiles = UserProfiles::where('user_id', $id)->first();
            return view('artist.music_type', ['genreses' => $Genres, 'UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }


    public function add_genres(Request $request)
    {
        $post['artist_id'] = session('userdata')['id'];
        $post['name'] = $request['genres_name'];
        $post['status'] = '0';
        $insert = Genres::create($post);
        return response()->json(['error' => false, 'message' => 'Insert Genres Successfully.', 'data' => $insert]);
    }

    public function get_genre(Request $request)
    {
        $id = session('userdata')['id'];
        $genres = Genres::where('name', 'like', '%' . $request->search . '%')->where('status', '=', '1')->orWhere('artist_id', '=', $id)->get()->toArray();
        $data = "";
        $UserProfiles = UserProfiles::where('user_id', session('userdata')['id'])->first();
        if (!empty($genres)) {
            foreach ($genres as $genre) {
                if (empty($UserProfiles->genres_id)) {
                    $selected = 'unselect';
                } else {
                    $dataid = explode(',', $UserProfiles->genres_id);
                    if (in_array($genre['id'], $dataid)) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }

                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $genre["id"] . '" data-name="' . $genre['name'] . '" data-id="' . $genre['id'] . '"><span>' . $genre['name'] . '</span>
                </a>';
            }
            $data .= '<br><div>
            <a href="javascript:void(0);" class="artist--type other">
                <span>Other</span>
            </a>
            <div id="other_name" style="display:none" >
                <input type="text" class="form-control" id="genres_name">
                <button class="btn--theame form-control" type="button" onclick="AddGenres();">add</button>
            </div>
        </div>';
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function genres_submit(Request $request)
    {
        if (!empty($request->selected_genres)) {
            $id = session('userdata')['id'];
            $genres = implode(',', $request->selected_genres);
            $genres_name = implode(',', $request->selected_genres_name);
            UserProfiles::where('user_id', $id)->update(['genres_id' => $genres, 'genres_name' => $genres_name]);
            User::where('id', $id)->update(['end_page' => 'venue']);
            return redirect('venue');
        } else {
            return redirect('genres')->with('error', 'You have not selected any Genre of Music.');
        }
    }

    public function venue()
    {
        if (session()->exists('userdata')) {
            $venue = Venue::take(4)->get()->toArray();
            $id = session('userdata')['id'];
            $UserProfiles = UserProfiles::where('user_id', $id)->first();
            return view('artist.select_venue', ['venues' => $venue, 'UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function get_venue(Request $request)
    {
        $Venues = Venue::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        $data = "";
        $UserProfiles = UserProfiles::where('user_id', session('userdata')['id'])->first();
        if (!empty($Venues)) {
            foreach ($Venues as $venue) {
                if (empty($UserProfiles->venue_id)) {
                    $selected = 'unselect';
                } else {
                    $dataid = explode(',', $UserProfiles->venue_id);
                    if (in_array($venue['id'], $dataid)) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }
                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $venue["id"] . '" data-name="' . $venue['name'] . '" data-id="' . $venue['id'] . '"><span>' . $venue['name'] . '</span>
                </a>';
            }
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function venue_submit(Request $request)
    {
        if (!empty($request->selected_venue)) {
            $id = session('userdata')['id'];
            $venue = implode(',', $request->selected_venue);
            $venue_name = implode(',', $request->selected_venue_name);
            UserProfiles::where('user_id', $id)->update(['venue_id' => $venue, 'venue_name' => $venue_name]);
            User::where('id', $id)->update(['end_page' => 'intro_message']);
            return redirect('intro_message');
        } else {
            return redirect('venue')->with('error', 'You have not selected any Perform.');
        }
    }

    public function intro_message()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $UserProfiles = UserProfiles::where('user_id', $id)->first();
            return view('artist.intro_message', ['UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function intro_submit(Request $request)
    {
        $id = session('userdata')['id'];
        UserProfiles::where('user_id', $id)->update(['introduction' => $request['introduction']]);
        User::where('id', $id)->update(['end_page' => 'photograph']);
        return redirect('photograph');
    }

    public function photograph()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '0')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload Profile Photo';
            $data['title'] = 'Profile Photo';
            $data['type'] = '0';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function videolist()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '1')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload Approval Videos';
            $data['title'] = 'live Approval Videos';
            $data['type'] = '1';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function coversong()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '2')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload Cover song';
            $data['title'] = 'Cover song';
            $data['type'] = '2';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function Origanalsong()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '3')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload Orignal song';
            $data['title'] = 'Orignal Song';
            $data['type'] = '3';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function uploadcelebs()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '4')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload media with celebs';
            $data['title'] = 'media with celebs';
            $data['type'] = '4';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function UploadBands()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '5')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload a photo of Bands you have worked with';
            $data['title'] = 'With Bands';
            $data['type'] = '5';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function UploadClubs()
    {
        if (session()->exists('userdata')) {
            $id = session('userdata')['id'];
            $data['UserMedias'] = UserMedia::where('type', '6')->where('is_delete', '0')->where('user_id', $id)->get()->toArray();
            $data['heading'] = 'Upload a photos of club you have worked with';
            $data['title'] = 'With Clubs';
            $data['type'] = '6';
            return view('artist.photograph', $data);
        } else {
            return redirect('');
        }
    }

    public function file_upload(Request $request)
    {
        $fileName = time() . '.' . $request->file1->extension();
        $request->file1->move(public_path('uploads'), $fileName);
        echo $fileName;
    }

    public function upload_file_submit(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['file_path'] = $request['file_path'];
        $post['perfomed_at'] = $request['perfomed_at'];
        $post['type'] = $request['type'];
        $insert_media = UserMedia::create($post);
        if ($request['type'] == '3') {
            unset($post['type']);

            $post['spotify_url'] = $request['spotify_url'];
            $post['amazon_prime'] = $request['amazon_prime'];
            $post['jio_savan'] = $request['jio_savan'];
            $post['apple_music'] = $request['apple_music'];
            $post['tidel'] = $request['tidel'];
            $post['deezer'] = $request['deezer'];
            $post['pandoora'] = $request['pandoora'];
            $post['qubon'] = $request['qubon'];
            OrignalSong::create($post);
        }
        if ($insert_media) {

            switch ($request['type']) {
                case '0':
                    $title = "photograph";
                    break;
                case '1':
                    $title = "videolist";
                    break;
                case '2':
                    $title = "coversong";
                    break;
                case '3':
                    $title = "Origanalsong";
                    break;
                case '4':
                    $title = "uploadcelebs";
                    break;
                case '5':
                    $title = "UploadBands";
                    break;
                case '6':
                    $title = "UploadClubs";
                    break;
            }

            User::where('id', session('userdata')['id'])->update(['end_page' => $title]);
            return redirect($title);
        } else {
            return redirect()->back()->with("File not Uploaded!");
        }
    }

    public function remove_media(Request $request)
    {
        $id = $request['id'];
        UserMedia::where('id', $id)->delete();
        return response()->json(['error' => false, 'message' => 'Delete Media Successfully.', 'data' => NULL]);
    }


    public function intafollow()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $UserProfiles = UserProfiles::where('user_id', $user_id)->first();
            return view('artist.insta_follower', ['UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function submitinta(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['intagram_link'] = $request['intagram_link'];
        $post['intagram_follower'] = $request['intagram_follower'];
        UserProfiles::where('user_id', $user_id)->update($post);
        User::where('id', session('userdata')['id'])->update(['end_page' => 'facebook_data']);
        return redirect('facebook_data');
    }

    public function facebook_data()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $UserProfiles = UserProfiles::where('user_id', $user_id)->first();
            return view('artist.facebook_data', ['UserProfiles' => $UserProfiles]);
        } else {
            return redirect('');
        }
    }

    public function submitfacebook(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['facebook_link'] = $request['facebook_link'];
        $post['facebook_follower'] = $request['facebook_follower'];
        UserProfiles::where('user_id', $user_id)->update($post);
        User::where('id', session('userdata')['id'])->update(['end_page' => 'address']);
        // return redirect('address');
        $selected = SelecteSubcategories::where('user_id', $user_id)->get()->toArray();
        if (!empty($selected)) {
            return redirect('subcategory-page');
        } else {
            return redirect('address');
        }
    }

    public function subcategory_page()
    {
        $user_id = session('userdata')['id'];
        $select = SelecteSubcategories::where(['user_id' => $user_id, 'status' => '0'])->first();
        if (!empty($select)) {
            $subcategory = ArtistSubcategory::where('id', $select->subcategory_id)->first();
            $data['instruments'] = Instruments::where('subcategory_id', $select->subcategory_id)->get()->toArray();
            $selected_instruments = SelectIntrument::where(['subcategory_id' => $select->subcategory_id, 'user_id' => $user_id])->get()->toArray();
            $data_array = [];
            foreach ($selected_instruments as $selected_instrument) {
                $data_array[] = $selected_instrument['intrument_id'];
            }
            $data['selected_instruments'] = $data_array;
            $data['subcategory_id'] = $select->subcategory_id;
            $data['title'] = $subcategory->name . ' With What Instrument';
            $data['subcategory'] = $subcategory;
            return view('artist.instrumental_page', $data);
        } else {
            return redirect('address');
        }
    }

    public function instrumental_page()
    {
        $user_id = session('userdata')['id'];
        $data['instruments'] = Instruments::get()->toArray();
        $selected_instruments = SelectIntrument::select('intrument_id')->where(['user_id' => $user_id, 'subcategory_id' => '1'])->get()->toArray();
        $data_array = [];
        foreach ($selected_instruments as $selected_instrument) {
            $data_array[] = $selected_instrument['intrument_id'];
        }
        $data['selected_instruments'] = $data_array;
        return view('artist.instrumental_page', $data);
    }

    public function get_instruments(Request $request)
    {
        $Instruments = Instruments::where('name', 'like', '%' . $request->search . '%')->where('subcategory_id', $request['subcategory_id'])->get()->toArray();
        $data = "";
        $selected_instruments = SelectIntrument::where(['user_id' => session('userdata')['id'], 'subcategory_id' => $request['subcategory_id']])->get()->toArray();
        $selected_instruments_array = [];
        foreach ($selected_instruments as $selected_instrument) {
            $selected_instruments_array[] = $selected_instrument['intrument_id'];
        }

        if (!empty($Instruments)) {
            foreach ($Instruments as $Instrument) {
                if (empty($selected_instruments_array)) {
                    $selected = 'unselect';
                } else {
                    if (in_array($Instrument['id'], $selected_instruments_array)) {
                        $selected = 'selected';
                    } else {
                        $selected = 'unselect';
                    }
                }
                $data .= '<a href="javascript:void(0);" class="artist--type ' . $selected . ' select' . $Instrument['id'] . '" data-name="' . $Instrument['name'] . '" data-id="' . $Instrument['id'] . '">
                <span>' . $Instrument['name'] . '</span>
            </a>';
            }
        } else {
            $data .= '<p class="not--found">Not Found !</p>';
        }
        return $data;
    }

    public function set_instrument(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['user_id'] = $user_id;
        $post['subcategory_id'] = $request['subcategory_id'];
        $post['intrument_id'] = $request['intrument_id'];
        SelectIntrument::where('user_id', $user_id)->where('subcategory_id', $request['subcategory_id'])->delete();
        SelectIntrument::create($post);
        return response()->json(['error' => false, 'message' => 'Set Instruments Successfully.', 'data' => NULL]);
    }

    public function set_instruments(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['user_id'] = $user_id;
        $post['subcategory_id'] = $request['subcategory_id'];
        $intrument_ids = $request['intrument_id'];
        SelectIntrument::where('user_id', $user_id)->where('subcategory_id', $request['subcategory_id'])->delete();
        foreach ($intrument_ids as $intrument_id) {
            $post['intrument_id'] = $intrument_id;
            SelectIntrument::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Set Instruments Successfully.', 'data' => NULL]);
    }

    public function get_selected_instrument(Request $request)
    {
        $user_id = session('userdata')['id'];
        $subcategory_id = $request['subcategory_id'];
        $data = SelectIntrument::where('user_id', $user_id)->where('subcategory_id', $subcategory_id)->get();
        if (!empty($data)) {
            $count = count($data);
        } else {
            $count = 0;
        }
        echo $count;
    }

    public function solo_budget()
    {
        $user_id = session('userdata')['id'];
        $data['selecteds'] = SelectIntrument::select('tbl_instruments.*')
            ->join('tbl_instruments', 'tbl_instruments.id', '=', 'tbl_selected_instruments.intrument_id', 'left')
            ->where(['user_id' => $user_id, 'subcategory_id' => '1'])
            ->get()->toArray();
        return view('artist.solo_budget', $data);
    }

    public function subcategory_budgut($id)
    {
        $user_id = session('userdata')['id'];
        $select = SelecteSubcategories::where(['user_id' => $user_id, 'status' => '0'])->first();
        if (!empty($select)) {
            $subcategory = ArtistSubcategory::where('id', $id)->first();
            $data['selecteds'] = SelectIntrument::select('tbl_instruments.*')
                ->join('tbl_instruments', 'tbl_instruments.id', '=', 'tbl_selected_instruments.intrument_id', 'left')
                ->where(['tbl_selected_instruments.user_id' => $user_id, 'tbl_selected_instruments.subcategory_id' => $id])
                ->get()->toArray();
            $data['subcategory_id'] = $id;
            $data['title'] = $subcategory->name;
            return view('artist.subcategory_budget', $data);
        } else {
            return redirect('address');
        }
    }

    public function submit_subcategory(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['subcategory_id'] = $request['subcategory_id'];

        Budget::where('user_id', session('userdata')['id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        for ($i = 0; $i < count($request['first_intrument_id']); $i++) {
            $post['venue_id'] = '1';
            $post['intrument_ids'] = $request['first_intrument_id'][$i];
            $post['name'] = (!empty($request['first_name'][$i])?$request['first_name'][$i]:"");
            $post['price'] = $request['first_price'][$i];
            Budget::create($post);
        }

        for ($i = 0; $i < count($request['secound_intrument_id']); $i++) {
            $post['venue_id'] = '2';
            $post['intrument_ids'] = $request['secound_intrument_id'][$i];
            $post['name'] = (!empty($request['secound_name'][$i])?$request['secound_name'][$i]:"");
            $post['price'] = $request['secound_price'][$i];
            Budget::create($post);
        }
        for ($i = 0; $i < count($request['third_intrument_id']); $i++) {
            $post['venue_id'] = '3';
            $post['intrument_ids'] = $request['third_intrument_id'][$i];
            $post['name'] = (!empty($request['third_name'][$i])?$request['third_name'][$i]:"" );
            $post['price'] = $request['third_price'][$i];
            Budget::create($post);
        }

        SelecteSubcategories::where('subcategory_id', $request['subcategory_id'])->update(['status' => '1']);
        $select = SelecteSubcategories::where(['user_id' => session('userdata')['id'], 'status' => '0'])->first();
        if (!empty($select)) {
            return redirect('subcategory-page');
        } else {
            return redirect('city_budget');
        }
    }

    public function submit_solo(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['subcategory_id'] = $request['subcategory_id'];

        Budget::where('user_id', session('userdata')['id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        for ($i = 0; $i < count($request['first_intrument_id']); $i++) {
            $post['venue_id'] = '1';
            $post['intrument_ids'] = $request['first_intrument_id'][$i];
            $post['price'] = $request['first_price'][$i];
            Budget::create($post);
        }

        for ($i = 0; $i < count($request['secound_intrument_id']); $i++) {
            $post['venue_id'] = '2';
            $post['intrument_ids'] = $request['secound_intrument_id'][$i];
            $post['price'] = $request['secound_price'][$i];
            Budget::create($post);
        }
        for ($i = 0; $i < count($request['third_intrument_id']); $i++) {
            $post['venue_id'] = '3';
            $post['intrument_ids'] = $request['third_intrument_id'][$i];
            $post['price'] = $request['third_price'][$i];
            Budget::create($post);
        }

        return redirect('duo_page');
    }

    public function delete_instrument(Request $request)
    {
        $user_id = session('userdata')['id'];
        $id = $request['id'];
        $subcategory_id = $request['subcategory_id'];
        SelectIntrument::where(['intrument_id' => $id, 'subcategory_id' => $subcategory_id, 'user_id' => $user_id])->delete();
        echo "success";
    }

    public function duo_page()
    {
        $user_id = session('userdata')['id'];
        $data['instruments'] = Instruments::get()->toArray();
        $selected_instruments = SelectIntrument::select('intrument_id')->where(['user_id' => $user_id, 'subcategory_id' => '2'])->get()->toArray();
        $data_array = [];
        foreach ($selected_instruments as $selected_instrument) {
            $data_array[] = $selected_instrument['intrument_id'];
        }
        $data['selected_instruments'] = $data_array;
        return view('artist.duo_page', $data);
    }

    public function duo_budget()
    {
        $user_id = session('userdata')['id'];
        $data['selecteds'] = SelectIntrument::select('tbl_instruments.*')
            ->join('tbl_instruments', 'tbl_instruments.id', '=', 'tbl_selected_instruments.intrument_id', 'left')
            ->where(['user_id' => $user_id, 'subcategory_id' => '2'])
            ->get()->toArray();
        return view('artist.duo_budget', $data);
    }

    public function submit_duo(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['subcategory_id'] = $request['subcategory_id'];

        Budget::where('user_id', session('userdata')['id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        for ($i = 0; $i < count($request['first_intrument_id']); $i++) {
            $post['venue_id'] = '1';
            $post['intrument_ids'] = $request['first_intrument_id'][$i];
            $post['price'] = $request['first_price'][$i];
            Budget::create($post);
        }

        for ($i = 0; $i < count($request['secound_intrument_id']); $i++) {
            $post['venue_id'] = '2';
            $post['intrument_ids'] = $request['secound_intrument_id'][$i];
            $post['price'] = $request['secound_price'][$i];
            Budget::create($post);
        }
        for ($i = 0; $i < count($request['third_intrument_id']); $i++) {
            $post['venue_id'] = '3';
            $post['intrument_ids'] = $request['third_intrument_id'][$i];
            $post['price'] = $request['third_price'][$i];
            Budget::create($post);
        }

        return redirect('trio_page');
    }

    public function trio_page()
    {
        $user_id = session('userdata')['id'];
        $data['instruments'] = Instruments::get()->toArray();
        $selected_instruments = SelectIntrument::select('intrument_id')->where(['user_id' => $user_id, 'subcategory_id' => '3'])->get()->toArray();
        $data_array = [];
        foreach ($selected_instruments as $selected_instrument) {
            $data_array[] = $selected_instrument['intrument_id'];
        }
        $data['selected_instruments'] = $data_array;
        return view('artist.trio_page', $data);
    }

    public function trio_budget()
    {
        $user_id = session('userdata')['id'];
        $data['selecteds'] = SelectIntrument::select('tbl_instruments.*')
            ->join('tbl_instruments', 'tbl_instruments.id', '=', 'tbl_selected_instruments.intrument_id', 'left')
            ->where(['user_id' => $user_id, 'subcategory_id' => '3'])
            ->get()->toArray();
        return view('artist.trio_budget', $data);
    }

    public function submit_trio(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['subcategory_id'] = $request['subcategory_id'];

        Budget::where('user_id', session('userdata')['id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        for ($i = 0; $i < count($request['first_intrument_id']); $i++) {
            $post['venue_id'] = '1';
            $post['intrument_ids'] = $request['first_intrument_id'][$i];
            $post['price'] = $request['first_price'][$i];
            Budget::create($post);
        }

        for ($i = 0; $i < count($request['secound_intrument_id']); $i++) {
            $post['venue_id'] = '2';
            $post['intrument_ids'] = $request['secound_intrument_id'][$i];
            $post['price'] = $request['secound_price'][$i];
            Budget::create($post);
        }
        for ($i = 0; $i < count($request['third_intrument_id']); $i++) {
            $post['venue_id'] = '3';
            $post['intrument_ids'] = $request['third_intrument_id'][$i];
            $post['price'] = $request['third_price'][$i];
            Budget::create($post);
        }

        return redirect('city_budget');
    }

    public function address()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $selected = SelecteSubcategories::where('user_id', $user_id)->get()->toArray();
            if (!empty($selected)) {
                return redirect('subcategory-page');
            } else {
                $data['address'] = Address::where('user_id', $user_id)->first();
                return view('artist.address', $data);
            }
        } else {
            return redirect('');
        }
    }

    public function submit_address(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['flat_no'] = $request['flat_no'];
        $post['landmark'] = $request['landmark'];
        $post['state'] = $request['state'];
        $post['city'] = $request['city'];
        $post['pincode'] = $request['pincode'];
        $post['address_proof'] = $request['address_proof'];
        $post['aadhar_number'] = $request['aadhar_number'];
        if ($request->id_proof) {
            $fileName = time() . '.' . $request->id_proof->extension();
            $request->id_proof->move(public_path('/id_proof/'), $fileName);
            $post['id_proof'] = 'public/id_proof/' . $fileName;
        }
        $data = Address::where('user_id', session('userdata')['id'])->first();
        if (!empty($data)) {
            Address::where('user_id', session('userdata')['id'])->update($post);
        } else {
            Address::create($post);
        }
        User::where('id', session('userdata')['id'])->update(['end_page' => 'bank_details']);
        return redirect('bank_details');
    }

    public function bank_details()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $data['banks'] = Bank::select('BANK')->groupBy('BANK')->get()->toArray();
            // print_r($data);die;
            $data['bankdetail'] = BankDetail::where('user_id', $user_id)->first();
            return view('artist.bank_details', $data);
        } else {
            return redirect('');
        }
    }

    public function submit_bank_detail(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['bankname'] = $request['bankname'];
        $post['branch'] = $request['branch'];
        $post['acount_number'] = $request['acount_number'];
        $post['ifsccode'] = $request['ifsccode'];
        $post['pan_name'] = $request['pan_name'];
        $post['pan_number'] = $request['pan_number'];
        if ($request->cancel_chaque) {
            $fileName = time() . '.' . $request->cancel_chaque->extension();
            $request->cancel_chaque->move(public_path('/cancel_chaque/'), $fileName);
            $post['cancel_chaque'] = 'public/cancel_chaque/' . $fileName;
        }

        $data = BankDetail::where('user_id', session('userdata')['id'])->first();
        if (!empty($data)) {
            BankDetail::where('user_id', session('userdata')['id'])->update($post);
        } else {
            BankDetail::create($post);
        }
        User::where('id', session('userdata')['id'])->update(['end_page' => 'service_agreement']);
        return redirect('service_agreement');
    }

    public function service_agreement()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $data['ServiceAgreement'] = ServiceAgreement::first();
            return view('artist.service_agreement', $data);
        } else {
            return redirect('');
        }
    }

    public function agree(Request $request)
    {
        $post['agree'] = $request['agree'];
        return redirect('thankyou');
    }

    public function profile()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $data['user'] = User::where('id', $user_id)->first();
            $data['profiles'] = UserProfiles::where('user_id', $user_id)->first();
            $data['medias'] = UserMedia::where('is_delete', '0')->where('user_id', $user_id)->get()->toArray();
            return view('artist.my_profile', $data);
        } else {
            return redirect('');
        }
    }
    public function thankyou()
    {
        return view('artist.thankyou');
    }
    public function media_file_upload($id)
    {
        $user_id = session('userdata')['id'];
        $data['UserMedias'] = UserMedia::where('type', '0')->where('is_delete', '0')->where('user_id', $user_id)->get()->toArray();
        $data['type'] = $id;
        return view('artist.add_intro_video', $data);
    }

    public function logout()
    {
        session()->forget('userdata');
        session()->flush();
        return redirect('');
    }

    public function request_list()
    {
        if (session()->exists('userdata')) {
            $user_id = session('userdata')['id'];
            $data['requests'] = UserReferral::select('tbl_user_referral.*', 'tbl_users.username')
                ->join('tbl_users', 'tbl_user_referral.request_by', '=', 'tbl_users.id')
                ->where('request_to', $user_id)->get()->toArray();
            $data['medias'] = UserMedia::where('is_delete', '0')->where('user_id', $user_id)->get()->toArray();
            return view('artist.request_list', $data);
        } else {
            return redirect('');
        }
    }

    public function request_accept_reject_status(Request $request)
    {
        $id = $request['id'];
        UserReferral::where('id', $id)->update(['status' => $request['status']]);
        return response()->json(['error' => false, 'message' => 'update Status', 'data' => NULL]);
    }
    public function solo_page()
    {
        return view('artist.solo_page');
    }

    public function city_budget()
    {
        $data['cities'] = City::all();
        return view('artist.city_budget', $data);
    }

    public function submit_city_budget(Request $request)
    {
        $user_id = session('userdata')['id'];
        $json = $request['price'];
        CityPrice::where('user_id', $user_id)->delete();
        for ($i = 0; $i < count($json); $i++) {
            $post['city_id'] = $request['city_id'][$i];
            $post['price'] = $request['price'][$i];
            $post['user_id'] = $user_id;
            // print_r($post);
            CityPrice::create($post);
        }
        return redirect('manager-detail');
    }

    public function manager_detail()
    {
        $data['languages'] = Languages::all();
        return view('artist.manager_detail', $data);
    }

    public function submit_manager_detail(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['signature'] = $request['signature'];
        $post['name'] = $request['name'];
        $post['contact_no'] = $request['contact_no'];
        $post['language_id'] = $request['language_id'];
        $insert = ManagerDetail::create($post);
        if ($insert) {
            return redirect('address');
        } else {
            return back()->with('error', 'Something wrong.');
        }
    }

    public function sendEmail($data, $email, $name, $subject)
    {
        Mail::send('mail', $data, function ($message) use ($email, $name, $subject) {
            $message->to($email, $name)->subject($subject);
            $message->from('partywitty@gmail.com', 'Party Witty');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
}
