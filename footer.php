</div> <!-- container -->

<footer class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-4 text-center">
            <div class="row-centered text-left">
                <h1>Kontakt</h1>
                <hr/>
                <p><b>LittleBlueBag | Katrin and Sandra</b></p>
                <p>
                    Ina-Seidel-Str.7<br/>
                    76684 Oestringen
                </p>
                <p>
                    <a href="mailto:mail@littlebluebag.de"><span class="glyphicon glyphicon-envelope"></span> mail@littlebluebag.de</a><br/>
                    <span class="glyphicon glyphicon-phone-alt"></span> +49 (0)176 88121418
                </p>
                <p>
                    <a href="/impressum/">Impressum</a> | <a href="/agb/">AGB</a> | <a href="/datenschutz/">Datenschutz</a>
                </p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 text-center">
            <div class="row-centered social-contact">
                <div class="social-link"><a href="https://www.facebook.com/littlebluebag" target="_blank"><span class="sam-icon">&#xf106;</span> Like us on facebook</a></div>
                <div class="social-link"><a href="https://plus.google.com/112711029813738652601/posts" target="_blank">follow us on google <span class="sam-icon">&#xf101;</span></a></div>
                <div class="social-link"><a href="http://www.pinterest.com/katrinandsandra/" target="_blank"><span class="sam-icon">&#xf103;</span> pin us on pinterest </a></div>
                <div class="social-link"><a href="http://www.instagram.com/katrinandsandra" target="_blank">Katrin on instagram <span class="sam-icon">&#xf102;</span></a></div>
                <div class="social-link"><a href="http://www.instagram.com/littlebluebag" target="_blank"><span class="sam-icon">&#xf102;</span> Sandra on instagram</a></div>
                <div class="social-link"><a href="https://vimeo.com/katrinandsandra" target="_blank">watch us on vimeo <span class="sam-icon">&#xf104;</span></a></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 text-center">
            <div class="row-centered text-left">
                <script type="text/javascript">
                    //<![CDATA[
                    if (typeof newsletter_check !== "function") {
                        window.newsletter_check = function (f) {
                            var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                            if (!re.test(f.elements["ne"].value)) {
                                alert("The email is not correct");
                                return false;
                            }
                            if (f.elements["ny"] && !f.elements["ny"].checked) {
                                alert("You must accept the privacy statement");
                                return false;
                            }
                            return true;
                        }
                    }
                    //]]>
                </script>
                <h1>Newsletter</h1>
                <hr/>
                <form method="post" action="/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
                    <p>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" name="ne" class="form-control" placeholder="E-Mail">
                    </div>
                    </p>
                    <p>
                    <input class="newsletter-submit btn btn-default" type="submit" value="Anmelden"/>
                    </p>
                </form>
            </div>
        </div>

    </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>