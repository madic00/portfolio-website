window.onload = function () {
	let currentPage = window.location.pathname;

	if (currentPage.indexOf("index") != -1 || currentPage == "/portfolio-website/" || currentPage == "/") {
		getProjects();

		$(".error").hide();
		$("#contact-form").submit(checkContactForm);
	}
}

function ajaxGet(url, callback) {
	$.ajax({
		url: url,
		success: callback,
		error: function (xhr, error, status) {
			console.log(xhr, error, status);
		},
	});
}

function ajaxPost(url, data, callback) {
	$.ajax({
		url: url,
		type: "POST",
		dataType: "json",
		data: data,
		success: callback,
		error: function (xhr) {
			console.log(xhr);

			if (xhr.responseJSON.odg) {
				alert(xhr.responseJSON.odg);
			}

			if (xhr.responseJSON.text) {
				alert(xhr.responseJSON.text);
			}

		}
	})
}

function getProjects() {
	let url = "data/projects.json";

	ajaxGet(url, data => {
		printProjects(data);
	})
}

function printProjects(data) {
	let out = "";
	for (const el of data) {
		out += `
			<div>
				<div class="post">
					<img class="thumbnail" src="assets/images/${el.img.path}" alt="${el.img.alt}" />
					<div class="post-preview">
						<h6 class="post-title">${el.name}</h6>
						<p class="post-intro">${el.description}</p>

						<div class="postLinks">
							<a href="${el.links.live}" target="_blank">Visi Link</a>
							<a class="codeLink" href="${el.links.github}" target="_blank">View
								Code</a>

						</div>
						<hr />
						${printTags(el.tags)}
					</div>
				</div>
			</div>
		`;
	}

	$(".post-wrapper").html(out);
}

function printTags(tags) {
	let print = "";
	for (const el of tags) {
		print += `
			<span class="tag">${el}</span>
		`;
	}

	return print;
}


// FORM VALIDATION

var regexName = /^[A-Z][a-z]{2,20}(\s[A-Z][a-z]{3,20}){1,3}$/;
var regexEmail = /^[A-z\d\.-]{5,100}\@[a-z]{2,10}\.[a-z]{2,20}$/;
var regexSubject = /^[A-z\d\.-]{5,100}$/

var errors = [];

function checkContactForm(e) {
	e.preventDefault();

	errors = [];

	var contactForm = [
		{
			selector: "#name",
			regex: regexName,
			type: "input",
			example: "Blake Smith"
		},
		{
			selector: "#subject",
			regex: regexSubject,
			type: "input",
			example: "Job offer"
		},
		{
			selector: "#email",
			regex: regexEmail,
			type: "input",
			example: "blake32smith@gmail.com"
		},
		{
			selector: "#message",
			type: "textarea",
			example: "Message must have at least 10 characters"
		}
	]

	for (const el of contactForm) {
		if (el.type == "input") {
			checkInput(el);
		} else {
			checkMsg(el)
		}
	}

	console.log(errors);

	if (errors.length == 0) {
		return true;
	} else {
		console.log("forma ne valja");
		return false;
	}


}


// CHECK FORM HELPER FUNCTIONS
function checkInput(el) {
	let polje = $(el.selector);
	let regex = el.regex;
	let poljeErr = $(el.selector + "Err");

	if (regex.test(polje.val())) {
		polje.removeClass("border-danger");
		poljeErr.hide();
	} else {
		errors.push(el.selector + " not in right format");
		// polje.val("");
		polje.addClass("border border-danger");

		poljeErr.html("Valid format: " + el.example);
		poljeErr.fadeIn();

		return false;
	}
}

function checkMsg(el,) {
	let polje = $(el.selector);
	let poljeErr = $(el.selector + "Err");

	console.log(polje.val().length);

	if (polje.val() == "" || polje.val().length <= 9) {
		let greskaPolje = $(el.selector + "Err");
		greskaPolje.fadeIn();
		greskaPolje.html("Message must have at least 10 characters");

		errors.push("Message has less than 10 characters");
		polje.addClass("border border-danger");
		return false;
	} else {
		polje.removeClass("border-danger");
		poljeErr.fadeIn();

	}
}