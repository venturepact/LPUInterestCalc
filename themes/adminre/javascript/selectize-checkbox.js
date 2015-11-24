/**
 * Plugin: "optgroup_checkbox" (selectize.js)
 * Copyright (c) 2015  Dmitri Piatkov & contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this
 * file except in compliance with the License. You may obtain a copy of the License at:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under
 * the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF
 * ANY KIND, either express or implied. See the License for the specific language
 * governing permissions and limitations under the License.
 *
 * @author Dmitri Piatkov <dkrnl@yandex.ru>
 */

Selectize.define("optgroup_checkbox", function() {
    var self = this;
    if (self.settings.mode === "single") {
        return;
    }

    self.optgroup_checkbox_checked = {};
    self.settings.render.optgroup_header = function(data, escape) {
        var checked = self.optgroup_checkbox_checked[data.value];
        return "<div class=\"optgroup-header checkbox\">" +
                   "<label for=\"" + escape(self.$input.attr("id")) + "-" + escape(data.value) + "\">" +
                       "<input type=\"checkbox\"" +
                           " id=\"" + escape(self.$input.attr("id")) + "-" + escape(data.value) + "\"" + 
                           " data-optgroup=\"" + escape(data.value)+ "\"" +
                           (checked && checked.size === checked.checked ? " checked=\"checked\"" : "") + 
                       ">" + escape(data.label) + 
                   "</label>" +
               "</div>";
    };
    self.on("optgroup_checkbox", function() {
        var value = self.$input.val();
        self.optgroup_checkbox_checked = {};
        $.each(self.options, function() {
            if (!(this.optgroup in self.optgroup_checkbox_checked)) {
                self.optgroup_checkbox_checked[this.optgroup] = {size: 0, checked: 0};
            }
            if ($.inArray(this.value, value) !== -1) {
                self.optgroup_checkbox_checked[this.optgroup].checked++;
            }
            self.optgroup_checkbox_checked[this.optgroup].size++;
        });
        self.$dropdown_content.find("> .optgroup > .optgroup-header :checkbox").each(function() {
            var checkbox = $(this);
            var checked = self.optgroup_checkbox_checked[checkbox.data("optgroup")];
            checkbox.prop("checked", checked && checked.size === checked.checked);
        });
    });
    self.on("initialize", function() {
        self.trigger("optgroup_checkbox");
        self.$dropdown_content.on("mousedown", "> .optgroup > .optgroup-header :checkbox", function(event) {
            event.preventDefault();
            $(this).parent().trigger("click");
            return false;
        });
        self.$dropdown_content.on("mousedown", "> .optgroup > .optgroup-header label", function(event) {
            event.preventDefault();
            return false;
        });
        self.$dropdown_content.on("click", "> .optgroup > .optgroup-header label", function(event) {
            event.preventDefault();
            if (self.isLocked) {
                return;
            }
            var checkbox = $(":checkbox", this);
            var optgroup = checkbox.data("optgroup"), checked = checkbox.prop("checked");
            var scroll = self.$dropdown_content.scrollTop() || 0;
            $.map(Object.keys(self.options).reverse(), function(key) {
                var item = self.options[key];
                if (item.optgroup === optgroup) {
                    if (checked) {
                        self.removeItem(item.value, true);
                    } else {
                        self.addItem(item.value, true);
                    }
                }
            });
            self.$dropdown_content.scrollTop(scroll);
            self.trigger("change");
            if (self.deleteSelection()) {
                self.setCaret(self.items.length);
            }
            return false;
        });
        self.on("change", function(event) {
            self.trigger("optgroup_checkbox");
        });
    });
});
