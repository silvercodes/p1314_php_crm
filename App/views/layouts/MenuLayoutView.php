<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= HOME_PAGE ?>">CRM</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?= HOME_PAGE ?>">Home</a>
                </li>
            </ul>
        </div>

        <div class="navbar-nav">
            <span class="h-5 text-success">You is logged in as <b><?= $authUser->email ?></b></span>
            <a href="/logout" class="btn btn-outline-success mx-4">Logout</a>
        </div>
    </div>
</nav>
