<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* configure title template (string template 7b413a03faa53c6e3bfc5f4528080ecf7635d0276cf50fec5af5282677904c8e) */
class __TwigTemplate_b753f052ba86a6991310b981bd28251bd4c05bfc0790f4c80a0cb40c7a284987 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ACCOUNTS"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
    }

    public function getTemplateName()
    {
        return "configure title template (string template 7b413a03faa53c6e3bfc5f4528080ecf7635d0276cf50fec5af5282677904c8e)";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{{ 'PLUGIN_ADMIN.ACCOUNTS'|tu }} {{ 'PLUGIN_ADMIN.CONFIGURATION'|tu }}", "configure title template (string template 7b413a03faa53c6e3bfc5f4528080ecf7635d0276cf50fec5af5282677904c8e)", "");
    }
}
