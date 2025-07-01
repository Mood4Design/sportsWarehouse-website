// Client-side validation for the checkout form
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("checkout");

    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Validate First Name
        const firstName = document.getElementById("firstName").value.trim();
        if (firstName === "") {
            isValid = false;
            alert("Please enter your first name.");
        }

        // Validate Last Name
        const lastName = document.getElementById("lastName").value.trim();
        if (lastName === "") {
            isValid = false;
            alert("Please enter your last name.");
        }

        // Validate Address
        const address = document.getElementById("address").value.trim();
        if (address === "") {
            isValid = false;
            alert("Please enter your address.");
        }

        // Validate Phone
        const phone = document.getElementById("phone").value.trim();
        if (phone === "") {
            isValid = false;
            alert("Please enter your phone number.");
        }

        // Validate Email
        const email = document.getElementById("email").value.trim();
        if (email === "") {
            isValid = false;
            alert("Please enter your email address.");
        } else if (!isValidEmail(email)) {
            isValid = false;
            alert("Please enter a valid email address.");
        }

        // Validate Credit Card Number
        const creditcard = document.getElementById("creditcard").value.trim();
        if (creditcard === "") {
            isValid = false;
            alert("Please enter your credit card number.");
        } else if (!isValidCreditCard(creditcard)) {
            isValid = false;
            alert("Please enter a valid credit card number.");
        }

        // Validate Name on Card
        const nameOnCard = document.getElementById("nameOnCard").value.trim();
        if (nameOnCard === "") {
            isValid = false;
            alert("Please enter the name on the card.");
        }

        // Validate Expiry Date
        const expiry = document.getElementById("expiry").value.trim();
        if (expiry === "") {
            isValid = false;
            alert("Please enter the expiry date.");
        } else if (!isValidExpiryDate(expiry)) {
            isValid = false;
            alert("Please enter a valid expiry date (MM/YY).");
        }

        // Validate CSV
        const csv = document.getElementById("csv").value.trim();
        if (csv === "") {
            isValid = false;
            alert("Please enter the CSV code.");
        } else if (!isValidCSV(csv)) {
            isValid = false;
            alert("Please enter a valid CSV code (3-4 digits).");
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
        }
    });

    // Helper functions for validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidCreditCard(creditcard) {
        // Implement Luhn algorithm here (omitted for brevity)
        // This is a placeholder - replace with actual Luhn algorithm implementation
        return creditcard.length >= 15 && creditcard.length <= 16;
    }

    function isValidExpiryDate(expiry) {
        const expiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
        return expiryRegex.test(expiry);
    }

    function isValidCSV(csv) {
        const csvRegex = /^\d{3,4}$/;
        return csvRegex.test(csv);
    }
});