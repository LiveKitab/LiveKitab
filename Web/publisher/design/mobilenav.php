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
                                        <h4 class="text-center" style="font-family:">Hello, <?php echo $e_name; ?></h4>
                                        <h4 class="text-center">Contact: <?php echo $e_cno; ?></h4>
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
                
                <li><a href="assign">Assigned Work</a></li>
                
                <li><a href="complete">Completed Work</a></li>
                
            </ul>
        </div>
    </div>