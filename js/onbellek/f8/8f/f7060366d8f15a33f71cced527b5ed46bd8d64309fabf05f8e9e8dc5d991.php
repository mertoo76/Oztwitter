<?php

/* gonderi.html */
class __TwigTemplate_f88ff7060366d8f15a33f71cced527b5ed46bd8d64309fabf05f8e9e8dc5d991 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
    }

    // line 1
    public function getoge($__gonderi__ = null, $__kullanici__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "gonderi" => $__gonderi__,
            "kullanici" => $__kullanici__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "<li>
\t<p>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "adsoyad", array()), "html", null, true);
            echo " (@";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "kullaniciadi", array()), "html", null, true);
            echo ")</p>
\t<p>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "tarih", array()), "html", null, true);
            echo "</p>
\t<p>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "metin", array()), "html", null, true);
            echo "</p>
\t<p>
\t\t<a href=\"#\"><i class=\"glyphicon glyphicon-share-alt\"></i> Yanıtla</a>
\t\t<a href=\"favori.php?id=";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "id", array()), "html", null, true);
            echo "\"><i class=\"glyphicon glyphicon-star-empty\"></i> Favorilere Ekle</a>
\t\t";
            // line 9
            if (($this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "kullanici_id", array()) == $this->getAttribute((isset($context["kullanici"]) ? $context["kullanici"] : null), "id", array()))) {
                // line 10
                echo "\t\t<a href=\"sil.php?id=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "id", array()), "html", null, true);
                echo "\"><i class=\"glyphicon glyphicon-trash\"></i> Sil</a>
\t\t";
            } else {
                // line 12
                echo "\t\t<a href=\"rt.php?id=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gonderi"]) ? $context["gonderi"] : null), "id", array()), "html", null, true);
                echo "\"><i class=\"glyphicon glyphicon-retweet\"></i> Özretweet</a>
\t\t";
            }
            // line 14
            echo "\t</p>
</li>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "gonderi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 14,  64 => 12,  58 => 10,  56 => 9,  52 => 8,  46 => 5,  42 => 4,  36 => 3,  33 => 2,  21 => 1,);
    }
}
