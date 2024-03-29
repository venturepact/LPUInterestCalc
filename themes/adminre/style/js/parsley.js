window.ParsleyExtend = $.extend(window.ParsleyExtend || {}, {
        asyncValidate: function(a, b) {
            return "ParsleyForm" === this.__class__ ? this._asyncValidateForm(a, b) : this._asyncValidateField()
        },
        asyncIsValid: function(a) {
            return "ParsleyField" === this.__class__ ? this._asyncIsValidField() : this._asyncIsValidForm(a)
        },
        onSubmitValidate: function(a) {
            var b = this;
            return a instanceof $.Event && a.preventDefault(), this._asyncValidateForm(void 0, a).done(function() {
                b.$element.off("submit.Parsley").trigger($.Event("submit"))
            })
        },
        eventValidate: function(a) {
            new RegExp("key").test(a.type) && !this._ui.validationInformationVisible && this.getValue().length <= this.options.validationThreshold || (this._ui.validatedOnce = !0, this.asyncValidate())
        },
        _asyncValidateForm: function(a, b) {
            var c = this,
                d = [];
            this.submitEvent = b, this.refreshFields(), $.emit("parsley:form:validate", this);
            for (var e = 0; e < this.fields.length; e++) a && a !== this.fields[e].options.group || d.push(this.fields[e]._asyncValidateField());
            return $.when.apply($, d).always(function() {
                $.emit("parsley:form:validated", c)
            })
        },
        _asyncIsValidForm: function(a) {
            var b = [];
            this.refreshFields();
            for (var c = 0; c < this.fields.length; c++) a && a !== this.fields[c].options.group || b.push(this.fields[c]._asyncIsValidField());
            return $.when.apply($, b)
        },
        _asyncValidateField: function() {
            var a = this;
            return $.emit("parsley:field:validate", this), this._asyncIsValidField().done(function() {
                $.emit("parsley:field:success", a)
            }).fail(function() {
                $.emit("parsley:field:error", a)
            }).always(function() {
                $.emit("parsley:field:validated", a)
            })
        },
        _asyncIsValidField: function() {
            var a = $.Deferred();
            return !1 === this.isValid() ? a.rejectWith(this) : -1 !== this.indexOfConstraint("remote") ? this._remote(a) : a.resolveWith(this), a.promise()
        },
        _remote: function(a) {
            var b, c = {},
                d = this,
                e = this.getValue(),
                f = e + this.$element.attr(this.options.namespace + "remote-options");
            "undefined" != typeof this._remote && "undefined" != typeof this._remote[f] ? b = this._remote[f] ? a.resolveWith(d) : a.rejectWith(d) : (c[d.$element.attr("name") || d.$element.attr("id")] = e, b = $.ajax($.extend(!0, {}, {
                url: d.options.remote,
                data: c,
                type: "GET"
            }, d.options.remoteOptions || {}))), b.done(function() {
                d._handleRemoteResult(!0, a, f)
            }).fail(function() {
                d._handleRemoteResult(!1, a, f)
            })
        },
        _handleRemoteResult: function(a, b, c) {
            return this._remote[c] = a, "undefined" != typeof this.options.remoteReverse && !0 === this.options.remoteReverse && (a = !a), a ? void b.resolveWith(this) : (this.validationResult = [new window.ParsleyValidator.Validator.Violation(this.constraints[this.indexOfConstraint("remote")], this.getValue(), null)], void b.rejectWith(this))
        }
    }), window.ParsleyConfig = $.extend(window.ParsleyConfig || {}, {
        validators: {
            remote: {
                fn: function() {
                    return !0
                },
                priority: -1
            }
        }
    }),
    /*!
     * Parsleyjs
     * Guillaume Potier - <guillaume@wisembly.com>
     * Version 2.0.0-rc1 - built Tue Feb 25 2014 10:25:32
     * MIT Licensed
     *
     */
    function(a, b) {
        var c = {
                attr: function(a, b, c) {
                    var d, e = {},
                        f = new RegExp("^" + b, "i");
                    if ("undefined" == typeof a || "undefined" == typeof a[0]) return {};
                    for (var g in a[0].attributes)
                        if (d = a[0].attributes[g], "undefined" != typeof d && null !== d && d.specified && f.test(d.name)) {
                            if ("undefined" != typeof c && new RegExp(c, "i").test(d.name)) return !0;
                            e[this.camelize(d.name.replace(b, ""))] = this.deserializeValue(d.value)
                        }
                    return "undefined" == typeof c ? e : !1
                },
                setAttr: function(a, b, c, d) {
                    a[0].setAttribute(this.dasherize(b + c), String(d))
                },
                get: function(a, b, c) {
                    for (var d = 0, e = (b || "").split("."); this.isObject(a) || this.isArray(a);)
                        if (a = a[e[d++]], d === e.length) return a || c;
                    return c
                },
                hash: function(a) {
                    return String(Math.random()).substring(2, a ? a + 2 : 9)
                },
                isArray: function(a) {
                    return "[object Array]" === Object.prototype.toString.call(a)
                },
                isObject: function(a) {
                    return a === Object(a)
                },
                deserializeValue: function(a) {
                    var b;
                    try {
                        return a ? "true" == a || ("false" == a ? !1 : "null" == a ? null : isNaN(b = Number(a)) ? /^[\[\{]/.test(a) ? $.parseJSON(a) : a : b) : a
                    } catch (c) {
                        return a
                    }
                },
                camelize: function(a) {
                    return a.replace(/-+(.)?/g, function(a, b) {
                        return b ? b.toUpperCase() : ""
                    })
                },
                dasherize: function(a) {
                    return a.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
                }
            },
            d = {
                namespace: "data-parsley-",
                inputs: "input, textarea, select",
                excluded: "input[type=button], input[type=submit], input[type=reset]",
                priorityEnabled: !0,
                uiEnabled: !0,
                validationThreshold: 3,
                focus: "first",
                trigger: !1,
                errorClass: "parsley-error",
                successClass: "parsley-success",
                classHandler: function() {},
                errorsContainer: function() {},
                errorsWrapper: '<ul class="parsley-errors-list"><li class="check"></li></ul>',
                errorTemplate: "<li></li>"
            },
            e = function() {};
        e.prototype = {
                actualizeOptions: function() {
                    return this.options = this.parsleyInstance.OptionsFactory.get(this), this
                },
                validateThroughValidator: function() {
                    return a.ParsleyValidator.validate.apply(a.ParsleyValidator, arguments)
                },
                subscribe: function(a, b) {
                    return $.listenTo(this, a.toLowerCase(), b), this
                },
                unsubscribe: function(a) {
                    return $.unsubscribeTo(this, a.toLowerCase()), this
                },
                reset: function() {
                    if ("ParsleyField" === this.__class__) return $.emit("parsley:field:reset", this);
                    for (var a = 0; a < this.fields.length; a++) $.emit("parsley:field:reset", this.fields[a]);
                    $.emit("parsley:form:reset", this)
                },
                destroy: function() {
                    if ("ParsleyField" === this.__class__) return $.emit("parsley:field:destroy", this), void this.$element.removeData("Parsley");
                    for (var a = 0; a < this.fields.length; a++) this.fields[a].destroy();
                    $.emit("parsley:form:destroy", this), this.$element.removeData("Parsley")
                }
            },
            function(a) {
                var b = function(a) {
                    return this.__class__ = "Validator", this.__version__ = "0.5.5", this.options = a || {}, this.bindingKey = this.options.bindingKey || "_validatorjsConstraint", this
                };
                b.prototype = {
                    constructor: b,
                    validate: function(a, b, c) {
                        if ("string" != typeof a && "object" != typeof a) throw new Error("You must validate an object or a string");
                        return "string" == typeof a || g(a) ? this._validateString(a, b, c) : this.isBinded(a) ? this._validateBindedObject(a, b) : this._validateObject(a, b, c)
                    },
                    bind: function(a, b) {
                        if ("object" != typeof a) throw new Error("Must bind a Constraint to an object");
                        return a[this.bindingKey] = new c(b), this
                    },
                    unbind: function(a) {
                        return "undefined" == typeof a._validatorjsConstraint ? this : (delete a[this.bindingKey], this)
                    },
                    isBinded: function(a) {
                        return "undefined" != typeof a[this.bindingKey]
                    },
                    getBinded: function(a) {
                        return this.isBinded(a) ? a[this.bindingKey] : null
                    },
                    _validateString: function(a, b, c) {
                        var f, h = [];
                        g(b) || (b = [b]);
                        for (var i = 0; i < b.length; i++) {
                            if (!(b[i] instanceof e)) throw new Error("You must give an Assert or an Asserts array to validate a string");
                            f = b[i].check(a, c), f instanceof d && h.push(f)
                        }
                        return h.length ? h : !0
                    },
                    _validateObject: function(a, b, d) {
                        if ("object" != typeof b) throw new Error("You must give a constraint to validate an object");
                        return b instanceof c ? b.check(a, d) : new c(b).check(a, d)
                    },
                    _validateBindedObject: function(a, b) {
                        return a[this.bindingKey].check(a, b)
                    }
                }, b.errorCode = {
                    must_be_a_string: "must_be_a_string",
                    must_be_an_array: "must_be_an_array",
                    must_be_a_number: "must_be_a_number",
                    must_be_a_string_or_array: "must_be_a_string_or_array"
                };
                var c = function(a, b) {
                    if (this.__class__ = "Constraint", this.options = b || {}, this.nodes = {}, a) try {
                        this._bootstrap(a)
                    } catch (c) {
                        throw new Error("Should give a valid mapping object to Constraint", c, a)
                    }
                    return this
                };
                c.prototype = {
                    constructor: c,
                    check: function(a, b) {
                        var c, d = {};
                        for (var h in this.options.strict ? this.nodes : a)
                            if (this.options.strict ? this.has(h, a) : this.has(h)) c = this._check(h, a[h], b), (g(c) && c.length > 0 || !g(c) && !f(c)) && (d[h] = c);
                            else if (this.options.strict) try {
                            (new e).HaveProperty(h).validate(a)
                        } catch (i) {
                            d[h] = i
                        }
                        return f(d) ? !0 : d
                    },
                    add: function(a, b) {
                        if (b instanceof e || g(b) && b[0] instanceof e) return this.nodes[a] = b, this;
                        if ("object" == typeof b && !g(b)) return this.nodes[a] = b instanceof c ? b : new c(b), this;
                        throw new Error("Should give an Assert, an Asserts array, a Constraint", b)
                    },
                    has: function(a, b) {
                        var b = "undefined" != typeof b ? b : this.nodes;
                        return "undefined" != typeof b[a]
                    },
                    get: function(a, b) {
                        return this.has(a) ? this.nodes[a] : b || null
                    },
                    remove: function(a) {
                        var b = [];
                        for (var c in this.nodes) c !== a && (b[c] = this.nodes[c]);
                        return this.nodes = b, this
                    },
                    _bootstrap: function(a) {
                        if (a instanceof c) return this.nodes = a.nodes;
                        for (var b in a) this.add(b, a[b])
                    },
                    _check: function(a, b, d) {
                        if (this.nodes[a] instanceof e) return this._checkAsserts(b, [this.nodes[a]], d);
                        if (g(this.nodes[a])) return this._checkAsserts(b, this.nodes[a], d);
                        if (this.nodes[a] instanceof c) return this.nodes[a].check(b, d);
                        throw new Error("Invalid node", this.nodes[a])
                    },
                    _checkAsserts: function(a, b, c) {
                        for (var d, e = [], f = 0; f < b.length; f++) d = b[f].check(a, c), "undefined" != typeof d && !0 !== d && e.push(d);
                        return e
                    }
                };
                var d = function(a, b, c) {
                    if (this.__class__ = "Violation", !(a instanceof e)) throw new Error("Should give an assertion implementing the Assert interface");
                    this.assert = a, this.value = b, "undefined" != typeof c && (this.violation = c)
                };
                d.prototype = {
                    show: function() {
                        var a = {
                            assert: this.assert.__class__,
                            value: this.value
                        };
                        return this.violation && (a.violation = this.violation), a
                    },
                    __toString: function() {
                        if ("undefined" != typeof this.violation) var a = '", ' + this.getViolation().constraint + " expected was " + this.getViolation().expected;
                        return this.assert.__class__ + ' assert failed for "' + this.value + a || ""
                    },
                    getViolation: function() {
                        var a, b;
                        for (a in this.violation) b = this.violation[a];
                        return {
                            constraint: a,
                            expected: b
                        }
                    }
                };
                var e = function(a) {
                    return this.__class__ = "Assert", this.__parentClass__ = this.__class__, this.groups = [], "undefined" != typeof a && this.addGroup(a), this
                };
                e.prototype = {
                    construct: e,
                    check: function(a, b) {
                        if (!(b && !this.hasGroup(b) || !b && this.hasGroups())) try {
                            return this.validate(a, b)
                        } catch (c) {
                            return c
                        }
                    },
                    hasGroup: function(a) {
                        return g(a) ? this.hasOneOf(a) : "Any" === a ? !0 : this.hasGroups() ? -1 !== this.groups.indexOf(a) : "Default" === a
                    },
                    hasOneOf: function(a) {
                        for (var b = 0; b < a.length; b++)
                            if (this.hasGroup(a[b])) return !0;
                        return !1
                    },
                    hasGroups: function() {
                        return this.groups.length > 0
                    },
                    addGroup: function(a) {
                        return g(a) ? this.addGroups(a) : (this.hasGroup(a) || this.groups.push(a), this)
                    },
                    removeGroup: function(a) {
                        for (var b = [], c = 0; c < this.groups.length; c++) a !== this.groups[c] && b.push(this.groups[c]);
                        return this.groups = b, this
                    },
                    addGroups: function(a) {
                        for (var b = 0; b < a.length; b++) this.addGroup(a[b]);
                        return this
                    },
                    HaveProperty: function(a) {
                        return this.__class__ = "HaveProperty", this.node = a, this.validate = function(a) {
                            if ("undefined" == typeof a[this.node]) throw new d(this, a, {
                                value: this.node
                            });
                            return !0
                        }, this
                    },
                    Blank: function() {
                        return this.__class__ = "Blank", this.validate = function(a) {
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if ("" !== a.replace(/^\s+/g, "").replace(/\s+$/g, "")) throw new d(this, a);
                            return !0
                        }, this
                    },
                    Callback: function(a) {
                        if (this.__class__ = "Callback", this.arguments = Array.prototype.slice.call(arguments), 1 === this.arguments.length ? this.arguments = [] : this.arguments.splice(0, 1), "function" != typeof a) throw new Error("Callback must be instanciated with a function");
                        return this.fn = a, this.validate = function(a) {
                            var b = [a].concat(this.arguments),
                                c = this.fn.apply(this, b);
                            if (!0 !== c) throw new d(this, a, {
                                result: c
                            });
                            return !0
                        }, this
                    },
                    Choice: function(a) {
                        if (this.__class__ = "Choice", !g(a) && "function" != typeof a) throw new Error("Choice must be instanciated with an array or a function");
                        return this.list = a, this.validate = function(a) {
                            for (var b = "function" == typeof this.list ? this.list() : this.list, c = 0; c < b.length; c++)
                                if (a === b[c]) return !0;
                            throw new d(this, a, {
                                choices: b
                            })
                        }, this
                    },
                    Collection: function(a) {
                        return this.__class__ = "Collection", this.constraint = "undefined" != typeof a ? new c(a) : !1, this.validate = function(a, c) {
                            var e, h = new b,
                                i = 0,
                                j = {},
                                k = this.groups.length ? this.groups : c;
                            if (!g(a)) throw new d(this, array, {
                                value: b.errorCode.must_be_an_array
                            });
                            for (var l = 0; l < a.length; l++) e = this.constraint ? h.validate(a[l], this.constraint, k) : h.validate(a[l], k), f(e) || (j[i] = e), i++;
                            return f(j) ? !0 : j
                        }, this
                    },
                    Count: function(a) {
                        return this.__class__ = "Count", this.count = a, this.validate = function(a) {
                            if (!g(a)) throw new d(this, a, {
                                value: b.errorCode.must_be_an_array
                            });
                            var c = "function" == typeof this.count ? this.count(a) : this.count;
                            if (isNaN(Number(c))) throw new Error("Count must be a valid interger", c);
                            if (c !== a.length) throw new d(this, a, {
                                count: c
                            });
                            return !0
                        }, this
                    },
                    Email: function() {
                        return this.__class__ = "Email", this.validate = function(a) {
                            var c = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if (!c.test(a)) throw new d(this, a);
                            return !0
                        }, this
                    },
                    Eql: function(a) {
                        if (this.__class__ = "Eql", "undefined" == typeof a) throw new Error("Equal must be instanciated with an Array or an Object");
                        return this.eql = a, this.validate = function(a) {
                            var b = "function" == typeof this.eql ? this.eql(a) : this.eql;
                            if (!h.eql(b, a)) throw new d(this, a, {
                                eql: b
                            });
                            return !0
                        }, this
                    },
                    EqualTo: function(a) {
                        if (this.__class__ = "EqualTo", "undefined" == typeof a) throw new Error("EqualTo must be instanciated with a value or a function");
                        return this.reference = a, this.validate = function(a) {
                            var b = "function" == typeof this.reference ? this.reference(a) : this.reference;
                            if (b !== a) throw new d(this, a, {
                                value: b
                            });
                            return !0
                        }, this
                    },
                    GreaterThan: function(a) {
                        if (this.__class__ = "GreaterThan", "undefined" == typeof a) throw new Error("Should give a threshold value");
                        return this.threshold = a, this.validate = function(a) {
                            if ("" === a || isNaN(Number(a))) throw new d(this, a, {
                                value: b.errorCode.must_be_a_number
                            });
                            if (this.threshold >= a) throw new d(this, a, {
                                threshold: this.threshold

                            });
                            return !0
                        }, this
                    },
                    GreaterThanOrEqual: function(a) {
                        if (this.__class__ = "GreaterThanOrEqual", "undefined" == typeof a) throw new Error("Should give a threshold value");
                        return this.threshold = a, this.validate = function(a) {
                            if ("" === a || isNaN(Number(a))) throw new d(this, a, {
                                value: b.errorCode.must_be_a_number
                            });
                            if (this.threshold > a) throw new d(this, a, {
                                threshold: this.threshold
                            });
                            return !0
                        }, this
                    },
                    InstanceOf: function(a) {
                        if (this.__class__ = "InstanceOf", "undefined" == typeof a) throw new Error("InstanceOf must be instanciated with a value");
                        return this.classRef = a, this.validate = function(a) {
                            if (!0 != a instanceof this.classRef) throw new d(this, a, {
                                classRef: this.classRef
                            });
                            return !0
                        }, this
                    },
                    IPv4: function() {
                        return this.__class__ = "IPv4", this.validate = function(a) {
                            var c = /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if (!c.test(a)) throw new d(this, a);
                            return !0
                        }, this
                    },
                    Length: function(a) {
                        if (this.__class__ = "Length", !a.min && !a.max) throw new Error("Lenth assert must be instanciated with a { min: x, max: y } object");
                        return this.min = a.min, this.max = a.max, this.validate = function(a) {
                            if ("string" != typeof a && !g(a)) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string_or_array
                            });
                            if ("undefined" != typeof this.min && this.min === this.max && a.length !== this.min) throw new d(this, a, {
                                min: this.min,
                                max: this.max
                            });
                            if ("undefined" != typeof this.max && a.length > this.max) throw new d(this, a, {
                                max: this.max
                            });
                            if ("undefined" != typeof this.min && a.length < this.min) throw new d(this, a, {
                                min: this.min
                            });
                            return !0
                        }, this
                    },
                    LessThan: function(a) {
                        if (this.__class__ = "LessThan", "undefined" == typeof a) throw new Error("Should give a threshold value");
                        return this.threshold = a, this.validate = function(a) {
                            if ("" === a || isNaN(Number(a))) throw new d(this, a, {
                                value: b.errorCode.must_be_a_number
                            });
                            if (this.threshold <= a) throw new d(this, a, {
                                threshold: this.threshold
                            });
                            return !0
                        }, this
                    },
                    LessThanOrEqual: function(a) {
                        if (this.__class__ = "LessThanOrEqual", "undefined" == typeof a) throw new Error("Should give a threshold value");
                        return this.threshold = a, this.validate = function(a) {
                            if ("" === a || isNaN(Number(a))) throw new d(this, a, {
                                value: b.errorCode.must_be_a_number
                            });
                            if (this.threshold < a) throw new d(this, a, {
                                threshold: this.threshold
                            });
                            return !0
                        }, this
                    },
                    Mac: function() {
                        return this.__class__ = "Mac", this.validate = function(a) {
                            var c = /^(?:[0-9A-F]{2}:){5}[0-9A-F]{2}$/i;
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if (!c.test(a)) throw new d(this, a);
                            return !0
                        }, this
                    },
                    NotNull: function() {
                        return this.__class__ = "NotNull", this.validate = function(a) {
                            if (null === a || "undefined" == typeof a) throw new d(this, a);
                            return !0
                        }, this
                    },
                    NotBlank: function() {
                        return this.__class__ = "NotBlank", this.validate = function(a) {
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if ("" === a.replace(/^\s+/g, "").replace(/\s+$/g, "")) throw new d(this, a);
                            return !0
                        }, this
                    },
                    Null: function() {
                        return this.__class__ = "Null", this.validate = function(a) {
                            if (null !== a) throw new d(this, a);
                            return !0
                        }, this
                    },
                    Range: function(a, b) {
                        if (this.__class__ = "Range", !a || !b) throw new Error("Range assert expects min and max values");
                        return this.min = a, this.max = b, this.validate = function(a) {
                            try {
                                return "string" == typeof a && isNaN(Number(a)) || g(a) ? (new e).Length({
                                    min: this.min,
                                    max: this.max
                                }).validate(a) : (new e).GreaterThanOrEqual(this.min).validate(a) && (new e).LessThanOrEqual(this.max).validate(a), !0
                            } catch (b) {
                                throw new d(this, a, b.violation)
                            }
                            return !0
                        }, this
                    },
                    Regexp: function(a, c) {
                        if (this.__class__ = "Regexp", "undefined" == typeof a) throw new Error("You must give a regexp");
                        return this.regexp = a, this.flag = c || "", this.validate = function(a) {
                            if ("string" != typeof a) throw new d(this, a, {
                                value: b.errorCode.must_be_a_string
                            });
                            if (!new RegExp(this.regexp).test(a, this.flag)) throw new d(this, a, {
                                regexp: this.regexp,
                                flag: this.flag
                            });
                            return !0
                        }, this
                    },
                    Required: function() {
                        return this.__class__ = "Required", this.validate = function(a) {
                            if ("undefined" == typeof a) throw new d(this, a);
                            if ("string" == typeof a) try {
                                (new e).NotNull().validate(a) && (new e).NotBlank().validate(a)
                            } catch (b) {
                                throw new d(this, a)
                            }
                            return !0
                        }, this
                    },
                    Unique: function(a) {
                        return this.__class__ = "Unique", "object" == typeof a && (this.key = a.key), this.validate = function(a) {
                            var c, e = [];
                            if (!g(a)) throw new d(this, a, {
                                value: b.errorCode.must_be_an_array
                            });
                            for (var f = 0; f < a.length; f++)
                                if (c = "object" == typeof a[f] ? a[f][this.key] : a[f], "undefined" != typeof c) {
                                    if (-1 !== e.indexOf(c)) throw new d(this, a, {
                                        value: c
                                    });
                                    e.push(c)
                                }
                            return !0
                        }, this
                    }
                }, a.Assert = e, a.Validator = b, a.Violation = d, a.Constraint = c, Array.prototype.indexOf || (Array.prototype.indexOf = function(a) {
                    if (null == this) throw new TypeError;
                    var b = Object(this),
                        c = b.length >>> 0;
                    if (0 === c) return -1;
                    var d = 0;
                    if (arguments.length > 1 && (d = Number(arguments[1]), d != d ? d = 0 : 0 != d && 1 / 0 != d && d != -1 / 0 && (d = (d > 0 || -1) * Math.floor(Math.abs(d)))), d >= c) return -1;
                    for (var e = d >= 0 ? d : Math.max(c - Math.abs(d), 0); c > e; e++)
                        if (e in b && b[e] === a) return e;
                    return -1
                });
                var f = function(a) {
                        for (var b in a) return !1;
                        return !0
                    },
                    g = function(a) {
                        return "[object Array]" === Object.prototype.toString.call(a)
                    },
                    h = {
                        eql: function(a, b) {
                            if (a === b) return !0;
                            if ("undefined" != typeof Buffer && Buffer.isBuffer(a) && Buffer.isBuffer(b)) {
                                if (a.length !== b.length) return !1;
                                for (var c = 0; c < a.length; c++)
                                    if (a[c] !== b[c]) return !1;
                                return !0
                            }
                            return a instanceof Date && b instanceof Date ? a.getTime() === b.getTime() : "object" != typeof a && "object" != typeof b ? a == b : this.objEquiv(a, b)
                        },
                        isUndefinedOrNull: function(a) {
                            return null === a || "undefined" == typeof a
                        },
                        isArguments: function(a) {
                            return "[object Arguments]" == Object.prototype.toString.call(a)
                        },
                        keys: function(a) {
                            if (Object.keys) return Object.keys(a);
                            var b = [];
                            for (var c in a) Object.prototype.hasOwnProperty.call(a, c) && b.push(c);
                            return b
                        },
                        objEquiv: function(a, b) {
                            if (this.isUndefinedOrNull(a) || this.isUndefinedOrNull(b)) return !1;
                            if (a.prototype !== b.prototype) return !1;
                            if (this.isArguments(a)) return this.isArguments(b) ? eql(pSlice.call(a), pSlice.call(b)) : !1;
                            try {
                                var c, d, e = this.keys(a),
                                    f = this.keys(b)
                            } catch (g) {
                                return !1
                            }
                            if (e.length !== f.length) return !1;
                            for (e.sort(), f.sort(), d = e.length - 1; d >= 0; d--)
                                if (e[d] != f[d]) return !1;
                            for (d = e.length - 1; d >= 0; d--)
                                if (c = e[d], !this.eql(a[c], b[c])) return !1;
                            return !0
                        }
                    };
                "function" == typeof define && define.amd && define("validator", [], function() {
                    return a
                })
            }("undefined" == typeof exports ? this["undefined" != typeof validatorjs_ns ? validatorjs_ns : "Validator"] = {} : exports);
        var f = function(a, b) {
            this.__class__ = "ParsleyValidator", this.Validator = Validator, this.locale = "en", this.init(a || {}, b || {})
        };
        f.prototype = {
            init: function(a, b) {
                this.catalog = b;
                for (var c in a) this.addValidator(c, a[c].fn, a[c].priority);
                $.emit("parsley:validator:init")
            },
            setLocale: function(a) {
                if ("undefined" == typeof this.catalog[a]) throw new Error(a + " is not available in the catalog");
                return this.locale = a, this
            },
            addCatalog: function(a, b, c) {
                return "object" == typeof b && (this.catalog[a] = b), !0 === c ? this.setLocale(a) : this
            },
            addMessage: function(a, c, d) {
                b === typeof this.catalog[a] && (this.catalog[a] = {}), this.catalog[a][c] = d
            },
            validate: function() {
                return (new this.Validator.Validator).validate.apply(new Validator.Validator, arguments)
            },
            addValidator: function(a, b, c) {
                return this.validators[a] = function(a) {
                    return $.extend((new Validator.Assert).Callback(b, a), {
                        priority: c
                    })
                }, this
            },
            updateValidator: function(a, b, c) {
                return addValidator(a, b, c)
            },
            removeValidator: function(a) {
                return delete this.validators[a], this
            },
            getErrorMessage: function(b) {
                var c;
                return c = "type" === b.name ? a.ParsleyConfig.i18n[this.locale][b.name][b.requirements] : this.formatMesssage(a.ParsleyConfig.i18n[this.locale][b.name], b.requirements), "" !== c ? c : a.ParsleyConfig.i18n[this.locale].defaultMessage
            },
            formatMesssage: function(a, b) {
                if ("object" == typeof b) {
                    for (var c in b) a = this.formatMesssage(a, b[c]);
                    return a
                }
                return "string" == typeof a ? a.replace(new RegExp("%s", "i"), b) : ""
            },
            validators: {
                notblank: function() {
                    return $.extend((new Validator.Assert).NotBlank(), {
                        priority: 2
                    })
                },
                required: function() {
                    return $.extend((new Validator.Assert).Required(), {
                        priority: 512
                    })
                },
                type: function(a) {
                    var b;
                    switch (a) {
                        case "email":
                            b = (new Validator.Assert).Email();
                            break;
                        case "number":
                            b = (new Validator.Assert).Regexp("^-?(?:\\d+|\\d{1,3}(?:,\\d{3})+)?(?:\\.\\d+)?$");
                            break;
                        case "integer":
                            b = (new Validator.Assert).Regexp("^-?\\d+$");
                            break;
                        case "digits":
                            b = (new Validator.Assert).Regexp("^\\d+$");
                            break;
                        case "alphanum":
                            b = (new Validator.Assert).Regexp("^\\w+$", "i");
                            break;
                        case "url":
                            b = (new Validator.Assert).Regexp("(https?:\\/\\/)?(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,4}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)", "i");
                            break;
                        default:
                            throw new Error("validator type `" + a + "` is not supported")
                    }
                    return $.extend(b, {
                        priority: 256
                    })
                },
                pattern: function(a) {
                    return $.extend((new Validator.Assert).Regexp(a), {
                        priority: 64
                    })
                },
                minlength: function(a) {
                    return $.extend((new Validator.Assert).Length({
                        min: a
                    }), {
                        priority: 30
                    })
                },
                maxlength: function(a) {
                    return $.extend((new Validator.Assert).Length({
                        max: a
                    }), {
                        priority: 30
                    })
                },
                length: function(a) {
                    return $.extend((new Validator.Assert).Length({
                        min: a[0],
                        max: a[1]
                    }), {
                        priority: 32
                    })
                },
                mincheck: function(a) {
                    return this.minlength(a)
                },
                maxcheck: function(a) {
                    return this.maxlength(a)
                },
                check: function(a) {
                    return this.length(a)
                },
                min: function(a) {
                    return $.extend((new Validator.Assert).GreaterThanOrEqual(a), {
                        priority: 30
                    })
                },
                max: function(a) {
                    return $.extend((new Validator.Assert).LessThanOrEqual(a), {
                        priority: 30
                    })
                },
                range: function(a) {
                    return $.extend((new Validator.Assert).Range(a[0], a[1]), {
                        priority: 32
                    })
                },
                equalto: function(a) {
                    return $.extend((new Validator.Assert).Callback(function(a, b) {
                        return a === $(b).val()
                    }, a), {
                        priority: 256
                    })
                }
            }
        };
        var g = function() {
            this.__class__ = "ParsleyUI"
        };
        g.prototype = {
            listen: function() {
                $.listen("parsley:form:init", this, this.setupForm), $.listen("parsley:field:init", this, this.setupField), $.listen("parsley:field:validated", this, this.reflow), $.listen("parsley:form:validated", this, this.focus), $.listen("parsley:field:reset", this, this.reset), $.listen("parsley:form:destroy", this, this.destroy), $.listen("parsley:field:destroy", this, this.destroy)
            },
            reflow: function(a) {
                if ("undefined" != typeof a._ui && !1 !== a._ui.active) {
                    var b = this.diff(a.validationResult, a._ui.lastValidationResult);
                    a._ui.lastValidationResult = a.validationResult, a._ui.validatedOnce = !0, this.manageStatusClass(a), this.manageErrorsMessages(a, b), this.actualizeTriggers(a), (b.kept.length || b.added.length) && "undefined" == typeof a._ui.failedOnce && this.manageFailingFieldTrigger(a)
                }
            },
            manageStatusClass: function(a) {
                !0 === a.validationResult ? this._successClass(a) : a.validationResult.length > 0 ? this._errorClass(a) : this._resetClass(a)
            },
            manageErrorsMessages: function(a, b) {
                if ("undefined" != typeof a.options.errorMessage) return void(b.added.length || b.kept.length ? (0 === a._ui.$errorsWrapper.find(".parsley-custom-error-message").length && a._ui.$errorsWrapper.append($(a.options.errorTemplate).addClass("parsley-custom-error-message")), a._ui.$errorsWrapper.addClass("filled").find(".parsley-custom-error-message").html(a.options.errorMessage)) : a._ui.$errorsWrapper.removeClass("filled").find(".parsley-custom-error-message").remove());
                for (var c = 0; c < b.removed.length; c++) a._ui.$errorsWrapper.removeClass("filled").find(".parsley-" + b.removed[c].assert.name).remove();
                for (c = 0; c < b.added.length; c++) a._ui.$errorsWrapper.addClass("filled").append($(a.options.errorTemplate).addClass("parsley-" + b.added[c].assert.name).html(this.getErrorMessage(a, b.added[c].assert)));
                for (c = 0; c < b.kept.length; c++) a._ui.$errorsWrapper.addClass("filled").find(".parsley-" + b.kept[c].assert.name).html(this.getErrorMessage(a, b.kept[c].assert))
            },
            focus: function(a) {
                if (!0 !== a.validationResult && "none" !== a.options.focus) {
                    for (var b = null, c = 0; c < a.fields.length; c++)
                        if (!0 !== a.fields[c].validationResult && a.fields[c].validationResult.length > 0 && "undefined" == typeof a.fields[c].options.noFocus) {
                            if ("first" === a.options.focus) return void a.fields[c].$element.focus();
                            b = a.fields[c]
                        }
                    null !== b && b.$element.focus()
                }
            },
            getErrorMessage: function(b, c) {
                var d = c.name + "Message";
                return "undefined" != typeof b.options[d] ? b.options[d] : a.ParsleyValidator.getErrorMessage(c)
            },
            diff: function(a, b, c) {
                for (var d = [], e = [], f = 0; f < a.length; f++) {
                    for (var g = !1, h = 0; h < b.length; h++)
                        if (a[f].assert.name === b[h].assert.name) {
                            g = !0;
                            break
                        }
                    g ? e.push(a[f]) : d.push(a[f])
                }
                return {
                    kept: e,
                    added: d,
                    removed: c ? [] : this.diff(b, a, !0).added
                }
            },
            setupForm: function(a) {
                a.$element.on("submit.Parsley", !1, $.proxy(a.onSubmitValidate, a)), !1 !== a.options.uiEnabled && a.$element.attr("novalidate", "")
            },
            setupField: function(a) {
                var b = {
                    active: !1
                };
                !1 !== a.options.uiEnabled && (b.active = !0, a.$element.attr(a.options.namespace + "id", a.__id__), b.$errorClassHandler = this._manageClassHandler(a), b.errorsWrapperId = "parsley-id-" + ("undefined" != typeof a.options.multiple ? "multiple-" + a.options.multiple : a.__id__), b.$errorsWrapper = $(a.options.errorsWrapper).attr("id", b.errorsWrapperId), b.lastValidationResult = [], b.validatedOnce = !1, b.validationInformationVisible = !1, a._ui = b, this._insertErrorWrapper(a), this.actualizeTriggers(a))
            },
            _manageClassHandler: function(a) {
                if ("string" == typeof a.options.classHandler && $(a.options.classHandler).length) return $(a.options.classHandler);
                var b = a.options.classHandler(a);
                return "undefined" != typeof b && b.length ? b : "undefined" == typeof a.options.multiple ? a.$element : a.$element.parent()
            },
            _insertErrorWrapper: function(a) {
                if ("string" == typeof a.options.errorsContainer && $(a.options.errorsContainer).length) return $(a.options.errorsContainer).append(a._ui.$errorsWrapper);
                var b = a.options.errorsContainer(a);
                return "undefined" != typeof b && b.length ? b.append(a._ui.$errorsWrapper) : "undefined" == typeof a.options.multiple ? a.$element.after(a._ui.$errorsWrapper) : a.$element.parent().after(a._ui.$errorsWrapper)
            },
            actualizeTriggers: function(a) {
                if (a.$element.off(".Parsley"), !1 !== a.options.trigger) {
                    var b = a.options.trigger.replace(/^\s+/g, "").replace(/\s+$/g, "");
                    "" !== b && a.$element.on(b.split(" ").join(".Parsley ") + ".Parsley", !1, $.proxy("function" == typeof a.eventValidate ? a.eventValidate : this.eventValidate, a))
                }
            },
            eventValidate: function(a) {
                new RegExp("key").test(a.type) && !this._ui.validationInformationVisible && this.getValue().length <= this.options.validationThreshold || (this._ui.validatedOnce = !0, this.validate())
            },
            manageFailingFieldTrigger: function(a) {
                return a._ui.failedOnce = !0, a.options.multiple && $("[" + a.options.namespace + 'multiple="' + a.options.multiple + '"]').each(function() {
                    return new RegExp("change", "i").test($(this).parsley().options.trigger || "") ? void 0 : $(this).parsley().$element.on("change.ParsleyFailedOnce", !1, $.proxy(a.validate, a))
                }), new RegExp("keyup", "i").test(a.options.trigger || "") ? void 0 : a.$element.on("keyup.ParsleyFailedOnce", !1, $.proxy(a.validate, a))
            },
            reset: function(a) {
                a.$element.off(".Parsley"), a.$element.off(".ParsleyFailedOnce"), "ParsleyForm" !== a.__class__ && (a._ui.$errorsWrapper.children().each(function() {
                    $(this).remove()
                }), this._resetClass(a), a._ui.validatedOnce = !1, a._ui.lastValidationResult = [], a._ui.validationInformationVisible = !1)
            },
            destroy: function(a) {
                this.reset(a), "ParsleyForm" !== a.__class__ && (a._ui.$errorsWrapper.remove(), delete a._ui)
            },
            _successClass: function(a) {
                a._ui.validationInformationVisible = !0, a._ui.$errorClassHandler.removeClass(a.options.errorClass).addClass(a.options.successClass)
            },
            _errorClass: function(a) {
                a._ui.validationInformationVisible = !0, a._ui.$errorClassHandler.removeClass(a.options.successClass).addClass(a.options.errorClass)
            },
            _resetClass: function(a) {
                a._ui.$errorClassHandler.removeClass(a.options.successClass).removeClass(a.options.errorClass)
            }
        };
        var h = function(a, b, d, e) {
            this.__class__ = "OptionsFactory", this.__id__ = c.hash(4), this.formOptions = null, this.fieldOptions = null, this.staticOptions = $.extend(!0, {}, a, b, d, {
                namespace: e
            })
        };
        h.prototype = {
            get: function(a) {
                if ("undefined" == typeof a.__class__) throw new Error("Parsley Instance expected");
                switch (a.__class__) {
                    case "Parsley":
                        return this.staticOptions;
                    case "ParsleyForm":
                        return this.getFormOptions(a);
                    case "ParsleyField":
                        return this.getFieldOptions(a);
                    default:
                        throw new Error("Instance " + a.__class__ + " is not supported")
                }
            },
            getFormOptions: function(a) {
                return this.formOptions = c.attr(a.$element, this.staticOptions.namespace), $.extend({}, this.staticOptions, this.formOptions)
            },
            getFieldOptions: function(a) {
                return this.fieldOptions = c.attr(a.$element, this.staticOptions.namespace), $.extend({}, this.staticOptions, this.formOptions, this.fieldOptions)
            }
        };
        var i = function(a, b) {
            if (this.__class__ = "ParsleyForm", this.__id__ = c.hash(4), "Parsley" !== c.get(b, "__class__")) throw new Error("You must give a Parsley instance");
            this.parsleyInstance = b, this.init($(a))
        };
        i.prototype = {
            init: function(a) {
                this.$element = a, this.validationResult = null, this.options = this.parsleyInstance.OptionsFactory.get(this), this.bindFields()
            },
            onSubmitValidate: function(a) {
                return this.validate(b, a), !1 === this.validationResult && a instanceof $.Event && a.preventDefault(), this
            },
            validate: function(a, b) {
                this.submitEvent = b, this.validationResult = !0;
                var c = [];
                this.refreshFields(), $.emit("parsley:form:validate", this);
                for (var d = 0; d < this.fields.length; d++) a && a !== this.fields[d].options.group || (c = this.fields[d].validate(), !0 !== c && c.length > 0 && this.validationResult && (this.validationResult = !1));
                return $.emit("parsley:form:validated", this), this.validationResult
            },
            isValid: function(a) {
                this.refreshFields();
                for (var b = 0; b < this.fields.length; b++)
                    if ((!a || a === this.fields[b].options.group) && !1 === this.fields[b].isValid()) return !1;
                return !0
            },
            refreshFields: function() {
                return this.actualizeOptions().bindFields()
            },
            bindFields: function() {
                var a = this;
                return this.fields = [], this.$element.find(this.options.inputs).each(function() {
                    a.addField(this)
                }), this
            },
            addField: function(b) {
                var c = new a.Parsley(b, {}, this.parsleyInstance);
                return "ParsleyField" === c.__class__ && this.fields.push(c), this
            },
            removeField: function() {},
            reset: function() {},
            destroy: function() {}
        };
        var j = function(b, d, e, f, g) {
                if ("ParsleyField" !== c.get(b, "__class__")) throw new Error("ParsleyField instance expected");
                if ("function" != typeof a.ParsleyValidator.validators[d] && "Assert" !== a.ParsleyValidator.validators[d](e).__parentClass__) throw new Error("Valid validator expected");
                var h = function(b, d) {
                    return "undefined" != typeof b.options[d + "Priority"] ? b.options[d + "Priority"] : c.get(a.ParsleyValidator.validators[d](e), "priority", 2)
                };
                return f = f || h(b, d), $.extend(a.ParsleyValidator.validators[d](e), {
                    name: d,
                    requirements: e,
                    priority: f,
                    groups: [f],
                    isDomConstraint: g || c.attr(b.$element, b.options.namespace, d)
                })
            },
            k = function(a, b) {
                if (this.__class__ = "ParsleyField", this.__id__ = c.hash(4), "Parsley" !== c.get(b, "__class__")) throw new Error("You must give a Parsley instance");
                this.parsleyInstance = b, this.init($(a), b.options)
            };
        k.prototype = {
            init: function(a) {
                this.constraints = [], this.$element = a, this.validationResult = [], this.options = this.parsleyInstance.OptionsFactory.get(this), this.$element.is("input[type=radio], input[type=checkbox]") && "undefined" == typeof this.options.multiple && (this.options.multiple = this.$element.attr("name").replace(/(:|\.|\[|\]|\$)/g, ""), c.setAttr(this.$element, this.options.namespace, "multiple", this.options.multiple)), this.bindConstraints()
            },
            validate: function() {
                return $.emit("parsley:field:validate", this), $.emit("parsley:field:" + (this.isValid() ? "success" : "error"), this), $.emit("parsley:field:validated", this), this.validationResult
            },
            getConstraintsSortedPriorities: function() {
                for (var a = [], b = 0; b < this.constraints.length; b++) - 1 === a.indexOf(this.constraints[b].priority) && a.push(this.constraints[b].priority);
                return a.sort(function(a, b) {
                    return b - a
                }), a
            },
            isValid: function() {
                var a = this.getConstraintsSortedPriorities(),
                    b = this.getValue();
                if (this.refreshConstraints(), "" === b && !this.isRequired()) return this.validationResult = [];
                if (!1 === this.options.priorityEnabled) return !0 === (this.validationResult = this.validateThroughValidator(b, this.constraints, "Any"));
                for (var c = 0; c < a.length; c++)
                    if (!0 !== (this.validationResult = this.validateThroughValidator(b, this.constraints, a[c]))) return !1;
                return !0
            },
            isRequired: function() {
                var a = this.indexOfConstraint("required");
                return !(-1 === a || -1 !== a && !1 === this.constraints[a].requirements)
            },
            getValue: function() {
                if ("undefined" != typeof this.options.value) return this.options.value;
                if (this.$element.is("input[type=radio]")) return $("[" + this.options.namespace + 'multiple="' + this.options.multiple + '"]:checked').val() || "";
                if (this.$element.is("input[type=checkbox]")) {
                    var a = [];
                    return $("[" + this.options.namespace + 'multiple="' + this.options.multiple + '"]:checked').each(function() {
                        a.push($(this).val())
                    }), a.length ? a : ""
                }
                return this.$element.val()
            },
            refreshConstraints: function() {
                return this.actualizeOptions().bindConstraints()
            },
            bindConstraints: function() {
                for (var a = [], b = 0; b < this.constraints.length; b++) !1 === this.constraints[b].isDomConstraint && a.push(this.constraints[b]);
                this.constraints = a;
                for (var c in this.options) this.addConstraint(c, this.options[c]);
                return this.bindHtml5Constraints()
            },
            bindHtml5Constraints: function() {
                (this.$element.hasClass("required") || this.$element.attr("required")) && this.addConstraint("required", !0, b, !0), "string" == typeof this.$element.attr("pattern") && this.addConstraint("pattern", this.$element.attr("pattern"), b, !0), "undefined" != typeof this.$element.attr("min") && "undefined" != typeof this.$element.attr("max") ? this.addConstraint("range", [this.$element.attr("min"), this.$element.attr("max")], b, !0) : "undefined" != typeof this.$element.attr("min") ? this.addConstraint("min", this.$element.attr("min"), b, !0) : "undefined" != typeof this.$element.attr("max") && this.addConstraint("max", this.$element.attr("max"), b, !0);
                var a = this.$element.attr("type");
                return "undefined" == typeof a ? this : "number" === a ? this.addConstraint("type", "integer", b, !0) : new RegExp(a, "i").test("email url range") ? this.addConstraint("type", a, b, !0) : void 0
            },
            addConstraint: function(b, c, d, e) {
                return b = b.toLowerCase(), "function" == typeof a.ParsleyValidator.validators[b] && (constraint = new j(this, b, c, d, e), -1 !== this.indexOfConstraint(constraint.name) && this.removeConstraint(constraint.name), this.constraints.push(constraint)), this
            },
            removeConstraint: function(a) {
                for (var b = 0; b < this.constraints.length; b++)
                    if (a === this.constraints[b].name) {
                        this.constraints.splice(b, 1);
                        break
                    }
                return this
            },
            updateConstraint: function(a, b, c) {
                return this.removeConstraint(a).addConstraint(a, b, c)
            },
            indexOfConstraint: function(a) {
                for (var b = 0; b < this.constraints.length; b++)
                    if (a === this.constraints[b].name) return b;
                return -1
            }
        };
        var l = $({}),
            m = {};
        $.listen = function(a) {
            if ("undefined" == typeof m[a] && (m[a] = []), "function" == typeof arguments[1]) return m[a].push({
                fn: arguments[1]
            });
            if ("object" == typeof arguments[1] && "function" == typeof arguments[2]) return m[a].push({
                fn: arguments[2],
                ctxt: arguments[1]
            });
            throw new Error("Wrong parameters")
        }, $.listenTo = function(a, b, c) {
            if ("undefined" == typeof m[b] && (m[b] = []), !(a instanceof k || a instanceof i)) throw new Error("Must give Parsley instance");
            if ("string" != typeof b || "function" != typeof c) throw new Error("Wrong parameters");
            m[b].push({
                instance: a,
                fn: c
            })
        }, $.unsubscribe = function(a, b) {
            if ("undefined" != typeof m[a]) {
                if ("string" != typeof a || "function" != typeof b) throw new Error("Wrong arguments");
                for (var c = 0; c < m[a].length; c++)
                    if (m[a][c].fn === b) return m[a].splice(c, 1)
            }
        }, $.unsubscribeTo = function(a, b) {
            if ("undefined" != typeof m[b]) {
                if (!(a instanceof k || a instanceof i)) throw new Error("Must give Parsley instance");
                for (var c = 0; c < m[b].length; c++)
                    if ("undefined" != typeof m[b][c].instance && m[b][c].instance.__id__ === a.__id__) return m[b].splice(c, 1)
            }
        }, $.unsubscribeAll = function(a) {
            "undefined" != typeof m[a] && delete m[a]
        }, $.emit = function(a, b) {
            if ("undefined" != typeof m[a])
                for (var c = 0; c < m[a].length; c++)
                    if ("undefined" != typeof m[a][c].instance) {
                        if (b instanceof k || b instanceof i)
                            if (m[a][c].instance.__id__ !== b.__id__) {
                                if (m[a][c].instance instanceof i && b instanceof k)
                                    for (var d = 0; d < m[a][c].instance.fields.length; d++)
                                        if (m[a][c].instance.fields[d].__id__ === b.__id__) {
                                            m[a][c].fn.apply(l, Array.prototype.slice.call(arguments, 1));
                                            continue
                                        }
                            } else m[a][c].fn.apply(l, Array.prototype.slice.call(arguments, 1))
                    } else m[a][c].fn.apply("undefined" != typeof m[a][c].ctxt ? m[a][c].ctxt : l, Array.prototype.slice.call(arguments, 1))
        }, $.subscribed = function() {
            return m
        }, a.ParsleyConfig = a.ParsleyConfig || {}, a.ParsleyConfig.i18n = a.ParsleyConfig.i18n || {}, a.ParsleyConfig.i18n.en = $.extend(a.ParsleyConfig.i18n.en || {}, {
            defaultMessage: "This value seems to be invalid.",
            type: {
                email: "This value should be a valid email.",
                url: "This value should be a valid url.",
                number: "This value should be a valid number.",
                integer: "This value should be a valid integer.",
                digits: "This value should be digits.",
                alphanum: "This value should be alphanumeric."
            },
            notblank: "This value should not be blank.",
            required: "This value is required.",
            pattern: "This value seems to be invalid.",
            min: "This value should be greater than or equal to %s.",
            max: "This value should be lower than or equal to %s.",
            range: "This value should be between %s and %s.",
            minlength: "Please enter min %s characters.",
            maxlength: "This value is too long. It should have %s characters or less.",
            length: "This value length is invalid. It should be between %s and %s characters long.",
            mincheck: "You must select at least %s choices.",
            maxcheck: "You must select %s choices or less.",
            check: "You must select between %s and %s choices.",
            equalto: "This value should be the same."
        }), "undefined" != typeof a.ParsleyValidator && a.ParsleyValidator.addCatalog("en", a.ParsleyConfig.i18n.en, !0);
        var n = function(a, b, d) {
            if (this.__class__ = "Parsley", this.__version__ = "2.0.0-rc1", this.__id__ = c.hash(4), "undefined" == typeof a) throw new Error("You must give an element");
            return this.init($(a), b, d)
        };
        n.prototype = {
            init: function(b, e, f) {
                return this.$element = b, this.$element.data("Parsley") ? this.$element.data("Parsley") : (this.OptionsFactory = new h(d, c.get(a, "ParsleyConfig", {}), e, this.getNamespace(e)), e = this.OptionsFactory.staticOptions, this.$element.is("form") || c.attr(this.$element, e.namespace, "validate") && !this.$element.is(e.inputs) ? this.bind("parsleyForm", f) : this.$element.is(e.inputs) && !this.$element.is(e.excluded) ? this.bind("parsleyField", f) : this)
            },
            getNamespace: function(b) {
                return "undefined" != typeof this.$element.data("parsleyNamespace") ? this.$element.data("parsleyNamespace") : "undefined" != typeof c.get(b, "namespace") ? b.namespace : "undefined" != typeof c.get(a, "ParsleyConfig.namespace") ? a.ParsleyConfig.namespace : d.namespace
            },
            bind: function(b, c) {
                switch (b) {
                    case "parsleyForm":
                        parsleyInstance = $.extend(new i(this.$element, c || this), new e, a.ParsleyExtend);
                        break;
                    case "parsleyField":
                        parsleyInstance = $.extend(new k(this.$element, c || this), new e, a.ParsleyExtend);
                        break;
                    default:
                        throw new Error(b + "is not a supported Parsley type")
                }
                return this.$element.data("Parsley", parsleyInstance), $.emit("parsley:" + ("parsleyForm" === b ? "form" : "field") + ":init", parsleyInstance), parsleyInstance
            }
        }, $.fn.parsley = $.fn.psly = function(a) {
            return new n(this, a)
        }, g = "function" == typeof c.get(a.ParsleyConfig, "ParsleyUI") ? (new a.ParsleyConfig.ParsleyUI).listen() : (new g).listen(), "undefined" == typeof a.ParsleyExtend && (a.ParsleyExtend = {}), "undefined" == typeof a.ParsleyConfig && (a.ParsleyConfig = {}), a.Parsley = a.psly = n, a.ParsleyUtils = c, a.ParsleyValidator = new f(a.ParsleyConfig.validators, a.ParsleyConfig.i18n), !1 !== c.get(a, "ParsleyConfig.autoBind") && $(document).ready(function() {
            $("[data-parsley-validate]").each(function() {
                new n(this)
            })
        })
    }(window);