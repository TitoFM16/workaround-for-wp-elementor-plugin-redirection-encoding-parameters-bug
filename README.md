# workaround-for-wp-elementor-plugin-redirection-encoding-parameters-bug
workaround to redirect to a external API from Elementor forms and by pass encoding bugs in URL.

Elementor Forms has a bug that encode the url when redirecting to html entities instead unicode,
this means that a external API won't be able to read the query params or the unicode characters
on a url, this workaround fix the issue by doing a kind of custom decoder before sending data
to the API.

the logic is to don't redirect directly to the API instead points the form with the bad encoding 
to the same site url to the endpoint where the custom decoder is and then redirects to the external API
