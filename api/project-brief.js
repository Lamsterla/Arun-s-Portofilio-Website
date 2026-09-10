export default async function handler(req, res) {

  if (req.method !== 'POST') {
    return res.status(405).json({
      success: false,
      error: 'Method not allowed'
    });
  }

  try {

    const appsScriptUrl =
      process.env.GOOGLE_SHEET_APPS_SCRIPT_URL;

    if (!appsScriptUrl) {
      console.error(
        'GOOGLE_SHEET_APPS_SCRIPT_URL is missing'
      );

      return res.status(500).json({
        success: false,
        error: 'Server configuration missing'
      });
    }

    const response = await fetch(appsScriptUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'text/plain;charset=utf-8'
      },
      body: JSON.stringify(req.body)
    });

    const result = await response.text();

    console.log(
      'Google Apps Script response:',
      result
    );

    return res.status(200).json({
      success: true
    });

  } catch (error) {

    console.error(
      'Google Sheets API error:',
      error
    );

    return res.status(500).json({
      success: false,
      error: 'Could not submit project brief'
    });
  }
}
