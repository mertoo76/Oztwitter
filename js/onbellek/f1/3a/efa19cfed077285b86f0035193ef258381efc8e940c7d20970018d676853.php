<?php

/* profil.html */
class __TwigTemplate_f13aefa19cfed077285b86f0035193ef258381efc8e940c7d20970018d676853 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("temel.html", "profil.html", 1);
        $this->blocks = array(
            'icerik' => array($this, 'block_icerik'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "temel.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["gonderi"] = $this->loadTemplate("gonderi.html", "profil.html", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_icerik($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"col-sm-4\">
\t<h3>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profil"]) ? $context["profil"] : null), "adsoyad", array()), "html", null, true);
        echo "</h3>
\t<h4>@";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profil"]) ? $context["profil"] : null), "kullaniciadi", array()), "html", null, true);
        echo "</h4>
\t<p>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profil"]) ? $context["profil"] : null), "bio", array()), "html", null, true);
        echo "</p>
\t<div class=\"row\">
\t\t<div class=\"col-xs-4\">123</div>
\t\t<div class=\"col-xs-4\">456</div>
\t\t<div class=\"col-xs-4\">789</div>
\t</div>
</div>
<div class=\"col-sm-8\">
\t<form method=\"POST\" class=\"panel panel-default\">
\t\t<div class=\"panel-body\">
\t\t\t<textarea name=\"gonderi\" class=\"form-control\"></textarea>
\t\t\t<input type=\"submit\" class=\"btn btn-primary\" value=\"Öztweetle\">
\t\t</div>
\t</form>
\t<div class=\"panel panel-default\">
\t\t<div class=\"panel-body\">
\t\t\t<ul>
\t\t\t\t";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gonderiler"]) ? $context["gonderiler"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["g"]) {
            // line 25
            echo "\t\t\t\t";
            echo $context["gonderi"]->getoge($context["g"], (isset($context["kullanici"]) ? $context["kullanici"] : null));
            echo "
\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 27
            echo "\t\t\t\t<p>Bu kullanıcının henüz hiç gönderisi yok!</p>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "profil.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 29,  78 => 27,  70 => 25,  65 => 24,  45 => 7,  41 => 6,  37 => 5,  34 => 4,  31 => 3,  27 => 1,  25 => 2,  11 => 1,);
    }
}
