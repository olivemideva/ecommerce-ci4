<div class="sidebar">
            <div class="sidebar-brand">
                <h2 style="font-family:'Great Vibes', sans-serif; font-weight: 100; font-size: 60px;">Nguø</h2>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="admindashboard"><span class="las la-home"></span><span>Home</span></a>
                    </li>
                    <li>
                        <a href="customers"><span class="las la-users"></span><span>Users</span></a>
                    </li>
                    <li>
                        <a href="orders"><span class="las la-shopping-bag"></span><span>Orders</span></a>
                    </li>
                    <li>
                        <a href="inventory"><span class="las la-tshirt"></span><span>Inventory</span></a>
                    </li>
                    <li>
                        <a href="analytics"><span class="las la-chart-bar"></span><span>Analytics</span></a>
                    </li>
                    <li>
                        <a href="profile"><span class="las la-user-circle"></span><span>Profile</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('Loginandregister/logout'); ?>"><span class="las la-sign-out-alt"></span><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <header>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search...">
                </div>

                <div class="user-wrap">
                    <img src="adminicon.png" width="40px" height="40px" alt="">
                    <div>
                        <h4>
                        <?php 
                            if(session()->get('loggedAdmin')){
                                $session = session();
                                echo " Welcome back " .$session->get('loggedAdmin');
                            }
                              ?>
                        </h4>
                    </div>
                </div>

            </header>