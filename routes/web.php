<?php 

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
  
/*------------------------------------------------ Frontend route start------------------------------------------*/

Route::get('/', "MainController@index")->name('index');
Route::get('/listing', "MainController@listing")->name('listing');
Route::get('/details/{id?}', "MainController@details");
Route::post('/contact-us/send', 'InquiryController@sendcontactmail')->name('contactMail');


Route::any('/search-hostels', "MainController@searchHostels")->name('search');


Route::any('/filter-hostels', "MainController@filterHostels")->name('filterHostels');



Route::get('/about-us', "MainController@aboutUs")->name('about');
Route::get('/contact-us', "MainController@contact")->name('contact');
Route::get('/our-team', "MainController@team")->name('team');
Route::get('/404', "MainController@pagenotfound")->name('404');

/*Route::get('/about-us', "MainController@aboutUs")->name('about');

Route::get('/contact', "MainController@contact")->name('contact');

Route::get('/blog', "MainController@blog")->name('blog');

Route::get('/blog/{slug}', "MainController@blogPost")->name('blogPost');

Route::get('/unhinged', "MainController@unhinged")->name('unhinged');

Route::get('/unhinged/{slug}', "MainController@unhingedPost")->name('unhingedPost');

Route::get('/our-clients', "MainController@clients")->name('clients');

Route::post('/contact-us/send', 'InquiryController@sendcontactmail')->name('contactMail');

Route::get('/privacy-policy', "MainController@privacyPolicy")->name('privacyPolicy');

Route::get('/services', "MainController@services")->name('services');

Route::get('/404', "MainController@pagenotfound")->name('404');

Route::get('/portfolio', "MainController@portfolio")->name('portfolio');

Route::get('/portfolio/view', "MainController@portfolioView")->name('portfolioView');

Route::post('/comment/send', 'BlogCommentController@insert')->name('commentSend');*/

/*------------------------------------------------ Frontend route end------------------------------------------*/


/*------------------------------------------------ Admin route start-------------------------------------------*/
Route::Group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

Route::get('/', function () {
    return view('admin.index');
})->name('admin');

Route::get('/changepassword/{id}', "DropdownController@passwordedit")->name('admin.passwordEdit');

Route::put('/changepassword/update/{id}', "DropdownController@changepassword")->name('admin.updatePassword');

/*------------------------Inquiries Mails url-----------------------*/
Route::get('/inquiries', "InquiryController@show")->name('inquiry.home');

Route::get('/{id}/inquiry-view', "InquiryController@view")->name('inquiry.view');

Route::delete('/inquiry-delete', "InquiryController@delete")->name('inquiry.delete');

Route::post('/inquiry/search', 'InquiryController@search')->name('inquiry.search');
/*------------------------------------------------------------------*/

/*------------------------Blog Category url-------------------------*/
Route::get('/blog-categories', "BlogCategoryController@show")->name('blogCategory.home');

Route::post('/upload-blog-category',"BlogCategoryController@insert")->name('blogCategory.insert');

Route::get('/{slug}/blog-category-view', "BlogCategoryController@view")->name('blogCategory.view');

Route::get('/{slug}/blog-category-edit', "BlogCategoryController@edit")->name('blogCategory.edit');

Route::post('/{slug}/blog-category-update', "BlogCategoryController@update")->name('blogCategory.update');

Route::delete('/blog-category-delete', "BlogCategoryController@delete")->name('blogCategory.delete');

Route::get('/add-blog-category', function () {
    return view('admin.blog_categories.add_blog_category');
})->name('blogCategory.add');

Route::any('/blog-category/search', 'BlogCategoryController@search')->name('blogCategory.search');
/*-------------------------------------------------------------------*/

/*------------------------Blog Author url----------------------------*/
Route::get('/blog-authors', "BlogAuthorController@show")->name('blogAuthor.home');

Route::post('/upload-blog-author',"BlogAuthorController@insert")->name('blogAuthor.insert');

Route::get('/{slug}/blog-author-view', "BlogAuthorController@view")->name('blogAuthor.view');

Route::get('/{slug}/blog-author-edit', "BlogAuthorController@edit")->name('blogAuthor.edit');

Route::post('/{slug}/blog-author-update', "BlogAuthorController@update")->name('blogAuthor.update');

Route::delete('/blog-author-delete', "BlogAuthorController@delete")->name('blogAuthor.delete');

Route::get('/add-blog-author', function () {
    return view('admin.blog_authors.add_blog_author');
})->name('blogAuthor.add');

Route::any('/blog-author/search', 'BlogAuthorController@search')->name('blogAuthor.search');
/*-------------------------------------------------------------------*/

/*----------------------------Blog url-------------------------------*/  
Route::get('/blogs', "BlogController@show")->name('blog.home');

Route::post('/upload-blog', "BlogController@insert")->name('blog.insert');

Route::get('/{slug}/blog-view', "BlogController@view")->name('blog.view');

Route::get('/{slug}/blog-edit', "BlogController@edit")->name('blog.edit');

Route::post('/{slug}/blog-update', "BlogController@update")->name('blog.update');

Route::delete('/blog-delete', "BlogController@delete")->name('blog.delete');

Route::get('/add-blog', "BlogController@addBlog")->name('blog.add');

Route::any('/blog/search', 'BlogController@search')->name('blog.search');

Route::post('/comment/update', 'BlogCommentController@update')->name('commentUpdate');
/*-------------------------------------------------------------------*/

/*----------------------------SEO url--------------------------------*/
Route::get('/seo-tags', "SeoTagController@show")->name('seo.home');

Route::post('/upload-seo-tag',"SeoTagController@insert")->name('seo.insert');

Route::get('/{id}/seo-tag-view', "SeoTagController@view")->name('seo.view');

Route::get('/{id}/seo-tag-edit', "SeoTagController@edit")->name('seo.edit');

Route::post('/{id}/seo-tag-update', "SeoTagController@update")->name('seo.update');

Route::delete('/seo-tag-delete', "SeoTagController@delete")->name('seo.delete');

Route::get('/add-seo-tag', function () {
    return view('admin.seo_tags.add_seo_tag');
})->name('seo.add');

Route::any('/seo-tag/search', 'SeoTagController@search')->name('seo.search');
/*-------------------------------------------------------------------*/


/*----------------------------amenities url--------------------------------*/
Route::get('/amenities-list', "RoomAmenitiesController@show")->name('amenities.home');
Route::post('/amenities-upload',"RoomAmenitiesController@insert")->name('amenities.insert');
Route::get('amenities-view/{id}', "RoomAmenitiesController@view")->name('amenities.view');
Route::get('amenities-edit/{id}/', "RoomAmenitiesController@edit")->name('amenities.edit');
Route::post('amenities-update/{id}/', "RoomAmenitiesController@update")->name('amenities.update');
Route::delete('/amenities-delete', "RoomAmenitiesController@delete")->name('amenities.delete');

Route::get('/amenities-add', function () {
return view('admin.room_amenities.add');
})->name('amenities.add');
Route::any('/amenities/search', 'RoomAmenitiesController@search')->name('amenities.search');
/*-------------------------------------------------------------------*/



/*----------------------------Areas url--------------------------------*/
Route::get('/area-list', "areaController@show")->name('area.home');
Route::post('/area-upload',"areaController@insert")->name('area.insert');
Route::get('area-view/{id}', "areaController@view")->name('area.view');
Route::get('area-edit/{id}/', "areaController@edit")->name('area.edit');
Route::post('area-update/{id}/', "areaController@update")->name('area.update');
Route::delete('/area-delete', "areaController@delete")->name('area.delete');

Route::get('/area-add', function () {
return view('admin.areas.add');
})->name('area.add');
Route::any('/area/search', 'areaController@search')->name('area.search');
 

/*----------------------------Pincode url--------------------------------*/
Route::get('/pincode-list', "PincodeController@show")->name('pincode.home');
Route::post('/pincode-upload',"PincodeController@insert")->name('pincode.insert');
Route::get('pincode-view/{id}', "PincodeController@view")->name('pincode.view');
Route::get('pincode-edit/{id}/', "PincodeController@edit")->name('pincode.edit');
Route::post('pincode-update/{id}/', "PincodeController@update")->name('pincode.update');
Route::delete('/pincode-delete', "PincodeController@delete")->name('pincode.delete');

Route::get('/pincode-add', function () {
return view('admin.pincodes.add');
})->name('pincode.add');
Route::any('/pincode/search', 'PincodeController@search')->name('pincode.search');



/*----------------------------amenities url--------------------------------*/
Route::get('/university-list', "UniversityController@show")->name('university.home');
Route::post('/university-upload',"UniversityController@insert")->name('university.insert');
Route::get('university-view/{id}', "UniversityController@view")->name('university.view');
Route::get('university-edit/{id}/', "UniversityController@edit")->name('university.edit');
Route::post('university-update/{id}/', "UniversityController@update")->name('university.update');
Route::delete('/university-delete', "UniversityController@delete")->name('university.delete');

Route::get('/university-add', function () {
return view('admin.universities.add');
})->name('university.add');
Route::any('/university/search', 'UniversityController@search')->name('university.search');







/*----------------------------Gallery url--------------------------------*/
Route::get('/gallery-list', "HostelsGalleryController@show")->name('gallery.home');
Route::post('/gallery-upload',"HostelsGalleryController@insert")->name('gallery.insert');
Route::get('gallery-view/{id}', "HostelsGalleryController@view")->name('gallery.view');
Route::get('gallery-edit/{id}', "HostelsGalleryController@edit")->name('gallery.edit');
Route::post('gallery-update/{id}', "HostelsGalleryController@update")->name('gallery.update');
Route::delete('/gallery-delete', "HostelsGalleryController@delete")->name('gallery.delete');
Route::get('/gallery-add', "HostelsGalleryController@add")->name('gallery.add');
Route::any('/gallery/search', 'HostelsGalleryController@search')->name('gallery.search');
/*-------------------------------------------------------------------*/

  

/*------------------------Our Teams url------------------------------*/
Route::get('/our-teams', "OurTeamController@show")->name('team.home');

Route::post('/upload-our-team',"OurTeamController@insert")->name('team.insert');

Route::get('/{slug}/our-team-view', "OurTeamController@view")->name('team.view');

Route::get('/{slug}/our-team-edit', "OurTeamController@edit")->name('team.edit');

Route::post('/{slug}/our-team-update', "OurTeamController@update")->name('team.update');

Route::delete('/our-team-delete', "OurTeamController@delete")->name('team.delete');

Route::get('/add-our-team', function () {
    return view('admin.our_teams.add_our_team');
})->name('team.add');

Route::any('/our-team/search', 'OurTeamController@search')->name('team.search');


 





/*------------------------hostels url------------------------------*/
Route::get('/hostels', "HostelsController@show")->name('hostels.home');

Route::post('/upload-hostels',"HostelsController@insert")->name('hostels.insert');

Route::get('/hostels-view/{slug}', "HostelsController@view")->name('hostels.view');

Route::get('hostels-edit/{slug}', "HostelsController@edit")->name('hostels.edit');

Route::post('/{slug}/hostels-update', "HostelsController@update")->name('hostels.update');

Route::delete('/hostels-delete', "HostelsController@delete")->name('hostels.delete');
 
/*Route::get('/add-hostels', function () {
    return view('admin.hostels.add_hostels');
})->name('hostels.add');
*/
Route::get('/add-hostels',  "HostelsController@add")->name('hostels.add');

Route::any('/hostels/search', 'HostelsController@search')->name('hostels.search');


/*-------------------------------------------------------------------*/

/*------------------------Testimonial url----------------------------*/
Route::get('/testimonials', "TestimonialController@show")->name('testimonial.home');

Route::post('/upload-testimonial',"TestimonialController@insert")->name('testimonial.insert');

Route::get('/{slug}/testimonial-view', "TestimonialController@view")->name('testimonial.view');

Route::get('/{slug}/testimonial-edit', "TestimonialController@edit")->name('testimonial.edit');

Route::post('/{slug}/testimonial-update', "TestimonialController@update")->name('testimonial.update');

Route::delete('/testimonial-delete', "TestimonialController@delete")->name('testimonial.delete');

Route::get('/add-testimonial', function () {
    return view('admin.testimonials.add_testimonial');
})->name('testimonial.add');

Route::any('/testimonial/search', 'TestimonialController@search')->name('testimonial.search');
/*-------------------------------------------------------------------*/

/*------------------------Client url---------------------------------*/
Route::get('/clients', "ClientController@show")->name('client.home');

Route::post('/upload-client',"ClientController@insert")->name('client.insert');

Route::get('/{slug}/client-view', "ClientController@view")->name('client.view');

Route::get('/{slug}/client-edit', "ClientController@edit")->name('client.edit');

Route::post('/{slug}/client-update', "ClientController@update")->name('client.update');

Route::delete('/client-delete', "ClientController@delete")->name('client.delete');

Route::get('/add-client', function () {
    return view('admin.clients.add_client');
})->name('client.add');

Route::post('/client/search', 'ClientController@search')->name('client.search');
/*--------------------------------------------------------------------*/
 
/*------------------------Services url--------------------------------*/
Route::get('/services', "ServiceController@show")->name('service.home');

Route::post('/upload-service',"ServiceController@insert")->name('service.insert');

Route::get('/{slug}/service-view', "ServiceController@view")->name('service.view');

Route::get('/{slug}/service-edit', "ServiceController@edit")->name('service.edit');

Route::post('/{slug}/service-update', "ServiceController@update")->name('service.update');

Route::delete('/service-delete', "ServiceController@delete")->name('service.delete');

Route::get('/add-service', function () {
    return view('admin.services.add_service');
})->name('service.add');

Route::post('/service/search', 'ServiceController@search')->name('service.search');

//===--services catagory--===//


Route::get('/add-caterogy',"ServiceCategoryController@addCategory")->name('category.add');

Route::post('/insert-caterogy',"ServiceCategoryController@insertCategory");

Route::get('/services-category', "ServiceCategoryController@show_category")->name('category.list');

 

//===-- CategoryContentController ---===//

Route::get('/add-caterogy-content',"CategoryContentController@addCategoryContent")->name('categoryContent.add');

Route::post('/insert-caterogy-content',"CategoryContentController@insertCategoryContent")->name('categoryContent.insert');;
 
/*--------------------------------------------------------------------*/

});

/*------------------------------------------------ Admin route end ---------------------------------------------*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{slug}', "MainController@serviceView")->name('serviceView');