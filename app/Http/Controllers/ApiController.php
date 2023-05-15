<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ArtistList;
use App\Models\ArtistSubcategory;
use App\Models\UserReferral;
use App\Models\UserProfiles;
use App\Models\ContactAs;
use App\Models\MusicianList;
use App\Models\Genres;
use App\Models\Venue;
use App\Models\UserMedia;
use App\Models\OrignalSong;
use App\Models\Address;
use App\Models\BankDetail;
use App\Models\ClubProfileInfo;
use App\Models\ClubeDetail;
use App\Models\ClubFloorDetail;
use App\Models\ServiceAgreement;
use App\Models\Bank;
use App\Models\Instruments;
use App\Models\SelectIntrument;
use App\Models\Budget;
use App\Models\City;
use App\Models\CityPrice;
use App\Models\Products;
use App\Models\RequestBookings;
use App\Models\EventType;
use App\Models\Events;
use App\Models\ManagerDetail;
use App\Models\Languages;
use App\Models\SelecteSubcategories;
use App\Models\Offers;
use App\Models\Rewards;
use App\Models\RewardClaim;
use App\Models\TempUsers;
use App\Models\OffersCategory;
use App\Models\OffersBook;
use App\Models\BookDetail;
use App\Models\Guests;
use App\Models\NotifyEmails;
use App\Models\SelectedVenue;
use App\Models\BookArtist;
use App\Models\GuastTopBanner;
use App\Models\GuastMiddleBanner;
use App\Models\BestOffers;
use App\Models\HighlyRecommended;
use App\Models\topclubs;
use App\Models\LiveClubParform;
use App\Models\BottomBanners;
use App\Models\PopularClub;
use App\Models\Coupon;
use App\Models\PromoCode;
use App\Models\DealType;
use App\Models\Deals;
use App\Models\DealImage;
use App\Models\JumpStartMenu;
use App\Models\FoodMenu;
use App\Models\BevarageMenu;
use App\Models\Cart;
use App\Models\Favourite;
use App\Models\DealDayTime;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function singup(Request $request)
    {
        $user = User::where('email', $request['email'])->orWhere('contact_no', $request['contact_no'])->first();
        if (empty($user)) {
            $post['username'] = $request['username'];
            $post['contact_no'] = $request['contact_no'];
            $post['watsapp_no'] = $request['watsapp_no'];
            $post['email'] = $request['email'];
            $post['password'] = Hash::make($request['password']);
            $post['gender'] = $request['gender'];
            $post['fcm'] = $request['fcm'];
            $post['last_login'] = date('Y-m-d h:i:s');
            $post['status'] = '0';
            $post['referral_code'] = Str::random(16);
            $post['latitude'] = $request['lat'];
            $post['logitude'] = $request['long'];
            if (!empty($request['role'])) {
                $post['role'] = $request['role'];
            }

            $otp = random_int(1000, 9999);
            $post['otp'] = $otp;
            $this->sendsms($otp, $request['contact_no']);
            $inser_id = User::create($post);
            if ($inser_id) {
                return response()->json(['error' => false, 'message' => 'Sign up successfully', 'data' => ['id' => $inser_id->id, 'otp' => $otp]]);
            } else {
                return response()->json(['error' => true, 'message' => 'Something error', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'user Cradantial already exist.', 'data' => NULL]);
        }
    }

    public function GuestSignup(Request $request)
    {
        $post['name'] =  $request['name'];
        $post['email'] = $request['email'];
        $post['contact_no'] = $request['contact_no'];
        $post['password'] = Hash::make($request['password']);
        $post['gender'] = $request['gender'];
        $post['status'] = '0';
        $otp = random_int(1000, 9999);
        $post['otp'] = $otp;
        $post['latitude'] = $request['lat'];
        $post['logitude'] = $request['long'];
        $user = Guests::where('email', $request['email'])->first();
        if (!empty($user)) {
            return response()->json(['error' => true, 'message' => 'Email must be unique', 'data' => NULL]);
        } else {
            $insert = Guests::create($post);
            RewardClaim::create(['guast_id' => $insert->id, 'reward_id' => '1']);
            $this->sendsms($otp, $request['contact_no']);
            return response()->json(['error' => false, 'message' => 'Sign up successfully', 'data' => ['id' => $insert->id, 'otp' => $otp]]);
        }
    }

    public function GuestLogin(Request $request)
    {
        $post['email'] = $request['email'];
        $post['password'] = $request['password'];
        $guests = Guests::where('email', $post['email'])->first();
        if (!empty($guests)) {
            if (Hash::check($post['password'], $guests->password)) {
                return response()->json(['error' => false, 'message' => 'login Successfully', 'data' => $guests]);
            } else {
                return response()->json(['error' => true, 'message' => 'password Incorrect!', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Email Not Exit!', 'data' => NULL]);
        }
    }

    public function GuestProfileUpdate(Request $request)
    {
        $id = $request['guest_id'];
        unset($request['guest_id']);
        $post['name'] = $request['name'];
        $post['email'] = $request['email'];
        $post['contact_no'] = $request['contact_no'];
        $post['password'] = Hash::make($request['password']);
        $post['gender'] = $request['gender'];
        $otp = random_int(1000, 9999);
        $post['otp'] = $otp;
        $this->sendsms($otp, $request['contact_no']);
        $data['otp'] = $otp;
        Guests::where('id', $id)->update($post);
        return response()->json(['error' => false, 'message' => 'Updated Successfully', 'data' => $data]);
    }

    public function UserProfileUpdate(Request $request)
    {
        $id = $request['user_id'];
        unset($request['user_id']);
        $post['username'] = $request['username'];
        $post['contact_no'] = $request['contact_no'];
        $post['watsapp_no'] = $request['watsapp_no'];
        $post['email'] = $request['email'];
        $post['password'] = Hash::make($request['password']);
        $post['gender'] = $request['gender'];
        $otp = random_int(1000, 9999);
        $post['otp'] = $otp;
        $post['fcm'] = $request['fcm'];
        $this->sendsms($otp, $request['contact_no']);
        $data['otp'] = $otp;

        User::where('id', $id)->update($post);
        return response()->json(['error' => false, 'message' => 'Updated Successfully', 'data' => $data]);
    }

    public function AuthGuest(Request $request)
    {
        $guests = Guests::where('email', $request['email'])->first();
        if (empty($guests)) {
            $post['name'] = $request['name'];
            $post['email'] = $request['email'];
            $post['last_login'] = date('Y-m-d h:i:s');
            $post['status'] = '0';
            $post['auth_type'] = $request['auth_type'];
            $post['latitude'] = $request['lat'];
            $post['logitude'] = $request['long'];
            $insert = Guests::create($post);
            RewardClaim::create(['guast_id' => $insert->id, 'reward_id' => '1']);
            $Guests = Guests::select('tbl_guasts.id', 'tbl_reward_claims.reward_id', 'tbl_rewards.reward_name', 'tbl_rewards.description')
                ->leftjoin('tbl_reward_claims', 'tbl_reward_claims.guast_id', '=', 'tbl_guasts.id')
                ->leftjoin('tbl_rewards', 'tbl_rewards.id', '=', 'tbl_reward_claims.reward_id')
                ->where(['tbl_guasts.id' => $insert->id])
                ->first();
            return response()->json(['error' => false, 'message' => 'Sign up successfully', 'data' => $Guests]);
        } else {
            return response()->json(['error' => true, 'message' => 'Email Already Exist.', 'data' => $guests]);
        }
    }

    public function AuthUser(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        if (empty($user)) {
            $post['username'] = $request['username'];
            $post['email'] = $request['email'];
            $post['last_login'] = date('Y-m-d h:i:s');
            $post['status'] = '0';
            $post['referral_code'] = Str::random(16);
            $post['auth_type'] = $request['auth_type'];
            $post['latitude'] = $request['lat'];
            $post['logitude'] = $request['long'];
            if (!empty($request['role'])) {
                $post['role'] = $request['role'];
            }
            $inser_id = User::create($post);
            $inser_user = User::where('id', $inser_id->id)->first();
            return response()->json(['error' => false, 'message' => 'Sign up successfully', 'data' => $inser_user]);
        } else {
            $artists_type_id = UserProfiles::where('user_id', $user->id)->first();
            if (!empty($artists_type_id)) {
                $user->artists_type_id = $artists_type_id->artists_type_id;
            } else {
                $user->artists_type_id = "";
            }
            return response()->json(['error' => true, 'message' => 'Email Already Exist.', 'data' => $user]);
        }
    }

    public function login(Request $request)
    {
        $post['email'] = $request['email'];
        $post['password'] = $request['password'];
        $user = User::where('email', $post['email'])->first();
        if (!empty($user)) {
            if (Hash::check($post['password'], $user->password)) {
                if ($user->end_page == "") {
                    $user->end_page = 'otp';
                }
                User::where('id', $user->id)->update(['fcm' => $request['fcm']]);
                $artists_type_id = UserProfiles::where('user_id', $user->id)->first();
                if (!empty($artists_type_id)) {
                    $user->artists_type_id = $artists_type_id->artists_type_id;
                } else {
                    $user->artists_type_id = "";
                }
                return response()->json(['error' => false, 'message' => 'login Successfully', 'data' => $user]);
            } else {
                return response()->json(['error' => true, 'message' => 'password Incorrect!', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Email Not Exit!', 'data' => NULL]);
        }
    }

    public function ForgotPassword(Request $request)
    {
        $email = $request['email'];
        $user = User::where('email', $email)->first();
        if (!empty($user)) {
            $data["email"] = $user->email;
            $data["name"] = $user->username;
            $data["subject"] = "Forget Password";
            $otp = rand(1111, 9999);
            User::where('id', $user->id)->update(['otp' => $otp]);
            $Data['otp'] = $otp;
            $Data['user'] = $user;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'authkey' => '385912ArDLd05QSgHe6385dd49P1'
            ])
                ->post('https://api.msg91.com/api/v5/email/send', [
                    'to' => [
                        [
                            'name' => $data["name"],
                            'email' => $data["email"]
                        ]
                    ],
                    'from' => [
                        'name' => 'partywitty',
                        'email' => 'sayhello@partywitty.com'
                    ],
                    'domain' => 'partywitty.com',
                    'template_id' => 'forgotemail',
                    'variables' => [
                        'VAR1' => $data["name"],
                        'VAR2' => $otp
                    ]
                ]);

            // print_r($response->json());
            if ($response->failed()) {
                $error = $response->json();
                return response()->json(['error' => true, 'message' => 'HTTP Error: ' . $response->status() . ' - ' . $error['error'], 'data' => NULL]);
            } else {
                return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
            }
            // if (Mail::failures()) {
            //     return response()->json(['error' => true, 'message' => "Something went wrong please try again.", 'data' => NULL]);
            // } else {
            //     return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
            // }
        } else {
            return response()->json(['error' => true, 'message' => "Invalid Email.", 'data' => NULL]);
        }
    }

    /**
     * guast forgot password
     * */
    public function GuastForgotPassword(Request $request)
    {
        $email = $request['email'];
        $user = Guests::where('email', $email)->first();
        if (!empty($user)) {
            $data["email"] = $user->email;
            $data["name"] = $user->username;
            $data["subject"] = "Forget Password";
            $otp = rand(1111, 9999);
            Guests::where('id', $user->id)->update(['otp' => $otp]);
            $Data['otp'] = $otp;
            $Data['user'] = $user;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'authkey' => '385912ArDLd05QSgHe6385dd49P1'
            ])
                ->post('https://api.msg91.com/api/v5/email/send', [
                    'to' => [
                        [
                            'name' => $data["name"],
                            'email' => $data["email"]
                        ]
                    ],
                    'from' => [
                        'name' => 'partywitty',
                        'email' => 'sayhello@partywitty.com'
                    ],
                    'domain' => 'partywitty.com',
                    'template_id' => 'forgotemail',
                    'variables' => [
                        'VAR1' => $data["name"],
                        'VAR2' => $otp
                    ]
                ]);

            if ($response->failed()) {
                $error = $response->json();
                return response()->json(['error' => true, 'message' => 'HTTP Error: ' . $response->status() . ' - ' . $error['error'], 'data' => NULL]);
            } else {
                return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
            }
            // try {
            //     Mail::send('mail.forgot', $Data, function ($message) use ($data) {
            //         $message->to($data["email"], $data["name"])
            //             ->subject($data["subject"]);
            //     });
            // } catch (JWTException $exception) {
            //     return response()->json(['error' => true, 'message' => $exception->getMessage(), 'data' => NULL]);
            // }
            // if (Mail::failures()) {
            //     return response()->json(['error' => true, 'message' => "Something went wrong please try again.", 'data' => NULL]);
            // } else {
            //     return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
            // }
        } else {
            return response()->json(['error' => true, 'message' => "Invalid Email.", 'data' => NULL]);
        }
    }

    /**
     * OTP varify for users
     **/
    public function verify_otp(Request $request)
    {
        $id = $request['user_id'];
        $otp = $request['otp'];
        $verify = User::where(['id' => $id, 'otp' => $otp])->first();
        if (!empty($verify)) {
            User::where('id', $id)->update(['otp' => '0', 'end_page' => 'artist_hire']);
            return response()->json(['error' => false, 'message' => 'OTP Verify', 'data' => $verify]);
        } else {
            return response()->json(['error' => true, 'message' => 'Incorrect OTP, Try again.', 'data' => NULL]);
        }
    }

    /**
     * guast verify otp
     **/
    public function guast_verify_otp(Request $request)
    {
        $id = $request['guast_id'];
        $otp = $request['otp'];
        $verify = Guests::select('tbl_guasts.*', 'tbl_reward_claims.reward_id', 'tbl_rewards.reward_name', 'tbl_rewards.description')
            ->leftjoin('tbl_reward_claims', 'tbl_reward_claims.guast_id', '=', 'tbl_guasts.id')
            ->leftjoin('tbl_rewards', 'tbl_rewards.id', '=', 'tbl_reward_claims.reward_id')
            ->where(['tbl_guasts.id' => $id, 'tbl_guasts.otp' => $otp])
            ->first();
        if (!empty($verify)) {
            // Guests::where('id', $id)->update(['otp' => '0']);
            return response()->json(['error' => false, 'message' => 'OTP Verify', 'data' => $verify]);
        } else {
            return response()->json(['error' => true, 'message' => 'Incorrect OTP, Try again.', 'data' => NULL]);
        }
    }

    public function PasswordUpdate(Request $request)
    {
        User::where('id', $request['user_id'])->update(['password' => Hash::make($request['password'])]);
        return response()->json(['error' => false, 'message' => 'Password Reset Successfully.', 'data' => NULL]);
    }

    /**
     * guast password change
     */
    public function GuastPasswordUpdate(Request $request)
    {
        Guests::where('id', $request['guast_id'])->update(['password' => Hash::make($request['password'])]);
        return response()->json(['error' => false, 'message' => 'Password Reset Successfully.', 'data' => NULL]);
    }

    public function set_role(Request $request)
    {
        $id = $request['user_id'];
        $role = $request['role'];
        $role_update = User::where('id', $id)->update(['role' => $role]);
        if (!empty($role_update)) {
            User::where('id', $id)->update(['end_page' => 'referral_code']);
            return response()->json(['error' => false, 'message' => 'Role Updated Successfully', 'data' => ['role' => $role]]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something wants wrong!', 'data' => NULL]);
        }
    }

    public function send_request(Request $request)
    {
        $post['request_by'] = $request['request_by'];
        $post['request_to'] = $request['request_to'];
        $post['status'] = '0';
        $insert = UserReferral::create($post);
        if (!empty($insert)) {
            $by = User::where('id', $request['request_by'])->first();
            $by_name = $by->username;
            $user = User::find($request['request_to']);
            $fcm[] = $user->fcm;
            $this->sendNotification('Hi ' . $user->username . ', You  have received a requested for the referral code from ' . $by_name . '  for profile completion at PartyWitty', 'New Request', $fcm, 'Artist_request');
            return response()->json(['error' => false, 'message' => 'Request Send Successfully', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something wants wrong!', 'data' => NULL]);
        }
    }

    public function accept_reject_request(Request $request)
    {
        $insert = UserReferral::where(['request_by' => $request['request_by'], 'request_to' => $request['request_to']])->update(['status' => $request['status']]);
        if (!empty($insert)) {
            $to = User::find($request['request_to']);
            $to_name = $to->username;
            $user = User::find($request['request_by']);

            $fcm[] = $user->fcm;
            if ($request['status'] == '1') {
                $this->sendNotification('Dear ' . $user->username . ' I’m inviting you JOIN partywitty Artist Pool, a simple and most efficient Live artist Booking', 'New Request', $fcm, 'accept_reject_request');
                return response()->json(['error' => false, 'message' => 'Request Accepted', 'data' => NULL]);
            } elseif ($request['status'] == '2') {
                $this->sendNotification('Oops,  your request for the referral code has been turned down. Don\'t be sad you can request again to another fellow Artist.', 'New Request', $fcm, 'accept_reject_request');
                return response()->json(['error' => false, 'message' => 'Request Rejected', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Something wants wrong!', 'data' => NULL]);
        }
    }

    public function referral_code(Request $request)
    {
        $request_by = $request['user_id'];
        $referral_code = $request['referral_code'];
        $requestTO = User::where('referral_code', $referral_code)->first();

        if (!empty($requestTO)) {
            $request_to = $requestTO->id;
            $update = UserReferral::where(['request_by' => $request_by, 'request_to' => $request_to, 'status' => '1'])->update(['referral_code' => $referral_code]);

            if ($update) {
                User::where('id', $request_by)->update(['end_page' => 'artist_type']);

                return response()->json(['error' => false, 'message' => 'Referral Code updated Successfully', 'data' => NULL]);
            } else {
                return response()->json(['error' => true, 'message' => 'Referral Code Not accept.', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Incorrect Referral Code.', 'data' => NULL]);
        }
    }

    public function list_of_artist(Request $request)
    {
        $request_by = $request['user_id'];
        $artists = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id')
            ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id')
            ->where('tbl_user_media.type', '0')
            ->where('tbl_users.role', '=', 'Artist')
            ->where('tbl_users.status', '=', '1')
            ->orderBy('tbl_users.id', 'DESC')
            ->get()->toArray();
        $data_array = [];
        // echo date('Y-m-d', strtotime('-30 days'));~
        // echo date('Y-m-d');die;
        foreach ($artists as &$artist) {
            $UserReferral = UserReferral::where('request_to', $artist['id'])->where('request_by', $request_by)->first();
            $count_artist = UserReferral::where('request_to', $artist['id'])->where('request_by', '!=', $request_by)->Where('request_to', '!=', '1')->where('status', '=', '1')->whereBetween('created_at', [date('Y-m-d', strtotime('-30 days')) . " 00:00:00", date('Y-m-d') . " 23:59:59"])->get()->toArray();
            if (count($count_artist) > 2) {
                $artist['color'] = 'red';
            } else {
                $artist['color'] = 'green';
            }

            if (!empty($UserReferral)) {
                $artist['request_to'] = $UserReferral['request_to'];
                $artist['refer_status'] = $UserReferral['status'];
            } else {
                $artist['request_to'] = NULL;
                $artist['refer_status'] = NULL;
            }
            $data_array[] = $artist;
        }
        $request_by_status = UserReferral::where('request_by', $request_by)->first();
        if (!empty($request_by_status)) {
            $data['request_by_status'] = '1';
        } else {
            $data['request_by_status'] = '0';
        }
        $user = UserMedia::where(['user_id' => $request_by, 'type' => '15'])->first();
        if (!empty($user)) {
            $data['is_profile'] = '1';
        } else {
            $data['is_profile'] = '0';
        }
        $data['artists'] = $data_array;
        return response()->json(['error' => true, 'message' => 'Artist List', 'data' => $data]);
    }

    public function AllArtist(Request $request)
    {
        $request_by = $request['user_id'];
        $data = UserProfiles::select('tbl_users.*', 'tbl_user_profiles.id as profile_id', 'tbl_user_profiles.artists_type_id', 'tbl_user_profiles.artist_name as type_of_artist_name', 'tbl_user_media.file_path as profile')
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_user_profiles.user_id')
            ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_users.id')
            ->where('tbl_user_media.type', '0')
            ->where('tbl_users.role', '=', 'Artist')
            ->where('tbl_users.status', '=', '1')
            ->orderBy('tbl_users.id', 'DESC')
            ->get()->toArray();
        foreach ($data as &$val) {
            $val['rating'] = '3.2';
            $val['is_like'] = '1';
            $val['total_like'] = '100';
        }
        return response()->json(['error' => true, 'message' => 'Artist List', 'data' => $data]);
    }

    public function RequestList(Request $request)
    {
        $request_to = $request['user_id'];
        $data['requests'] = UserReferral::select('tbl_user_referral.*', 'tbl_users.username', 'tbl_user_media.file_path as user_profile')
            ->join('tbl_users', 'tbl_user_referral.request_by', '=', 'tbl_users.id')
            ->join('tbl_user_media', 'tbl_user_media.user_id', '=', 'tbl_user_referral.request_by')
            ->where('tbl_user_media.type', '15')
            ->where('request_to', $request_to)->get()->toArray();
        return response()->json(['error' => true, 'message' => 'Request List', 'data' => $data]);
    }


    public function GetTypeOfArtist(Request $request)
    {
        $user_id = $request['user_id'];
        $artists = ArtistList::where('status', '1')->get()->toArray();
        foreach ($artists as &$artist) {
            $ArtistSubcategory = ArtistSubcategory::where('artists_type_id', $artist['id'])->get()->toArray();
            if ($artist['id'] > 3) {
                $artist['subcategory'] = '2';
            } else {
                if (!empty($ArtistSubcategory)) {
                    $artist['subcategory'] = '1';
                } else {
                    $artist['subcategory'] = '0';
                }
            }
        }
        $data['artist'] = $artists;
        $selected = UserProfiles::select('artists_type_id', 'artist_name')->where('user_id', $user_id)->first();
        if (!empty($selected)) {
            $data['selected'] = $selected;
        } else {
            $data['selected'] = Null;
        }

        if (!empty($artists)) {
            return response()->json(['error' => false, 'message' => 'Type Of Artist', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Empty !', 'data' => NULL]);
        }
    }

    public function TypeOfArtistSearch(Request $request)
    {
        $ArtistList = ArtistList::where('name', 'like', '%' . $request['search'] . '%')->get()->toArray();
        if (!empty($ArtistList)) {
            return response()->json(['error' => true, 'message' => 'search Artist List', 'data' => $ArtistList]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function TypeOfArtistSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_of_artist_id' => 'required',
            'type_of_artist_name' => 'required',
            'user_id' => 'required',
        ], [
            'artist_id.required' => 'Artist id is required',
            'artist_name.required' => 'Artist Name is required',
            'user_id.required' => 'User id is required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator, 'data' => NULL]);
        }

        $artist_id = $request['type_of_artist_id'];
        $artist_name = $request['type_of_artist_name'];
        $user_id = $request['user_id'];
        // $getprofile = UserProfiles::where('user_id', $user_id)->first();
        // if (!empty($getprofile)) {
        //     UserProfiles::where('user_id', $user_id)->update(['artists_type_id' => $artist_id, 'artist_name' => $artist_name]);
        // } else {
        $userprofile = UserProfiles::create(['user_id' => $user_id, 'artists_type_id' => $artist_id, 'artist_name' => $artist_name]);
        // }
        $data['profile_id'] = $userprofile->id;
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $user_id)->update(['end_page' => 'photographs', 'profile_id' => $userprofile->id]);
        }
        ~$data['type_of_artist_id'] = $artist_id;
        return response()->json(['error' => false, 'message' => 'Type Of Artist update successfully', 'data' => $data]);
    }

    public function ArtistSubcategory(Request $request)
    {
        $user_id = $request['user_id'];
        $subcategory = ArtistSubcategory::where(['status' => '1', 'artists_type_id' => $request['type_of_artist_id']])->get()->toArray();
        foreach ($subcategory as &$value) {
            $get = Instruments::where('subcategory_id', $value['id'])->get()->toArray();
            if (!empty($get)) {
                $value['status'] = '1';
            } else {
                $value['status'] = '0';
            }
        }
        $data['subcategory'] = $subcategory;
        if ($request['type_of_artist_id'] == '2') {
            $selected = UserProfiles::select('subcategory_id', 'subcategory_name')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
            $selectedData = [];
            $sub_category_name = explode(',', $selected->subcategory_name);
            $sub_category_id = (!empty($selected->subcategory_id) ? (explode(',', $selected->subcategory_id)) : []);


            if (!empty($sub_category_id)) {
                for ($i = 0; $i < count($sub_category_id); $i++) {
                    $Data['sub_category_id'] = (int)$sub_category_id[$i];
                    $Data['sub_category_name'] = $sub_category_name[$i];
                    $selectedData[] = $Data;
                }
            }
            if (!empty($selectedData)) {
                $data['selected'] = $selectedData;
            } else {
                $data['selected'] = Null;
            }
        } else {
            $SelecteSubcategories = SelecteSubcategories::where('user_id', $user_id)->where('profile_id', $request['profile_id'])->get()->toArray();
            $data_array = [];
            foreach ($SelecteSubcategories as $selected_subcategory) {
                $dataarray['sub_category_id'] = $selected_subcategory['subcategory_id'];
                $dataarray['sub_category_name'] = ArtistSubcategory::where('id', $selected_subcategory['subcategory_id'])->first()->name;
                $data_array[] = $dataarray;
            }

            if (!empty($data_array)) {
                $data['selected'] = $data_array;
            } else {
                $data['selected'] = Null;
            }
        }

        if (!empty($subcategory)) {
            return response()->json(['error' => false, 'message' => 'Type Of Artist Subcategory', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Empty !', 'data' => NULL]);
        }
    }

    public function searchSubcategoryArtist(Request $request)
    {
        $MusicianList = ArtistSubcategory::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        if (!empty($MusicianList)) {
            return response()->json(['error' => true, 'message' => 'search Sub Category Artist List', 'data' => $MusicianList]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function submitSubCategoryArtist(Request $request)
    {
        $user_id = $request['user_id'];
        // if already subcategory selected delete this user selected sub category.
        SelecteSubcategories::where('user_id', $user_id)->delete();
        // update userprofile table to selected category
        UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['subcategory_id' => $request->sub_category_id, 'subcategory_name' => $request->sub_category_name]);

        $Subcategories_ids = explode(',', $request->sub_category_id);
        $post['user_id'] = $user_id;
        $post['status'] = '0';
        $post['profile_id'] = $request['profile_id'];
        foreach ($Subcategories_ids as $Subcategories_id) {
            $post['subcategory_id'] = $Subcategories_id;
            SelecteSubcategories::create($post);
        }

        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        User::where('id', $request['user_id'])->update(['end_page' => 'subcategory-budgut/' . $select->id]);
        if (!empty($select)) {
            return response()->json(['error' => false, 'message' => 'Sub Category Artist Submit Successfully.', 'data' => $select]);
        } else {
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => NUll]);
        }
    }
    // public function submitSubCategoryArtist(Request $request)
    // {
    //     if ($request['type_of_artist_id'] == '1') {
    //         $post['user_id'] = $request['user_id'];
    //         SelecteSubcategories::where('user_id', $request['user_id'])->delete();

    //         $user_id = $request['user_id'];
    //         $sub_category_id = $request->sub_category_id;
    //         $sub_category_name = $request->sub_category_name;
    //         UserProfiles::where('user_id', $user_id)->update(['subcategory_id' => $sub_category_id, 'subcategory_name' => $sub_category_name]);
    //         User::where('id', $user_id)->update(['end_page' => 'genres']);

    //         $Subcategories_ids = explode(',', $request->sub_category_id);
    //         foreach ($Subcategories_ids as $Subcategories_id) {
    //             $post['subcategory_id'] = $Subcategories_id;
    //             SelecteSubcategories::create($post);
    //         }
    //         return response()->json(['error' => false, 'message' => 'Sub Category Artist Submit Successfully.', 'data' => NULL]);
    //     } else {
    //         if (!empty($request->sub_category_id)) {
    //             $user_id = $request['user_id'];
    //             $sub_category_id = $request->sub_category_id;
    //             $sub_category_name = $request->sub_category_name;
    //             UserProfiles::where('user_id', $user_id)->update(['subcategory_id' => $sub_category_id, 'subcategory_name' => $sub_category_name]);
    //             User::where('id', $user_id)->update(['end_page' => 'genres']);
    //             return response()->json(['error' => false, 'message' => 'Sub Category Artist Submit Successfully.', 'data' => NULL]);
    //         } else {
    //             return response()->json(['error' => true, 'message' => 'You have not selected Sub Category.', 'data' => NULL]);
    //         }
    //     }
    // }

    public function GetGenres(Request $request)
    {
        $user_id = $request['user_id'];
        $Genres = Genres::where('status', '1')->get()->toArray();
        $data['genres'] = $Genres;
        $selected = UserProfiles::select('genres_id', 'genres_name')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $selectedData = [];
        $genres_name = (!empty($selected->genres_name) ? explode(',', $selected->genres_name) : []);
        $genres_id = (!empty($selected->genres_id) ? (explode(',', $selected->genres_id)) : []);
        if (!empty($genres_id)) {
            for ($i = 0; $i < count($genres_id); $i++) {
                $Data['genres_id'] = $genres_id[$i];
                $Data['genres_name'] = $genres_name[$i];
                $selectedData[] = $Data;
            }
        }

        if (!empty($selectedData)) {
            $data['selected'] = $selectedData;
        } else {
            $data['selected'] = Null;
        }
        if (!empty($Genres)) {
            return response()->json(['error' => false, 'message' => 'Type Of Genres', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Empty !', 'data' => NULL]);
        }
    }

    public function SearchGenres(Request $request)
    {
        $Venues = Genres::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        if (!empty($Venues)) {
            return response()->json(['error' => true, 'message' => 'search Venues', 'data' => $Venues]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function SubmitGenres(Request $request)
    {
        if (!empty($request->selected_genres)) {
            $user_id = $request['user_id'];
            UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['genres_id' => $request['selected_genres'], 'genres_name' => $request['selected_genres_name']]);
            if (!isset($request['end_page']) && empty($request['end_page'])) {
                User::where('id', $user_id)->update(['end_page' => 'language']);
            }
            return response()->json(['error' => false, 'message' => 'Genre of Music Submited Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'You have not selected any Genre of Music.', 'data' => NULL]);
        }
    }

    public function SubmitLanguage(Request $request)
    {
        if (!empty($request->language_ids)) {
            $user_id = $request['user_id'];
            UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['language_ids' => $request['language_ids'], 'languages' => $request['languages']]);
            User::where('id', $user_id)->update(['end_page' => 'venue']);
            return response()->json(['error' => false, 'message' => 'Language Submited Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'You have not selected any Language.', 'data' => NULL]);
        }
    }

    public function DeleteSelectedLanguage(Request $request)
    {
        $user_id = $request['user_id'];
        $selected = UserProfiles::select('language_ids', 'languages')->where('user_id', $user_id)->first();
        $languages = (!empty($selected->languages) ? explode(',', $selected->languages) : []);
        $language_ids = (!empty($selected->language_ids) ? (explode(',', $selected->language_ids)) : []);
        if (($key = array_search($request['languages'], $languages)) !== false) {
            unset($languages[$key]);
        }
        if (($key = array_search($request['language_ids'], $language_ids)) !== false) {
            unset($language_ids[$key]);
        }
        $lang = (!empty($languages)) ? implode(',', $languages) : "";
        $lang_id = (!empty($language_ids)) ? implode(',', $language_ids) : "";
        UserProfiles::where('user_id', $user_id)->update(['language_ids' => $lang_id, 'languages' => $lang]);
        return response()->json(['error' => false, 'message' => 'Language updated Successfully.', 'data' => NULL]);
    }

    public function UpdateSelectedLanguage(Request $request)
    {
        $user_id = $request['user_id'];
        $selected = UserProfiles::select('language_ids', 'languages')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $languages = (!empty($selected->languages) ? explode(',', $selected->languages) : []);
        $language_ids = (!empty($selected->language_ids) ? (explode(',', $selected->language_ids)) : []);
        array_push($languages, $request['languages']);
        array_push($language_ids, $request['language_ids']);
        $lang = (!empty($languages)) ? implode(',', $languages) : "";
        $lang_id = (!empty($language_ids)) ? implode(',', $language_ids) : "";
        UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['language_ids' => $lang_id, 'languages' => $lang]);
        return response()->json(['error' => false, 'message' => 'Language updated Successfully.', 'data' => NULL]);
    }

    public function GetSelectedLanguage(Request $request)
    {
        $user_id = $request['user_id'];
        $selected = UserProfiles::select('language_ids', 'languages')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $selectedData = [];
        $languages = (!empty($selected->languages) ? explode(',', $selected->languages) : []);
        $language_ids = (!empty($selected->language_ids) ? (explode(',', $selected->language_ids)) : []);
        if (!empty($language_ids)) {
            for ($i = 0; $i < count($language_ids); $i++) {
                $Data['language_ids'] = $language_ids[$i];
                $Data['languages'] = $languages[$i];
                $selectedData[] = $Data;
            }
        }

        if (!empty($selectedData)) {
            $data = $selectedData;
        } else {
            $data = Null;
        }
        return response()->json(['error' => false, 'message' => 'You have selected Language.', 'data' => $data]);
    }

    public function GetVenue(Request $request)
    {
        $user_id = $request['user_id'];
        $Venue = Venue::where('status', '1')->get()->toArray();
        $data['genres'] = $Venue;
        $selected = UserProfiles::select('venue_id', 'venue_name')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $selectedData = [];
        $venue_id = explode(',', $selected->venue_id);
        $venue_name = explode(',', $selected->venue_name);
        $venue_id = (!empty($selected->venue_id) ? (explode(',', $selected->venue_id)) : []);
        if (!empty($venue_id)) {
            for ($i = 0; $i < count($venue_id); $i++) {
                $Data['venue_id'] = $venue_id[$i];
                $Data['venue_name'] = $venue_name[$i];
                $selectedData[] = $Data;
            }
        }
        if (!empty($selectedData)) {
            $data['selected'] = $selectedData;
        } else {
            $data['selected'] = Null;
        }
        if (!empty($Venue)) {
            return response()->json(['error' => false, 'message' => 'Type Of Venue', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Empty !', 'data' => NULL]);
        }
    }

    public function SearchVenue(Request $request)
    {
        $Venues = Venue::where('name', 'like', '%' . $request->search . '%')->get()->toArray();
        if (!empty($Venues)) {
            return response()->json(['error' => true, 'message' => 'search Venues', 'data' => $Venues]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function SubmitVenue(Request $request)
    {
        if (!empty($request->selected_venue)) {
            $user_id = $request['user_id'];
            UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['venue_id' => $request['selected_venue'], 'venue_name' => $request['selected_venue_name']]);
            User::where('id', $user_id)->update(['end_page' => 'stage']);
            return response()->json(['error' => false, 'message' => 'Perform Submited Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'You have not selected any Perform.', 'data' => NULL]);
        }
    }

    public function SubmitIntro(Request $request)
    {
        if (!empty($request['introduction'])) {
            $user_id = $request['user_id'];
            UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['introduction' => $request['introduction']]);
            User::where('id', $user_id)->update(['end_page' => 'video-upload']);
            return response()->json(['error' => false, 'message' => 'Introduction Submited Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Please Enter Introduction.', 'data' => NULL]);
        }
    }

    public function GetIntro(Request $request)
    {
        $data = UserProfiles::select('introduction')->where('user_id', $request['user_id'])->where('id', $request['profile_id'])->first();
        return response()->json(['error' => false, 'message' => 'Get Introduction Successfully.', 'data' => $data]);
    }

    public function GetMediaList(Request $request)
    {
        $user_id = $request['user_id'];
        $type = $request['type'];
        $photographs = UserMedia::where('type', $type)->where('is_delete', '0')->where('user_id', $user_id)->where('profile_id', $request['profile_id'])->get()->toArray();
        if (!empty($photographs)) {
            return response()->json(['error' => false, 'message' => 'Media Get Successfully.', 'data' => $photographs]);
        } else {
            return response()->json(['error' => true, 'message' => 'Photos Not Available.', 'data' => NULL]);
        }
    }

    public function GetUserProfiles(Request $request)
    {
        $UserProfiles = UserProfiles::where('user_id', $request['user_id'])->where('id', $request['profile_id'])->first();
        if (!empty($UserProfiles)) {
            return response()->json(['error' => false, 'message' => 'User Profile.', 'data' => $UserProfiles]);
        } else {
            return response()->json(['error' => true, 'message' => 'User Profile data not Found.', 'data' => NULL]);
        }
    }

    public function Streaming_platform(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['spotify_url'] = $request['spotify_url'];
        $post['amazon_prime'] = $request['amazon_prime'];
        $post['jio_savan'] = $request['jio_savan'];
        $post['apple_music'] = $request['apple_music'];
        $post['tidel'] = $request['tidel'];
        $post['deezer'] = $request['deezer'];
        $post['pandoora'] = $request['pandoora'];
        $post['qubon'] = $request['qubon'];
        $data = OrignalSong::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'social_link']);
        }

        if (!empty($data)) {
            unset($post['user_id']);
            OrignalSong::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->update($post);
        } else {
            $post['profile_id'] = $request['profile_id'];
            OrignalSong::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Steaming Platform update Successfully', 'data' => NULL]);
    }

    public function GetStreamingPlatform(Request $request)
    {
        $data = OrignalSong::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        return response()->json(['error' => false, 'message' => 'Get Steaming Platform Successfully', 'data' => $data]);
    }

    public function PostSocial(Request $request)
    {
        $user_id = $request['user_id'];
        $post['intagram_link'] = $request['intagram_link'];
        $post['intagram_follower'] = $request['intagram_follower'];
        $post['facebook_link'] = $request['facebook_link'];
        $post['facebook_follower'] = $request['facebook_follower'];
        UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update($post);
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'bank_details']);
        }
        return response()->json(['error' => false, 'message' => 'Social data updated Successfully.', 'data' => NULL]);
    }

    public function GetSocial(Request $request)
    {
        $data = UserProfiles::select('intagram_link', 'intagram_follower', 'facebook_link', 'facebook_follower')->where('user_id', $request['user_id'])->where('id', $request['profile_id'])->first();
        return response()->json(['error' => false, 'message' => 'Get Social data Successfully.', 'data' => $data]);
    }

    public function submitintagram(Request $request)
    {
        $user_id = $request['user_id'];
        $post['intagram_link'] = $request['intagram_link'];
        $post['intagram_follower'] = $request['intagram_follower'];
        UserProfiles::where('user_id', $user_id)->update($post);
        User::where('id', $request['user_id'])->update(['end_page' => 'facebook_data']);
        return response()->json(['error' => false, 'message' => 'Instagram data Submited Successfully.', 'data' => NULL]);
    }

    public function submitfbdata(Request $request)
    {
        $user_id = $request['user_id'];
        $post['facebook_link'] = $request['facebook_link'];
        $post['facebook_follower'] = $request['facebook_follower'];
        UserProfiles::where('user_id', $user_id)->update($post);
        User::where('id', $request['user_id'])->update(['end_page' => 'address']);
        $selected = SelecteSubcategories::where('user_id', $user_id)->first();
        if (!empty($selected)) {
            $data['subcategory'] = '1';
            $data['subcategory_id'] = $selected->subcategory_id;
        } else {
            $data['subcategory'] = NULL;
            $data['subcategory_id'] = NULL;
        }

        return response()->json(['error' => false, 'message' => 'Facebook data Submited Successfully.', 'data' => $data]);
    }

    public function SubcategoryPage(Request $request)
    {
        $user_id = $request['user_id'];
        $select = SelecteSubcategories::where(['user_id' => $user_id, 'status' => '0', 'profile_id' => $request['profile_id']])->first();
        if (!empty($select)) {
            $subcategory = ArtistSubcategory::where('id', $select->subcategory_id)->first();
            $data['instruments'] = Instruments::where('subcategory_id', $select->subcategory_id)->get()->toArray();
            $selected_instruments = SelectIntrument::where(['subcategory_id' => $select->subcategory_id, 'user_id' => $user_id, 'profile_id' => $request['profile_id']])->get()->toArray();
            $data_array = [];
            foreach ($selected_instruments as $selected_instrument) {
                $data_array[] = $selected_instrument['intrument_id'];
            }
            if (!empty($data_array)) {
                $data['selected_instruments'] = $data_array;
            } else {
                $data['selected_instruments'] = NULL;
            }
            $data['subcategory_id'] = $select->subcategory_id;
            $data['title'] = $subcategory->name . ' With What Instrument';
            return response()->json(['error' => false, 'message' => 'Get Subcategory Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found Successfully.', 'data' => NUll]);
        }
    }

    public function SubmitSubcategoryPage(Request $request)
    {
        $post['profile_id'] = $request['profile_id'];
        $post['user_id'] = $request['user_id'];
        $post['subcategory_id'] = $request['subcategory_id'];
        $intrument_ids = explode(',', $request['intrument_id']);
        SelectIntrument::where('user_id', $request['user_id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        foreach ($intrument_ids as $intrument_id) {
            // print_r($intrument_id);die;
            $post['intrument_id'] = $intrument_id;
            SelectIntrument::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Set Instruments Successfully.', 'data' => NULL]);
    }

    public function SubcategoryBudgut(Request $request)
    {
        $user_id = $request['user_id'];
        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $user_id, 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        if (!empty($select)) {
            return response()->json(['error' => false, 'message' => 'Get Subcategory Successfully.', 'data' => $select]);
        } else {
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => NUll]);
        }
    }

    public function AddBudget(Request $request)
    {
        $post['profile_id'] = $request['profile_id'];
        $post['user_id'] = $request['user_id'];
        $post['subcategory_id'] = $request['subcategory_id'];
        $private = isset($request['private']) ? json_decode($request['private']) : "";
        $club = isset($request['club']) ? json_decode($request['club']) : "";
        $corporate = isset($request['corporate']) ? json_decode($request['corporate']) : "";
        $private_image = !empty($request['private_image']) ? $request['private_image'] : "";
        $club_image = !empty($request['club_image']) ? $request['club_image'] : "";
        $corporate_image = !empty($request['corporate_image']) ? $request['corporate_image'] : "";

        if (!isset($request['end_page'])) {
            Budget::where(['user_id' => $request['user_id'], 'subcategory_id' => $request['subcategory_id'], 'profile_id' => $request['profile_id']])->delete();
        }
        if ($private != "") {
            for ($i = 0; $i < count($private); $i++) {
                if ($private[$i]->price != "") {
                    $post['venue_id'] = '1';
                    $post['intrument_ids'] = $private[$i]->intrument_ids;
                    $post['name'] = $private[$i]->name;
                    $post['price'] = $private[$i]->price;
                    if (!empty($private_image[$i])) {
                        $fileName = $i . time() . '.' . $private_image[$i]->extension();
                        $private_image[$i]->move(public_path('uploads'), $fileName);
                        $files[] = 'public/uploads/' . $fileName;
                        $post['image'] = 'public/uploads/' . $fileName;
                    }
                    Budget::create($post);
                }
            }
        }

        if ($club != "") {
            for ($i = 0; $i < count($club); $i++) {
                if ($club[$i]->price != "") {
                    $post['venue_id'] = '2';
                    $post['intrument_ids'] = $club[$i]->intrument_ids;
                    $post['name'] = $club[$i]->name;
                    $post['price'] = $club[$i]->price;
                    if (!empty($club_image[$i])) {
                        $fileName = $i . time() . '.' . $club_image[$i]->extension();
                        $club_image[$i]->move(public_path('uploads'), $fileName);
                        $files[] = 'public/uploads/' . $fileName;
                        $post['image'] = 'public/uploads/' . $fileName;
                    }
                    Budget::create($post);
                }
            }
        }

        if ($corporate != "") {
            for ($i = 0; $i < count($corporate); $i++) {
                if ($corporate[$i]->price != "") {
                    $post['venue_id'] = '3';
                    $post['intrument_ids'] = $corporate[$i]->intrument_ids;
                    $post['name'] = $corporate[$i]->name;
                    $post['price'] = $corporate[$i]->price;

                    if (!empty($corporate_image[$i])) {
                        $fileName = $i . time() . '.' . $corporate_image[$i]->extension();
                        $corporate_image[$i]->move(public_path('uploads'), $fileName);
                        $files[] = 'public/uploads/' . $fileName;
                        $post['image'] = 'public/uploads/' . $fileName;
                    }
                    Budget::create($post);
                }
            }
        }
        SelecteSubcategories::where(['user_id' => $request['user_id'], 'subcategory_id' => $request['subcategory_id'], 'profile_id' => $request['profile_id']])->update(['status' => '1']);
        if (isset($request['end_page']) && $request['end_page'] == 'venue') {
            $data['venue'] = SelectedVenue::select('tbl_selected_venue.venue_id as venue_id', 'tbl_venue.name as venue_name')->leftjoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_selected_venue.venue_id')->where('tbl_selected_venue.user_id', $request['user_id'])->where('tbl_selected_venue.profile_id', $request['profile_id'])->get()->toArray();
            $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
                ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
            if (!empty($select)) {
                $data['stage'] = $select;
                return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
            } else {
                $data['stage']['num_of_intrument'] = NULL;
                return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
            }
        } elseif (isset($request['end_page']) && $request['end_page'] == 'subcategory') {
            $selected = UserProfiles::select('venue_id', 'venue_name')->where('user_id', $request['user_id'])->where('id', $request['profile_id'])->first();
            $selectedData = [];
            $venue_id = explode(',', $selected->venue_id);
            $venue_name = explode(',', $selected->venue_name);
            $venue_id = (!empty($selected->venue_id) ? (explode(',', $selected->venue_id)) : []);
            if (!empty($venue_id)) {
                for ($i = 0; $i < count($venue_id); $i++) {
                    $Data['venue_id'] = $venue_id[$i];
                    $Data['venue_name'] = $venue_name[$i];
                    $selectedData[] = $Data;
                }
            }
            if (!empty($selectedData)) {
                $data['venue'] = $selectedData;
            } else {
                $data['venue'] = Null;
            }
            $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
                ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
            if (!empty($select)) {
                $data['stage'] = $select;
                return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
            } else {
                $data['stage']['num_of_intrument'] = NULL;
                return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
            }
        } else {

            $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
                ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();

            if (!empty($select)) {
                User::where('id', $request['user_id'])->update(['end_page' => 'subcategory-budgut/' . $select->id]);
                return response()->json(['error' => false, 'message' => 'Budget Added Successfully.', 'data' => $select]);
            } else {
                if (!isset($request['end_page'])) {
                    User::where('id', $request['user_id'])->update(['end_page' => 'price_summary']);
                }
                $data['num_of_intrument'] = NULL;
                return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
            }
        }
    }

    public function SummaryOfBudget(Request $request)
    {
        $data = Budget::leftJoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_budget.venue_id')
            ->leftJoin('tbl_artist_subcategory', 'tbl_budget.subcategory_id', '=', 'tbl_artist_subcategory.id')
            ->select('tbl_budget.*', 'tbl_venue.name as venue_name', 'tbl_artist_subcategory.name as subcategory_name')
            ->where('tbl_budget.user_id', '=', $request['user_id'])
            ->where('tbl_budget.profile_id', '=', $request['profile_id'])
            ->get()->toArray();
        foreach ($data as &$row) {
            $intrument_ids = explode(',', $row['intrument_ids']);
            $row['intrument_name'] = Instruments::select(DB::raw("GROUP_CONCAT(name) as intruments"))
                ->whereIn('id', $intrument_ids)
                ->get()->first()->intruments;
        }
        return response()->json(['error' => false, 'message' => 'Get Budget Successfully.', 'data' => $data]);
    }

    public function SubmitAddress(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['flat_no'] = $request['flat_no'];
        $post['landmark'] = $request['landmark'];
        $post['state'] = $request['state'];
        $post['city'] = $request['city'];
        $post['pincode'] = $request['pincode'];
        $post['aadhar_number'] = $request['aadhar_number'];
        $post['profile_id'] = $request['profile_id'];
        if ($request->id_proof) {
            $fileName = time() . '.' . $request->id_proof->extension();
            $request->id_proof->move(public_path('/id_proof/'), $fileName);
            $post['id_proof'] = 'public/id_proof/' . $fileName;
        }
        $data = Address::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'city_budget']);
        }

        if (!empty($data)) {
            unset($post['user_id']);
            unset($post['profile_id']);
            Address::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->update($post);
        } else {
            Address::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Address Detail Submited Successfully.', 'data' => NULL]);
    }

    public function SubmitBankDetail(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['bankname'] = $request['bankname'];
        $post['branch'] = $request['branch'];
        $post['acount_number'] = $request['acount_number'];
        $post['ifsccode'] = $request['ifsccode'];
        $post['pan_number'] = $request['pan_number'];
        $post['pan_name'] = $request['pan_name'];
        $post['profile_id'] = $request['profile_id'];
        if ($request->cancel_chaque) {
            $fileName = time() . '.' . $request->cancel_chaque->extension();
            $request->cancel_chaque->move(public_path('/cancel_chaque/'), $fileName);
            $post['cancel_chaque'] = 'public/cancel_chaque/' . $fileName;
        }

        $data = BankDetail::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'service_agreement']);
        }

        if (!empty($data)) {
            BankDetail::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->update($post);
        } else {
            BankDetail::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Bank Detail Submited Successfully.', 'data' => NULL]);
    }

    public function GetAddress(Request $request)
    {
        $address = Address::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        if (!empty($address)) {
            return response()->json(['error' => false, 'message' => 'Address Detail.', 'data' => $address]);
        } else {
            return response()->json(['error' => true, 'message' => 'Address Detail Not Found!', 'data' => NULL]);
        }
    }

    public function GetBankDetail(Request $request)
    {
        $bankdetail = BankDetail::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        if (!empty($bankdetail)) {
            return response()->json(['error' => false, 'message' => 'Bank Detail.', 'data' => $bankdetail]);
        } else {
            return response()->json(['error' => true, 'message' => 'Bamk Detail Not Found!', 'data' => NULL]);
        }
    }

    public function submitClubProfileInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name_of_club' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'iam' => 'required',
            'poc' => 'required',
        ], [
            'user_id.required' => 'user_id required.',
            'name_of_club.required' => 'Club Name Required',
            'address.required' => 'Address Required',
            'landmark.required' => 'Landmark Required',
            'state.required' => 'State Required',
            'city.required' => 'City Required',
            'pincode.required' => 'Pincode Required',
            'iam.required' => 'I AM Required',
            'poc.required' => 'POC Required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator, 'data' => NULL]);
        }
        $post['user_id'] = $request['user_id'];
        $post['name_of_club'] = $request['name_of_club'];
        $post['address'] = $request['address'];
        $post['landmark'] = $request['landmark'];
        $post['state'] = $request['state'];
        $post['city'] = $request['city'];
        $post['pincode'] = $request['pincode'];
        $post['iam'] = $request['iam'];
        $post['poc'] = $request['poc'];

        $club_info = ClubProfileInfo::where('user_id', $request['user_id'])->first();
        if (!empty($club_info)) {
            ClubProfileInfo::where('user_id', $request['user_id'])->update($post);
        } else {
            ClubProfileInfo::create($post);
        }
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'guest-application']);
        }
        return response()->json(['error' => false, 'message' => 'Club Profile Infomation Submited Successfully.', 'data' => NULL]);
    }

    public function SubmitClubeDetail(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        if (!empty($request['guest_form'])) {
            $post['guest_form'] = $request['guest_form'];
            $end_page = 'select-season';
        }
        if (!empty($request['projector_screen']) && !empty($request['live_match_season'])) {
            $post['projector_screen'] = $request['projector_screen'];
            $post['live_match_season'] = $request['live_match_season'];
            $end_page = 'select-ds';
        }
        if (!empty($request['dj_avaibility']) && !empty($request['dance_floor'])) {
            $post['dj_avaibility'] = $request['dj_avaibility'];
            $post['dance_floor'] = $request['dance_floor'];
            $end_page = 'floor';
        }
        if (!empty($request['photographer'])) {
            $post['photographer'] = $request['photographer'];
            $end_page = 'select-live-music';
        }
        if (!empty($request['availability'])) {
            $post['availability'] = $request['availability'];
            $end_page = 'select-live-music';
        }

        if (!empty($request['sponsorship']) && !empty($request['sponsor_name'])) {
            $post['sponsorship'] = $request['sponsorship'];
            $post['sponsor_name'] = $request['sponsor_name'];
            $end_page = 'select-brand';
        }
        if (!empty($request['want_sponsorship'])) {
            $post['want_sponsorship'] = $request['want_sponsorship'];
            $end_page = 'thankyou';
        }
        if (!empty($request['no_of_floor'])) {
            $post['no_of_floor'] = $request['no_of_floor'];
            $end_page = 'thankyou';
        }

        $club_info = ClubeDetail::where('user_id', $request['user_id'])->first();
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => $end_page]);
        }

        if (!empty($club_info)) {
            unset($post['user_id']);
            ClubeDetail::where('user_id', $request['user_id'])->update($post);
        } else {
            ClubeDetail::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Submited Successfully.', 'data' => NULL]);
    }

    public function SubmitFloorDetail(Request $request)
    {
        $user_id = $request['user_id'];
        $floordetail = json_decode($request['floordeatail']);
        foreach ($floordetail as $floor) {
            $post['user_id'] = $user_id;
            $post['floor_name'] = $floor->floor_name;
            $post['seating'] = $floor->seating;
            $post['floor_type'] = $floor->floor_type;
            $post['music_type'] = $floor->music_type;
            $floorde = ClubFloorDetail::where('user_id', $user_id)->where('floor_name', $floor->floor_name)->first();
            if (!empty($floorde)) {
                unset($post['user_id']);
                unset($post['floor_name']);
                ClubFloorDetail::where('user_id', $user_id)->where('floor_name', $floor->floor_name)->update($post);
            } else {
                ClubFloorDetail::create($post);
            }
        }
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'photography-availability']);
        }
        return response()->json(['error' => false, 'message' => 'Submited Successfully.', 'data' => NULL]);
    }

    public function getBanks()
    {
        $data = Bank::select('BANK')->groupBy('BANK')->get()->toArray();
        return response()->json(['error' => false, 'message' => 'get banks Successfully.', 'data' => $data]);
    }

    public function getServiceAgreement($id)
    {
        $data = ServiceAgreement::where('id', $id)->first();
        return response()->json(['error' => false, 'message' => 'get service Agreement Successfully.', 'data' => $data]);
    }

    public function getInstruments(Request $request)
    {
        $subcategory_id = $request['subcategory_id'];
        $data = Instruments::where('subcategory_id', $subcategory_id)->get()->toArray();
        return response()->json(['error' => false, 'message' => 'get Instruments Successfully.', 'data' => $data]);
    }

    public function SelectIntrument(Request $request)
    {
        $user_id = $request['user_id'];
        $intrument_ids = explode(',', $request['intrument_id']);
        SelectIntrument::where('user_id', $user_id)->where('profile_id', $request['profile_id'])->where('subcategory_id', $request['subcategory_id'])->delete();
        for ($i = 0; $i < count($intrument_ids); $i++) {
            $post['user_id'] = $user_id;
            $post['profile_id'] = $request['profile_id'];
            $post['subcategory_id'] = $request['subcategory_id'];
            $post['intrument_id'] = $intrument_ids[$i];

            SelectIntrument::create($post);
        }
        return response()->json(['error' => false, 'message' => 'Instruments seleted Successfully.', 'data' => NULL]);
    }

    public function GetSelected(Request $request)
    {
        $user_id = $request['user_id'];
        $subcategory_id = $request['subcategory_id'];
        $selectedintrument = SelectIntrument::select('tbl_instruments.name as instrument_name', 'tbl_selected_instruments.*')
            ->join('tbl_instruments', 'tbl_instruments.id', '=', 'tbl_selected_instruments.intrument_id')
            ->where('tbl_selected_instruments.user_id', $user_id)
            ->where('tbl_selected_instruments.subcategory_id', $subcategory_id)
            ->where('tbl_selected_instruments.profile_id', $request['profile_id'])
            ->get()->toArray();

        $data_array = [];
        foreach ($selectedintrument as &$sinstu) {
            $data_array[] = $sinstu['intrument_id'];
            $sinstu['intrument_id'] = (string)$sinstu['intrument_id'];
        }

        $data['selected_intrument'] = $selectedintrument;

        $post["instrument_name"] = "all";
        $post["id"] = 6;
        $post["user_id"] = $selectedintrument[0]['user_id'];
        $post["subcategory_id"] = $selectedintrument[0]['subcategory_id'];
        $post["intrument_id"] = implode(',', $data_array);
        $post["temp"] = "0";
        $post["status"] = "1";
        $post["created_at"] = "2022-12-07T11:57:34.000000Z";
        $post["updated_at"] = "2022-12-07T11:57:34.000000Z";
        $data['selected_intrument'][] = $post;
        $budget = Budget::where('user_id', $request['user_id'])->where('subcategory_id', $request['subcategory_id'])->get()->toArray();
        if (!empty($budget)) {
            $data['budget'] = $budget;
        } else {
            $data['budget'] = NULL;
        }
        return response()->json(['error' => false, 'message' => 'Get Instruments seleted Successfully.', 'data' => $data]);
    }

    public function getCity()
    {
        $data = City::get()->toArray();
        return response()->json(['error' => false, 'message' => 'Get City Successfully.', 'data' => $data]);
    }

    public function SetCityBudgut(Request $request)
    {
        $user_id = $request['user_id'];
        $json = json_decode($request['json']);
        if (!isset($request['end_page'])) {
            CityPrice::where('user_id', $user_id)->where('profile_id', $request['profile_id'])->delete();
        }
        for ($i = 0; $i < count($json); $i++) {
            $post['city_id'] = $json[$i]->city_id;
            $post['price'] = $json[$i]->price;
            $post['user_id'] = $user_id;
            $post['profile_id'] = $request['profile_id'];
            CityPrice::create($post);
        }
        if (!isset($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'managr_details']);
        }
        return response()->json(['error' => false, 'message' => 'Set City Budgut Successfully.', 'data' => NULL]);
    }

    public function deleteCityBudgut(Request $request)
    {
        CityPrice::where('id', $request['selected_city_id'])->delete();
        return response()->json(['error' => false, 'message' => 'delete City Budgut Successfully.', 'data' => NULL]);
    }

    public function AddProducts(Request $request)
    {
        $post['user_id']  = $request['user_id'];
        $post['product_name'] = $request['product_name'];
        $post['product_size'] = $request['product_size'];
        $post['price'] = $request['price'];
        $post['server_people'] = $request['server_people'];
        $insert = Products::create($post);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'Add Product Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'something error!', 'data' => NULL]);
        }
    }

    public function GetProductById(Request $request)
    {
        $id = $request['id'];
        $data = Products::where('id', $id)->first();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Product Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Product not found!', 'data' => NULL]);
        }
    }

    public function UpdateProduct(Request $request)
    {
        $id = $request['id'];
        $post['user_id']  = $request['user_id'];
        $post['product_name'] = $request['product_name'];
        $post['product_size'] = $request['product_size'];
        $post['price'] = $request['price'];
        $post['server_people'] = $request['server_people'];
        $data = Products::where('id', $id)->first();
        if (!empty($data)) {
            $update = Products::where('id', $id)->update($post);
            if ($update) {
                return response()->json(['error' => false, 'message' => 'Update Product Successfully.', 'data' => NULL]);
            } else {
                return response()->json(['error' => true, 'message' => 'something error!', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Product not found!', 'data' => NULL]);
        }
    }

    public function RemoveProduct(Request $request)
    {
        $id = $request['id'];
        $data = Products::where('id', $id)->first();
        if (!empty($data)) {
            Products::where('id', $id)->delete();
            return response()->json(['error' => false, 'message' => 'Remove Product Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Product not found!', 'data' => NULL]);
        }
    }

    public function GetProduct(Request $request)
    {
        $user_id = $request['user_id'];
        $data = Products::where('user_id', $user_id)->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Product Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Product not found!', 'data' => NULL]);
        }
    }

    public function RequestBooking(Request $request)
    {
        $post['request_by'] = $request['request_by'];
        $post['request_to'] = $request['request_to'];
        $post['book_date'] = $request['book_date'];
        $post['start_time'] = $request['start_time'];
        $post['end_time'] = $request['end_time'];
        $post['about_event'] = $request['about_event'];
        $post['starter'] = (!empty($request['starter'])) ? $request['starter'] : NULL;
        $post['main_course'] = (!empty($request['main_course'])) ? $request['main_course'] : NULL;
        $post['acholic_beverages'] = (!empty($request['acholic_beverages'])) ? $request['acholic_beverages'] : NULL;
        $post['non_acholic_beverages'] = (!empty($request['non_acholic_beverages'])) ? $request['non_acholic_beverages'] : NULL;

        $insert = RequestBookings::create($post);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'Request Send Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'something error!', 'data' => NULL]);
        }
    }

    public function GetEventType()
    {
        $data = EventType::all();
        return response()->json(['error' => false, 'message' => 'Get Event Type Successfully.', 'data' => $data]);
    }

    public function AddEvent(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['event_name'] = $request['event_name'];
        $post['event_type_id'] = $request['event_type_id'];
        $post['start_date']  = $request['start_date'];
        $post['end_date'] = $request['end_date'];
        $post['entry_fees'] = $request['entry_fees'];
        $post['artist_type'] = $request['artist_type'];
        $post['artist_name'] = $request['artist_name'];

        if ($request->photo) {
            $eventphoto = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('/event_photo/'), $eventphoto);
            $post['photo'] = 'public/event_photo/' . $eventphoto;
        }

        if ($request->video) {
            $eventvideo = time() . '.' . $request->video->extension();
            $request->video->move(public_path('/event_video/'), $eventvideo);
            $post['video'] = 'public/event_video/' . $eventvideo;
        }
        $data = Events::create($post);
        if ($data) {
            return response()->json(['error' => false, 'message' => 'Add Event Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something Error!', 'data' => NULL]);
        }
    }

    public function GetEvents(Request $request)
    {
        $user_id = $request['user_id'];
        $events = Events::where('user_id', $user_id)->get()->toArray();
        if (!empty($events)) {
            return response()->json(['error' => false, 'message' => 'Get Event Successfully.', 'data' => $events]);
        } else {
            return response()->json(['error' => true, 'message' => 'Event Not Found!', 'data' => NULL]);
        }
    }

    public function SubmitManagerDetail(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['profile_id'] = $request['profile_id'];
        $post['signature'] = $request['signature'];
        $post['name'] = isset($request['name']) ? $request['name'] : "";
        $post['contact_no'] = isset($request['contact_no']) ? $request['contact_no'] : "";
        $post['language_id'] = isset($request['language_id']) ? $request['language_id'] : "";
        $insert = ManagerDetail::create($post);
        User::where('id', $request['user_id'])->update(['end_page' => 'photo_with_celebs']);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'Add Manager Detail Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something Error!', 'data' => NULL]);
        }
    }

    public function PutManagerDetail(Request $request)
    {
        // $post['user_id'] = $request['user_id'];
        $post['signature'] = $request['signature'];
        $post['name'] = isset($request['name']) ? $request['name'] : "";
        $post['contact_no'] = isset($request['contact_no']) ? $request['contact_no'] : "";
        ManagerDetail::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->update($post);
        return response()->json(['error' => false, 'message' => 'Manager Detail Updated Successfully.', 'data' => NULL]);
    }

    public function GetManagerDetail(Request $request)
    {
        $data = ManagerDetail::where('user_id', $request['user_id'])->where('profile_id', $request['profile_id'])->first();
        return response()->json(['error' => false, 'message' => 'Get Manager Detail Successfully.', 'data' => $data]);
    }

    public function GetLanguages(Request $request)
    {
        $data = Languages::all();
        return response()->json(['error' => false, 'message' => 'Get Language Successfully.', 'data' => $data]);
    }

    public function DeleteMedia(Request $request)
    {
        $id = $request['id'];
        $media = UserMedia::where('id', $id)->first();
        unlink($media->file_path);
        UserMedia::where('id', $id)->delete();
        return response()->json(['error' => false, 'message' => 'Delete Media Successfully.', 'data' => NULL]);
    }

    public function SubmitOffer(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['name'] = $request['name'];
        $post['start_date'] = $request['start_date'];
        $post['end_date'] = $request['end_date'];
        $post['valid_on'] = $request['valid_on'];
        $post['start_time'] = $request['start_time'];
        $post['end_time'] = $request['end_time'];
        $post['allow_persons'] = $request['allow_persons'];
        $post['mrp'] = $request['mrp'];
        $post['offer_price'] = $request['offer_price'];
        $post['deal_type'] = $request['deal_type'];
        $insert = Offers::create($post);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'Add Offer Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something Error!', 'data' => NULL]);
        }
    }

    public function Offers(Request $request)
    {
        $data = Offers::where('club_id', $request['club_id'])->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Offers Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'NO offers Found!', 'data' => NULL]);
        }
    }

    public function SingleOffer(Request $request)
    {
        $data = Offers::where('id', $request['id'])->first();
        return response()->json(['error' => false, 'message' => 'Get Offer Successfully.', 'data' => $data]);
    }

    public function FilterArtist(Request $request)
    {
        $user = User::select('tbl_users.*', 'tbl_user_profiles.artists_type_id', 'tbl_user_profiles.artist_name', 'tbl_user_profiles.subcategory_id', 'tbl_user_profiles.subcategory_name', 'tbl_user_profiles.genres_id', 'tbl_user_profiles.genres_name', 'tbl_user_profiles.venue_id', 'tbl_user_profiles.venue_name', 'tbl_budget.price', 'tbl_selected_instruments.intrument_id');
        $user->Join('tbl_user_profiles', 'tbl_user_profiles.user_id', '=', 'tbl_users.id');
        $user->Join('tbl_budget', 'tbl_budget.user_id', '=', 'tbl_users.id');
        $user->join('tbl_selected_instruments', 'tbl_selected_instruments.user_id', '=', 'tbl_users.id');
        if (!empty($request['artists_type_id'])) {
            $user->where('tbl_user_profiles.artists_type_id', $request['artists_type_id']);

            if (!empty($request['subcategory_name'])) {
                $user->where(function ($query) use ($request) {
                    $subcategory_names = explode(',', $request['subcategory_name']);
                    foreach ($subcategory_names as $subcategory_name) {
                        $query->orwhere('tbl_user_profiles.subcategory_name', 'like', '%' . $subcategory_name . '%');
                    }
                });
            }
        }
        if (!empty($request['intrument_id'])) {
            $intrument_ids = explode(',', $request['intrument_id']);
            $user->whereIn('tbl_selected_instruments.intrument_id', $intrument_ids);
        }
        if (!empty($request['genres_name'])) {
            $user->where(function ($query) use ($request) {
                $genres_names = explode(',', $request['genres_name']);
                foreach ($genres_names as $genres_name) {
                    $query->orwhere('tbl_user_profiles.genres_name', 'like', '%' . $genres_name . '%');
                }
            });
        }
        if (!empty($request['venue_name'])) {
            $user->where(function ($query) use ($request) {
                $venue_names = explode(',', $request['venue_name']);
                foreach ($venue_names as $venue_name) {
                    $query->orwhere('tbl_user_profiles.venue_name', 'like', '%' . $venue_name . '%');
                }
            });
        }
        if (!empty($request['start_price'])) {
            $user->where('tbl_budget.price', '>', $request['start_price']);
        }
        if (!empty($request['end_price'])) {
            $user->where('tbl_budget.price', '<', $request['end_price']);
        }
        // $user->groupBy('tbl_users.id');
        $user->orderBy('tbl_users.id', 'desc');
        $users = $user->get()->toArray();
        $id_array = [];
        $user_array = [];
        foreach ($users as $data) {
            if (!in_array($data['id'], $id_array)) {
                $id_array[] = $data['id'];
                $user_array[] = $data;
            }
        }
        if (!empty($user_array)) {
            $data = $user_array;
        } else {
            $data = NULL;
        }
        // print_r($user->toSql());
        // die;
        return response()->json(['error' => false, 'message' => 'get Filter artist Successfully.', 'data' => $data]);
    }

    public function GetUser(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::where('id', $user_id)->first();
        if (!empty($user)) {
            return response()->json(['error' => false, 'message' => 'get user detail Successfully.', 'data' => $user]);
        } else {
            return response()->json(['error' => false, 'message' => 'user not Exist!', 'data' => NULL]);
        }
    }

    public function GetReward(Request $request)
    {
        $guest_id = $request['guest_id'];
        $rewards = RewardClaim::select('tbl_reward_claims.reward_id', 'tbl_rewards.reward_name', 'tbl_rewards.description', 'tbl_reward_claims.status', 'tbl_reward_claims.club_id')
            ->leftjoin('tbl_rewards', 'tbl_rewards.id', '=', 'tbl_reward_claims.reward_id')
            ->where('guast_id', $guest_id)->get()->toArray();

        return response()->json(['error' => false, 'message' => 'get user detail Successfully.', 'data' => $rewards]);
    }

    public function RewardClaim(Request $request)
    {
        $guast_id = $request['guast_id'];
        $club_id = $request['club_id'];
        $reward_id = $request['reward_id'];
        $claims = RewardClaim::where('reward_id', $reward_id)->where('guast_id', $guast_id)->first();
        if (!empty($claims)) {
            return response()->json(['error' => true, 'message' => 'Reward Already Claim.', 'data' => NULL]);
        } else {
            RewardClaim::create(['guast_id' => $guast_id, 'club_id' => $club_id, 'reward_id' => $reward_id]);
            return response()->json(['error' => true, 'message' => 'Reward Claim Successfully.', 'data' => NULL]);
        }
    }

    public function RewardScratch(Request $request)
    {
        $guast_id = $request['guast_id'];
        $reward_id = $request['reward_id'];
        RewardClaim::where(['guast_id' => $guast_id, 'reward_id' => $reward_id])->update(['status' => '1']);
        return response()->json(['error' => false, 'message' => 'Reward Scratch Successfully.', 'data' => NULL]);
    }


    public function GetProfile(Request $request)
    {
        $data['user'] = User::where('id', $request['user_id'])->first();
        $temp = TempUsers::where('user_id', $request['user_id'])->first();
        if (!empty($temp)) {
            $data['temp_user'] = $temp;
        } else {
            $data['temp_user'] = NULL;
        }
        return response()->json(['error' => false, 'message' => 'get user data Successfully.', 'data' => $data]);
    }

    public function EditProfile(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['username'] = $request['username'];
        $post['contact_no'] = $request['contact_no'];
        $post['gender'] = $request['gender'];
        $insert = TempUsers::create($post);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'Wait for admin approvel.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something error!', 'data' => NULL]);
        }
    }

    public function OffersList(Request $request)
    {
        $offer_id = $request['offer_id'];
        $offer = Offers::where('id', $offer_id)->first();
        $data['offer'] = $offer;
        $offersbook =  OffersBook::where('offer_id', $offer_id)->get()->toArray();
        if (!empty($offersbook)) {
            foreach ($offersbook as &$offerbook) {
                // $book_detail = BookDetail::where('offers_book_id', $offerbook)->get()->toArray();
                // if(!empty($book_detail)){
                //     $offerbook['book_detail'] = $book_detail;

                // }else{
                //     $offerbook['book_detail'] = NULL;
                // ->orWhere('type', 'couple_female')
                // }
                $couple_count = BookDetail::where('offers_book_id', $offerbook)->where('type', 'couple_male')->orWhere('type', 'couple_female')->get()->toArray();
                $couple_male = BookDetail::where('offers_book_id', $offerbook)->where('type', 'couple_male')->get()->toArray();
                $couple_female = BookDetail::where('offers_book_id', $offerbook)->where('type', 'couple_female')->get()->toArray();

                if (!empty($couple_count)) {
                    $offerbook['CoupleCount'] = count($couple_count);
                    $offerbook['couple_male'] = $couple_male;
                    $offerbook['couple_female'] = $couple_female;
                } else {
                    $offerbook['CoupleCount'] = 0;
                    $offerbook['couple_male'] = NULL;
                    $offerbook['couple_female'] = NULL;
                }

                $stage_count = BookDetail::where('offers_book_id', $offerbook)->where('type', 'stage')->get()->toArray();
                if (!empty($stage_count)) {
                    $offerbook['stagCount'] = count($stage_count);
                    $offerbook['stag_detail'] = $stage_count;
                } else {
                    $offerbook['stageCount'] = 0;
                    $offerbook['stag_detail'] = NULL;
                }

                $kids_count = BookDetail::where('offers_book_id', $offerbook)->where('type', 'kids')->get()->toArray();
                if (!empty($kids_count)) {
                    $offerbook['kidsCount'] = count($kids_count);
                    $offerbook['kids_detail'] = $kids_count;
                } else {
                    $offerbook['kidsCount'] = 0;
                    $offerbook['kids_detail'] = NULL;
                }
            }
            $data['offersbook'] = $offersbook;
        } else {
            $data['offersbook'] = NULL;
        }
        return response()->json(['error' => false, 'message' => 'Get Offers List Successfully.', 'data' => $data]);
    }

    public function city_price(Request $request)
    {
        $user_id = $request['user_id'];
        $data = CityPrice::select('tbl_city_price.*', 'tbl_cities.name')
            ->join('tbl_cities', 'tbl_cities.id', '=', 'tbl_city_price.city_id', 'left')
            ->where('user_id', $user_id)
            ->where('profile_id', $request['profile_id'])
            ->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get City Detail Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function DeleteCityPrice(Request $request)
    {
        $id = $request['id'];
        $data = CityPrice::where('id', $id)->delete();
        if ($data) {
            return response()->json(['error' => false, 'message' => 'City price deleted Successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Not Found!', 'data' => NULL]);
        }
    }

    public function sendsms($otp, $mobile)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/JSON'
        ])->post('https://api.msg91.com/api/v5/otp?template_id=63c63876d6fc0509e6378092&mobile=91' . $mobile . '&authkey=385912ArDLd05QSgHe6385dd49P1', [
            'OTP' => $otp
        ]);

        // if ($response->failed()) {
        //     echo "Error: " . $response->body();
        // } else {
        //     echo $response->body();
        // }
    }

    public function NotifyEmails(Request $request)
    {
        $email = $request['email'];
        $email_exist = NotifyEmails::where('email', $email)->first();
        if (empty($email_exist)) {
            NotifyEmails::create(['email' => $email]);
            return response()->json(['error' => false, 'message' => 'notify email successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Email Already Use.', 'data' => NULL]);
        }
    }

    /**
     * Club list
     */

    public function ClubList()
    {
        $clubs = ClubProfileInfo::orderBy('id', 'DESC')->get();
        return response()->json(['error' => false, 'message' => 'Club List.', 'data' => $clubs]);
    }

    /**
     *send notification
     */
    public function sendNotification($message, $body, $fcmArray, $navigate_to = '')
    {
        $path_to_fcm = "https://fcm.googleapis.com/fcm/send";
        $server_key = "AAAAOY1uraI:APA91bFm7raOMf_krurSbpCbtX4Z_Vk47l-hPhZoAWKIIb1tfcEoQKtZiOp8babErrK4jPvyIi8IuLaBK2aq8NfdCS-ndHUL0B8suqORkBNQKatkrt2L0ORPbdSyY8aP0pZ90M_PfyLy";
        $headers = array(
            'Authorization:key=' . $server_key,
            'Content-Type:application/json',
            'Content-Transfer-Encoding: binary'
        );

        $fields = array(
            'registration_ids' => $fcmArray,
            'notification' => array(
                'body' => $message,
                //'title'=>$title,
                'vibrate' => 1,
                'foreground' => true,
                'coldstart' => true,
                "android_channel_id" => "party-witty-f8f0d",
                //'click_action'=>"NavigationHostActivity"
            ),
            'data' => array("navigate_to" => $navigate_to, "body" => $body)
        );

        $payload = json_encode($fields);

        $curl_session = curl_init();
        curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
        curl_setopt($curl_session, CURLOPT_POST, true);
        curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

        $result = curl_exec($curl_session);
        curl_close($curl_session);

        return true;
    }

    public function ArtistAgreement(Request $request)
    {
        $user = User::where('id', $request['id'])->first();
        if (!empty($user)) {

            $otp = random_int(1000, 9999);
            $this->sendsms($otp, $user->contact_no);
            $update = User::where('id', $request['id'])->update(['otp' => $otp]);
            if ($update) {
                $data["email"] = $user->email;
                $data["name"] = $user->username;
                $data["subject"] = "Verify Service Agreement";

                $Data['otp'] = $otp;
                $Data['user'] = $user;

                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'authkey' => '385912ArDLd05QSgHe6385dd49P1'
                ])
                    ->post('https://api.msg91.com/api/v5/email/send', [
                        'to' => [
                            [
                                'name' => $data["name"],
                                'email' => $data["email"]
                            ]
                        ],
                        'from' => [
                            'name' => 'partywitty',
                            'email' => 'sayhello@partywitty.com'
                        ],
                        'domain' => 'partywitty.com',
                        'template_id' => 'serviceagreement',
                        'variables' => [
                            'VAR1' => $data["name"],
                            'VAR2' => $otp
                        ]
                    ]);

                if ($response->failed()) {
                    $error = $response->json();
                    return response()->json(['error' => true, 'message' => 'HTTP Error: ' . $response->status() . ' - ' . $error['error'], 'data' => NULL]);
                } else {
                    return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
                }
                // try {
                //     Mail::send('mail.agreement', $Data, function ($message) use ($data) {
                //         $message->to($data["email"], $data["name"])
                //             ->subject($data["subject"]);
                //     });
                // } catch (JWTException $exception) {
                //     return response()->json(['error' => true, 'message' => $exception->getMessage(), 'data' => NULL]);
                // }
                if (Mail::failures()) {
                    return response()->json(['error' => true, 'message' => "Something went wrong please try again.", 'data' => NULL]);
                } else {
                    return response()->json(['error' => false, 'message' => "OTP send Successfully", 'data' => $Data]);
                }
            } else {
                return response()->json(['error' => true, 'message' => 'Something error', 'data' => NULL]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Artist Not Exist', 'data' => NULL]);
        }
    }

    /**
     * otp verify for agreement
     */
    public function AgreementVerify(Request $request)
    {
        $id = $request['user_id'];
        $otp = $request['otp'];
        $verify = User::where(['id' => $id, 'otp' => $otp])->first();
        if (!empty($verify)) {
            User::where('id', $id)->update(['end_page' => 'artist-profile']);
            return response()->json(['error' => false, 'message' => 'OTP Verify', 'data' => $verify]);
        } else {
            return response()->json(['error' => true, 'message' => 'Incorrect OTP, Try again.', 'data' => NULL]);
        }
    }

    /**
     * profile, cover file upload api
     */
    public function ProfileImages(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['profile_id'] = $request['profile_id'];
        $post['location'] = "";
        if ($request->profile) {
            $fileName = time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('uploads'), $fileName);
            $post['file_path'] = 'public/uploads/' . $fileName;
            $post['type'] = '0';

            $in_profile = UserMedia::where(['user_id' => $request['user_id'], 'type' => '0', 'profile_id' => $request['profile_id']])->first();
            if (!empty($in_profile)) {
                UserMedia::where(['user_id' => $request['user_id'], 'type' => '0', 'profile_id' => $request['profile_id']])->update($post);
            } else {
                UserMedia::create($post);
            }
        }

        if ($request->cover) {
            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('uploads'), $fileName);
            $post['file_path'] = 'public/uploads/' . $fileName;
            $post['type'] = '1';
            UserMedia::create($post);
        }
        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => 'multiple-Photographs']);
        }
        return response()->json(['error' => false, 'message' => 'file uploaded successfully.', 'data' => NULL]);
    }

    /**
     * Multiple file upload api
     *
     * Multiple image upload APIs
     * {URL}/api/media_upload
     * parameters
     * user_id:607
     * location:hello
     * caption:test
     * type:0 //0 - Photographs, 1-Videos, 2-Cover Song, 3-Orignal Song, 4 - With Celebs, 5-With Brands, 6-Club
     * with_photo:celeb
     * multiple_file[]: // upload multiple file use this parameter
     * single_file : //upload single file use this parameter file type
     */
    public function media_upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages(), 'data' => NULL]);
        }

        $post['user_id'] = $request['user_id'];
        if ($request['type'] != '15') {
            $post['profile_id'] = $request['profile_id'];
        }
        $post['with_photo'] = isset($request['with_photo']) ? $request['with_photo'] : "";
        $post['location'] = isset($request['location']) ? $request['location'] : "";
        $post['caption'] = isset($request['caption']) ? $request['caption'] : "";
        $post['type'] = $request['type'];
        $files = [];
        if (isset($request->multiple_file)) {
            foreach ($request->multiple_file as $key => $file) {
                $fileName = $key . time() . '.' . $file->extension();
                $file->move(public_path('uploads'), $fileName);
                $files[] = 'public/uploads/' . $fileName;
                $post['file_path'] = 'public/uploads/' . $fileName;
                UserMedia::create($post);
            }
        }
        if (isset($request->single_file)) {
            $fileName = time() . '.' . $request->single_file->extension();
            $request->single_file->move(public_path('uploads'), $fileName);
            $post['file_path'] = 'public/uploads/' . $fileName;
            UserMedia::create($post);
        }

        switch ($request['type']) {
            case '2':
                $end_page = 'intromessage';
                break;
            case '3':
                $end_page = 'genre';
                break;
            case '4':
                $end_page = 'photo_with_brands';
                break;
            case '5':
                $end_page = 'video_with_brands';
                break;
            case '6':
                $end_page = 'photo_with_bands';
                break;
            case '7':
                $end_page = 'video_with_bands';
                break;
            case '8':
                $end_page = 'photo_with_club';
                break;
            case '9':
                $end_page = 'video_with_club';
                break;
            case '10':
                $end_page = 'audio_cover_song';
                break;
            case '11':
                $end_page = 'video_cover_song';
                break;
            case '12':
                $end_page = 'original_video_song';
                break;
            case '13':
                $end_page = 'original_audio_song';
                break;
            case '14':
                $end_page = 'streaming_platforms_song';
                break;
            case '15':
                $end_page = 'artist_hire';
                break;
        }

        if (!isset($request['end_page']) && empty($request['end_page'])) {
            User::where('id', $request['user_id'])->update(['end_page' => $end_page]);
        }
        return response()->json(['error' => false, 'message' => 'File Uploaded Successfully.', 'data' => NULL]);
    }

    /**********/
    public function SaveMedia(Request $request)
    {
        $post['user_id'] = $request['user_id'];
        $post['profile_id'] = $request['profile_id'];
        $post['file_path'] = $request['file_path'];
        $post['location'] = isset($request['location']) ? $request['location'] : NULL;
        $post['caption'] = isset($request['caption']) ? $request['caption'] : NULL;
        $post['with_photo'] = isset($request['with_photo']) ? $request['with_photo'] : NULL;
        $post['type'] = $request['type'];

        if ($request->path) {
            $fileName = time() . '.' . $request->path->extension();
            $request->path->move(public_path('uploads'), $fileName);
            $post['file_path'] = 'public/uploads/' . $fileName;
        }
        $insert_media = UserMedia::create($post);
        if ($insert_media) {
            if ($request['type'] == '3') {
                unset($post['type']);
                OrignalSong::create($post);
            }
            $userprofile = UserProfiles::where('user_id', $request['user_id'])->where('id', $request['profile_id'])->first();
            $type_of_artist = $userprofile->artists_type_id;

            switch ($request['type']) {
                case '0':
                    $title = "videolist";
                    break;
                case '1':
                    if ($type_of_artist > 3) {
                        $title = "tankyou";
                    } else {
                        $title = "coversong";
                    }
                    break;
                case '2':
                    $title = "Origanalsong";
                    break;
                case '3':
                    $title = "uploadcelebs";
                    break;
                case '4':
                    $title = "UploadBands";
                    break;
                case '5':
                    $title = "UploadClubs";
                    break;
                case '6':
                    $title = "intafollow";
                    break;
            }

            if (!isset($request['end_page']) && empty($request['end_page'])) {
                User::where('id', $request['user_id'])->update(['end_page' => $title]);
            }
            return response()->json(['error' => false, 'message' => 'Media Save Successfully.', 'data' => ['endpage' => $title]]);
        } else {
            return response()->json(['error' => true, 'message' => 'Photos Not Available.', 'data' => NULL]);
        }
    }

    public function GetFloor(Request $request)
    {
        $club = ClubeDetail::where('user_id', $request['club_id'])->first();
        $array = [];
        for ($i = $club->no_of_floor; $i >= 1; $i--) {
            $array[] = $i;
        }
        return response()->json(['error' => false, 'message' => 'No of Floor', 'data' => $array]);
    }

    public function vocalistprofile(Request $request)
    {
        $id = $request['user_id'];
        $count = 0;
        $noofform = 0;
        $profiles = UserProfiles::where('user_id', $id)->where('id', $request['profile_id'])->first();
        if (!empty($profiles)) {
            if ($profiles->subcategory_id != "") {
                $count = $count + 1;
            }
            if ($profiles->genres_id != "") {
                $count = $count + 1;
            }
            if ($profiles->venue_id != "") {
                $count = $count + 1;
            }
            if ($profiles->language_ids != "") {
                $count = $count + 1;
            }
            if ($profiles->introduction != "") {
                $count = $count + 1;
            }
            if ($profiles->intagram_link != "") {
                $count = $count + 1;
            }
            if ($profiles->facebook_link != "") {
                $count = $count + 1;
            }
            $noofform = $noofform + 7;
        }

        $media = UserMedia::where(['user_id' => $id, 'type' => '0', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media)) {
            $count = $count + 1;
        }
        $media1 = UserMedia::where(['user_id' => $id, 'type' => '1', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media1)) {
            $count = $count + 1;
        }
        $media2 = UserMedia::where(['user_id' => $id, 'type' => '2', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media2)) {
            $count = $count + 1;
        }
        $media3 = UserMedia::where(['user_id' => $id, 'type' => '3', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media3)) {
            $count = $count + 1;
        }
        $media4 = UserMedia::where(['user_id' => $id, 'type' => '4', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media4)) {
            $count = $count + 1;
        }
        $media5 = UserMedia::where(['user_id' => $id, 'type' => '5', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media5)) {
            $count = $count + 1;
        }
        $media6 = UserMedia::where(['user_id' => $id, 'type' => '6', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media6)) {
            $count = $count + 1;
        }
        $media7 = UserMedia::where(['user_id' => $id, 'type' => '7', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media7)) {
            $count = $count + 1;
        }
        $media8 = UserMedia::where(['user_id' => $id, 'type' => '8', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media8)) {
            $count = $count + 1;
        }
        $media9 = UserMedia::where(['user_id' => $id, 'type' => '9', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media9)) {
            $count = $count + 1;
        }
        $media10 = UserMedia::where(['user_id' => $id, 'type' => '10', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media10)) {
            $count = $count + 1;
        }
        $media11 = UserMedia::where(['user_id' => $id, 'type' => '11', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media11)) {
            $count = $count + 1;
        }
        $media12 = UserMedia::where(['user_id' => $id, 'type' => '12', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media12)) {
            $count = $count + 1;
        }
        $media13 = UserMedia::where(['user_id' => $id, 'type' => '13', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media13)) {
            $count = $count + 1;
        }
        $media14 = UserMedia::where(['user_id' => $id, 'type' => '14', 'profile_id' => $request['profile_id']])->first();
        if (!empty($media14)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 15;
        $address = Address::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($address)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;
        $bank = BankDetail::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($bank)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;
        $OrignalSong = OrignalSong::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($OrignalSong)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;
        $SelectIntrument = SelectIntrument::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($SelectIntrument)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;
        $CityPrice = CityPrice::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($CityPrice)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;
        $Subcategories = SelecteSubcategories::where(['user_id' => $id])->where('profile_id', $request['profile_id'])->get()->toArray();
        if (!empty($Subcategories)) {
            foreach ($Subcategories as $row) {
                if ($row['status'] == 1) {
                    $count = $count + 1;
                }
                $noofform = $noofform + 1;
            }
        }
        $ManagerDetail = ManagerDetail::where('user_id', $id)->where('profile_id', $request['profile_id'])->first();
        if (!empty($ManagerDetail)) {
            $count = $count + 1;
        }
        $noofform = $noofform + 1;

        $data = number_format(($count / $noofform) * 100, 2);
        return response()->json(['error' => false, 'message' => 'Vocalist Profile update %.', 'data' => $data]);
    }

    public function AddNewVenue(Request $request)
    {
        $user_id = $request['user_id'];
        $selected = UserProfiles::select('venue_id', 'venue_name')->where('id', $request['profile_id'])->where('user_id', $user_id)->first();
        $venue_name = (!empty($selected->venue_name) ? explode(',', $selected->venue_name) : []);
        $venue_id = (!empty($selected->venue_id) ? (explode(',', $selected->venue_id)) : []);
        $selected_venue_id = explode(',', $request['venue_id']);
        SelectedVenue::where('user_id', $user_id)->where('profile_id', $request['profile_id'])->delete();
        if (!empty($selected_venue_id)) {
            for ($i = 0; $i < count($selected_venue_id); $i++) {
                $Data['user_id'] = $user_id;
                $Data['profile_id'] = $request['profile_id'];
                $Data['venue_id'] = $selected_venue_id[$i];
                SelectedVenue::create($Data);
            }
        }
        array_push($venue_name, $request['venue_name']);
        array_push($venue_id, $request['venue_id']);
        $name = (!empty($venue_name)) ? implode(',', $venue_name) : "";
        $id = (!empty($venue_id)) ? implode(',', $venue_id) : "";
        UserProfiles::where('user_id', $user_id)->update(['venue_id' => $id, 'venue_name' => $name]);

        SelecteSubcategories::where('user_id', $request['user_id'])->update(['status' => '0']);

        $data['venue'] = SelectedVenue::select('tbl_selected_venue.venue_id as venue_id', 'tbl_venue.name as venue_name')->leftjoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_selected_venue.venue_id')->where('tbl_selected_venue.user_id', $user_id)->get()->toArray();
        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        if (!empty($select)) {
            $data['stage'] = $select;
            return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
        } else {
            $data['stage']['num_of_intrument'] = NULL;
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
        }
    }

    public function AddSubCategory(Request $request)
    {
        $user_id = $request['user_id'];
        $selected = UserProfiles::select('subcategory_id', 'subcategory_name')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $sub_category_name = (!empty($selected->subcategory_name) ? explode(',', $selected->sub_category_name) : []);
        $sub_category_id = (!empty($selected->subcategory_id) ? (explode(',', $selected->sub_category_id)) : []);
        $selected_sub_category_id = explode(',', $request['sub_category_id']);
        if (!empty($selected_sub_category_id)) {
            for ($i = 0; $i < count($selected_sub_category_id); $i++) {
                $Data['user_id'] = $user_id;
                $Data['subcategory_id'] = $selected_sub_category_id[$i];
                $Data['status'] = '0';
                $Date['profile_id'] = $request['profile_id'];
                SelecteSubcategories::create($Data);
            }
        }
        array_push($sub_category_name, $request['sub_category_name']);
        array_push($sub_category_id, $request['sub_category_id']);
        $name = (!empty($sub_category_name)) ? implode(',', $sub_category_name) : "";
        $id = (!empty($sub_category_id)) ? implode(',', $sub_category_id) : "";
        UserProfiles::where('user_id', $user_id)->where('id', $request['profile_id'])->update(['subcategory_id' => $id, 'subcategory_name' => $name]);

        $selected = UserProfiles::select('venue_id', 'venue_name')->where('user_id', $user_id)->where('id', $request['profile_id'])->first();
        $selectedData = [];
        $venue_id = explode(',', $selected->venue_id);
        $venue_name = explode(',', $selected->venue_name);
        $venue_id = (!empty($selected->venue_id) ? (explode(',', $selected->venue_id)) : []);
        if (!empty($venue_id)) {
            for ($i = 0; $i < count($venue_id); $i++) {
                $Data['venue_id'] = $venue_id[$i];
                $Data['venue_name'] = $venue_name[$i];
                $selectedData[] = $Data;
            }
        }
        if (!empty($selectedData)) {
            $data['venue'] = $selectedData;
        } else {
            $data['venue'] = Null;
        }
        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        if (!empty($select)) {
            $data['stage'] = $select;
            return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
        } else {
            $data['stage']['num_of_intrument'] = NULL;
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
        }
    }


    public function NewVenueSelected(Request $request)
    {
        $data['venue'] = SelectedVenue::select('tbl_selected_venue.venue_id as venue_id', 'tbl_venue.name as venue_name')->leftjoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_selected_venue.venue_id')->where('tbl_selected_venue.user_id', $request['user_id'])->where('tbl_selected_venue.profile_id', $request['profile_id'])->get()->toArray();
        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        if (!empty($select)) {
            $data['stage'] = $select;
            return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
        } else {
            $data['stage']['num_of_intrument'] = NULL;
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
        }
    }

    public function NewSubCategoryselected(Request $request)
    {
        $selected = UserProfiles::select('venue_id', 'venue_name')->where('id', $request['profile_id'])->where('user_id', $request['user_id'])->first();
        $selectedData = [];
        $venue_id = explode(',', $selected->venue_id);
        $venue_name = explode(',', $selected->venue_name);
        $venue_id = (!empty($selected->venue_id) ? (explode(',', $selected->venue_id)) : []);
        if (!empty($venue_id)) {
            for ($i = 0; $i < count($venue_id); $i++) {
                $Data['venue_id'] = (int)$venue_id[$i];
                $Data['venue_name'] = $venue_name[$i];
                $selectedData[] = $Data;
            }
        }
        if (!empty($selectedData)) {
            $data['venue'] = $selectedData;
        } else {
            $data['venue'] = Null;
        }
        $select = SelecteSubcategories::select('tbl_selected_subcategories.status', 'tbl_artist_subcategory.*')->leftjoin('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')
            ->where(['tbl_selected_subcategories.user_id' => $request['user_id'], 'tbl_selected_subcategories.profile_id' => $request['profile_id'], 'tbl_selected_subcategories.status' => '0'])->first();
        if (!empty($select)) {
            $data['stage'] = $select;
            return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
        } else {
            $data['stage']['num_of_intrument'] = NULL;
            return response()->json(['error' => false, 'message' => 'Subcategory Not Found!', 'data' => $data]);
        }
    }

    public function ArtistDetail(Request $request)
    {
        $id = $request['artist_id'];
        $profile_id = $request['profile_id'];
        $data['user'] = User::select('id', 'username', 'contact_no', 'email')->where('id', $id)->first();

        $profiles = UserProfiles::select('id as profile_id', 'artists_type_id', 'subcategory_id', 'genres_id', 'venue_id', 'language_ids', 'introduction', 'intagram_link', 'intagram_follower', 'facebook_link', 'facebook_follower')->where('id', $profile_id)->first();
        $data['profiles'] = $profiles;

        $data['otherprofiles'] = UserProfiles::select('id as profile_id', 'artist_name as category_name')->where('user_id', $id)->where('id', '!=', $profile_id)->get()->toArray();

        $data['cover_photo'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '0')->where('profile_id', $profile_id)->first();
        $data['profile_photo'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '1')->where('profile_id', $profile_id)->first();
        $data['photographs'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '2')->where('profile_id', $profile_id)->get();
        $data['video'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '3')->where('profile_id', $profile_id)->get();
        $data['with_celebs'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '4')->where('profile_id', $profile_id)->get();
        $data['photo_with_brands'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '5')->where('profile_id', $profile_id)->get();
        $data['video_with_brand'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '6')->where('profile_id', $profile_id)->get();
        $data['photo_with_bands'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '7')->where('profile_id', $profile_id)->get();
        $data['video_with_bands'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '8')->where('profile_id', $profile_id)->get();
        $data['photo_with_club'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '9')->where('profile_id', $profile_id)->get();
        $data['video_with_club'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '10')->where('profile_id', $profile_id)->get();
        $data['audio_cover_song'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '11')->where('profile_id', $profile_id)->get();
        $data['video_cover_song'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '12')->where('profile_id', $profile_id)->get();
        $data['origanal_video_song'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '13')->where('profile_id', $profile_id)->get();
        $data['orignal_audio_song'] = UserMedia::select('id', 'file_path', 'location', 'caption', 'with_photo', 'type')->where('user_id', $id)->where('type', '14')->where('profile_id', $profile_id)->get();

        $data['address'] = Address::select('id', 'flat_no', 'landmark', 'state', 'city', 'pincode', 'id_proof', 'address_proof', 'aadhar_number')->where('user_id', $id)->where('profile_id', $profile_id)->first();

        $data['bank'] = BankDetail::select('id', 'bankname', 'ifsccode', 'branch', 'acount_number', 'pan_name', 'pan_number', 'cancel_chaque')->where('user_id', $id)->where('profile_id', $profile_id)->first();

        $data['OrignalSong'] = OrignalSong::select('id', 'file_path', 'perfomed_at', 'spotify_url', 'amazon_prime', 'jio_savan', 'apple_music', 'tidel', 'deezer', 'pandoora', 'qubon')->where('user_id', $id)->where('profile_id', $profile_id)->get();

        $data['CityPrice'] = CityPrice::select('tbl_city_price.id', 'tbl_city_price.city_id', 'tbl_city_price.price', 'tbl_cities.name as city_name')->join('tbl_cities', 'tbl_cities.id', '=', 'tbl_city_price.city_id')->where('user_id', $id)->where('profile_id', $profile_id)->get()->toArray();

        $data['Subcategories'] = SelecteSubcategories::select('tbl_selected_subcategories.subcategory_id', 'tbl_artist_subcategory.name')->join('tbl_artist_subcategory', 'tbl_artist_subcategory.id', '=', 'tbl_selected_subcategories.subcategory_id')->where('user_id', $id)->where('profile_id', $profile_id)->get();

        $language = explode(',', $profiles->language_ids);
        $data['languages'] = Languages::select('id', 'language')->whereIn('id', $language)->get();

        $genres = explode(',', $profiles->genres_id);
        $data['Genres'] = Genres::select('id', 'name', 'image')->whereIn('id', $genres)->get();

        $venue = explode(',', $profiles->venue_id);
        $data['Venue'] = Venue::select('id', 'name', 'image')->whereIn('id', $venue)->get();

        $data['ManagerDetail'] = ManagerDetail::select('id', 'signature', 'name', 'contact_no')->where('user_id', $id)->where('profile_id', $profile_id)->first();

        $Budget = Budget::leftJoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_budget.venue_id')
            ->leftJoin('tbl_artist_subcategory', 'tbl_budget.subcategory_id', '=', 'tbl_artist_subcategory.id')
            ->select('tbl_budget.id', 'tbl_budget.price', 'tbl_budget.intrument_ids', 'tbl_venue.name as venue_name', 'tbl_artist_subcategory.name as subcategory_name')
            ->where('tbl_budget.user_id', '=', $id)
            ->where('tbl_budget.profile_id', $profile_id)
            ->get()->toArray();
        foreach ($Budget as &$row) {
            $intrument_ids = explode(',', $row['intrument_ids']);
            $row['intrument_name'] = Instruments::select(DB::raw("GROUP_CONCAT(name) as intruments"))
                ->whereIn('id', $intrument_ids)
                ->get()->first()->intruments;
        }
        $data['budgets'] = $Budget;
        return response()->json(['error' => false, 'message' => 'new venue add.', 'data' => $data]);
    }

    public function BookArtist(Request $request)
    {
        $post['artist_id'] = $request['artist_id'];
        $post['club_id'] = $request['club_id'];
        $post['book_date'] = $request['book_date'];
        $post['book_slot'] = $request['book_slot'];
        $post['show_start_time'] = $request['show_start_time'];
        $post['show_end_time'] = $request['show_end_time'];
        $post['sound_check_time'] = $request['sound_check_time'];
        $post['no_of_break'] = $request['no_of_break'];
        $post['formation'] = $request['formation'];
        $post['genres'] = $request['genres'];
        $post['main_course'] = $request['main_course'];
        $post['starter'] = $request['starter'];
        $post['non_alcoholic_beverages'] = $request['non_alcoholic_beverages'];
        $post['alcoholic_beverages'] = $request['alcoholic_beverages'];
        BookArtist::create($post);
        return response()->json(['error' => false, 'message' => 'Booking Artist Request send Successfully.', 'data' => NULL]);
    }

    public function GetBookList(Request $request)
    {
        $BookArtist = BookArtist::where(['club_id' => $request['club_id']])->get()->toArray();
        if (!empty($BookArtist)) {
            return response()->json(['error' => false, 'message' => 'Get Artist Booking List Successfully.', 'data' => $BookArtist]);
        } else {
            return response()->json(['error' => true, 'message' => 'Booking List not Available.', 'data' => NULL]);
        }
    }

    public function GetBookArtist(Request $request)
    {
        $BookArtist = BookArtist::where(['id' => $request['book_id']])->first();
        if (!empty($BookArtist)) {
            return response()->json(['error' => false, 'message' => 'Get Booking Artist Request Successfully.', 'data' => $BookArtist]);
        } else {
            return response()->json(['error' => true, 'message' => 'Artist Booking not Available.', 'data' => NULL]);
        }
    }

    public function GuastTopBanner(Request $request)
    {
        $data = GuastTopBanner::where('status', '1')->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Guast Top Banner Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Guast Top Banner not found.', 'data' => NULL]);
        }
    }
    public function GuastmiddleBanner(Request $request)
    {
        $data = GuastMiddleBanner::where('status', '1')->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Guast middle Banner Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Guast middle Banner not found.', 'data' => NULL]);
        }
    }

    public function BestOffers(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = BestOffers::where('status', '1')->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Best Offer Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Best Offer not found.', 'data' => NULL]);
        }
    }

    public function HighlyRecommended(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = HighlyRecommended::where('status', '1')->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Highly Recommended Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Highly Recommended not found.', 'data' => NULL]);
        }
    }

    public function topclubs(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = topclubs::where('status', 1)->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Top Club Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Top Club not found.', 'data' => NULL]);
        }
    }

    public function HappenningParty(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = LiveClubParform::where('status', 1)->get()->toArray();
        $data_array = [];
        foreach ($data as $row) {
            if ($row['max_seating'] <= $row['seating']) {
                $data_array[] = $row;
            }
        }
        if (!empty($data_array)) {
            return response()->json(['error' => false, 'message' => 'Get Top Club Successfully.', 'data' => $data_array]);
        } else {
            return response()->json(['error' => true, 'message' => 'Top Club not found.', 'data' => NULL]);
        }
    }

    public function BottomBanners(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = BottomBanners::where('status', 1)->get()->toArray();
        foreach ($data as &$row) {
            $row['day'] = date('l');
            $row['start_time'] = date('h:i A');
        }
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Bottom Banner Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Bottom Banner not found.', 'data' => NULL]);
        }
    }

    public function generes(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = Genres::where('status', '1')->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Generes Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Generes not found.', 'data' => NULL]);
        }
    }

    public function NewOn(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = Events::get()->toArray();
        foreach ($data as &$row) {
            $row['off'] = (($row['fee'] - $row['entry_fees']) / $row['fee']) * 100;
            $row['rating'] = '4.5';
        }
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get NewOn Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'NewOn not found.', 'data' => NULL]);
        }
    }

    public function PopularClub(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = PopularClub::get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Popular Club Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Popular Club not found.', 'data' => NULL]);
        }
    }

    public function Coupon(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = Coupon::get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Coupon Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Coupon not found.', 'data' => NULL]);
        }
    }

    public function PromoCode(Request $request)
    {
        $guast_id = $request['guast_id'];
        $data = PromoCode::get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Promo Code Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Promo Code not found.', 'data' => NULL]);
        }
    }

    public function DealType()
    {
        $data = [];
        $obj = ['id' => 0, 'name' => "All \nDeals"];
        $data[] = $obj;
        $query = DealType::select('id', 'name')->where('status', '1')->get()->toArray();
        foreach ($query as $row) {
            $data[] = ['id' => $row['id'], 'name' => $row['name']];
        }
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Deal Type Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Deal Type not found.', 'data' => NULL]);
        }
    }

    public function Deals(Request $request)
    {
        $deal_type_id = $request['deal_type_id'];
        $club_id = $request['club_id'];
        $query = Deals::select('tbl_deals.*', DB::raw('(SELECT COUNT(id) FROM tbl_book_detail WHERE tbl_book_detail.club_id = "' . $club_id . '") as bought'))->where('club_id', $club_id);
        if ($deal_type_id != "0") {
            $query->where('deal_type_id', $deal_type_id);
        }
        $data = $query->get()->toArray();
        $detail = ClubeDetail::where('user_id', $club_id)->first();
        foreach ($data as &$row) {
            $row['weeks'] = DealDayTime::select('start_time', 'end_time', DB::raw('CASE day WHEN 0 THEN "Monday" WHEN 1 THEN "Tuesday" WHEN 2 THEN "Wednesday" WHEN 3 THEN "Thursday" WHEN 4 THEN "Friday" WHEN 5 THEN "Saturday" WHEN 6 THEN "Sunday" ELSE "Unknown" END AS valid_on'))->where('deal_id', $row['id'])->get()->toArray();
            $images = explode(',', $row['images']);
            if (!empty($images)) {
                $img = DealImage::wherein('id', $images);
                if (!empty($img)) {
                    $row['images'] = $img;
                } else {
                    $row['images'] = Null;
                }
            } else {
                $row['images'] = Null;
            }

            // Define the minimum and maximum prices
            $min_price = $row['min_price'];
            $max_price = $row['max_price'];

            // Define the maximum seating capacity and the threshold for a "happening party"
            $party_threshold = $detail->happening;
            $row['seat_capacity'] = $detail->seal_limit;
            $row['seal_limit'] = $party_threshold;

            $part = $detail->increase_part;
            $row['increase_part'] = $part;
            // $row['valid_on'] = 

            // Define the price increase per 24 people
            $price_increase = ($max_price - $min_price) / $part;

            // Assume that $num_people is the number of people who have entered your restaurant
            $people = ($party_threshold / $part);
            $num_people = $row['bought'];

            if ($num_people <= $people) {
                // No party yet, use the minimum price
                $current_price = (int)$min_price;
            } else {
                // Determine how many price increases have occurred
                $num_increases = floor($num_people / $people);

                // Calculate the current price based on the number of increases
                $current_price = $min_price + ($num_increases * $price_increase);

                // Make sure the current price does not exceed the maximum price
                $current_price = min($current_price, $max_price);
            }
            $row['live_price'] = $current_price;
        }
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Deal Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Deal not found.', 'data' => NULL]);
        }
    }

    public function GetCart(Request $request)
    {
        $guast_id = $request['guast_id'];
        $cart = Cart::select('deal_id')->where('guast_id', $guast_id)->get()->toArray();
        if (!empty($cart)) {
            $total_payble = 0;
            $query = Deals::select('tbl_deals.*', DB::raw('(SELECT COUNT(id) FROM tbl_book_detail WHERE tbl_book_detail.club_id = tbl_deals.club_id) as bought'))->whereIn('tbl_deals.id', $cart);
            $data = $query->get()->toArray();
            foreach ($data as &$row) {
                $detail = ClubeDetail::where('user_id', $row['club_id'])->first();
                $row['weeks'] = DealDayTime::select('start_time', 'end_time', DB::raw('CASE day WHEN 0 THEN "Monday" WHEN 1 THEN "Tuesday" WHEN 2 THEN "Wednesday" WHEN 3 THEN "Thursday" WHEN 4 THEN "Friday" WHEN 5 THEN "Saturday" WHEN 6 THEN "Sunday" ELSE "Unknown" END AS valid_on'))->where('deal_id', $row['id'])->get()->toArray();
                $images = explode(',', $row['images']);
                if (!empty($images)) {
                    $img = DealImage::wherein('id', $images);
                    if (!empty($img)) {
                        $row['images'] = $img;
                    } else {
                        $row['images'] = Null;
                    }
                } else {
                    $row['images'] = Null;
                }

                // Define the minimum and maximum prices
                $min_price = $row['min_price'];
                $max_price = $row['max_price'];

                // Define the maximum seating capacity and the threshold for a "happening party"
                $party_threshold = $detail->happening;
                $row['seat_capacity'] = $detail->seal_limit;
                $row['seal_limit'] = $party_threshold;

                $part = $detail->increase_part;
                $row['increase_part'] = $part;
                // $row['valid_on'] = 

                // Define the price increase per 24 people
                $price_increase = ($max_price - $min_price) / $part;

                // Assume that $num_people is the number of people who have entered your restaurant
                $people = ($party_threshold / $part);
                $num_people = $row['bought'];

                if ($num_people <= $people) {
                    // No party yet, use the minimum price
                    $current_price = (int)$min_price;
                } else {
                    // Determine how many price increases have occurred
                    $num_increases = floor($num_people / $people);

                    // Calculate the current price based on the number of increases
                    $current_price = $min_price + ($num_increases * $price_increase);

                    // Make sure the current price does not exceed the maximum price
                    $current_price = min($current_price, $max_price);
                }
                $total_payble += $current_price;
            }
            $response['total_payble'] = $total_payble;
            $response['cart'] = $data;

            return response()->json(['error' => false, 'message' => 'Get Cart Detail Successfully.', 'data' => $response]);
        } else {
            return response()->json(['error' => true, 'message' => 'Cart Detail not found.', 'data' => NULL]);
        }
    }

    public function JumpStartMenu(Request $request)
    {
        $club_id = $request['club_id'];
        $data = JumpStartMenu::where('club_id', $club_id)->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Jump Start Menu Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Jump Start Menu not found.', 'data' => NULL]);
        }
    }

    // Get food menu by club id. This is used to show a list
    public function FoodMenu(Request $request)
    {
        $club_id = $request['club_id'];
        $data = FoodMenu::where('club_id', $club_id)->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Food Menu Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Food Menu not found.', 'data' => NULL]);
        }
    }
    public function BevarageMenu(Request $request)
    {
        $club_id = $request['club_id'];
        $data = BevarageMenu::where('club_id', $club_id)->get()->toArray();
        if (!empty($data)) {
            return response()->json(['error' => false, 'message' => 'Get Bevareage Menu Successfully.', 'data' => $data]);
        } else {
            return response()->json(['error' => true, 'message' => 'Bevareage Menu not found.', 'data' => NULL]);
        }
    }

    // Adds a new cart to the database. This is a POST request and should return a JSON object
    public function AddCart(Request $request)
    {
        $post['guast_id'] =  $request['guast_id'];
        $post['deal_id'] = $request['deal_id'];
        $insert = Cart::create($post);
        return response()->json(['error' => false, 'message' => 'Cart Added successfully', 'data' => NULL]);
    }

    public function DeleteCart(Request $request)
    {
        $post['guast_id'] =  $request['guast_id'];
        $post['deal_id'] = $request['deal_id'];
        Cart::where($post)->delete();
        return response()->json(['error' => false, 'message' => 'Cart Deleted successfully', 'data' => NULL]);
    }
}
