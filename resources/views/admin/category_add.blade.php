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


    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admin/sb-admin-2.min.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/category.css')?>" >
    
   
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
    
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous" defer>
    </script>
    

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
                <a class="nav-link" href="/cateadd">
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

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                
                            </a>
                            
                        </li>

                    </ul>

                </nav>

                <div class="categoryBox">

                    <div class="mainCategory"> 
                        <center><div class="mainCategoryTitle"><b>카테고리</b></i></div></center>

                        <div class="mainCategoryList">
                            @foreach ($category as $categorys)
                                <div id = "{{ $categorys->id }}" class="categoryname"onclick="clickCategory(this.id)">{{ $categorys->category1_name }}</div>
                                <div class="categoryDel" data-code = "1" data-idx="{{ $categorys->id }}" data-toggle="modal" data-target="#exampleModal">                                    
                                    <i class="fas fa-backspace "></i>
                                </div>
                            @endforeach
                        </div>
                        
                            
                            <div class="catadd_div">
                                <input type="text" class="catadd_input">
                                <button class="cat_result" onclick="addMainCategory()">추가</button>
                            </div> 
                    </div> 
                </div>       

                <center><div class="categoryborder"></div></center>
                 

                    <div class="secondCategory"> 
                        <div class="secondCategoryTitle"></div>
                            <div id="secondCategoryDiv"></div> 
                                <div class="cataddd_div">
                                    <input type="text" class="catadd2_input">
                                    <input type="hidden" id = "chgvalue">
                                <button class="cat2_result" onclick="addSeconderyCategory()">추가</button>
                        </div>
                     </div>

                



                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">게시물 삭제</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              카테고리를 정말 삭제하시겠습니까?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="delmodal"data-dismiss="modal">삭제하기</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">취소하기</button>
                            </div>
                          </div>
                        </div>
                      </div>
</div>


</div>




</div>
</body>
</html>