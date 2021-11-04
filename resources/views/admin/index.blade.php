<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admin/dataTables.bootstrap4.min.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admin/sb-admin-2.min.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/orderlist.css')?>" >
    
   
</head>

    



<body id="page-top">
        <script  src="http://code.jquery.com/jquery-latest.min.js" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/js.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/jquery.easing.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/jquery.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/sb-admin-2.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/jquery.dataTables.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/jquery.dataTables.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/bootstrap.bundle.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/dataTables.bootstrap4.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/admin/datatables-demo.js') }}" defer></script>
    
    

    <div id="wrapper">


        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">


            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminmain">
                <div class="sidebar-brand-icon rotate-n-15">

                    <i class="fas fa-fw fa-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">JAEHYUKSHOP <sup>adminpage</sup></div>
            </a>


            <hr class="sidebar-divider my-0">


            <li class="nav-item">
                <a class="nav-link" href="/adminmain">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>SHOP</span></a>
            </li>


            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Interface
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>판매글</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="/goodsupload">업로드</a>
                        <a class="collapse-item" href="/goodsmgm">관리</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-table"></i>
                    <span>주문현황</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">total:</h6>
                        <a class="collapse-item" href="/orderlist">전체보기</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">category:</h6>
                        <a class="collapse-item" href="/orderlist/1">배송준비</a>
                        <a class="collapse-item" href="/orderlist/2">배송중</a>
                        <a class="collapse-item" href="/orderlist/3">배송완료</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cateadd">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>카테고리관리</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="/orderlist">
                    <i class="fas fa-fw fa-table"></i>
                    <span>회원관리</span></a>
            </li>
          

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                  
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
 
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                       
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                
                            </a>
                            
                        </li>

                    </ul>

                </nav>

        <div class="container-fluid">




            <!-- 오늘수입 -->

            <?php $totalPrice = 0;?> 
            <?php $king = 0;?>
            <?php $count = 0;?>
            <?php $totalcnt = 0; ?>
            <?php $completion = 0; ?>
            <?php $ing = 0; ?>
            <?php $ready = 0; ?>
         @foreach ($orders as $order )
            <?php
                $king++;
                $time = $order->created_at;
                $cut = substr($time,0,10);
                if($cut == date("Y-m-d")){
                    $totalPrice += $order->amount; 
                    $count++;
                }
            ?>
         @endforeach

         @foreach ($orders as $order )
            @if($order->orderstate == '배송완료')
            @continue
            @endif
            <?php $totalcnt++; ?>
        @endforeach

        @foreach ($orders as $order )
            @if($order->orderstate == '배송완료')
            <?php $completion++; ?>
            @endif  
            @if($order->orderstate == '배송중')
            <?php $ing++; ?>
            @endif 
            @if($order->orderstate == '배송준비')
            <?php $ready++; ?>
            @endif  
        @endforeach

        <?php 
        if($king >= 1){
            $readys = $ready/$king*100;
            $ings = $ing/$king*100;
            $completions = $completion/$king*100;
        }
        ?>
        

     
          <!-- 오늘수입 -->
       
            <div class="row">


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        당일 매출</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPrice) }}원</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        당일 주문</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}건</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">배송완료
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                @if(isset($completions))
                                                {{ floor($completions) }}%
                                                @else
                                                0%
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 
                                                    @if(isset($completions))
                                                    {{ floor($completions) }}%
                                                    @else
                                                    0%
                                                    @endif
                                                    " aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        전체 주문 건수(배송완료 제외)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalcnt }}건</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 
                       
                   

            <div class="row" >
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4"  id="projectgage">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">업무 현황</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">배송 준비<span
                                    class="float-right">
                                                @if(isset($readys))
                                                {{ floor($readys) }}%
                                                @else
                                                0%
                                                @endif
                                </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 
                                                @if(isset($readys))
                                                {{ floor($readys) }}%
                                                @else
                                                0%
                                                @endif
                                                "
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">배송중 <span
                                    class="float-right">
                                                @if(isset($ings))
                                                {{ floor($ings) }}%
                                                @else
                                                0%
                                                @endif
                                    </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 
                                                @if(isset($ings))
                                                {{ floor($ings) }}%
                                                @else
                                                0%
                                                @endif
                                                "
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">배송 완료 <span
                                    class="float-right">
                                                @if(isset($completions))
                                                {{ floor($completions) }}%
                                                @else
                                                0%
                                                @endif
                                    </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width:
                                                @if(isset($completions))
                                                {{ floor($completions) }}%
                                                @else
                                                0%
                                                @endif
                                                "
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>                        
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>


</div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>




</body>
</html>