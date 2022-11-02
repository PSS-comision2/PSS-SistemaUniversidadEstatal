<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <ul class="menu menu-horizontal p-0">
                <li tabindex="0">
                    <a>
                        Operaciones
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a>Operacion 1</a></li>
                        <li><a>Operacion 2</a></li>
                        <li><a>Operacion 3</a></li>
                        <li><a>Operacion 4</a></li>
                        <li><a>Operacion 5</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost normal-case text-2xl">Universidad Estatal</a>
    </div>
    <div class="navbar-end ">
        <ul class="menu menu-horizontal p-0">
            <li tabindex="0">
                <a>
                    Rodrigo Perez
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24">
                        <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </a>
                <ul class="btn btn-outline">
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            <a href="javascript:;" class=""
                                onclick="document.getElementById('logout-form').submit();">
                                <span class=" ">Cerrar sesión</span>
                            </a>
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
