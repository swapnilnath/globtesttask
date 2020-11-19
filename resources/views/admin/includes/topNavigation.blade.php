<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary bars" href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>                
                <li>
                    <a href="{{ route('admin.logout') }}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
    <style type="text/css">
       .bars{background-color: #0e4373; border-color: #0e4373;}
       .bars:hover{background-color: #f15f39; border-color: #f15f39;}
       .bars:not(:disabled):not(.disabled):active, .bars:not(:disabled):not(.disabled).active, .show > .bars.dropdown-toggle{background-color: #f15f39; border-color: #f15f39;}
       .bars:focus{background-color: #f15f39; border-color: #f15f39;}
   </style>
