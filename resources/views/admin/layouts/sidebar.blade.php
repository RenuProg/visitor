<aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="sidebar-profile clearfix">
                          <!--   <div class="profile-img">
                                <img src="{{asset('admin_assets/images/user.jpg')}}" alt="profile">
                            </div>
                            <div class="profile-info">
                                <h3>Aster CMI Hospital</h3>
                                <p>Welcome Admin !</p>
                            </div> -->
                        </div>
                    </li>
                   
                    <li class="active">
                        <a href="{{ route('dashboard') }}" onClick="" class="">
                            <i class="menu-icon ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                        </li>
                    <!--<li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-user"></i>
                            <span>Employees</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/employee/all-employees.html">All Employee</a>
                            </li>
                            <li>
                                <a href="pages/employee/add-employee.html">Add Employee</a>
                            </li>
                            <li>
                                <a href="pages/employee/edit-employee.html">Edit Employee</a>
                            </li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-bag"></i>
                            <span>User Management</span>
                        </a>
                        <ul class="ml-menu ">
                            <li class="">
                                <a href="{{ route('users.create') }}">Create new user</a>
                            </li>
                            
                            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                <a href="{{ route('users.index') }}">Manage User</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-vector"></i>
                            <span>Departments Categories</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('department.create') }}">Create Department</a>
                            </li>
                            <li class="{{ Request::is('department*') ? 'active' : '' }}">
                                <a href="{{ route('department.index') }}">Manage Department</a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-vector"></i>
                            <span>Visitor Type</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('visitor_type.create')}}">Create Visitor Type</a>
                            </li>
                            <li class="">
                                <a href="{{route('visitor_type.index')}}">Manage Visitor Type</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-face-smile"></i>
                            <span>Visit Purposes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('visit_purpose.create')}}">Create Visit Purposes</a>
                            </li>
                            <li>
                                <a href="{{ route('visit_purpose.index') }}">Manage Visit Purposes</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-id-badge"></i>
                            <span>Visit Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('visitors.create') }}">Create Visitor </a>
                            </li>
                            <li>
                                <a href="{{ route('visitors.index') }}">Manage Visitor</a>
                            </li>
                        </ul>
                    </li>
                   <!--  <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-wallet"></i>
                            <span>Notification Settings</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/notification/sms-on.html"> SMS On </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-headphone"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/report/export.html">Export</a>
                            </li>
                            <li>
                                <a href="pages/report/import.html">Import</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="menu-icon ti-wallet"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/accounts/income.html"> Additional logs</a>
                            </li>
                            <li>
                                <a href="pages/accounts/expense.html">  Panel settings</a>
                            </li>
                            <li>
                                <a href="pages/accounts/invoice.html">  Printer Settings</a>
                            </li>
                            <li>
                                <a href="pages/accounts/invoice.html">  Can turn off feature take picture of visitor</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
        </aside>