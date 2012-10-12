/* Custom JQuery */

$(document).ready(function(){
	$("#portfolio_form").validate();
});

/*
Credit Card Type Detection
Created by Nathan Searles <http://nathansearles.com>

Version: 1.0
Updated: June 30th, 2011

(c) 2011 by Nathan Searles

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

/*
Test credit card numbers
Visa: 4111111111111
Mastercard: 5555555555554444
American Express: 378282246310005
Discover: 6011000990139424
*/

function validate( number ) {
// Match and define
var visa = number.match(/^4[0-9]{12}(?:[0-9]{3})?$/);
var mastercard = number.match(/^5[1-5][0-9]{14}$/);
var amex = number.match(/^3[47][0-9]{13}$/);
var discover = number.match(/^6(?:011|5[0-9]{2})[0-9]{12}$/);
var matched;
var cvvFront = "img/icon-cvv-front.png";
var cvvBack = "img/icon-cvv-back.png";

// Create matched object
	if (visa) {
		matched = {
		name: "visa",
		cvv: "back"
		};
	} else if (mastercard) {
		matched = {
		name: "mastercard",
		cvv: "back"
		};
	} else if (amex) {
		matched = {
		name: "amex",
		cvv: "front"
		};
	} else if (discover) {
		matched = {
		name: "discover",
		cvv: "back"
		};
	}

	if (matched) {
		// Fade out all but matched
		$(matched.name === "visa".css({
			background: "url() no-repeat 0 -206px"
		});

		// change cvv icon
		if (matched.cvv === "front") {
		$("#cvv").css({
		background: "url(" + cvvFront + ") no-repeat 0 0"
		});
		} else if (matched.cvv === "back") {
		$("#cvv").css({
		background: "url(" + cvvBack + ") no-repeat 0 0"
		});
		}

		return;
	}

// fade all cards in
$("#credit_card_icons img").css({
opacity: 1
});

// change cvv infograph
$("#cvv").css({
background: "url(img/icon-cvv-blank.png) no-repeat 0 0"
});
}

$(function(){
// Credit card validation
$("#cardNumber").bind("keyup",function(){
validate($(this).val());	
});

// Test numbers, for this example
$("#test_number a").click(function(e) {
e.preventDefault();

var selected = $(this).attr("href").replace("#","");
var testNumber;

switch(selected) {
case "visa":
testNumber = 4111111111111;
break;
case "mastercard":
testNumber = 5555555555554444;
break;
case "amex":
testNumber = 378282246310005;
break;
case "discover":
testNumber = 6011000990139424;
break;
}

// Update input with number
$("#cardNumber").val(testNumber);

// Validate the number
validate( $("#cardNumber").val() );
});
});