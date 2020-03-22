<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    @if($menu_id == 1)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="icon_house_alt"></i>
                    <span>Gestion des clients</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Pistes et opportunités</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="form_component.html">Piste de ventes</a></li>
                    <li><a class="" href="form_validation.html">Opportunités de vente</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-user"></i>
                    <span>Clients</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('clients.create', $menu_id)}}">Nouveau client</a></li>
                    <li><a class="" href="{{route('clients.index', $menu_id)}}">Nos clients</a></li>
                    <li><a class="" href="grids.html">Clients supprimés</a></li>
                </ul>
            </li>
        </ul>
    @endif
    @if($menu_id == 2)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="icon_house_alt"></i>
                    <span>Facturation & <br>Encaissement</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Facturation</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="form_component.html">Nouvelle Facture</a></li>
                    <li><a class="" href="{{route('factures.redevances', $menu_id)}}">Redevances</a></li>
                    <li><a class="" href="form_validation.html">Les Devis</a></li>
                    <li><a class="" href="form_validation.html">Factures Annulées</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-money"></i>
                    <span>Encaissements</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="buttons.html">Nouvel encaissement</a></li>
                    <li><a class="" href="{{route('paiements.index', $menu_id)}}">Liste des encaissements</a></li>
                    <!--<li><a class="" href="buttons.html">Nos clients</a></li>
                    <li><a class="" href="grids.html">Clients supprimés</a></li>-->
                </ul>
            </li>
        </ul>
    @endif
    @if($menu_id == 3)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="icon_house_alt"></i>
                    <span>Gestion des Souscriptions</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('souscriptions.index', $menu_id)}}" class="">
                    <i class="icon_document_alt"></i>
                    <span>Les souscriptions</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('souscriptions.suspensions', $menu_id)}}" class="">
                    <i class="icon_document_alt"></i>
                    <span>Souscriptions Suspendues</span>
                </a>
            </li>
        </ul>
    @endif
    @if($menu_id == 4)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="icon_house_alt"></i>
                    <span>Gestion des Installations</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Planifier installations</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('planifications.create', $menu_id)}}">Planifier</a></li>
                    <li><a class="" href="{{route('planifications.index', $menu_id)}}">Liste Planification</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{route('installations.index', $menu_id)}}" class="">
                    <i class="fa fa-wrench"></i>
                    <span>Gestion des parametres</span>
                </a>
            </li>
        </ul>
    @endif
    @if($menu_id == 5)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="icon_house_alt"></i>
                    <span>Services & <br>Produits</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Gestion des services</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('services', $menu_id)}}">Services</a></li>
                    <li><a class="" href="form_validation.html">Types services</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-cubes"></i>
                    <span>Gestion des produits</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('produits', $menu_id)}}">Produits</a></li>
                    <li><a class="" href="general.html">Type de produits</a></li>
                    <!--<li><a class="" href="buttons.html">Nos clients</a></li>
                    <li><a class="" href="grids.html">Clients supprimés</a></li>-->
                </ul>
            </li>
        </ul>
    @endif
    @if($menu_id == 6)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i>
                    <span>Ressources Humaines</span>
                </a>
            </li>
            <li>
                <a href="{{route('postes.create', $menu_id)}}" class="">
                    <i class="fa fa-edit"></i>
                    <span>Postes</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-user"></i>
                    <span>Gestion des employés</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('employe.create', $menu_id)}}">Nouvel employé</a></li>
                    <li><a class="" href="{{route('employe', $menu_id)}}">Les employés</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-list"></i>
                    <span>Salaires et congés</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('salaire', $menu_id)}}">Salaires</a></li>
                    <li><a class="" href="{{route('conges', $menu_id)}}">Congés</a></li>
                    <!--<li><a class="" href="grids.html">Clients supprimés</a></li>-->
                </ul>
            </li>
        </ul>
    @endif
    @if($menu_id == 7)
        <ul class="sidebar-menu">
            <li class="active">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i>
                    <span>Comptes Utilisateurs</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-user"></i>
                    <span>Gestion utilisateurs</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('users.create', $menu_id)}}">Nouvel Utilisateur</a></li>
                    <li><a class="" href="{{route('users', $menu_id)}}">Les utilisateurs</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-list"></i>
                    <span>Gestion des profils</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('profiles', $menu_id)}}">Liste des profils</a></li>
                    <!--<li><a class="" href="grids.html">Clients supprimés</a></li>-->
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_cogs"></i>
                    <span>Gestion des Modules</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('modules', $menu_id)}}">Liste des modules</a></li>
                    <li><a class="" href="{{route('submodules', $menu_id)}}">Liste des sous-modules</a></li>
                </ul>
            </li>
        </ul>
    @endif
    <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->