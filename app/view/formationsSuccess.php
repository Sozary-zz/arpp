<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(images/hero-header.png);background-position:right top;background-size:contain;">
    </div>

    <div class="bg-holder d-md-none"
        style="background-image:url(images/hero-bg.png);background-position:right top;background-size:contain;">
    </div>

    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center"  style="z-index: 2;">
                <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Formations</h1>
                <p class="mb-4 fs-1">Mes formations servent à ...</p><a class="btn btn-lg btn-success" href="#events"
                    role="button">Découvrir mes formations!</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5" id="events">
    <div class="bg-holder d-none d-sm-block"
        style="background-image:url(images/bg.png);background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto text-center mb-3">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Formations</h5>
                <p class="mb-5">Liste des formations à venir.</p>
            </div>
        </div>
        <div class="row flex-center h-100">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-md-4 mb-5" foreach="formations" style="cursor:pointer" onclick="subscribe(this)">
                        <span foreach-value="id" class="subscribe-id" style="display: none"></span>
                        <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                            <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                    src="images/formation.svg" height="60" alt="" />
                                <div class="card-body">
                                    <h6 class="fw-bold fs-1 heading-color" foreach-value="name"></h6>
                                    <p class="mt-3 mb-md-0 mb-lg-2">Date: <span foreach-value="date"></span></p>
                                    <p class="mt-3 mb-md-0 mb-lg-2">Places restantes: <span foreach-value="availablePlaces" class="available-places"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/event/formations.js"></script>
