<aside class="aside-menu">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#favorites" role="tab">
        <i class="icon-star"></i>
      </a>
        </li>
    </ul>
    <!-- Tab panes-->
    <div class="tab-content">
        <div class="tab-pane active" id="favorites" role="tabpanel">
            <div class="list-group list-group-accent">
                <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Favorites</div>

                <favorites-menu :favorites="{{ $favorites }}"></favorites-menu>

            </div>
        </div>
    </div>
</aside>