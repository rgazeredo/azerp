<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        {{-- <li>
            <a href="javascript:;.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="side-menu-light-dashboard-overview-1.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 4 </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li>
            <a href="{{ route('users.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Usuários </div>
            </a>
        </li>
        <li>
            <a href="{{ route('sectors.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Setores </div>
            </a>
        </li>
        <li>
            <a href="{{ route('wallets.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Carteira de Clientes </div>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.statuses.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Status do Cliente </div>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.profiles.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Perfil do Cliente </div>
            </a>
        </li>
        <li>
            <a href="{{ route('customer-personals.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Clientes </div>
            </a>
        </li>
        <li>
            <a href="{{ route('lines.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Linha </div>
            </a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Categorias </div>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Produtos </div>
            </a>
        </li>
        {{-- <li class="side-nav__devider my-6"></li>
        <li>
            <a href="side-menu-light-inbox.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title"> Inbox 2</div>
            </a>
        </li> --}}
    </ul>
</nav>
<!-- END: Side Menu -->
