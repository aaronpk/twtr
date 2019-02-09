twtr.io
=======

twtr.io is an algorithmic URL shortener for Twitter URLs.

Given a full URL to a tweet such as https://twitter.com/aaronpk/status/364781641031360514, this can be shortened to http://twtr.io/bBowYg3hMu. When the short URL is requested, it is algorithmically expanded to a twitter.com URL. Since the shortening is done algorithmically, no database is needed, and the requirements for running this code are very small. 

Try it Now!
-----------

http://twtr.io/


Shortening
----------

The base 10 tweet ID is converted to a [NewBase60](http://ttk.me/w/NewBase60) number to compress it. The ID is appended to "http://twtr.io/" forming the shortened URL for the tweet.


Un-Shortening
-------------

To un-shorten a link, the NewBase60 number is converted back to its base 10 equivalent. The base 10 ID is appended to "https://twitter.com/_/status/". This takes advantage of a feature of twitter.com where they will redirect a tweet URL to the correct username.

FAQ
---

#### Q: Why do I need this?

A: You probably don't

#### Q: Where is this used?

A: You can see an example of where this is useful on the IRC logs for the [#indieweb chat](https://chat.indieweb.org/meta/2019-02-07#t1549509206771000).


License
-------

Copyright 2013-2019 by Aaron Parecki

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

