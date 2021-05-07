<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(images/hero-header.png);background-position:right top;background-size:contain;">
    </div>

    <div class="bg-holder d-md-none"
        style="background-image:url(images/hero-bg.png);background-position:right top;background-size:contain;">
    </div>

    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">La tu mets ton texte et tout</h1>
                <p class="mb-4 fs-1">Tu mets du texte tralala etc...</p><a class="btn btn-lg btn-success" href="#"
                    role="button">Découvrir mes formations!</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5" id="who">
    <div class="bg-holder d-none d-sm-block"
        style="background-image:url(images/bg.png);background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto text-center mb-3">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Qui sommes nous?</h5>
                <p class="mb-5">Nous sommes des formateurs de qualité, prêt à partager notre savoir immense.</p>
            </div>
        </div>
        <div class="row flex-center h-100">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                            <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                    src="images/farmer.svg" height="60" alt="" />
                                <div class="card-body">
                                    <h6 class="fw-bold fs-1 heading-color">Des travailleurs acharnés</h6>
                                    <p class="mt-3 mb-md-0 mb-lg-2">Le week end, nous plantons les tomates. La semaine?
                                        Nous vous distrayons avec du contenu de qualité.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                            <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                    src="images/growth.svg" height="60" alt="" />
                                <div class="card-body">
                                    <h6 class="fw-bold fs-1 heading-color">Attente de vos objectifs</h6>
                                    <p class="mt-3 mb-md-0 mb-lg-2">Nous vous permettons de réaliser vos rêves!.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                            <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                    src="images/planting.svg" height="60" alt="" />
                                <div class="card-body">
                                    <h6 class="fw-bold fs-1 heading-color">Nous aimons la nature</h6>
                                    <p class="mt-3 mb-md-0 mb-lg-2">Ne jamais oublier d'où l'on vient 😄</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-0" id="contact">
    <div class="bg-holder"
        style="background-image:url(images/how-it-works.png);background-position:center bottom;background-size:cover;">
    </div>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
                <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">Contactez-nous</h5>
                <p class="mb-5 text-white">Une question? Vous êtes au bon endroit.</p>
            </div>
            <div class="col-sm-9 col-md-12 col-xxl-9">
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Nom</label>
                    <input type="text" id="name" placeholder="Entrez votre nom" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Email</label>
                    <input type="email" id="email" placeholder="Entrez votre email" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Message</label>
                    <textarea id="content" placeholder="Votre message" class="form-control mb-5"></textarea>
                </div>
                <div class="alert alert-success" role="alert" style="display: none;" id="mail-sent-alert">
                    Message envoyé!
                </div>
                <div class="form-group mb-4 text-center">
                    <button class="btn btn-lg btn-dark bg-gradient order-0" onclick="sendMessage()">Envoyer mon
                        message</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/home/home.js"></script>
