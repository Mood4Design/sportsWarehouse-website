/**
 * Return true if the field value matches the given format RegExp
 */
$.validator.addMethod( "pattern", function( value, element, param ) {
  if ( this.optional( element ) ) {
    return true;
  }
  if ( typeof param === "string" ) {
    param = new RegExp( "^(?:" + param + ")$" );
  }
  return param.test( value );
}, "Invalid format." );

// 1. Activate validation for the form - automatically use HTML attributes, e.g. "required", "minlength"
// $("#register-form").validate()

// 2. Activate validation for the form - manually defining rules & messages
$(".contact-form").validate({
  rules: {
    "firstName": {
      required: true,
      minlength: 2,
      pattern: /^[A-Z].+$/,
    },
    "lastName": {
      required: true,
      minlength: 2,
    },
    "email": {
      required: true,
      email: true,
    },
    "password1": {
      required: true,
      minlength: 10,
    },
    "password2": {
      equalTo: "#password1",
    },
    "enrolmentMode": {
      required: true,
    },
    "terms": {
      required: true,
    },
    "comments": {
      minlength: 20,
    },
    "postcode": {
      digits: true,
      // minlength: 3,
      // maxlength: 4,
      rangelength: [3, 4],
    },
  },
  messages: {
    "firstName": {
      required: "Don't you have a first name?!",
      minlength: "At least 2, Buddy!",
      pattern: "Must start with a capital letter.",
    },
    "lastName": "Must be at least 2 characters",
    "email": "I need a REAL email address!",
    "password1": "Must be 10+ characters",
    "password2": "Passwords do not match",
    "enrolmentMode": "Please select an enrolment mode",
    "terms": "Accept ALL the terms...",
    "comments": "If you're going to comment, make it at least 20 chars!",
  },
});

$("#checkout").validate({
  rules: {
    firstName: {
      required: true,
      minlength: 2,
    },
    lastName: {
      required: true,
      minlength: 2,
    },
    address: {
      required: true,
      minlength: 5,
    },
    phone: {
      required: true,
      digits: true,
      minlength: 10,
      maxlength: 10,
    },
    email: {
      required: true,
      email: true,
    },
    creditcard: {
      required: true,
      digits: true,
      minlength: 16,
      maxlength: 16,
    },
    nameOnCard: {
      required: true,
      minlength: 2,
    },
    expiry: {
      required: true,
      pattern: /^(0[1-9]|1[0-2])\/?([0-9]{2})$/,
    },
    csv: {
      required: true,
      digits: true,
      minlength: 3,
      maxlength: 3,
    },
  },
  messages: {
    firstName: {
      required: "Please enter your first name",
      minlength: "Your first name must be at least 2 characters long",
    },
    lastName: {
      required: "Please enter your last name",
      minlength: "Your last name must be at least 2 characters long",
    },
    address: {
      required: "Please enter your address",
      minlength: "Your address must be at least 5 characters long",
    },
    phone: {
      required: "Please enter your phone number",
      digits: "Please enter only digits",
      minlength: "Your phone number must be 10 digits long",
      maxlength: "Your phone number must be 10 digits long",
    },
    email: {
      required: "Please enter your email address",
      email: "Please enter a valid email address",
    },
    creditcard: {
      required: "Please enter your credit card number",
      digits: "Please enter only digits",
      minlength: "Your credit card number must be 16 digits long",
      maxlength: "Your credit card number must be 16 digits long",
    },
    nameOnCard: {
      required: "Please enter the name on the card",
      minlength: "The name on the card must be at least 2 characters long",
    },
    expiry: {
      required: "Please enter the expiry date",
      pattern: "Please enter a valid expiry date in MM/YY format",
    },
    csv: {
      required: "Please enter the CSV code",
      digits: "Please enter only digits",
      minlength: "The CSV code must be 3 digits long",
      maxlength: "The CSV code must be 3 digits long",
    },
  },
});