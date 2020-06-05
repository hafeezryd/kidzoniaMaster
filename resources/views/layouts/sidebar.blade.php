

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
               <a href="{{route('parents.dashboard')}}"> <img src="{{asset('images/1.png')}}" style="width: 100%"></a>
            </div>
            
            <ul class="list-unstyled components">
            @if(Auth::user()->role_id == 1)
                <li>
                    <a href="{{route('admin.student.index')}}">Student Info</a>
                </li>
                <li>
                    <a href="{{route('admin.monththeme.index')}}">Month Theme</a>

                </li>
                <li>
                    <a href="{{route('admin.dayplan.index')}}">Day Plan</a>
                </li>

            @else
                
                <li>
                    <a href="{{route('parents.studentinfo.index')}}">Student Info</a>
                </li>
                <li>
                    <a href="{{route('parents.monththeme')}}">Month Theme</a>
                </li>
                <li>
                    <a href="{{route('parents.dayplan')}}">Day Plan</a>
                </li>

            @endif
                
                <li>
                    <a href="#">Activity</a>
                </li>


                <li>


                @if(Auth::user()->role_id == 1)
                <li>
                            <a href="{{route('admin.classwork.index')}}">Classwork</a> 
                    </li>
               @endif
               @if(Auth::user()->role_id != 1)
               <a href="#classworkSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Classwork</a>
                    <ul class="collapse list-unstyled" id="classworkSubmenu">
                     
                    <li>
                          <a href="{{url('parents/classwork/English')}}">English</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/classwork/Maths')}}">Maths</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/classwork/EVS')}}">EVS</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/classwork/GK')}}">GK</a> 
                    </li>
                    </ul>
                </li>
                @endif
                <li>
                @if(Auth::user()->role_id == 1)
                    <li>
                            <a href="{{route('admin.homework.index')}}">Homework</a> 
                    </li>
               @endif
               @if(Auth::user()->role_id != 1)
                <a href="#homeworkSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Homework</a>
                    <ul class="collapse list-unstyled" id="homeworkSubmenu">
                    <li>
                          <a href="{{url('parents/homework/English')}}">English</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/homework/Maths')}}">Maths</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/homework/EVS')}}">EVS</a> 
                    </li>
                    <li>
                        <a href="{{url('parents/homework/GK')}}">GK</a> 
                    </li>
                    </ul>
                
                </li>
                @endif
                <li>
                    <a href="{{url('parents/fees')}}">Fees</a>
                </li>

                
            </ul>

            <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                          
                           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')

        <!-- </div> -->
    </div>


@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
            
        });
    </script>
    @yield('script-additional')
@endsection
