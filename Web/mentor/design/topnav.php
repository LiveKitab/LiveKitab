
	<div class="ps-logo"><img src="../img/logo-photo.png" alt=""></div>
       <div class="header__content">
            <ul class="menu menu--photo">
                <li><a href="dash">Home</a></li>
                
                <li><a href="exploresubject">Explore Subject</a></li>
                
                
                <li class="menu-item-has-children has-mega-menu"><a href="#">Video</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>Video<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="video">Create Video</a></li>
                                <li><a href="viewvideo">Manage Video</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="analysis">Analysis</a></li>
                <li><a href="My_Billing">My Billing</a></li>
                
            </ul>
            <div class="header__actions">
                
                
                <div class="ps-block--user-header">
                                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-user" aria-hidden="true" style="font-weight: bold;color:black;" onMouseOver="this.style.color='#DC0000'" onMouseOut="this.style.color='black'"></i></a>
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
                        <div class="ps-cart__footer" style="margin-top:-15%;">
                           <figure>
                                    <a class="ps-btn" href="profile" style="color:white;">Profile</a>
                                    <a class="ps-btn" href="back/function/logout" style="color:white;">Logout</a></figure>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
		
		        