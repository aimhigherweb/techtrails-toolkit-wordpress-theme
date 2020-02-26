jQuery.noConflict();

jQuery(document).ready(function($) {
	$(".side-nav .menu li, .main-nav .menu li").each(function() {
		$(this).html(
			$(this)
				.html()
				.replace("&amp;amp;", "&")
				.replace("&amp;", "&")
		);
	});

	$(".container table + p").each(function() {
		if ($.trim($(this).text()) == "") {
			$(this).remove();
		}
	});

	// Tables for mobile
	$(".main-content table").each(function() {
		$(this).wrap('<div class="overthrow clearfix"></div>');
	});

	$(".main-content .overthrow").each(function() {
		if (
			$(this).width() <
			$(this)
				.find("table")
				.width()
		) {
			$(
				'<div class="overthrow-message">scroll to see whole table</div>'
			).insertBefore($(this));
		}
	});

	// Contact form test
	var test = [
		"1 + 2 = ?",
		"2 + 3 = ?",
		"10 + 4 = ?",
		"5 + 5 = ?",
		"2 + 2 = ?",
		"8 + 1 = ?",
		"11 + 1 = ?",
		"10 + 5 = ?",
		"18 + 1 = ?",
		"15 + 2 = ?",
		"13 + 3 = ?",
		"20 + 1 = ?",
		"23 + 2 = ?",
		"26 + 1 = ?",
		"4 + 4 = ?",
		"3 + 3 = ?",
		"20 + 3 = ?",
		"24 + 4 = ?",
		"27 + 2 = ?",
		"18 + 2 = ?",
	];

	var answer = [
		"3",
		"5",
		"14",
		"10",
		"4",
		"9",
		"12",
		"15",
		"19",
		"17",
		"16",
		"21",
		"25",
		"27",
		"8",
		"6",
		"23",
		"28",
		"29",
		"20",
	];

	generate_test();
	$(".captcha-form #jsTest").show();
	$(".captcha-form #Test").val($(".captcha-form #TestAnswer").val());

	function generate_test() {
		window.num = 0;
		num = Math.round(Math.random() * 19);

		var question = "Prove you are not a robot: " + test[num];
		$(".captcha-form #jsTest").attr("placeholder", question);
		//$(".captcha-form .rsform-block-test .caption").html(question);
	}

	$(".captcha-form #Submit").click(function() {
		validation_error = 0;

		if ($(".captcha-form #jsTest").val() != answer[num]) {
			$(".captcha-form #jsTest").addClass("rsform-error");
			$(".rsform-block-test .validation span").removeClass("formNoError");
			$(".rsform-block-test .validation span").addClass("formError");
			generate_test();
			$(".captcha-form #jsTest").val("");
			validation_error = 1;
		}

		$(".rsform-block").each(function() {
			if (
				$(this)
					.find(".rsform-input-box.required")
					.val() == "" ||
				$(this)
					.find(".rsform-text-box.required")
					.val() == "" ||
				$(this)
					.find(".rsform-select-box.required")
					.val() == "" ||
				$(this)
					.find(".rsform-upload-box.required")
					.val() == ""
			) {
				$(this)
					.find(".validation span")
					.removeClass("formNoError");
				$(this)
					.find(".validation span")
					.addClass("formError");
				validation_error = 1;
			} else {
				$(this)
					.find(".validation span")
					.removeClass("formError");
				$(this)
					.find(".validation span")
					.addClass("formNoError");
			}
		});

		// check email
		var email_validation = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!email_validation.test($("#Email").val())) {
			$(".rsform-block-email .validation span").removeClass(
				"formNoError"
			);
			$(".rsform-block-email .validation span").addClass("formError");
			validation_error = 1;
		} else {
			$(".rsform-block-email .validation span").removeClass("formError");
			$(".rsform-block-email .validation span").addClass("formNoError");
		}

		// check radio button and checkbox
		$(".form-group-wrap.required").each(function() {
			input_name = $(this)
				.find("input")
				.attr("name");
			input_checked = $("input[name='" + input_name + "']:checked")
				.length;

			if (!input_checked) {
				$(this)
					.parent()
					.find(".validation span")
					.removeClass("formNoError");
				$(this)
					.parent()
					.find(".validation span")
					.addClass("formError");
				validation_error = 1;
			} else {
				$(this)
					.parent()
					.find(".validation span")
					.removeClass("formError");
				$(this)
					.parent()
					.find(".validation span")
					.addClass("formNoError");
			}
		});

		if (validation_error) {
			return false;
		} else {
			$(this).val("Sending, please wait...");
			$(".captcha-form .disabled-submit").addClass("active");
		}
	});
});
