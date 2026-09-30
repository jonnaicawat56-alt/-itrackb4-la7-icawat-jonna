1. Why does the form use POST instead of GET?
The form uses POST because POST sends the form data to the server without putting the information in the URL. If it used GET, the data would appear in the URL. Also, when the browser refreshes a GET request, it can send the same request again, which could cause the same action to happen again, such as adding the same product. Using POST is safer for submitting and saving data.

2. What stops the record from being saved when validation fails?
When validation fails, Laravel automatically stops the controller from continuing. We do not need to write an if statement to stop the saving. Laravel redirects the visitor back to the form page and sends the validation error messages with it. The visitor can then correct the invalid information and submit the form again.

3. Why does the success message not appear on every page?
The success message is placed in the layout, so the layout is available on every page. However, it only appears when there is a success message stored in the session. After the product is successfully added, the controller puts the success message in the session. Laravel displays it once, and after that it is removed, so it does not appear on every page.
