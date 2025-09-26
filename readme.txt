=== Media embed for Archive.org ===
Contributors: mediaformat
Tags: embed, archive.org
Requires at least: 5.4
Tested up to: 6.8
Stable tag: 1.0.0
License: GPLv2 or later

Embed media from Archive.org

== Description ==
Embed audio, video, and text content from Archive.org using the core/embed block. 

== External services ==
This plugin connects to an API to obtain information about the requested resource, it's needed to embed content from the Interent Archive.

When the plugin interacts with Archive.org, it typically sends data via an iframe. Here is what happens:
- Browser requests data from Archive.org via Iframe:
 -- URL of the Page to Be Archived: The browser sends the URL of the webpage that the user wants to view in its archived form.
 -- User Agent Information: The browser may send information about the user's browser and operating system.
 -- Referrer Information: The browser may send the referrer URL, which is the URL of the page that linked to the archived page.
 -- Timestamp Information: The browser may send the timestamp of the request to specify the exact date and time the user wants to view the archived page.

The service is provided by the "Internet Archive": [terms of use](https://archive.org/about/terms).

== Copright ==
Archive.org name and logo are trademarked and belong to the Internet Archive.
