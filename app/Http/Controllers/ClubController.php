<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ContactAs;
use App\Models\ArtistList;
use App\Models\MusicianList;
use App\Models\UserReferral;
use App\Models\UserProfiles;
use App\Models\ClubProfileInfo;
use App\Models\ClubeDetail;
use App\Models\ClubFloorDetail;
use App\Models\OffersCategory;
use App\Models\OffersBook;
use App\Models\BookDetail;
use App\Models\Offers;

class ClubController extends Controller
{

    public function club_profile_info()
    {
        return view('club.intro_message');
    }

    public function submit_intro_message(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['name_of_club'] = $request['name_of_club'];
        $post['address'] = $request['address'];
        $post['landmark'] = $request['landmark'];
        $post['state'] = $request['state'];
        $post['city'] = $request['city'];
        $post['pincode'] = $request['pincode'];
        $post['iam'] = $request['iam'];
        $post['poc'] = $request['poc'];

        $club_info = ClubProfileInfo::where('user_id', session('userdata')['id'])->first();
        if (!empty($club_info)) {
            ClubProfileInfo::where('user_id', session('userdata')['id'])->update($post);
        } else {
            ClubProfileInfo::create($post);
        }
        return redirect('guest-application');
    }

    public function guest_application()
    {
        return view('club.guest_application');
    }

    public function select_sound()
    {
        return view('club.select_sound');
    }

    public function submit_guest_form(Request $request)
    {
        $post['user_id'] = session('userdata')['id'];
        $post['guest_form'] = $request['guest_form'];
        $club_info = ClubeDetail::where('user_id', session('userdata')['id'])->first();
        if (!empty($club_info)) {
            unset($post['user_id']);
            ClubeDetail::where('user_id', session('userdata')['id'])->update($post);
        } else {
            ClubeDetail::create($post);
        }
        return redirect('select-season');
    }

    public function select_season()
    {
        return view('club.select_season');
    }

    public function submit_season(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['projector_screen'] = $request['projector_screen'];
        $post['live_match_season'] = $request['live_match_season'];
        ClubeDetail::where('user_id', $user_id)->update($post);
        return redirect('select-ds');
    }

    public function select_ds()
    {
        return view('club.select_ds');
    }

    public function submit_ds(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['dj_avaibility'] = $request['dj_avaibility'];
        $post['dance_floor'] = $request['dance_floor'];
        ClubeDetail::where('user_id', $user_id)->update($post);
        return redirect('floor');
        // return redirect('photography-availability');
    }

    public function photography_availability()
    {
        return view('club.photography_availability');
    }

    public function submit_photography(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['photographer'] = $request['photographer'];
        ClubeDetail::where('user_id', $user_id)->update($post);
        return redirect('select-live-music');
    }

    public function select_live_music()
    {
        return view('club.select_live_music');
    }

    public function submit_sponsors(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['sponsorship'] = $request['sponsorship'];
        $post['sponsor_name'] = $request['sponsor_name'];
        ClubeDetail::where('user_id', $user_id)->update($post);
        return redirect('select-brand');
    }

    public function select_brand()
    {
        return view('club.select_brand');
    }

    public function submit_want_sponsorship(Request $request)
    {
        $user_id = session('userdata')['id'];
        $post['want_sponsorship'] = $request['want_sponsorship'];
        ClubeDetail::where('user_id', $user_id)->update($post);
        return redirect('thankyou');
    }
    public function floor()
    {
        return view('club.floor');
    }

    public function add_floors(Request $request)
    {
        ClubFloorDetail::where('user_id', session('userdata')['id'])->delete();
        $post1['user_id'] = session('userdata')['id'];
        $post1['floor_name'] = 'Floor 1';
        $post1['seating'] = $request['seating1'];
        $post1['floor_type'] = $request['floor_type1'];
        $post1['music_type'] = $request['music_type1'];
        ClubFloorDetail::create($post1);

        $post2['user_id'] = session('userdata')['id'];
        $post2['floor_name'] = 'Floor 2';
        $post2['seating'] = $request['seating2'];
        $post2['floor_type'] = $request['floor_type2'];
        $post2['music_type'] = $request['music_type2'];
        ClubFloorDetail::create($post2);

        $post3['user_id'] = session('userdata')['id'];
        $post3['floor_name'] = 'Floor 3';
        $post3['seating'] = $request['seating3'];
        $post3['floor_type'] = $request['floor_type3'];
        $post3['music_type'] = $request['music_type3'];
        ClubFloorDetail::create($post3);
        return redirect('photography-availability');
    }

    public function club_profile()
    {
        $id = session('userdata')['id'];
        $data['pagename'] = 'Club Offers';
        $data['offers'] = Offers::where('club_id', $id)->get()->toArray();
        return view('club.offers', $data);
    }

    public function club_deal_sold($id)
    {
        $offer = Offers::where('id', $id)->first();
        $data['offer'] = $offer;
        $offersbook =  OffersBook::where('offer_id', $id)->get()->toArray();
        if (!empty($offersbook)) {
            foreach ($offersbook as &$offerbook) {
                $book_detail = BookDetail::where('offers_book_id', $offerbook['id'])->get()->toArray();
                if (!empty($book_detail)) {
                    $offerbook['book_detail'] = $book_detail;
                } else {
                    $offerbook['book_detail'] = NULL;
                }
                $couple_count = BookDetail::where('offers_book_id', $offerbook['id'])
                    ->where(function ($query) {
                        $query->where('type', '=', 'couple_male')
                            ->orWhere('type', '=', 'couple_female');
                    })->get()->toArray();
                if (!empty($couple_count)) {
                    $offerbook['CoupleCount'] = count($couple_count);
                } else {
                    $offerbook['CoupleCount'] = 0;
                }

                $stage_count = BookDetail::where('offers_book_id', $offerbook['id'])->where('type', 'stage')->get()->toArray();
                if (!empty($stage_count)) {
                    $offerbook['stageCount'] = count($stage_count);
                } else {
                    $offerbook['stageCount'] = 0;
                }

                $kids_count = BookDetail::where('offers_book_id', $offerbook['id'])->where('type', 'kids')->get()->toArray();
                if (!empty($kids_count)) {
                    $offerbook['kidsCount'] = count($kids_count);
                } else {
                    $offerbook['kidsCount'] = 0;
                }
            }
            $data['offersbooks'] = $offersbook;
        } else {
            $data['offersbooks'] = NULL;
        }
        $data['pagename'] = "Deal Sold";
        return view('club.deal_sold', $data);
    }
}
