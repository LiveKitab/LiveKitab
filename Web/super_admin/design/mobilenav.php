    <header class="header header--mobile header--mobile-photo" data-sticky="true">
        <div class="navigation--mobile">
            <div class="navigation__left">
                <a class="ps-logo" href=""><img src="../img/logo-photo.png" alt=""></a>
            </div>
            <div class="navigation__right">
                <div class="header__actions">
                    
                    <div class="ps-block--user-header">
<div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-user" aria-hidden="true" style="font-weight: bold;"></i></a>
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__content">
                                        <h4 class="text-center" style="font-family:">Hello, <?php echo $sa_name; ?></h4>
                                        <h4 class="text-center">Contact: <?php echo $sa_cno; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__footer">
                           <figure>
                                    <a class="ps-btn" href="profile" style="color:white;">Profile</a>
                                    <a class="ps-btn" href="back/function/logout" style="color:white;">Logout</a>
                            </figure>
                        </div>
                    </div>
                </div>                    </div>
                </div>
            </div>
        </div>
    </header>
    

<div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i
                class="icon-list4"></i><span> Menu</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span>
                Search</span></a><a class="navigation__item" href="dash"><i
                class="icon-home"></i><span> Home</span></a></div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile">
            <div class="form-group--nest">
                <input class="form-control" id="searchstudent1" name="searchstudent1" type="text" placeholder="I'm Searching For...">
                <button disabled><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div style="margin-top:35px;"></div>

<div class="navigation__content">
    <div class="container-fluid">
        <div class="ps-shop-categories">
          <div class="row align-content-lg-stretch" id="searchoutput1"></div>
        </div>
    </div>
</div>
    

<div style="margin-top:35px;"></div>
</div>

<div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                
                <li class="current-menu-item menu-item-has-children"><a>Structure</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="structure">Structure</a>
                        </li>
                        <li><a href="addbanner">Add Banner</a></li>
                        <li><a href="managebanner">Manage Banner</a></li>
                    </ul>
                </li>
                
                <li class="current-menu-item menu-item-has-children"><a>Users</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="addpublisher">Add Publisher</a></li>
                                <li><a href="managepublisher">Manage Publisher</a></li><br>
                                <li><b>Mentor</b></li>
                                <li><a href="newmentor">New Mentor Request</a></li>
                                <li><a href="managementor">Manage Mentor</a></li><br>
                                <li><b>Scholar</b></li>
                                <li><a href="scholar">Manage Scholar</a></li>
                                         
                    </ul>
                </li>
                
                <li class="current-menu-item menu-item-has-children"><a>Subject</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="selectstructure">Add Subject</a></li>
                        <li><a href="managecourses">Manage Subject</a></li>
                                         
                    </ul>
                </li>
                <li><a href="addpackage">Create Package</a></li>
                <li><a href="analysis">Analysis</a></li>
                <li class="current-menu-item menu-item-has-children"><a>Account</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="selectmentor">Payments</a></li>
                                <li><a href="studentaccount">Student Accounting</a></li>
                                <li><a href="overallaccount">Payment Reports</a></li>
                        </li>
                    </ul>
                </li>
                
                
                        
                        
                
                
                                               
                    </ul>
                </li>
               
                
                
            </ul>
        </div>
    </div>