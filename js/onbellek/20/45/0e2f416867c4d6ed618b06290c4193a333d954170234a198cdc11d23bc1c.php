<?php

/* temel.html */
class __TwigTemplate_20450e2f416867c4d6ed618b06290c4193a333d954170234a198cdc11d23bc1c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'icerik' => array($this, 'block_icerik'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">

    <!-- Optional theme -->
    <link rel=\"stylesheet\" href=\"css/bootstrap-theme.min.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"stil.css\">
  </head>
  <body>
    <nav class=\"navbar navbar-default navbar-fixed-top\">
      <div class=\"container\">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
          <ul class=\"nav navbar-nav\">
            <li><a href=\"#\">Ana Sayfa</a></li>
          </ul>
          ";
        // line 24
        if ((isset($context["kullanici"]) ? $context["kullanici"] : null)) {
            // line 25
            echo "          <ul class=\"nav navbar-nav navbar-right\">
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">@";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kullanici"]) ? $context["kullanici"] : null), "kullaniciadi", array()), "html", null, true);
            echo " <span class=\"caret\"></span></a>
              <ul class=\"dropdown-menu\" role=\"menu\">
                <li><a href=\"profil.php\">Profil</a></li>
                <li><a href=\"cikisyap.php\">Çıkış Yap</a></li>
              </ul>
            </li>
          </ul>
          ";
        }
        // line 35
        echo "        </div><!-- /.navbar-collapse -->
      </div>
    </nav>

    <!-- içerik -->
    ";
        // line 40
        $this->displayBlock('icerik', $context, $blocks);
        // line 42
        echo "
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=\"js/jquery-1.11.3.min.js\"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src=\"js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    // line 40
    public function block_icerik($context, array $blocks = array())
    {
        // line 41
        echo "    ";
    }

    public function getTemplateName()
    {
        return "temel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 41,  81 => 40,  71 => 42,  69 => 40,  62 => 35,  51 => 27,  47 => 25,  45 => 24,  20 => 1,);
    }
}
