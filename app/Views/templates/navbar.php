<a href="#" class="logo">Nguø</a>
    
    <nav class="navbar">

            <div class="inner-width">
               
                <div class="navbar-menu">
                <div class="username">
                <?php 
                            if(session()->get('loggedClient')){
                                $session = session();
                                echo " Welcome back " .$session->get('loggedClient');
                            }
                              ?>
                </div>
                <a href="products" style="text-decoration: none; color:white;">Products</a>
                <a href="contact" style="text-decoration: none; color:white;">Contact</a>
                <a href="about" style="text-decoration: none; color:white;">About</a>
                <a href="feedback" style="text-decoration: none; color:white;">Feedback</a>
                <a href="<?= base_url('Cart/cart'); ?>" ><span class="las la-shopping-cart"></span></a> 

               
            </div>
            
         
        </div>
        <div class="search-wrapper">
                    <span class="las la-search" style="cursor:pointer;"></span>
                    <input type="search" placeholder="Search...">
                </div>

                <a href="<?= base_url('Loginandregister/logout'); ?>"><span class="fas fa-power-off" id="logout"></span></a> 
        </nav> 