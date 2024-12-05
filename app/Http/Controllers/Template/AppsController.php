<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function apps_api_key()
    {
        return view('template.app.apps-api-key');
    }
    public function apps_chat()
    {
        return view('template.app.apps-chat');
    }
    public function apps_calendar()
    {
        return view('template.app.apps-calendar');
    }
    public function apps_crm_companies()
    {
        return view('template.app.apps-crm-companies');
    }
    public function apps_crm_contacts()
    {
        return view('template.app.apps-crm-contacts');
    }
    public function apps_crm_deals()
    {
        return view('template.app.apps-crm-deals');
    }
    public function apps_crm_leads()
    {
        return view('template.app.apps-crm-leads');
    }
    public function apps_crypto_buy_sell()
    {
        return view('template.app.apps-crypto-buy-sell');
    }
    public function apps_crypto_ico()
    {
        return view('template.app.apps-crypto-ico');
    }
    public function apps_crypto_kyc()
    {
        return view('template.app.apps-crypto-kyc');
    }
    public function apps_crypto_orders()
    {
        return view('template.app.apps-crypto-orders');
    }
    public function apps_crypto_transactions()
    {
        return view('template.app.apps-crypto-transactions');
    }
    public function apps_crypto_wallet()
    {
        return view('template.app.apps-crypto-wallet');
    }
    public function apps_ecommerce_add_product()
    {
        return view('template.app.apps-ecommerce-add-product');
    }
    public function apps_ecommerce_cart()
    {
        return view('template.app.apps-ecommerce-cart');
    }
    public function apps_ecommerce_checkout()
    {
        return view('template.app.apps-ecommerce-checkout');
    }
    public function apps_ecommerce_customers()
    {
        return view('template.app.apps-ecommerce-customers');
    }
    public function apps_ecommerce_order_details()
    {
        return view('template.app.apps-ecommerce-order-details');
    }
    public function apps_ecommerce_orders()
    {
        return view('template.app.apps-ecommerce-orders');
    }
    public function apps_ecommerce_product_details()
    {
        return view('template.app.apps-ecommerce-product-details');
    }
    public function apps_ecommerce_products()
    {
        return view('template.app.apps-ecommerce-products');
    }
    public function apps_ecommerce_sellers()
    {
        return view('template.app.apps-ecommerce-sellers');
    }
    public function apps_ecommerce_seller_details()
    {
        return view('template.app.apps-ecommerce-seller-details');
    }
    public function apps_email_template_basic()
    {
        return view('template.app.apps-email-template-basic');
    }
    public function apps_email_template_ecommerce()
    {
        return view('template.app.apps-email-template-ecommerce');
    }
    public function apps_email_mailbox()
    {
        return view('template.app.apps-email-mailbox');
    }
    public function apps_file_manager()
    {
        return view('template.app.apps-file-manager');
    }
    public function apps_invoices_create()
    {
        return view('template.app.apps-invoices-create');
    }
    public function apps_invoices_details()
    {
        return view('template.app.apps-invoices-details');
    }
    public function apps_invoices_list()
    {
        return view('template.app.apps-invoices-list');
    }
    public function apps_job_application()
    {
        return view('template.app.apps-job-application');
    }
    public function apps_job_candidate_grid()
    {
        return view('template.app.apps-job-candidate-grid');
    }
    public function apps_job_candidate_lists()
    {
        return view('template.app.apps-job-candidate-lists');
    }
    public function apps_job_categories()
    {
        return view('template.app.apps-job-categories');
    }
    public function apps_job_companies_lists()
    {
        return view('template.app.apps-job-companies-lists');
    }
    public function apps_job_lists_details()
    {
        return view('template.app.apps-job-lists-details');
    }
    public function apps_job_lists_grid_lists()
    {
        return view('template.app.apps-job-lists-grid-lists');
    }
    public function apps_job_lists_basic()
    {
        return view('template.app.apps-job-lists-basic');
    }
    public function apps_job_new()
    {
        return view('template.app.apps-job-new');
    }
    public function apps_job_statistics()
    {
        return view('template.app.apps-job-statistics');
    }

    public function apps_nft_auction()
    {
        return view('template.app.apps-nft-auction');
    }
    public function apps_nft_collections()
    {
        return view('template.app.apps-nft-collections');
    }
    public function apps_nft_create()
    {
        return view('template.app.apps-nft-create');
    }
    public function apps_nft_creators()
    {
        return view('template.app.apps-nft-creators');
    }
    public function apps_nft_explore()
    {
        return view('template.app.apps-nft-explore');
    }
    public function apps_nft_item_details()
    {
        return view('template.app.apps-nft-item-details');
    }
    public function apps_nft_marketplace()
    {
        return view('template.app.apps-nft-marketplace');
    }
    public function apps_nft_ranking()
    {
        return view('template.app.apps-nft-ranking');
    }
    public function apps_nft_wallet()
    {
        return view('template.app.apps-nft-wallet');
    }
    public function apps_projects_create()
    {
        return view('template.app.apps-projects-create');
    }
    public function apps_projects_list()
    {
        return view('template.app.apps-projects-list');
    }
    public function apps_projects_overview()
    {
        return view('template.app.apps-projects-overview');
    }
    public function apps_tasks_details()
    {
        return view('template.app.apps-tasks-details');
    }
    public function apps_tasks_kanban()
    {
        return view('template.app.apps-tasks-kanban');
    }
    public function apps_tasks_list_view()
    {
        return view('template.app.apps-tasks-list-view');
    }
    public function apps_tickets_details()
    {
        return view('template.app.apps-tickets-details');
    }
    public function apps_tickets_list()
    {
        return view('template.app.apps-tickets-list');
    }
    public function apps_todo()
    {
        return view('template.app.apps-todo');
    }
}
