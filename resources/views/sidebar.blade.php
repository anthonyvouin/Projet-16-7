  <div class="card">

      <div class="card-body">
          @if(!auth()->user()->avatar)
          <img class="mx-auto d-block img-thumbnail" src="/img/man.jpg" width="130">
          @endif
          @if(auth()->user()->avatar && !auth()->user()->fb_id)
          <img src="{{Storage::url(auth()->user()->avatar)}}" style="width:100%;">
          @endif
          @if(auth()->user()->fb_id)
          <img src="{{auth()->user()->avatar}}" style="width:100%;">
          @endif
          <p class="text-center"><b>{{auth()->user()->name}}</b></p>
      </div>

      <div class="vertical-menu">
          <a href="">Tableau de bord</a>
          <a href="{{route('profile')}}" class="{{request()->is('profile')?'active':''}}"><i class="fas fa-user"></i> Profil</a>
          <a href="{{route('ads.create')}}" class="{{request()->is('ads/create')?'active':''}}"><i class="fas fa-cloud-upload-alt"></i> Créer une annonce</a>
          <a href="{{route('ads.index')}}" class="{{request()->is('ads')?'active':''}}"><i class="fas fa-images"></i> Publier une annonce</a>
          <a href="{{route('pending.ad')}}" class="{{request()->is('ad-pending')?'active':''}}">Annonces en attentes</a>
          <a href="{{route('saved.ad')}}" class="{{request()->is('saved-ads')?'active':''}}">Annonces sauvegarder</a>

          <a href="{{route('messages')}}" class="{{request()->is('messages')?'active':''}}">Message</a>


      </div>
  </div>