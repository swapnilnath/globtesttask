<header>
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="top-whatsapp"></div>
            </div>
            <div class="ht-right">
                @auth

                <div class="dropdown home-notification">

                </div>

                @endauth
                @guest
                    <div class="dropdown home-account">
                        <a href="#login-modal" data-toggle="modal" class="btn" style="color: #fff; margin-right:-13px;">Login</a>
                    </div>
                @endguest



            </div>
        </div>
    </div>

