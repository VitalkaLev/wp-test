document.addEventListener('DOMContentLoaded', function () {

  const popup = document.querySelector('.cta__popup');
  const cta = document.querySelector('.cta__wrapper');
  const form = document.querySelector('.wpcf7-form');
  const closePopup = document.querySelector('.cta__popup__button');
  const phoneInput = document.querySelector('.input-tel');
  const nameInput = document.querySelector('.input-name');

  // Open popup after successful form submission
  function handleMailSent() {
    if (popup) {
      cta.classList.add('hidden');
      popup.classList.remove('hidden');
      if (form) form.reset();
    }
  }

  // Close popup
  function handleClosePopup() {
    if (popup) {
      cta.classList.remove('hidden');
      popup.classList.add('hidden');
    }
  }

  // Phone number formatting
  function validatePhoneNumber(event) {
    const maxLength = 15;
    const input = event.target;
    let value = input.value;

    // Remove anything that's not a number or "+"
    value = value.replace(/[^0-9+]/g, '');

    // Ensure "+" is only at the beginning
    if (value.includes('+') && value.indexOf('+') !== 0) {
        value = value.replace(/\+/g, '');  // Remove all "+" signs
        value = `+${value}`;  // Add the "+" sign at the start
    }

    // Limit the length of the value to maxLength
    if (value.length > maxLength) {
        value = value.slice(0, maxLength);  // Trim the input to maxLength
    }

    // Update the input field with the validated value
    input.value = value;

    // Optional: Check if input contains only valid phone number characters
    const nameRegex = /^[0-9+]+$/;
    if (!nameRegex.test(value)) {
        input.value = value.slice(0, -1);  // Remove the last character if invalid
    }

  }

  // Name field formatting
  function validateNameField(event) {
    const input = event.target;
    let nameValue = input.value;

    // Disallow space as the first character
    if (nameValue.startsWith(' ')) {
        input.value = nameValue.trimStart();
        return;
    }

    // Disallow dots and commas
    nameValue = nameValue.replace(/[.,]/g, '');

    // Remove extra spaces (more than one space between words)
    nameValue = nameValue.replace(/\s{2,}/g, ' ');

    // Allow only letters and a single space between words
    const nameRegex = /^[A-Za-zА-Яа-яІіЇїЄєҐґ ]*$/;

    if (!nameRegex.test(nameValue)) {
        input.value = nameValue.slice(0, -1);
    } else {
        input.value = nameValue;
    }
  }

  // Add UTM fields to Contact Form 7
  function addUtmFieldsToCf7(form) {
   
    var utmFieldsContainer = document.createElement('div');
    utmFieldsContainer.classList.add('utm-fields');
    utmFieldsContainer.classList.add('hidden');

    var utmFields = [
        { name: 'utm_source', value: '' },
        { name: 'utm_medium', value: '' },
        { name: 'utm_campaign', value: '' },
        { name: 'utm_keyword', value: '' },
        { name: 'utm_content', value: '' },
        { name: 'utm_term', value: '' },
        { name: 'utm_traffic', value: '' },
        { name: 'utm_group', value: '' }
    ];

    utmFields.forEach(function(utm) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = utm.name;
        input.value = utm.value;
        input.classList.add('wpcf7-form-control', 'wpcf7-hidden');
        utmFieldsContainer.appendChild(input);
    });

    form.appendChild(utmFieldsContainer);
    
  }

  // Add event listeners
  function addEventListeners() {

      // Open popup after successful form submission
      document.addEventListener('wpcf7mailsent', handleMailSent);

      // Close popup
      if (closePopup) {
        closePopup.addEventListener('click', handleClosePopup);
      }

      // Format phone number field
      if (phoneInput) {
        phoneInput.setAttribute('autocomplete', 'new-phone');
        phoneInput.addEventListener('input', validatePhoneNumber);
      }

      // Format name field
      if (nameInput) {
        nameInput.addEventListener('input', validateNameField);
      }

      // Add UTM fields to form
      addUtmFieldsToCf7(form);
  }

  addEventListeners();

});
