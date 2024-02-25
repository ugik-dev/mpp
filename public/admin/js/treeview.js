jQuery(function (t) {
    t.fn.mdbTreeview = function () {
        var e = t(this);
        e.hasClass("treeview") &&
            (function (e) {
                e.find(".rotate").each(function () {
                    var e = t(this);
                    e.off("click"),
                        e.on("click", function () {
                            var e = t(this);
                            e.siblings(".nested").toggleClass("active"),
                                e.toggleClass("down");
                        });
                });
            })(e),
            e.hasClass("treeview-animated") &&
                (function (e) {
                    var n = e.find(".treeview-animated-element"),
                        i = e.find(".closed");
                    e.find(".nested").hide(),
                        i.off("click"),
                        i.on("click", function () {
                            console.log("terklik");
                            var e = t(this),
                                n = e.siblings(".nested"),
                                i = e.children(".fa-angle-right");
                            e.toggleClass("open"),
                                i.toggleClass("down"),
                                n.hasClass("active")
                                    ? n.removeClass("active").slideUp()
                                    : n.addClass("active").slideDown();
                        }),
                        n.off("click"),
                        n.on("click", function () {
                            var e = t(this);
                            e.hasClass("opened")
                                ? e.removeClass("opened")
                                : (n.removeClass("opened"),
                                  e.addClass("opened"));
                        });
                })(e);
    };
});
