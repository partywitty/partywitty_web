<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Facade\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('singup', [ApiController::class, 'singup']);
Route::post('login', [ApiController::class, 'login']);
Route::post('verify_otp', [ApiController::class, 'verify_otp']);
Route::post('guast_verify_otp', [ApiController::class, 'guast_verify_otp']);
Route::post('set_role', [ApiController::class, 'set_role']);
Route::post('send_request', [ApiController::class, 'send_request']);
Route::post('accept_reject_request', [ApiController::class, 'accept_reject_request']);
Route::post('referral_code', [ApiController::class, 'referral_code']);
Route::post('list_of_artist', [ApiController::class, 'list_of_artist']);
Route::post('type_of_artist', [ApiController::class, 'GetTypeOfArtist']);
Route::post('TypeOfArtistSearch', [ApiController::class, 'TypeOfArtistSearch']);
Route::post('TypeOfArtistSubmit', [ApiController::class, 'TypeOfArtistSubmit']);
Route::post('type_of_artist_subcategory', [ApiController::class, 'ArtistSubcategory']);
Route::post('searchSubcategoryArtist', [ApiController::class, 'searchSubcategoryArtist']);
Route::post('submitSubCategoryArtist', [ApiController::class, 'submitSubCategoryArtist']);
Route::post('GetGenres', [ApiController::class, 'GetGenres']);
Route::post('SearchGenres', [ApiController::class, 'SearchGenres']);
Route::post('SubmitGenres', [ApiController::class, 'SubmitGenres']);
Route::post('GetVenue', [ApiController::class, 'GetVenue']);
Route::post('SearchVenue', [ApiController::class, 'SearchVenue']);
Route::post('SubmitVenue', [ApiController::class, 'SubmitVenue']);
Route::post('SubmitIntro', [ApiController::class, 'SubmitIntro']);
Route::post('media_upload', [ApiController::class, 'media_upload']);
Route::post('GetMediaList', [ApiController::class, 'GetMediaList']);
Route::post('SaveMedia', [ApiController::class, 'SaveMedia']);
Route::post('GetUserProfiles', [ApiController::class, 'GetUserProfiles']);
Route::post('Streaming_platform', [ApiController::class, 'Streaming_platform']);
Route::post('PostSocial', [ApiController::class, 'PostSocial']);
Route::post('submitintagram', [ApiController::class, 'submitintagram']);
Route::post('submitfbdata', [ApiController::class, 'submitfbdata']);
Route::post('SubmitAddress', [ApiController::class, 'SubmitAddress']);
Route::post('SubmitBankDetail', [ApiController::class, 'SubmitBankDetail']);
Route::post('GetAddress', [ApiController::class, 'GetAddress']);
Route::post('GetBankDetail', [ApiController::class, 'GetBankDetail']);
Route::post('submitClubProfileInfo', [ApiController::class, 'submitClubProfileInfo']);
Route::post('SubmitClubeDetail', [ApiController::class, 'SubmitClubeDetail']);
Route::post('SubmitFloorDetail', [ApiController::class, 'SubmitFloorDetail']);
Route::get('getBanks', [ApiController::class, 'getBanks']);
Route::get('getServiceAgreement/{id}', [ApiController::class, 'getServiceAgreement']);
Route::post('getInstruments', [ApiController::class, 'getInstruments']);
Route::post('SelectInstruments', [ApiController::class, 'SelectInstruments']);
Route::post('SelectIntrument', [ApiController::class, 'SelectIntrument']);
Route::post('GetSelected', [ApiController::class, 'GetSelected']);
Route::post('AddBudget', [ApiController::class, 'AddBudget']);
Route::post('SummaryOfBudget', [ApiController::class, 'SummaryOfBudget']);
Route::get('getCity', [ApiController::class, 'getCity']);
Route::post('SetCityBudgut', [ApiController::class, 'SetCityBudgut']);
Route::post('AddProducts', [ApiController::class, 'AddProducts']);
Route::post('GetProductById', [ApiController::class, 'GetProductById']);
Route::post('UpdateProduct', [ApiController::class, 'UpdateProduct']);
Route::post('RemoveProduct', [ApiController::class, 'RemoveProduct']);
Route::post('GetProduct', [ApiController::class, 'GetProduct']);
Route::post('RequestBooking', [ApiController::class, 'RequestBooking']);
Route::get('GetEventType', [ApiController::class, 'GetEventType']);
Route::post('AddEvent', [ApiController::class, 'AddEvent']);
Route::post('GetEvents', [ApiController::class, 'GetEvents']);
Route::post('SubmitManagerDetail', [ApiController::class, 'SubmitManagerDetail']);
Route::get('GetLanguages', [ApiController::class, 'GetLanguages']);
Route::post('DeleteMedia', [ApiController::class, 'DeleteMedia']);
Route::post('SubcategoryPage', [ApiController::class, 'SubcategoryPage']);
Route::post('SubmitSubcategoryPage', [ApiController::class, 'SubmitSubcategoryPage']);
Route::post('SubcategoryBudgut', [ApiController::class, 'SubcategoryBudgut']);
Route::post('SubmitSubcategoryBudgut', [ApiController::class, 'SubmitSubcategoryBudgut']);
Route::post('SubmitOffer', [ApiController::class, 'SubmitOffer']);
Route::post('Offers', [ApiController::class, 'Offers']);
Route::post('SingleOffer', [ApiController::class, 'SingleOffer']);
Route::post('FilterArtist', [ApiController::class, 'FilterArtist']);
Route::post('GetUser', [ApiController::class, 'GetUser']);
Route::post('GetReward', [ApiController::class, 'GetReward']);
Route::post('RewardClaim', [ApiController::class, 'RewardClaim']);
Route::post('GetProfile', [ApiController::class, 'GetProfile']);
Route::post('EditProfile', [ApiController::class, 'EditProfile']);
Route::post('OffersList', [ApiController::class, 'OffersList']);
Route::post('city_price', [ApiController::class, 'city_price']);
Route::post('DeleteCityPrice', [ApiController::class, 'DeleteCityPrice']);
Route::post('AuthUser', [ApiController::class, 'AuthUser']);
Route::post('GuestSignup', [ApiController::class, 'GuestSignup']);
Route::post('GuestLogin', [ApiController::class, 'GuestLogin']);
Route::post('AuthGuest', [ApiController::class, 'AuthGuest']);
Route::post('GuestProfileUpdate', [ApiController::class, 'GuestProfileUpdate']);
Route::post('UserProfileUpdate', [ApiController::class, 'UserProfileUpdate']);
Route::post('RequestList', [ApiController::class, 'RequestList']);
Route::post('NotifyEmails', [ApiController::class, 'NotifyEmails']);
Route::post('ForgotPassword', [ApiController::class, 'ForgotPassword']);
Route::post('PasswordUpdate', [ApiController::class, 'PasswordUpdate']);
Route::post('GuastForgotPassword', [ApiController::class, 'GuastForgotPassword']);
Route::post('GuastPasswordUpdate', [ApiController::class, 'GuastPasswordUpdate']);
Route::get('ClubList', [ApiController::class, 'ClubList']);
Route::post('ArtistAgreement', [ApiController::class, 'ArtistAgreement']);
Route::post('AgreementVerify', [ApiController::class, 'AgreementVerify']);
Route::post('ProfileImages', [ApiController::class, 'ProfileImages']);
Route::post('RewardScratch', [ApiController::class, 'RewardScratch']);
Route::post('SubmitLanguage', [ApiController::class, 'SubmitLanguage']);
Route::post('GetFloor', [ApiController::class, 'GetFloor']);
Route::post('GetSelectedLanguage', [ApiController::class, 'GetSelectedLanguage']);
Route::post('DeleteSelectedLanguage', [ApiController::class, 'DeleteSelectedLanguage']);
Route::post('UpdateSelectedLanguage', [ApiController::class, 'UpdateSelectedLanguage']);
Route::post('deleteCityBudgut', [ApiController::class, 'deleteCityBudgut']);
Route::post('GetSocial', [ApiController::class, 'GetSocial']);
Route::post('GetIntro', [ApiController::class, 'GetIntro']);
Route::post('GetStreamingPlatform', [ApiController::class, 'GetStreamingPlatform']);
Route::post('PutManagerDetail', [ApiController::class, 'PutManagerDetail']);
Route::post('GetManagerDetail', [ApiController::class, 'GetManagerDetail']);
Route::post('vocalistprofile', [ApiController::class, 'vocalistprofile']);
Route::post('AddNewVenue', [ApiController::class, 'AddNewVenue']);
Route::post('AddSubCategory', [ApiController::class, 'AddSubCategory']);
Route::post('NewVenueSelected', [ApiController::class, 'NewVenueSelected']);
Route::post('NewSubCategoryselected', [ApiController::class, 'NewSubCategoryselected']);
Route::post('AllArtist', [ApiController::class, 'AllArtist']);
Route::post('ArtistDetail', [ApiController::class, 'ArtistDetail']);
Route::post('BookArtist', [ApiController::class, 'BookArtist']);
Route::post('GetBookArtist', [ApiController::class, 'GetBookArtist']);
Route::post('GetBookList', [ApiController::class, 'GetBookList']);
Route::get('GuastTopBanner', [ApiController::class, 'GuastTopBanner']);
Route::get('GuastMiddleBanner', [ApiController::class, 'GuastMiddleBanner']);
Route::post('BestOffers', [ApiController::class, 'BestOffers']);
Route::post('HighlyRecommended', [ApiController::class, 'HighlyRecommended']);
Route::post('topclubs', [ApiController::class, 'topclubs']);
Route::post('HappenningParty', [ApiController::class, 'HappenningParty']);
Route::post('BottomBanners', [ApiController::class, 'BottomBanners']);
Route::post('generes', [ApiController::class, 'generes']);
Route::post('NewOn', [ApiController::class, 'NewOn']);
Route::post('PopularClub', [ApiController::class, 'PopularClub']);
Route::post('Coupon', [ApiController::class, 'Coupon']);
Route::post('PromoCode', [ApiController::class, 'PromoCode']);
Route::get('DealType', [ApiController::class, 'DealType']);
Route::post('Deals', [ApiController::class, 'Deals']);
Route::post('JumpStartMenu', [ApiController::class, 'JumpStartMenu']);
Route::post('FoodMenu', [ApiController::class, 'FoodMenu']);
Route::post('BevarageMenu', [ApiController::class, 'BevarageMenu']);
Route::post('AddCart', [ApiController::class, 'AddCart']);
Route::post('GetCart', [ApiController::class, 'GetCart']);
Route::post('DeleteCart', [ApiController::class, 'DeleteCart']);