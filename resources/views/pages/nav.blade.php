 <div class="container">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

                
        <a class="navbar-brand" href="{{ url('/') }}">
            E-learning
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        @if(Auth::check())
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
                    
        @endif
        </ul>
                               
           
         @if (auth()->check())
         <form role="form" action="/timkiem" method="post" class="navbar-form navbar-left">
                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                    <div class="form-group">
                        <input type="text" name="tukhoa" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default ">Submit</button>
                </form>
        @endif 
               
        <ul class="nav navbar-nav navbar-right">
            @if (auth()->check())
            
            <!-- <li style="position: relative; "><a href="{{ url('/forum/list') }}">Forum</a></li> -->
           
             
                  @if(Auth::user()->role >= 1)
                    
                <li style="margin-right: 20px; position: relative; padding-left: 50px;"><a href="{{ url('/quantri') }}">Management</a></li>
                 @endif
            @endif
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
          <li>
                    <a href="{{ url('/profile') }}"  style="position: relative; padding-left: 50px;">
                        <img src="{{ Auth::user()->avatar }}" style="width:32px; height: 32px; position: absolute; top:10px; left:10px; border-radius: 50%;">
                                {{ Auth::user()->name }}
                    </a>
                </li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout
                    </a>
                </li>
                               
        </ul>
    </li>
            @endif
    </ul>
               
    </div>
</div>