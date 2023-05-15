<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\ArtistList;
use App\Models\ArtistSubcategory;
use App\Models\UserProfiles;
use App\Models\ContactAs;
use App\Models\MusicianList;
use App\Models\UserReferral;
use App\Models\Venue;
use App\Models\UserMedia;
use App\Models\OrignalSong;
use App\Models\Address;
use App\Models\BankDetail;
use App\Models\ServiceAgreement;
use App\Models\Bank;
use App\Models\Occasions;
use App\Models\Genres;
use App\Models\EventForm;
use App\Models\ClubOffers;
use App\Models\OffersCategory;
use App\Models\OffersBook;
use App\Models\BookDetail;
use App\Models\Offers;
use App\Models\Guests;
use App\Models\Budget;
use App\Models\CityPrice;
use App\Models\SelecteSubcategories;
use App\Models\SelectIntrument;
use App\Models\Instruments;
use Illuminate\Support\Facades\DB;
use App\Models\ManagerDetail;
use App\Models\Languages;
use App\Models\ArtistProfileApprove;
use App\Models\JumpStartMenu;
use App\Models\FoodMenu;
use App\Models\BevarageMenu;
use App\Models\DealImage;
use App\Models\Deals;
use App\Models\DealType;
use App\Models\DealDayTime;
use Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $admin = Admin::where('username', $request['username'])->first();
        if (!empty($admin)) {
            if (password_verify($request['password'], $admin->password)) {
                return redirect('admin_Dashboard');
            } else {
                return redirect('admin')->with('error', 'Password Incorrect!');
            }
        } else {
            return redirect('admin')->with('error', 'Email Not Found!');
        }
    }

    public function admin_Dashboard()
    {
        return view('admin.dashboard', ['pagename' => 'Dashboard']);
    }
    public function artist_dashboard()
    {
        return view('admin.artist_dashboard', ['pagename' => 'Artist Dashboard']);
    }

    public function guest_artist()
    {
        $users = Guests::orderBy('id', 'DESC')->get()->toArray();
        return view('admin.manage_guest', ['users' => $users, 'pagename' => 'Manage Guest']);
    }

    public function manage_artist()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 'Artist')->get()->toArray();
        return view('admin.manage_artist', ['users' => $users, 'pagename' => 'Manage Artist']);
    }
    public function manage_club()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 'Club')->get()->toArray();
        return view('admin.manage_artist', ['users' => $users, 'pagename' => 'Manage Club']);
    }

    public function guest_wallets()
    {
        $data['pagename'] = 'Guest Wallets';
        $data['users'] = User::select('tbl_users.username as guast_name', 'tbl_reward_claims.club_id', 'tbl_reward_claims.guast_id', 'tbl_reward_claims.created_at', 'user2.username as club_name')
            ->join('tbl_reward_claims', 'tbl_reward_claims.guast_id', '=', 'tbl_users.id', 'left')
            ->join('tbl_users as user2', 'user2.id', '=', 'tbl_reward_claims.club_id', 'left')
            ->orderBy('tbl_users.id', 'desc')
            ->get()->toArray();
        return view('admin.guest_wallets', $data);
    }

    public function contact_as()
    {
        $contacts = ContactAs::all();
        return view('admin.contact_as', ['contacts' => $contacts, 'pagename' => 'Contact As']);
    }

    public function request_for()
    {
        $UserReferral = UserReferral::orderBy('id', 'DESC')->select('tbl_user_referral.*', 't2.username as request_by_name', 't3.username as request_to_name')
            ->join('tbl_users as t2', 't2.id', '=', 'tbl_user_referral.request_by', 'left')
            ->join('tbl_users as t3', 't3.id', '=', 'tbl_user_referral.request_to', 'left')
            ->get()->toArray();
        return view('admin.request_for', ['UserReferrals' => $UserReferral, 'pagename' => 'Request For']);
    }

    public function status_change(Request $request)
    {
        $id = $request['id'];
        UserReferral::where('id', $id)->update(['status' => '1']);
        return response()->json(['error' => false, 'message' => 'update Status', 'data' => NULL]);
    }

    public function user_status(Request $request)
    {
        $post['status'] = $request['status'];
        User::where('id', $request['id'])->update($post);
        return response()->json(['error' => false, 'message' => 'update Status', 'data' => NULL]);
    }

    public function delete_user(Request $request)
    {
        User::where('id', $request['id'])->delete();
        return response()->json(['error' => false, 'message' => 'delete user', 'data' => NULL]);
    }

    public function profile($user_id)
    {
        $user = User::where('id', $user_id)->first();
        session()->put('userdata', $user);
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
    }

    public function private_event()
    {
        $data['pagename'] = 'Private Events';
        $data['events'] = EventForm::select('*', 'tbl_type_of_occasion.name as occation_name', 'tbl_genres.name as genres_name')
            ->join('tbl_type_of_occasion', 'tbl_type_of_occasion.id', '=', 'tbl_event_form.occasion_id')
            ->join('tbl_genres', 'tbl_genres.id', '=', 'tbl_event_form.genres_id')
            ->where('typeOfevent', 'private')->get()->toArray();
        return view('admin.events', $data);
    }

    public function corporate_event()
    {
        $data['pagename'] = 'Private Events';
        $data['events'] = EventForm::select('*', 'tbl_type_of_occasion.name as occation_name', 'tbl_genres.name as genres_name')
            ->join('tbl_type_of_occasion', 'tbl_type_of_occasion.id', '=', 'tbl_event_form.occasion_id')
            ->join('tbl_genres', 'tbl_genres.id', '=', 'tbl_event_form.genres_id')
            ->where('typeOfevent', 'corporate')->get()->toArray();
        return view('admin.events', $data);
    }

    public function club_offers()
    {
        $data['pagename'] = 'Club Offers';
        $data['offers'] = ClubOffers::all();
        return view('admin.club_offers', $data);
    }

    public function delete_offer(Request $request)
    {
        $id = $request['id'];
        $delete = Offers::where('id', $id)->delete();
        if ($delete) {
            return response()->json(['error' => false, 'message' => 'Delete successfully', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something error', 'data' => NULL]);
        }
    }

    public function offers($id)
    {
        $data['offers'] = Offers::where('club_id', $id)->get()->toArray();
        $data['pagename'] = "Offers List";
        return view('admin.offers', $data);
    }

    public function deal_sold($id)
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
        return view('admin.deal_sold', $data);
    }

    public function delete_offer_detail(Request $request)
    {
        BookDetail::where('offers_book_id', $request['id'])->delete();
        $delete = OffersBook::where('id', $request['id'])->delete();
        if ($delete) {
            return response()->json(['error' => false, 'message' => 'Delete successfully', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something error', 'data' => NULL]);
        }
    }

    public function artist_profile_view($id)
    {
        $data['user'] = User::where('id', $id)->first();
        $profiles = UserProfiles::where('user_id', $id)->first();
        $data['profiles'] = $profiles;
        $data['medias'] = UserMedia::where('user_id', $id)->get();
        $data['address'] = Address::where('user_id', $id)->first();
        $data['bank'] = BankDetail::where('user_id', $id)->first();
        $data['OrignalSong'] = OrignalSong::where('user_id', $id)->get();
        $data['SelectIntrument'] = SelectIntrument::where('user_id', $id)->get();
        // $data['Budget'] = Budget::where('user_id', $id)->get();
        $data['CityPrice'] = CityPrice::select('tbl_city_price.*', 'tbl_cities.name as city_name')->join('tbl_cities', 'tbl_cities.id', '=', 'tbl_city_price.city_id')->where('user_id', $id)->get()->toArray();
        $data['Subcategories'] = SelecteSubcategories::where('user_id', $id)->get();
        $genres = explode(',', $profiles->genres_id);
        $language = explode(',', $profiles->language_ids);
        $data['languages'] = Languages::whereIn('id', $language)->get();
        $data['Genres'] = Genres::whereIn('id', $genres)->get();
        $venue = explode(',', $profiles->venue_id);
        $data['Venue'] = Venue::whereIn('id', $venue)->get();
        $data['ManagerDetail'] = ManagerDetail::where('user_id', $id)->first();
        $Budget = Budget::leftJoin('tbl_venue', 'tbl_venue.id', '=', 'tbl_budget.venue_id')
            ->leftJoin('tbl_artist_subcategory', 'tbl_budget.subcategory_id', '=', 'tbl_artist_subcategory.id')
            ->select('tbl_budget.*', 'tbl_venue.name as venue_name', 'tbl_artist_subcategory.name as subcategory_name')
            ->where('tbl_budget.user_id', '=', $id)
            ->get()->toArray();
        foreach ($Budget as &$row) {
            $intrument_ids = explode(',', $row['intrument_ids']);
            $row['intrument_name'] = Instruments::select(DB::raw("GROUP_CONCAT(name) as intruments"))
                ->whereIn('id', $intrument_ids)
                ->get()->first()->intruments;
        }
        $data['budgets'] = $Budget;
        $data['pagename'] = "Artist Profile";
        // $data['ArtistProfileApprove'] = ArtistProfileApprove::where('artist_id', $id)->get()->toArray();
        return view('aman.new', $data);
    }

    public function ArtistProfileApprove(Request $request)
    {
        $post['table_name'] = $request['table_name'];
        $post['column_name'] = $request['column_name'];
        $post['row_id'] = $request['row_id'];
        $post['status'] = $request['status'];
        $post['artist_id'] = $request['artist_id'];
        $post['reson'] = isset($request['reson']) ? $request['reson'] : "";
        ArtistProfileApprove::where(['artist_id' => $request['artist_id'], 'table_name' => $request['table_name'], 'column_name' => $request['column_name'], 'row_id' => $request['row_id']])->delete();
        $insert = ArtistProfileApprove::create($post);
        if ($insert) {
            return response()->json(['error' => false, 'message' => 'updated successfully.', 'data' => NULL]);
        } else {
            return response()->json(['error' => true, 'message' => 'Something error', 'data' => NULL]);
        }
    }

    public function ArtistServiceAgreement()
    {
        $data['contant'] = ServiceAgreement::where('id', 1)->first();
        $data['id'] = 1;
        $data['pagename'] = "Artist Service Agreement";
        return view('admin.ServiceAgreement', $data);
    }

    public function ClubServiceAgreement()
    {
        $data['contant'] = ServiceAgreement::where('id', 2)->first();
        $data['id'] = 2;
        $data['pagename'] = "club Service Agreement";
        return view('admin.ServiceAgreement', $data);
    }

    public function EditServiceAgreement(Request $request)
    {
        ServiceAgreement::where('id', $request['id'])->update(['contant' => $request['contant']]);
        if ($request['id'] == 1) {
            return redirect('artist-service-agreement')->with('success', 'Artist Service Agreement updated Successfully.');
        } else {
            return redirect('club-service-agreement')->with('success', 'club Service Agreement Successfully.');
        }
    }

    public function club_add(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required:email',
            'password' => 'required',
        ]);

        $data['username'] = $request['username'];
        $data['contact_no'] = $request['contact_no'];
        $data['email'] = $request['email'];
        $data['password'] = Hash::make($request['password']);
        $data['gender'] = 'male';
        $data['role'] = 'Club';
        $data['referral_code'] = Str::random(16);
        $data['last_login'] = date('Y-m-d h:i:s');
        $otp = random_int(1000, 9999);
        $data['otp'] = $otp;
        $this->sendsms($otp, $request['contact_no']);
        $inser_id = User::create($data);
        if ($inser_id) {
            return redirect()->back()->with('success', 'Club Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something error!');
        }
    }

    public function club_edit(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required:email'
        ]);

        $data['username'] = $request['username'];
        $data['contact_no'] = $request['contact_no'];
        $data['email'] = $request['email'];
        if ($request['password'] != "") {
            $data['password'] = Hash::make($request['password']);
        }
        $id = $request['id'];
        $query = User::where('id', $id)->update($data);
        if ($query) {
            return redirect()->back()->with('success', 'Club Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something error!');
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

    public function deal_add(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deal_type_id' => 'required',
            'images' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'artist_id' => 'required',
            'artist_price' => 'required',
        ]);

        if ($validator->passes()) {

            $data['club_id'] = $request['club_id'];
            $data['name'] = $request['name'];
            $data['deal_type_id'] = $request['deal_type_id'];
            $data['start_date'] = $request['start_date'];
            $data['end_date'] = $request['end_date'];
            $data['max_price'] = $request['max_price'];
            $data['min_price'] = $request['min_price'];
            $data['artist_id'] = $request['artist_id'];
            $data['artist_price'] = $request['artist_price'];
            $data['inclusion'] = $request['inclusion'];
            $data['detail'] = $request['detail'];
            $files = [];
            if ($request->images) {
                foreach ($request->images as $key => $file) {
                    $fileName = $key . time() . '_' . $request['name'] . '.' . $file->extension();
                    $file->move(public_path('uploads'), $fileName);
                    $post['image'] = 'public/uploads/' . $fileName;
                    $files[] = DealImage::create($post)->id;
                }
            }
            $data['images'] = implode(',', $files);
            $data['artist_name'] = User::where('id', $request['artist_id'])->first()->username;
            $deal_id = Deals::create($data)->id;
            foreach ($request['day'] as $val) {
                for ($i = 0; $i < count($request['start_time'][$val]); $i++) {
                    $Dealtime['deal_id'] = $deal_id;
                    $Dealtime['day'] = $val;
                    $Dealtime['start_time'] = $request['start_time'][$val][$i];
                    $Dealtime['end_time'] = $request['end_time'][$val][$i];
                    DealDayTime::create($Dealtime);
                }
            }
            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    public function deal_edit(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deal_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'artist_id' => 'required',
            'artist_price' => 'required',
        ]);

        if ($validator->passes()) {
            $id = $request['id'];
            $data['club_id'] = $request['club_id'];
            $data['name'] = $request['name'];
            $data['deal_type_id'] = $request['deal_type_id'];
            $data['start_date'] = $request['start_date'];
            $data['end_date'] = $request['end_date'];
            $data['max_price'] = $request['max_price'];
            $data['min_price'] = $request['min_price'];
            $data['artist_id'] = $request['artist_id'];
            $data['artist_price'] = $request['artist_price'];
            $data['inclusion'] = $request['inclusion'];
            $data['detail'] = $request['detail'];
            $files = [];
            if ($request->images) {
                foreach ($request->images as $key => $file) {
                    $fileName = $key . time() . '_' . $request['name'] . '.' . $file->extension();
                    $file->move(public_path('uploads'), $fileName);
                    $post['image'] = 'public/uploads/' . $fileName;
                    $files[] = DealImage::create($post)->id;
                }
            }
            $data['images'] = implode(',', $files);
            $data['artist_name'] = User::where('id', $request['artist_id'])->first()->username;
            Deals::where('id', $id)->update($data);

            DealDayTime::where('deal_id', $id)->delete();
            foreach ($request['day'] as $val) {
                for ($i = 0; $i < count($request['start_time'][$val]); $i++) {
                    $Dealtime['deal_id'] = $id;
                    $Dealtime['day'] = $val;
                    $Dealtime['start_time'] = $request['start_time'][$val][$i];
                    $Dealtime['end_time'] = $request['end_time'][$val][$i];
                    DealDayTime::create($Dealtime);
                }
            }
            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    public function deal_delete($id)
    {
        DealDayTime::where('deal_id', $id)->delete();
        Deals::where('id', $id)->delete();
        echo true;
    }

    public function jump_start_menu(Request $request)
    {
        if ($request->jump_start_menu) {
            $fileName = time() . '.' . $request->jump_start_menu->extension();
            $request->jump_start_menu->move(public_path('uploads/jump_start_menu'), $fileName);
            $post['file'] = 'public/uploads/jump_start_menu/' . $fileName;
            $post['club_id'] = $request['club_id'];
            $query = JumpStartMenu::where('club_id', $request['club_id'])->first();
            if (!empty($query)) {
                JumpStartMenu::where('club_id', $request['club_id'])->update($post);
            } else {
                JumpStartMenu::create($post);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function food_menu(Request $request)
    {
        if ($request->food_menu) {
            $fileName = time() . '.' . $request->food_menu->extension();
            $request->food_menu->move(public_path('uploads/food_menu'), $fileName);
            $post['file'] = 'public/uploads/food_menu/' . $fileName;
            $post['club_id'] = $request['club_id'];
            $query = FoodMenu::where('club_id', $request['club_id'])->first();
            if (!empty($query)) {
                FoodMenu::where('club_id', $request['club_id'])->update($post);
            } else {
                FoodMenu::create($post);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function bevarage_menu(Request $request)
    {
        if ($request->bevarage_menu) {
            $fileName = time() . '.' . $request->bevarage_menu->extension();
            $request->bevarage_menu->move(public_path('uploads/bevarage_menu'), $fileName);
            $post['file'] = 'public/uploads/bevarage_menu/' . $fileName;
            $post['club_id'] = $request['club_id'];
            $query = BevarageMenu::where('club_id', $request['club_id'])->first();
            if (!empty($query)) {
                BevarageMenu::where('club_id', $request['club_id'])->update($post);
            } else {
                BevarageMenu::create($post);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function jump_start_view($club_id)
    {
        $data['obj'] = JumpStartMenu::where('club_id', $club_id)->first();
        return view('admin.pdfview', $data);
    }

    public function food_view($club_id)
    {
        $data['obj'] = FoodMenu::where('club_id', $club_id)->first();
        return view('admin.pdfview', $data);
    }

    public function bevarage_view($club_id)
    {
        $data['obj'] = BevarageMenu::where('club_id', $club_id)->first();
        return view('admin.pdfview', $data);
    }

    public function add_combo_deal()
    {
        $data['headings'] = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $data['club_id'] = $_GET['club_id'];
        $data['artists'] = User::where(['role' => 'Artist', 'status' => '1'])->get()->toArray();
        $data['deal_type'] = DealType::select('id', 'name')->where('status', '1')->get()->toArray();
        $viewRender = view('admin.club.modal.add_combo_deal', $data)->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function club_dashboard($id)
    {
        $data['pagename'] = "Club Dashboard";
        $data['club_id'] = $id;
        $data['artists'] = User::where(['role' => 'Artist', 'status' => '1'])->get()->toArray();
        $data['deal_type'] = DealType::select('id', 'name')->where('status', '1')->get()->toArray();
        $data['deals'] = Deals::where('club_id', $id)->latest()->paginate(5);
        $data['jump_start'] = JumpStartMenu::where('club_id', $id)->first();
        $data['food'] = FoodMenu::where('club_id', $id)->first();
        $data['bevarage'] = BevarageMenu::where('club_id', $id)->first();
        return view('admin.club_dashboard', $data);
    }

    public function ComboDeal($id, Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Deals::select('count(*) as allcount')->where('club_id', $id)->count();
        $totalRecordswithFilter = Deals::select('count(*) as allcount')->where('club_id', $id)->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Deals::orderBy($columnName, $columnSortOrder)
            ->join('tbl_deal_type', 'tbl_deal_type.id', '=', 'tbl_deals.deal_type_id')
            ->where('tbl_deals.name', 'like', '%' . $searchValue . '%')
            ->where('club_id', $id)
            ->select('tbl_deals.*', 'tbl_deal_type.name as deal_type')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $i = $start;
        foreach ($records as $record) {
            if ($record->status == 0) {
                $status = '
                        <div class="d-btn-flex">
                            <div class="text-center"> 
                                <button type="button" class="btn btn-success btn-sm  pending-btn">Active</button>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger btn-sm pending-btn">Deactive</button>
                            </div>
                        </div>';
            } elseif ($record->status == 1) {
                $status = '<b class="text-success">Accepted</b>';
            } else {
                $status = '<b class="text-danger">Reject</b>';
            }

            $data_arr[] = array(
                "id" => ++$i,
                "name" => $record->name,
                "deal_type" => $record->deal_type,
                "min_price" => $record->min_price,
                "max_price" => $record->max_price,
                "artist_price" => $record->artist_price,
                "status" => $status,
                "action" => '<div class="d-btn-flex">
                <a href="javascript:void(0);" class="btn-sm "><i class="fa fa-eye " style="font-size: 22px;padding:8px 0px"></i></a>
                <a href="javascript:void(0);" class="btn-sm del edit_deal" data-id="' . $record->id . '"><i class="bx bx-edit-alt bxes"></i></a>
                <a href="javascript:void(0);" data-id="' . $record->id . '" class="btn-sm del delete"><i class="bx bx-trash-alt bxes"></i></a>
            </div>',
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    public function cross()
    {
        $data['pagename'] = "Club Dashboard";
        return view('admin.cross', $data);
    }

    public function edit_combo_deal_modal(Request $request)
    {
        $data['deal'] = Deals::where('id', $request->get('deal_id'))->first();
        // $data['daytime'] = DealDayTime::where('deal_id', $request->get('deal_id'))->get()->toArray();
        $data['headings'] = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $data['artists'] = User::where(['role' => 'Artist', 'status' => '1'])->get()->toArray();
        $data['deal_type'] = DealType::select('id', 'name')->where('status', '1')->get()->toArray();
        $viewRender = view('admin.club.modal.edit_combo_deal', $data)->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    /********************************* CLUB ********************************************************/

    public function club_manage()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 'Club')->get()->toArray();
        return view('admin.club.manage', ['users' => $users, 'pagename' => 'Club Manage']);
    }
    public function club_deal()
    {
        return view('admin.club.deal', ['pagename' => 'Club Deals']);
    }
    public function club_legal()
    {
        return view('admin.club.legal', ['pagename' => 'Club Legal']);
    }
    public function club_reports()
    {
        return view('admin.club.reports', ['pagename' => 'Club Reports']);
    }

    /********************************* CLUB ********************************************************/
}
