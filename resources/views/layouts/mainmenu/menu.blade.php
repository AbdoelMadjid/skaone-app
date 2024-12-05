<li class="menu-title"><span>@lang('translation.menu')</span></li>
<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('dashboard_*') ? 'active open' : '' }}" href="#sidebarDashboards"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('dashboard_*') ? 'true' : 'false' }}"
        aria-controls="sidebarDashboards">
        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('dashboard_*') ? 'show' : '' }}" id="sidebarDashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/dashboard_analytics"
                    class="nav-link {{ Request::is('dashboard_analytics') ? 'active' : '' }}">@lang('translation.analytics')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_crm"
                    class="nav-link {{ Request::is('dashboard_crm') ? 'active' : '' }}">@lang('translation.crm')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_ecommerce"
                    class="nav-link {{ Request::is('dashboard_ecommerce') ? 'active' : '' }}">@lang('translation.ecommerce')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_crypto"
                    class="nav-link {{ Request::is('dashboard_crypto') ? 'active' : '' }}">@lang('translation.crypto')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_projects"
                    class="nav-link {{ Request::is('dashboard_projects') ? 'active' : '' }}">@lang('translation.projects')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_nft" class="nav-link {{ Request::is('dashboard_nft') ? 'active' : '' }}">
                    @lang('translation.nft')</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard_job"
                    class="nav-link {{ Request::is('dashboard_job') ? 'active' : '' }}">@lang('translation.job')</a>
            </li>
        </ul>
    </div>
</li> <!-- end Dashboard Menu -->


<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('apps_*') ? 'active open' : '' }}" href="#sidebarApps"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('apps_*') ? 'true' : 'false' }}"
        aria-controls="sidebarApps">
        <i class="ri-apps-2-line"></i> <span>@lang('translation.apps')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('apps_*') ? 'show' : '' }}" id="sidebarApps">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/apps_calendar"
                    class="nav-link {{ Request::is('apps_calendar') ? 'active' : '' }}">@lang('translation.calendar')</a>
            </li>
            <li class="nav-item">
                <a href="/apps_chat"
                    class="nav-link {{ Request::is('apps_chat') ? 'active' : '' }}">@lang('translation.chat')</a>
            </li>
            <li class="nav-item">
                <a href="#sidebarEmail" class="nav-link {{ Request::is('apps_email_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_email_*') ? 'true' : 'false' }}" aria-controls="sidebarEmail">
                    @lang('translation.email')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_email_*') ? 'show' : '' }}" id="sidebarEmail">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_email_mailbox"
                                class="nav-link {{ Request::is('apps_email_mailbox') ? 'active' : '' }}">@lang('translation.mailbox')</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebaremailTemplates"
                                class="nav-link {{ Request::is('apps_email_template_*') ? 'active open' : '' }}"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="{{ Request::is('apps_email_template_*') ? 'true' : 'false' }}"
                                aria-controls="sidebaremailTemplates">
                                @lang('translation.email-templates')
                            </a>
                            <div class="collapse menu-dropdown {{ Request::is('apps_email_template_*') ? 'show' : '' }}"
                                id="sidebaremailTemplates">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/apps_email_template_basic"
                                            class="nav-link {{ Request::is('apps_email_template_basic') ? 'active' : '' }}">
                                            @lang('translation.basic-action') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/apps_email_template_ecommerce"
                                            class="nav-link {{ Request::is('apps_email_template_ecommerce') ? 'active' : '' }}">
                                            @lang('translation.ecommerce-action') </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarEcommerce" class="nav-link {{ Request::is('apps_ecommerce_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_ecommerce_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarEcommerce">@lang('translation.ecommerce')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_ecommerce_*') ? 'show' : '' }}"
                    id="sidebarEcommerce">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_ecommerce_products"
                                class="nav-link {{ Request::is('apps_ecommerce_products') ? 'active' : '' }}">@lang('translation.products')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_product_details"
                                class="nav-link {{ Request::is('apps_ecommerce_product_details') ? 'active' : '' }}">@lang('translation.product-Details')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_add_product"
                                class="nav-link {{ Request::is('apps_ecommerce_add_product') ? 'active' : '' }}">@lang('translation.create-product')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_orders"
                                class="nav-link {{ Request::is('apps_ecommerce_orders') ? 'active' : '' }}">@lang('translation.orders')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_order_details"
                                class="nav-link {{ Request::is('apps_ecommerce_order_details') ? 'active' : '' }}">@lang('translation.order-details')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_customers"
                                class="nav-link {{ Request::is('apps_ecommerce_customers') ? 'active' : '' }}">@lang('translation.customers')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_cart"
                                class="nav-link {{ Request::is('apps_ecommerce_cart') ? 'active' : '' }}">@lang('translation.shopping-cart')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_checkout"
                                class="nav-link {{ Request::is('apps_ecommerce_checkout') ? 'active' : '' }}">@lang('translation.checkout')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_sellers"
                                class="nav-link {{ Request::is('apps_ecommerce_sellers') ? 'active' : '' }}">@lang('translation.sellers')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_ecommerce_seller_details"
                                class="nav-link {{ Request::is('apps_ecommerce_seller_details') ? 'active' : '' }}">@lang('translation.sellers-details')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarProjects" class="nav-link {{ Request::is('apps_projects_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_projects_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarProjects">@lang('translation.projects')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_projects_*') ? 'show' : '' }}"
                    id="sidebarProjects">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_projects_list"
                                class="nav-link {{ Request::is('apps_projects_list') ? 'active' : '' }}">@lang('translation.list')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_projects_overview"
                                class="nav-link {{ Request::is('apps_projects_overview') ? 'active' : '' }}">@lang('translation.overview')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_projects_create"
                                class="nav-link {{ Request::is('apps_projects_create') ? 'active' : '' }}">@lang('translation.create-project')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarTasks" class="nav-link {{ Request::is('apps_tasks_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_tasks_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarTasks">@lang('translation.tasks')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_tasks_*') ? 'show' : '' }}"
                    id="sidebarTasks">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_tasks_kanban"
                                class="nav-link {{ Request::is('apps_tasks_kanban') ? 'active' : '' }}">@lang('translation.kanbanboard')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_tasks_list_view"
                                class="nav-link {{ Request::is('apps_tasks_list_view') ? 'active' : '' }}">@lang('translation.list-view')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_tasks_details"
                                class="nav-link {{ Request::is('apps_tasks_details') ? 'active' : '' }}">@lang('translation.task-details')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarCRM" class="nav-link {{ Request::is('apps_crm_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_crm_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarCRM">@lang('translation.crm')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_crm_*') ? 'show' : '' }}" id="sidebarCRM">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_crm_contacts"
                                class="nav-link {{ Request::is('apps_crm_contacts') ? 'active' : '' }}">@lang('translation.contacts')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crm_companies"
                                class="nav-link {{ Request::is('apps_crm_companies') ? 'active' : '' }}">@lang('translation.companies')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crm_deals"
                                class="nav-link {{ Request::is('apps_crm_deals') ? 'active' : '' }}">@lang('translation.deals')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crm_leads"
                                class="nav-link {{ Request::is('apps_crm_leads') ? 'active' : '' }}">@lang('translation.leads')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarCrypto" class="nav-link {{ Request::is('apps_crypto_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_crypto_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarCrypto">@lang('translation.crypto')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_crypto_*') ? 'show' : '' }}"
                    id="sidebarCrypto">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_crypto_transactions"
                                class="nav-link {{ Request::is('apps_crypto_transactions') ? 'active' : '' }}">@lang('translation.transactions')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crypto_buy_sell"
                                class="nav-link {{ Request::is('apps_crypto_buy_sell') ? 'active' : '' }}">@lang('translation.buy-sell')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crypto_orders"
                                class="nav-link {{ Request::is('apps_crypto_orders') ? 'active' : '' }}">@lang('translation.orders')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crypto_wallet"
                                class="nav-link {{ Request::is('apps_crypto_wallet') ? 'active' : '' }}">@lang('translation.my-wallet')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crypto_ico"
                                class="nav-link {{ Request::is('apps_crypto_ico') ? 'active' : '' }}">@lang('translation.ico-list')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_crypto_kyc"
                                class="nav-link {{ Request::is('apps_crypto_kyc') ? 'active' : '' }}">@lang('translation.kyc-application')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarInvoices" class="nav-link {{ Request::is('apps_invoices_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_invoices_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarInvoices">@lang('translation.invoices')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_invoices_*') ? 'show' : '' }}"
                    id="sidebarInvoices">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_invoices_list"
                                class="nav-link {{ Request::is('apps_invoices_list') ? 'active' : '' }}">@lang('translation.list-view')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_invoices_details"
                                class="nav-link {{ Request::is('apps_invoices_details') ? 'active' : '' }}">@lang('translation.details')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_invoices_create"
                                class="nav-link {{ Request::is('apps_invoices_create') ? 'active' : '' }}">@lang('translation.create-invoice')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarTickets" class="nav-link {{ Request::is('apps_tickets_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_tickets_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarTickets">@lang('translation.supprt-tickets')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_tickets_*') ? 'show' : '' }}"
                    id="sidebarTickets">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_tickets_list"
                                class="nav-link {{ Request::is('apps_tickets_list') ? 'active' : '' }}">@lang('translation.list-view')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_tickets_details"
                                class="nav-link {{ Request::is('apps_tickets_details') ? 'active' : '' }}">@lang('translation.ticket-details')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#sidebarnft" class="nav-link {{ Request::is('apps_nft_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_nft_*') ? 'true' : 'false' }}" aria-controls="sidebarnft">
                    @lang('translation.nft-marketplace')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('apps_nft_*') ? 'show' : '' }}" id="sidebarnft">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_nft_marketplace"
                                class="nav-link {{ Request::is('apps_nft_marketplace') ? 'active' : '' }}">
                                @lang('translation.marketplace') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_explore"
                                class="nav-link {{ Request::is('apps_nft_explore') ? 'active' : '' }}">
                                @lang('translation.explore-now') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_auction"
                                class="nav-link {{ Request::is('apps_nft_auction') ? 'active' : '' }}">
                                @lang('translation.live-auction') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_item_details"
                                class="nav-link {{ Request::is('apps_nft_item_details') ? 'active' : '' }}">
                                @lang('translation.item-details') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_collections"
                                class="nav-link {{ Request::is('apps_nft_collections') ? 'active' : '' }}">
                                @lang('translation.collections') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_creators"
                                class="nav-link {{ Request::is('apps_nft_creators') ? 'active' : '' }}">
                                @lang('translation.creators') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_ranking"
                                class="nav-link {{ Request::is('apps_nft_ranking') ? 'active' : '' }}">
                                @lang('translation.ranking') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_wallet"
                                class="nav-link {{ Request::is('apps_nft_wallet') ? 'active' : '' }}">
                                @lang('translation.wallet-connect') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_nft_create"
                                class="nav-link {{ Request::is('apps_nft_create') ? 'active' : '' }}">
                                @lang('translation.create-nft') </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="/apps_file_manager" class="nav-link {{ Request::is('apps_file_manager') ? 'active' : '' }}">
                    <span>@lang('translation.file-manager')</span></a>
            </li>
            <li class="nav-item">
                <a href="/apps_todo" class="nav-link {{ Request::is('apps_todo') ? 'active' : '' }}">
                    <span>@lang('translation.to-do')</span></a>
            </li>
            <li class="nav-item">
                <a href="#sidebarjobs" class="nav-link {{ Request::is('apps_job_*') ? 'active open' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('apps_job_*') ? 'true' : 'false' }}" aria-controls="sidebarjobs">
                    @lang('translation.jobs')</a>
                <div class="collapse menu-dropdown {{ Request::is('apps_job_*') ? 'show' : '' }}" id="sidebarjobs">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/apps_job_statistics"
                                class="nav-link {{ Request::is('apps_job_statistics') ? 'active' : '' }}">
                                @lang('translation.statistics') </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarJoblists"
                                class="nav-link {{ Request::is('apps_job_lists_*') ? 'active open' : '' }}"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="{{ Request::is('apps_job_lists_*') ? 'true' : 'false' }}"
                                aria-controls="sidebarJoblists">
                                @lang('translation.job-lists')
                            </a>
                            <div class="collapse menu-dropdown {{ Request::is('apps_job_lists_*') ? 'show' : '' }}"
                                id="sidebarJoblists">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/apps_job_lists_basic"
                                            class="nav-link {{ Request::is('apps_job_lists_basic') ? 'active' : '' }}">
                                            @lang('translation.list')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/apps_job_lists_grid_lists"
                                            class="nav-link {{ Request::is('apps_job_lists_grid_lists') ? 'active' : '' }}">
                                            @lang('translation.grid') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/apps_job_lists_details"
                                            class="nav-link {{ Request::is('apps_job_lists_details') ? 'active' : '' }}">
                                            @lang('translation.overview')</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarCandidatelists"
                                class="nav-link {{ Request::is('apps_job_candidate_*') ? 'active open' : '' }}"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="{{ Request::is('apps_job_candidate_*') ? 'true' : 'false' }}"
                                aria-controls="sidebarCandidatelists">
                                @lang('translation.candidate-lists')
                            </a>
                            <div class="collapse menu-dropdown {{ Request::is('apps_job_candidate_*') ? 'show' : '' }}"
                                id="sidebarCandidatelists">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/apps_job_candidate_lists"
                                            class="nav-link {{ Request::is('apps_job_candidate_lists') ? 'active' : '' }}">
                                            @lang('translation.list-view')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/apps_job_candidate_grid"
                                            class="nav-link {{ Request::is('apps_job_candidate_grid') ? 'active' : '' }}">
                                            @lang('translation.grid-view')</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_job_application"
                                class="nav-link {{ Request::is('apps_job_application') ? 'active' : '' }}">
                                @lang('translation.application') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_job_new"
                                class="nav-link {{ Request::is('apps_job_new') ? 'active' : '' }}">
                                @lang('translation.new-job') </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_job_companies_lists"
                                class="nav-link {{ Request::is('apps_job_companies_lists') ? 'active' : '' }}">
                                @lang('translation.companies-list')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/apps_job_categories"
                                class="nav-link {{ Request::is('apps_job_categories') ? 'active' : '' }}">
                                @lang('translation.job-categories')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="/apps_api_key" class="nav-link {{ Request::is('apps_api_key') ? 'active' : '' }}">
                    @lang('translation.api-key')</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('layouts_*') ? 'active open' : '' }}" href="#sidebarLayouts"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('layouts_*') ? 'true' : 'false' }}"
        aria-controls="sidebarLayouts">
        <i class="ri-layout-3-line"></i> <span>@lang('translation.layouts')</span><span
            class="badge badge-pill bg-danger">@lang('translation.hot')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('layouts_*') ? 'show' : '' }}" id="sidebarLayouts">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/layouts_horizontal" target="_blank"
                    class="nav-link {{ Request::is('auth_error_offline') ? 'active' : '' }}">@lang('translation.horizontal')</a>
            </li>
            <li class="nav-item">
                <a href="/layouts_detached" target="_blank"
                    class="nav-link {{ Request::is('auth_error_offline') ? 'active' : '' }}">@lang('translation.detached')</a>
            </li>
            <li class="nav-item">
                <a href="/layouts_two_column" target="_blank"
                    class="nav-link {{ Request::is('auth_error_offline') ? 'active' : '' }}">@lang('translation.two-column')</a>
            </li>
            <li class="nav-item">
                <a href="/layouts_vertical_hovered" target="_blank"
                    class="nav-link {{ Request::is('auth_error_offline') ? 'active' : '' }}">@lang('translation.hovered')</a>
            </li>
        </ul>
    </div>
</li> <!-- end Dashboard Menu -->
