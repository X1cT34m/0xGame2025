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

/* flex-objects/types/user-groups/configure.html.twig */
class __TwigTemplate_2208b50d55b47791d2d74c7ac59fde8a261c69b0b229fd0215d113fbc2c3ad79 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content_top' => [$this, 'block_content_top'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "flex-objects/types/default/configure.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["back_route"] = (($context["back_route"]) ?? (("/" . $this->getAttribute(($context["route"] ?? null), "getRoute", [0 => 1, 1 =>  -1], "method"))));
        // line 1
        $this->parent = $this->loadTemplate("flex-objects/types/default/configure.html.twig", "flex-objects/types/user-groups/configure.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content_top($context, array $blocks = [])
    {
        // line 6
        echo "    ";
        $this->loadTemplate("flex-objects/layouts/accounts/partials/top.html.twig", "flex-objects/types/user-groups/configure.html.twig", 6)->display($context);
        // line 7
        echo "
    ";
        // line 8
        $this->displayParentBlock("content_top", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/user-groups/configure.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  48 => 7,  45 => 6,  42 => 5,  37 => 1,  35 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'flex-objects/types/default/configure.html.twig' %}

{% set back_route = back_route ?? ('/' ~ route.getRoute(1, -1)) %}

{% block content_top %}
    {% include 'flex-objects/layouts/accounts/partials/top.html.twig' %}

    {{ parent() }}
{% endblock %}
", "flex-objects/types/user-groups/configure.html.twig", "/var/www/html/user/plugins/flex-objects/admin/templates/flex-objects/types/user-groups/configure.html.twig");
    }
}
