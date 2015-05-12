requirejs.config({
    baseUrl: '/assets/app',
    paths: {
        jquery: "../lib/jquery/jquery",
        text: "../lib/requirejs-text/text",
        css : "../lib/require-css/css",

        //config
        routes: "config/routes",
        api: "config/api",
        bootstrap:"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min",


        //framework
        identity: "../lib/core/identity",
        core: "../lib/core/core",
        router: "../lib/core/router",
        events: "../lib/core/events",
        observer: "../lib/core/observer",
        component: "../lib/core/component",
        skeleton: "../lib/core/skeleton",
        gui: "../lib/core/gui",
        page: "../lib/core/page",
        widget: "../lib/core/widget",
        store: "../lib/core/store",
        promise: "../lib/core/promise",
        reloader: "../lib/core/reloader",
        "jquery-ui": "../lib/jquery-ui/ui",
        smoothness: "http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui"

    }
});


require(["core","router","routes", ,"jquery-ui/dialog","css!bootstrap","css!smoothness"], function(core,router,routes){
    //Register the routes in the router library
    router.registerRoutes(routes);

    //Set the method that will handle all url change events
    router.on("routeload", core.onRouteLoad);

    //initialize the router library to fire the first event
    router.init();
});