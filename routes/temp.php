<?php

use App\Http\Controllers\Template\AdvanceUiController;
use App\Http\Controllers\Template\AppsController;
use App\Http\Controllers\Template\AuthController;
use App\Http\Controllers\Template\ChartController;
use App\Http\Controllers\Template\DashboardController;
use App\Http\Controllers\Template\FormController;
use App\Http\Controllers\Template\IconController;
use App\Http\Controllers\Template\LandingController;
use App\Http\Controllers\Template\LayoutsController;
use App\Http\Controllers\Template\MapsController;
use App\Http\Controllers\Template\PagesController;
use App\Http\Controllers\Template\TableController;
use App\Http\Controllers\Template\UiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//main menu
Route::group(['prefix' => 'dashboards', 'as' => 'dashboards.'], function () {
    Route::get('/dashboard_analytics', [DashboardController::class, 'dashboard_analytics'])->name('dashboard_analytics');
    Route::get('/dashboard_crm', [DashboardController::class, 'dashboard_crm'])->name('dashboard_crm');
    Route::get('/dashboard_crypto', [DashboardController::class, 'dashboard_crypto'])->name('dashboard_crypto');
    Route::get('/dashboard_ecommerce', [DashboardController::class, 'dashboard_ecommerce'])->name('dashboard_ecommerce');
    Route::get('/dashboard_job', [DashboardController::class, 'dashboard_job'])->name('dashboard_job');
    Route::get('/dashboard_projects', [DashboardController::class, 'dashboard_projects'])->name('dashboard_projects');
    Route::get('/dashboard_nft', [DashboardController::class, 'dashboard_nft'])->name('dashboard_nft');
});

Route::group(['prefix' => 'apps', 'as' => 'apps.'], function () {

    Route::get('/apps_chat', [AppsController::class, 'apps_chat'])->name('apps_chat');
    Route::get('/apps_calendar', [AppsController::class, 'apps_calendar'])->name('apps_calendar');

    Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
        Route::get('/apps_email_mailbox', [AppsController::class, 'apps_email_mailbox'])->name('apps_mailbox');
        Route::group(['prefix' => 'email-template', 'as' => 'email-template.'], function () {
            Route::get('/apps_email_template_basic', [AppsController::class, 'apps_email_template_basic'])->name('apps_email_template_basic');
            Route::get('/apps_email_template_ecommerce', [AppsController::class, 'apps_email_template_ecommerce'])->name('apps_email_template_ecommerce');
        });
    });

    Route::get('/apps_todo', [AppsController::class, 'apps_todo'])->name('apps_todo');

    Route::get('/apps_crm_companies', [AppsController::class, 'apps_crm_companies'])->name('apps_crm_companies');
    Route::get('/apps_crm_contacts', [AppsController::class, 'apps_crm_contacts'])->name('apps_crm_contacts');
    Route::get('/apps_crm_deals', [AppsController::class, 'apps_crm_deals'])->name('apps_crm_deals');
    Route::get('/apps_crm_leads', [AppsController::class, 'apps_crm_leads'])->name('apps_crm_leads');

    Route::get('/apps_crypto_buy_sell', [AppsController::class, 'apps_crypto_buy_sell'])->name('apps_crypto_buy_sell');
    Route::get('/apps_crypto_ico', [AppsController::class, 'apps_crypto_ico'])->name('apps_crypto_ico');
    Route::get('/apps_crypto_kyc', [AppsController::class, 'apps_crypto_kyc'])->name('apps_crypto_kyc');
    Route::get('/apps_crypto_orders', [AppsController::class, 'apps_crypto_orders'])->name('apps_crypto_orders');
    Route::get('/apps_crypto_transactions', [AppsController::class, 'apps_crypto_transactions'])->name('apps_crypto_transactions');
    Route::get('/apps_crypto_wallet', [AppsController::class, 'apps_crypto_wallet'])->name('apps_crypto_wallet');

    Route::get('/apps_ecommerce_add_product', [AppsController::class, 'apps_ecommerce_add_product'])->name('apps_ecommerce_add_product');
    Route::get('/apps_ecommerce_cart', [AppsController::class, 'apps_ecommerce_cart'])->name('apps_ecommerce_cart');
    Route::get('/apps_ecommerce_checkout', [AppsController::class, 'apps_ecommerce_checkout'])->name('apps_ecommerce_checkout');
    Route::get('/apps_ecommerce_customers', [AppsController::class, 'apps_ecommerce_customers'])->name('apps_ecommerce_customers');
    Route::get('/apps_ecommerce_order_details', [AppsController::class, 'apps_ecommerce_order_details'])->name('apps_ecommerce_order_details');
    Route::get('/apps_ecommerce_orders', [AppsController::class, 'apps_ecommerce_orders'])->name('apps_ecommerce_orders');
    Route::get('/apps_ecommerce_product_details', [AppsController::class, 'apps_ecommerce_product_details'])->name('apps_ecommerce_product_details');
    Route::get('/apps_ecommerce_products', [AppsController::class, 'apps_ecommerce_products'])->name('apps_ecommerce_products');
    Route::get('/apps_ecommerce_sellers', [AppsController::class, 'apps_ecommerce_sellers'])->name('apps_ecommerce_sellers');
    Route::get('/apps_ecommerce_seller_details', [AppsController::class, 'apps_ecommerce_seller_details'])->name('apps_ecommerce_seller_details');



    Route::get('/apps_file_manager', [AppsController::class, 'apps_file_manager'])->name('apps_file_manager');

    Route::get('/apps_invoices_create', [AppsController::class, 'apps_invoices_create'])->name('apps_invoices_create');
    Route::get('/apps_invoices_details', [AppsController::class, 'apps_invoices_details'])->name('apps_invoices_details');
    Route::get('/apps_invoices_list', [AppsController::class, 'apps_invoices_list'])->name('apps_invoices_list');

    Route::get('/apps_job_application', [AppsController::class, 'apps_job_application'])->name('apps_job_application');
    Route::get('/apps_job_candidate_grid', [AppsController::class, 'apps_job_candidate_grid'])->name('apps_job_candidate_grid');
    Route::get('/apps_job_candidate_lists', [AppsController::class, 'apps_job_candidate_lists'])->name('apps_job_candidate_lists');
    Route::get('/apps_job_categories', [AppsController::class, 'apps_job_categories'])->name('apps_job_categories');
    Route::get('/apps_job_companies_lists', [AppsController::class, 'apps_job_companies_lists'])->name('apps_job_companies_lists');
    Route::get('/apps_job_lists_details', [AppsController::class, 'apps_job_lists_details'])->name('apps_job_lists_details');
    Route::get('/apps_job_lists_grid_lists', [AppsController::class, 'apps_job_lists_grid_lists'])->name('apps_job_lists_grid_lists');
    Route::get('/apps_job_lists_basic', [AppsController::class, 'apps_job_lists_basic'])->name('apps_job_lists_basic');
    Route::get('/apps_job_new', [AppsController::class, 'apps_job_new'])->name('apps_job_new');
    Route::get('/apps_job_statistics', [AppsController::class, 'apps_job_statistics'])->name('apps_job_statistics');

    Route::get('/apps_nft_auction', [AppsController::class, 'apps_nft_auction'])->name('apps_nft_auction');
    Route::get('/apps_nft_collections', [AppsController::class, 'apps_nft_collections'])->name('apps_nft_collections');
    Route::get('/apps_nft_create', [AppsController::class, 'apps_nft_create'])->name('apps_nft_create');
    Route::get('/apps_nft_creators', [AppsController::class, 'apps_nft_creators'])->name('apps_nft_creators');
    Route::get('/apps_nft_explore', [AppsController::class, 'apps_nft_explore'])->name('apps_nft_explore');
    Route::get('/apps_nft_item_details', [AppsController::class, 'apps_nft_item_details'])->name('apps_nft_item_details');
    Route::get('/apps_nft_marketplace', [AppsController::class, 'apps_nft_marketplace'])->name('apps_nft_marketplace');
    Route::get('/apps_nft_ranking', [AppsController::class, 'apps_nft_ranking'])->name('apps_nft_ranking');
    Route::get('/apps_nft_wallet', [AppsController::class, 'apps_nft_wallet'])->name('apps_nft_wallet');

    Route::get('/apps_projects_create', [AppsController::class, 'apps_projects_create'])->name('apps_projects_create');
    Route::get('/apps_projects_list', [AppsController::class, 'apps_projects_list'])->name('apps_projects_list');
    Route::get('/apps_projects_overview', [AppsController::class, 'apps_projects_overview'])->name('apps_projects_overview');

    Route::get('/apps_tasks_details', [AppsController::class, 'apps_tasks_details'])->name('apps_tasks_details');
    Route::get('/apps_tasks_kanban', [AppsController::class, 'apps_tasks_kanban'])->name('apps_tasks_kanban');
    Route::get('/apps_tasks_list_view', [AppsController::class, 'apps_tasks_list_view'])->name('apps_tasks_list_view');

    Route::get('/apps_tickets_details', [AppsController::class, 'apps_tickets_details'])->name('apps_tickets_details');
    Route::get('/apps_tickets_list', [AppsController::class, 'apps_tickets_list'])->name('apps_tickets_list');

    Route::get('/apps_api_key', [AppsController::class, 'apps_api_key'])->name('apps_api_key');
});

Route::get('/layouts_two_column', [LayoutsController::class, 'layouts_two_column'])->name('layouts_two_column');
Route::get('/layouts_detached', [LayoutsController::class, 'layouts_detached'])->name('layouts_detached');
Route::get('/layouts_horizontal', [LayoutsController::class, 'layouts_horizontal'])->name('layouts_horizontal');
Route::get('/layouts_vertical_hovered', [LayoutsController::class, 'layouts_vertical_hovered'])->name('layouts_vertical_hovered');

//pages
Route::get('/auth_error_404_alt', [AuthController::class, 'auth_error_404_alt'])->name('auth_error_404_alt');
Route::get('/auth_error_404_basic', [AuthController::class, 'auth_error_404_basic'])->name('auth_error_404_basic');
Route::get('/auth_error_404_cover', [AuthController::class, 'auth_error_404_cover'])->name('auth_error_404_cover');
Route::get('/auth_error_500', [AuthController::class, 'auth_error_500'])->name('auth_error_500');
Route::get('/auth_error_offline', [AuthController::class, 'auth_error_offline'])->name('auth_error_offline');

Route::get('/auth_lockscreen_basic', [AuthController::class, 'auth_lockscreen_basic'])->name('auth_lockscreen_basic');
Route::get('/auth_lockscreen_cover', [AuthController::class, 'auth_lockscreen_cover'])->name('auth_lockscreen_cover');
Route::get('/auth_logout_basic', [AuthController::class, 'auth_logout_basic'])->name('auth_logout_basic');
Route::get('/auth_logout_cover', [AuthController::class, 'auth_logout_cover'])->name('auth_logout_cover');
Route::get('/auth_pass_change_basic', [AuthController::class, 'auth_pass_change_basic'])->name('auth_pass_change_basic');
Route::get('/auth_pass_change_cover', [AuthController::class, 'auth_pass_change_cover'])->name('auth_pass_change_cover');
Route::get('/auth_pass_reset_basic', [AuthController::class, 'auth_pass_reset_basic'])->name('auth_pass_reset_basic');
Route::get('/auth_pass_reset_cover', [AuthController::class, 'auth_pass_reset_cover'])->name('auth_pass_reset_cover');
Route::get('/auth_signin_basic', [AuthController::class, 'auth_signin_basic'])->name('auth_signin_basic');
Route::get('/auth_signin_cover', [AuthController::class, 'auth_signin_cover'])->name('auth_signin_cover');
Route::get('/auth_signup_basic', [AuthController::class, 'auth_signup_basic'])->name('auth_signup_basic');
Route::get('/auth_signup_cover', [AuthController::class, 'auth_signup_cover'])->name('auth_signup_cover');
Route::get('/auth_success_msg_basic', [AuthController::class, 'auth_success_msg_basic'])->name('auth_success_msg_basic');
Route::get('/auth_success_msg_cover', [AuthController::class, 'auth_success_msg_cover'])->name('auth_success_msg_cover');
Route::get('/auth_twostep_basic', [AuthController::class, 'auth_twostep_basic'])->name('auth_twostep_basic');
Route::get('/auth_twostep_cover', [AuthController::class, 'auth_twostep_cover'])->name('auth_twostep_cover');

Route::get('/pages_coming_soon', [PagesController::class, 'pages_coming_soon'])->name('pages_coming_soon');
Route::get('/pages_faqs', [PagesController::class, 'pages_faqs'])->name('pages_faqs');
Route::get('/pages_gallery', [PagesController::class, 'pages_gallery'])->name('pages_gallery');
Route::get('/pages_maintenance', [PagesController::class, 'pages_maintenance'])->name('pages_maintenance');
Route::get('/pages_pricing', [PagesController::class, 'pages_pricing'])->name('pages_pricing');
Route::get('/pages_privacy_policy', [PagesController::class, 'pages_privacy_policy'])->name('pages_privacy_policy');
Route::get('/pages_profile_basic', [PagesController::class, 'pages_profile_basic'])->name('pages_profile_basic');
Route::get('/pages_profile_settings', [PagesController::class, 'pages_profile_settings'])->name('pages_profile_settings');
Route::get('/pages_search_results', [PagesController::class, 'pages_search_results'])->name('pages_search_results');
Route::get('/pages_sitemap', [PagesController::class, 'pages_sitemap'])->name('pages_sitemap');
Route::get('/pages_starter', [PagesController::class, 'pages_starter'])->name('pages_starter');
Route::get('/pages_team', [PagesController::class, 'pages_team'])->name('pages_team');
Route::get('/pages_term_conditions', [PagesController::class, 'pages_term_conditions'])->name('pages_term_conditions');
Route::get('/pages_timeline', [PagesController::class, 'pages_timeline'])->name('pages_timeline');

Route::get('/landing_job', [LandingController::class, 'landing_job'])->name('landing_job');
Route::get('/landing_basic', [LandingController::class, 'landing_basic'])->name('landing_basic');
Route::get('/landing_nft', [LandingController::class, 'landing_nft'])->name('landing_nft');


//component
Route::get('/ui_accordions', [UiController::class, 'ui_accordions'])->name('ui_accordions');
Route::get('/ui_alerts', [UiController::class, 'ui_alerts'])->name('ui_alerts');
Route::get('/ui_badges', [UiController::class, 'ui_badges'])->name('ui_badges');
Route::get('/ui_buttons', [UiController::class, 'ui_buttons'])->name('ui_buttons');
Route::get('/ui_cards', [UiController::class, 'ui_cards'])->name('ui_cards');
Route::get('/ui_carousel', [UiController::class, 'ui_carousel'])->name('ui_carousel');
Route::get('/ui_colors', [UiController::class, 'ui_colors'])->name('ui_colors');
Route::get('/ui_dropdowns', [UiController::class, 'ui_dropdowns'])->name('ui_dropdowns');
Route::get('/ui_embed_video', [UiController::class, 'ui_embed_video'])->name('ui_embed_video');
Route::get('/ui_general', [UiController::class, 'ui_general'])->name('ui_general');
Route::get('/ui_grid', [UiController::class, 'ui_grid'])->name('ui_grid');
Route::get('/ui_images', [UiController::class, 'ui_images'])->name('ui_images');
Route::get('/ui_links', [UiController::class, 'ui_links'])->name('ui_links');
Route::get('/ui_lists', [UiController::class, 'ui_lists'])->name('ui_lists');
Route::get('/ui_media', [UiController::class, 'ui_media'])->name('ui_media');
Route::get('/ui_modals', [UiController::class, 'ui_modals'])->name('ui_modals');
Route::get('/ui_notifications', [UiController::class, 'ui_notifications'])->name('ui_notifications');
Route::get('/ui_offcanvas', [UiController::class, 'ui_offcanvas'])->name('ui_offcanvas');
Route::get('/ui_placeholders', [UiController::class, 'ui_placeholders'])->name('ui_placeholders');
Route::get('/ui_progress', [UiController::class, 'ui_progress'])->name('ui_progress');
Route::get('/ui_ribbons', [UiController::class, 'ui_ribbons'])->name('ui_ribbons');
Route::get('/ui_tabs', [UiController::class, 'ui_tabs'])->name('ui_tabs');
Route::get('/ui_typography', [UiController::class, 'ui_typography'])->name('ui_typography');
Route::get('/ui_utilities', [UiController::class, 'ui_utilities'])->name('ui_utilities');

Route::get('/advance_ui_animation', [AdvanceUiController::class, 'advance_ui_animation'])->name('advance_ui_animation');
Route::get('/advance_ui_highlight', [AdvanceUiController::class, 'advance_ui_highlight'])->name('advance_ui_highlight');
Route::get('/advance_ui_nestable', [AdvanceUiController::class, 'advance_ui_nestable'])->name('advance_ui_nestable');
Route::get('/advance_ui_ratings', [AdvanceUiController::class, 'advance_ui_ratings'])->name('advance_ui_ratings');
Route::get('/advance_ui_scrollbar', [AdvanceUiController::class, 'advance_ui_scrollbar'])->name('advance_ui_scrollbar');
Route::get('/advance_ui_scrollspy', [AdvanceUiController::class, 'advance_ui_scrollspy'])->name('advance_ui_scrollspy');
Route::get('/advance_ui_sweetalerts', [AdvanceUiController::class, 'advance_ui_sweetalerts'])->name('advance_ui_sweetalerts');
Route::get('/advance_ui_swiper', [AdvanceUiController::class, 'advance_ui_swiper'])->name('advance_ui_swiper');
Route::get('/advance_ui_tour', [AdvanceUiController::class, 'advance_ui_tour'])->name('advance_ui_tour');

Route::get('/widgets', [PagesController::class, 'widgets'])->name('widgets');

Route::get('/forms_advanced', [FormController::class, 'forms_advanced'])->name('forms_advanced');
Route::get('/forms_checkboxs_radios', [FormController::class, 'forms_checkboxs_radios'])->name('forms_checkboxs_radios');
Route::get('/forms_editors', [FormController::class, 'forms_editors'])->name('forms_editors');
Route::get('/forms_elements', [FormController::class, 'forms_elements'])->name('forms_elements');
Route::get('/forms_file_uploads', [FormController::class, 'forms_file_uploads'])->name('forms_file_uploads');
Route::get('/forms_layouts', [FormController::class, 'forms_layouts'])->name('forms_layouts');
Route::get('/forms_masks', [FormController::class, 'forms_masks'])->name('forms_masks');
Route::get('/forms_pickers', [FormController::class, 'forms_pickers'])->name('forms_pickers');
Route::get('/forms_range_sliders', [FormController::class, 'forms_range_sliders'])->name('forms_range_sliders');
Route::get('/forms_select', [FormController::class, 'forms_select'])->name('forms_select');
Route::get('/forms_select2', [FormController::class, 'forms_select2'])->name('forms_select2');
Route::get('/forms_validation', [FormController::class, 'forms_validation'])->name('forms_validation');
Route::get('/forms_wizard', [FormController::class, 'forms_wizard'])->name('forms_wizard');

Route::get('/tables_basic', [TableController::class, 'tables_basic'])->name('tables_basic');
Route::get('/tables_datatables', [TableController::class, 'tables_datatables'])->name('tables_datatables');
Route::get('/tables_gridjs', [TableController::class, 'tables_gridjs'])->name('tables_gridjs');
Route::get('/tables_listjs', [TableController::class, 'tables_listjs'])->name('tables_listjs');

Route::get('/charts_apex_area', [ChartController::class, 'charts_apex_area'])->name('charts_apex_area');
Route::get('/charts_apex_boxplot', [ChartController::class, 'charts_apex_boxplot'])->name('charts_apex_boxplot');
Route::get('/charts_apex_bubble', [ChartController::class, 'charts_apex_bubble'])->name('charts_apex_bubble');
Route::get('/charts_apex_candlestick', [ChartController::class, 'charts_apex_candlestick'])->name('charts_apex_candlestick');
Route::get('/charts_apex_bar', [ChartController::class, 'charts_apex_bar'])->name('charts_apex_bar');
Route::get('/charts_apex_column', [ChartController::class, 'charts_apex_column'])->name('charts_apex_column');
Route::get('/charts_apex_funnel', [ChartController::class, 'charts_apex_funnel'])->name('charts_apex_funnel');
Route::get('/charts_apex_heatmap', [ChartController::class, 'charts_apex_heatmap'])->name('charts_apex_heatmap');
Route::get('/charts_apex_line', [ChartController::class, 'charts_apex_line'])->name('charts_apex_line');
Route::get('/charts_apex_mixed', [ChartController::class, 'charts_apex_mixed'])->name('charts_apex_mixed');
Route::get('/charts_apex_pie', [ChartController::class, 'charts_apex_pie'])->name('charts_apex_pie');
Route::get('/charts_apex_polar', [ChartController::class, 'charts_apex_polar'])->name('charts_apex_polar');
Route::get('/charts_apex_radar', [ChartController::class, 'charts_apex_radar'])->name('charts_apex_radar');
Route::get('/charts_apex_radialbar', [ChartController::class, 'charts_apex_radialbar'])->name('charts_apex_radialbar');
Route::get('/charts_apex_range_area', [ChartController::class, 'charts_apex_range_area'])->name('charts_apex_range_area');
Route::get('/charts_apex_scatter', [ChartController::class, 'charts_apex_scatter'])->name('charts_apex_scatter');
Route::get('/charts_apex_timeline', [ChartController::class, 'charts_apex_timeline'])->name('charts_apex_timeline');
Route::get('/charts_apex_treemap', [ChartController::class, 'charts_apex_treemap'])->name('charts_apex_treemap');
Route::get('/charts_chartjs', [ChartController::class, 'charts_chartjs'])->name('charts_chartjs');
Route::get('/charts_echarts', [ChartController::class, 'charts_echarts'])->name('charts_echarts');

Route::get('/icons_boxicons', [IconController::class, 'icons_boxicons'])->name('icons_boxicons');
Route::get('/icons_crypto', [IconController::class, 'icons_crypto'])->name('icons_crypto');
Route::get('/icons_feather', [IconController::class, 'icons_feather'])->name('icons_feather');
Route::get('/icons_lineawesome', [IconController::class, 'icons_lineawesome'])->name('icons_lineawesome');
Route::get('/icons_materialdesign', [IconController::class, 'icons_materialdesign'])->name('icons_materialdesign');
Route::get('/icons_remix', [IconController::class, 'icons_remix'])->name('icons_remix');

Route::get('/maps_google', [MapsController::class, 'maps_google'])->name('maps_google');
Route::get('/maps_leaflet', [MapsController::class, 'maps_leaflet'])->name('maps_leaflet');
Route::get('/maps_vector', [MapsController::class, 'maps_vector'])->name('maps_vector');
