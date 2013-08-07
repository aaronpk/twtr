<?php include('header.php'); ?>

<p>twtr.io is an algorithmic URL shortener for Twitter URLs.</p>

<p>Given a full URL to a tweet such as <a href="https://twitter.com/aaronpk/status/364781641031360514">https://twitter.com/aaronpk/status/364781641031360514</a>, this can be shortened to <a href="http://twtr.io/bBowYg3hMu">http://twtr.io/bBowYg3hMu</a>. When the short URL is requested, it is algorithmically expanded to a twitter.com URL. Since the shortening is done algorithmically, no database is needed, and the requirements for running this code are very small. </p>

<h2>
<a name="try-it-now" class="anchor" href="#try-it-now"><span class="octicon octicon-link"></span></a>Try it Now!</h2>

  <form action="/shorten" method="get">
    Tweet URL: <input type="text" name="url">
    <input type="submit" value="Make Shorter!">
    <input type="hidden" name="format" value="html">
  </form>


<h2>
<a name="shortening" class="anchor" href="#shortening"><span class="octicon octicon-link"></span></a>Shortening</h2>

<p>The base 10 tweet ID is converted to a <a href="http://ttk.me/w/NewBase60">NewBase60</a> number to compress it. The ID is appended to <code>http://twtr.io/</code> forming the shortened URL for the tweet.</p>


<h2>
<a name="un-shortening" class="anchor" href="#un-shortening"><span class="octicon octicon-link"></span></a>Un-Shortening</h2>

<p>To un-shorten a link, the NewBase60 number is converted back to its base 10 equivalent. The base 10 ID is appended to <code>https://twitter.com/_/status/</code>. This takes advantage of a feature of twitter.com where they will redirect a tweet URL to the correct username.</p>



<h2>
<a name="faq" class="anchor" href="#un-shortening"><span class="octicon octicon-link"></span></a>FAQ</h2>

<h3>Q: Why do I need this?</h3>
<p>A: You probably don't</p>

<h3>Q: Where is this used?</h3>
<p>A: You can see an example of where this is useful on the IRC logs for the <a href="http://indiewebcamp.com/irc/2013-08-07#t1375897213">#indiewebcamp IRC channel</a>.</p>

<?php include('footer.php'); ?>
