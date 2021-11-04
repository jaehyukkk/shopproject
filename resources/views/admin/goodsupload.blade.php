<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous" defer>
    </script>
   

    <script type="text/javascript" src="{{ URL::asset('/ckeditor/ckeditor.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('/ckeditor/adapters/jquery.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('/js/js.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/admin/sb-admin-2.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/admin/bootstrap.bundle.min.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- <link href="{{ URL::asset('js/ckeditor/samples/css/samples.css') }}" rel="stylesheet"> --}}
    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admin/dataTables.bootstrap4.min.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admin/sb-admin-2.min.css')?>" >
   
</head>


<body id="page-top">

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
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
                {{-- <i class="fas fa-plus-circle" id="plusIcon"> --}}

                    @if (count($errors) > 0)
                    <div class="alert-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    
                  <form method="post" action="/goodsupload" enctype="multipart/form-data">
                    @csrf
                      <div class="container" id="goods_upload_form">
                          <div class="content" style="width: 80%">
                          
                              <div class="row justify-content-md-center">
                                  <div class="col-sm-9">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <label class="input-group-text">제목</label>
                                        </div>            
                                        <input type="text" class="form-control" name ="goods_title">              
                                      </div>
                  
                  
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">색상</label>
                                          </div>            
                                          <input type="text" class="form-control" name ="goods_color[]">  
                                          <button id="add_btn" class="btn btn-primary" onclick="colorAdd()">컬러 추가</button>            
                                        </div>
                  
                                        <div class="append"></div>
                  
                  
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">가격</label>
                                          </div>            
                                          <input type="text" class="form-control" name ="goods_price">              
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <label class="input-group-text">사이즈</label>
                                            </div>            
                                            <input type="text" class="form-control" name ="size">              
                                          </div>
                                          <div class="row justify-content-md-center">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">메인 사진</span>
                                              </div>
                                              <div class="custom-file">
                                                <input id="profile_image" type="file" name="mainphoto_name" multiple>
                                              </div>
                                            </div>
                                      </div>
                            
                                      <div class="row justify-content-md-center">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">서브 사진</span>
                                          </div>
                                          <div class="custom-file">
                                            <input id="profile_image" type="file" name="contentphoto_name[]" multiple>
                                          </div>
                                        </div>
                                  </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="input-group mb-3">
                                          <select class="category1" id="category1" name = "ca_id" onchange ="OpenSeconderyCategory()">
                                           
                                          <option selected>카테고리</option>
                                          @foreach ($cat as $cats )
                                          <option class = "cat_option" value="{{ $cats->id }}">{{ $cats->category1_name }}</option>
                                          @endforeach
                                          
                                        </select> 
                  
                                        
                                        
                                        <select class="category2" id="category2" name="ca_id2" >
                                          <option  id = "cat2_option" selected>2차분류</option>            
                                        </select>  
                                      </div>
                                  </div>  
                                            
                            </div>
                            
                            <hr>
                            
                            <div class="row justify-content-md-center">
                                <div class="col_c" style="margin-bottom: 30px">
                                      <div class="input-group">                 
                                        <textarea class="form-control" id="editor4" name = "goods_description"></textarea>
                                        <script>
                                        $( document ).ready( function() {
                                          $( 'textarea#editor4' ).ckeditor();
                                      } );
                                      </script>
                                      </div>
                                  </div> 
                            </div>
                  
                            <div class="row justify-content-md-center">
                              <button type="submit" class="btn btn-outline-secondary" style="width: 20%; font-weight: bold">
                                   등   록          
                                  </button>
                              </div>
                        </div>
                      </div>
                    </form>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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