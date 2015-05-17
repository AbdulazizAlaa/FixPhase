define(
    [
        "text!pages/defectCreate/defectCreate.html!strip",
        "page",
        'jquery',
        "css!pages/defectCreate/defectCreate.css",
        "css!assets/lib/bootstrap/css/bootstrap.min.css"
    ],
    function (html, Page, $) {

        return new Page({

            //a must have property where content are setup
            makeContent: function () {
                var content = $(($.parseHTML($.trim(html)))[0]);

                var defectForm = content.find('#create-defect-form');

                var headline = content.find('#headline');
                var releaseName = content.find('#releasename');
                var releaseVersion = content.find('#releaseversion');
                var severity = content.find('#severity-role');
                var priority = content.find('#priority-role');
                var product = content.find('#product-role');
                var defectDesc = content.find('#defect-desc');

                var submitDefect = content.find('#submit-defect');


                defectForm.submit(function (e) {
                    var defectData = {
                        'headline':headline.val(),
                        'releasename':releaseName.val(),
                        'releaseversion': releaseVersion.val(),
                        'severity':content.find('#severity-role option:selected').text(),
                        'priority':content.find('#priority-role option:selected').text(),
                        'product':content.find('#product-role option:selected').text(),
                        'defecrDesc':defectDesc.val()
                    };

                    $.ajax({
                        type        : 'POST',
                        url         : '/defects',
                        data        : defectData,
                        dataType    : 'json',
                        encode          : true
                    }).done(function () {
                        self.goToURL("/projects/pid/defects/1");
                    });


                    e.preventDefault();
                });

                return content;
            },

            //all url observe goes here
            observeURLS: function () {

            },

            //called when the page is in view
            //you can fetch data and show them here on startup if you want
            start: function () {

            },

            exit: function(){

            }
        });

    }
);