<!-- Sidebar -->
<div class="sidebar" id="sidebar">
        <div class="modern-profile p-3 pb-0">
				
                <div class="sidebar-nav mb-3">
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent"
                                role="tablist">
                                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                                <li class="nav-item"><a class="nav-link border-0" href="{{url('chat')}}">Chats</a></li>
                                <li class="nav-item"><a class="nav-link border-0" href="{{url('email')}}">Inbox</a></li>
                        </ul>
                </div>
        </div>
        <div class="sidebar-header p-3 pb-0 pt-2">
                
                <div class="d-flex align-items-center justify-content-between menu-item mb-3">
                        <div class="me-3">
                                <a href="{{url('calendar')}}" class="btn btn-icon border btn-menubar">
                                        <i class="ti ti-layout-grid-remove"></i>
                                </a>
                        </div>
                        <div class="me-3">
                                <a href="{{url('chat')}}" class="btn btn-icon border btn-menubar position-relative">
                                        <i class="ti ti-brand-hipchat"></i>
                                </a>
                        </div>
                        <div class="me-3 notification-item">
                                <a href="{{url('activities')}}" class="btn btn-icon border btn-menubar position-relative me-1">
                                        <i class="ti ti-bell"></i>
                                        <span class="notification-status-dot"></span>
                                </a>
                        </div>
                        <div class="me-0">
                                <a href="{{url('email')}}" class="btn btn-icon border btn-menubar">
                                        <i class="ti ti-message"></i>
                                </a>
                        </div>
                </div>
        </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="clinicdropdown">
                    <a href="{{ url('profile') }}">
                        <img src="{{ URL::asset('/build/img/profiles/avatar-14.jpg') }}" class="img-fluid" alt="Profile">
                        <div class="user-names">
                            <h5>Adrian Davies</h5>
                            <h6>Tech Lead</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr">Main Menu</h6>
                    <ul>
                        <li class="submenu">
                            <!-- <a href="javascript:void(0);"
                                class="{{ Request::is('deals-dashboard', 'leads-dashboard', 'project-dashboard') ? 'subdrop active' : '' }}">
                                <i class="ti ti-layout-2"></i><span>Dashboard</span><span class="menu-arrow"></span>
                            </a> -->
                            <ul>
                                <!-- <li><a class="{{ Request::is('deals-dashboard') ? 'active' : '' }}"
                                        href="{{ url('deals-dashboard') }}">Deals Dashboard</a></li> -->
                                <!-- <li><a class="{{ Request::is('leads-dashboard') ? 'active' : '' }}"
                                        href="{{ url('leads-dashboard') }}">Leads Dashboard</a></li> -->
                                <!-- <li><a class="{{ Request::is('project-dashboard') ? 'active' : '' }}"
                                        href="{{ url('project-dashboard') }}">Project Dashboard</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
    <a href="javascript:void(0);"
       class="{{ Request::is('leads', 'lead-details', 'lead-configuration') ? 'subdrop active' : '' }}">
        <i class="ti ti-chart-arcs"></i><span>Leads</span><span class="menu-arrow"></span>
    </a>
    <ul>
        <li><a class="{{ Request::is('leads') ? 'active' : '' }}"
               href="{{ url('leads') }}">Leads</a></li>
        <!-- <li><a class="{{ Request::is('leads-details') ? 'active' : '' }}"
               href="{{ url('leads-details') }}">Lead Details Page</a></li> -->
        <li><a class="{{ Request::is('lead-configuration') ? 'active' : '' }}"
               href="{{ url('lead-configuration') }}">Lead Configuration Page</a></li>
    </ul>
</li>
                        <li class="submenu">
                            <!-- <a href="javascript:void(0);"
                                class="{{ Request::is('chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'video-call', 'audio-call', 'call-history', 'social-feed', 'kanban-view', 'invoice', 'invoice-details') ? 'subdrop active' : '' }}"><i
                                    class="ti ti-brand-airtable"></i><span>Application</span><span
                                    class="menu-arrow"></span></a> -->
                            <!-- <ul>
                                <li><a class="{{ Request::is('chat') ? 'active' : '' }}"
                                        href="{{ url('chat') }}">Chat</a></li>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);"
                                        class="{{ Request::is('video-call', 'audio-call', 'call-history') ? 'subdrop active' : '' }}">Call<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a class="{{ Request::is('video-call') ? 'active' : '' }}"
                                                href="{{ url('video-call') }}">Video Call</a></li>
                                        <li><a class="{{ Request::is('audio-call') ? 'active' : '' }}"
                                                href="{{ url('audio-call') }}">Audio Call</a></li>
                                        <li><a class="{{ Request::is('call-history') ? 'active' : '' }}"
                                                href="{{ url('call-history') }}">Call History</a></li>
                                    </ul>
                                </li>
                                <li><a class="{{ Request::is('calendar') ? 'active' : '' }}"
                                        href="{{ url('calendar') }}">Calendar</a></li>
                                <li><a class="{{ Request::is('email') ? 'active' : '' }}"
                                        href="{{ url('email') }}">Email</a></li>
                                <li><a class="{{ Request::is('todo') ? 'active' : '' }}" href="{{ url('todo') }}">To
                                        Do</a></li>
                                <li><a class="{{ Request::is('notes') ? 'active' : '' }}"
                                        href="{{ url('notes') }}">Notes</a></li>
                                <li><a class="{{ Request::is('file-manager') ? 'active' : '' }}"
                                        href="{{ url('file-manager') }}">File Manager</a></li>
                                <li><a class="{{ Request::is('social-feed') ? 'active' : '' }}" href="{{url('social-feed')}}">Social Feed</a></li>
                                <li><a class="{{ Request::is('kanban-view') ? 'active' : '' }}" href="{{url('kanban-view')}}">Kanban</a></li>
                                <li><a class="{{ Request::is('invoice', 'invoice-details') ? 'active' : '' }}" href="{{url('invoice')}}">Invoices</a></li>
                            </ul> -->
                        </li>
                        <!-- <li class="submenu">
                                <a href="#" class="{{ Request::is('dashboard', 'company', 'subscription', 'packages', 'domain', 'purchase-transaction') ? 'active subdrop' : '' }}">
                                        <i class="ti ti-user-star"></i><span>Super Admin</span>
                                        <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                        <li><a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="{{url('dashboard')}}">Dashboard</a></li>
                                        <li><a class="{{ Request::is('company') ? 'active' : '' }}" href="{{url('company')}}">Companies</a></li>
                                        <li><a class="{{ Request::is('subscription') ? 'active' : '' }}" href="{{url('subscription')}}">Subscriptions</a></li>
                                        <li><a class="{{ Request::is('packages') ? 'active' : '' }}" href="{{url('packages')}}">Packages</a></li>
                                        <li><a class="{{ Request::is('domain') ? 'active' : '' }}" href="{{url('domain')}}">Domain</a></li>
                                        <li><a class="{{ Request::is('purchase-transaction') ? 'active' : '' }}" href="{{url('purchase-transaction')}}">Purchase Transaction</a></li>
                                </ul>
                        </li> -->
                    </ul>
                </li>
              
                <li>
                    <h6 class="submenu-hdr">CRM</h6>
                    <ul>
                        <li>
                            <a class="{{ Request::is('contacts', 'contact-grid', 'contact-details') ? 'active' : '' }}"
                                href="{{ url('contacts') }}"><i class="ti ti-user-up"></i><span>Contacts</span></a>
                        </li>
                        <li>
                            <a class="{{ Request::is('leads') ? 'active' : '' }}"
                                href="{{ url('leads') }}"><i class="ti ti-chart-arcs"></i><span>Leads</span></a>
                        </li>
                                                <li>
                            <a class="{{ Request::is('campaign', 'campaign-complete', 'campaign-archieve') ? 'active' : '' }}"
                                href="{{ url('campaign') }}"><i
                                    class="ti ti-brand-campaignmonitor"></i><span>Campaign</span></a>
                        </li>
                       
                    </ul>
                </li>
                <!-- <li>
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('lead-reports', 'deal-reports', 'contact-reports', 'company-reports', 'project-reports', 'task-reports') ? 'subdrop active' : '' }}">
                                <i class="ti ti-file-invoice"></i><span>Reports</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('lead-reports') ? 'active' : '' }}"
                                        href="{{ url('lead-reports') }}">Lead Reports</a></li>
                              
                                <li><a class="{{ Request::is('contact-reports') ? 'active' : '' }}"
                                        href="{{ url('contact-reports') }}">Contact Reports</a></li>
                               
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">CRM Settings</h6>
                    <ul>
                        <li><a class="{{ Request::is('sources') ? 'active' : '' }}" href="{{ url('sources') }}"><i
                                    class="ti ti-artboard"></i><span>Sources</span></a></li>
                        <li><a class="{{ Request::is('lost-reason') ? 'active' : '' }}"
                                href="{{ url('lost-reason') }}"><i class="ti ti-message-exclamation"></i><span>Lost
                                    Reason</span></a></li>
                        <li><a class="{{ Request::is('contact-stage') ? 'active' : '' }}"
                                href="{{ url('contact-stage') }}"><i class="ti ti-steam"></i><span>Contact
                                    Stage</span></a></li>
                        <li><a class="{{ Request::is('industry') ? 'active' : '' }}" href="{{ url('industry') }}"><i
                                    class="ti ti-building-factory"></i><span>Industry</span></a></li>
                        <li><a class="{{ Request::is('calls') ? 'active' : '' }}" href="{{ url('calls') }}"><i
                                    class="ti ti-phone-check"></i><span>Calls</span></a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li><a class="{{ Request::is('manage-users') ? 'active' : '' }}"
                                href="{{ url('manage-users') }}"><i class="ti ti-users"></i><span>Manage
                                    Users</span></a></li>
                        <li><a class="{{ Request::is('roles-permissions','permission') ? 'active' : '' }}"
                                href="{{ url('roles-permissions') }}"><i class="ti ti-navigation-cog"></i><span>Roles
                                    & Permissions</span></a></li>
                        <li><a class="{{ Request::is('delete-request') ? 'active' : '' }}"
                                href="{{ url('delete-request') }}"><i class="ti ti-flag-question"></i><span>Delete
                                    Request</span></a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">Membership</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('membership-plans', 'membership-addons', 'membership-transactions') ? 'subdrop active' : '' }}">
                                <i class="ti ti-file-invoice"></i><span>Membership</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('membership-plans') ? 'active' : '' }}"
                                        href="{{ url('membership-plans') }}">Membership Plans</a></li>
                                <li><a class="{{ Request::is('membership-addons') ? 'active' : '' }}"
                                        href="{{ url('membership-addons') }}">Membership Addons</a></li>
                                <li><a class="{{ Request::is('membership-transactions') ? 'active' : '' }}"
                                        href="{{ url('membership-transactions') }}">Transactions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">Content</h6>
                    <ul>
                        <li><a class="{{ Request::is('pages') ? 'active' : '' }}" href="{{ url('pages') }}"><i
                                    class="ti ti-page-break"></i><span>Pages</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('countries', 'states', 'cities') ? 'subdrop active' : '' }}">
                                <i class="ti ti-map-pin-pin"></i><span>Location</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('countries') ? 'active' : '' }}"
                                        href="{{ url('countries') }}">Countries</a></li>
                                <li><a class="{{ Request::is('states') ? 'active' : '' }}"
                                        href="{{ url('states') }}">States</a></li>
                                <li><a class="{{ Request::is('cities') ? 'active' : '' }}"
                                        href="{{ url('cities') }}">Cities</a></li>
                            </ul>
                        </li>
                        <li><a class="{{ Request::is('testimonials') ? 'active' : '' }}"
                                href="{{ url('testimonials') }}"><i
                                    class="ti ti-quote"></i><span>Testimonials</span></a></li>
                        <li><a class="{{ Request::is('faq') ? 'active' : '' }}" href="{{ url('faq') }}"><i
                                    class="ti ti-question-mark"></i><span>FAQ</span></a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">Support</h6>
                    <ul>
                        <li><a class="{{ Request::is('contact-messages') ? 'active' : '' }}"
                                href="{{ url('contact-messages') }}"><i class="ti ti-page-break"></i><span>Contact
                                    Messages</span></a></li>
                        <li><a class="{{ Request::is('tickets') ? 'active' : '' }}" href="{{ url('tickets') }}"><i
                                    class="ti ti-ticket"></i><span>Tickets</span></a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('profile', 'security', 'notifications', 'connected-apps') ? 'subdrop active' : '' }}">
                                <i class="ti ti-settings-cog"></i><span>General Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('profile') ? 'active' : '' }}"
                                        href="{{ url('profile') }}">Profile</a></li>
                                <li><a class="{{ Request::is('security') ? 'active' : '' }}"
                                        href="{{ url('security') }}">Security</a></li>
                                <li><a class="{{ Request::is('notifications') ? 'active' : '' }}"
                                        href="{{ url('notifications') }}">Notifications</a></li>
                                <li><a class="{{ Request::is('connected-apps') ? 'active' : '' }}"
                                        href="{{ url('connected-apps') }}">Connected Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('company-settings', 'localization', 'prefixes', 'preference', 'appearance', 'language', 'language-web') ? 'subdrop active' : '' }}">
                                <i class="ti ti-world-cog"></i><span>Website Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('company-settings') ? 'active' : '' }}"
                                        href="{{ url('company-settings') }}">Company Settings</a></li>
                                <li><a class="{{ Request::is('localization') ? 'active' : '' }}"
                                        href="{{ url('localization') }}">Localization</a></li>
                                <li><a class="{{ Request::is('prefixes') ? 'active' : '' }}"
                                        href="{{ url('prefixes') }}">Prefixes</a></li>
                                <li><a class="{{ Request::is('preference') ? 'active' : '' }}"
                                        href="{{ url('preference') }}">Preference</a></li>
                                <li><a class="{{ Request::is('appearance') ? 'active' : '' }}"
                                        href="{{ url('appearance') }}">Appearance</a></li>
                                <li><a class="{{ Request::is('language', 'language-web') ? 'active' : '' }}"
                                        href="{{ url('language') }}">Language</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('invoice-settings', 'printers', 'custom-fields') ? 'subdrop active' : '' }}">
                                <i class="ti ti-apps"></i><span>App Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('invoice-settings') ? 'active' : '' }}"
                                        href="{{ url('invoice-settings') }}">Invoice Settings</a></li>
                                <li><a class="{{ Request::is('printers') ? 'active' : '' }}"
                                        href="{{ url('printers') }}">Printers</a></li>
                                <li><a class="{{ Request::is('custom-fields') ? 'active' : '' }}"
                                        href="{{ url('custom-fields') }}">Custom Fields</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('email-settings', 'sms-gateways', 'gdpr-cookies') ? 'subdrop active' : '' }}">
                                <i class="ti ti-device-laptop"></i><span>System Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('email-settings') ? 'active' : '' }}"
                                        href="{{ url('email-settings') }}">Email Settings</a></li>
                                <li><a class="{{ Request::is('sms-gateways') ? 'active' : '' }}"
                                        href="{{ url('sms-gateways') }}">SMS Gateways</a></li>
                                <li><a class="{{ Request::is('gdpr-cookies') ? 'active' : '' }}"
                                        href="{{ url('gdpr-cookies') }}">GDPR Cookies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('payment-gateways', 'bank-accounts', 'tax-rates', 'currencies') ? 'subdrop active' : '' }}">
                                <i class="ti ti-moneybag"></i><span>Financial Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('payment-gateways') ? 'active' : '' }}"
                                        href="{{ url('payment-gateways') }}">Payment Gateways</a></li>
                                <li><a class="{{ Request::is('bank-accounts') ? 'active' : '' }}"
                                        href="{{ url('bank-accounts') }}">Bank Accounts</a></li>
                                <li><a class="{{ Request::is('tax-rates') ? 'active' : '' }}"
                                        href="{{ url('tax-rates') }}">Tax Rates</a></li>
                                <li><a class="{{ Request::is('currencies') ? 'active' : '' }}"
                                        href="{{ url('currencies') }}">Currencies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('storage', 'ban-ip-address') ? 'subdrop active' : '' }}">
                                <i class="ti ti-flag-cog"></i><span>Other Settings</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('storage') ? 'active' : '' }}"
                                        href="{{ url('storage') }}">Storage</a></li>
                                <li><a class="{{ Request::is('ban-ip-address') ? 'active' : '' }}"
                                        href="{{ url('ban-ip-address') }}">Ban IP Address</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <h6 class="submenu-hdr">Pages</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('index', 'register', 'forgot-password', 'reset-password', 'email-verification', 'two-step-verification', 'lock-screen') ? 'subdrop active' : '' }}">
                                <i class="ti ti-lock-square-rounded"></i><span>Authentication</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('index') ? 'active' : '' }}"
                                        href="{{ url('index') }}">Login</a></li>
                                <li><a class="{{ Request::is('register') ? 'active' : '' }}"
                                        href="{{ url('register') }}">Register</a></li>
                                <li><a class="{{ Request::is('forgot-password') ? 'active' : '' }}"
                                        href="{{ url('forgot-password') }}">Forgot Password</a></li>
                                <li><a class="{{ Request::is('reset-password') ? 'active' : '' }}"
                                        href="{{ url('reset-password') }}">Reset Password</a></li>
                                <li><a class="{{ Request::is('email-verification') ? 'active' : '' }}"
                                        href="{{ url('email-verification') }}">Email Verification</a></li>
                                <li><a class="{{ Request::is('two-step-verification') ? 'active' : '' }}"
                                        href="{{ url('two-step-verification') }}">2 Step Verification</a></li>
                                <li><a class="{{ Request::is('lock-screen') ? 'active' : '' }}"
                                        href="{{ url('lock-screen') }}">Lock Screen</a></li>
                            </ul>
                        </li>
                        <!-- <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('error-404', 'error-500') ? 'subdrop active' : '' }}">
                                <i class="ti ti-error-404"></i><span>Error Pages</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a class="{{ Request::is('error-404') ? 'active' : '' }}"
                                        href="{{ url('error-404') }}">404 Error</a></li>
                                <li><a class="{{ Request::is('error-500') ? 'active' : '' }}"
                                        href="{{ url('error-500') }}">500 Error</a></li>
                            </ul>
                        </li>
                        <li><a class="{{ Request::is('blank-page') ? 'active' : '' }}"
                                href="{{ url('blank-page') }}"><i class="ti ti-apps"></i><span>Blank Page</span></a>
                        </li>
                        <li><a class="{{ Request::is('coming-soon') ? 'active' : '' }}"
                                href="{{ url('coming-soon') }}"><i class="ti ti-device-laptop"></i><span>Coming
                                    Soon</span></a></li>
                        <li><a class="{{ Request::is('under-maintenance') ? 'active' : '' }}"
                                href="{{ url('under-maintenance') }}"><i class="ti ti-moneybag"></i><span>Under
                                    Maintenance</span></a></li> -->
                    </ul>
                </li>
     
                <!-- <li>
                    <h6 class="submenu-hdr">Help</h6>
                    <ul>
                        <li><a href="javascript:void(0);"><i
                                    class="ti ti-file-type-doc"></i><span>Documentation</span></a></li>
                        <li><a href="javascript:void(0);"><i class="ti ti-arrow-capsule"></i><span>Changelog
                                    v2.1.9</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-brand-databricks"></i><span>Multi
                                    Level</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Level 1.1</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Level 2.1</a></li>
                                        <li class="submenu submenu-two submenu-three"><a
                                                href="javascript:void(0);">Level 2.2<span
                                                    class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                <li><a href="javascript:void(0);">Level 3.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
