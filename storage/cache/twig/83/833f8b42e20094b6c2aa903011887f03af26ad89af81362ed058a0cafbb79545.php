<?php

/* /Common/404.twig */
class __TwigTemplate_eed00d91ed4b613af57256790ad6dd8c34014918bf8259f707464bf53d70d218 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Common/layouts/index.twig", "/Common/404.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Common/layouts/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "404 - Dealers";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"page-header\">
  <h1 class=\"text-center\">404 Not Found</h1>
</div>
";
    }

    public function getTemplateName()
    {
        return "/Common/404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/Common/404.twig", "/home/dealerportal/public_html/app/Views/Common/404.twig");
    }
}
