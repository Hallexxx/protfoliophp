<html lang="en">
    <body>
        <nav class="navbar">
            <div class="logo">Alexandre Perez</div>
            <ul class="nav-list">
                <li class="menu-deroulant"><a href="/">Accueil</a></li>
                <li class="menu-deroulant"><a href="#">Mon CV</a>
                    <ul class="sous">
                        <li><a href="img/Alex.pdf"><span class="hover-underline-animation">CV</span></a></li>
                        <li><a href="img/perez.pdf"><span class="hover-underline-animation">Motivation</span></a></li>
                    </ul>
                </li>
                <li class="menu-deroulant"><a href="/blog">Blog</a></li>
                <li class="menu-deroulant"><a href="/contact">Contact</a></li>

                <svg display="none">
                    <symbol id="light" viewBox="0 0 24 24">
                        <g stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(0,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(45,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(90,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(135,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(180,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(225,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(270,12,12)" />
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(315,12,12)" />
                        </g>
                        <circle fill="currentColor" cx="12" cy="12" r="5" />
                    </symbol>
                    <symbol id="dark" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.1,14.9c-3-0.5-5.5-3-6-6C8.8,7.1,9.1,5.4,9.9,4c0.4-0.8-0.4-1.7-1.2-1.4C4.6,4,1.8,7.9,2,12.5c0.2,5.1,4.4,9.3,9.5,9.5c4.5,0.2,8.5-2.6,9.9-6.6c0.3-0.8-0.6-1.7-1.4-1.2C18.6,14.9,16.9,15.2,15.1,14.9z" />
                    </symbol>
                </svg>
                <label class="switch">
                    <input class="switch__input" type="checkbox" role="switch" name="dark" />
                    <svg class="switch__icon" width="100px" height="100px" aria-hidden="true">
                        <use href="#light" />
                    </svg>
                    <svg class="switch__icon" width="100px" height="100px" aria-hidden="true">
                        <use href="#dark" />
                    </svg>
                    <span class="switch__inner"></span>
                    <span class="switch__inner-icons">
                        <svg class="switch__icon" width="100px" height="100px" aria-hidden="true">
                            <use href="#light" />
                        </svg>
                        <svg class="switch__icon" width="100px" height="100px" aria-hidden="true">
                            <use href="#dark" />
                        </svg>
                    </span>
                </label>
            </ul>
        </nav>
    </body>
</html>

