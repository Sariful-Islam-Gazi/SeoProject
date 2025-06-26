/////Move Label/////
function setFileInput() {
    $(".form_input").find("input[type='file'].file_uploader").each(function () {
        $(this).closest(".form_input").append('<div class="uploader_preview"><img src=""><div class="preview_msg"><svg style="margin:auto;opacity:0.5;" xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 0 24 24"><path d="M6.5 20Q4.22 20 2.61 18.43 1 16.85 1 14.58 1 12.63 2.17 11.1 3.35 9.57 5.25 9.15 5.88 6.85 7.75 5.43 9.63 4 12 4 14.93 4 16.96 6.04 19 8.07 19 11 20.73 11.2 21.86 12.5 23 13.78 23 15.5 23 17.38 21.69 18.69 20.38 20 18.5 20H13Q12.18 20 11.59 19.41 11 18.83 11 18V12.85L9.4 14.4L8 13L12 9L16 13L14.6 14.4L13 12.85V18H18.5Q19.55 18 20.27 17.27 21 16.55 21 15.5 21 14.45 20.27 13.73 19.55 13 18.5 13H17V11Q17 8.93 15.54 7.46 14.08 6 12 6 9.93 6 8.46 7.46 7 8.93 7 11H6.5Q5.05 11 4.03 12.03 3 13.05 3 14.5 3 15.95 4.03 17 5.05 18 6.5 18H9V20M12 13Z" /></svg><p>' + ($(this).attr("label") !== undefined ? $(this).attr("label") : 'Click / Drop to Upload') + '<br><small class="text-primary">Accept Only - ' + ($(this).attr("accept") !== undefined ? $(this).attr("accept") : '') + '</small></p></div><button type="button" class="remove_preview">Remove</button></div>')
    });
    $(".form_input").find("input[type='file'].file_browser").each(function () {
        if (!$(this).next(".brows_info").length) {
            $(this).after("<div class='brows_info'>" + ($(this).attr("label") !== undefined ? $(this).attr("label") : 'Upload') + " (" + ($(this).attr("accept") !== undefined ? $(this).attr("accept") : '') + ")</div>");
        } else {
            var label = $(this).attr("label") !== undefined ? $(this).attr("label") : 'Upload';
            var accept = $(this).attr("accept") !== undefined ? $(this).attr("accept") : '';
            $(this).next(".brows_info").html(label + " (" + accept + ")");
        }
    });

}
$(document).ready(function () {
    $(".form_input .select_multiple").each(function () {
        tagInputs($(this));
    });
    $(".form_input input[type='text'][data-char], .form_input input[type='email'][data-char], .form_input textarea[data-char]").each(function () {
        $(this).closest(".form_input").find("label").append("<span class='max_char' style='display:none'>" + $(this).val().length + "/" + $(this).data('char') + "</span>")
    });
    // $(".form_input").find("[required='true']").each(function () {
    //     $(this).closest(".form_input").after("<p class='valid_text' style='display:none'>&times; This field is required!</p>")
    // });
    $(".search_select").each(function () {
        $(this).find("ul").prepend("<div class='search_input'><input type='search' data-char='50' placeholder='search...'></div>");
    });
    setFileInput();
    formInput();
});

function removeReqClass(ele) {
    // Check if the input has a value
    if (ele.value.trim() !== "") {
        $(ele).removeClass("reqFld"); // Remove the 'reqFld' class if there's a value
    }
}
function formInput() {
    $(".form_input").each(function () {
        $(this).find("input, select, textarea").each(function () {
            /// Move label ///
            if ($(this).val() == "") {
                $(this).removeClass("moveLabel");
                $(this).closest(".form_input").find("label").find(".max_char").fadeOut();
            } else {
                $(this).addClass("moveLabel");
                $(this).closest(".form_input").find("label").find(".max_char").fadeIn();
            }

            ///Max Length///
            if ($(this).data("char") !== undefined) {
                var maxLength = $(this).data("char");
                var length = $(this).val().length;
                if (length > maxLength) {
                    $(this).val($(this).val().substring(0, maxLength));
                    $(this).closest(".form_input").find("label").find(".max_char").addClass("bg-warning");
                } else {
                    $(this).closest(".form_input").find("label").find(".max_char").removeClass("bg-warning");
                }
                $(this).closest(".form_input").find("label").find(".max_char").text($(this).val().length + "/" + $(this).data('char'));
            }

            /// Form Validation ///
            if ($(this).val() != "") {
                $(this).closest(".form_input").find(".valid_text").remove();    
                $(this).closest(".form_input").find("select[required='true'], input[required='true'], textarea[required='true']").removeClass("reqFld");
            }

            // Add validation for elements with class 'expire_date'
            if ($(this).hasClass('expire_date') && $(this).attr('type') === 'date') {
                var today = new Date();
                today.setHours(0, 0, 0, 0); // Set hours, minutes, seconds and milliseconds to 0 to compare only the date

                var inputDate = new Date($(this).val());
                inputDate.setHours(0, 0, 0, 0); // Set hours, minutes, seconds and milliseconds to 0 to compare only the date

                if (inputDate <= today) {
                    $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">License has expired. Please renew it.!</p>`);
                }
            }

            // Add validation for elements with class 'uk-postcode'
            if ($(this).hasClass('uk-postcode') && $(this).val() !== '' && $(this).val().length > 0) {
                var postcode = $(this).val();
                var postcodeRegex = /^([A-Z]{1,2}\d[A-Z\d]? ?\d[A-Z]{2}|GIR ?0A{2})$/;

                if (!postcodeRegex.test(postcode)) {
                    $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Invalid UK postcode. Please enter a valid one.</p>`);
                }
            }

        });

        $(".form_input .select_multiple").each(function () {
            tagInputs($(this));
        });
    });
}
$(document).on("blur focus input change", ".form_input input, .form_input select, .form_input textarea", function () {
    formInput();
});

/////Dropdown Select/////
$(document).on("click", ".custom_select input[type='text']", function () {
    $(".custom_select").not($(this).closest(".custom_select")).find("ul").hide();
    $(this).closest(".custom_select").find("ul").toggle();
    $(this).attr("readable", true);
    $(".search_select .search_input input[type='search']").val("");
    $(".custom_select ul li").show();
});
$(document).on("click", ".custom_select ul li", function () {
    if ($(this).hasClass("disabled")) {
        return false;
    } else {
        if ($(this).closest(".custom_select").hasClass("select_multiple")) {
            if ($(this).hasClass("selectAll")) {
                if ($(this).find("input").is(":checked")) {
                    $(this).closest(".select_multiple").find("li").each(function () {
                        $(this).find("input").prop("checked", false);
                        $(this).removeClass("checked");
                    });
                } else {
                    $(this).closest(".select_multiple").find("li").each(function () {
                        $(this).find("input").prop("checked", true);
                        $(this).addClass("checked");
                    });
                }
            } else {
                if ($(this).find("input").is(":checked")) {
                    $(this).find("input").prop("checked", false);
                    $(this).removeClass("checked");
                } else {
                    $(this).find("input").prop("checked", true);
                    $(this).addClass("checked");
                }
            }
            tagVals($(this).closest(".select_multiple"));

            if ($(this).closest(".select_multiple").find("li.checked").length == 0) {
                $(this).closest(".select_multiple").find("input").not("input[type='checkbox']").val("");
                $(this).closest(".select_multiple").find(".tags").html("");
            }

            formInput();

        } else {
            $(this).closest(".custom_select").find("input.forVal").val($(this).data("val"));
            $(this).closest(".custom_select").find("input.forText").val($(this).text().trim());
            formInput();
            $(this).closest(".custom_select").find("ul").hide();
        }
        $(".search_select .search_input input[type='search']").val("");
        $(".custom_select ul li").show();
    }
});

$(document).on("click", ".select_multiple .tags span i", function () {
    $(this).closest(".select_multiple").find("ul").find("li:contains(" + $(this).closest("span").text() + ")").click();
    $(this).closest("span").remove();
});

function tagVals(ele) {
    var ele = $(ele);
    var tagsContainer = ele.find(".tags");

    if (tagsContainer.length === 0) {
        tagsContainer = $("<div class='tags'></div>");
        ele.append(tagsContainer);
    } else {
        tagsContainer.empty();
    }

    var tagValues = [];

    ele.find("li.checked").each(function () {
        var $this = $(this);
        var text = $this.data("val").trim();
        if (text != "blank_val") {
            var span = "<span>" + $this.text() + "<i class='mdi mdi-close'></i></span>";
            tagValues.push(text);
            tagsContainer.append(span);
        }
    });
    ele.find("input").not("input[type='checkbox']").val(tagValues.join("|"));
}


function tagInputs(ele) {
    var $ele = $(ele);
    var tagsContainer = $ele.find(".tags");

    if (tagsContainer.length === 0) {
        tagsContainer = $("<div class='tags'></div>");
        $ele.append(tagsContainer);
    } else {
        tagsContainer.empty();
    }

    var text = $ele.find("input").not("input[type='checkbox']").val().trim();
    var parts = text.split('|');

    $ele.find("li").each(function () {
        if ($(this).data("val") && $(this).data("val") != null) {
            var val = $(this).data("val").trim();
            if (val != "blank_val") {
                if (parts.includes(val)) {
                    $(this).addClass("checked").find("input").prop("checked", true);
                } else {
                    $(this).removeClass("checked").find("input").prop("checked", false);
                }
            }
        }
    });

    parts.forEach(function (part) {
        var matchingLi = $ele.find("li[data-val='" + part.trim() + "']");
        if (matchingLi.length) {
            var tagText = matchingLi.text().trim();
            tagsContainer.append('<span>' + tagText + '<i class="mdi mdi-close"></i></span>');
        }
    });

    checkAllorNone(ele);
}
function checkAllorNone(ele) {
    var $ele = $(ele);
    //start check if all checkboxes are checked
    var allChecked = true;
    $ele.find("li").not("li.selectAll").each(function () {
        var $inputs = $(this).find("input[type='checkbox']");

        $inputs.each(function () {
            if (!$(this).prop("checked")) {
                allChecked = false;
                return false;
            }
        });

        if (!allChecked) {
            return false;
        }
    });

    if (allChecked) {
        console.log("all checked=>tagInputs");
        $ele.find("li.selectAll").addClass("checked").find("input").prop("checked", true);
    } else {
        console.log("not all checked=>tagInputs");
        $ele.find("li.selectAll").removeClass("checked").find("input").prop("checked", false);
    }
    //end check if all checkboxes are checked
}

$(document).on("keyup paste change", ".search_input input[type='search']", function (e) {
    $(this).closest('ul').find('li:gt(0)').hide();
    var value = $(this).val().toLowerCase();
    $(this).closest('ul').find('li').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$(document).mouseup(function (e) {
    var container = $(".custom_select");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.find("ul").hide();
        $(".search_select .search_input input[type='search']").val("");
        $(".custom_select ul li").show();
    }
});

function isAllPresent(str) {
    // Regex to check if a string
    // contains uppercase, lowercase
    // special character & numeric value
    var pattern = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$"
    );

    // If the string is empty
    // then print No
    if (!str || str.length === 0) {
        return false;
    }

    // Print Yes If the string matches
    // with the Regex
    if (pattern.test(str)) {
        return true;
    } else {
        return false;
    }
}

function checkValidate(self) {
    var all_valid = "ok";

    self.find(".form_input").find(".valid_text").remove();
    self.find(".form_input").find("select[required='true'], input[required='true'], textarea[required='true']").removeClass("reqFld");

    self.find("select[required='true'], select[required], input[required='true'], input[required], textarea[required='true'], textarea[required]").each(function () {
        if ($(this).is(':checkbox') == false && $(this).val() == "") {
            all_valid = "no";
            $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">This Filed is Required!</p>`);
        }
        if ($(this).is(':checkbox') == true && $(this).is(":checked") == false) {
            all_valid = "no";
            $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">This Filed is Required!</p>`);
        }
    });

    if (self.find("input[name='otp']").length > 0 && self.find("input[name='otp']").val().length != 6) {
        all_valid = "no";
        self.find("input[name='otp']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Enter Valid OTP!</p>`);
    }

    if (self.find("input[name='id']").length > 0 && self.find("input[name='id']").val() == "" && self.find("input[name='password']").length > 0) {
        if (self.find("input[name='password']").val() == "") {
            all_valid = "no";
            self.find("input[name='password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Password is Required!</p>`);
        } else {
            if (isAllPresent(self.find("input[name='password']").val()) == false) {
                all_valid = "no";
                self.find("input[name='password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Password Pattern Mismatched!</p>`);
            }
        }
    }
    if (self.find("input[name='id']").length > 0 && self.find("input[name='id']").val() == "" && self.find("input[name='confirm_password']").length > 0) {
        if (self.find("input[name='confirm_password']").val() == "") {
            all_valid = "no";
            self.find("input[name='confirm_password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Confirm Password is Required!</p>`);
        } else {
            if (self.find('input[name="confirm_password"]').val() != self.find('input[name="password"]').val()) {
                all_valid = "no";
                self.find("input[name='confirm_password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Password & Confirm Password Mismatched!</p>`);
            }
        }
    }


    if (self.find("input[name='id']").length > 0 && self.find("input[name='id']").val() != "" && self.find("input[name='password']").length > 0 && self.find("input[name='password']").val() != "") {
        if (isAllPresent(self.find("input[name='password']").val()) == false) {
            all_valid = "no";
            self.find("input[name='password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Password Pattern Mismatched!</p>`);
        }
    }
    if (self.find("input[name='id']").length > 0 && self.find("input[name='id']").val() != "" && self.find("input[name='password']").val() != "" && self.find("input[name='confirm_password']").length > 0) {
        if (self.find('input[name="confirm_password"]').val() != self.find('input[name="password"]').val()) {
            all_valid = "no";
            self.find("input[name='confirm_password']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Password & Confirm Password Mismatched!</p>`);
        }
    }

    if (self.find('input[name="email"][required="true"]').length > 0 && (self.find("input[name='email']").val() == "" || (self.find("input[name='email']").val() != "" && IsEmail(self.find("input[name='email']").val()) == false))) {
        all_valid = "no";
        if (self.find("input[name='email']").addClass("reqFld").closest(".form_input").find(".valid_text").length) {
            self.find("input[name='email']").addClass("reqFld").closest(".form_input").find(".valid_text").html("Enter Valid Email!");
        } else {
            self.find("input[name='email']").addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Enter Valid Email!</p>`);
        }
    }

    // For Expire Date Validation
    self.find("input.expire_date[type='date']").each(function () {
        var today = new Date();
        today.setHours(0, 0, 0, 0); // Set hours, minutes, seconds and milliseconds to 0 to compare only the date

        var inputDate = new Date($(this).val());
        inputDate.setHours(0, 0, 0, 0); // Set hours, minutes, seconds and milliseconds to 0 to compare only the date

        if (inputDate <= today) {
            all_valid = "no";
            $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Expiration date should be in the future!</p>`);
        }
    });

    // For UK Postcode Validation
    self.find("input.uk-postcode").each(function () {
        var postcode = $(this).val();
        var postcodeRegex = /^([A-Z]{1,2}\d[A-Z\d]? ?\d[A-Z]{2}|GIR ?0A{2})$/;

        if (!postcodeRegex.test(postcode)) {
            all_valid = "no";
            $(this).addClass("reqFld").closest(".form_input").append(`<p class="valid_text">Invalid UK postcode. Please enter a valid one.</p>`);
        }
    });


    return all_valid;
}

$(document).on("click", ".drop_menu_left, .drop_menu_right", function (e) {
    $(".drop_menu_left, .drop_menu_right").not(this).find("input").prop("checked", false);
    $(".drop_menu_left, .drop_menu_right").css({ "z-index": "9" })
    $(this).css({ "z-index": "999" });
    e.stopPropagation();
})
$(document).on("click", function (e) {
    if (!$(e.target).closest(".drop_menu_left, .drop_menu_right").length) {
        $(".drop_menu_left, .drop_menu_right").not(this).find("input").prop("checked", false);
    }
});

////File Browser////
$(document).on("change", ".form_input input[type='file']", function (e) {
    // var ths = $(this);
    var files = $(this)[0].files;

    if (files.length > 0) {
        var isAllowed = true;

        if ($(this).attr('accept') !== undefined) {
            var parts = $(this).attr("accept").split(',');
            var allowstr = [];
            parts.forEach(function (part) {
                allowstr.push("'" + part + "'");
            });
            var allowedTypes = allowstr.join(', ');

            for (var i = 0; i < files.length; i++) {
                var extension = files[i].name.split('.').pop().toLowerCase();
                if (allowedTypes.indexOf(extension) === -1) {
                    isAllowed = false;
                    break;
                }
            }
        }

        if (isAllowed == false) {
            e.preventDefault();
            alert("Please select only " + $(this).attr('accept') + " files.");
            $(this).val("");
            $(this).closest(".form_input").find(".uploader_preview").find("img").attr("src", "");
            $(this).closest(".form_input").find(".file_info").text("");
        }
    }
});

$(document).on("change", ".form_input input.file_browser", function () {
    var files = $(this)[0].files;

    if (files.length > 0) {
        var fileNames = "";
        for (var i = 0; i < files.length; i++) {
            fileNames += files[i].name + ", ";
        }
        fileNames = fileNames.slice(0, -2);
        $(this).next(".brows_info").text(fileNames);
        // Example: var fileSize = files[0].size;
    } else {
        $(this).next(".brows_info").text(($(this).attr("label") !== undefined ? $(this).attr("label") : '') + " (" + ($(this).attr("accept") !== undefined ? $(this).attr("accept") : '') + ")");
    }
});

////Preview Img////
$(document).on("click", ".uploader_preview", function () {
    $(this).prev("input.file_uploader").click();
})
$(document).on("change", "input[type='file'].file_uploader", function () {
    var obj = $(this);
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
        // Set the src attribute of the image preview
        $(obj).next(".uploader_preview").find("img").attr("src", e.target.result);

        // Remove any existing file info and add the new file info
        $(obj).next(".uploader_preview").next(".file_info").remove();
        $(obj).next(".uploader_preview").after("<p class='file_info' style='margin:5px 0 0; font-size: 13px; color: #999;'>" + $(obj).val() + "</p>");

        // Set the Base64 value to another input field
        var base64Value = e.target.result;
        $(obj).closest(".add_imageField").find("input.img_blob").val(base64Value);
    };
    reader.readAsDataURL(file);
});
$(document).on("click", ".uploader_preview button.remove_preview", function (e) {
    e.stopPropagation();
    $(this).closest(".uploader_preview").find("img").attr("src", "");
    $(this).closest(".uploader_preview").prev("input.file_uploader").val("");
});

restrictChars(
    ".mob_with_prefix",
    "+1234567890"
);
restrictChars(
    ".mobile_number",
    "1234567890"
);
restrictChars(
    ".numeric",
    "1234567890"
);
restrictChars(
    ".numbers-letters",
    "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"
);
restrictChars(
    ".numbers-letters-spaces",
    "1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz"
);
restrictChars(
    ".uppercase-lowercase-spaces",
    "ABCDEFGHIJK LMNOPQRSTUVWXYZabcdefghij klmnopqrstuvwxyz"
);
restrictChars(
    ".alpha-numeric-others",
    "1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz &_()#@+-/"
);

function restrictChars(selector, allowedChars) {
    $(selector).on("keypress", function (e) {
        const chr = String.fromCharCode(e.which);
        if (allowedChars.indexOf(chr) < 0) {
            return false;
        }
    });

    $(selector).on("keydown keyup change", function (e) {
        let val = $(this).val();
        let pattern = "[^" + allowedChars + "]";
        let regexp = new RegExp(pattern, "g");
        $(this).val($(this).val().replace(regexp, ""));
    });
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        var domain = email.split('@')[1];
        var topLevelDomain = domain.split('.')[1];
        if (!topLevelDomain) {
            return false; // No top-level domain present
        }
        return true;
    }
}


$(document).on("focus", "#psw", function () {
    $("#pswMessage").show();
});

$(document).on("keyup", "#psw", function () {
    var pswd = $(this).val();

    //validate the length
    if (pswd.length < 8) {
        $('#length').removeClass('valid').addClass('invalid');
    } else {
        $('#length').removeClass('invalid').addClass('valid');
    }

    //validate letter
    if (pswd.match(/[A-z]/)) {
        $('#letter').removeClass('invalid').addClass('valid');
    } else {
        $('#letter').removeClass('valid').addClass('invalid');
    }

    //validate uppercase letter
    if (pswd.match(/[A-Z]/)) {
        $('#capital').removeClass('invalid').addClass('valid');
    } else {
        $('#capital').removeClass('valid').addClass('invalid');
    }

    //validate number
    if (pswd.match(/\d/)) {
        $('#number').removeClass('invalid').addClass('valid');
    } else {
        $('#number').removeClass('valid').addClass('invalid');
    }

    //validate spacial
    if (pswd.match(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/)) {
        $('#special').removeClass('invalid').addClass('valid');
    } else {
        $('#special').removeClass('valid').addClass('invalid');
    }
});

//Show and Hide Password
$(document).on("click", '._showPassword', function () {
    if ($(this).hasClass('_hidePassword')) {
        $(this).removeClass("mdi-eye-off-outline _hidePassword").addClass("mdi-eye");
        $(this).closest(".form_input").find("input[type='text']").attr("type", "password");
    } else {
        $(this).removeClass("mdi-eye").addClass("mdi-eye-off-outline _hidePassword");
        $(this).closest(".form_input").find("input[type='password']").attr("type", "text");
    }
});


function submit_form(self) {
    $(self).closest("form").submit();
}
//////////////////////////////Form Js End//////////////////////////////


//////////////////////////////Custom Plugins//////////////////////////////
function showToast(message, type) {
    if ($("#toaster").length == 0) {
        $("body").append('<div id="toaster" class="toaster"></div>');
    }
    var toaster = $('#toaster');
    toaster.html('<i class="mdi mdi-' + getIcon(type) + '"></i>' + message);
    toaster.removeClass().addClass('toaster show bg-' + type);
    setTimeout(function () {
        toaster.removeClass('show').addClass('hide');
        setTimeout(function () {
            toaster.remove();
        }, 500);
    }, 3000);
}

function getIcon(type) {
    switch (type) {
        case 'success':
            return 'check-circle-outline';
        case 'error':
            return 'alert-circle-outline';
        case 'warning':
            return 'alert-outline';
        case 'info':
            return 'information-outline';
        case 'danger':
            return 'alert-octagon-outline';
        default:
            return '';
    }
}

function resizeImage(blob, maxWidth, maxHeight, callback) {
    var img = new Image();
    img.onload = function () {
        var width = img.width;
        var height = img.height;

        // Calculate new dimensions while maintaining aspect ratio
        if (width > height) {
            if (width > maxWidth) {
                height *= maxWidth / width;
                width = maxWidth;
            }
        } else {
            if (height > maxHeight) {
                width *= maxHeight / height;
                height = maxHeight;
            }
        }

        // Create a canvas element to draw the resized image
        var canvas = document.createElement("canvas");
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        // Convert the canvas to a Blob object
        canvas.toBlob(function (resizedBlob) {
            callback(resizedBlob);
        }, "image/jpeg", 1); // JPEG quality set to 1 (maximum quality)
    };
    img.src = URL.createObjectURL(blob);
}




// JR
$(document).ready(function () {
    // Date Key Press Off
    $(document).on('keydown', 'input[type="date"]', function (e) {
        e.preventDefault();
    });

    // Date Validation
    $('.end_date').on('change', function () {
        var startDate = $(this).closest('.date_validate').prev().find('.start_date').val();
        var endDate = $(this).val();

        if (!startDate) {
            showToast('Please fill in the start date first.', 'danger');
            $(this).val(''); // Clear the input field
        } else if (new Date(endDate) <= new Date(startDate)) {
            showToast('End date cannot be the same or before the start date.', 'danger');
            $(this).val(''); // Clear the input field
        }
    });

    $('.start_date').on('change', function () {
        var endDate = $(this).closest('.date_validate').next().find('.end_date').val();
        var startDate = $(this).val();

        if (endDate && new Date(startDate) >= new Date(endDate)) {
            showToast('Start date cannot be the same or after the end date.', 'danger');
            $(this).val(''); // Clear the input field
        }
    });
});

function copy_text(ele) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(ele).text()).select();
    document.execCommand("copy");
    $temp.remove();
    showToast('Copied', 'success');
}