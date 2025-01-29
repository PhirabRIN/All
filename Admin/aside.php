<div class="containers">
        <aside>
            <div class="menu">
                <p>INFORMATION</p>
                <ul>
                    <li ><a href="dashboard.php" id="news"><i class="fa-solid fa-list me-2"></i>ព័ត៌មាន</a></li>
                    <li><a href="sales.php" id="sale"><i class="fa-solid fa-cart-shopping me-2"></i>ការលក់</a></li>
                    <li id="product"><a href="#"><i class="fa-solid fa-shop me-2"></i>ផលិតផល</a>
                        <div class="w-100 popup-menu">
                            <ul>
                                <li id="add-post"><a href="addProduct.php">Add Post</a></li>
                                <li id="view-post"><a href="allProduct.php">View Post</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="staff.php" id="staff"><i class="fa-solid fa-users me-2"></i>អ្នកប្រើប្រាស់</a></li>
                    <li id="account"><a href="#" ><i class="fa-solid fa-user me-2"></i>គណនី</a>
                        <div class="w-100 popup-menu">
                            <ul>
                                <li id="logout"><a href="#">ចាកចេញ</a></li>
                            </ul>
                        </div>
                    </li>
                   
                </ul>
            </div>
        </aside>
        <main>
            <div class="header">
                <div class="search">
                    <input type="search" name="" id="" placeholder="what do you want to find?">
                    <button>Search</button>
                </div>
                <div class="user">
                    <nav class="navbar  navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Empty Page</a></li>
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Search Results</a></li>
                                        <li><a class="dropdown-item" href="#">Timeline</a></li>
                                        <li><a class="dropdown-item" href="#">Invoices</a></li>
                                        <li><a class="dropdown-item" href="#">Pricing</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="nav-item dropdown" >
                                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Auth</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Login</a></li>
                                        <li><a class="dropdown-item" href="#">Register</a></li>
                                        <li><a class="dropdown-item" href="#">Forgot Password</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">404 error</a></li>
                                        <li><a class="dropdown-item" href="#">500 error</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-translate"></i></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-envelope position-relative">
                                    <span class="position-absolute top-0 start-100 translate-middle bg-danger border border-light rounded-circle i">
                                        <span class="visually-hidden">New alerts</span>
                                      </span>
                                </i></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bell-fill position-relative">
                                    <span class="position-absolute top-0 start-100 translate-middle bg-danger border border-light rounded-circle i">
                                        <span class="visually-hidden">New alerts</span>
                                      </span>
                                </i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <script>
    $(document).ready(function(){
     
        $('#product').click(function(){
            $(this).find('.popup-menu').slideToggle() 
        })
        $('#account').click(function(){
            $(this).find('.popup-menu').slideToggle()
        })
        $('#logout').click(function(){
            if(confirm('Do you want to logout?')){
                window.location.href='logout.php'
            }
        })

    })
</script>