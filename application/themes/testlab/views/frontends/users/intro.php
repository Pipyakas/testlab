<div class="container">
  <div class="_2oJoU _2XOFB">
    <h2>Personalized education.</h2>
    <p>Everyone learns in different ways. For the first time in history, we can analyze how millions of people learn at once to create the most effective educational system possible and tailor it to each student.</p>
    <p>Our ultimate goal is to give everyone access to a private tutor experience through technology.</p>
  </div>
  <div class="_1aDGp _2XOFB">
    <h2>Making learning fun.</h2>
    <p>It's hard to stay motivated when learning online, so we made Duolingo so fun that people would prefer picking up new skills over playing a game.</p>
  </div>
  <div class="_1wanN _2XOFB">
    <h2>Universally accessible.</h2>
    <p>There are over 1.2 billion people learning a language and the majority are doing so to gain access to better opportunities. Unfortunately, learning a language is expensive and inaccessible to most.</p>
    <p>We created Duolingo so that everyone could have a chance. Free language education – no hidden fees, no premium content, just free.</p>
    <p>Duolingo is used by the richest man in the world and many Hollywood stars, and at the same time by public schools students in developing countries. We believe true equality is when spending more can't buy you a better education.</p>
  </div>
</div>

<style>

</style>

<script type="text/javascript">
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("slider");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 5000);

  }
</script>