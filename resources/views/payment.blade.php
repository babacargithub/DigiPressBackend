
<!DOCTYPE html>

<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="XGA4nPnmOsWTFw9ARQNP7qbY1o018krAkWh5QNe9" />
    <title>Recharger mon compte DigiPress Sénégal</title>


    <link rel="stylesheet" type="text/css" href="https://app.digipress.pro/packages/backpack/base/css/bundle.css?v=5.3.6@d3883292d8ba66515ca767e2f2210fa8f4f8968a">
    <link rel="stylesheet" type="text/css" href="https://app.digipress.pro/packages/source-sans-pro/source-sans-pro.css?v=5.3.6@d3883292d8ba66515ca767e2f2210fa8f4f8968a">
    <link rel="stylesheet" type="text/css" href="https://app.digipress.pro/packages/line-awesome/css/line-awesome.min.css?v=5.3.6@d3883292d8ba66515ca767e2f2210fa8f4f8968a">


    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>



    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="app aside-menu-fixed sidebar-lg-show">

<header class="app-header navbar navbar-color bg-error border-4">

    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto ml-3" type="button" data-toggle="sidebar-show" aria-label="Afficher/masquer la navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="https://app.digipress.pro/admin" title="DigiPress Sénégal">
        <b>DigiPress</b>Sénégal
    </a>

    <ul class="nav navbar-nav d-md-down-none">
    </ul>

</header>

<div class="app-body">

    <div class="sidebar sidebar-pills bg-dark">

        <nav class="sidebar-nav overflow-hidden">

        </nav>

    </div>



    <main class="main pt-2">

        <section class="content-header">
            <div class="container-fluid mb-3">
                <h3>Recharger mon compte Digi Press</h3>
            </div>
        </section>

        <div class="container-fluid animated fadeIn">


            <div class="row">


                <div class="col-lg-8">
                    <form class="form" action="https://app.digipress.pro/payment" method="post">

                        <div class="card padding-10">

                            <div class="card-header">
                                Modifier mon compte
                            </div>

                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required">Montant</label>
                                        <input required class="form-control" type="number" name="montant" value="0">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="required">Methode de paiement</label>
                                        <label class="required">Wave</label>
                                        <input type="radio" />
                                        <label class="required">Orange Money</label>
                                        <input type="radio" />
                                        <label class="required">Carte Bancaire</label>
                                        <input type="radio" />

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="la la-save"></i> Valider</button>
                                <a href="https://app.digipress.pro/recharge/error" class="btn">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>

    </main>

</div>

<footer class="app-footer d-print-none">
    <div class="text-muted ml-auto mr-auto">
        Un produit par <a target="_blank" rel="noopener" href="https://golobone.sn">Bestech SARL</a>.
    </div>
</footer>

<script type="text/javascript">
    // Save default sidebar class
    let sidebarClass = (document.body.className.match(/sidebar-(sm|md|lg|xl)-show/) || ['sidebar-lg-show'])[0];
    let sidebarTransition = function(value) {
        document.querySelector('.app-body > .sidebar').style.transition = value || '';
    };

    // Recover sidebar state
    let sessionState = sessionStorage.getItem('sidebar-collapsed');
    if (sessionState) {
        // disable the transition animation temporarily, so that if you're browsing across
        // pages with the sidebar closed, the sidebar does not flicker into the view
        sidebarTransition("none");
        document.body.classList.toggle(sidebarClass, sessionState === '1');

        // re-enable the transition, so that if the user clicks the hamburger menu, it does have a nice transition
        setTimeout(sidebarTransition, 100);
    }
</script>

<script type="text/javascript" src="https://app.digipress.pro/packages/backpack/base/js/bundle.js?v=5.3.6@d3883292d8ba66515ca767e2f2210fa8f4f8968a"></script>


<script type="text/javascript">
    // This is intentionaly run after dom loads so this way we can avoid showing duplicate alerts
    // when the user is beeing redirected by persistent table, that happens before this event triggers.
    document.onreadystatechange = function() {
        if (document.readyState == "interactive") {
            Noty.overrideDefaults({
                layout: 'topRight',
                theme: 'backstrap',
                timeout: 2500,
                closeWith: ['click', 'button'],
            });

            // get alerts from the alert bag
            var $alerts_from_php = [];

            // get the alerts from the localstorage
            var $alerts_from_localstorage = JSON.parse(localStorage.getItem('backpack_alerts')) ?
                JSON.parse(localStorage.getItem('backpack_alerts')) : {};

            // merge both php alerts and localstorage alerts
            Object.entries($alerts_from_php).forEach(function(type) {
                if (typeof $alerts_from_localstorage[type[0]] !== 'undefined') {
                    type[1].forEach(function(msg) {
                        $alerts_from_localstorage[type[0]].push(msg);
                    });
                } else {
                    $alerts_from_localstorage[type[0]] = type[1];
                }
            });

            for (var type in $alerts_from_localstorage) {
                let messages = new Set($alerts_from_localstorage[type]);

                messages.forEach(function(text) {
                    let alert = {};
                    alert['type'] = type;
                    alert['text'] = text;
                    new Noty(alert).show()
                });
            }

            // in the end, remove backpack alerts from localStorage
            localStorage.removeItem('backpack_alerts');
        }
    };
</script>


<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });

    // polyfill for `startsWith` from https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/startsWith
    if (!String.prototype.startsWith) {
        Object.defineProperty(String.prototype, 'startsWith', {
            value: function(search, rawPos) {
                var pos = rawPos > 0 ? rawPos|0 : 0;
                return this.substring(pos, pos + search.length) === search;
            }
        });
    }



    // polyfill for entries and keys from https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/entries#polyfill
    if (!Object.keys) Object.keys = function(o) {
        if (o !== Object(o))
            throw new TypeError('Object.keys called on a non-object');
        var k=[],p;
        for (p in o) if (Object.prototype.hasOwnProperty.call(o,p)) k.push(p);
        return k;
    }

    if (!Object.entries) {
        Object.entries = function( obj ){
            var ownProps = Object.keys( obj ),
                i = ownProps.length,
                resArray = new Array(i); // preallocate the Array
            while (i--)
                resArray[i] = [ownProps[i], obj[ownProps[i]]];
            return resArray;
        };
    }

    // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
    location.hash && activeTab && activeTab.tab('show');
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        location.hash = e.target.hash.replace("#tab_", "#");
    });
</script>

<script>
    $(document).ajaxComplete((e, result, settings) => {
        if(result.responseJSON?.exception !== undefined) {
            $.ajax({...settings, accepts: "text/html", backpackExceptionHandler: true});
        }
        else if(settings.backpackExceptionHandler) {
            Noty.closeAll();
            showErrorFrame(result.responseText);
        }
    });

    const showErrorFrame = html => {
        let page = document.createElement('html');
        page.innerHTML = html;
        page.querySelectorAll('a').forEach(a => a.setAttribute('target', '_top'));

        let modal = document.getElementById('ajax-error-frame');

        if (typeof modal !== 'undefined' && modal !== null) {
            modal.innerHTML = '';
        } else {
            modal = document.createElement('div');
            modal.id = 'ajax-error-frame';
            modal.style.position = 'fixed';
            modal.style.width = '100vw';
            modal.style.height = '100vh';
            modal.style.padding = '5vh 5vw';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
            modal.style.zIndex = 200000;
        }

        let iframe = document.createElement('iframe');
        iframe.style.backgroundColor = '#17161A';
        iframe.style.borderRadius = '5px';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = '0';
        iframe.style.boxShadow = '0 0 4rem';
        modal.appendChild(iframe);

        document.body.prepend(modal);
        document.body.style.overflow = 'hidden';
        iframe.contentWindow.document.open();
        iframe.contentWindow.document.write(page.outerHTML);
        iframe.contentWindow.document.close();

        // Close on click
        modal.addEventListener('click', () => hideErrorFrame(modal));

        // Close on escape key press
        modal.setAttribute('tabindex', 0);
        modal.addEventListener('keydown', e => e.key === 'Escape' && hideErrorFrame(modal));
        modal.focus();
    }

    const hideErrorFrame = modal => {
        modal.outerHTML = '';
        document.body.style.overflow = 'visible';
    }
</script>
<script>
    // Store sidebar state
    document.querySelectorAll('.sidebar-toggler').forEach(function(toggler) {
        toggler.addEventListener('click', function() {
            sessionStorage.setItem('sidebar-collapsed', Number(!document.body.classList.contains(sidebarClass)))
            // wait for the sidebar animation to end (250ms) and then update the table headers because datatables uses a cached version
            // and dont update this values if there are dom changes after the table is draw. The sidebar toggling makes
            // the table change width, so the headers need to be adjusted accordingly.
            setTimeout(function() {
                if(typeof crud !== "undefined" && crud.table) {
                    crud.table.fixedHeader.adjust();
                }
            }, 300);
        })
    });
    // Set active state on menu element
    var full_url = "https://app.digipress.pro/admin/edit-account-info";
    var $navLinks = $(".sidebar-nav li a, .app-header li a");

    // First look for an exact match including the search string
    var $curentPageLink = $navLinks.filter(
        function() { return $(this).attr('href') === full_url; }
    );

    // If not found, look for the link that starts with the url
    if(!$curentPageLink.length > 0){
        $curentPageLink = $navLinks.filter( function() {
            if ($(this).attr('href').startsWith(full_url)) {
                return true;
            }

            if (full_url.startsWith($(this).attr('href'))) {
                return true;
            }

            return false;
        });
    }

    // for the found links that can be considered current, make sure
    // - the parent item is open
    $curentPageLink.parents('li').addClass('open');
    // - the actual element is active
    $curentPageLink.each(function() {
        $(this).addClass('active');
    });
</script>
</body>
</html>
