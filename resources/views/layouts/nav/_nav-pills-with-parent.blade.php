<div class="mout-tab-pane active" id="main">
    <h5 class="mout-tab-title">Dashboard</h5>
    <ul class="nav nav-pills nav-stacked nav-quirk">
        <li>
            <a href="{{ route('homeAdmin') }}">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-chart-line"></i>
                <span>Suivi CA</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Navigation</span>
            </a>
        </li>
    </ul>
    <h5 class="mout-tab-title">Menus</h5>
    <ul class="nav nav-pills nav-stacked nav-quirk">

        @can('clients.index')
        <li class="nav-parent">
            <div class="nav-parent-container">
                <i class="far fa-user-crown"></i>
                <span>Clients</span>
            </div>
            <ul class="nav-children">
                <li>
                    <a href="{{ route('clients.index') }}">
                        Voir tous
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('devis.index')
        <li class="nav-parent">
            <div class="nav-parent-container">
                <i class="fal fa-file-invoice-dollar"></i>
                <span>Devis</span>
            </div>
            <ul class="nav-children">
                <li>
                    <a href="">
                        Voir tous
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        <li class="nav-parent">
            <div class="nav-parent-container">
                <i class="fal fa-file-invoice-dollar"></i>
                <span>Réalisations</span>
            </div>
            <ul class="nav-children">
                <li>
                    <a href="{{ route('projects.index') }}">
                        Voir tous
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-parent">
            <div class="nav-parent-container">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </div>
            <ul class="nav-children">
                <li>
                    <a href="{{ route('profiles.show') }}">
                        Compte utilisateur
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}">
                        Prestations
                    </a>
                </li>
                <li>
                    <a href="{{ route('skills.index') }}">
                        Compétences
                    </a>
                </li>
                <li>
                    <a href="{{ route('taxes.index') }}">
                        Taxes
                    </a>
                </li>
            </ul>
        </li>

{{--        <li class="nav-parent">--}}
{{--            <div class="nav-parent-container">--}}
{{--                <i class="fas fa-cog"></i>--}}
{{--                <span>Langues</span>--}}
{{--            </div>--}}
{{--            <ul class="nav-children">--}}
{{--                <li>--}}
{{--                    <a href="">logout--}}

{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        Langues 2--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        Langues 3--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        Langues 4--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}
</div>

<div class="mout-tab-pane" id="mail">
    <h5 class="mout-tab-title">Emails</h5>
    <ul class="nav nav-pills nav-stacked nav-quirk">
        <li class="nav-parent">
            <a href="">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
            <ul class="nav-children">
                <li>
                    <a href="">
                        Param 1
                    </a>
                </li>
                <li>
                    <a href="">
                        Param 2
                    </a>
                </li>
                <li>
                    <a href="">
                        Param 3
                    </a>
                </li>
                <li>
                    <a href="">
                        Param 4
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
