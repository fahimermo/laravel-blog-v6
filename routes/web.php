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


			Route::get('/', function () {
			    return view('welcome');
			});
			*/

			//Route::get('/home', 'HomeController@index')->name('home');


			//Index Page
			Route::get('/', "IndexController@index");
			//Route::match(['get','post'],'/check-subscriber-email', "NewsletterController@laraBlogCheckSubscriberNewsLetter");

			//check news subcriber email
			Route::post('/check-subscriber-email', 
				"NewsletterController@laraBlogCheckSubscriberNewsLetter");

			//add news subcriber email
			Route::match(['get','post'], '/add-subscriber-email', 
				"NewsletterController@laraBlogAddSubscriberNewsLetter");


			//user page
			Route::match(['get','post'],'/user-register', "UserController@register");

			//user login page
			Route::match(['get','post'],'/user-login', "UserController@login");


			//user route search

			Route::match(['get','post'], '/user-search-blog', "PostController@userSearchBlog");





			//change password route template
			//Route::get('/change-password',"UserController@changePassword");



			//user route middleware
			Route::group(['middleware'=>['UserLogin']], function(){

			//user page
				Route::match(['get','post'],'/blog', "BlogController@blog"); 

			//user logout
				Route::get('/user-logout', "UserController@logout");

				//admin get category name

				Route::get('/admin-cat-dropdown',"CategoryController@catDropdown");


			//Comment route
				Route::match(['get','post'], "/user-comment", "PostController@addBlogPostComment" );


			//get comment route

			Route::get('/user-displaycomment', "PostController@userGetComment");

			       
			      //view blog post route

				Route::get('/view-post/{id}',"PostController@postCategoryDetail");

				
			
	         //User Dashboard route 
			Route::match(['get','post'], '/user-dashboard/{id}', "UserController@userDashboard");

			
			     //all posts belong to a particular category posts

			Route::match(['get','post'], '/each-category-posts/{category_name}', "PostController@eachCategoryPosts");

			//user change password page
			Route::match(['get','post'],'/user-changepassword', "UserController@userChangePassword");

			//user update password
			Route::match(['get','post'],'/user-checkpassword', "UserController@userCheckPassword");


			//User Update password route
			Route::match(['get','post'], '/user-update-password', "UserController@userUpdatePassword");

			//count views

			Route::match(['get','post'], '/user-get-views', "BlogController@postViews");


			
			});




			//user forgot password  routes region

			//user reset password email route

			Route::get('/user-reset-email',"UserController@userResetEmail" );

			Route::match(['get','post'],'/user-set-password', "UserController@userSetPassword");

	        Route::match(['get','post'], '/user-reset-forgot-password', "UserController@userCallPassword");
	        //faq page

            Route::get('/faq-page',"CmsController@faq");


            
			Route::group(['middleware'=> ['AdminLogin']], function(){

			//dashboard Page
			Route::get('admin/dashboard', "AdminController@dashboard");

			//admin add post route
			Route::match(['get','post'], 'admin/add-post', "PostController@addPost");

			//admin add category
			Route::match(['get','post'], 'admin/add-category', "CategoryController@addCategory");

			//admin delete category 
			Route::match(['get','post'], 'admin/delete-category/{id}', "CategoryController@deleteCategory");


			//admin view categories details route
			Route::match(['get','post'], 'admin/view-categories', "CategoryController@viewCategories");


			//admin edit category route
			Route::match(['get','post'], 'admin/edit-category/{id}', "CategoryController@editCategory");


			//admin view post route
			Route::match(['get','post'], 'admin/view-posts', "PostController@viewPosts");


			//admin edit post route
			Route::match(['get','post'], 'admin/edit-post/{id}', "PostController@editPost");


			//admin delete post image
			Route::match(['get','post'], 'admin/delete-image/{id}', "PostController@deletePostImage");


			// multiple post delete route

          Route::match(['get','post'], 'admin/multiple-delete-posts', "PostController@multiplePostDelete");



			//admin display user details route
			Route::match(['get','post'], 'admin/view-user-details', "AdminController@adminUserDetails");


			//admin delete post 
			Route::match(['get','post'], 'admin/delete-post/{id}', "PostController@deletePost");

			//admin delete user

			Route::get('admin/delete-user/{id}', "AdminController@adminDeleteUser");

			//admin delete post image
			Route::match(['get','post'], 'admin/delete-user-image/{id}', "AdminController@deleteUserImage");



			//admin edit user

			Route::match(['get','post'], 'admin/edit-user/{id}', "AdminController@adminEditUser");


			//admin reset password route template
			Route::match(['get', 'post'],'admin/change-password',
			 "AdminController@adminChangePassword");


			Route::get('/read-adminpassword',"AdminController@readAdminPassword");

			//admin change password route ajax
			Route::match(['get','post'],'/reset-adminpassword', "AdminController@adminResetPassword");


			//admin logout
			Route::get('/logout',"AdminController@adminLogout");


			//admin manage account

			Route::match(['get','post'], 'admin/manage-account/{id}', "AdminController@adminManageAccount");


			//admin add cms pages
			Route::match(['get','post'], 'admin/cms-pages',"CmsController@adminCmsPage");



			//admin add cms pages
			Route::match(['get','post'], 'admin/view-cms-pages',"CmsController@adminViewCmsPage");



			//admin edit cms pages
			Route::match(['get','post'], 'admin/edit-cms-page/{id}',"CmsController@adminEditCmsPage");


			//admin edit cms pages
			Route::match(['get','post'], 'admin/delete-cms-page/{id}',"CmsController@adminDeleteCmsPage");

			//display cms page
			Route::match(['get','post'], 'admin/display-cms-page/{url}',"CmsController@adminCmsPage");

		//get contact details

			Route::match(['get', 'post'],'admin/get-contact-details', "AdminController@adminGetContactDetails");
		     //reply contact route
			Route::match(['get','post'], 'admin/reply-contact-page/{id}',"AdminController@adminReplyContact");

		 //reply contact route
			Route::match(['get','post'], 'admin/reply-admin-sent-message',"AdminController@adminReplyMessagesSent");

		     //reply contact route
			Route::match(['get','post'], 'admin/delete-reply-message-sent/{id}',"AdminController@adminDeleteReplyMessagesSent");


			//admin view user comments route

			Route::match(['get','post'], 'admin/view-user-comments', "AdminController@viewComments");

			//admin delete the comment

			Route::match(['get','post'], 'admin/delete-user-comment/{id}', "AdminController@adminDeleteUserComment");

		//admin view newsletter subcribers
		   Route::match(['get','post'],'admin/view-news-letter-subscribers',"NewsletterController@adminViewNewsletter");
		//admin update newseletter status 
		   Route::match(['get','post'], 'admin/update-newsletter-status/{id}/{status}', "NewsletterController@adminUpdateNewsletter");

		//admin delete newsletter
		Route::match(['get','post'], 'admin/delete-news-letter-subscribers/{id}',
		 "NewsletterController@adminDeleteNewsletterEmail");


		//admin manage the profile picture route
	Route::match(['get', 'post'], 'admin/profile-image/{id}', "AdminController@adminProfileImage" );


		//create cms page route
	Route::match(['get', 'post'], '/page/{url}', "CmsController@cmsPage" );


        Route::match(['get','post'], 'admin/multiple-users-delete', "AdminController@multipleUserDelete");

        Route::get('admin/export-newsletter-emails', "NewsletterController@newsletterExportEmails");
	//admin view user charts route
	//Route::match(['get','post'], 'admin/view-users-chart', "AdminController@viewUsersChart" );


			//Route::get('/select-category', "PostController@selectCategory");
			//admin select categories
			 //Route::match(['get','post'],'admin/select-category',"CategoryController@selectCategory");


			});



			Route::get('admin/register', "AdminController@register");

			//admin register
			Route::post('admin/register',"AdminController@adminRegister");

			//admin login
			Route::match(['get','post'], '/admin',"AdminController@adminLogin");


			//admin forgot password route

			Route::match(['get','post'],'admin/forgot-password', "AdminController@adminForgotPassword");


			//user admin contact form route

			Route::match(['get','post'],'/user-contact', "CmsController@userContactForm");


		      
			