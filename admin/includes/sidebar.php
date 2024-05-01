            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link" href="manage-staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Staff
                            </a>

                            <!--Categories --->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-category.php">Add</a>
                                    <a class="nav-link" href="manage-categories.php">Manage</a>
                                </nav>
                            </div>

<!--- Sub-Categories --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subcat" aria-expanded="false" aria-controls="subcat">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sub-Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="subcat" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-subcategories.php">Add</a>
                                    <a class="nav-link" href="manage-subcategories.php">Manage</a>
                                </nav>
                            </div>

<!--- Products --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-product.php">Add</a>
                                    <a class="nav-link" href="manage-products.php">Manage</a>
                                </nav>
                            </div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product1" aria-expanded="false" aria-controls="product1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="aboutus.php">About Us</a>
                                    <a class="nav-link" href="contactus.php">Contact Us</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product2" aria-expanded="false" aria-controls="product2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="all-order.php">All Order</a>
                                    <a class="nav-link" href="new-order.php">New Order</a>
                                    <a class="nav-link" href="confirm-order.php">Confirm Order</a>
                                    <a class="nav-link" href="pickup-order.php">Order Pickup</a>
                                    <a class="nav-link" href="ontheway-order.php">On the way</a>
                                    <a class="nav-link" href="delivered-order.php">Delivered Order</a>
                                    <a class="nav-link" href="cancelled-order.php">Cancelled Order</a>
                                </nav>
                            </div>
 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subcat1" aria-expanded="false" aria-controls="subcat1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Review
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="subcat1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="all-reviews.php">All Reviews</a>
                                    <a class="nav-link" href="new-reviews.php">New Reviews</a>
                                    <a class="nav-link" href="approved-reviews.php">Accept Reviews</a>
                                    <a class="nav-link" href="unapproved-reviews.php">Reject Reviews</a>
                                </nav>
                            </div>
                           
           
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Enquiry
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="readenq.php">Read Enquiry</a>
                                    <a class="nav-link" href="unreadenq.php">Unread Enquiry</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Report
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="bwdates-report-ds.php">B/w Dates</a>
                                    <a class="nav-link" href="requestcount-report-ds.php">Order Count</a>
                                    <a class="nav-link" href="sales-reports.php">Sales Reports</a>
                                </nav>
                            </div>
                          
                            <a class="nav-link" href="search-order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                                Search Order
                            </a>
                             <a class="nav-link" href="reg-users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Reg Users
                            </a>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>