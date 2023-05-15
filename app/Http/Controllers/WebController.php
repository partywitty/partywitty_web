<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use App\Models\User;
use App\Models\ContactAs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ArtistList;
use App\Models\MusicianList;
use App\Models\Occasions;
use App\Models\Genres;
use App\Models\EventForm;
use PharIo\Manifest\Email;
use PhpParser\Node\Expr\Empty_;
use App\Models\ClubOffers;
use App\Models\UserProfiles;
use App\Models\Offers;
use App\Models\OffersCategory;
use App\Models\OffersBook;
use App\Models\BookDetail;
use App\Models\Guests;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function about()
    {
        return view('web.about');
    }

    public function service()
    {
        return view('web.service');
    }

    public function clients()
    {
        return view('web.clients');
    }

    public function blog()
    {
        return view('web.blog');
    }

    public function careers()
    {
        return view('web.careers');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function artist()
    {
        return view('web.artist');
    }

    public function forgot_password()
    {
        return view('web.forgot_password');
    }
    public function cart()
    {
        return view('web.cart');
    }

    public function otp()
    {
        if (session()->has('email')) {
            return view('web.otp');
        } else {
            return redirect('forgot-password');
        }
    }

    public function otp_verify(Request $request)
    {
        $email = $request['email'];
        $otp = $request['otp1'] . $request['otp2'] . $request['otp3'] . $request['otp4'];
        $user = User::where(['email' => $email, 'otp' => $otp])->first();
        if (!empty($user)) {
            $request->session()->put('verify_otp', '1');
            return redirect('reset-password');
        } else {
            return redirect()->back()->with('error', 'Incorrect OTP.');
        }
    }

    public function reset_password()
    {
        if (session()->has('verify_otp')) {
            return view('web.reset_password');
        } else {
            return redirect('forgot-password');
        }
    }

    public function submit_reset_pasword(Request $request)
    {
        User::where('email', $request['email'])->update(['password' => Hash::make($request['password'])]);
        return redirect('signin')->with('success', 'Password Reset Successfully.');
    }

    public function contact_submit(Request $request)
    {
        $post['username'] = $request['username'];
        $post['mobile'] = $request['mobile'];
        $post['email'] = $request['email'];
        $post['location'] = $request['location'];
        $post['subject'] = $request['subject'];
        $post['message'] = $request['message'];
        $inser_id = ContactAs::create($post);
        return redirect()->back()->with('success', 'your message send Successfully.');
    }

    public function signup()
    {
        return view('web.sign_up');
    }

    public function user_submit(Request $request)
    {
        $post['username'] = $request['username'];
        $post['contact_no'] = $request['contact_no'];
        $post['email'] = $request['email'];
        $post['password'] = Hash::make($request['password']);
        $post['gender'] = $request['gender'];
        // $post['role'] = $request['role'];
        $post['last_login'] = date('Y-m-d h:i:s');
        $post['otp'] = '1234';
        $post['status'] = '0';
        $post['referral_code'] = Str::random(16);
        $post['end_page'] = 'artist_hire';

        $user = User::where('email', $request['email'])->first();
        if (!empty($user)) {
            return redirect()->back()->with('error', 'email must be unique');
        } else {
            $inser_id = User::create($post);
            $post['id'] = $inser_id->id;
            $request->session()->put('userdata', $post);
            return redirect('artist_hire')->with('status', 'Profile updated!');
        }
    }

    public function login()
    {
        return view('web.login');
    }

    public function signin_submit(Request $request)
    {
        $post['email'] = $request['email'];
        $post['password'] = $request['password'];
        $user = User::where('email', $post['email'])->first();
        if (!empty($user)) {
            if (Hash::check($post['password'], $user->password)) {
                $request->session()->put('userdata', $user);
                if ($user->role == 'Artist') {
                    if ($user->end_page != "") {
                        if ($user->end_page == 'service_agreement') {
                            if ($user->status == '1') {
                                return redirect('artist-profile');
                            } else {
                                return redirect($user->end_page);
                            }
                        } else {
                            return redirect($user->end_page);
                        }
                    } else {
                        return redirect('artist_hire');
                    }
                } else {
                    return redirect('club-profile');
                }
            } else {
                return redirect()->back()->with('error', 'password Incorrect!');
            }
        } else {
            return redirect()->back()->with('error', 'Email Not Exit!');
        }
    }

    public function artist_hire()
    {
        if (session()->exists('userdata')) {
            return view('web.artist_hire');
        } else {
            return redirect('signup');
        }
    }

    public function artist_hire_submit(Request $request)
    {
        $role = $request['role'];
        $id = session('userdata')['id'];
        $role_update = User::where('id', $id)->update(['role' => $role]);
        if ($role == 'Artist') {
            User::where('id', session('userdata')['id'])->update(['end_page' => 'referral_code']);
            return redirect('referral_code');
        } else {
            return redirect('club-profile-info');
        }
    }

    public function privacy_policy()
    {
        return view('web.privacy_policy');
    }
    public function refund_policy()
    {
        return view('web.refund_policy');
    }
    public function artist_agreement()
    {
        return view('web.artist_agreement');
    }
    public function club_agreement()
    {
        return view('web.club_agreement');
    }
    public function terms_conditions()
    {
        return view('web.terms_conditions');
    }
    public function my_profile()
    {
        return view('web.my_profile');
    }
    public function guest_profile()
    {
        return view('web.guest_profile');
    }
    public function guest_otp()
    {
        return view('web.guest_otp');
    }
    public function my_booking()
    {
        return view('web.my_booking');
    }
    public function request_list()
    {
        return view('web.request_list');
    }
    public function our_artist()
    {
        $data['artists'] = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id', 'right')
            ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id', 'right')
            ->where('tbl_user_media.type', '0')
            ->where('tbl_user_media.is_delete', '0')
            ->where('tbl_users.role', '=', 'Artist')
            ->where('tbl_users.status', '=', '1')
            ->get()->toArray();
        return view('web.our_artist', $data);
    }
    public function event()
    {
        return view('web.event');
    }


    public function private_party_form()
    {
        $data['title'] = 'Private Party';
        $data['typeOfevent'] = 'private';
        $data['occasions'] = Occasions::where('type_of_event', 'private')->get()->toArray();
        $data['genres'] = Genres::all();
        return view('web.corporate_party_form', $data);
    }
    public function corporate_party_form()
    {
        $data['title'] = 'Corporate Party';
        $data['typeOfevent'] = 'corporate';
        $data['occasions'] = Occasions::where('type_of_event', 'corporate')->get()->toArray();
        $data['genres'] = Genres::all();
        return view('web.corporate_party_form', $data);
    }
    public function book_artist()
    {
        return view('web.book_artist');
    }
    public function book_club()
    {
        return view('web.book_club');
    }
    public function book_corporate()
    {
        return view('web.book_corporate');
    }
    public function book_private()
    {
        return view('web.book_private');
    }

    public function book_party()
    {
        return view('web.book_party');
    }

    public function submit_party_form(Request $request)
    {
        $post['typeOfevent'] = $request['typeOfevent'];
        $post['occasion_id'] = $request['occasion_id'];
        $post['name'] = $request['name'];
        $post['venue'] = $request['venue'];
        $post['address'] = $request['address'];
        $post['landmark'] = $request['landmark'];
        $post['point_of_contact'] = $request['point_of_contact'];
        $post['date'] = $request['date'];
        $post['sound_arrangement'] = $request['sound_arrangement'];
        $post['start_time'] = $request['start_time'];
        $post['end_time'] = $request['end_time'];
        $post['s_break_time'] = $request['s_break_time'];
        $post['e_break_time'] = $request['e_break_time'];
        $post['LSE_contact_details'] = $request['LSE_contact_details'];
        $post['gathering_size'] = $request['gathering_size'];
        $post['genres_id'] = $request['genres_id'];
        $post['band_size'] = $request['band_size'];
        $insert = EventForm::create($post);
        if ($insert) {
            return redirect('thankyou');
        } else {
            return redirect()->back()->with('error', 'Something want wrong!');
        }
    }

    public function forgot_submit(Request $request)
    {
        $email = $request['email'];
        $user = User::where('email', $email)->first();
        if (!empty($user)) {
            $data["email"] = $user->email;
            $data["name"] = $user->username;
            $data["subject"] = "Forget Password";

            User::where('id', $user->id)->update(['otp' => '1234']);
            $Data['otp'] = '1234';
            $Data['user'] = $user;

            try {
                Mail::send('mail.forgot', $Data, function ($message) use ($data) {
                    $message->to($data["email"], $data["name"])
                        ->subject($data["subject"]);
                });
            } catch (JWTException $exception) {
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
            if (Mail::failures()) {
                return back()->with('error', "Something went wrong please try again.");
            } else {
                $request->session()->put('email', $user->email);
                return redirect('otp');
            }
        } else {
            return back()->with('error', "Invalid Email.");
        }
    }
    public function club_offer()
    {
        return view('web.club_offer');
    }

    public function add_club_offer(Request $request)
    {
        $post['club_name'] = $request['club_name'];
        $post['name'] = $request['name'];
        $post['contact_no'] = $request['contact_no'];
        $post['are_you'] = $request['are_you'];
        $post['dance_floor'] = $request['dance_floor'];
        $post['live_music'] = $request['live_music'];
        $post['advertise_type'] = $request['advertise_type'];
        ClubOffers::create($post);
        return back()->with('success', 'Club Offer Create Successfully.');
    }

    public function partner_with_us()
    {
        return view('web.partner_with_us');
    }
    public function offer()
    {
        $offers = Offers::get()->toArray();
        foreach ($offers as &$offer) {
            $categorys = explode(',', $offer['offer_category_ids']);
            $offer['sub_category_name'] = OffersCategory::whereIn('id', $categorys)->get()->toArray();
        }
        $data['offers'] = $offers;
        // print_r($data);die;
        return view('web.offer', $data);
    }
    public function offer_detail($id)
    {
        $offer = Offers::select('tbl_offers.*')
            ->where('tbl_offers.id', $id)
            ->first();
        $categorys = explode(',', $offer['offer_category_ids']);
        $offer['sub_category_name'] = OffersCategory::whereIn('id', $categorys)->get()->toArray();

        $other_offers = Offers::select('tbl_offers.*', 'tbl_address.flat_no', 'tbl_address.landmark', 'tbl_address.state', 'tbl_address.city', 'tbl_address.pincode')
            ->join('tbl_address', 'tbl_address.user_id', '=', 'tbl_offers.club_id', 'left')
            ->where('tbl_offers.club_id', $offer['club_id'])
            ->where('tbl_offers.id', '!=', $id)
            ->get()->toArray();
        foreach ($other_offers as &$other_offer) {
            $categorys = explode(',', $other_offer['offer_category_ids']);
            $other_offer['sub_category_name'] = OffersCategory::whereIn('id', $categorys)->get()->toArray();
        }
        $data['other_offers'] = $other_offers;

        $data['offer'] = $offer;
        return view('web.offer_detail', $data);
    }
    public function booking_form($id)
    {
        $offer = Offers::select('tbl_offers.*', 'tbl_address.flat_no', 'tbl_address.landmark', 'tbl_address.state', 'tbl_address.city', 'tbl_address.pincode')
            ->join('tbl_address', 'tbl_address.user_id', '=', 'tbl_offers.club_id', 'left')
            ->where('tbl_offers.id', $id)
            ->first();
        $categorys = explode(',', $offer['offer_category_ids']);
        $offer['sub_category_name'] = OffersCategory::whereIn('id', $categorys)->get()->toArray();
        $data['offer'] = $offer;
        return view('web.booking_form', $data);
    }

    public function booking_form_submit(Request $request)
    {
        $post['guast_id'] = $request['guast_id'];
        $post['name'] = $request['contact_name'];
        $post['email'] = $request['email'];
        $post['contact_number'] = $request['contact_number'];
        $post['offer_id'] = $request['offer_id'];
        $post['total_amount'] = $request['total_amount'];
        $post['razorpay_payment_id'] = $request['razorpay_payment_id'];
        $request->session()->put('payment', $post);
        $insert = OffersBook::create($post);

        if (isset($request['stage_name'])) {
            for ($i = 0; $i < count($request['stage_name']); $i++) {
                $stage_data['offers_book_id'] = $insert->id;
                $stage_data['name'] = $request['stage_name'][$i];
                $stage_data['contact'] = $request['stage_contact'][$i];
                $stage_data['age'] = $request['stage_age'][$i];
                $stage_data['type'] = 'stage';
                BookDetail::create($stage_data);
            }
        }

        if (isset($request['couple_male_name'])) {
            for ($i = 0; $i < count($request['couple_male_name']); $i++) {
                $couple_male_data['offers_book_id'] = $insert->id;
                $couple_male_data['name'] = $request['couple_male_name'][$i];
                $couple_male_data['contact'] = $request['couple_male_contact'][$i];
                $couple_male_data['age'] = $request['couple_male_age'][$i];
                $couple_male_data['type'] = 'couple_male';
                BookDetail::create($couple_male_data);
            }
        }

        if (isset($request['couple_female_name'])) {
            for ($i = 0; $i < count($request['couple_female_name']); $i++) {
                $couple_female_data['offers_book_id'] = $insert->id;
                $couple_female_data['name'] = $request['couple_female_name'][$i];
                $couple_female_data['contact'] = $request['couple_female_contact'][$i];
                $couple_female_data['age'] = $request['couple_female_age'][$i];
                $couple_female_data['type'] = 'couple_female';
                BookDetail::create($couple_female_data);
            }
        }

        if (isset($request['kids_name'])) {
            for ($i = 0; $i < count($request['kids_name']); $i++) {
                $kids_data['offers_book_id'] = $insert->id;
                $kids_data['name'] = $request['kids_name'][$i];
                $kids_data['contact'] = $request['kids_contact'][$i];
                $kids_data['age'] = $request['kids_age'][$i];
                $kids_data['type'] = 'couple_female';
                BookDetail::create($kids_data);
            }
        }
        return response()->json(['error' => false, 'message' => 'Wait for admin approvel.', 'data' => 'tel:+918299619469']);
    }

    public function checkout()
    {
        if (session()->exists('guastdata')) {
            $book_passes = session('book_passes');
            $offer = Offers::select('tbl_offers.*', 'tbl_address.flat_no', 'tbl_address.landmark', 'tbl_address.state', 'tbl_address.city', 'tbl_address.pincode')
                ->join('tbl_address', 'tbl_address.user_id', '=', 'tbl_offers.club_id', 'left')
                ->where('tbl_offers.id', $book_passes['offer_id'])
                ->first();
            $categorys = explode(',', $offer['offer_category_ids']);
            $offer['sub_category_name'] = OffersCategory::whereIn('id', $categorys)->get()->toArray();
            $data['offer'] = $offer;
            $data['book_passes'] = $book_passes;
            return view('web.checkout', $data);
        } else {
            return redirect('guest-login');
        }
    }

    public function guest_register()
    {
        $book_passes = session('book_passes');
        if (session()->exists('guastdata')) {
            return redirect('booking-form/' . $book_passes['offer_id']);
        } else {
            return view('web.guest_register');
        }
    }

    public function guest_signup(Request $request)
    {
        $post['name'] =  $request['name'];
        $post['email'] = $request['email'];
        $post['contact_no'] = $request['contact_no'];
        $post['password'] = Hash::make($request['password']);
        $post['gender'] = $request['gender'];
        $post['status'] = '0';
        $user = Guests::where('email', $request['email'])->first();
        if (!empty($user)) {
            return redirect()->back()->with('error', 'email must be unique');
        } else {
            $insert = Guests::create($post);
            return redirect('guest-login')->with('success', 'Your registration has been completed successfully. please login to continue.');
        }
    }
    public function guest_login()
    {
        $book_passes = session('book_passes');
        if (session()->exists('guastdata')) {
            return redirect('booking-form/' . $book_passes['offer_id']);
        } else {
            return view('web.guest_login');
        }
    }

    public function book_passes(Request $request)
    {
        $data['stage_count'] = $request['stage_input'];
        $data['couple_count'] = $request['couple_input'];
        $data['kids_count'] = $request['kids_input'];
        $data['offer_id'] = $request['offer_id'];
        $request->session()->put('book_passes', $data);
        if (session()->exists('guastdata')) {
            $url = "checkout";
        } else {
            $url = "guest-login";
        }
        return response()->json(['error' => false, 'message' => 'Book passes', 'data' => $url]);
    }

    public function submit_guast_login(Request $request)
    {
        $post['email'] = $request['email'];
        $post['password'] = $request['password'];
        $guests = Guests::where('email', $post['email'])->first();
        if (!empty($guests)) {
            if (Hash::check($post['password'], $guests->password)) {
                $request->session()->put('guastdata', $guests);
                return redirect('checkout');
            } else {
                return redirect()->back()->with('error', 'password Incorrect!');
            }
        } else {
            return redirect()->back()->with('error', 'Email Not Exit!');
        }
    }

    public function apply_coupan_code(Request $request)
    {
        $coupan = $request['coupan'];
        if ($coupan == "PRTYWT-500") {
            echo true;
        } else {
            echo false;
        }
    }
    public function deal_filter()
    {
        return view('web.deal_filter');
    }


    public function hdfc()
    {
        return view('web.hdfc');
    }

    public function ccavRequestHandler(Request $request)
    {
        $merchant_data = '2';
        $working_key = 'D00DC49BAB5127C5905C08531430A604'; //Shared by CCAVENUES
        $access_code = 'AVDM04KC74BW80MDWB'; //Shared by CCAVENUES

        foreach ($_POST as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }

        $encrypted_data = encrypts($merchant_data, $working_key); // Method for encrypting the data.

        return view('web.ccavRequestHandler', ['encrypted_data' => $encrypted_data]);
    }

    public function payment_status(Request $request)
    {
        $workingKey = 'D00DC49BAB5127C5905C08531430A604';        //Working Key should be provided here.
        $encResponse = $request["encResp"];            //This is the response sent by the CCAvenue Server
        $rcvdString = decrypts($encResponse, $workingKey);        //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        echo "<center>";

        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3)    $order_status = $information[1];
        }

        if ($order_status === "Success") {
            echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
        } else if ($order_status === "Aborted") {
            echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
        } else if ($order_status === "Failure") {
            echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
        } else {
            echo "<br>Security Error. Illegal access detected";
        }

        echo "<br><br>";

        echo "<table cellspacing=4 cellpadding=4>";
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            echo '<tr><td>' . $information[0] . '</td><td>' . $information[1] . '</td></tr>';
        }

        echo "</table><br>";
        echo "</center>";
    }
}
