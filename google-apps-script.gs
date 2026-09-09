/**
 * ==============================================================================
 * GOOGLE APPS SCRIPT FOR GOOGLE SHEETS FORM SUBMISSION
 * ==============================================================================
 * Copy and paste this code into your Google Sheet Apps Script editor.
 *
 * STEPS TO SETUP:
 * 1. Open your target Google Sheet.
 * 2. Click on "Extensions" > "Apps Script".
 * 3. Replace any existing code in Code.gs with this script.
 * 4. Save the project (Ctrl+S or Cmd+S).
 * 5. Click "Deploy" > "New deployment".
 * 6. Select Type: "Web app".
 * 7. Configuration:
 *    - Description: Form Submission API
 *    - Execute as: "Me" (your email)
 *    - Who has access: "Anyone"
 * 8. Click "Deploy", authorize permissions, and copy the Web App URL.
 * 9. Update GOOGLE_SHEET_APPS_SCRIPT_URL in google-sheet-form.js with your URL.
 * ==============================================================================
 */

function doPost(e) {
  try {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getActiveSheet();
    var data = JSON.parse(e.postData.contents);

    // Auto-create headers if sheet is empty
    if (sheet.getLastRow() === 0) {
      sheet.appendRow([
        'Timestamp',
        'Full Name',
        'Email',
        'Phone Number',
        'Service Needed',
        'Budget',
        'Project Details'
      ]);
    }

    // Append row with form data
    sheet.appendRow([
      data.timestamp || new Date().toLocaleString(),
      data.fullName || '',
      data.email || '',
      data.phone || '',
      data.service || '',
      data.budget || '',
      data.projectDetails || ''
    ]);

    return ContentService.createTextOutput(JSON.stringify({
      status: 'success',
      message: 'Data successfully recorded in Google Sheet'
    })).setMimeType(ContentService.MimeType.JSON);

  } catch (error) {
    return ContentService.createTextOutput(JSON.stringify({
      status: 'error',
      message: error.toString()
    })).setMimeType(ContentService.MimeType.JSON);
  }
}
