(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: '',
            routes : [{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"login","name":"admin.getLogin","action":"App\Http\Controllers\Admin\AuthController@login"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"logout","name":"admin.logout","action":"App\Http\Controllers\Admin\AuthController@logout"},{"host":"admin.localhost","methods":["POST"],"uri":"login","name":"admin.postLogin","action":"App\Http\Controllers\Admin\AuthController@postLogin"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"home","name":"admin.home","action":"App\Http\Controllers\Admin\HomeController@index"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"User","name":"admin.User.index","action":"App\Http\Controllers\Admin\UsersController@index"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"User\/create","name":"admin.User.create","action":"App\Http\Controllers\Admin\UsersController@create"},{"host":"admin.localhost","methods":["POST"],"uri":"User","name":"admin.User.store","action":"App\Http\Controllers\Admin\UsersController@store"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"User\/{User}","name":"admin.User.show","action":"App\Http\Controllers\Admin\UsersController@show"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"User\/{User}\/edit","name":"admin.User.edit","action":"App\Http\Controllers\Admin\UsersController@edit"},{"host":"admin.localhost","methods":["PUT","PATCH"],"uri":"User\/{User}","name":"admin.User.update","action":"App\Http\Controllers\Admin\UsersController@update"},{"host":"admin.localhost","methods":["DELETE"],"uri":"User\/{User}","name":"admin.User.destroy","action":"App\Http\Controllers\Admin\UsersController@destroy"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"Area","name":"admin.Area.index","action":"App\Http\Controllers\Admin\AreasController@index"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"Area\/create","name":"admin.Area.create","action":"App\Http\Controllers\Admin\AreasController@create"},{"host":"admin.localhost","methods":["POST"],"uri":"Area","name":"admin.Area.store","action":"App\Http\Controllers\Admin\AreasController@store"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"Area\/{Area}","name":"admin.Area.show","action":"App\Http\Controllers\Admin\AreasController@show"},{"host":"admin.localhost","methods":["GET","HEAD"],"uri":"Area\/{Area}\/edit","name":"admin.Area.edit","action":"App\Http\Controllers\Admin\AreasController@edit"},{"host":"admin.localhost","methods":["PUT","PATCH"],"uri":"Area\/{Area}","name":"admin.Area.update","action":"App\Http\Controllers\Admin\AreasController@update"},{"host":"admin.localhost","methods":["DELETE"],"uri":"Area\/{Area}","name":"admin.Area.destroy","action":"App\Http\Controllers\Admin\AreasController@destroy"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"login","name":"app.getLogin","action":"App\Http\Controllers\App\AuthController@login"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"logout","name":"app.logout","action":"App\Http\Controllers\App\AuthController@logout"},{"host":"app.localhost","methods":["POST"],"uri":"login","name":"app.postLogin","action":"App\Http\Controllers\App\AuthController@postLogin"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"home","name":"app.home","action":"App\Http\Controllers\App\HomeController@index"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"reserves","name":"app.reserves.index","action":"App\Http\Controllers\App\ReservesController@index"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"reserves\/create","name":"app.reserves.create","action":"App\Http\Controllers\App\ReservesController@create"},{"host":"app.localhost","methods":["POST"],"uri":"reserves","name":"app.reserves.store","action":"App\Http\Controllers\App\ReservesController@store"},{"host":"app.localhost","methods":["GET","HEAD"],"uri":"reserves\/filtro","name":"app.reserves.find","action":"App\Http\Controllers\App\ReservesController@search"},{"host":"localhost","methods":["GET","HEAD"],"uri":"\/","name":"site.","action":"Closure"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

