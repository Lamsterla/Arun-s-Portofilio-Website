/**
 * ============================================================================
 * GOOGLE SHEETS FORM SUBMISSION
 * ============================================================================
 */


/**
 * Send project brief to Google Apps Script
 */
async function sendFormToGoogleSheet(payload) {

  console.log('Sending project brief to Vercel API:', payload);

  const response = await fetch('/api/project-brief', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(payload)
  });

  if (!response.ok) {
    throw new Error('Project brief submission failed');
  }

  return await response.json();

}


/**
 * Initialize Project Brief form
 */
function initProjectBriefGoogleSheetForm() {

  const form = document.getElementById('projectBriefForm');

  if (!form) {
    console.warn('Project Brief form not found.');
    return;
  }

  /*
   * Prevent this function from attaching the submit event more than once.
   */
  if (form.dataset.googleSheetInitialized === 'true') {
    return;
  }

  form.dataset.googleSheetInitialized = 'true';


  /*
   * Field validation
   */
  form.querySelectorAll('input, textarea, select').forEach(field => {

    field.addEventListener('blur', () => {
      validateSheetFormField(field);
    });

    field.addEventListener('input', () => {
      clearSheetFormFieldErr(field);
    });

    field.addEventListener('change', () => {
      clearSheetFormFieldErr(field);
    });

  });


  /*
   * FORM SUBMISSION
   */
  form.addEventListener('submit', async function (e) {

    e.preventDefault();
    e.stopPropagation();


    // ============================================================
    // 1. VALIDATE FORM
    // ============================================================

    let isValid = true;

    form
      .querySelectorAll('input[required], textarea[required], select[required]')
      .forEach(field => {

        const value = field.value.trim();

        if (
          !value ||
          (
            field.type === 'email' &&
            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
          )
        ) {
          validateSheetFormField(field);
          isValid = false;
        }

      });


    if (!isValid) {
      console.log('Project brief validation failed.');
      return;
    }


    // ============================================================
    // 2. GET DATA FROM WEBSITE FORM
    // ============================================================

    const payload = {

      fullName:
        (form.querySelector('input[name="full_name"]')?.value || '').trim(),

      email:
        (form.querySelector('input[name="email"]')?.value || '').trim(),

      phone:
        (form.querySelector('input[name="phone_no"]')?.value || '').trim(),

      service:
        (form.querySelector('select[name="service_model"]')?.value || '').trim(),

      budget:
        (form.querySelector('select[name="budget"]')?.value || '').trim(),

      projectDetails:
        (form.querySelector('textarea[name="project_details"]')?.value || '').trim()

    };


    console.log(
      'Project brief payload:',
      payload
    );


    // ============================================================
    // 3. CHECK THAT DATA ACTUALLY EXISTS
    // ============================================================

    console.log('Full Name:', payload.fullName);
    console.log('Email:', payload.email);
    console.log('Phone:', payload.phone);
    console.log('Service:', payload.service);
    console.log('Budget:', payload.budget);
    console.log('Project Details:', payload.projectDetails);


    // ============================================================
    // 4. DISABLE SUBMIT BUTTON
    // ============================================================

    const submitBtn =
      form.querySelector('button[type="submit"]');

    const originalText =
      submitBtn ? submitBtn.textContent : 'Send brief';

    if (submitBtn) {

      submitBtn.disabled = true;
      submitBtn.textContent = 'Sending…';

    }


    // Remove old messages

    form.parentNode
      .querySelector('.form-notice')
      ?.remove();

    form.parentNode
      .querySelector('.form-error-msg')
      ?.remove();


    // ============================================================
    // 5. SEND DATA TO GOOGLE SHEETS
    // ============================================================

    try {

      await sendFormToGoogleSheet(payload);


      // ============================================================
      // 6. SUCCESS MESSAGE
      // ============================================================

      const successMsg =
        "Thank you, your brief has been received! I'll respond within 24 hours.";


      const notice =
        document.createElement('div');

      notice.className = 'form-notice';

      notice.innerHTML =
        '&#10003; ' + successMsg;


      form.parentNode.insertBefore(
        notice,
        form
      );


      // Existing toast

      if (typeof showToast === 'function') {

        showToast(successMsg);

      }


      // ============================================================
      // 7. RESET FORM
      // ============================================================

      form.reset();


      console.log(
        'Project brief sent successfully to Google Sheets.'
      );


    } catch (error) {

      console.error(
        'Google Sheets submission failed:',
        error
      );


      // ============================================================
      // ERROR MESSAGE
      // ============================================================

      const errorDiv =
        document.createElement('div');

      errorDiv.className =
        'form-error-msg';

      errorDiv.style.cssText =
        'color:var(--coral, #ff6b6b);font-size:0.84rem;margin-bottom:12px;';

      errorDiv.innerHTML =
        '&#9888; Could not reach the server. Please check your connection and try again.';


      form.parentNode.insertBefore(
        errorDiv,
        form
      );


      if (typeof showToast === 'function') {

        showToast(
          'Submission failed. Please try again.'
        );

      }

    } finally {

      // ============================================================
      // 8. ENABLE BUTTON AGAIN
      // ============================================================

      if (submitBtn) {

        submitBtn.disabled = false;
        submitBtn.textContent = originalText;

      }

    }

  });

}


/**
 * ============================================================================
 * VALIDATION
 * ============================================================================
 */

function validateSheetFormField(field) {

  clearSheetFormFieldErr(field);

  const value = field.value.trim();


  if (
    field.hasAttribute('required') &&
    !value
  ) {

    return showSheetFormFieldErr(
      field,
      'This field is required.'
    );

  }


  if (
    field.type === 'email' &&
    value &&
    !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
  ) {

    return showSheetFormFieldErr(
      field,
      'Enter a valid email address.'
    );

  }


  if (
    field.type === 'tel' &&
    value &&
    !/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s./0-9]*$/.test(value)
  ) {

    return showSheetFormFieldErr(
      field,
      'Enter a valid phone number.'
    );

  }

}


/**
 * Show validation error
 */
function showSheetFormFieldErr(field, message) {

  field.style.borderColor =
    'var(--coral, #ff6b6b)';


  const existing =
    field.parentNode.querySelector('._ferr');

  if (existing) {
    existing.remove();
  }


  const span =
    document.createElement('span');

  span.className =
    '_ferr';

  span.style.cssText =
    'display:block;font-size:0.73rem;color:var(--coral, #ff6b6b);margin-top:4px;';

  span.textContent =
    message;


  field.parentNode.appendChild(span);

}


/**
 * Clear validation error
 */
function clearSheetFormFieldErr(field) {

  field.style.borderColor = '';

  field.parentNode
    .querySelector('._ferr')
    ?.remove();

}


/**
 * ============================================================================
 * AUTO INITIALIZE
 * ============================================================================
 */

if (document.readyState === 'loading') {

  document.addEventListener(
    'DOMContentLoaded',
    initProjectBriefGoogleSheetForm
  );

} else {

  initProjectBriefGoogleSheetForm();

}