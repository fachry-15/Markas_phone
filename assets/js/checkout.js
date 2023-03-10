!(function () {
    var t,
        e,
        n,
        o,
        a,
        r,
        i,
        s,
        c,
        d = "https://assets.pagar.me/checkout/";
    (t = window),
        (o = []),
        (a = {}),
        (r = 0),
        (i = function (t) {
            return Array.prototype.slice.call(t);
        }),
        (s = function (t) {
            e.postMessage(t, n);
        }),
        (c = function () {
            var t,
                e = i(arguments),
                n = e.shift();
            (t =
                e.length && "function" == typeof e[e.length - 1]
                    ? e.pop()
                    : function () { }),
                (r += 1);
            var o = JSON.stringify({ method: n, args: e, id: r });
            (a[r] = { message: o, cb: t }), s(o);
        }),
        (t.createTransport = function (t, r) {
            return (
                (n = r || "*"),
                setInterval(function () {
                    e && s(JSON.stringify({ method: "_pending" }));
                }, 300),
                window.addEventListener("message", function (e) {
                    var n = document.createElement("a"),
                        i = document.createElement("a");
                    if (
                        ((n.href = r), (i.href = e.origin), !r || n.hostname === i.hostname)
                    ) {
                        var c = e.source,
                            d = e.origin,
                            u = JSON.parse(e.data);
                        if ("_ack" == u.method) a[u.id] && (a[u.id].cb(), delete a[u.id]);
                        else if ("_pending" == u.method)
                            !(function () {
                                for (var t in a)
                                    if (!a[t].responded) return void s(a[t].message);
                            })();
                        else {
                            if (-1 != o.indexOf(u.id)) return;
                            o.push(u.id),
                                c.postMessage(JSON.stringify({ method: "_ack", id: u.id }), d),
                                t[u.method] && t[u.method].apply(null, u.args);
                        }
                    }
                }),
                {
                    callMethod: function () {
                        c.apply(null, arguments);
                    },
                    setSource: function (t) {
                        e = t;
                    },
                    restart: function () {
                        o = [];
                    },
                }
            );
        });
    var u = 1,
        m = 0;
    function l(t) {
        var e,
            n = document.createElement("script");
        n.setAttribute("type", "text/javascript"),
            n.setAttribute("src", t),
            (e = n).readyState
                ? (e.onreadystatechange = function () {
                    ("complete" != this.readyState && "loaded" != this.readyState) ||
                        p();
                })
                : (e.onload = p),
            (
                document.getElementsByTagName("head")[0] || document.documentElement
            ).appendChild(n);
    }
    function p() {
        (m += 1) == u &&
            (function (t) {
                easyXDM &&
                    (PagarMeCheckout.easyXDM = easyXDM.noConflict("PagarMeCheckout"));
                t.isReady ? h(t) : t(document).ready(h);
            })(window.jQuery.noConflict(!0));
    }
    function h(t) {
        window.navigator.userAgent;
        var e,
            n = function () {
                var t = 0,
                    e = 0;
                return (
                    document.documentElement &&
                    "number" == typeof document.documentElement.clientHeight &&
                    (t = document.documentElement.clientHeight),
                    "number" == typeof window.innerHeight && (e = window.innerHeight),
                    Math.max(t, e)
                );
            },
            o = function (t, e) {
                i.scripts[t].success(e);
            };
        function a(e) {
            r.container
                .find("iframe")
                .css({ top: t(document).scrollTop(), height: n() });
        }
        var r = {
            remotePath: "/modal.html",
            props: {
                style: {
                    zIndex: 9999,
                    background: "transparent",
                    border: "0 none transparent",
                    overflowX: "hidden",
                    overflowY: "auto",
                    margin: 0,
                    padding: 0,
                    "-webkit-tap-highlight-color": "transparent",
                    "-webkit-touch-callout": "none",
                    position: "fixed",
                    left: 0,
                    top: 0,
                    width: "100%",
                    height: "100%",
                },
            },
            closeModal: function (e, n) {
                return (
                    t(document).off("scroll.pgm-checkout"),
                    r.container.hide(),
                    r.container.find("iframe").blur(),
                    !0
                );
            },
            openModal: function () {
                r.container.show(), r.container.find("iframe").focus();
            },
            beforeOpen: function (e) {
                var o, i, s, c;
                /(iPad|iPhone).*(Safari\/|Mobile\/)/gi.test(navigator.userAgent) &&
                    (r.container
                        .find("iframe")
                        .css({
                            position: "absolute",
                            height: n(),
                            top: t(document).scrollTop(),
                        }),
                        t(document).on(
                            "scroll.pgm-checkout",
                            ((o = a),
                                (i = 300),
                                function () {
                                    var t = this,
                                        e = arguments,
                                        n = function () {
                                            (c = null), s || o.apply(t, e);
                                        },
                                        a = s && !c;
                                    clearTimeout(c), (c = setTimeout(n, i)), a && o.apply(t, e);
                                })
                        )),
                    e && e();
            },
            create: function () {
                var e = t('<div id="pagarme-checkout-container"></div>').hide();
                return (
                    t("body").append(e),
                    (r.container = e),
                    new PagarMeCheckout.easyXDM.Rpc(
                        { remote: d + r.remotePath, container: e.get(0), props: r.props },
                        {
                            local: {
                                closeModal: r.closeModal,
                                submitForm: function (t, e) {
                                    r.closeModal(), o(t, e);
                                },
                                error: function (t, e) {
                                    !(function (t, e) {
                                        i.scripts[t].error(e);
                                    })(t, e);
                                },
                            },
                            remote: { config: {}, animateIn: {} },
                        }
                    )
                );
            },
        };
        function i(n) {
            if (!n || !n.encryption_key)
                return alert("Encryption key missing."), null;
            (this.params = n),
                (this.view = e),
                (this.id = i.scriptsCount_++),
                (i.scripts[this.id] = this),
                (i.bridge && t("#pagarme-checkout-container > iframe").length) ||
                (i.bridge = e.create());
        }
        (e = r),
            (i.scriptsCount_ = 0),
            (i.scripts = {}),
            (i.prototype.mapIframeParameters_ = function (t) {
                var e = { card_brands: "brands" };
                for (var n in e) t[n] && ((t[e[n]] = t[n]), delete t[n]);
            }),
            (i.prototype.open = function (t) {
                var e = i.bridge,
                    n = this,
                    o = t;
                for (var a in this.params) o[a] = this.params[a];
                this.mapIframeParameters_(o),
                    (o.script_id = this.id),
                    this.view.beforeOpen(function () {
                        e.config(o, function () {
                            n.view.openModal(), e.animateIn();
                        });
                    });
            }),
            (i.prototype.close = function () {
                this.view.closeModal();
            }),
            (i.prototype.success = function (t) {
                this.params.success && this.params.success.call(this, t);
            }),
            (i.prototype.error = function (t) {
                this.params.error && this.params.error.call(this, t);
            }),
            (window.PagarMeCheckout.Checkout = i);
        for (
            var s = function () {
                var e = t(this).data("checkout"),
                    n = u(t("[data-checkout-id=" + t(this).data("script") + "]"));
                e.open(n);
            },
            c = function (t) {
                var e = t;
                try {
                    e = decodeURIComponent(escape(t));
                } catch (t) { }
                return e;
            },
            u = function (t) {
                for (
                    var e = [
                        "create-token",
                        "customer-data",
                        "payment-methods",
                        "brands",
                        "card-brands",
                        "header-text",
                        "payment-button-text",
                        "amount",
                        "postback-url",
                        "default-installment",
                        "show-installment",
                        "min-installments",
                        "max-installments",
                        "encryption-key",
                        "ui-color",
                        "interest-rate",
                        "customer-name",
                        "customer-document-number",
                        "customer-email",
                        "customer-address-street",
                        "customer-address-street-number",
                        "customer-address-complementary",
                        "customer-address-neighborhood",
                        "customer-address-city",
                        "customer-address-state",
                        "customer-address-zipcode",
                        "customer-phone-ddd",
                        "customer-phone-number",
                        "free-installments",
                        "metadata-discount-amount",
                        "metadata-gross-amount",
                        "boleto-discount-percentage",
                        "boleto-discount-amount",
                        "boleto-installment",
                        "boleto-max-installments",
                        "tracking",
                        "boleto-expiration-date",
                        "boleto-first-installment-amount",
                        "disable-zero-document-number",
                        "boleto-helper-text",
                        "credit-card-helper-text",
                        "credit-card-discount-amount",
                        "credit-card-discount-percentage",
                    ],
                    n = {},
                    o = 0;
                    o < e.length;
                    o++
                )
                    void 0 !== t.attr("data-" + e[o]) &&
                        (n[e[o].replace(/-/g, "_")] = c(t.attr("data-" + e[o])));
                return n;
            },
            m = function (e) {
                var n = t(
                    '<input class="pagarme-checkout-btn" type="button" value="' +
                    c((e = e || "Pagar")) +
                    '" />'
                );
                return n.click(s), n;
            },
            l = (function () {
                for (var e = t("script"), n = [], o = 0; o < e.length; o++)
                    (-1 == e[o].src.indexOf(d + "checkout.js") &&
                        -1 ==
                        e[o].src.indexOf(
                            "https://pagar.me/assets/checkout/checkout.js"
                        )) ||
                        n.push(t(e[o]));
                return n;
            })(),
            p = 0;
            p < l.length;
            p++
        ) {
            var h = l[p],
                f = h.parents("form");
            if (f && f.length && h.data("amount") && h.data("encryption-key")) {
                var g = m(h.data("button-text"));
                g.insertBefore(h),
                    h.data("button-class") && g.addClass(h.data("button-class"));
                var y,
                    v = new i({
                        encryption_key: h.data("encryption-key"),
                        success: function (e) {
                            var n = t("[data-checkout-id=" + this.id + "]").parents("form"),
                                o = null,
                                a = function (e, o) {
                                    (o = o),
                                        t.each(e, function (e) {
                                            var r;
                                            if (
                                                ((r = o ? o + "[" + e + "]" : e), t.isPlainObject(this))
                                            )
                                                a(this, r);
                                            else {
                                                var i = t("<input />", {
                                                    name: r,
                                                    type: "hidden",
                                                    val: this,
                                                });
                                                n.append(i);
                                            }
                                        });
                                };
                            e.token || (o = "pagarme"), a(e, o), n.submit();
                        },
                    });
                (y = v.id),
                    h.attr("data-checkout-id", y),
                    g.data("script", y),
                    g.data("checkout", v);
            }
        }
    }
    (window.PagarMeCheckout = window.PagarMeCheckout || {}),
        window.PagarMeCheckoutLoadedRetail ||
        ((window.PagarMeCheckoutLoadedRetail = !0),
            (void 0 !== window.jQuery && "1.10.1" === window.jQuery.version) ||
            ((u += 1),
                l("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js")),
            "object" != typeof window.JSON && ((u += 1), l(d + "/json.min.js")),
            l(d + "/easyXDM.js"));
})();
