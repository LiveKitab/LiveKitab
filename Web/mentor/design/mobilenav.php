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
                                        <?php
                                        $cmd="select * from creator_data where c_id='$c_id'";
                                        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $m_photo=$row['c_img'];
                                        ?>
                                        <div style="margin-bottom:5%;margin-left:25%;width:150px;height:120px;box-sizing:border-box;">
                                            <img  src="../src/creator/<?=$m_photo;?>">
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <h4 class="text-center" style="margin-top:10%;">Hello, <?php echo $c_name; ?></h4>
                                        <h4 class="text-center">Contact: <?php echo $c_cno; ?></h4>
                                        
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
                
                 <li class="current-menu-item menu-item-has-children"><a>Explore Subject</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="exploresubject">Explore Subject</a>
                        </li>
                       </ul>
                </li>
                
                <li class="current-menu-item menu-item-has-children"><a>Video</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="video">Create Video</a>
                        </li>
                        <li><a href="viewvideo">Manage Video</a>
                        </li>
                                         
                    </ul>
                </li>
                
                <li class="current-menu-item menu-item-has-children"><a>Analysis</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="analysis">Analysis</a>
                        </li>
                    </ul>
                </li>

               <li class="current-menu-item menu-item-has-children"><a>My Billing</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="My_Billing">My Billing</a>
                        </li>
                    </ul>
                </li>
                
                
                        
                <!--        <li class="current-menu-item menu-item-has-children"><a>Structure</a><span class="sub-toggle"></span>-->
                <!--    <ul class="sub-menu">-->
                <!--        <li><a href="newcourses">Add Branch</a>-->
                <!--        </li>-->
                <!--        <li><a href="managecourses">Manage Branch</a>-->
                <!--        </li>-->
                <!--        <li><a href="newcourses">Add Branch</a>-->
                <!--        </li>-->
                <!--        <li><a href="managecourses">Manage Branch</a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                                          
                    </ul>
                </li>
               
                
                
            </ul>
        </div>
    </div>