<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Models\ArtistList;
use FTP\Connection;
use Monolog\Processor\WebProcessor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
/************************* WebController  ****************************/
Route::get('', [WebController::class, 'index']);
Route::get('about', [WebController::class, 'about']);
Route::get('service', [WebController::class, 'service']);
Route::get('clients', [WebController::class, 'clients']);
Route::get('blog', [WebController::class, 'blog']);
Route::get('careers', [WebController::class, 'careers']);
Route::get('contact', [WebController::class, 'contact']);
Route::get('artist', [WebController::class, 'artist']);
Route::post('contact_submit', [WebController::class, 'contact_submit']);
Route::get('signup', [WebController::class, 'signup']);
Route::get('signin', [WebController::class, 'login']);
Route::post('signin_submit', [WebController::class, 'signin_submit']);
Route::get('artist_hire', [WebController::class, 'artist_hire']);
Route::post('user_submit', [WebController::class, 'user_submit']);
Route::post('artist_hire_submit', [WebController::class, 'artist_hire_submit']);
Route::get('terms-conditions', [WebController::class, 'terms_conditions']);
Route::get('privacy-policy', [WebController::class, 'privacy_policy']);
Route::get('refund-policy', [WebController::class, 'refund_policy']);
Route::get('artist-agreement', [WebController::class, 'artist_agreement']);
Route::get('club-agreement', [WebController::class, 'club_agreement']);
Route::get('our-artist', [WebController::class, 'our_artist']);
Route::get('event', [WebController::class, 'event']);
Route::get('guest-login', [WebController::class, 'guest_login']);
Route::get('guest-register', [WebController::class, 'guest_register']);
Route::get('corporate_party_form', [WebController::class, 'corporate_party_form']);
Route::get('book-party', [WebController::class, 'book_party']);
Route::get('book-artist', [WebController::class, 'book_artist']);
Route::get('book-club', [WebController::class, 'book_club']);
Route::get('book-corporate', [WebController::class, 'book_corporate']);
Route::get('book-private', [WebController::class, 'book_private']);
Route::get('private_party_form', [WebController::class, 'private_party_form']);
Route::post('submit-party-form', [WebController::class, 'submit_party_form']);
Route::get('forgot-password', [WebController::class, 'forgot_password']);
Route::get('reset-password', [WebController::class, 'reset_password']);
Route::get('otp', [WebController::class, 'otp']);
Route::post('otp-verify', [WebController::class, 'otp_verify']);
Route::post('forgot-submit', [WebController::class, 'forgot_submit']);
Route::post('submit-reset-pasword', [WebController::class, 'submit_reset_pasword']);
Route::get('club_offer', [WebController::class, 'club_offer']);
Route::post('club-offer', [WebController::class, 'add_club_offer']);
Route::get('partner_with_us', [WebController::class, 'partner_with_us']);
Route::get('offer', [WebController::class, 'offer']);
Route::get('offer-detail/{id}', [WebController::class, 'offer_detail']);
Route::get('booking-form/{id}', [WebController::class, 'booking_form']);
Route::post('booking_form_submit', [WebController::class, 'booking_form_submit']);
Route::get('checkout', [WebController::class, 'checkout']);
Route::post('guest_signup', [WebController::class, 'guest_signup']);
Route::get('my-profile', [WebController::class, 'my_profile']);
Route::get('my-booking', [WebController::class, 'my_booking']);
Route::get('guest-profile', [WebController::class, 'guest_profile']);
Route::get('guest-otp', [WebController::class, 'guest_otp']);
Route::post('book-passes', [WebController::class, 'book_passes']);
Route::post('submit-guast-login', [WebController::class, 'submit_guast_login']);
Route::post('apply-coupan-code', [WebController::class, 'apply_coupan_code']);
Route::get('deal-filter', [WebController::class, 'deal_filter']);
/************************* ArtistController  ****************************/

Route::get('solo_page', [ArtistController::class, 'solo_page']);
Route::get('trio_page', [ArtistController::class, 'trio_page']);
Route::get('solo_budget', [ArtistController::class, 'solo_budget']);
Route::get('trio_budget', [ArtistController::class, 'trio_budget']);
Route::get('city_budget', [ArtistController::class, 'city_budget']);
Route::get('duo_budget', [ArtistController::class, 'duo_budget']);
Route::get('duo_page', [ArtistController::class, 'duo_page']);
Route::get('artist_type', [ArtistController::class, 'artist_type']);
Route::post('get_artist', [ArtistController::class, 'get_artist']);
Route::post('artist_submit', [ArtistController::class, 'artist_submit']);
Route::get('musician_type', [ArtistController::class, 'musician_type']);
Route::post('get_music', [ArtistController::class, 'get_music']);
Route::post('music_submit', [ArtistController::class, 'music_submit']);
Route::get('dashboard', [ArtistController::class, 'dashboard']);
Route::get('thankyou', [ArtistController::class, 'thankyou']);
Route::get('referral_code', [ArtistController::class, 'referral_code']);
Route::post('referral_code_submit', [ArtistController::class, 'referral_code_submit']);
Route::get('artist_list', [ArtistController::class, 'artist_list']);
Route::post('send_request_artist', [ArtistController::class, 'send_request_artist']);
Route::get('genres', [ArtistController::class, 'genres']);
Route::post('set_genre', [ArtistController::class, 'set_genre']);
Route::post('get_genre', [ArtistController::class, 'get_genre']);
Route::post('genres_submit', [ArtistController::class, 'genres_submit']);
Route::get('venue', [ArtistController::class, 'venue']);
Route::post('get_venue', [ArtistController::class, 'get_venue']);
Route::post('venue_submit', [ArtistController::class, 'venue_submit']);
Route::get('intro_message', [ArtistController::class, 'intro_message']);
Route::post('intro_submit', [ArtistController::class, 'intro_submit']);
Route::get('photograph', [ArtistController::class, 'photograph']);
Route::get('videolist', [ArtistController::class, 'videolist']);
Route::get('coversong', [ArtistController::class, 'coversong']);
Route::get('Origanalsong', [ArtistController::class, 'Origanalsong']);
Route::get('uploadcelebs', [ArtistController::class, 'uploadcelebs']);
Route::get('UploadBands', [ArtistController::class, 'UploadBands']);
Route::get('UploadClubs', [ArtistController::class, 'UploadClubs']);
Route::get('intafollow', [ArtistController::class, 'intafollow']);
Route::post('submitinta', [ArtistController::class, 'submitinta']);
Route::get('facebook_data', [ArtistController::class, 'facebook_data']);
Route::get('subcategory-page', [ArtistController::class, 'subcategory_page']);
Route::post('submitfacebook', [ArtistController::class, 'submitfacebook']);
Route::get('instrumental-page', [ArtistController::class, 'instrumental_page']);
Route::post('get_instruments', [ArtistController::class, 'get_instruments']);
Route::post('set_instrument', [ArtistController::class, 'set_instrument']);
Route::post('set_instruments', [ArtistController::class, 'set_instruments']);
Route::post('get_selected_instrument', [ArtistController::class, 'get_selected_instrument']);
Route::get('subcategory-budgut/{id}', [ArtistController::class, 'subcategory_budgut']);
Route::post('submit_subcategory', [ArtistController::class, 'submit_subcategory']);
Route::post('submit_solo', [ArtistController::class, 'submit_solo']);
Route::post('delete_instrument', [ArtistController::class, 'delete_instrument']);
Route::post('submit_duo', [ArtistController::class, 'submit_duo']);
Route::post('submit_trio', [ArtistController::class, 'submit_trio']);
Route::get('address', [ArtistController::class, 'address']);
Route::post('submit_address', [ArtistController::class, 'submit_address']);
Route::get('bank_details', [ArtistController::class, 'bank_details']);
Route::post('submit_bank_detail', [ArtistController::class, 'submit_bank_detail']);
Route::get('media_file_upload/{id}', [ArtistController::class, 'media_file_upload']);
Route::post('file_upload', [ArtistController::class, 'file_upload']);
Route::post('upload_file_submit', [ArtistController::class, 'upload_file_submit']);
Route::get('service_agreement', [ArtistController::class, 'service_agreement']);
Route::post('agree', [ArtistController::class, 'agree']);
Route::get('artist-profile', [ArtistController::class, 'profile']);
Route::get('request-list', [ArtistController::class, 'request_list']);
Route::post('request_accept_reject_status', [ArtistController::class, 'request_accept_reject_status']);
Route::get('logout', [ArtistController::class, 'logout']);
Route::get('vocalist_type', [ArtistController::class, 'vocalist_type']);
Route::post('get_vocalist', [ArtistController::class, 'get_vocalist']);
Route::post('set_vocalist', [ArtistController::class, 'set_vocalist']);
Route::post('remove_vocalist', [ArtistController::class, 'remove_vocalist']);
Route::get('get_selected_vocalist', [ArtistController::class, 'get_selected_vocalist']);
Route::post('remove-media', [ArtistController::class, 'remove_media']);
Route::post('submit-city-budget', [ArtistController::class, 'submit_city_budget']);
Route::get('manager-detail', [ArtistController::class, 'manager_detail']);
Route::post('submit_manager_detail', [ArtistController::class, 'submit_manager_detail']);
Route::post('SerachArtist', [ArtistController::class, 'SerachArtist']);
Route::post('add_genres', [ArtistController::class, 'add_genres']);
Route::get('cart', [WebController::class, 'cart']);
/************************* ClubController  ****************************/

Route::get('club-profile-info', [ClubController::class, 'club_profile_info']);
Route::get('floor', [ClubController::class, 'floor']);
Route::post('submit-intro-message', [ClubController::class, 'submit_intro_message']);

Route::get('select_sound', [ClubController::class, 'select_sound']);
Route::get('guest-application', [ClubController::class, 'guest_application']);
Route::post('submit-guest-form', [ClubController::class, 'submit_guest_form']);
Route::get('select-season', [ClubController::class, 'select_season']);
Route::post('submit-season', [ClubController::class, 'submit_season']);
Route::get('select-ds', [ClubController::class, 'select_ds']);
Route::post('submit-ds', [ClubController::class, 'submit_ds']);
Route::get('photography-availability', [ClubController::class, 'photography_availability']);
Route::post('submit-photography', [ClubController::class, 'submit_photography']);
Route::get('select-live-music', [ClubController::class, 'select_live_music']);
Route::post('submit-sponsors', [ClubController::class, 'submit_sponsors']);
Route::get('select-brand', [ClubController::class, 'select_brand']);
Route::post('submit-want-sponsorship', [ClubController::class, 'submit_want_sponsorship']);
Route::post('add-floors', [ClubController::class, 'add_floors']);
Route::get('club-profile', [ClubController::class, 'club_profile']);
Route::get('club_deal_sold/{id}', [ClubController::class, 'club_deal_sold']);
/************************* AdminController  ****************************/

Route::get('admin', [AdminController::class, 'admin'])->name('login');
Route::post('login_submit', [AdminController::class, 'login_submit']);

Route::get('admin_Dashboard', [AdminController::class, 'admin_Dashboard']);
Route::get('artist_dashboard', [AdminController::class, 'artist_dashboard']);
Route::get('club_dashboard/{id}', [AdminController::class, 'club_dashboard']);
Route::post('jump_start_menu', [AdminController::class, 'jump_start_menu']);
Route::post('food_menu', [AdminController::class, 'food_menu']);
Route::post('bevarage_menu', [AdminController::class, 'bevarage_menu']);
Route::get('manage-artist', [AdminController::class, 'manage_artist']);
Route::get('manage-club', [AdminController::class, 'manage_club']);
Route::get('contact-us', [AdminController::class, 'contact_as']);
Route::get('request_for', [AdminController::class, 'request_for']);
Route::post('status_change', [AdminController::class, 'status_change']);
Route::post('user_status', [AdminController::class, 'user_status']);
Route::post('delete_user', [AdminController::class, 'delete_user']);
Route::get('profile/{id}', [AdminController::class, 'profile']);
Route::get('private-event', [AdminController::class, 'private_event']);
Route::get('corporate-event', [AdminController::class, 'corporate_event']);
Route::get('club-offers', [AdminController::class, 'club_offers']);
Route::post('delete_offer', [AdminController::class, 'delete_offer']);
Route::post('club_delete_offer', [AdminController::class, 'club_delete_offer']);
Route::get('guest-artist', [AdminController::class, 'guest_artist']);
Route::get('guest-wallets', [AdminController::class, 'guest_wallets']);
Route::get('offers/{id}', [AdminController::class, 'offers']);
Route::get('deal_sold/{id}', [AdminController::class, 'deal_sold']);
Route::post('delete_offer_detail', [AdminController::class, 'delete_offer_detail']);
Route::get('artist-profile-view/{id}', [AdminController::class, 'artist_profile_view']);
Route::post('ArtistProfileApprove', [AdminController::class, 'ArtistProfileApprove']);
Route::get('artist-service-agreement', [AdminController::class, 'ArtistServiceAgreement']);
Route::get('club-service-agreement', [AdminController::class, 'ClubServiceAgreement']);
Route::post('edit-service-agreement', [AdminController::class, 'EditServiceAgreement']);

Route::get('club_manage', [AdminController::class, 'club_manage']);
Route::get('club_deal', [AdminController::class, 'club_deal']);
Route::get('club_legal', [AdminController::class, 'club_legal']);
Route::get('club_reports', [AdminController::class, 'club_reports']);
Route::post('deal/add', [AdminController::class, 'deal_add'])->name('add.deal');
Route::post('deal/edit', [AdminController::class, 'deal_edit'])->name('edit.deal');
Route::get('deal/delete/{id?}', [AdminController::class, 'deal_delete'])->name('delete.deal');
Route::get('jump-start-menu/view/{id?}', [AdminController::class, 'jump_start_view'])->name('jump_start_view');
Route::get('food-menu/view/{id?}', [AdminController::class, 'food_view'])->name('food_view');
Route::get('bevarage-menu/view/{id?}', [AdminController::class, 'bevarage_view'])->name('bevarage_view');
Route::get('add_combo_deal', [AdminController::class, 'add_combo_deal']);
Route::get('ComboDeal/{id?}', [AdminController::class, 'ComboDeal'])->name('ComboDeal');
Route::get('cross', [AdminController::class, 'cross'])->name('cross');
Route::get('edit_combo_deal_modal', [AdminController::class, 'edit_combo_deal_modal']);

Route::post('club/add', [AdminController::class, 'club_add'])->name('add.club');
Route::post('club/edit', [AdminController::class, 'club_edit'])->name('edit.club');
// payment
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('demo', [AdminController::class, 'demo']);

Route::get('hdfc', [WebController::class, 'hdfc']);
Route::post('ccavRequestHandler', [WebController::class, 'ccavRequestHandler']);
Route::post('payment_status', [WebController::class, 'payment_status']);