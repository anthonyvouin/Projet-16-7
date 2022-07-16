 <div class="container-fluid page-body-wrapper">
     <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
         <ul class="nav">
             <li class="nav-item">
                 <a class="nav-link" href="/auth">
                     <i class="mdi mdi-home menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                     <i class="mdi mdi-circle-outline menu-icon"></i>
                     <span class="menu-title">Catégorie</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="ui-basic">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Ajouter </a></li>
                         <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Gérer</a></li>
                     </ul>
                 </div>
             </li>

             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                     <i class="mdi mdi-circle-outline menu-icon"></i>
                     <span class="menu-title">Sous-catégorie</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="ui-basic1">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.create')}}">Ajouter </a></li>
                         <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.index')}}">Gérer</a></li>
                     </ul>
                 </div>
             </li>


             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                     <i class="mdi mdi-circle-outline menu-icon"></i>
                     <span class="menu-title">Catégorie enfant</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="ui-basic2">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.create')}}">Ajouter </a></li>
                         <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.index')}}">Gérer</a></li>
                     </ul>
                 </div>
             </li>




             <li class="nav-item">
                 <a class="nav-link" href="{{route('all.ads')}}">
                     <i class=" mdi mdi-view-headline menu-icon
                     "></i>
                     <span class="menu-title">Toutes les annonces</span>
                 </a>
             </li>
      
         </ul>
     </nav>