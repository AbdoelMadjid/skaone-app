<li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('translation.components')</span></li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('ui_*') ? 'active open' : '' }}" href="#sidebarUI"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('ui_*') ? 'true' : 'false' }}"
        aria-controls="sidebarUI">
        <i class="ri-pencil-ruler-2-line"></i> <span>@lang('translation.base-ui')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('ui_*') ? 'show' : '' }}" id="sidebarUI">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="/ui_alerts"
                            class="nav-link {{ Request::is('ui_alerts') ? 'active' : '' }}">@lang('translation.alerts')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_badges"
                            class="nav-link {{ Request::is('ui_badges') ? 'active' : '' }}">@lang('translation.badges')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_buttons"
                            class="nav-link {{ Request::is('ui_buttons') ? 'active' : '' }}">@lang('translation.buttons')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_colors"
                            class="nav-link {{ Request::is('ui_colors') ? 'active' : '' }}">@lang('translation.colors')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_cards"
                            class="nav-link {{ Request::is('ui_cards') ? 'active' : '' }}">@lang('translation.cards')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_carousel"
                            class="nav-link {{ Request::is('ui_carousel') ? 'active' : '' }}">@lang('translation.carousel')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_dropdowns"
                            class="nav-link {{ Request::is('ui_dropdowns') ? 'active' : '' }}">@lang('translation.dropdowns')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_grid"
                            class="nav-link {{ Request::is('ui_grid') ? 'active' : '' }}">@lang('translation.grid')</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="/ui_images"
                            class="nav-link {{ Request::is('ui_images') ? 'active' : '' }}">@lang('translation.images')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_tabs"
                            class="nav-link {{ Request::is('ui_tabs') ? 'active' : '' }}">@lang('translation.tabs')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_accordions"
                            class="nav-link {{ Request::is('ui_accordions') ? 'active' : '' }}">@lang('translation.accordion-collapse')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_modals"
                            class="nav-link {{ Request::is('ui_modals') ? 'active' : '' }}">@lang('translation.modals')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_offcanvas"
                            class="nav-link {{ Request::is('ui_offcanvas') ? 'active' : '' }}">@lang('translation.offcanvas')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_placeholders"
                            class="nav-link {{ Request::is('ui_placeholders') ? 'active' : '' }}">@lang('translation.placeholders')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_progress"
                            class="nav-link {{ Request::is('ui_progress') ? 'active' : '' }}">@lang('translation.progress')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_notifications"
                            class="nav-link {{ Request::is('ui_notifications') ? 'active' : '' }}">@lang('translation.notifications')</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="/ui_media"
                            class="nav-link {{ Request::is('ui_media') ? 'active' : '' }}">@lang('translation.media-object')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_embed_video"
                            class="nav-link {{ Request::is('ui_embed_video') ? 'active' : '' }}">@lang('translation.embed-video')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_typography"
                            class="nav-link {{ Request::is('ui_typography') ? 'active' : '' }}">@lang('translation.typography')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_lists"
                            class="nav-link {{ Request::is('ui_lists') ? 'active' : '' }}">@lang('translation.lists')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_links"
                            class="nav-link {{ Request::is('ui_links') ? 'active' : '' }}"><span>@lang('translation.links')</span>
                            <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_general"
                            class="nav-link {{ Request::is('ui_general') ? 'active' : '' }}">@lang('translation.general')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_ribbons"
                            class="nav-link {{ Request::is('ui_ribbons') ? 'active' : '' }}">@lang('translation.ribbons')</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ui_utilities"
                            class="nav-link {{ Request::is('ui_utilities') ? 'active' : '' }}">@lang('translation.utilities')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('advance_ui_*') ? 'active open' : '' }}" href="#sidebarAdvanceUI"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('advance_ui_*') ? 'true' : 'false' }}"
        aria-controls="sidebarAdvanceUI">
        <i class="ri-stack-line"></i> <span>@lang('translation.advance-ui')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('advance_ui_*') ? 'show' : '' }}" id="sidebarAdvanceUI">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/advance_ui_sweetalerts"
                    class="nav-link {{ Request::is('advance_ui_sweetalerts') ? 'active' : '' }}">@lang('translation.sweet-alerts')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_nestable"
                    class="nav-link {{ Request::is('advance_ui_nestable') ? 'active' : '' }}">@lang('translation.nestable-list')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_scrollbar"
                    class="nav-link {{ Request::is('advance_ui_scrollbar') ? 'active' : '' }}">@lang('translation.scrollbar')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_animation"
                    class="nav-link {{ Request::is('advance_ui_animation') ? 'active' : '' }}">@lang('translation.animation')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_tour"
                    class="nav-link {{ Request::is('advance_ui_tour') ? 'active' : '' }}">@lang('translation.tour')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_swiper"
                    class="nav-link {{ Request::is('advance_ui_swiper') ? 'active' : '' }}">@lang('translation.swiper-slider')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_ratings"
                    class="nav-link {{ Request::is('advance_ui_ratings') ? 'active' : '' }}">@lang('translation.ratings')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_highlight"
                    class="nav-link {{ Request::is('advance_ui_highlight') ? 'active' : '' }}">@lang('translation.highlight')</a>
            </li>
            <li class="nav-item">
                <a href="/advance_ui_scrollspy"
                    class="nav-link {{ Request::is('advance_ui_scrollspy') ? 'active' : '' }}">@lang('translation.scrollSpy')</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('widgets') ? 'active open' : '' }}" href="/widgets">
        <i class="ri-honour-line"></i> <span>@lang('translation.widgets')</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('forms_*') ? 'active open' : '' }}" href="#sidebarForms"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('forms_*') ? 'true' : 'false' }}"
        aria-controls="sidebarForms">
        <i class="ri-file-list-3-line"></i> <span>@lang('translation.forms')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('forms_*') ? 'show' : '' }}" id="sidebarForms">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/forms_elements"
                    class="nav-link {{ Request::is('forms_elements') ? 'active' : '' }}">@lang('translation.basic-elements')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_select"
                    class="nav-link {{ Request::is('forms_select') ? 'active' : '' }}">@lang('translation.form-select')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_checkboxs_radios"
                    class="nav-link {{ Request::is('forms_checkboxs_radios') ? 'active' : '' }}">@lang('translation.checkboxs-radios')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_pickers"
                    class="nav-link {{ Request::is('forms_pickers') ? 'active' : '' }}">@lang('translation.pickers')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_masks"
                    class="nav-link {{ Request::is('forms_masks') ? 'active' : '' }}">@lang('translation.input-masks')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_advanced"
                    class="nav-link {{ Request::is('forms_advanced') ? 'active' : '' }}">@lang('translation.advanced')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_range_sliders"
                    class="nav-link {{ Request::is('forms_range_sliders') ? 'active' : '' }}">@lang('translation.range-slider')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_validation"
                    class="nav-link {{ Request::is('forms_validation') ? 'active' : '' }}">@lang('translation.validation')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_wizard"
                    class="nav-link {{ Request::is('forms_wizard') ? 'active' : '' }}">@lang('translation.wizard')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_editors"
                    class="nav-link {{ Request::is('forms_editors') ? 'active' : '' }}">@lang('translation.editors')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_file_uploads"
                    class="nav-link {{ Request::is('forms_file_uploads') ? 'active' : '' }}">@lang('translation.file-uploads')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_layouts"
                    class="nav-link {{ Request::is('forms_layouts') ? 'active' : '' }}">@lang('translation.form-layouts')</a>
            </li>
            <li class="nav-item">
                <a href="/forms_select2"
                    class="nav-link {{ Request::is('forms_select2') ? 'active' : '' }}">@lang('translation.select2')
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('tables_*') ? 'active open' : '' }}" href="#sidebarTables"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('tables_*') ? 'true' : 'false' }}"
        aria-controls="sidebarTables">
        <i class="ri-layout-grid-line"></i> <span>@lang('translation.tables')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('tables_*') ? 'show' : '' }}" id="sidebarTables">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/tables_basic"
                    class="nav-link {{ Request::is('tables_basic') ? 'active' : '' }}">@lang('translation.basic-tables')</a>
            </li>
            <li class="nav-item">
                <a href="/tables_gridjs"
                    class="nav-link {{ Request::is('tables_gridjs') ? 'active' : '' }}">@lang('translation.grid-js')</a>
            </li>
            <li class="nav-item">
                <a href="/tables_listjs"
                    class="nav-link {{ Request::is('tables_listjs') ? 'active' : '' }}">@lang('translation.list-js')</a>
            </li>
            <li class="nav-item">
                <a href="/tables_datatables"
                    class="nav-link {{ Request::is('tables_datatables') ? 'active' : '' }}">@lang('translation.datatables')</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('charts_*') ? 'active open' : '' }}" href="#sidebarCharts"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('charts_*') ? 'true' : 'false' }}"
        aria-controls="sidebarCharts">
        <i class="ri-pie-chart-line"></i> <span>@lang('translation.charts')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('charts_*') ? 'show' : '' }}" id="sidebarCharts">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="#sidebarApexcharts" class="nav-link {{ Request::is('charts_apex_*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('charts_apex_*') ? 'true' : 'false' }}"
                    aria-controls="sidebarApexcharts">@lang('translation.apexcharts')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('charts_apex_*') ? 'show' : '' }}"
                    id="sidebarApexcharts">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/charts_apex_line"
                                class="nav-link {{ Request::is('charts_apex_line') ? 'active' : '' }}">@lang('translation.line')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_area"
                                class="nav-link {{ Request::is('charts_apex_area') ? 'active' : '' }}">@lang('translation.area')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_column"
                                class="nav-link {{ Request::is('charts_apex_column') ? 'active' : '' }}">@lang('translation.column')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_bar"
                                class="nav-link {{ Request::is('charts_apex_bar') ? 'active' : '' }}">@lang('translation.bar')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_mixed"
                                class="nav-link {{ Request::is('charts_apex_mixed') ? 'active' : '' }}">@lang('translation.mixed')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_timeline"
                                class="nav-link {{ Request::is('charts_apex_timeline') ? 'active' : '' }}">@lang('translation.timeline')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_range_area"
                                class="nav-link {{ Request::is('charts_apex_range_area') ? 'active' : '' }}"><span>@lang('translation.range-area')</span>
                                <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_funnel"
                                class="nav-link {{ Request::is('charts_apex_funnel') ? 'active' : '' }}"><span>@lang('translation.funnel')</span>
                                <span class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_candlestick"
                                class="nav-link {{ Request::is('charts_apex_candlestick') ? 'active' : '' }}">@lang('translation.candlstick')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_boxplot"
                                class="nav-link {{ Request::is('charts_apex_boxplot') ? 'active' : '' }}">@lang('translation.boxplot')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_bubble"
                                class="nav-link {{ Request::is('charts_apex_bubble') ? 'active' : '' }}">@lang('translation.bubble')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_scatter"
                                class="nav-link {{ Request::is('charts_apex_scatter') ? 'active' : '' }}">@lang('translation.scatter')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_heatmap"
                                class="nav-link {{ Request::is('charts_apex_heatmap') ? 'active' : '' }}">@lang('translation.heatmap')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_treemap"
                                class="nav-link {{ Request::is('charts_apex_treemap') ? 'active' : '' }}">@lang('translation.treemap')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_pie"
                                class="nav-link {{ Request::is('charts_apex_pie') ? 'active' : '' }}">@lang('translation.pie')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_radialbar"
                                class="nav-link {{ Request::is('charts_apex_radialbar') ? 'active' : '' }}">@lang('translation.radialbar')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_radar"
                                class="nav-link {{ Request::is('charts_apex_radar') ? 'active' : '' }}">@lang('translation.radar')</a>
                        </li>
                        <li class="nav-item">
                            <a href="/charts_apex_polar"
                                class="nav-link {{ Request::is('charts_apex_polar') ? 'active' : '' }}">@lang('translation.polar-area')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="/charts_chartjs"
                    class="nav-link {{ Request::is('charts_chartjs') ? 'active' : '' }}">@lang('translation.chartjs')</a>
            </li>
            <li class="nav-item">
                <a href="/charts_echarts"
                    class="nav-link {{ Request::is('charts_echarts') ? 'active' : '' }}">@lang('translation.echarts')</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('icons_*') ? 'active open' : '' }}" href="#sidebarIcons"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('icons_*') ? 'true' : 'false' }}"
        aria-controls="sidebarIcons">
        <i class="ri-compasses-2-line"></i> <span>@lang('translation.icons')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('icons_*') ? 'show' : '' }}" id="sidebarIcons">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/icons_remix"
                    class="nav-link {{ Request::is('icons_remix') ? 'active' : '' }}">@lang('translation.remix')</a>
            </li>
            <li class="nav-item">
                <a href="/icons_boxicons"
                    class="nav-link {{ Request::is('icons_boxicons') ? 'active' : '' }}">@lang('translation.boxicons')</a>
            </li>
            <li class="nav-item">
                <a href="/icons_materialdesign"
                    class="nav-link {{ Request::is('icons_materialdesign') ? 'active' : '' }}">@lang('translation.material-design')</a>
            </li>
            <li class="nav-item">
                <a href="/icons_lineawesome"
                    class="nav-link {{ Request::is('icons_lineawesome') ? 'active' : '' }}">@lang('translation.line-awesome')</a>
            </li>
            <li class="nav-item">
                <a href="/icons_feather"
                    class="nav-link {{ Request::is('icons_feather') ? 'active' : '' }}">@lang('translation.feather')</a>
            </li>
            <li class="nav-item">
                <a href="/icons_crypto" class="nav-link {{ Request::is('icons_crypto') ? 'active' : '' }}">
                    <span>@lang('translation.crypto-svg')</span></a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('maps_*') ? 'active open' : '' }}" href="#sidebarMaps"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ Request::is('maps_*') ? 'true' : 'false' }}"
        aria-controls="sidebarMaps">
        <i class="ri-map-pin-line"></i> <span>@lang('translation.maps')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('maps_*') ? 'show' : '' }}" id="sidebarMaps">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/maps_google" class="nav-link {{ Request::is('maps_google') ? 'active' : '' }}">
                    @lang('translation.google')
                </a>
            </li>
            <li class="nav-item">
                <a href="/maps_vector" class="nav-link {{ Request::is('maps_vector') ? 'active' : '' }}">
                    @lang('translation.vector')
                </a>
            </li>
            <li class="nav-item">
                <a href="/maps_leaflet" class="nav-link {{ Request::is('maps_leaflet') ? 'active' : '' }}">
                    @lang('translation.leaflet')
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link {{ Request::is('Multilevel*') ? 'active open' : '' }}" href="#sidebarMultilevel"
        data-bs-toggle="collapse" role="button"
        aria-expanded="{{ Request::is('apps_invoices_*') ? 'true' : 'false' }}" aria-controls="sidebarMultilevel">
        <i class="ri-share-line"></i> <span>@lang('translation.multi-level')</span>
    </a>
    <div class="collapse menu-dropdown {{ Request::is('Multilevel*') ? 'show' : '' }}" id="sidebarMultilevel">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('#') ? 'active' : '' }}">@lang('translation.level-1.1')</a>
            </li>
            <li class="nav-item">
                <a href="#sidebarAccount" class="nav-link {{ Request::is('Account') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ Request::is('Account*') ? 'true' : 'false' }}"
                    aria-controls="sidebarAccount">@lang('translation.level-1.2')
                </a>
                <div class="collapse menu-dropdown {{ Request::is('Account*') ? 'show' : '' }}" id="sidebarAccount">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::is('Account') ? 'active' : '' }}">@lang('translation.level-2.1')</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarCrm" class="nav-link {{ Request::is('Crm') ? 'active' : '' }}"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="{{ Request::is('Crm*') ? 'true' : 'false' }}"
                                aria-controls="sidebarCrm">@lang('translation.level-2.2')
                            </a>
                            <div class="collapse menu-dropdown {{ Request::is('Crm*') ? 'show' : '' }}"
                                id="sidebarCrm">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link {{ Request::is('Crm') ? 'active' : '' }}">@lang('translation.level-3.1')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link {{ Request::is('Crm') ? 'active' : '' }}">@lang('translation.level-3.2')</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
