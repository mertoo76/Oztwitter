<?php

/* giris.html */
class __TwigTemplate_14cb3bc3cc8d2c211be97b429a8d065cfde67778b030baf2121dc64a0e32a49f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("temel.html", "giris.html", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_icerik($context, array $blocks = array())
    {
        // line 3
        echo "<form class=\"form-horizontal\" method=\"POST\">
  <div class=\"form-group\">
    <label for=\"inputKullaniciadi\" class=\"col-sm-2 control-label\">Kullanıcı adınız:</label>
    <div class=\"col-sm-10\">
      <input name=\"kullaniciadi\" class=\"form-control\" id=\"inputKullaniciadi\">
    </div>
  </div>
  <div class=\"form-group\">
    <label for=\"inputParola\" class=\"col-sm-2 control-label\">Parolanız:</label>
    <div class=\"col-sm-10\">
      <input type=\"password\" class=\"form-control\" id=\"inputParola\" name=\"parola\">
    </div>
  </div>
  <div class=\"form-group\">
    <div class=\"col-sm-offset-2 col-sm-10\">
      <button type=\"submit\" class=\"btn btn-default\">Giriş Yap</button>
    </div>
  </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "giris.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }
}
